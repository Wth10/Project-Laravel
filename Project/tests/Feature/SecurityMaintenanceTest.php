<?php

namespace Tests\Feature;

use App\Models\boletin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SecurityMaintenanceTest extends TestCase
{
    use RefreshDatabase;

    private function boletinData(array $overrides = []): array
    {
        return array_merge([
            'nome' => 'Aluno Teste',
            'nota_1_unidade' => 8,
            'nota_2_unidade' => 7,
            'nota_3_unidade' => 9,
            'sala' => 'A1',
            'turno' => 'matutino',
        ], $overrides);
    }

    public function test_boletin_can_only_be_deleted_by_authenticated_delete_request()
    {
        $boletin = boletin::create($this->boletinData());

        $this->delete(route('destroy', ['boletin' => $boletin->id]))
            ->assertRedirect('/login');

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/' . $boletin->id)
            ->assertStatus(404);

        $this->actingAs($user)
            ->delete(route('destroy', ['boletin' => $boletin->id]))
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseMissing('boletins', ['id' => $boletin->id]);
    }

    public function test_boletin_delete_requires_csrf_token()
    {
        $boletin = boletin::create($this->boletinData());
        $user = User::factory()->create();

        $this->actingAs($user)
            ->withMiddleware()
            ->post(route('destroy', ['boletin' => $boletin->id]), [
                '_method' => 'DELETE',
            ])
            ->assertStatus(419);
    }

    public function test_boletin_update_ignores_non_validated_fields()
    {
        $boletin = boletin::create($this->boletinData());
        $user = User::factory()->create();

        $this->actingAs($user)
            ->put(route('update', ['id' => $boletin->id]), $this->boletinData([
                'nome' => 'Aluno Alterado',
                'id' => 999,
            ]))
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('boletins', [
            'id' => $boletin->id,
            'nome' => 'Aluno Alterado',
        ]);
        $this->assertDatabaseMissing('boletins', ['id' => 999]);
    }

    public function test_boletin_notes_must_be_between_zero_and_ten()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('registro_aluno'), $this->boletinData([
                'nota_1_unidade' => 11,
            ]))
            ->assertSessionHasErrors('nota_1_unidade');
    }

    public function test_profile_update_validates_unique_email_and_password_rules()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => 'Novo Nome',
                'email' => $otherUser->email,
                'password' => '1234567',
                'password_confirmation' => '12345678',
            ])
            ->assertSessionHasErrors(['email', 'password']);
    }

    public function test_profile_update_hashes_password_and_updates_allowed_fields()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => 'Nome Seguro',
                'email' => 'novo-email@example.com',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
                'unexpected' => 'value',
            ])
            ->assertRedirect(route('profile'));

        $user->refresh();

        $this->assertSame('Nome Seguro', $user->name);
        $this->assertSame('novo-email@example.com', $user->email);
        $this->assertTrue(Hash::check('new-password', $user->password));
    }
}

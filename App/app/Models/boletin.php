<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boletin extends Model
{
    use HasFactory;

    protected $table = 'boletins';
    public $timestamps = true;

    protected $casts = [
        'cost' => 'float'
    ];

    protected $fillable = [
        'id', 
        'nome', 
        'nota_1_unidade', 
        'nota_2_unidade', 
        'nota_3_unidade', 
        'sala', 
        'turno'
    ];
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateBoletin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'           =>  ['required', 'string', 'min:3','max:150'],
            'nota_1_unidade' =>  ['required', 'numeric', 'min:0', 'max:10'],
            'nota_2_unidade' =>  ['required', 'numeric', 'min:0', 'max:10'],
            'nota_3_unidade' =>  ['required', 'numeric', 'min:0', 'max:10'],
            'sala'           =>  ['required', 'string', 'min:1', 'max:20'],
            'turno'          =>  ['required', 'string', 'in:matutino,vespertino,noturno']
        ];
    }
}
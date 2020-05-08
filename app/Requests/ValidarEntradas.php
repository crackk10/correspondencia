<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarEntradas extends FormRequest
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
            'remitente'=>'required',
            'id_documento'=>'required',
            'id_area'=>'required',
            'asunto'=>'required',

            //
        ];
    }
    public function messages(){
        return [
            'remitente'=>'El campo es obligatorio',
            'id_documento'=>'El campo es obligatorio',
        ];
    }
}

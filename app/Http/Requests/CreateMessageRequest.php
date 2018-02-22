<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
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
            'message' => ['required','max:160'],
            'user_id' => ['required']
        ];
    }

    public function messages(){
        return [
            'message.required'  => 'Por favor, escribe tu mensaje.',
            'user_id.required'  => 'Necesita iniciar sesión para enviar su mensaje',
            'message.max'       => 'El mensaje no puede superar los 160 caracteres.',
        ];
    }
}

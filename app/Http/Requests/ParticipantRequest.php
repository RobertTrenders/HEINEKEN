<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ParticipantRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $aRules = [
            'team' => 'required',
            'name' => 'required|min:3|max:60',
            'last_name' => 'required|min:3|max:60',
            'dni' => 'required|numeric|digits_between:8,8',
            'phone' => 'required|numeric|digits_between:10,10',
            'objective' => 'required|min:3|max:255',
        ];

        return $aRules;
    }

    public function messages()
    {
        $aMessages = [
            'team.required' => 'Campo obligatorio.',
            'name.required' => 'Campo obligatorio.',
            'name.min:3' => 'Mínimo 3 caracteres.',
            'name.max:60' => 'Máximo 60 caracteres.',
            'last_name.required' => 'Campo obligatorio.',
            'last_name.min:3' => 'Mínimo 3 caracteres.',
            'last_name.max:60' => 'Máximo 60 caracteres.',
            'dni.required' => 'Campo obligatorio.',
            'dni.numeric' => 'DNI inválido',
            'dni.digits_between' => 'DNI inválido',
            'phone.required' => 'Campo obligatorio.',
            'phone.numeric' => 'Teléfono inválido.',
            'phone.digits_between' => 'Teléfono inválido.',
            'objective.required' => 'Campo obligatorio.',
            'objective.min:3' => 'Mínimo 3 caracteres.',
            'objective.max:255' => 'Máximo 255 caracteres.',
        ];

        return $aMessages;
    }
}
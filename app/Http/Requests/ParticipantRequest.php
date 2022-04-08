<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\ValidEmail;
use App\Rules\ValidDNI;

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
            'email' => ['required', 'email:filter', 'max:60', new ValidEmail($this->email)],
            'dni' => ['required', 'numeric', 'digits_between:8,8', new ValidDNI($this->dni)],
            'phone' => 'required|numeric|digits_between:10,10',
            'objective' => 'required|min:3|max:255',
            'terms' => 'required|boolean',
            'g-recaptcha-response' => ['recaptcha'],
        ];

        return $aRules;
    }

    public function messages()
    {
        $aMessages = [
            'team.required' => 'Campo obligatorio.',
            'name.required' => 'Campo obligatorio.',
            'name.min' => 'Mínimo 3 caracteres.',
            'name.max' => 'Máximo 60 caracteres.',
            'email.required' => 'Campo obligatorio.',
            'email.email' => 'Email inválido.',
            'email.max' => 'Máximo 60 caracteres.',
            'dni.required' => 'Campo obligatorio.',
            'dni.numeric' => 'DNI inválido',
            'dni.digits_between' => 'DNI inválido',
            'phone.required' => 'Campo obligatorio.',
            'phone.numeric' => 'Teléfono inválido.',
            'phone.digits_between' => 'Teléfono inválido.',
            'objective.required' => 'Campo obligatorio.',
            'objective.min' => 'Mínimo 3 caracteres.',
            'objective.max' => 'Máximo 255 caracteres.',
            'terms.required' => 'Debes aceptar las bases y condiciones',
            'terms.boolean' => 'Debes aceptar las bases y condiciones',
        ];

        return $aMessages;
    }
}

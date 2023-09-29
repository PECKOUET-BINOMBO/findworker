<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class prestataire extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:4',
                'regex:/^[A-Z].*$/'
            ],

            'email' => [
                'required',
            ],

            'tel' => [
                'required',
                'regex:/^\d+$/'
            ],

            'tel2' => [

                'regex:/^\d+$/'
            ],

            'service' => [
                'required',
                'regex:/^[A-Z].*$/'
            ],

            'description' => [
                'required',
                'min:10',
                'regex:/^[A-Z].*$/'
            ],

            'category' => [
                'required',
            ],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom est obligatoire',
            'name.min' => 'Le nom doit contenir au moins 4 caractère',
            'name.regex' => 'Le nom doit commencer par une majuscule',
            'email.required' => 'L\'email est obligatoire',
            'tel.required' => 'Le numéro de téléphone est obligatoire',
            'tel.regex' => 'Le numéro de téléphone doit être un nombre entier',

            'tel2.regex' => 'Le numéro de téléphone doit être un nombre entier',
            'service.required' => 'Le service est obligatoire',
            'service.regex' => 'Le service doit commencer par une majuscule',
            'description.required' => 'La description est obligatoire',
            'description.min' => 'La description doit contenir au moins 10 caractère',
            'description.regex' => 'La description doit commencer par une majuscule',
            'category.required' => 'La catégorie est obligatoire',
        ];
    }
}

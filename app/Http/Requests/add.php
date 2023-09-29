<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class add extends FormRequest // Corrected class name to match the file name
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
            'title' => [
                'required',
                'min:1',
                'regex:/^[A-Z].*$/'
            ],

            'description' => [
                'required',
                'min:10',
                'regex:/^[A-Z].*$/'
            ],

            'price' => [
                'nullable', // Corrected validation rule
                'numeric',
                'min:1'
            ],

            'category' => [
                'required',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est obligatoire',
            'title.min' => 'Le titre doit contenir au moins 1 caractère',
            'title.regex' => 'Le titre doit commencer par une majuscule',
            'description.required' => 'La description est obligatoire',
            'description.min' => 'La description doit contenir au moins 10 caractères',
            'description.regex' => 'La description doit commencer par une majuscule',
            'price.numeric' => 'Le prix doit être un nombre',
            'price.min' => 'Le prix doit être supérieur à 0',
            'category.required' => 'La catégorie est obligatoire',

        ];
    }



}

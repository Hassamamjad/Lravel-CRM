<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Leadrequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:25',
            'contact' => 'required|integer|size:11',
            'email' => 'required|Unique|email',
            'city' => 'required|string',
            'project_name' => 'required|string|max:255',

        ];
    }

    public function message(){
        return [
            'name.required' => "Name must be required",
            'contact.required' => "Contact must be required",
            'email.required' => "Email must be required",
            'city.required' => "City must be required",
            'Project_name.required' => "Project Name must be required"
        ];
    }
}

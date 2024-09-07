<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Clientrequest extends FormRequest
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
            'email' => 'required|string|max:50',
            'contact' => 'required|integer|size:11',
            'date' => 'required|date',
            'city' => 'required|string',
            'status' => 'required|string'
        ];
    }

    public function message() {

        return[
            'name' => 'Name must be required',
            'email' => 'email must be required',
            'contact' => 'Contact must be required',
            'date' => 'Date must be required',
            'city' => 'City must be required',
            'status' => 'Status must be required'
        ];
        
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class StoreRestaurantRequest extends FormRequest
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
            'name'=> 'required|min:4|max:255',
            'contact_email'=> 'required|email|max:255|unique:restaurants,contact_email',
            'address' => 'required|min:4|max:255',
            'phone_number' => 'required|numeric|max_digits:10|min_digits:10',
            'logo' => 'image|mimes:png,jpg|max:2048', //laravel prova ad aprire il file,leggerlo e capire l'estensione tramite mimes
            'thumb' => 'image|mimes:png,jpg|max:2048',
            'vat' => 'required|numeric|max_digits:11|min_digits:11',
            'typeList' =>'required|exists:types,id',
        ];
    }
}

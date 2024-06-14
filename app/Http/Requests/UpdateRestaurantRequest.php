<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateRestaurantRequest extends FormRequest
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
            'contact_email'=> ['required','email','max:255',Rule::unique('restaurants')->ignore($this->restaurant)],
            'address' => 'required|min:4|max:255',
            'phone_number' => 'required|min:4|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'thumb' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vat' => 'required|min:4|max:255',
        ];
    }
}

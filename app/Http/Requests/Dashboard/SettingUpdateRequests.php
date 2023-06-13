<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequests extends FormRequest
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
            //
            'name' => 'string|nullable',
            'description' => 'string|nullable',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'faveicon' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'email' => 'email',
            'phone' => 'string|nullable',
            'addresses' => 'string|nullable',
            'facebook' => 'string|nullable',
            'twitter' => 'string|nullable',
            'instagram' => 'string|nullable',
            'youtube' => 'string|nullable',
            'tiktok' => 'string|nullable',
        ];
    }
}

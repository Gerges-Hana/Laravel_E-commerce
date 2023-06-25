<?php

namespace App\Http\Requests\Dashboard\categories;

use Illuminate\Foundation\Http\FormRequest;

class categoryStoreRequest extends FormRequest
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
            'name' => 'required|unique:categories,name',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'required|image|mimes:png,jpg,ipeggif,svg
            max:2048',
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'يرجي ادخال الاسم ',
        'image.required' => 'يرجي ادخال صوره للمنتج  ',
    ];
}
}

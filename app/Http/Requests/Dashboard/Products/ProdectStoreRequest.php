<?php

namespace App\Http\Requests\Dashboard\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProdectStoreRequest extends FormRequest
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
            'name' => 'required|string',

            'image' => 'required|image|mimes:png,jpg,ipeggif,svg|max:2048',
            'category_id' => 'required|numeric|exists:categories,id',
            'description' => 'string',
            'price' => 'nullable|numeric',
            'discount_price' => 'nullable|numeric',
            'colors'=>'nullable|array',
            'colors.*'=>'nullable|string',
        ];
    }
}

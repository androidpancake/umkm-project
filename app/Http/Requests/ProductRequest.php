<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|integer|exists:category,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama produk wajib diisi!',
            'price.required' => 'Harga wajib diisi!',
            'stock.required' => 'Stok harus diisi!',
            // 'category_id.required' => 'Kategori harus diisi!'
        ];
    }
}

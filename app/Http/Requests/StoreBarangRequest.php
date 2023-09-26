<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
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
            'kode_barang' => ['required', 'max:50', 'string'],
            'nama_barang' => ['required', 'max:100', 'string'],
            'satuan' => ['required', 'max:10', 'string'],
            'harga_jual' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'produk_id' => ['required', 'exists:produk,id'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}

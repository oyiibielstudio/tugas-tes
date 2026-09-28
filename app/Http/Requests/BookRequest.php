<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|min:3|max:255',
            'author'      => 'required|string|min:3|max:255',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'  => 'Judul buku wajib diisi.',
            'title.min'       => 'Judul buku minimal 3 karakter.',
            'author.required' => 'Nama penulis wajib diisi.',
            'stock.required'  => 'Jumlah stok wajib diisi.',
            'stock.integer'   => 'Stok harus berupa angka.',
            'stock.min'       => 'Stok tidak boleh bernilai negatif.',
        ];
    }
}
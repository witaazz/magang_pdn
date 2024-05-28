<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapelRequest extends FormRequest
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
            'namamapel' => 'required',
            'pengajar' => 'required',
            'jam' => 'required',
            'lokal' => 'required',
            'gambar' => 'required|mimes:jpg,png'
        ];
    }

    public function messages(): array
    {
        return [
            'namemapel.required' => 'Nama mata pelajaran tidak boleh kosong!',
            'pengajar.required' => 'Nama pengajar tidak boleh kosong!',
            'jam.required' => 'Jam tidak boleh kosong!',
            'lokal' => 'Lokal tidak boleh kosong!',
            'gambar.mimes' => 'File yang diupload harus berformat JPG/PNG!'
        ];
    }
}

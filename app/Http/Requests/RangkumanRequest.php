<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RangkumanRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rangkuman_pdf' => ['required', 'mimes:pdf'],
            'judul_rangkuman' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'author_id' => ['required', 'numeric', 'exists:users,id'],
            'mapel_id' => ['required', 'numeric', 'exists:kategori_mapel,id'],
            'kelas_id' => ['required', 'numeric', 'exists:kategori_kelas,id']
        ];
    }
}

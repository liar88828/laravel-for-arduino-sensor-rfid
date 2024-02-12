<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnggotaRequest extends FormRequest
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
            'jam_masuk' => 'required|sometimes',
            'jam_pulang' => 'required|sometimes',
            'jam_masuk_telat' => 'required|sometimes',
            'jam_pulang_telat' => 'required|sometimes',
            'jam_kerja' => 'required|min:1',
            'user_id' => 'nullable',
        ];
    }
}

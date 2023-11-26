<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            // 'id_teknisi' => 'required|integer',
            'id_status' => 'required|integer',
            'id_users' => 'required|integer',
            'id_paket' => 'required|integer',
            'full_name' => 'required|string',
            'email' => 'required|string',
            'kota'=> 'required|string',
            'kecamatan' => 'required|string',
            'jalan'  => 'required|string',
        ];
    }
}

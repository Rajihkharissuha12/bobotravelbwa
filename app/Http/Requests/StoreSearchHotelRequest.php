<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSearchHotelRequest extends FormRequest
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
            'keyword' => ['required','string','max:255'],
            'checkin_at' => ['required','date','after_or_equal:today'],
            'checkout_at' => ['required','date','after:checkin_at']
        ];
    }

    public function messages(): array
    {
        return [
            'checkin_at.after_or_equal' => 'Tanggal check-in tidak boleh kurang dari hari ini.',
            'checkout_at.after' => 'Tanggal check-out harus setelah tanggal check-in.',
        ];
    }
}

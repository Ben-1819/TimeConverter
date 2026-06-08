<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTimeRequest extends FormRequest
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
            'batch_number' => ['required', 'integer', 'exists:batches,batch_number'],
            'hours' => ['nullable', 'integer'],
            'minutes' => ['nullable', 'integer', 'max:60'],
            'seconds' => ['nullable', 'integer', 'max:60']
        ];
    }

    public function messages(): array
    {
        $messages = [
            'batch_number.required' => 'Batch number is a required field',
            'batch_number.integer' => 'Batch number must be of data type integer',
            'batch_number.exists' => 'Batch number must exist in the batches table',
            'hours.integer' => 'Hours must be an integer',
            'minutes.integer' => 'Minutes must be an integer',
            'minutes.max' => 'Minutes can not be greater than 60',
            'seconds.integer' => 'Seconds must be an integer',
            'seconds.max' => 'Seconds must not be greater than 60'
        ];

        return $messages;
    }
}

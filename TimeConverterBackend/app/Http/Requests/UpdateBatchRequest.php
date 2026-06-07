<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBatchRequest extends FormRequest
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
            'batch_number' => ['required', 'integer', 'unique:batches.batch_number'],
            'date_started' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        $messages = [
            'batch_number.required' => 'Batch number is required.',
            'batch_number.integer' => 'Batch number must be an integer.',
            'batch_number.unique' => 'Batch number must be unique.',
            'date_started.required' => 'Date started is a required field.',
            'date_started.date' => 'Date started must be a valid date',
        ];

        return $messages;
    }
}

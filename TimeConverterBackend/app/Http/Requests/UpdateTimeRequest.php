<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTimeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'hours' => ['nullable', 'integer', 'required_without_all:minutes,seconds'],
            'minutes' => ['nullable', 'integer', 'max:60', 'required_without_all:hours,seconds'],
            'seconds' => ['nullable', 'integer', 'max:60', 'required_without_all:hours,minutes']
        ];
    }

    public function messages(): array
    {
        $messages = [
            'batch_number.required' => 'Batch number is a required field',
            'batch_number.integer' => 'Batch number must be of data type integer',
            'batch_number.exists' => 'Batch number must exist in the batches table',
            'hours.integer' => 'Hours must be of data type integer',
            'hours.required_without_all' => 'Hours is required if the minutes and seconds fields are both empty',
            'minutes.integer' => 'Minutes must be an integer',
            'minutes.max' => 'Minutes can not be greater than 60',
            'minutes.required_without_all' => 'Minutes is required if the hours and seconds fields are both empty',
            'seconds.integer' => 'Seconds must be an integer',
            'seconds.max' => 'Seconds can not be greater than 60',
            'seconds.required_without_all' => 'Seconds is required if the hours and minutes fields are both empty'
        ];

        return $messages;
    }
}

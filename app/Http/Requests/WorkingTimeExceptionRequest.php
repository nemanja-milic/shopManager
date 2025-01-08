<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkingTimeExceptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reason' => 'required|array',
            'reason.*' => 'string',

            'date' => 'required|array',
            'date.*' => 'date',

            'is_working' => 'required|array',
            'is_working.*' => 'in:true,false',

            'opening_time' => 'nullable|array',
            'opening_time.*' => 'nullable|date_format:H:i:s',

            'closing_time' => 'nullable|array',
            'closing_time.*' => 'nullable|date_format:H:i:s',
        ];
    }
}

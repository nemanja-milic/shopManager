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
        logger($this->all());
        return [
            "reason" => ["string", "max:20"],
            "date" => ["date"],
            "is_working" => ["in:true,false"],
            "opening_time" => [
                "required_if:is_working,true",
                "date_format:H:i:s",
                "before:closing_time",
            ],
            "closing_time" => [
                "required_if:is_working,true",
                "date_format:H:i:s",
            ],
        ];
    }
}

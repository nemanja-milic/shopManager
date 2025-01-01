<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkingTimeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        logger($this->monday_opening_time);
        return [
            "monday_opening_time" => ["nullable", "date_format:H:i:s"],
            "monday_closing_time" => ["nullable", "date_format:H:i:s"],

            "tuesday_opening_time" => ["nullable", "date_format:H:i:s"],
            "tuesday_closing_time" => ["nullable", "date_format:H:i:s"],

            "wednesday_opening_time" => ["nullable", "date_format:H:i:s"],
            "wednesday_closing_time" => ["nullable", "date_format:H:i:s"],

            "thursday_opening_time" => ["nullable", "date_format:H:i:s"],
            "thursday_closing_time" => ["nullable", "date_format:H:i:s"],

            "friday_opening_time" => ["nullable", "date_format:H:i:s"],
            "friday_closing_time" => ["nullable", "date_format:H:i:s"],

            "saturday_opening_time" => ["nullable", "date_format:H:i:s"],
            "saturday_closing_time" => ["nullable", "date_format:H:i:s"],

            "sunday_opening_time" => ["nullable", "date_format:H:i:s"],
            "sunday_closing_time" => ["nullable", "date_format:H:i:s"],
        ];
    }
}

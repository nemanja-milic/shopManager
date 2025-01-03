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
        return collect(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])
        ->flatMap(function ($day) {
            return [
                "{$day}_opening_time" => [
                    "nullable",
                    "date_format:H:i:s",
                    "required_with:{$day}_closing_time",
                    "before:{$day}_closing_time",
                ],
                "{$day}_closing_time" => [
                    "nullable",
                    "date_format:H:i:s",
                    "required_with:{$day}_opening_time",
                ],
            ];
        })->toArray();

    }
}

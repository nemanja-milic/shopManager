<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicShopRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => ["required", "string", "max:100"],
            "city" => ["required", "string", "max:50"],
            "street" => ["required", "string", "max:60"],
            "country_id" => ["required", "numeric"]
        ];
    }
}

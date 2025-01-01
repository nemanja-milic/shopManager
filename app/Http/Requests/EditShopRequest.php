<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditShopRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(
            (new BasicShopRequest($this->only(["name", "street", "country_id", "city"])))->rules(),
            (new UpdateWorkingTimeRequest($this->only([
                'monday_opening_time',
                'monday_closing_time',
                'tuesday_opening_time',
                'tuesday_closing_time',
                'wednesday_opening_time',
                'wednesday_closing_time',
                'thursday_opening_time',
                'thursday_closing_time',
                'friday_opening_time',
                'friday_closing_time',
                'saturday_opening_time',
                'saturday_closing_time',
                'sunday_opening_time',
                'sunday_closing_time',
            ])))->rules()
        );
    }
}

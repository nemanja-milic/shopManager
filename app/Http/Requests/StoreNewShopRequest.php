<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewShopRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return array_merge(
            (new BasicShopRequest($this->all()))->rules(),
            // (new UpdateWorkingTimeRequest($this->all()))->rules(),
            (new WorkingTimeExceptionRequest($this->all()))->rules()
        );
    }
}

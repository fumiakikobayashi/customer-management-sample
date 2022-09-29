<?php

declare(strict_types=1);

namespace App\Packages\Presentations\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetCustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Division;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubscribeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'    => ['nullable', 'string', 'min:3', 'max:255'],
            'last_name'     => ['required', 'string', 'min:3', 'max:255'],
            'middle_name'   => ['nullable', 'string', 'min:3', 'max:255'],
            'phone'         => ['required', 'regex:/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/'],
            'email'         => ['required', 'email'],
            'division_id'   => ['required', 'exists:'. Division::class .',id'],
            'worker_id'     => ['required', 'exists:'. User::class .',id'],
            'service_id'    => ['required', 'exists:'. Service::class .',id'],
            'start_at'      => ['required', 'date'],
            'comment'       => ['nullable', 'string', 'max:500'],
        ];
    }
}

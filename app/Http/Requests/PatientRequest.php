<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matricId' => [
                'required_without:StaffId', Rule::unique((new User)->getTable(), 'matricStaffId')->ignore($this->route()->user->id ?? null)
            ],
            'StaffId' => [
                'required_without:matricId', Rule::unique((new User)->getTable(), 'matricStaffId')->ignore($this->route()->user->id ?? null)
            ],
            'firstName' => [
                'required', 'min:3'
            ],
            'lastName' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'sex' => [
                'required'
            ],
            'race' => [
                'required'
            ],
            'dob' => [
                'required'
            ],
            'bloodGroup' => [
                'required'
            ],
            'phone' => [
                'required', 'numeric'
            ],
            'address_1' => [
                'required', 'min:3'
            ],
            'address_2' => [
                'required', 'min:3'
            ],
            'cityId' => [
                'required', 'exists:cities,id'
            ],
            'stateId' => [
                'required', 'exists:states,id'
            ],
            'postcode' => [
                'required', 'numeric'
            ]
        ];
    }
}

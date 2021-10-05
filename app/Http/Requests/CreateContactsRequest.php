<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar' => ['nullable', 'mimes:jpg,gif,jpeg,png'],
            'fname' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'string', 'email', 'max:100'],
            'phone' => ['required', 'min:11', 'max:11', 'regex:/^\+?(88)?0?1[3456789][0-9]{8}\b/', 'unique:contacts'],
            'address' => ['required'],
            'nid' => ['required', "numeric", "regex:/(^\d{10}$)|(^\d{13}$)|(^\d{17}$)/", 'unique:contacts'],
            'contact_type' => ['required']
        ];
    }
}

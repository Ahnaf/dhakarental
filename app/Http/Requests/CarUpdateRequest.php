<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarUpdateRequest extends FormRequest
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
            'type' => ['required'],
            'reg_number' => ['required'],
            'registration_year' => ['required'],
            'model' => ['required'],
            'condition' => ['required'],
            'ac' => ['required'],
            'fuel' => ['required'],
            'gearbox' => ['required'],
            'sitting' => ['required'],
            'color' => ['required'],
            'location' => ['required'],
            'isavailable' => ['required'],
            'other_features' => ['required'],
            'owner_driver' => ['required'],
            'note' => ['required'],
            'prefered' => ['required'],
            'carid'    => ['required'],
            'cartoken' => ['required']
            
        ];
    }
}

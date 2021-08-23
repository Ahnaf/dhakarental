<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
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
            'avatar' => ['required', 'mimes:jpg,gif,jpeg,png'],
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
            'attachments_of_text.0' => ['required'],
            'attachments_of_text.*' => ['required'],
            'attachments_of_paper.0' => ['required', 'mimes:pdf,jpg,gif,jpeg,png'],
            'attachments_of_paper.*' => ['required', 'mimes:pdf,jpg,gif,jpeg,png'],
            'gallery.0' => ['required'],
            'gallery.*' => ['required'],
        ];
    }
}

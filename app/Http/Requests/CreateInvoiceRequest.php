<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequest extends FormRequest
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

            "item.*" => "required|max:150",
            "qty.*" => "required|digits_between:1,5",
            "price.*" => "required|digits_between:2,11",
            "customer" => ["required"],
            "vat" => "required|digits_between:2,11",
            "discount" => "required|digits_between:2,11",
            "paidamount" => "required|digits_between:2,11",
            "dueamount" => "required|digits_between:2,11",
            "total"     => "required|digits_between:2,11",
            "grandtotal" => "required|digits_between:2,11",

        ];
    }
}

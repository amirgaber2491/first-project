<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name_ar'=>'required',
            'name_en'=>'required',
            'price'=>'required',
            'details_ar'=>'required',
            'details_en'=>'required',
            'photo'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'name_ar.required' => __('message.name_ar offer is required'),
            'name_en.required' => __('message.name_en offer is required'),
            'price.required'  => __('message.price offer is required'),
            'details_ar.required'  => __('message.details_ar offer is required'),
            'details_en.required'  => __('message.details_en offer is required'),
            'photo.required'  => __('message.image offer required'),
        ];
    }
}

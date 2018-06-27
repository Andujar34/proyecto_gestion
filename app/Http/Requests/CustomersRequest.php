<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomersRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'surname' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'CIF' => 'required|string|min:9|max:9',
            'phone' => 'required|string|min:9|max:9',
            'cc' => 'required|string|min:16|max:16',
        ];
    }
}

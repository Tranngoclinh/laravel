<?php

namespace App\Http\Requests\admin\customer;

use Illuminate\Foundation\Http\FormRequest;

class edit extends FormRequest
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
            'name' => 'required',
            'age' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ];
    }

    public function messages()
    {
            return [
                'name.required' => 'Tên khách hàng không được để trống',
                'age.required' => 'Tuổi khách hàng không được để trống',
                'email.required' => 'Email khách hàng không được để trống',
                'phone.required' => 'Số điện thoại khách hàng không được để trống',
                'address.required' => 'Địa chỉ khách hàng không được để trống'
            ];
        
    }
}

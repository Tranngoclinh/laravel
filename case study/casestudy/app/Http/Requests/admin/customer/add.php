<?php

namespace App\Http\Requests\admin\customer;

use Illuminate\Foundation\Http\FormRequest;

class add extends FormRequest
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
                'name.required' => 'Bạn cần nhập tên khách hàng',
                'age.required' => 'Bạn cần nhập tuổi khách hàng',
                'email.required' => 'Bạn cần nhập email khách hàng',
                'phone.required' => 'Bạn cần nhập số điện thoại khách hàng',
                'address.required' => 'Bạn cần nhập địa chỉ khách hàng'
            ];
        
    }
}

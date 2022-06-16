<?php

namespace App\Http\Requests\admin\product;

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
            'category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required',
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống ',
            'category_id.required' => 'Danh mục sản phẩm không được để trống',
            'price.required' => 'Giá sản phẩm không được để trống',
            'quantity.required' => 'Số lượng sản phẩm không được để trống',
            'image.required' => 'Ảnh sản phẩm không được để trống',
            'description.required' => 'Mô tả sản phẩm không được để trống'
        ];
    }
}

<?php

namespace App\Http\Requests\admin\product;

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
            'name.required' => 'Cần nhập tên sản phẩm',
            'category_id.required' => 'Cần nhập danh mục sản phẩm',
            'price.required' => 'Cần nhập giá sản phẩm',
            'quantity.required' => 'Cần nhập số lượng sản phẩm',
            'image.required' => 'Cần thêm ảnh sản phẩm',
            'description.required' => 'Cần nhập mô tả sản phẩm'
        ];
    }
}

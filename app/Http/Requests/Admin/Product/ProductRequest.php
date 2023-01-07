<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category' => ['required'],
            'brand' => ['required'],
            'name' => ['required'],
            'price' => ['required', 'integer', 'min:1'],
            // 'sale' => ['integer'],
            // 'color' => ['required'],
            'quantity' => ['required', 'integer', 'min:1'],
            // 'avatar' => ['required'],
            // 'product_image' => ['required'],
            'detail' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'integer' => ':attribute phải là số',
            'min' => ':attribute phải là số dương'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'category' => 'Danh mục sản phẩm',
            'brand' => 'Hãng sản phẩm',
            'price' => 'Giá sản phẩm',
            'sale' => 'Giá giản sản phẩm',
            'color' => 'Màu sản phẩm',
            'quantity' => 'Số lượng sản phẩm',
            'title' => 'Mô tả sản phẩm',
            'detail' => 'Thông số kỹ thuật'
        ];
    }
}
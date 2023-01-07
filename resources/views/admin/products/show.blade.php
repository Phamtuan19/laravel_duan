@extends('admin.layout.index')

@section('page_heading', 'Chỉnh sửa sản phảm')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('redirect')
    <a href="{{ route('admin.product.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-2"></i>
        Danh sách sản phẩm

        <br>{{ $product->id }}
    </a>
@endsection

@section('content')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    @if(!empty($product))

    <div class="p-4" style="background-color: #fff; border-radius: 5px">
        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="category">Danh mục sản phẩm</label>
                <select name="category" id="category" class="form-control">
                    <option value="">--- Chọn danh mục ---</option>
                    <option value="1">Điện thoại</option>
                    <option value="2">Máy tính bảng</option>
                    <option value="3">Laptop</option>
                    <option value="4">PC - Màn hình</option>
                </select>

                @error('category')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="brand">Thương hiệu sản phẩm</label>
                <select name="brand" id="brand" class="form-control">
                    <option value="">--- Chọn danh mục ---</option>
                    <option value="1">Iphone</option>
                    <option value="2">Samsung</option>
                    <option value="3">Xiaomi</option>
                    <option value="4">Oppo</option>
                </select>

                @error('brand')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ empty(old('name')) ? $product->name : old('name') }}">

                @error('name')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="text" name="quantity" class="form-control" id="quantity" value="{{ empty(old('quantity')) ? $product->quantity : old('quantity') }}">

                @error('quantity')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="price">Giá sản phẩm</label>
                <input type="text" name="price" class="form-control" id="price" value="{{ empty(old('price')) ? $product->price : old('price') }}">

                @error('price')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="sale">Giá khuyến mãi</label>
                <input type="text" name="sale" class="form-control" id="sale" value="{{ empty(old('sale')) ? $product->sale : old('sale') }}">

                @error('sale')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="title">Tiêu đề sản phẩm</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ empty(old('title')) ? $product->title : old('title') }}">

                @error('title')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="avatar">Ảnh đại diện sản phẩm</label>
                <input type="file" name="avatar[]" class="form-control" id="avatar" style="padding: 3px 12px">

                @error('avatar')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="product_image">Ảnh sản phẩm</label>
                <input type="file" name="product_image[]" multiple class="form-control" id="product_image"
                    style="padding: 3px 12px">

                @error('product_image')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="detail">Thông số kỹ thuật</label>
                <textarea name="detail" id="detail">
                    {{ empty(old('detail')) ? $product->detail : old('detail') }}
                </textarea>

                @error('detail')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Thêm mới">
            </div>
        </form>
    </div>

    @endif
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/[version.number]/[distribution]/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('detail');
    </script>
@endsection
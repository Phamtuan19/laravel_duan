@extends('admin.layout.index')

@section('page_heading', 'Thêm bài viết')

@section('link')
    <link rel="stylesheet" href="{{ asset('admin/custom_admin/posts/css/create.css') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />


@endsection

@section('content')
    <div class="container-fluid">

        @if (session('msg'))
            <div class="alert alert-success text-center">
                {{ session('msg') }}
            </div>
        @endif

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-lg-9">
                    <div class="form-group">
                        {{-- @dd($post) --}}
                        <label for="title" class="form-label">Tiêu đề bài viết</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ empty(old('title')) ? $post->title : old('title') }}">
                        @error('title')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="introduction" class="form-label">Giới thiệu</label>
                        <textarea class="form-control" id="introduction" name="introduction" style="height: 150px !important;">{{ empty(old('introduction')) ? $post->introduction : old('introduction') }}</textarea>
                        @error('introduction')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Chọn sản phẩm</label>
                        <select class="select2 form-control" name="product_code[]" style="height: 42px !important;"
                            multiple="multiple">
                            <option value="">--- Chọn sản phẩm ---</option>
                            @if (!empty(json_decode($post->product_code, true)))
                                @foreach ($products as $product)
                                    <option value="{{ $product->code }}" {!! in_array($product->code, json_decode($post->product_code, true)) ? 'selected' : false !!}>{{ $product->name }}
                                    </option>
                                @endforeach
                            @else
                                @foreach ($products as $product)
                                    <option value="{{ $product->code }}">{{ $product->name }}
                                    </option>
                                @endforeach
                            @endif

                        </select>
                        @error('product_code')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Nội dung bài viết</label>
                        <br>
                        @error('content')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                        <textarea class="form-control" id="ck-content_post" name="content" rows="3">
                            {{ empty(old('content')) ? $post->content : old('content') }}
                        </textarea>
                    </div>
                </div>

                <div class="col-lg-3" style="">

                    <div class="form-group">
                        <label for="">Slug bài viết</label>
                        <input type="text" class="form-control" id="slug" name="slug"
                            value="{{ old('slug') }}" style="background-color: #FFF">
                        @error('slug')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Danh mục bài viết</label>
                        <select id="" class="form-control select2_category" name="category_id[]"
                            multiple="multiple">
                            <option value="">--- Chọn danh mục ---</option>

                            @if (!empty(json_decode($post->category_id, true)))
                                @foreach (json_decode($post->category_id, true) as $value)
                                    @foreach ($categories as $category)
                                        @if ($category->id == $value)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            @else
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif

                        </select>
                        @error('category_id')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Thêm hình ảnh đại điện mới</label>
                        <label class="picture" for="picture__input" tabIndex="0">
                            <span class="picture__image"></span>
                        </label>

                        <input type="file" name="post_avatar" id="picture__input">
                        @error('post_avatar')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-control" style="height: auto !important;">
                        <label for="">Ảnh đại điện cũ</label>
                        <label class="picture" for="picture__input" tabIndex="0">
                            <span class="picture__image">
                                <img class="picture__img" src="{{ $post->avatar_path }}" alt="">
                            </span>
                        </label>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Đăng bài">
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('js')

    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="{{ asset('admin/custom_admin/posts/js/create.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#title").keyup(function() {
                $("#slug").val(renSlug($(this).val()))
            });

            $("#slug").val(renSlug($("#title").val()))

            $(".select2").select2({
                placeholder: "Lựa chọn sản phẩm",
                // allowClear: true
            })

            $(".select2_category").select2({
                placeholder: "Lựa chọn sản phẩm",
                // allowClear: true
            })
        });
    </script>
@endsection

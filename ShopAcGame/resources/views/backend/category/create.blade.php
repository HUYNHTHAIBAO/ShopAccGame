@extends('backend.layouts.index')
@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Thêm mới danh mục</span>
            </h3>

        </div>
        <!--end::Header-->
    <form class="card-body" action="{{route('backend.category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tên danh mục</label>
            <input type="text" name="title" class="form-control" id="title" >
{{--            @if($errors->has('title'))--}}
{{--                <div class="alert alert-danger" style="color: red">{{ $errors->first('title') }}</div>--}}
{{--            @endif--}}
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Hình ảnh</label>
            <input class="form-control" name="image" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Hiển thị</label>
        <select class="form-select" name="status" aria-label="Default select example">
            <option selected>Chọn</option>
            <option value="1">Hiển thị</option>
            <option value="0">Không hiển thị</option>
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
    </div>
@endsection

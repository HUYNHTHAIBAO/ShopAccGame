@extends('backend.layouts.index')
@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Thêm mới bài viết</span>
            </h3>

        </div>
        <!--end::Header-->
        <form class="card-body" action="{{route('backend.blogs.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Tên bài viết</label>
                <input type="text" name="title" class="form-control" id="slug" onkeyup="ChangeToSlug()">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Slug tên bài viết</label>
                <input type="text" name="slug" class="form-control" id="convert_slug" >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                <textarea class="form-control" name="description" id="desc_blog" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                <textarea class="form-control" name="content" id="content_blog" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input class="form-control" name="image" type="file" id="formFile">
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Hiển thị</label>
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="1">Hiển thị</option>
                    <option value="0">Không hiển thị</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
@endsection

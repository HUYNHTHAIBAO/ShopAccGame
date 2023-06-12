@extends('backend.layouts.index')
@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Cập nhật danh mục</span>
            </h3>

        </div>
        <!--end::Header-->
        <form class="card-body" action="{{route('backend.category.update', [$category->id])}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Tên danh mục</label>
                <input type="text" value="{{$category->title}}" name="title" class="form-control" id="title" >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3">{{$category->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input class="form-control" name="image" type="file" id="formFile">
                <img src="{{asset('uploads/category/'.$category->image)}}" class="" alt=""/>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Hiển thị</label>
                <select class="form-select" name="status" aria-label="Default select example">
                    @if($category->status == 1)
                    <option value="1" selected >Hiển thị</option>
                    <option value="0">Không hiển thị</option>
                    @elseif($category->status == 0)
                        <option value="1">Hiển thị</option>
                        <option value="0" selected>Không hiển thị</option>
                        @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection

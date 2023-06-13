@extends('backend.layouts.index')
@section('content')
    <!--begin::Tables Widget 11-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Quản lý Slider</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{route('backend.slider.create')}}" class="btn btn-sm btn-light-primary">
                    <i class="ki-duotone ki-plus fs-2"></i> Thêm mới
                </a>
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-3">
            {{--            // thông báo khi thêm thành công--}}
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
        @endif
        <!--begin::Table container-->
            <div class="table-responsive" >
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4" id="myTable">
                    <!--begin::Table head-->
                    <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="min-w-125px">Id</th>
                        <th class="min-w-125px">Tên slider</th>
                        <th class="min-w-125px">Mô tả</th>
                        <th class="min-w-200px">Hiển thị</th>
                        <th class="min-w-150px">Hình ảnh</th>
                        {{--                        <th class="min-w-150px">Thứ tự</th>--}}
                        <th class="min-w-150px">Hành động</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody>
                    @foreach($slider as $key => $sli)
                        <tr>
                            <td>
                                <span class="text-muted fw-semibold text-muted d-block fs-7">{{$key += 1}}</span>
                            </td>

                            <td>
                                <span class="text-muted fw-semibold text-muted d-block fs-7">{{$sli->title}}</span>
                            </td>

                            <td>
                                <span class="text-muted fw-semibold text-muted d-block fs-7">{{$sli->description}}</span>
                            </td>

                            <td>
                                @if($sli->status == 1)
                                    <span class="badge badge-light-primary fs-7 fw-bold">
                               Hiển thị

                            </span>
                                @elseif($sli->status == 0)
                                    <span class="badge badge-light-primary fs-7 fw-bold">
                               Không hiển thị
                            </span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-5">
                                        <img src="{{asset('uploads/slider/'.$sli->image)}}" class="" alt=""/>
                                    </div>
                                </div>
                            </td>
                            {{--                            <td>--}}
                            {{--                                <span class="badge badge-light-primary fs-7 fw-bold">Approved</span>--}}
                            {{--                            </td>--}}

                            <td class="">

                                <a href="{{route('backend.slider.edit', [$sli->id])}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Sửa">
                                    <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> </a>

                                <a href="{{route('backend.slider.destroy', [$sli->id])}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa">
                                    <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span></i> </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 11-->

@endsection

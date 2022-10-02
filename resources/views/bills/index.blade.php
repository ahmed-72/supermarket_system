@extends('parent')

@section('extraCSS')
@endsection

@section('pageName') Bills @endsection

@section('pagePath') Bills @endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid pt-10" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Bills</span>
                    <span class="text-muted mt-1 fw-bold fs-7">We have {{$bills->count()}} Bills</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{route('bill.create')}}" class="btn btn-sm btn-light-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->New Bill
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 min-w-125px rounded-start">ID</th>
                                <th class="min-w-125px">items count</th>
                                <th class="min-w-125px">customer Name</th>
                                <th class="min-w-100px">total price</th>
                                <th class="min-w-50px ">created_at</th>
                                <th class="min-w-50px "></th>
                                <th class="min-w-50px "></th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach($bills as $bill)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-dark fw-bolder text-hover-primary mb-1 fs-6">
                                                {{$bill->id}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                        {{$bill->billItems->count()}}</div>
                                </td>
                                <td>
                                    <div href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                        {{$bill->customer->name}}</div>
                                </td>
                                <td>
                                    <div href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                        {{$bill->totalPrice}}</div>
                                </td>
                                <td>
                                    <div href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                        {{$bill->created_at->diffForHumans()}}</div>
                                </td>
                                <td class="">
                                    <a href="{{route('bill.show',$bill->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                    transform="rotate(-180 18 13)" fill="black"></rect>
                                                <path
                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    </td>
                                    <td>
                                    <form action="{{route('bill.destroy',$bill->id)}}" method="post"> @csrf @method('delete')
                                    <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                    fill="black"></path>
                                                <path opacity="0.5"
                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                    fill="black"></path>
                                                <path opacity="0.5"
                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    </form>
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
    </div>
</div>
@endsection

@section('extraJS')
@endsection
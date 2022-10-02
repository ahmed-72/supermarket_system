@extends('parent')

@section('extraCSS')
@endsection

@section('pageName') Categoreis @endsection

@section('pagePath') Categoreis -- Category details @endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid pt-10" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1"> {{$category->name}} Category</span>
                    <span class="card-label  fs-3 mb-1">have {{$category->items->count()}} Items</span>
                </h3>
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
                                <th class="ps-4 min-w-50px rounded-start">ID</th>
                                <th class="min-w-50px">item name</th>
                                <th class="min-w-50px">item price</th>
                                <th class="min-w-50px">quantity in stock</th>
                                <th class="min-w-50px">delete</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach($category->items as $item)
                            <tr>
                                <td class="p-5">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-dark fw-bolder text-hover-primary mb-1 fs-6">
                                                {{$item->id}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                        {{$item->name}}</div>
                                </td>
                                <td>
                                    <div class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                        {{$item->price}}</div>
                                </td>
                                <td>
                                    <div class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                        {{$item->quantity}}</div>
                                </td>
                                <td>
                                    <form action="{{route('item.removeCategory',$item->id)}}" method="post"> @csrf
                                        @method('put')
                                        <button type="submit"
                                            class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
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
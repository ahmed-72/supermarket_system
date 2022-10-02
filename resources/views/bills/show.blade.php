@extends('parent')

@section('extraCSS')
@endsection

@section('pageName') Bills @endsection

@section('pagePath') Bills -- Bill details @endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid pt-10" id="kt_content">
    <!--begin::Container-->
    <div class="container-xl w-200" id="kt_content_container" style="width: max(800px);">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Purchases bill</span>
                    <span class="card-label text-gray-700 mt-5 fs-6 mb-1">customer : {{$bill->customer->name}}</span>
                </h3>
                <div class="card-toolbar">
                    <a href="" class="btn btn-sm btn-light-primary">
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Printer.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z"
                                        fill="#000000" />
                                    <rect fill="#000000" opacity="0.3" x="8" y="2" width="8" height="2" rx="1" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Print Bill
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder bg-light border-radius">
                                <th class="px-0 py-2">No.</th>
                                <th class="p-2 min-w-100px">Item Name</th>
                                <th class="p-2 min-w-100px">Item price</th>
                                <th class="p-2 min-w-100px">Item quantity</th>
                                <th class="p-2 min-w-100px">Total</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>@php $count=1; @endphp
                            @foreach($bill->billItems as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <label class="d-flex justify-content-start flex-column">{{$count}}</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <label
                                            class="d-flex justify-content-start flex-column">{{$item->item->name}}</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <label
                                            class="d-flex justify-content-start flex-column">{{$item->item->price}}</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <label
                                            class="d-flex justify-content-start flex-column">{{$item->quantity}}</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <label
                                            class="d-flex justify-content-start flex-column">{{$item->quantity * $item->item->price}}</label>
                                    </div>
                                </td>
                            </tr>
                            @php ++$count; @endphp
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <hr class="col-2">

                    <div class="col-5">
                        <div class="d-flex align-items-center">
                            <label class="d-flex justify-content-start flex-column fs-4">Number of items : </label>
                            <label
                                class="d-flex justify-content-start flex-column fs-4"> {{$bill->billItems->count()}}</label>
                        </div>
                    </div >


                    <div class="col-5">
                        <div class="d-flex align-items-center">
                            <label class="d-flex justify-content-start flex-column fs-4">Total Price : </label>
                            <label class="d-flex justify-content-start flex-column fs-4"> {{$bill->totalPrice}}</label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex align-items-center">
                            <label class="d-flex justify-content-start flex-column"></label>
                        </div>
                    </div >

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
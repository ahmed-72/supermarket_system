@extends('parent')

@section('extraCSS')
@endsection

@section('pageName') Bills @endsection

@section('pagePath') Bills -- Create new Bill @endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid pt-10" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">New Bill</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <form action="{{route('bill.store')}}" method="POST">
                    @csrf
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <div class="col-4">
                            <select
                                class="name select2-selection select2-selection--single form-select form-select-solid"
                                name="customer_id">
                                <option value="" disabled selected hidden>select customer</option>
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-200px">item Name & price</th>
                                    <th class="min-w-150px">item Quantity</th>
                                    <!-- <th class="min-w-150px">item Price</th>
                                    <th class="min-w-150px">total Price</th> -->
                                    <th class="min-w-100px">Actions</th>
                                </tr>
                            </thead>
                        </table>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <div class="repeater">
                            <div data-repeater-list="itemsGroup">
                                <div data-repeater-item>
                                    <div class="col-12">
                                        <div class="row fv-row fv-plugins-icon-container">
                                            <div class="col-4">
                                                <select
                                                    class="name select2-selection select2-selection--single form-select form-select-solid"
                                                    name="id" id="name">
                                                    <option value="" disabled selected hidden>select item</option>
                                                    @foreach($items as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}--{{$item->price}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <input type="number" class="quantity form-control form-control-solid"
                                                    placeholder="Enter quantity" name="quantity" id="quantity">
                                                <input type="text" hidden name="price" value="{{$item->price}}">
                                            </div>
                                            <!-- <div class="col-2">
                                            <input type="number" class="price form-control form-control-solid"
                                                placeholder="" value="50" name="price" id="price">
                                        </div>
                                        <div class="col-2">
                                            <input type="text" class="totalPrice form-control form-control-solid"
                                                placeholder="" name="totalPrice" id="totalPrice">
                                        </div> -->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a data-repeater-delete type="button"
                                                    class="btn btn-active-danger font-weight-bold ">
                                                    <span class="svg-icon svg-icon-danger svg-icon-2x">
                                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                                                                    fill="#000000" fill-rule="nonzero" />
                                                                <path
                                                                    d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                    fill="#000000" opacity="0.3" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="col-1">
                                    <button data-repeater-create type="button" class="btn">
                                        <span class="svg-icon svg-icon-primary svg-icon-3x">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Code/Plus.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10">
                                                    </circle>
                                                    <path
                                                        d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z"
                                                        fill="#000000"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--end::Table body-->
                        <div class="col-4">
                            <label class="form-check  my-7">
                            <span class="required fs-4 ">{{__('Is tax added?')}}</span>
                                <input class="form-check-input" type="checkbox" value="1" checked="checked" name="tax">
                            </label>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary d-inline-block"
                            data-kt-stepper-action="submit">
                            <span class="indicator-label">Submit
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                <span class="svg-icon svg-icon-3 ms-2 me-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                            transform="rotate(-180 18 13)" fill="black"></rect>
                                        <path
                                            d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                        </button>
                </form>
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
<!-- begin repeater -->
@include('includes.myscripts')
<script>
$(document).ready(function() {
    'use strict';
    window.id = 5;

    $('.repeater').repeater({
        defaultValues: {
            'id': window.id,
        },
        show: function() {
            $(this).slideDown();
            console.log($(this).find('input')[1]);
            $('#cat-id').val(window.id);
        },
        hide: function(deleteElement) {
            if (confirm('هل أنت متأكد من أنك تريد حذف هذا العنصر؟')) {
                window.id--;
                $('#cat-id').val(window.id);

                $(this).slideUp(deleteElement);
                console.log($('.repeater').repeaterVal());
            }
        },
        ready: function(setIndexes) {


        }
    });


});
</script>
<!-- end repeater -->

<script>
const name = document.getElementById('name');
const pric = document.getElementById('price');

name.addEventListener('change', updateValue);

function updateValue(e) {
    pric.value = e.target.value;
}
</script>
<script>
const quantity = document.getElementById('quantity');

quantity.addEventListener('input', updateValue);

function updateValue(e) {
    var prices = document.getElementById('price');
    var price = prices.value;
    const totalPrice = document.getElementById('totalPrice');
    totalPrice.value = e.target.value * +price;
}

function updatePrice(price) {
    var prices = document.getElementById('price');
    var price = prices.value;
    const totalPrice = document.getElementById('totalPrice');
    totalPrice.value = e.target.value * +price;
}
</script>

@endsection
@extends('parent')

@section('extraCSS')
@endsection

@section('pageName') Items @endsection

@section('pagePath') Items-- View items @endsection

@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid pt-10" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Misc Widget 1-->
        <div class="row mb-5 mb-xl-12 g-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-12 " style="margin-left:450px ;">

            <div class="col-2 card card-stretch btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body  text-start  p-5 card-toolbar"
                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title=""
                data-bs-original-title="Click to add a group">
                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                    data-bs-target="#modal_new_item">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-primary svg-icon-3x">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Plus.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.3"
                                    transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                    x="4" y="11" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    Add new item
                </a>
                <!--end::Card-->
            </div>
            </div>
            <!--end::Col-->
            @foreach($items as $item)
            <!--begin::Col-->
            <div class="col-3">
                <!--begin::Card-->
                <div class="card card-stretch">
                    <div class="card-header border-0 py-5">
                        <span class="fs-4 fw-bolder">{{$item->name}}</span>

                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <span class="badge badge-light fw-bolder my-2">
                                <a href="#" data-bs-toggle="modal" id="edit_service" data-bs-target="#modal_edit_item"
                                    data-id-id="{{$item->id}}" data-id-name="{{$item->name}}"
                                    data-id-barcode="{{$item->barcode}}" data-id-price="{{$item->price}}"
                                    data-id-quantity="{{$item->quantity}}" data-id-category="{{$item->category->id}}"
                                    data-id-outOfStockSelling="{{$item->outOfStockSelling}}">
                                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                    rx="1" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                            </span>
                            <span class="badge badge-light fw-bolder my-2">
                                <form action="{{route('item.destroy',$item->id)}}" method="post">
                                    @csrf @method('delete')
                                    <button type="submit" style="border:none ; background:none"
                                        onclick="return confirm('Are you sure you want to delete this row?')"
                                        class="button button-danger">
                                        <span class="svg-icon svg-icon-danger svg-icon-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                    <path
                                                        d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span></button>
                                </form>

                            </span>
                        </div>
                    </div>
                    <!--begin::Link-->
                    <div
                        class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-5">
                        <!-- <span class="fs-4 fw-bolder">{{$item->name}}</span>  -->
                        <img src="/storage/{{$item->image}}" alt="{{$item->name}}" class="mx-10 mb-5" width="100px" height="100px">
                        <span class="fs-3 ">{{$item->price}} ILS</span>
                        <span class="fs-3" style="@if( $item->quantity >0) color:green @else color:red @endif">IN
                            stock:{{$item->quantity}}</span>
                    </div>
                    <!--end::Link-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            @endforeach
        </div>
    </div>
</div>

<!--begin::Modal new item -->
<div class="modal fade" id="modal_new_item" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>{{__('New Item')}}</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y my-4">
                <!--begin::Form-->
                <form id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{route('item.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 fv-row">
                        <!--begin::Row-->
                        <div class="row fv-row fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Name')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" name="name" id="name"
                                    value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Input group-->
                                <div class="d-flex flex-column  fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">{{__('Barcode')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" name="barcode"
                                        id="barcode" value="">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="col-md-12 fv-row">
                        <!--begin::Row-->
                        <div class="row fv-row fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Price')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" name="price" id="price"
                                    value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Quantity')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" name="quantity" id="quantity"
                                    value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="col-md-12 fv-row">
                        <!--begin::Row-->
                        <div class="row fv-row fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Category')}}</span>
                                </label>
                                <!--end::Label-->
                                <select
                                    class="select2-selection select2-selection--single form-select form-select-solid"
                                    name="category" id="category" selected="1">
                                    <option value=""></option>
                                    @foreach($categoreis as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <label class="form-check form-switch form-check-custom form-check-solid mt-7">
                                    <span class="required ">{{__('Selling when it was out Of Stock?')}}</span>
                                    <input class="form-check-input" type="checkbox" value="1" checked="checked"
                                        name="outOfStockSelling" id="outOfStockSelling">

                                </label>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->


                    <!--begin::Input group-->
                    <div class="d-flex flex-column  fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">{{__('Image')}}</span>
                        </label>
                        <!--end::Label-->
                        <input type="file" class="form-control form-control-solid" name="image" id="image" value="">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" id="kt_modal_new_card_cancel"
                            class="btn btn-light me-3">{{__('Discard')}}</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label">{{__('save')}}</span>
                            <span class="indicator-progress">{{__('Please wait...')}}
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                    <div></div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal  new item-->
<!--begin::Modal edit item -->
<div class="modal fade" id="modal_edit_item" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>{{__('Edit Item')}}</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y my-4">
                <!--begin::Form-->
                <form id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{route('item.update')}}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="col-md-12 fv-row">
                        <!--begin::Row-->
                        <div class="row fv-row fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Name')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="hidden" class="form-control form-control-solid" name="id" id="itemID"
                                    value="">
                                <input type="text" class="form-control form-control-solid" name="name" id="itemName"
                                    value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Input group-->
                                <div class="d-flex flex-column  fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">{{__('Barcode')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" name="barcode"
                                        id="itemBarcode" value="">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="col-md-12 fv-row">
                        <!--begin::Row-->
                        <div class="row fv-row fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Price')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" name="price" id="itemPrice"
                                    value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Quantity')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" name="quantity"
                                    id="itemQuantity" value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="col-md-12 fv-row">
                        <!--begin::Row-->
                        <div class="row fv-row fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Category')}}</span>
                                </label>
                                <!--end::Label-->
                                <select
                                    class="select2-selection select2-selection--single form-select form-select-solid"
                                    name="category" id="itemCategory">
                                    <option value=""></option>
                                    @foreach($categoreis as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <label class="form-check form-switch form-check-custom form-check-solid mt-7">
                                    <span class="required ">{{__('Selling when it was out Of Stock?')}}</span>
                                    <input class="form-check-input" type="checkbox" value="1" name="outOfStockSelling"
                                        id="itemOutOfStockSelling">
                                </label>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->


                    <!--begin::Input group-->
                    <div class="d-flex flex-column  fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">{{__('Image')}}</span>
                        </label>
                        <!--end::Label-->
                        <input type="file" class="form-control form-control-solid" name="image" id="image" value="">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" id="kt_modal_new_card_cancel"
                            class="btn btn-light me-3">{{__('Discard')}}</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label">{{__('save')}}</span>
                            <span class="indicator-progress">{{__('Please wait...')}}
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                    <div></div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal  edit item-->
@endsection

@section('extraJS')

<script>
$('#modal_edit_item').on('show.bs.modal', function(e) {
    var itemID = $(e.relatedTarget).attr('data-id-id');
    var itemName = $(e.relatedTarget).attr('data-id-name');
    var itemBarcode = $(e.relatedTarget).attr('data-id-barcode');
    var itemPrice = $(e.relatedTarget).attr('data-id-price');
    var itemQuantity = $(e.relatedTarget).attr('data-id-quantity');
    var itemCategory = $(e.relatedTarget).attr('data-id-category');
    var itemOutOfStockSelling = $(e.relatedTarget).attr('data-id-outOfStockSelling');
    document.getElementById("itemID").value = itemID;
    document.getElementById("itemName").value = itemName;
    document.getElementById("itemBarcode").value = itemBarcode;
    document.getElementById("itemPrice").value = itemPrice;
    document.getElementById("itemQuantity").value = itemQuantity;
    document.getElementById("itemCategory").value = itemCategory;
    if (itemOutOfStockSelling == 1) {
        document.getElementById("itemOutOfStockSelling").checked = true;
    } else document.getElementById("itemOutOfStockSelling").checked = false;


});
</script>
@endsection
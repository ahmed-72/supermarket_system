@extends('parent')

@section('extraCSS')
@endsection

@section('pageName') Customers @endsection

@section('pagePath') Customers @endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid pt-10" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Customers</span>
                    <span class="text-muted mt-1 fw-bold fs-7">We have {{$customers->count()}} Customers</span>
                </h3>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                        data-bs-target="#modal_new_customer">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->New Customer
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
                                <th class="ps-4 min-w-250px rounded-start">Name</th>
                                <th class="min-w-125px">email</th>
                                <th class="min-w-125px">phone</th>
                                <th class="min-w-200px">DOB</th>
                                <th class="min-w-100px"></th>
                                <th class="min-w-100px text-end rounded-end"></th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <img src="/storage/{{$customer->avatar}}" class="" alt="">
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-dark fw-bolder text-hover-primary mb-1 fs-6">
                                                {{$customer->name}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                        {{$customer->email}}</div>
                                </td>
                                <td>
                                    <div href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                        {{$customer->phone}}</div>
                                </td>
                                <td>
                                    <div href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                        {{$customer->dob}}</div>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                        data-bs-toggle="modal" data-bs-target="#modal_edit_customer"
                                        data-id-id="{{$customer->id}}" data-id-name="{{$customer->name}}"
                                        data-id-email="{{$customer->email}}" data-id-phone="{{$customer->phone}}"
                                        data-id-dob="{{$customer->dob}}">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    </td><td>
                                    <form action="{{route('customer.destroy',$customer->id)}}" method="post"> @csrf @method('delete')
                                    <button type="submit" href="" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
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
                {{$customers->links()}}

            </div>
            <!--begin::Body-->
        </div>
    </div>
</div>
<!--begin::Modal new customer -->
<div class="modal fade" id="modal_new_customer" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>{{__('New Customer')}}</h2>
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
                    action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 fv-row">
                        <!--begin::Row-->
                        <div class="row fv-row fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-12">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Name')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" name="name" value="">
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
                            <div class="col-12">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('E-mail')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="email" class="form-control form-control-solid" name="email" value="">
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
                                    <span class="required">{{__('Phone Number')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" name="phone" value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Date Of Birth')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="date" class="form-control form-control-solid" name="dob" value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
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
                        <input type="file" class="form-control form-control-solid" name="image" value="">
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
<!--end::Modal  new customer-->
<!--begin::Modal edit customer -->
<div class="modal fade" id="modal_edit_customer" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>{{__('Edit Customer')}}</h2>
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
                    action="{{route('customer.update')}}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="col-md-12 fv-row">
                        <!--begin::Row-->
                        <div class="row fv-row fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-12">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Name')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" name="name" id="name"
                                    value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <input type="hidden" class="form-control form-control-solid" name="id" id="id"
                                    value="">
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="col-md-12 fv-row">
                        <!--begin::Row-->
                        <div class="row fv-row fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-12">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('E-mail')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="email" class="form-control form-control-solid" name="email" id="email"
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
                                    <span class="required">{{__('Phone Number')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" name="phone" id="phone"
                                    value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">{{__('Date Of Birth')}}</span>
                                </label>
                                <!--end::Label-->
                                <input type="date" class="form-control form-control-solid" name="dob" id="dob" value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
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
<!--end::Modal  edit customer-->
@endsection

@section('extraJS')
<script>
$('#modal_edit_customer').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).attr('data-id-id');
    var name = $(e.relatedTarget).attr('data-id-name');
    var email = $(e.relatedTarget).attr('data-id-email');
    var phone = $(e.relatedTarget).attr('data-id-phone');
    var dob = $(e.relatedTarget).attr('data-id-dob');
    document.getElementById("id").value = id;
    document.getElementById("name").value = name;
    document.getElementById("email").value = email;
    document.getElementById("phone").value = phone;
    document.getElementById("dob").value = dob;

});
</script>
@endsection
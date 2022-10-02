<div class="me-3">
    <a href="#" class="btn btn-icon btn-custom btn-active-color-primary position-relative pulse pulse-warning" data-kt-menu-trigger="click"
        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <!--begin::Svg Icon | path: icons/duotune/general/gen007.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3"
                    d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z"
                    fill="black"></path>
                <path
                    d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z"
                    fill="black"></path>
            </svg>
        </span>
        <!--end::Svg Icon-->
        @if(Auth::user()->unreadNotifications->count()>0 )
        <span
            class="bullet bullet-dot bg-warning h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
            <span class="pulse-ring xl-n1 color-danger"></span>
            @endif
    </a>
    <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px " data-kt-menu="true">
        <!--begin::Heading style="background-image:url('{{asset(`media/misc/pattern-1.jpg`)}}')"-->
        <div class="d-flex flex-column bgi-no-repeat rounded-top bg-info">
            <!--begin::Title-->
            <h3 class="text-white fw-bold px-9 mt-10 mb-6">{{__('Notifications')}}
                <span class="fs-7 opacity-75 ps-3">{{Auth::user()->unreadNotifications->count()}} {{__('UNread Notifications')}} </span>
            </h3>
            <!--end::Title-->
            <!--begin::Tabs-->
            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 px-4 active" data-bs-toggle="tab"
                        href="#kt_topbar_notifications_1">{{__('Un Read')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 " data-bs-toggle="tab"
                        href="#kt_topbar_notifications_2">{{__('old')}}</a>
                </li>
            </ul>
            <!--end::Tabs-->
        </div>
        <!--end::Heading-->
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab panel-->
            <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">
                <!--begin::Items-->
                <div class="scroll-y mh-325px my-5 px-3">
                    @if(Auth::user()->unreadNotifications->count() >0)
                    @foreach(Auth::user()->unreadNotifications->take(8) as $notification)
                    <!--begin::Item-->
                    <div class="d-flex flex-stack py-4">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center me-2">
                            <!--begin::Code-->
                            <span class="badge badge-light-success fs-9 me-4" style="width:max(100px) ;">{{__($notification->data['title'])}}</span>
                            <!--end::Code-->
                            <!--begin::Title-->
                            <a href="{{route('dashboard.messages',['notificationID'=>$notification->id])}}"
                                class="text-gray-800 text-hover-primary fw-bold">{{$notification->data['body']}}</a>
                            <!--end::Title-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Label-->
                        <span class="badge badge-light fs-9">{{$notification->created_at->diffForHumans()}}</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Item-->
                    @endforeach
                    @else
                    <span class="fs-5 opacity-75 ps-3">{{__('Looks like you don\'t have any new notifications!')}}</span>
                    @endif
                </div>
                <!--end::Items-->
                <!--begin::View more-->
                <div class=" text-center border-top">
                    <a href="{{route('dashboard.messages')}}"
                        class="btn btn-color-gray-600 btn-active-color-primary">{{__('View All')}}
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                        <span class="svg-icon svg-icon-5">
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
                    </a>
                </div>
                <!--end::View more-->
            </div>
            <!--end::Tab panel-->
            <!--begin::Tab panel-->
            <div class="tab-pane fade" id="kt_topbar_notifications_2" role="tabpanel">
                <!--begin::Items-->
                <div class="scroll-y mh-325px my-5 px-8">
                    @foreach(Auth::user()->readNotifications->take(10) as $notification)
                    <!--begin::Item-->
                    <div class="d-flex flex-stack py-4">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center me-2">
                            <!--begin::Title-->
                            <a href="#"
                                class="text-gray-800 text-hover-primary fw-bold">{{$notification->data['body']}}</a>
                            <!--end::Title-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Label-->
                        <span class="badge badge-light fs-8">{{$notification->created_at->diffForHumans()}}</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Item -->
                    @endforeach
                </div>
                <!--end::Items-->
                <!--begin::View more-->
                <div class=" text-center border-top">
                    <a href="{{route('dashboard.messages')}}"
                        class="btn btn-color-gray-600 btn-active-color-primary">{{__('View All')}}
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                        <span class="svg-icon svg-icon-5">
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
                    </a>
                </div>
                <!--end::View more-->
            </div>
            <!--end::Tab panel-->
        </div>
        <!--end::Tab content-->
    </div>
    <!--end::Menu-->
</div>
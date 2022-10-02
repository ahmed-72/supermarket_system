<div class="me-3">
    <a href="" class="btn btn-icon btn-custom btn-active-color-primary" data-kt-menu-trigger="click"
        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path
                    d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                    fill="black"></path>
                <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black"></rect>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </a>
    <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
        data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <!--begin::Avatar-->
                <div class="symbol symbol-50px me-5">
                    <span class="menu-icon">
                        <span class="svg-icon svg-icon-info svg-icon-4x">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                        fill="#ffffff" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                        fill="#ffffff" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </span>
                </div>
                <!--end::Avatar-->
                <!--begin::Username-->
                <div class="d-flex flex-column">
                    <div class="fw-bolder d-flex align-items-center fs-5">{{Auth::user()->name}}
                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                    </div>
                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{Auth::user()->email}}</a>
                </div>
                <!--end::Username-->
            </div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <a href="{{route('user.show',Auth::user()->id)}}" class="menu-link px-5">{{__('My Profile')}}</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">{{__('Language')}}
                    <span
                        class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">@if(session('locale')=='en')
                        English @elseif (session('locale')=='ar')العربية@else English @endif
                        <img class="w-15px h-15px rounded-1 ms-2" @if(session('locale')=='en' )
                            src="{{asset('assets/media/flags/united-states.svg')}} @elseif(session('locale')=='ar')src="
                            {{asset('assets/media/flags/saudi-arabia.svg')}}" @endif" alt=""></span></span>
            </a>
            <!--begin::Menu sub-->
            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{URL::current()}}?lang=en"
                        class="menu-link d-flex px-5 @if (session('locale')=='en') active @endif">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="{{asset('assets/media/flags/united-states.svg')}}" alt="">
                        </span>English</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{URL::current()}}?lang=ar"
                        class="menu-link d-flex px-5 @if (session('locale')=='ar') active @endif">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="{{asset('assets/media/flags/saudi-arabia.svg')}}" alt="">
                        </span>العربية</a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu sub-->
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" class="menu-link px-5 btn btn-light btn-active-danger" style="border:none ;" value="{{__('Sign Out')}}">
            </form>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::Menu-->
</div>
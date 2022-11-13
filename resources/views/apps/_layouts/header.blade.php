<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <!--begin::Container-->
    <div class="container-xxl d-flex flex-grow-1 flex-stack">
        <!--begin::Header Logo-->
        <div class="d-flex align-items-center me-5">
            <!--begin::Heaeder menu toggle-->
            <div class="d-lg-none btn btn-icon btn-active-color-primary w-30px h-30px ms-n2 me-3"
                id="kt_header_menu_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-2">
                    <img src="{{ asset('themes/assets/media/icons/duotune/abstract/abs015.svg') }}" />
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Heaeder menu toggle-->
            <a href="{{ url('/') }}">
                <img alt="Logo" src="{{ asset('logo/logo-name.png') }}" class="theme-light-show h-20px h-lg-30px" />
                <img alt="Logo" src="{{ asset('logo/logo-admin.png') }}" class="theme-dark-show h-20px h-lg-30px" />
            </a>
            {{-- <h1 class="fs-1x fw-bold ms-2"> BALAI PENGAMANAN FASILITAS KESEHATAN MAKASSAR
            </h1> --}}
        </div>
        <!--end::Header Logo-->
        <!--begin::Topbar-->
        <div class="d-flex align-items-center flex-shrink-0">
            <!--begin::Theme mode-->
            <div class="d-flex align-items-center ms-3 ms-lg-4 me-lg-2">
                <!--begin::Menu toggle-->
                <a href="#"
                    class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline btn-active-bg-light w-30px h-30px w-lg-40px h-lg-40px"
                    data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                    data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen060.svg-->
                    <span class="svg-icon theme-light-show svg-icon-2">
                        <img src="{{ asset('themes/assets/media/icons/duotune/general/gen060.svg') }}" />
                    </span>
                    <!--end::Svg Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen061.svg-->
                    <span class="svg-icon theme-dark-show svg-icon-2">
                        <img src="{{ asset('themes/assets/media/icons/duotune/general/gen061.svg') }}" />
                    </span>
                    <!--end::Svg Icon-->
                </a>
                <!--begin::Menu toggle-->
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-color fw-semibold py-4 fs-base w-175px"
                    data-kt-menu="true" data-kt-element="theme-mode-menu">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                            <span class="menu-icon" data-kt-element="icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen060.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <img src="{{ asset('themes/assets/media/icons/duotune/general/gen060.svg') }}" />
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Light</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                            <span class="menu-icon" data-kt-element="icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen061.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <img src="{{ asset('themes/assets/media/icons/duotune/general/gen061.svg') }}" />
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Dark</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Theme mode-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
    <!--begin::Separator-->
    <div class="separator"></div>
    <!--end::Separator-->
    <!--begin::Container-->
    <div class="header-menu-container container-xxl d-flex flex-stack h-lg-75px w-100" id="kt_header_nav">
        <!--begin::Menu wrapper-->
        <div class="header-menu flex-column flex-lg-row" data-kt-drawer="true"
            data-kt-drawer-activate="{default: true, lg: false}"
            data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
            data-kt-drawer-toggle="#kt_header_menu_toggle" data-kt-swapper="true"
            data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
            <!--begin::Menu-->
            <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-state-primary menu-title-gray-800 menu-arrow-gray-400 align-items-stretch flex-grow-1 my-5 my-lg-0 px-2 px-lg-0 fw-semibold fs-6"
                id="#kt_header_menu" data-kt-menu="true">
                <!--begin:Menu item-->
                {{-- <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <a href="/" class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link py-3">
                            <span class="menu-title">Home</span>
                        </span>
                    </a>
                </div> --}}

                <div class="menu-item @stack('home') show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <a href="{{ url('/') }}"
                        class="menu-item @stack('home')  show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link py-3">
                            <span class="menu-title">Home</span>
                        </span>
                    </a>
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->

                <div class="menu-item @stack('kalibrasi')  show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <a href="{{ url('kalibrasi') }}"
                        class="menu-item @stack('kalibrasi')  show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link py-3">
                            <span class="menu-title">Daftar Kemampuan</span>
                        </span>
                    </a>
                </div>
                {{-- <div class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <a href="{{ url('kalibrasi') }}" class="menu-active-bg me-0 me-lg-2">
                        <span class="menu-link py-3">
                            <span class="menu-title">Daftar Kalibrasi</span>
                        </span>
                    </a>
                </div> --}}
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div class="menu-item @stack('permohonan')  show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <a href="{{ url('permohonan') }}"
                        class="menu-item @stack('permohonan')  show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link py-3">
                            <span class="menu-title">Ajukan Permohonan</span>
                        </span>
                    </a>
                </div>
                {{-- <div class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <a href="{{ url('permohonan') }}" class="menu-active-bg me-0 me-lg-2">
                        <span class="menu-link py-3">
                            <span class="menu-title">Ajukan Permohonan</span>
                        </span>
                    </a>
                </div> --}}
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::Container-->
</div>

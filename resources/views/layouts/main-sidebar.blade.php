<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    \
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ URL::asset($company_data->logo) }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::User()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::User()->email }}</span>
                </div>
            </div>
        </div>





        <ul class="side-menu">
            @can('لوحة القياده')
                <li class="side-item side-item-category">الرئيسيه</li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('home') }}"><svg xmlns="http://www.w3.org/2000/svg"
                            class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label">لوحة القيادة</span></a>
                </li>
            @endcan


            @can('لوحة القياده للبائع')
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('vendorMain') }}"><svg xmlns="http://www.w3.org/2000/svg"
                            class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label">لوحة القيادة للبائع</span></a>
                </li>
            @endcan







            @can('معلومات الانشطه')
                <li class="side-item side-item-category">معلومات الانشطه</li>
                @can('الانشطه')
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                                <path
                                    d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                            </svg><span class="side-menu__label">الانشطه</span><i class="angle fe fe-chevron-down"></i></a>

                        <ul class="slide-menu">

                            @can('جميع الانشطه')
                                <li><a class="slide-item" href="{{ route('activities') }}"> جميع
                                        الانشطه</a></li>
                            @endcan

                            @can('اضافة نشاط')
                                <li><a class="slide-item" href="{{ route('activities.create') }}">اضافة
                                        نشاط</a></li>
                            @endcan
                        </ul>



                    </li>
                @endcan

            @endcan














            @can('تسوق')
                <li class="side-item side-item-category">تسوق</li>
                @can('التصنيفات')
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                                <path
                                    d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                            </svg><span class="side-menu__label">التصنيفات</span><i class="angle fe fe-chevron-down"></i></a>
                        @can('جميع التصنيفات')
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{ url('/dashboard/' . ($page = 'categories')) }}"> جميع
                                        التصنيفات</a></li>
                            </ul>
                        @endcan






                    </li>
                @endcan
                @can('المنتجات')
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
                            </svg><span class="side-menu__label">المنتجات</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            @can('جميع المنتجات')
                                <li><a class="slide-item" href="{{ url('/dashboard/' . ($page = 'products')) }}">جميع
                                        المنتجات</a></li>
                            @endcan
                            @can('المنتجات الغير مفعله')
                                <li><a class="slide-item" href="{{ route('products.inactive') }}">
                                        المنتجات الغير مفعله
                                    </a></li>
                            @endcan

                            {{-- @can('المتتجات الخاصه')
                                <li><a class="slide-item" href="{{ route('products.special') }}">
                                        المنتجات الخاصه بك
                                    </a></li>
                            @endcan
                            @can('اضافة منتج')
                                <li><a class="slide-item" href="{{ route('products.create') }}">اضافة
                                        منتج</a></li>
                            @endcan --}}
                            {{-- <li><a class="slide-item" href="{{ url('/dashboard/' . ($page = 'calendar')) }}">تعديل المنتج</a>
                    </li> --}}

                        </ul>
                    </li>
                @endcan

                @can('القسائم')
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8c.28 0 .5-.22.5-.5 0-.16-.08-.28-.14-.35-.41-.46-.63-1.05-.63-1.65 0-1.38 1.12-2.5 2.5-2.5H16c2.21 0 4-1.79 4-4 0-3.86-3.59-7-8-7zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 10 6.5 10s1.5.67 1.5 1.5S7.33 13 6.5 13zm3-4C8.67 9 8 8.33 8 7.5S8.67 6 9.5 6s1.5.67 1.5 1.5S10.33 9 9.5 9zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 6 14.5 6s1.5.67 1.5 1.5S15.33 9 14.5 9zm4.5 2.5c0 .83-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5.67-1.5 1.5-1.5 1.5.67 1.5 1.5z"
                                    opacity=".3" />
                                <path
                                    d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10c1.38 0 2.5-1.12 2.5-2.5 0-.61-.23-1.21-.64-1.67-.08-.09-.13-.21-.13-.33 0-.28.22-.5.5-.5H16c3.31 0 6-2.69 6-6 0-4.96-4.49-9-10-9zm4 13h-1.77c-1.38 0-2.5 1.12-2.5 2.5 0 .61.22 1.19.63 1.65.06.07.14.19.14.35 0 .28-.22.5-.5.5-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.14 8 7c0 2.21-1.79 4-4 4z" />
                                <circle cx="6.5" cy="11.5" r="1.5" />
                                <circle cx="9.5" cy="7.5" r="1.5" />
                                <circle cx="14.5" cy="7.5" r="1.5" />
                                <circle cx="17.5" cy="11.5" r="1.5" />
                            </svg><span class="side-menu__label">القسائم</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">

                            @can('جميع القسائم')
                                <li><a class="slide-item" href="{{ route('coupons') }}">جميع القسائم</a></li>
                            @endcan
                            @can('اضافة قسيمه')
                                <li><a class="slide-item" href="{{ route('coupons.create') }}">اضافة قسيمه</a></li>
                            @endcan

                        </ul>
                    </li>
                @endcan


            @endcan



            @can('الارصده')
                <li class="side-item side-item-category">الارصدة</li>
                {{-- @can('المنتجات') --}}
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
                        </svg><span class="side-menu__label">ادارة الارصدة</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">

                        {{-- @can('اضافة منتج') --}}
                        <li><a class="slide-item" href="{{ route('withdrawals') }}"> الحركات المالية
                            </a></li>
                        {{-- @endcan --}}


                    </ul>
                </li>
                {{-- @endcan
        
            {{-- @endcan --}}
            @endcan


            @can('الطلبيات')
                <li class="side-item side-item-category">الطلبيات</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                            <path
                                d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                        </svg><span class="side-menu__label">الطلبيات</span><i class="angle fe fe-chevron-down"></i></a>
                    @can('جميع الطلبيات')
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('orders') }}">جميع الطلبيات</a></li>
                            {{-- <li><a class="slide-item" href="{{ url('/' . ($page = 'mail-compose')) }}">Mail Compose</a></li>
                    <li><a class="slide-item" href="{{ url('/' . ($page = 'mail-read')) }}">Read-mail</a></li>
                    <li><a class="slide-item" href="{{ url('/' . ($page = 'mail-settings')) }}">mail-settings</a>
                    </li>
                    <li><a class="slide-item" href="{{ url('/' . ($page = 'chat')) }}">Chat</a></li> --}}
                        </ul>
                    @endcan
                </li>
            @endcan
            @can('الاعدادت العامه')
                <li class="side-item side-item-category">الاعدادت العامه</li>




                @can('ادارة المستخدم')
                    <li class="slide">

                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="side-menu__icon"
                                viewBox="0 0 24 24">
                                <g>
                                    <rect fill="none" />
                                </g>
                                <g>
                                    <g />
                                    <g>
                                        <path
                                            d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z" />
                                        <path
                                            d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z"
                                            opacity=".3" />
                                    </g>
                                    <g>
                                        <path
                                            d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z" />
                                        <path
                                            d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z" />
                                        <path
                                            d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z" />
                                    </g>
                                </g>
                            </svg><span class="side-menu__label">ادارة المستخدم</span><i
                                class="angle fe fe-chevron-down"></i></a>


                        <ul class="slide-menu">
                            @can('المشرفون')
                                <li><a class="slide-item" href="{{ route('user.supervisor') }}"> المشروفون
                                    </a></li>
                            @endcan
                            @can('مزودي الخدمه')
                                <li><a class="slide-item" href="{{ route('user.vendeors') }}"> مزودي الخدمة
                                    </a></li>
                            @endcan
                            @can('العملاء')
                                <li><a class="slide-item" href="{{ route('user') }}"> العملاء
                                    </a></li>
                            @endcan
                            @can('الصلاحيات')
                                <li><a class="slide-item" href="{{ route('roles.index') }}">الصلاحيات</a>
                                </li>
                            @endcan

                            <li><a class="slide-item" href="{{ route('companies') }}">الشركات</a>
                            </li>

                        </ul>
                    </li>
                @endcan






                @can('الاعدادات')
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="side-menu__icon"
                                viewBox="0 0 24 24">
                                <g>
                                    <rect fill="none" />
                                </g>
                                <g>
                                    <g />
                                    <g>
                                        <path
                                            d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z" />
                                        <path
                                            d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z"
                                            opacity=".3" />
                                    </g>
                                    <g>
                                        <path
                                            d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z" />
                                        <path
                                            d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z" />
                                        <path
                                            d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z" />
                                    </g>
                                </g>
                            </svg><span class="side-menu__label">الاعدادات</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">'

                            @can('اعدادت مزودي الخدمه')
                                <li><a class="slide-item" href="{{ route('setting') }}">اعدادات
                                        مزودي الخدمة</a></li>
                            @endcan
                            @can('اعدادت الصفحات')
                                <li><a class="slide-item" href="{{ route('setting_web') }}">الاعدادات الصفحات</a>
                                </li>
                            @endcan


                        </ul>
                    </li>

                @endcan


            @endcan






            @can('عام')
                <li class="side-item side-item-category">عام</li>
                @can('البنرات الاعلانيه')
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('banners') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z"
                                    opacity=".3" />
                                <path
                                    d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z" />
                            </svg><span class="side-menu__label">البنرات الإعلانية</span>
                            {{-- <span
                            class="badge badge-warning side-badge">Hot</span> --}}
                        </a>
                    </li>
                @endcan

                @can('الاداره الماليه')
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('withdrawals.mangment') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z"
                                    opacity=".3" />
                                <path
                                    d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z" />
                            </svg><span class="side-menu__label">الإدارة المالية</span>
                            {{-- <span
                            class="badge badge-warning side-badge">Hot</span> --}}
                        </a>
                    </li>
                @endcan
                @can('ادارة الاشتراكات')
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('subscriptions') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z"
                                    opacity=".3" />
                                <path
                                    d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z" />
                            </svg><span class="side-menu__label">إدارة الإشتراكات</span>
                            {{-- <span
                            class="badge badge-warning side-badge">Hot</span> --}}
                        </a>
                    </li>
                @endcan
            @endcan
        </ul>
    </div>
</aside>
<!-- main-sidebar -->

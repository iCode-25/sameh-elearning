<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo" style="height: 45px">
        <a href="{{ route('admin.index') }}">
            <h1 style="color: #fff">{{ \App\Helpers\TranslationHelper::translate('M:AbdulHamid') }}</h1>
        </a>
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-25px w-25px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-1 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>

    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-0" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">


                    <div class="menu-item {{ activeSingleLink('admin.index') }}">
                        <a class="menu-link" href="{{ route('admin.index') }}">
                            <span class="menu-icon">
                                <i class="ki-solid ki-element-11 fs-2">
                                </i>
                            </span>
                            <span class="menu-title">
                                {{ \App\Helpers\TranslationHelper::translate('Dashboard') }}</span>
                        </a>
                    </div>


                    @if (auth()->guard('admin')->user()->can('roles.view_all', 'admin'))
                        <div class="menu-item {{ activeLink('admin.role.index') }}">
                            <a class="menu-link" href="{{ route('admin.role.index') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-lock fs-2"></i>
                                </span>
                                <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Roles') }}
                                </span>
                            </a>
                        </div>
                    @endif

                     @if (auth()->guard('admin')->user()->can('admins.view_all', 'admin'))
                        <div class="menu-item {{ activeLink('admin.admin.index') }}">
                            <a class="menu-link" href="{{ route('admin.admin.index') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-user-shield fs-2"></i>
                                </span>
                                <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Admins') }}
                                </span>
                            </a>
                        </div>
                    @endif


                    @if (auth()->guard('admin')->user()->can('client.view_all', 'admin'))
                        <div class="menu-item {{ activeLink('admin.client.index') }}">
                            <a class="menu-link" href="{{ route('admin.client.index') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-users fs-2"></i>
                                </span>
                                <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Students') }}
                                </span>
                            </a>
                        </div>
                    @endif



                    @if (auth()->guard('admin')->user()->can('level.view_all', 'admin'))
                        <div class="menu-item {{ activeLink('admin.level') }}">
                            <a class="menu-link" href="{{ route('admin.level.index') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-list-ol fs-2"></i>
                                </span>
                                <span
                                    class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Academic Levels') }}
                                </span>
                            </a>
                        </div>
                    @endif

                    @if (auth()->guard('admin')->user()->can('videos.view_all', 'admin'))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('admin.videos.index') }}">

                            <span class="menu-icon">
                                <i class="fas fa-video fs-2"></i>


                            </span>
                            <span
                                class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Lessons') }}</span>
                        </a>
                    </div>
                @endif

                    @if (auth()->guard('admin')->user()->can('packages.view_all', 'admin'))
                        <div class="menu-item {{ activeLink('admin.packages.index') }}">
                            <a class="menu-link" href="{{ route('admin.packages.index') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-chalkboard-teacher fs-2"></i>
                                </span>
                                <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Monthly Package') }}
                                </span>
                            </a>
                        </div>
                    @endif



                    {{-- @if (auth()->guard('admin')->user()->can('pointssetting.view_all', 'admin'))
                    <div class="menu-item">
                        <a class="menu-link {{ activeLink('admin.pointssetting.index') }}"
                           href="{{ route('admin.pointssetting.index') }}">

                            <span class="menu-icon">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('All points_setting') }}</span>
                        </a>
                    </div>
                @endif --}}

                @if (auth()->guard('admin')->user()->can('controlExpirationDuration.view_all', 'admin'))
                <div class="menu-item {{ activeLink('admin.controlExpirationDuration.index') }}">
                    <a class="menu-link" href="{{ route('admin.controlExpirationDuration.index') }}">
                        <span class="menu-icon">
                            <i class="fas fa-clock fs-2"></i>
                        </span>
                        <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Control the expiration duration') }}
                        </span>
                    </a>
                </div>
            @endif

                {{--بددداية العمل --}}


                    @if (auth()->guard('admin')->user()->can('coupon.view_all', 'admin'))
                    <div class="menu-item {{ activeLink('admin.coupon.index') }}">
                        <a class="menu-link" href="{{ route('admin.coupon.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-tags fs-2"></i>

                            </span>
                            <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Coupon Subscriptions') }}
                            </span>
                        </a>
                    </div>
                @endif 

                @if (auth()->guard('admin')->user()->can('transfers.view_all', 'admin'))
                    <div class="menu-item {{ activeLink('admin.transfer') }}">
                        <a class="menu-link" href="{{route('admin.transfer.index')}}">
                            <span class="menu-icon">
                               <i class="fas fa-exchange-alt fs-2"></i>
                            </span>
                            <span
                                class="menu-title">{{\App\Helpers\TranslationHelper::translate('Online purchase transactions')}} </span>
                        </a>
                    </div>
                    @endif


                     @if (auth()->guard('admin')->user()->can('voucherspage.view_all', 'admin'))
                    <div class="menu-item {{ activeLink('admin.voucherspage') }}">
                        <a class="menu-link" href="{{route('admin.voucherspage.index')}}">
                            <span class="menu-icon">
                               <i class="fas fa-exchange-alt fs-2"></i>
                            </span>
                            <span
                                class="menu-title">{{\App\Helpers\TranslationHelper::translate('Coupon purchase transactions')}} </span>
                        </a>
                    </div>
                    @endif


                    @if (auth()->guard('admin')->user()->can('test.view_all', 'admin'))
                    <div class="menu-item {{ activeLink('admin.test.index') }}">
                        <a class="menu-link" href="{{ route('admin.test.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-question-circle fs-2"></i>
                            </span>
                            <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('tests') }}
                            </span>
                        </a>
                    </div>
                @endif



                    @if (auth()->guard('admin')->user()->can('blogs.view_all', 'admin'))
                        <div class="menu-item {{ activeLink('admin.blog.index') }}">
                            <a class="menu-link" href="{{ route('admin.blog.index') }}">

                                <span class="menu-icon">
                                    <i class="bi bi-file-text fs-2"></i>
                                </span>
                                <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Blogs') }}
                                </span>
                            </a>
                        </div>
                    @endif













                    {{-- notification  --}}

                    {{-- <div class="menu-item pt-5">
                            <div class="menu-content">
                            <span
                         class="menu-heading fw-bold text-uppercase fs-2">{{\App\Helpers\TranslationHelper::translate('notification')}}</span>
                            </div>
                        </div>

                    <div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ hoverLink('admin.notification') ? 'here hover show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-newspaper fs-2"></i>
        </span>
        <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('notification') }}</span>
        <span class="menu-arrow"></span>
    </span>

    <div class="menu-sub menu-sub-accordion">
        @if (auth()->guard('admin')->user()->can('notification.view_all', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.notification.index') }}"
                   href="#">
                    <span class="menu-icon">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('All notification') }}</span>
                </a>
            </div>
        @endif

        @if (auth()->guard('admin')->user()->can('notification.create', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.notification.create') }}"
                   href="#">
                    <span class="menu-icon">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Add notification') }}</span>
                </a>
            </div>
        @endif
    </div>
</div> --}}






                    {{-- <div class="menu-item pt-5">
                            <!--begin:Menu content-->
                            <div class="menu-content">
                            <span
                                class="menu-heading fw-bold text-uppercase fs-2">{{\App\Helpers\TranslationHelper::translate('Photo')}}</span>
                            </div>
                            <!--end:Menu content-->
                        </div>

                          @if (auth()->guard('admin')->user()->can('category_gallery.view_all', 'admin'))
                           <div class="menu-item {{ activeLink('admin.categorygallery') }}">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('admin.categorygallery.index')}}">
											<span class="menu-icon">
												<i class="fas fa-list-ol fs-2"></i>
											</span>
                            <span
                                class="menu-title">{{\App\Helpers\TranslationHelper::translate('gallery Categories')}} </span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    @endif


                      @if (auth()->guard('admin')->user()->can('gallery.view_all', 'admin'))
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.gallery.index')}}">
											<span class="menu-icon">
												  <i class="bi bi-image fs-2"></i>
											</span>
                            <span class="menu-title">{{\App\Helpers\TranslationHelper::translate('gallery')}}</span>
                        </a>
                    </div>
                     @endif --}}


                    {{-- <div class="menu-item pt-5">
                            <div class="menu-content">
                            <span
                                class="menu-heading fw-bold text-uppercase fs-2">{{\App\Helpers\TranslationHelper::translate('Categories & Photo')}}</span>
                            </div>
                        </div>

                     <div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ hoverLink('admin.photo') ? 'here hover show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="bi bi-image fs-2"></i>
        </span>
        <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Photo') }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        @if (auth()->guard('admin')->user()->can('category_gallery.view_all', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.categorygallery.index') }}"
                   href="{{ route('admin.categorygallery.index') }}">
                    <span class="menu-icon">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Gallery Categories') }}</span>
                </a>
            </div>
        @endif

        @if (auth()->guard('admin')->user()->can('gallery.view_all', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.gallery.index') }}"
                   href="{{ route('admin.gallery.index') }}">
                    <span class="menu-icon">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Gallery') }}</span>
                </a>
            </div>
        @endif
    </div>
</div> --}}

                    {{--
<div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ hoverLink('admin.paintscategory') ? 'here hover show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-palette fs-2"></i> <!-- Font Awesome Icon -->

        </span>
        <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('paints category') }}</span>
        <span class="menu-arrow"></span>
    </span>

    <div class="menu-sub menu-sub-accordion">
        @if (auth()->guard('admin')->user()->can('paintscategory.view_all', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.paintscategory.index') }}"
                   href="{{ route('admin.paintscategory.index') }}">
                    <span class="menu-icon">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('All paints category') }}</span>
                </a>
            </div>
        @endif

        @if (auth()->guard('admin')->user()->can('paintscategory.create', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.paintscategory.create') }}"
                   href="{{ route('admin.paintscategory.create') }}">

                    <span class="menu-icon">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Add paints category') }}</span>
                </a>
            </div>
        @endif
    </div>
</div> --}}


                    {{-- @if (auth()->guard('admin')->user()->can('gallery.view_all', 'admin')) --}}
                    {{-- <div class="menu-item pt-5">
                        <div class="menu-content">
                                <span
                                    class="menu-heading fw-bold text-uppercase fs-2">{{\App\Helpers\TranslationHelper::translate('Messages')}}</span>
                        </div>
                    </div>
                     --}}


                    @if (auth()->guard('admin')->user()->can('messages.view_all', 'admin'))
                        <div class="menu-item {{ activeLink('admin.message') }}">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('admin.message.index') }}">

                                <span class="menu-icon">
                                    <i class="ki-solid ki-messages fs-2"></i>
                                </span>
                                <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Messages') }}
                                </span>
                            </a>
                        </div>
                    @endif






                    {{--
          <div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ hoverLink('admin.banner') ? 'here hover show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-images fs-2"></i>
        </span>
        <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('banner') }}</span>
        <span class="menu-arrow"></span>
    </span>

    <div class="menu-sub menu-sub-accordion">
        @if (auth()->guard('admin')->user()->can('banner.view_all', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.banner.index') }}"
                   href="{{ route('admin.banner.index') }}">

                    <span class="menu-icon">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('All banner') }}</span>
                </a>
            </div>
        @endif

        @if (auth()->guard('admin')->user()->can('banner.create', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.banner.create') }}"
                   href="{{ route('admin.banner.create') }}">

                    <span class="menu-icon">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Add banner') }}</span>
                </a>
            </div>
        @endif
    </div>
</div>
 --}}

                    {{-- الاشعارات --}}
                    {{-- <div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ hoverLink('admin.notification') ? 'here hover show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-bell-slash fs-2"></i>
        </span>
        <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('notification') }}</span>
        <span class="menu-arrow"></span>
    </span>

    <div class="menu-sub menu-sub-accordion">


        @if (auth()->guard('admin')->user()->can('notification.create', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.notification.create') }}"
                   href="{{ route('admin.notification.create') }}">
                    <span class="menu-icon">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Add notification') }}</span>
                </a>
            </div>
        @endif
    </div>

</div> --}}



                    <!-- Countries -->
                    {{-- @if (auth()->guard('admin')->user()->can('countries.view_all', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.country') }}" href="{{ route('admin.country.index') }}">
                    <span class="menu-icon">
                        <i class="bi bi-geo-alt fs-2"></i>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Countries') }}</span>
                </a>
            </div>
        @endif --}}

                    <!-- Cities -->
                    {{-- @if (auth()->guard('admin')->user()->can('cities.view_all', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.city') }}" href="{{ route('admin.city.index') }}">
                    <span class="menu-icon">
                        <i class="bi bi-geo-alt fs-2"></i>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Cities') }}</span>
                </a>
            </div>
        @endif --}}

                    <!-- Regions -->
                    {{-- @if (auth()->guard('admin')->user()->can('regions.read', 'admin'))
            <div class="menu-item">
                <a class="menu-link {{ activeLink('admin.regions') }}" href="{{ route('admin.regions.index') }}">
                    <span class="menu-icon">
                        <i class="bi bi-geo-alt fs-2"></i>
                    </span>
                    <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Regions') }}</span>
                </a>
            </div>
        @endif --}}


                    <!-- Contact -->
                    @if (auth()->guard('admin')->user()->can('contact.view_all', 'admin'))
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.contact.index') }}">

                                <span class="menu-icon">
                                    <i class="fas fa-phone-volume fs-2"></i>
                                </span>
                                <span
                                    class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Setting Contact Page') }}</span>
                            </a>
                        </div>
                    @endif


                    <!-- Privacy Policy -->
                    {{-- @if (auth()->guard('admin')->user()->can('privacypolicy.view_all', 'admin'))
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.privacypolicy.index') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-quote-left fs-2"></i>
                                </span>
                                <span
                                    class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Privacy Policy') }}</span>
                            </a>
                        </div>
                    @endif --}}

                    <!-- Terms and Conditions -->
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('admin.termsandcondition.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-quote-left fs-2"></i>
                            </span>
                            <span
                                class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Terms and Conditions') }}</span>
                        </a>
                    </div>


                    {{-- <div class="menu-item d-none {{ activeLink('admin.transaction') }}">
                        <a class="menu-link" href="javascript:void(0);">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-dollar fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                            <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('Transactions') }}
                            </span>
                        </a>
                    </div> --}}


                    @if (auth()->guard('admin')->user()->can('all_settings.view_all', 'admin'))
                        <div class="menu-item {{ activeLink('admin.all_settings') }}">
                            <a class="menu-link" href="{{ route('admin.all_settings.index') }}">

                                <span class="menu-icon">
                                    <i class="ki-solid ki-gear fs-2"></i>
                                </span>
                                <span
                                    class="menu-title">{{ \App\Helpers\TranslationHelper::translate('General Settings') }}</span>
                            </a>
                        </div>
                    @endif
               


                    {{-- @if (auth()->guard('admin')->user()->can('story.view_all', 'admin'))
                        <div class="menu-item {{ activeLink('admin.story.index') }}">
                            <a class="menu-link" href="{{ route('admin.story.index') }}">

                                <span class="menu-icon">
                                    <i class="fas fa-comment-alt fs-2"></i>

                                </span>
                                <span class="menu-title">{{ \App\Helpers\TranslationHelper::translate('story') }}
                                </span>
                            </a>
                        </div>
                    @endif --}}


                    


                </div>
            </div>
        </div>
    </div>
</div>

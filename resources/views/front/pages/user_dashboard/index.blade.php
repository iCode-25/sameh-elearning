 @extends('front.layouts.app')

{{-- @push
    <style>
        .breadcrumb-section {height: 320px!important;}
        .breadcrumb-section .breadcrumb-content {height: 320px!important;}
    </style>
@endpush --}}

@section('content')

    <div
        class="tr-breadcurmb-area tr-breadcurmb-bg mb-30"
        style="background-image: url({{(setting('image_panarea_tow', 'en'))}}); background-size: cover; background-position: center; height: 200px;"
    >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="tr-breadcurmb-content text-center z-index-3">
                        <div class="tr-breadcurmb-title-box">
                            <h3 class="tr-breadcurmb-title">{{ \App\Helpers\TranslationHelper::translate('Customer dashboard') }}</h3>
                        </div>
                        <div class="tr-breadcurmb-list-wrap">
                            <div class="tr-breadcurmb-list">
                                <span><a href="{{route('site.home')}}">{{ \App\Helpers\TranslationHelper::translate('Home') }}</a></span>
                                <span class="dvdr"
                                ><i class="fa-regular fa-angle-right"></i
                                    ></span>
                                <i>{{ \App\Helpers\TranslationHelper::translate('dashboard') }}</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="small-section">
        <div class="container" style="">
            <div class="row">
                 @include('front.includes.side_menu')
                <div class="col">
                    <div class="dashboard_common_table">
                            <h3>{{ \App\Helpers\TranslationHelper::translate('My Hotels bookings') }}</h3>
                            <div class="row">
                            <div class="col-lg-4 mb-3">
                                <div class="dashboard_top_boxed">
                                    <div class="dashboard_top_icon">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                    <div class="dashboard_top_text">
                                        <h3>{{ \App\Helpers\TranslationHelper::translate('Total bookings') }}</h3>
                                        {{-- <h1>{{$total_hotel_bookings}}</h1> --}}
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-4 mb-3">
                                <div class="dashboard_top_boxed">
                                    <div class="dashboard_top_icon">
                                        <i class="fas fa-sync"></i>
                                    </div>
                                    <div class="dashboard_top_text">
                                        <h3>{{ \App\Helpers\TranslationHelper::translate('Paid bookings') }}</h3>
                                        {{-- <h1>{{$paid_hotel_bookings}}</h1> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="dashboard_top_boxed">
                                    <div class="dashboard_top_icon">
                                        <i class="fas fa-x"></i>
                                    </div>
                                    <div class="dashboard_top_text">
                                        <h3>{{ \App\Helpers\TranslationHelper::translate('Unpaid bookings') }}</h3>
                                        {{-- <h1>{{$unpaid_hotel_bookings}}</h1> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{-- *****************************Programmes************************************** --}}

                    <div class="dashboard_common_table mt-3">
                            <h3>{{ \App\Helpers\TranslationHelper::translate('My Programmes bookings') }}</h3>
                            <div class="row">
                            <div class="col-lg-4 mb-3">
                                <div class="dashboard_top_boxed">
                                    <div class="dashboard_top_icon">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                    <div class="dashboard_top_text">
                                        <h3>{{ \App\Helpers\TranslationHelper::translate('Total bookings') }}</h3>
                                        <h1>{{$total_programmes_bookings}}</h1>
                                    </div>
                                </div>
                            </div>





                            <div class="col-lg-4 mb-3">
                                <div class="dashboard_top_boxed">
                                    <div class="dashboard_top_icon">
                                        <i class="fas fa-sync"></i>
                                    </div>
                                    <div class="dashboard_top_text">
                                        <h3>{{ \App\Helpers\TranslationHelper::translate('Paid bookings') }}</h3>
                                        <h1>{{$paid_programmes_bookings}}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="dashboard_top_boxed">
                                    <div class="dashboard_top_icon">
                                        <i class="fas fa-x"></i>
                                    </div>
                                    <div class="dashboard_top_text">
                                        <h3>{{ \App\Helpers\TranslationHelper::translate('Unpaid bookings') }}</h3>
                                        <h1>{{$unpaid_programmes_bookings}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="tr-subscribe-area z-index-2">
        <div class="container">
            <div class="tr-subscribe-bg p-relative fix">
                <div class="tr-subscribe-img d-none d-lg-block">
                    <img src="{{ (setting('Subscribe_image', 'en'))}}" alt=""/>
                </div>
                <div class="tr-subscribe-circle d-none d-lg-block">
                    <span></span>
                </div>
                <div class="row">
                    <div class="offset-xl-5 offset-lg-5 col-xl-7 col-lg-7">
                        <div class="tr-subscribe-tittle-box mb-35">
                            <h3 class="tr-section-title mb-20 text-white">
                                <br/>
                                {{ setting('section_five_title_one', app()->getLocale()) }}
                            </h3>
                            <p>
                                {!! setting('section_five_description_one', app()->getLocale()) !!}
                            </p>
                        </div>
                        <div class="tr-subscribe-form">
                            <form action="#">
                                <div class="tr-subscribe-input p-relative">
                                    <input type="text" placeholder="{{ \App\Helpers\TranslationHelper::translate('Your email...') }}"/>
                                    <button
                                        class="tr-subscribe-button tr-btn-green light-green"
                                        type="submit"
                                    >
                                        {{ \App\Helpers\TranslationHelper::translate('Subscribe') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

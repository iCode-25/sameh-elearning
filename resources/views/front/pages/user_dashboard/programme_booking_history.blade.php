@extends('front.layouts.app')

@push('css')
    <style>
        .breadcrumb-section {
            height: 320px !important;
        }

        .breadcrumb-section .breadcrumb-content {
            height: 320px !important;
        }
    </style>
@endpush

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
                            <h3 class="tr-breadcurmb-title">{{ \App\Helpers\TranslationHelper::translate('Programme bookings') }}</h3>
                        </div>
                        <div class="tr-breadcurmb-list-wrap">
                            <div class="tr-breadcurmb-list">
                                <span><a href="{{route('site.home')}}">{{ \App\Helpers\TranslationHelper::translate('Home') }}</a></span>
                                <span class="dvdr"
                                ><i class="fa-regular fa-angle-right"></i
                                    ></span>
                                <i>{{ \App\Helpers\TranslationHelper::translate('Programme bookings') }}</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <section class="breadcrumb-section pt-0">
        <img src="{{ asset('end-user/assets/images/profile.png') }}" class="bg-img img-fluid blur-up lazyload" alt="">
        <div class="breadcrumb-content">
            <div>
                <h2>Hotel booking</h2>
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hotel booking</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="title-breadcrumb">Rica</div>
    </section> --}}










    <section class="small-section">
        <div class="container">
            <div class="row">
                @include('front.includes.side_menu')
                <div class="col">
                    <div class="dashboard_common_table">
                        <h3>{{ \App\Helpers\TranslationHelper::translate('Programme bookings') }}</h3>
                        @if(isset($programme_bookings) && $programme_bookings->count() > 0)
                            <div class="table-responsive-lg table_common_area">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ \App\Helpers\TranslationHelper::translate('Sl no.') }}</th>
                                        <th>{{ \App\Helpers\TranslationHelper::translate('Booking ID') }}</th>
                                        <th>{{ \App\Helpers\TranslationHelper::translate('Booking Amount') }}</th>
                                         <th>{{ \App\Helpers\TranslationHelper::translate('Name Programme') }}</th>
                                        <th>{{ \App\Helpers\TranslationHelper::translate('Payment Method') }}</th>
                                        <th>{{ \App\Helpers\TranslationHelper::translate('Payment Status') }}</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($programme_bookings as $programme_booking)
                                        <tr>
                                            <td>{{$loop->iteration}}.</td>
                                            <td>#{{$programme_booking->serial}}</td>
                                            <td>{{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}} {{number_format($programme_booking->total, 2)}}</td>
                                            <td>
                                    <a href="{{ route('trip_details', ['id' => $programme_booking->programme_id]) }}">
                                          {{ $programme_booking->programme->name }}
                                    </a>
                                            </td>
                                            <td>{{\App\Helpers\TranslationHelper::translate($programme_booking->payment_method)}}</td>
                                            <td class="{{$programme_booking->payment_status == 'paid' ? 'complete' : 'cancele'}}">{{\App\Helpers\TranslationHelper::translate($programme_booking->payment_status)}}</td>
                                            <td>
                                                {{-- <i class="fas fa-eye"></i> --}}
                                                {{--                                                <a href="{{route('user.dashboard.hotel.bookings.show', $programme_booking->id)}}"><i class="fas fa-eye"></i></a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="row py-5">
                                <div class="col-lg-12 text-center">
                                    <h2 class="mb-4">{{ \App\Helpers\TranslationHelper::translate('There is no Bookings') }}</h2>
                                    <img src="{{asset('end-user/assets/images/not_found.png')}}" alt="not_found"
                                         class="" style="width: 100px">
                                </div>
                            </div>
                        @endif

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
                                        {{ \App\Helpers\TranslationHelper::translate('Subscribe ') }}
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

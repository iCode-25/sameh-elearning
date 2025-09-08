@extends('front.layouts.app')

@push('user.css')
    <style>
        .breadcrumb-section {
            height: 320px !important;
        }

        .breadcrumb-section .breadcrumb-content {
            height: 320px !important;
        }

        .special-section.grid-box .special-box .special-content {
            min-height: 234px;
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
                            <h3 class="tr-breadcurmb-title">{{ \App\Helpers\TranslationHelper::translate('Favourite List') }}</h3>
                        </div>
                        <div class="tr-breadcurmb-list-wrap">
                            <div class="tr-breadcurmb-list">
                                <span><a href="{{route('site.home')}}">{{ \App\Helpers\TranslationHelper::translate('Home') }}</a></span>
                                <span class="dvdr"
                                ><i class="fa-regular fa-angle-right"></i
                                    ></span>
                                <i>{{ \App\Helpers\TranslationHelper::translate('Favourite List') }}</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="small-section">
        <div class="container">
            <div class="row">
                @include('front.includes.side_menu')
                <div class="col single-section">
                    <div class="dashboard_common_table">
                        <h3 style="color: #ddd; direction: {{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}" >{{ \App\Helpers\TranslationHelper::translate('Favourite List') }}</h3>
                         <div class="tour_details_boxed description-section tab-section">
                            <div class="menu-top menu-up">
                                <ul class="nav nav-tabs hotels" id="top-tab" role="tablist">
                                    {{-- <li class="nav-item custom_nav"><a data-bs-toggle="tab" class="nav-link "
                                                                       href="#hotels">{{ \App\Helpers\TranslationHelper::translate('Hotels') }}</a></li> --}}
                                    <li class="nav-item custom_nav"><a data-bs-toggle="tab" class="nav-link active"
                                                                       href="#programmes">{{ \App\Helpers\TranslationHelper::translate('Programmes') }}</a>
                                    </li>
                                </ul>
                                <div class="description-details tab-content " id="top-tabContent">
                                    <div class="menu-part tab-pane fade   ratio3_2" id="hotels">
                                        <div class="product-wrapper-grid special-section grid-box" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                                            <div class="row  content grid">
                                                @if(isset($wishes) && $wishes->count() > 0)
                                                    @foreach($wishes as $wish)
                                                        <div
                                                            class="col-xl-4 col-sm-6 popular grid-item  parent_div"
                                                            data-class="popular">
                                                            <div class="special-box">
                                                                <div class="special-img">
                                                                    <a href="{{ route('user.hotels.show',$wish->hotel->id) . '?check_in=' . ((isset(request()->check_in) && request()->check_in != '') ? request()->check_in : \Carbon\Carbon::tomorrow()->format('m/d/Y')) . '&check_out=' . ((isset(request()->check_out) && request()->check_out != '') ? request()->check_out : \Carbon\Carbon::tomorrow()->addDay()->format('m/d/Y')) }}">
                                                                        <img
                                                                            src="{{ asset($wish->hotel->getFirstMediaUrl('hotels')) }}"
                                                                            class="img-fluid blur-up lazyload bg-img"
                                                                            alt="{{$wish->hotel->name}}">
                                                                    </a>
                                                                    <div class="top-icon">
                                                                        @if(auth('web')->check())
                                                                            <a href="javascript:void(0);"
                                                                               class="add_to_fav"
                                                                               data-bs-toggle="tooltip"
                                                                               data-placement="top" title=""
                                                                               onclick="favouriteChange(this)"
                                                                               data-url="{{route('user.hotels.favourite.change', ['id' => $wish->hotel->id])}}"
                                                                               data-original-title="Add to Wishlist">
                                                                                <i class="fa{{checkWish($wish->hotel->id) == 0 ? 's' : 'r'}} fa-heart"></i>
                                                                            </a>
                                                                        @else
                                                                            <a href="{{route('user.login.form')}}"
                                                                               class="add_to_fav"
                                                                               data-bs-toggle="tooltip"
                                                                               data-url="javascript:void(0)"
                                                                               data-placement="top" title=""
                                                                               data-original-title="Add to Wishlist">
                                                                                <i class="far fa-heart"></i>
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                    {{--                                                hotels.favourite.change--}}
                                                                </div>
                                                                <div class="special-content">
                                                                    <a href="{{ route('user.hotels.show',$wish->hotel->id) . '?check_in=' . ((isset(request()->check_in) && request()->check_in != '') ? request()->check_in : \Carbon\Carbon::tomorrow()->format('m/d/Y')) . '&check_out=' . ((isset(request()->check_out) && request()->check_out != '') ? request()->check_out : \Carbon\Carbon::tomorrow()->addDay()->format('m/d/Y')) }}">
                                                                        <h5>{{$wish->hotel->name}} <span><i
                                                                                    class="fas fa-map-marker-alt"></i> {{$wish->hotel->country->name}}</span>
                                                                        </h5>
                                                                    </a>
                                                                    {{--                                                                    <p>--}}
                                                                    {{--                                                                        {{Str::words(strip_tags($wish->hotel->hotel_description), '25')}}--}}
                                                                    {{--                                                                    </p>--}}
                                                                    <div class="bottom-section">
                                                                        <div class="rating">
                                                                            <i class="{{$wish->hotel->star > 0 ? 'fas' : 'far'}} fa-star"></i>
                                                                            <i class="{{$wish->hotel->star > 1 ? 'fas' : 'far'}} fa-star"></i>
                                                                            <i class="{{$wish->hotel->star > 2 ? 'fas' : 'far'}} fa-star"></i>
                                                                            <i class="{{$wish->hotel->star > 3 ? 'fas' : 'far'}} fa-star"></i>
                                                                            <i class="{{$wish->hotel->star > 4 ? 'fas' : 'far'}} fa-star"></i>
                                                                            <span>{{$wish->hotel->rate}} review</span>
                                                                        </div>
                                                                        <div class="price_fac">
                                                                            @if($wish->hotel->rooms->count() > 0)
                                                                                <div class="price">
                                                                                    @if($wish->hotel->rooms->first()->discount > 0)
                                                                                        <del>
                                                                                            ${{$wish->hotel->rooms->first()->price}}</del>
                                                                                        <span>{{getRoomPriceIfDiscount($wish->hotel->rooms->first())}}</span>
                                                                                    @else
                                                                                        <span>${{$wish->hotel->rooms->first()->price}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                            <div class="price">
                                                                                <div class="facility-detail">
                                                                                    @if($wish->hotel->facilitates && $wish->hotel->facilitates->count() > 0)
                                                                                        @foreach($wish->hotel->facilitates as $facility)
                                                                                            <span
                                                                                                class="facility_span">{{$facility->name}}</span>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="label-offer">{{ \App\Helpers\TranslationHelper::translate('hot deal') }}</div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="col-lg-12 text-center">
                                                        <h2 class="mb-4">{{ \App\Helpers\TranslationHelper::translate('There is no Hotels') }}</h2>
                                                        {{-- <img src="{{asset('end-user/assets/images/not_found.png')}}"
                                                             alt="not_found"
                                                             class="" style="width: 100px"> --}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="about menu-part tab-pane fade ratio3_2" id="programmes">
                                        <div class="product-wrapper-grid special-section grid-box">
                                            <div class="row  content grid">
                                                @if(isset($programme_wishes) && $programme_wishes->count() > 0)
                                                    @foreach($programme_wishes as $programme_wish)
                                                        <div class="col-xl-4 col-sm-6 popular grid-item  parent_div">
                                                            <div class="special-box">
                                                                <div class="special-img">
                                                                    <a href="{{ route('trip_details', $programme_wish->id) }}">
                                                                        <img
                                                                            src="{{ $programme_wish->programme->getFirstMediaUrl('programmes') }}"
                                                                            class="img-fluid blur-up lazyload bg-img"
                                                                            alt="">
                                                                    </a>

                                                                                                             <div class="top-icon">
    @if(auth('web')->check())
        <span class="favorite-icon"
              data-bs-toggle="tooltip"
              title="{{ checkProgrammeWish($programme_wish->id) == 0 ? 'Add to Wishlist' : 'Remove from Wishlist' }}"
              onclick="favouriteChange(this)"
      data-url="{{ route('user.programme.favourite.change', ['id' => $programme_wish->id]) }}">
    <i class="fa{{ checkProgrammeWish($programme_wish->id) == 0 ? 'r' : 's' }} fa-heart"></i>
    </span>
    @else
        <span class="favorite-icon"
              data-bs-toggle="tooltip"
              title="Login to add to Wishlist"
              onclick="window.location.href='{{ route('user.login.form') }}'">
            <i class="far fa-heart"></i>
        </span>
    @endif
</div>
                                                                </div>
                                                                <div class="special-content">
                                                                    <a href="{{ route('trip_details', $programme_wish->id) }}">
                                                                        <h5>{{$programme_wish->programme->name}}
                                                                            <span><i class="fas fa-map-marker-alt"></i>
                                                                           {{$programme_wish->programme->country->name}}</span>
                                                                        </h5>
                                                                    </a>
                                                                    <p>
                                                                        {{Str::words(strip_tags($programme_wish->programme->description), '25')}}
                                                                    </p>
                                                                    <div class="bottom-section">

                                                                         <div class="price_fac">
                                                    <div class="price">
                                                        @php
                                                            $currency = app()->getLocale() === 'ar' ? 'ريال' : 'SAR';
                                                        @endphp

                                                        @if ($programme_wish->discount > 0)
                                                            <!-- السعر قبل الخصم -->
                                                            <div
                                                                style="font-size: 18px; color: #2c2a28; display: inline-flex; align-items: center; text-decoration: line-through; margin-bottom: 5px;">
                                                                {{ $programme_wish->price }}
                                                                <span
                                                                    style="margin-left: 5px;">{{ $currency }}</span>
                                                            </div>

                                                            <!-- السعر بعد الخصم -->
                                                            <div
                                                                style="font-weight: bold; font-size: 20px; color: #e98f33; display: inline-flex; align-items: center;">
                                                                {{ getProgrammePriceIfDiscount($programme_wish) }}
                                                                <span
                                                                    style="margin-left: 5px;">{{ $currency }}</span>
                                                            </div>
                                                        @else
                                                            <!-- السعر بدون خصم -->
                                                            <div
                                                                style="font-weight: bold; font-size: 20px; color: #e98f33; display: inline-flex; align-items: center;">
                                                                {{ $programme_wish->price }}
                                                                <span
                                                                    style="margin-left: 5px;">{{ $currency }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="col-lg-12 text-center">
                                                        <h2 class="mb-4">There is no Programmes</h2>
                                                        <img src="{{asset('end-user/assets/images/not_found.png')}}"
                                                             alt="not_found"
                                                             class="" style="width: 100px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

 --}}

<div class="about menu-part tab-pane fade active  show ratio3_2 " id="programmes" style="{{ app()->getLocale() === 'ar' ? 'direction: rtl;' : '' }}">
<div class="product-wrapper-grid special-section grid-box"  style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
   <div class="col-lg-12">
                    <div class="row">
                        <!-- كارت 1 -->
                        @if (isset($programme_wishes) && $programme_wishes->count() > 0)
                            @foreach ($programme_wishes as $programme_wishe)
                                <div class="col-lg-4 col-md-4 mb-4" style="direction " >
                                    <div class="card h-100 card-tiru">
                                        <div class="card-body card-tour-img">
                                            <!-- الشارة (Badge) -->
                                            <span class="badge-new">New</span>
                                            <!-- أيقونة القلب -->
                                            {{-- <span class="favorite-icon"><i class="far fa-heart"></i></span> --}}
                                            <div class="top-icon">
    @if(auth('web')->check())
        <span class="favorite-icon"
              data-bs-toggle="tooltip"
              title="{{ checkProgrammeWish($programme_wishe->programme->id) == 0 ? 'Add to Wishlist' : 'Remove from Wishlist' }}"
              onclick="favouriteChange(this)"
      data-url="{{ route('user.programme.favourite.change', ['id' => $programme_wishe->programme->id]) }}">
    <i class="fa{{ checkProgrammeWish($programme_wishe->id) == 0 ? 'r' : 's' }} fa-heart"></i>
    </span>
    @else
        <span class="favorite-icon"
              data-bs-toggle="tooltip"
              title="Login to add to Wishlist"
              onclick="window.location.href='{{ route('user.login.form') }}'">
            <i class="far fa-heart"></i>
        </span>
    @endif
</div>
                                                {{-- </div> --}}
                                            <!-- صورة المنتج -->
                                            <a href="{{ route('trip_details', $programme_wishe->programme->id) }}">
                                                <img src="{{ $programme_wishe->programme->getFirstMediaUrl('programmes_banners') }}"
                                                    alt=""
                                                    style="
                        width: 100%;
                        height: 200px;
                        object-fit: cover;
                        background-color: #f8f8f8;
                        border-bottom: 1px solid #ddd;
                        padding: 5px;
                    ">
                                            </a>
                                        </div>
                                        <div class="special-content">
                                            <a href="{{ route('trip_details', $programme_wishe->programme->id) }}">
                                                <h5 style="display: block; {{ app()->getLocale() === 'ar' ? 'direction: rtl;' : '' }}">
                                                    {{ $programme_wishe->programme->name }}
                                                </h5>
                                                <span style="display: block; {{ app()->getLocale() === 'ar' ? 'direction: rtl;' : '' }}">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    {{ $programme_wishe->programme->country->name }}
                                                </span>
                                            </a>
                                            {{-- <p>
                                                {!! Str::words(strip_tags($programme_wishe->programme->description), 15) !!}
                                            </p> --}}
                                            <div class="bottom-section">

                                                <div class="price_fac">
                                                    <div class="price">
                                                        @php
                                                            $currency = app()->getLocale() === 'ar' ? 'ريال' : 'SAR';
                                                        @endphp

                                                        @if ($programme_wishe->programme->discount > 0)
                                                            <!-- السعر قبل الخصم -->
                                                            <div
                                                                style="font-size: 18px; color: #2c2a28; display: inline-flex; align-items: center; text-decoration: line-through; margin-bottom: 5px;">
                                                                {{ $programme_wishe->programme->price }}
                                                                <span
                                                                    style="margin-left: 5px;">{{ $currency }}</span>
                                                            </div>

                                                            <!-- السعر بعد الخصم -->
                                                            <div
                                                                style="font-weight: bold; font-size: 20px; color: #e98f33; display: inline-flex; align-items: center;">
                                                                {{ getProgrammePriceIfDiscount($programme_wishe->programme) }}
                                                                <span
                                                                    style="margin-left: 5px;">{{ $currency }}</span>
                                                            </div>
                                                        @else
                                                            <!-- السعر بدون خصم -->
                                                            <div
                                                                style="font-weight: bold; font-size: 20px; color: #e98f33; display: inline-flex; align-items: center;">
                                                                {{ $programme_wishe->programme->price }}
                                                                <span
                                                                    style="margin-left: 5px;">{{ $currency }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        {{-- @endif --}}
                    </div>
                         @else
                                                    <div class="col-lg-12 text-center">
                                                        <h2 class="mb-4">{{ \App\Helpers\TranslationHelper::translate('There is no Programmes') }}</h2>
                                                        <img src="{{asset('end-user/assets/images/not_found.png')}}"
                                                             alt="not_found"
                                                             class="" style="width: 100px">
                                                    </div>
                                                @endif
                                </div>
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




@push('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 <script>
         function favouriteChange(btn) {
        var href = $(btn).attr('data-url');
        var icon = $(btn).find('i');
        let parent_div = $(btn).parent().parent().parent().parent();

        $.ajax({
            type: 'POST',
            url: href,
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function (data) {
                if (data.status === 1) {
                    if (data.new_status === 1) {
                        icon.removeClass('far');
                        icon.addClass('fas');


                        Swal.fire({
                            icon: 'success',
                            text: data.msg,
                            dangerMode: false,
                            confirmButtonColor: '#bf325c',
                            // cancelButtonColor: '#d33',
                            confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate('Thanks') }}',
                            showCloseButton: true,
                        });
                    } else {
                        icon.removeClass('fas');
                        icon.addClass('far');

                        if (parent_div.hasClass('parent_div')) {
                            parent_div.remove();
                        }
                        Swal.fire({
                            icon: 'success',
                            text: data.msg,
                            dangerMode: false,
                            confirmButtonColor: '#bf325c',
                            // cancelButtonColor: '#d33',
                            confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate('Thanks') }}',
                            showCloseButton: true,
                        });
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: data.msg,
                        dangerMode: true,
                        confirmButtonColor: '#bf325c',
                        // cancelButtonColor: '#d33',
                        confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate('Thanks') }}',
                        showCloseButton: true,
                    });
                }
            }
        });
    }
    </script>
@endpush

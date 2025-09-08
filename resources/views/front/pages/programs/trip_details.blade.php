@extends('front.layouts.app')

@section('content')
{{-- {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}} --}}
      <!-- breadcurmb-area-start -->
      <div
        class="tr-breadcurmb-area tr-breadcurmb-bg"
        style="background-image: url({{(setting('image_panarea_tow', 'en'))}}); background-size: cover; background-position: center; height: 200px;"
      >

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-8">
              <div class="tr-breadcurmb-content text-center z-index-3">
                <div class="tr-breadcurmb-title-box">
                  <h3 class="tr-breadcurmb-title">{{ \App\Helpers\TranslationHelper::translate('Trip Details') }}</h3>
                </div>
                <div class="tr-breadcurmb-list-wrap">
                  <div class="tr-breadcurmb-list">
                    <span><a href="{{route('site.home')}}">{{ \App\Helpers\TranslationHelper::translate('Home') }}</a></span>
                    <span class="dvdr"
                      ><i class="fa-regular fa-angle-right"></i
                    ></span>
                    <i>{{optional($programme)->name}}</i>
                  </div>
                </div>
              </div>
            </div>

            {{-- <div class="col-12" style="z-index: 2">
              <div class="breadcrumb-btn">
                <div class="btn-box">
                  <a
                    href="#"
                    class="tr-btn-green"
                    data-fancybox="video"
                    data-src="https://www.youtube.com/watch?v=0GZSfBuhf6Y"
                    data-speed="700"
                  >
                    <i class="fas fa-video-camera me-2"></i>{{ \App\Helpers\TranslationHelper::translate('Video') }}
                  </a>
                  <a
                    href="#"
                    class="tr-btn-green"
                    data-src="images/destination-img.jpg"
                    data-fancybox="gallery"
                    data-caption="Showing image - 01"
                    data-speed="700"
                  >
                    <i class="fas fa-image me-2"></i>{{ \App\Helpers\TranslationHelper::translate('More Photos') }}
                  </a>
                </div>
              </div>
            </div> --}}

          </div>
        </div>
      </div>


      <!-- breadcurmb-area-end -->
      <br /><br />
        <section class="single-section small-section bg-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="imgs tour_details_boxed mb-3">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @if(isset($programme) && $programme->programmeImages && $programme->programmeImages->count() > 0)
                                    @foreach($programme->programmeImages as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($image->getFirstMediaUrl('programme_images', 'programme_images_thumb')) }}"
                                                 class="img-fluid" style="height: 460px; object-fit: cover;" alt="">
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper" style="margin-top: 45px;">
                            <div class="swiper-wrapper">
                                @if(isset($programme) && $programme->programmeImages && $programme->programmeImages->count() > 0)
                                    @foreach($programme->programmeImages as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($image->getFirstMediaUrl('programme_images')) }}"
                                                 class="img-fluid" style="height: 100px; object-fit: cover;" alt="">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="background-color: #fff;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 20px 20px; border-radius: 10px;"  class="col-12 mt-5 pt-5">
                        <div class="hotel_title_section mt-5">
                            <div class="hotel-name p-0">
                                <div class="left-part">
                                    <div class="top">
                                        <h2>{{ optional($programme)->name }}</h2>

                                        <div  class="share-buttons">
                                            <a href="#" class="btn btn-solid"><i class="far fa-share-square"></i>
                                                {{ \App\Helpers\TranslationHelper::translate('share') }}</a>
                                            <a href="#" class="btn btn-solid"><i class="far fa-heart"></i>{{ \App\Helpers\TranslationHelper::translate('save') }}</a>
                                        </div>
                                    </div>
                                    <p><i class="fa-sharp fa-solid fa-location-dot"></i>
                                       {{ optional($programme)->getCompleteAddress() }}
                                    </p>
                                </div>
                                {{-- <div class="right-part">
                                    <div class="rating">
                                        <i class="{{$programme->avg_rate > 0 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$programme->avg_rate > 1 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$programme->avg_rate > 2 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$programme->avg_rate > 3 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$programme->avg_rate > 4 ? 'fas' : 'far'}} fa-star"></i>
                                    </div>
                                    <p>
                                        ({{$programme->rates->where('status', 1)->count()}} {{\App\Helpers\TranslationHelper::translate('reviews','site')}}
                                        )</p>

                                </div> --}}
                            </div>
                        </div>
                        <div class="tour_details_top_bottom">
                            <div class="row w-100">
                                <div class="col">
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>{{ \App\Helpers\TranslationHelper::translate('Duration') }}</h5>
                                            <p>{{$programme->programmeItinerary->count()}} {{\App\Helpers\TranslationHelper::translate('Days')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fa-solid fa-route"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>{{ \App\Helpers\TranslationHelper::translate('Tour type') }}</h5>
                                            <p>{{$programme->tourType->name}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>{{ \App\Helpers\TranslationHelper::translate('Group size') }}</h5>
                                            <p>{{$programme->group_size}} {{ \App\Helpers\TranslationHelper::translate('people') }}</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col">
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fas fa-map-marked"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>Location</h5>
                                            <p>{{$programme->location_name}}</p>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tour_details_boxed description-section">
                        <h3 class="heading_theme"> {{ \App\Helpers\TranslationHelper::translate('Overview') }}  </h3>
                        {!! $programme->description !!}
                    </div>
                    <div style="margin-top: 50px;"></div>
                    <div class="tour_details_boxed description-section tab-section">
                        <h3 class="heading_theme">  {{ \App\Helpers\TranslationHelper::translate('Itinerary') }}</h3>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @if($programme->programmeItinerary->count() > 0)
                                @foreach($programme->programmeItinerary as $key => $day)
                                   <div class="accordion-item" >
    <div class="row align-items-start m-0">
        <div class="col">
    <h2 class="accordion-header">
    <button class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#flush-collapse{{$key}}"
            aria-expanded="false"
            aria-controls="flush-collapse{{$key}}"
            style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
        {{-- {{ \App\Helpers\TranslationHelper::translate('day_' . ($key + 1)) }} --}}
        {{ app()->getLocale() === 'ar' ? 'اليوم ' . ($key + 1) : 'Day ' . ($key + 1) }}
    </button>
</h2>

            <div id="flush-collapse{{$key}}" class="accordion-collapse collapse"
                 data-bs-parent="#accordionFlushExample">
                <div class="accordion-body text-{{ app()->getLocale() === 'ar' ? 'end' : 'start' }}">
                    <ul>
                        @if($day->programmeItineraryItems->count() > 0)
                            @foreach($day->programmeItineraryItems as $item)
                                <li>
                                    <i class="fa-sharp fa-regular fa-circle-dot"></i>
                                    {{ $item->details }}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tour_details_boxed description-section">
                        <h3 class="heading_theme"> {{ \App\Helpers\TranslationHelper::translate('Included') }} </h3>
                        <ul>
                            @if($programme->programmeIncludes->count() > 0)
                                @foreach($programme->programmeIncludes as $include)
                                    <li><i class="fa-sharp fa-regular fa-circle-dot"></i>{{$include->details}}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="tour_details_boxed description-section map">
                        <h3 class="heading_theme">{{ \App\Helpers\TranslationHelper::translate('Tour Location') }}</h3>
                        <div id="map" style="height: 500px;width: 100%">

                        </div>
                    </div>

                    <div class="special-section related-box ratio3_2 grid-box">
                        <div class="slider-3 no-arrow">
                            {{-- @if(isset($related) && $related->count() > 0)
                                @foreach($related as $related_item)
                                    <div>
                                        <div class="special-box">
                                            <div class="special-img">
                                                <a href="{{ route('user.trip_details', $related_item->id) }}">
                                                    <img
                                                        src="{{ asset($related_item->getFirstMediaUrl('programmes')) }}"
                                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                                </a>
                                                <div class="top-icon">
                                                    <a href="#" class="" data-bs-toggle="tooltip"
                                                       data-placement="top" title=""
                                                       data-original-title="Add to Wishlist">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="special-content">
                                                <a href="{{ route('user.trip_details', $related_item->id) }}">
                                                    <h5>
                                                        {{$related_item->name}} <span><i
                                                                class="fas fa-map-marker-alt"></i>
                                                    {{$related_item->country->name}}
                                                        </span>
                                                    </h5>
                                                </a>
                                                <p>
                                                    {!! Str::words(strip_tags($related_item->description), '25') !!}
                                                </p>
                                                <div class="bottom-section">
                                                    <div class="rating">
                                                        <i class="{{$related_item->avg_rate > 0 ? 'fas' : 'far'}} fa-star"></i>
                                                        <i class="{{$related_item->avg_rate > 1 ? 'fas' : 'far'}} fa-star"></i>
                                                        <i class="{{$related_item->avg_rate > 2 ? 'fas' : 'far'}} fa-star"></i>
                                                        <i class="{{$related_item->avg_rate > 3 ? 'fas' : 'far'}} fa-star"></i>
                                                        <i class="{{$related_item->avg_rate > 4 ? 'fas' : 'far'}} fa-star"></i>
                                                        <span>{{$related_item->rates->where('status', 1)->count()}} review</span>
                                                    </div>
                                                    <div class="price">
                                                        <span>$1245 <small> Price starts from </small></span>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="label-offer">hot deal</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif --}}
                             <div class="related-container d-flex flex-nowrap overflow-auto">
    @if (isset($related) && $related->count() > 0)
        @foreach($related as $related_item)
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30" style="flex: 0 0 auto; width: 300px;">
                <div class="tr-trip-item trip-element mb-30">
                    <div class="tr-trip-thumb fix">
                        <a href="{{ route('trip_details', $related_item->id) }}">
                            <img src="{{ $related_item->getFirstMediaUrl('programmes') }}" style="width: 100%; height: 250px; object-fit: cover;" alt="">
                        </a>
                    </div>
                    <div class="tr-trip-content">
                        <a href="#" class="tr-trip-location">
                            <i class="fa-sharp fa-solid fa-location-dot"></i>
                            {{$related_item->city->name}}
                        </a>
                        <a href="{{ route('trip_details', $related_item->id) }}">
                            <h5 class="tr-trip-title"><a class="border-line-black" href="{{route('trip_details', $related_item->id)}}">{{ $related_item->name }}</a></h5>
                        </a>
                        {{-- <div class="rating d-flex align-items-center gap-1">
                            <i class="{{$related_item->avg_rate > 0 ? 'fas' : 'far'}} fa-star text-warning"></i>
                            <i class="{{$related_item->avg_rate > 1 ? 'fas' : 'far'}} fa-star text-warning"></i>
                            <i class="{{$related_item->avg_rate > 2 ? 'fas' : 'far'}} fa-star text-warning"></i>
                            <i class="{{$related_item->avg_rate > 3 ? 'fas' : 'far'}} fa-star text-warning"></i>
                            <i class="{{$related_item->avg_rate > 4 ? 'fas' : 'far'}} fa-star text-warning"></i>
                            <span class="ms-2">{{$related_item->rates->where('status', 1)->count()}} {{ \App\Helpers\TranslationHelper::translate('review') }}</span>
                        </div> --}}
                        {{-- <div class="tr-trip-duration d-flex align-items-center">
                            <span><i class="fa-sharp fa-light fa-clock"></i> Time period:</span>
                            <p>{{ $related_item->programmeItinerary->count() }} days</p>
                        </div> --}}
                           <div class="tr-price-text">
                            <p>
                                 {!! Str::words(strip_tags($related_item->description), 15) !!}
                            </p>
                        </div>
                         <div class="tr-trip-price d-flex align-items-center justify-content-between">
                           <a class="tr-trip-link" href="{{ route('trip_details', $programme->id) }}">{{ \App\Helpers\TranslationHelper::translate('See Details') }}<i class="fa-sharp fa-regular fa-arrow-right-long"></i></a>
                           @if($programme->discount > 0)
                               <div class="d-flex">
                                   <del class="me-2">{{$programme->price}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</del>
                                   <span>{{getProgrammePriceIfDiscount($programme)}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</span>
                               </div>
                           @else
                               <span>${{$programme->price}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</span>
                           @endif
                     </div>

                              {{-- <div class="tour_package_details_bar_price">
                                <h6 class="heading_theme">{{ \App\Helpers\TranslationHelper::translate('Price') }}</h6>
                                <div class="tour_package_bar_price d-flex align-items-end">
                                    @if($programme->discount > 0)
                                        <h6 class="pe-2">
                                            <del>{{number_format($programme->price, 1)}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</del>
                                        </h6>
                                        <h3 class="pe-2 colored-main">  {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}} {{getProgrammePriceIfDiscount($programme)}}  <sub>{{ \App\Helpers\TranslationHelper::translate('/Per') }}
                                                {{ \App\Helpers\TranslationHelper::translate('Person') }}</sub></h3>
                                    @else
                                        <h3 class="pe-2 colored-main">$ {{number_format($programme->price, 1)}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}} <sub>{{ \App\Helpers\TranslationHelper::translate('/Per') }}
                                                {{ \App\Helpers\TranslationHelper::translate('Person') }}</sub></h3>
                                    @endif
                                </div>
                            </div> --}}


                        {{-- <div class="tr-trip-price d-flex align-items-center justify-content-between">
                            <a class="tr-trip-link" href="{{ route('user.trip_details', $related_item->id) }}">See Details<i class="fa-sharp fa-regular fa-arrow-right-long"></i></a>
                            @if($related_item->discount > 0)
                                <del>{{$related_item->price}}</del>
                                <span>{{getProgrammePriceIfDiscount($related_item)}}</span>
                            @else
                                <span>${{$related_item->price}}</span>
                            @endif
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4" id="booking">
                    <div class="">
                        <div class="single-sidebar tour_details_boxed">
                            <div class="tour_details_right_box_heading">
                                <h3 class="heading_theme">{{ \App\Helpers\TranslationHelper::translate('Programme Details') }}</h3>
                            </div>
                            <div class="valid_date_area d-flex">
                                {{-- <div class="valid_date_area_one px-2">
                                    <h6 class="colored-main" style=" color: #e98f33;" >{{ \App\Helpers\TranslationHelper::translate('Valid from') }}</h6>
                                    <p>{{\Carbon\Carbon::parse($programme->valid_from)->format('d M Y')}}</p>
                                </div>
                                <div class="valid_date_area_one px-2">
                                    <h6 class="colored-main"   style=" color: #e98f33;">{{ \App\Helpers\TranslationHelper::translate('Valid till') }}</h6>
                                    <p>{{\Carbon\Carbon::parse($programme->valid_to)->format('d M Y')}}</p>
                                </div> --}}
                                <div class="valid_date_area_one px-2">
    <h6 class="colored-main" style="color: #e98f33;">
        {{ \App\Helpers\TranslationHelper::translate('Valid from') }}
    </h6>
    <p>
        {{ \Carbon\Carbon::parse($programme->valid_from)->translatedFormat(App::getLocale() == 'ar' ? 'd F Y' : 'd M Y') }}
    </p>
</div>
<div class="valid_date_area_one px-2">
    <h6 class="colored-main" style="color: #e98f33;">
        {{ \App\Helpers\TranslationHelper::translate('Valid till') }}
    </h6>
    <p>
        {{ \Carbon\Carbon::parse($programme->valid_to)->translatedFormat(App::getLocale() == 'ar' ? 'd F Y' : 'd M Y') }}
    </p>
</div>

                            </div>
                            {{-- <div class="tour_package_details_bar_list mt-3">
                                <h6 class="heading_theme"  style="">{{ \App\Helpers\TranslationHelper::translate('Programme details') }}</h6>
                                <ul>
                                    @if($programme->programmeIncludes->count() > 0)
                                        @foreach($programme->programmeIncludes as $include)
                                            <li><i class="fa-sharp fa-regular fa-circle-dot"></i>{{$include->details}}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div> --}}
                                <div class="tour_package_details_bar_price">
                                <h6 class="heading_theme">{{ \App\Helpers\TranslationHelper::translate('Price') }}</h6>
                                <div class="tour_package_bar_price d-flex align-items-end">
                                    @if($programme->discount > 0)
                                     <h6 class="pe-2" style="display: inline-flex; gap: 5px; align-items: baseline; text-decoration: line-through;">
    <span>{{ number_format($programme->price, 1) }}</span>
    <span>{{ app()->getLocale() === 'ar' ? 'ريال' : 'SAR' }}</span>
         </h6>
<h3 class="pe-2 colored-main" style="display: inline-flex; gap: 5px; align-items: baseline;">
    <span>{{ getProgrammePriceIfDiscount($programme) }}</span>
    <span>{{ app()->getLocale() === 'ar' ? 'ريال' : 'SAR' }}</span>
    <sub style="margin-left: 5px;">
        {{ \App\Helpers\TranslationHelper::translate('/Per') }}
        {{ \App\Helpers\TranslationHelper::translate('Person') }}
    </sub>
</h3>
                                    @else
                                        <h3 class="pe-2 colored-main"> {{number_format($programme->price, 1)}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}} <sub>{{ \App\Helpers\TranslationHelper::translate('/Per') }}
                                                {{ \App\Helpers\TranslationHelper::translate('Person') }}</sub></h3>
                                    @endif
                                </div>
                            </div>

                            <form action="{{route('user.programme.form', $programme->id)}}" method="POST"
                                  id="programme_booking_form" class="mt-3 text-left" >
                                @csrf

                               {{-- <div class="flight_Search_boxed date_flex_area mb-3"
                                    ><div class="Journey_date">
                                    <p style="color: rgb(255, 255, 255); direction: rtl">
                                        {{ \App\Helpers\TranslationHelper::translate('Check In date') }}
                                    </p>
                                    <input type="date" id="check_in" name="check_in" style="direction: rtl"
                                        min="{{ \Carbon\Carbon::parse($programme->valid_from)->format('Y-m-d') }}"
                                        max="{{ \Carbon\Carbon::parse($programme->valid_to)->format('Y-m-d') }}">
                                </div>
                                </div> --}}

                                <div class="flight_Search_boxed date_flex_area mb-3">
    <div class="Journey_date" style="direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
        <p style="color: rgb(255, 255, 255);">
            {{ \App\Helpers\TranslationHelper::translate('Check In date') }}
        </p>
        <input
            type="date"
            id="check_in"
            name="check_in"
            style="direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};"
            min="{{ \Carbon\Carbon::parse($programme->valid_from)->format('Y-m-d') }}"
            max="{{ \Carbon\Carbon::parse($programme->valid_to)->format('Y-m-d') }}"
        >
    </div>
</div>



                                <div class="col-12 mb-3">
                                    <div class="flight_Search_boxed dropdown_passenger_area">
<p
    style="color: rgb(255, 255, 255); direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
    {{ \App\Helpers\TranslationHelper::translate('Persons') }}
</p>
                                        <div class="dropdown">
                                            {{-- <button class="dropdown-toggle final-count hotels_persons_count"
                                                    data-toggle="dropdown" type="button" style="color:#fff; direction: rtl"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                0{{ \App\Helpers\TranslationHelper::translate('Person') }}
                                            </button> --}}
                                            <button
    class="dropdown-toggle final-count hotels_persons_count"
    data-toggle="dropdown"
    type="button"
    style="color: #fff; width:100% ; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};"
    id="dropdownMenuButton1"
    data-bs-toggle="dropdown"
    aria-expanded="false">
    0{{ \App\Helpers\TranslationHelper::translate('Person') }}
     </button>

                                            <div class="dropdown-menu dropdown_passenger_info"
                                                 aria-labelledby="dropdownMenuButton1" style="">
                                                <div class="traveller-calulate-persons">

                                                    {{-- <div class="passengers custom_passengers">
                                                        <h6>{{ \App\Helpers\TranslationHelper::translate('Persons') }}</h6>
                                                        <div class="passengers-types">
                                                            <div class="passengers-type">
                                                                <div class="text counted">
                                                                    <span class="count pcount">0</span>
                                                                    <input class="countable" type="hidden" value="0" max="" name="adult_search_count" min="0">
                                                                    <div class="type-label">
                                                                        <p>{{ \App\Helpers\TranslationHelper::translate('Adult') }}</p>
                                                                        <span>{{ \App\Helpers\TranslationHelper::translate('12+ yrs ') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="button-set">
                                                                    <button type="button" class="btn-add plus_btn" onclick="verify_plus_search_count(this)">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                    <button type="button" class="btn-subtract minus_btn" onclick="verify_minus_search_count(this)">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="passengers-type">
                                                                <div class="text counted">
                                                                    <span class="count ccount">0</span>
                                                                    <input class="countable" type="hidden" value="0" max="" name="children_search_count" min="0">
                                                                    <div class="type-label">
                                                                        <p class="fz14 mb-xs-0">{{ \App\Helpers\TranslationHelper::translate('Children') }}</p>
                                                                        <span>{{ \App\Helpers\TranslationHelper::translate('2- Less than 12 yrs') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="button-set">
                                                                    <button type="button" class="btn-add plus_btn" onclick="verify_plus_search_count(this)">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                    <button type="button" class="btn-subtract minus_btn" onclick="verify_minus_search_count(this)">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="passengers-type">
                                                                <div class="text counted">
                                                                    <span class="count incount">0</span>
                                                                    <input class="countable" type="hidden" value="0" max="" name="infant_search_count" min="0">
                                                                    <div class="type-label">
                                                                        <p class="fz14 mb-xs-0">{{ \App\Helpers\TranslationHelper::translate('Infant') }}</p>
                                                                        <span>{{ \App\Helpers\TranslationHelper::translate('Less than 2 yrs') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="button-set">
                                                                    <button type="button" class="btn-add plus_btn" onclick="verify_plus_search_count(this)">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                    <button type="button" class="btn-subtract minus_btn" onclick="verify_minus_search_count(this)">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}

        <div class="passengers custom_passengers" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }};">
    <h6>{{ \App\Helpers\TranslationHelper::translate('Persons') }}</h6>
    <div class="passengers-types" >
        <div class="passengers-type">
            <div class="text counted">
                <span class="count pcount">0</span>
                <input class="countable" type="hidden" value="0" max="" name="adult_search_count" min="0">
                <div class="type-label">
                    <p>{{ \App\Helpers\TranslationHelper::translate('Adult') }}</p>
                    <span>{{ \App\Helpers\TranslationHelper::translate('12+ yrs ') }}</span>
                </div>
            </div>
            <div class="button-set">
                <button type="button" class="btn-add plus_btn" onclick="verify_plus_search_count(this)">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn-subtract minus_btn" onclick="verify_minus_search_count(this)">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="passengers-type">
            <div class="text counted">
                <span class="count ccount">0</span>
                <input class="countable" type="hidden" value="0" max="" name="children_search_count" min="0">
                <div class="type-label">
                    <p class="fz14 mb-xs-0">{{ \App\Helpers\TranslationHelper::translate('Children') }}</p>
                    <span>{{ \App\Helpers\TranslationHelper::translate('2- Less than 12 yrs') }}</span>
                </div>
            </div>
            <div class="button-set">
                <button type="button" class="btn-add plus_btn" onclick="verify_plus_search_count(this)">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn-subtract minus_btn" onclick="verify_minus_search_count(this)">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="passengers-type">
            <div class="text counted">
                <span class="count incount">0</span>
                <input class="countable" type="hidden" value="0" max="" name="infant_search_count" min="0">
                <div class="type-label">
                    <p class="fz14 mb-xs-0">{{ \App\Helpers\TranslationHelper::translate('Infant') }}</p>
                    <span>{{ \App\Helpers\TranslationHelper::translate('Less than 2 yrs') }}</span>
                </div>
            </div>
            <div class="button-set">
                <button type="button" class="btn-add plus_btn" onclick="verify_plus_search_count(this)">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn-subtract minus_btn" onclick="verify_minus_search_count(this)">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
    </div>
</div>






                                                </div>
                                            </div>
                                        </div>
                                        {{--   <span>Business</span>--}}
                                    </div>
                                </div>
                            </form>
                             {{-- class="globalBtn mt-3" --}}
                            <div  style="display: inline-flex; align-items: center; gap: 10px; text-decoration: none ;   display: flex;justify-content: center;;">
                                <ul>
                                    {{-- <li>
                                        @if(auth('web')->check())
                                            <a class="tr-btn-green" href="javascript:void(0);" onclick="submitProgrammeBookingForm()">
                                                {{ \App\Helpers\TranslationHelper::translate('book this now') }}
                                                <span></span><span></span><span></span><span></span>
                                            </a>
                                        @else
                                            <a class="tr-btn-green" href="javascript:void(0);" onclick="alert('Please login first to book this programme')">
                                               {{ \App\Helpers\TranslationHelper::translate('book this now') }}
                                                <span></span><span></span><span></span><span></span>
                                            </a>
                                        @endif
                                    </li> --}}
                                    <li>
                                        <!-- عنصر لعرض الرسالة -->
                                        <div id="booking-message" style="color: red; display: none; margin-bottom: 10px;">
                                            <!-- الرسالة ستُعرض هنا -->
                                        </div>

                                        {{-- @if(auth('web')->check())
                                            <a class="tr-btn-green" href="javascript:void(0);" onclick="submitProgrammeBookingForm()">
                                                {{ \App\Helpers\TranslationHelper::translate('book this now') }}
                                                <span></span><span></span><span></span><span></span>
                                            </a>
                                        @else
                                            <a class="tr-btn-green" href="javascript:void(0);" onclick="showBookingMessage()">
                                                {{ \App\Helpers\TranslationHelper::translate('book this now') }}
                                                <span></span><span></span><span></span><span></span>
                                            </a>
                                        @endif --}}


@if(auth('web')->check())
    <a class="tr-btn-green" href="javascript:void(0);" onclick="submitProgrammeBookingForm()">
        {{ \App\Helpers\TranslationHelper::translate('book this now') }}
        <span></span><span></span><span></span><span></span>
    </a>
@else
    <a class="tr-btn-green" href="javascript:void(0);" onclick="showBookingMessage()">
        {{ \App\Helpers\TranslationHelper::translate('book this now') }}
        <span></span><span></span><span></span><span></span>
    </a>
@endif

{{-- <div id="booking-message-popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(0,0,0,0.7); padding: 20px; border-radius: 10px; color: white; width: 300px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
    <p id="booking-message" style="margin-bottom: 20px;"></p>
    <a href="{{ route('user.login.submit') }}" style="background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Go to Login</a>
</div> --}}





                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar tour_details_boxed_star">
                            <h6 class="contact-title">{{ \App\Helpers\TranslationHelper::translate('contact info') }}</h6>
                            <p class="address"><i class="fas fa-map-marker-alt"></i>
                                {{ optional($programme)->getCompleteAddress() }}
                            </p>
                            <p><i class="fas fa-phone-alt"></i> {{$programme->phone}}</p>
                            <a href="#">
                                <p><i class="fas fa-envelope"></i> {{$programme->gmail}}</p>
                            </a>
                            <div class="social-box">
                                <ul>
                                    <li><a href="{{$programme->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{$programme->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{$programme->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="mailto:{{$programme->google}}"><i class="fab fa-google"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="bottom_sec">
                                <h6> : {{ \App\Helpers\TranslationHelper::translate('check-in') }} {{Carbon\Carbon::parse($programme->check_in)->format('h:i a')}}</h6>
                                <h6> : {{ \App\Helpers\TranslationHelper::translate('check-out') }} {{Carbon\Carbon::parse($programme->check_out)->format('h:i a')}}</h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->


      <!-- trip-area-start -->
      {{-- <div class="tr-trip-details-area pt-110 pb-110">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-lg-8">
              <div class="tr-trip-details-left">
                <div class="tr-trip-details-thumb">
                  <img src="assets/img/traip-details-1.jpg" alt="" />
                </div>
                <div class="tr-trip-details-content mb-35">
                  <h4 class="tr-section-title mb-20">
                    Reach New Heights with Digital
                  </h4>
                  <p>
                    Web designing in a powerful way of just not an only
                    professions, however, in a passion for our Company. We have
                    to a tendency to believe the idea that smart looking of any
                    websitet in on visitors.Web designing in a powerful way of
                    just not an only profession Web designing in a powerful way
                    of just not an only
                  </p>
                </div>
                <div class="tr-trip-details-content mb-35">
                  <h4 class="tr-section-title fs-32 mb-20">
                    Transform Your Brand's Digital Future
                  </h4>
                  <p>
                    Web designing in a powerful way of just not an only
                    professions, however, in a passion for our Company. We have
                    to a tendency to believe the idea that smart looking of any
                    websitet in on visitors.Web designing in a powerful way of
                    just not an only profession Web designing in a powerful way
                    of just not an only
                  </p>
                </div>


 --}}

              {{-- غير هام --}}
                {{-- <div class="tr-about-list p-relative mb-35">
                  <ul>
                    <li>
                      <div class="tr-about-list-item p-relative">
                        <span class="tr-about-list-icon"
                          ><i class="fa-solid fa-circle-check"></i
                        ></span>
                        <div class="tr-about-list-content">
                          <span>{{ setting('title_create_memories', app()->getLocale()) }}</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="tr-about-list-item p-relative">
                        <span class="tr-about-list-icon"
                          ><i class="fa-solid fa-circle-check"></i
                        ></span>
                        <div class="tr-about-list-content">
                          <span>{{ setting('title_Find_your_path', app()->getLocale()) }}</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="tr-about-list-item p-relative">
                        <span class="tr-about-list-icon"
                          ><i class="fa-solid fa-circle-check"></i
                        ></span>
                        <div class="tr-about-list-content">
                          <span>{{ setting('title_Where_the_journey', app()->getLocale()) }}</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                 --}}

{{--
                <div class="row">
                  <div class="col-md-6">
                    <div class="tr-trip-details-thumb">
                      <img src="{{ asset(setting('image_one',app()->getLocale())) }}" alt="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="tr-trip-details-thumb">
                      <img src="{{ asset(setting('image_tow',app()->getLocale())) }}" alt="" />
                    </div>
                  </div>
                </div> --}}


              {{-- </div>  --}}

              {{-- <div id="reviews" class="page-scroll">
                <div class="section-block"></div>
                <div class="single-content-item padding-top-40px padding-bottom-40px">
                  <h3 class="title font-size-20">Reviews</h3>
                  <div class="mt-4">
                    <div class="row align-items-center">
                      <div class="col-lg-4">
                        <div class="review-summary">
                          <h2>4.5<span>/5</span></h2>
                          <p>Excellent</p>
                          <span>Based on 4 reviews</span>
                        </div>
                      </div>
                      <!-- end col-lg-4 -->
                      <div class="col-lg-8">
                        <div class="review-bars">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="progress-item">
                                <h3 class="progressbar-title">Service</h3>
                                <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                  <div class="progressbar-box flex-shrink-0">
                                    <div class="progressbar-line" data-percent="70%">
                                      <div class="progressbar-line-item bar-bg-1" style="width: 70%;"></div>
                                    </div>
                                    <!-- End Skill Bar -->
                                  </div>
                                  <div class="bar-percent">4.6</div>
                                </div>
                              </div>
                              <!-- end progress-item -->
                            </div>
                            <!-- end col-lg-6 -->
                            <div class="col-lg-6">
                              <div class="progress-item">
                                <h3 class="progressbar-title">Location</h3>
                                <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                  <div class="progressbar-box flex-shrink-0">
                                    <div class="progressbar-line" data-percent="55%">
                                      <div class="progressbar-line-item bar-bg-2" style="width: 55%;"></div>
                                    </div>
                                    <!-- End Skill Bar -->
                                  </div>
                                  <div class="bar-percent">4.7</div>
                                </div>
                              </div>
                              <!-- end progress-item -->
                            </div>
                            <!-- end col-lg-6 -->
                            <div class="col-lg-6">
                              <div class="progress-item">
                                <h3 class="progressbar-title">
                                  Value for Money
                                </h3>
                                <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                  <div class="progressbar-box flex-shrink-0">
                                    <div class="progressbar-line" data-percent="40%">
                                      <div class="progressbar-line-item bar-bg-3" style="width: 40%;"></div>
                                    </div>
                                    <!-- End Skill Bar -->
                                  </div>
                                  <div class="bar-percent">2.6</div>
                                </div>
                              </div>
                              <!-- end progress-item -->
                            </div>
                            <!-- end col-lg-6 -->
                            <div class="col-lg-6">
                              <div class="progress-item">
                                <h3 class="progressbar-title">Cleanliness</h3>
                                <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                  <div class="progressbar-box flex-shrink-0">
                                    <div class="progressbar-line" data-percent="60%">
                                      <div class="progressbar-line-item bar-bg-4" style="width: 60%;"></div>
                                    </div>
                                    <!-- End Skill Bar -->
                                  </div>
                                  <div class="bar-percent">3.6</div>
                                </div>
                              </div>
                              <!-- end progress-item -->
                            </div>
                            <!-- end col-lg-6 -->
                            <div class="col-lg-6">
                              <div class="progress-item">
                                <h3 class="progressbar-title">Facilities</h3>
                                <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                  <div class="progressbar-box flex-shrink-0">
                                    <div class="progressbar-line" data-percent="50%">
                                      <div class="progressbar-line-item bar-bg-5" style="width: 50%;"></div>
                                    </div>
                                    <!-- End Skill Bar -->
                                  </div>
                                  <div class="bar-percent">2.6</div>
                                </div>
                              </div>
                              <!-- end progress-item -->
                            </div>
                            <!-- end col-lg-6 -->
                          </div>
                          <!-- end row -->
                        </div>
                      </div>
                      <!-- end col-lg-8 -->
                    </div>
                  </div>
                </div>
              </div>
 --}}

              {{-- <div class="review-box mt-4 pt-4">
                <div class="section-block "></div>
                <div class="single-content-item">
                  <h3 class="title font-size-20">Showing 3 guest reviews</h3>
                  <div class="comments-list pt-4">
                    <div class="comment">
                      <div class="comment-avatar">
                        <img class="avatar__img" alt="" src="url({{asset('front/assets/img/breadcurmb.jpg')}})">
                      </div>
                      <div class="comment-body">
                        <div class="meta-data">
                          <h3 class="comment__author">Jenny Doe</h3>
                          <div class="meta-data-inner d-flex">
                            <span class="ratings d-flex align-items-center me-1">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </span>
                            <p class="comment__date mb-0">April 5, 2019</p>
                          </div>
                        </div>
                        <p class="comment-content">
                          Lorem ipsum dolor sit amet, dolores mandamus
                          moderatius ea ius, sed civibus vivendum imperdiet
                          ei, amet tritani sea id. Ut veri diceret fierent
                          mei, qui facilisi suavitate euripidis
                        </p>
                        <div class="comment-reply d-flex align-items-center justify-content-between">
                          <a class="theme-btn" href="#" data-bs-toggle="modal" data-bs-target="#replayPopupForm">
                            <span class="fas fa-mail-reply me-1"></span>Reply
                          </a>
                          <div class="reviews-reaction">
                            <a href="#" class="comment-like"><i class="fas fa-thumbs-up"></i> 13</a>
                            <a href="#" class="comment-dislike"><i class="fas fa-thumbs-down"></i> 2</a>
                            <a href="#" class="comment-love"><i class="fas fa-heart-o"></i> 5</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end comments -->
                    <div class="comment comment-reply-item">
                      <div class="comment-avatar">
                        <img class="avatar__img" alt="" src="assets/img/team8.jpg">
                      </div>
                      <div class="comment-body">
                        <div class="meta-data">
                          <h3 class="comment__author">Jenny Doe</h3>
                          <div class="meta-data-inner d-flex">
                            <span class="ratings d-flex align-items-center me-1">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </span>
                            <p class="comment__date">April 5, 2019</p>
                          </div>
                        </div>
                        <p class="comment-content">
                          Lorem ipsum dolor sit amet, dolores mandamus
                          moderatius ea ius, sed civibus vivendum imperdiet
                          ei, amet tritani sea id. Ut veri diceret fierent
                          mei, qui facilisi suavitate euripidis
                        </p>
                        <div class="comment-reply d-flex align-items-center justify-content-between">
                          <a class="theme-btn" href="#" data-bs-toggle="modal" data-bs-target="#replayPopupForm">
                            <span class="fas fa-mail-reply me-1"></span>Reply
                          </a>
                          <div class="reviews-reaction">
                            <a href="#" class="comment-like"><i class="fas fa-thumbs-up"></i> 13</a>
                            <a href="#" class="comment-dislike"><i class="fas fa-thumbs-down"></i> 2</a>
                            <a href="#" class="comment-love"><i class="fas fa-heart-o"></i> 5</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end comments -->
                    <div class="comment">
                      <div class="comment-avatar">
                        <img class="avatar__img" alt="" src="assets/img/team8.jpg">
                      </div>
                      <div class="comment-body">
                        <div class="meta-data">
                          <h3 class="comment__author">Jenny Doe</h3>
                          <div class="meta-data-inner d-flex">
                            <span class="ratings d-flex align-items-center me-1">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </span>
                            <p class="comment__date">April 5, 2019</p>
                          </div>
                        </div>
                        <p class="comment-content">
                          Lorem ipsum dolor sit amet, dolores mandamus
                          moderatius ea ius, sed civibus vivendum imperdiet
                          ei, amet tritani sea id. Ut veri diceret fierent
                          mei, qui facilisi suavitate euripidis
                        </p>
                        <div class="comment-reply d-flex align-items-center justify-content-between">
                          <a class="theme-btn" href="#" data-bs-toggle="modal" data-bs-target="#replayPopupForm">
                            <span class="fas fa-mail-reply me-1"></span>Reply
                          </a>
                          <div class="reviews-reaction">
                            <a href="#" class="comment-like"><i class="fas fa-thumbs-up"></i> 13</a>
                            <a href="#" class="comment-dislike"><i class="fas fa-thumbs-down"></i> 2</a>
                            <a href="#" class="comment-love"><i class="fas fa-heart-o"></i> 5</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end comments -->
                    <div class="btn-box load-more text-center">
                      <button class="tr-btn-green" type="button">
                        Load More Review
                      </button>
                    </div>
                  </div>
                  <!-- end comments-list -->
                  <div class="comment-forum pt-4">
                    <div class="form-box">
                      <div class="form-title-wrap">
                        <h3 class="title">Write a Review</h3>
                      </div>
                      <!-- form-title-wrap -->
                      <div class="form-content">
                        <div class="rate-option p-2">
                          <div class="row">
                            <div class="col-lg-4 responsive-column">
                              <div class="rate-option-item">
                                <label>Service</label>
                                <div class="rate-stars-option">
                                  <input type="checkbox" class="form-check-input" id="lst1" value="1">
                                  <label for="lst1"></label>
                                  <input type="checkbox" class="form-check-input" id="lst2" value="2">
                                  <label for="lst2"></label>
                                  <input type="checkbox" class="form-check-input" id="lst3" value="3">
                                  <label for="lst3"></label>
                                  <input type="checkbox" class="form-check-input" id="lst4" value="4">
                                  <label for="lst4"></label>
                                  <input type="checkbox" class="form-check-input" id="lst5" value="5">
                                  <label for="lst5"></label>
                                </div>
                              </div>
                            </div>
                            <!-- col-lg-4 -->
                            <div class="col-lg-4 responsive-column">
                              <div class="rate-option-item">
                                <label>Location</label>
                                <div class="rate-stars-option">
                                  <input type="checkbox" class="form-check-input" id="l1" value="1">
                                  <label for="l1"></label>
                                  <input type="checkbox" class="form-check-input" id="l2" value="2">
                                  <label for="l2"></label>
                                  <input type="checkbox" class="form-check-input" id="l3" value="3">
                                  <label for="l3"></label>
                                  <input type="checkbox" class="form-check-input" id="l4" value="4">
                                  <label for="l4"></label>
                                  <input type="checkbox" class="form-check-input" id="l5" value="5">
                                  <label for="l5"></label>
                                </div>
                              </div>
                            </div>
                            <!-- col-lg-4 -->
                            <div class="col-lg-4 responsive-column">
                              <div class="rate-option-item">
                                <label>Value for Money</label>
                                <div class="rate-stars-option">
                                  <input type="checkbox" class="form-check-input" id="vm1" value="1">
                                  <label for="vm1"></label>
                                  <input type="checkbox" class="form-check-input" id="vm2" value="2">
                                  <label for="vm2"></label>
                                  <input type="checkbox" class="form-check-input" id="vm3" value="3">
                                  <label for="vm3"></label>
                                  <input type="checkbox" class="form-check-input" id="vm4" value="4">
                                  <label for="vm4"></label>
                                  <input type="checkbox" class="form-check-input" id="vm5" value="5">
                                  <label for="vm5"></label>
                                </div>
                              </div>
                            </div>
                            <!-- col-lg-4 -->
                            <div class="col-lg-4 responsive-column">
                              <div class="rate-option-item">
                                <label>Cleanliness</label>
                                <div class="rate-stars-option">
                                  <input type="checkbox" class="form-check-input" id="cln1" value="1">
                                  <label for="cln1"></label>
                                  <input type="checkbox" class="form-check-input" id="cln2" value="2">
                                  <label for="cln2"></label>
                                  <input type="checkbox" class="form-check-input" id="cln3" value="3">
                                  <label for="cln3"></label>
                                  <input type="checkbox" class="form-check-input" id="cln4" value="4">
                                  <label for="cln4"></label>
                                  <input type="checkbox" class="form-check-input" id="cln5" value="5">
                                  <label for="cln5"></label>
                                </div>
                              </div>
                            </div>
                            <!-- col-lg-4 -->
                            <div class="col-lg-4 responsive-column">
                              <div class="rate-option-item">
                                <label>Facilities</label>
                                <div class="rate-stars-option">
                                  <input type="checkbox" class="form-check-input" id="f1" value="1">
                                  <label for="f1"></label>
                                  <input type="checkbox" class="form-check-input" id="f2" value="2">
                                  <label for="f2"></label>
                                  <input type="checkbox" class="form-check-input" id="f3" value="3">
                                  <label for="f3"></label>
                                  <input type="checkbox" class="form-check-input" id="f4" value="4">
                                  <label for="f4"></label>
                                  <input type="checkbox" class="form-check-input" id="f5" value="5">
                                  <label for="f5"></label>
                                </div>
                              </div>
                            </div>
                            <!-- col-lg-4 -->
                          </div>
                          <!-- end row -->
                        </div>
                        <!-- end rate-option --> --}}
                        {{-- <div class="contact-form-action">
                          <form method="post">
                            <div class="row">
                              <div class="col-lg-6 responsive-column">
                                <div class="input-box">
                                  <label class="label-text">Name</label>
                                  <div class="form-group">
                                    <span class="fas fa-user form-icon"></span>
                                    <input class="form-control" type="text" name="text" placeholder="Your name">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 responsive-column">
                                <div class="input-box">
                                  <label class="label-text">Email</label>
                                  <div class="form-group">
                                    <span class="fas fa-envelope form-icon"></span>
                                    <input class="form-control" type="email" name="email" placeholder="Email address">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="input-box">
                                  <label class="label-text">Message</label>
                                  <div class="form-group">
                                    <span class="fas fa-pencil form-icon"></span>
                                    <textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="btn-box">
                                  <button type="button" class="tr-btn-green">
                                    Leave a Review
                                  </button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div> --}}
                        <!-- end contact-form-action -->
                      {{-- </div> --}}
                      <!-- end form-content -->
                    {{-- </div> --}}
                    <!-- end form-box -->
                  {{-- </div> --}}
                  <!-- end comment-forum -->
                {{-- </div> --}}
                <!-- end single-content-item -->
              {{-- </div> --}}




            {{-- </div> هامة --}}

            {{-- <div class="col-xl-4 col-lg-4">
              <div class="sidebar-right">
                <div class="sidebar-widget mb-45">
                  <div class="sidebar-search-box p-relative">
                                      <div class="sidebar-widget-item"></div>
                    <div class="sidebar-book-title-wrap mb-3">
                      <h3> {{ setting('name_Bestseller', app()->getLocale()) }}</h3>
                      <p>
                        <span class="text-form">From</span><span class="text-value ms-2 me-1">$399.00</span>
                        <span class="before-price">$412.00</span>
                      </p>
                    </div>
                  </div>



                  <div class="sidebar-widget-item">
                    <div class="contact-form-action">
                      <form action="#">
                        <div class="input-box">
                          <label class="label-text">Date</label>
                          <div class="form-group">
                            <span class="fas fa-calendar form-icon"></span>
                            <input class="date-range form-control" type="text" name="daterange">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- end sidebar-widget-item -->
                  <div class="sidebar-widget-item">
                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                      <label class="font-size-16"> {{ setting('name_Adults', app()->getLocale()) }} <span>Age 18+</span></label>
                      <div class="qtyBtn d-flex align-items-center">
                        <div class="qtyDec"><i class="fas fa-minus"></i></div>
                        <input type="text" name="qtyInput" value="0">
                        <div class="qtyInc"><i class="fas fa-plus"></i></div>
                      </div>
                    </div>

                    <!-- end qty-box -->
                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                      <label class="font-size-16"> {{ setting('name_Children', app()->getLocale()) }} <span>2-12 years old</span></label>
                      <div class="qtyBtn d-flex align-items-center">
                        <div class="qtyDec"><i class="fas fa-minus"></i></div>
                        <input type="text" name="qtyInput" value="0">
                        <div class="qtyInc"><i class="fas fa-plus"></i></div>
                      </div>
                    </div>


                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                      <label class="font-size-16"> {{ setting('name_Infants', app()->getLocale()) }} <span>0-2 years old</span></label>
                      <div class="qtyBtn d-flex align-items-center">
                        <div class="qtyDec"><i class="fas fa-minus"></i></div>
                        <input type="text" name="qtyInput" value="0">
                        <div class="qtyInc"><i class="fas fa-plus"></i></div>
                      </div>
                    </div>
                  </div>


                  <div class="btn-box pt-2">
                    <a href="tour-booking.html" class="tr-btn-green d-block" style="text-align: center;"><i class="fas fa-shopping-cart me-2 font-size-18"></i> {{ setting('name_Book_Now', app()->getLocale()) }}
                      </a>
                    <a href="#" class="tr-btn p-3 d-block" style="padding: 10px 20px !important; font-size: 15px; margin-top: 20px; text-align: center;"><i class="fas fa-heart-o me-2"></i> {{ setting('name_Add_to_Wishlist', app()->getLocale()) }}</a>
                    <div class="d-flex align-items-center justify-content-between pt-2">
                      <a href="#" class="" data-bs-toggle="modal" data-bs-target="#sharePopupForm"><i class="fas fa-share me-1"></i>Share</a>
                      <p class="mt-3" style="font-size: 14px;">
                        <i class="fas fa-eye me-1 font-size-15 color-text-2"></i>3456
                      </p>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
 --}}

      {{-- </div> --}}
      <!-- trip-area-end -->

      <!-- subdcribe-area-start -->
      <div class="tr-subscribe-area z-index-2">
        <div class="container">
          <div class="tr-subscribe-bg p-relative fix">
            <div class="tr-subscribe-img d-none d-lg-block">
              <img src="{{(setting('Subscribe_image', 'en'))}}" alt="" />
            </div>
            <div class="tr-subscribe-circle d-none d-lg-block">
              <span></span>
            </div>
            <div class="row">
              <div class="offset-xl-5 offset-lg-5 col-xl-7 col-lg-7">
                <div class="tr-subscribe-tittle-box mb-35">
                  <h3 class="tr-section-title mb-20 text-white">
                    <br />
                    {{ setting('section_five_title_one', app()->getLocale()) }}
                  </h3>
                  <p>
                   {!! setting('section_five_description_one', app()->getLocale()) !!}
                  </p>
                </div>
                <div class="tr-subscribe-form">
                  <form action="#">
                    <div class="tr-subscribe-input p-relative">
                      <input type="text" placeholder="{{ \App\Helpers\TranslationHelper::translate('Your email...') }}" />
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
      <!-- subdcribe-area-end -->


       @endsection

  @push('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXcVsCE3Xu59fEGNyoMhdqjvjO1_MyFLw"></script>
    <script>
        function initMap() {
            var location = { lat: {{ $programme->latitude }}, lng: {{ $programme->longitude }} };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
        initMap();
    </script>


    {{-- <script>
    function showBookingMessage() {
        // حدد العنصر المخصص لعرض الرسالة
        const messageElement = document.getElementById('booking-message');
        messageElement.innerText = '{{ \App\Helpers\TranslationHelper::translate('Please login first to book this programme') }}';
        messageElement.style.display = 'block'; // عرض الرسالة
    }
</script> --}}



{{-- <script>
function showBookingMessage() {
    // حدد العنصر المخصص لعرض الرسالة
    const messageElement = document.getElementById('booking-message');

    // تعيين النص للرسالة
    messageElement.innerText = '{{ \App\Helpers\TranslationHelper::translate('Please login first to book this programme') }}';

    // جعل النافذة المنبثقة تظهر
    const popup = document.getElementById('booking-message-popup');
    popup.style.display = 'block';
}
</script> --}}

<script>

// function showBookingMessage() {
//     Swal.fire({
//         icon: 'error',
//         text: "{{ \App\Helpers\TranslationHelper::translate('Please login first to book this programme') }}",
//         dangerMode: true,
//         confirmButtonColor: '#e98f33',
//         confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate('Go to Login') }}',
//         showCloseButton: true,
//         preConfirm: () => {
//             // إنشاء نموذج POST يدويًا
//             var form = document.createElement('form');
//             form.method = 'POST';
//             form.action = "{{ route('user.login.submit') }}"; // استخدم الرابط الخاص بك لصفحة التسجيل
//             var csrfToken = document.createElement('input');
//             csrfToken.type = 'hidden';
//             csrfToken.name = '_token';
//             csrfToken.value = '{{ csrf_token() }}'; // إضافة token CSRF لضمان الأمان
//             form.appendChild(csrfToken);

//             // إضافة input لتحديد ما إذا كان المستخدم يريد إعادة التوجيه إلى صفحة معينة بعد التسجيل
//             var redirectInput = document.createElement('input');
//             redirectInput.type = 'hidden';
//             redirectInput.name = 'redirect_to';
//             redirectInput.value = window.location.href; // سيتم إعادة توجيه المستخدم إلى نفس الصفحة بعد تسجيل الدخول
//             form.appendChild(redirectInput);

//             document.body.appendChild(form);
//             form.submit();
//         }
//     });
// }

// function showBookingMessage() {
//     Swal.fire({
//         icon: 'error',
//         text: "{{ \App\Helpers\TranslationHelper::translate('Please login first to book this programme') }}",
//         dangerMode: true,
//         confirmButtonColor: '#e98f33',
//         confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate('Thanks') }}',
//         showCloseButton: true,
//         // عندما يضغط المستخدم على زر "Thanks"، سيتم إغلاق البوب أب
//         preConfirm: () => {
//             Swal.close(); // إغلاق البوب أب بعد الضغط على الزر
//         }
//     });
// }

function showBookingMessage() {
    Swal.fire({
        icon: 'error',
        text: "{{ \App\Helpers\TranslationHelper::translate('Please login first to book this programme') }}",
        dangerMode: true,
        confirmButtonColor: '#e98f33',
        confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate('login') }}',
        showCloseButton: true,
        // عند الضغط على زر "Thanks"، يتم إعادة التوجيه إلى صفحة تسجيل الدخول
        preConfirm: () => {
            window.location.href = "{{ route('user.login.form') }}"; // توجيه المستخدم إلى صفحة تسجيل الدخول
        }
    });
}



</script>


    <script>

        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            thumbs: {
                swiper: swiper,
            },
        });

      </script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkInInput = document.getElementById('check_in');
        const validFrom = new Date("{{ \Carbon\Carbon::parse($programme->valid_from)->format('Y-m-d') }}");
        const validTo = new Date("{{ \Carbon\Carbon::parse($programme->valid_to)->format('Y-m-d') }}");

        const validFromYear = validFrom.getFullYear();
        const validToYear = validTo.getFullYear();

        // إذا كانت السنة نفسها، نحصر التاريخ بين valid_from و valid_to فقط
        if (validFromYear === validToYear) {
            checkInInput.setAttribute('min', validFrom.toISOString().split('T')[0]);
            checkInInput.setAttribute('max', validTo.toISOString().split('T')[0]);
        } else {
            // إذا كانت السنوات مختلفة، نسمح بتحديد التواريخ بين السنة الأولي والأخيرة
            checkInInput.setAttribute('min', validFrom.toISOString().split('T')[0]);
            checkInInput.setAttribute('max', validTo.toISOString().split('T')[0]);
        }
    });
</script>
{{-- بداية  --}}

      <script>
     function resetForm() {
        let counted_inp = $('.counted input');
        let counted_span = $('.counted .count');

        let choose_room_btn_active = $(".choose_room_btn.active");
        choose_room_btn_active.removeClass('active');
        let room_id = $("#room_id");

        let adult_search_count = $("input[name='adult_search_count']");

        let children_search_count = $("input[name='children_search_count']");

        let infant_search_count = $("input[name='infant_search_count']");

        room_id.val('');
        adult_search_count.attr('max', 0);
        children_search_count.attr('max', 0);
        infant_search_count.attr('max', 0);


        counted_inp.val(0);
        counted_span.text('0');
        countCountable();
    }


           function verify_plus_search_count(btn) {
        let room_id = $("#room_id");
        let err_choose_room = $(".err_choose_room");
        if (room_id.val() === '') {
            err_choose_room.show();
            event.stopPropagation();
            event.preventDefault();

        } else {
            plus_search_count(btn)
        }

    }


     function verify_minus_search_count(btn) {
        let room_id = $("#room_id");
        let err_choose_room = $(".err_choose_room");

        if (room_id.val() === '') {
            err_choose_room.show();
            event.stopPropagation();
            event.preventDefault();

        } else {
            minus_search_count(btn)
        }
        event.stopPropagation();
        event.preventDefault();

    }

     function plus_search_count(plus_btn) {
        let plus = $(plus_btn);
        let counted_inp = plus.parent().parent().find('.counted input');
        let counted_span = plus.parent().parent().find('.counted .count');

        let max = '';
        if (counted_inp.attr('max') && parseFloat(counted_inp.attr('max')) > 0) {
            max = counted_inp.attr('max');
        }
        let current_val = counted_inp.val();
        // alert(current_val);
        // alert(max);
        if (parseInt(current_val) === parseInt(max)) {
            Swal.fire({
                icon: 'error',
                text: '{{\App\Helpers\TranslationHelper::translate('Maximum Persons')}} : ' + parseInt(max) + '{{\App\Helpers\TranslationHelper::translate('Persons')}}',
                title: '{{\App\Helpers\TranslationHelper::translate('Operation Failed')}}',
                confirmButtonColor: '#e98f33',
                confirmButtonText: 'Thanks !',
                showCloseButton: true,

            });
        } else {
            counted_inp.val(parseInt(current_val) + 1);
            counted_span.text(parseInt(current_val) + 1)
        }
        countCountable();
        event.stopPropagation();
        event.preventDefault();

    }

    function minus_search_count(minus_btn) {
        let minus = $(minus_btn);
        let counted_inp = minus.parent().parent().find('.counted input');
        let counted_span = minus.parent().parent().find('.counted .count');

        let min = '';
        if (counted_inp.attr('min')) {
            min = counted_inp.attr('min');
        }
        let current_val = counted_inp.val();
        // alert(current_val);
        // alert(max);
        if (parseInt(current_val) === parseInt(min)) {

        } else {
            counted_inp.val(parseInt(current_val) - 1);
            counted_span.text(parseInt(current_val) - 1)
        }
        countCountable();
        event.stopPropagation();
        event.preventDefault();
    }

     function minus_search_count(minus_btn) {
        let minus = $(minus_btn);
        let counted_inp = minus.parent().parent().find('.counted input');
        let counted_span = minus.parent().parent().find('.counted .count');

        let min = '';
        if (counted_inp.attr('min')) {
            min = counted_inp.attr('min');
        }
        let current_val = counted_inp.val();
        // alert(current_val);
        // alert(max);
        if (parseInt(current_val) === parseInt(min)) {

        } else {
            counted_inp.val(parseInt(current_val) - 1);
            counted_span.text(parseInt(current_val) - 1)
        }
        countCountable();
        event.stopPropagation();
        event.preventDefault();

    }

     function countCountable() {
        let total = 0;
        let countable = $(".countable");
        countable.each(function () {
            total += parseFloat($(this).val()) || 0;
        });
        let hotels_persons_count = $(".hotels_persons_count");
        hotels_persons_count.text(total + "Persons")
    }

    function updateRoomInputsInBooking(btn) {
        let btn_tag = $(btn);
        let err_choose_room = $(".err_choose_room");


        let id = btn_tag.attr('data-id');
        let adults = btn_tag.attr('data-adults');
        let children = btn_tag.attr('data-children');
        let infants = btn_tag.attr('data-infants');
        let price = btn_tag.attr('data-price');
        let discount = btn_tag.attr('data-discount');
        let discount_type = btn_tag.attr('data-discount-type');
        let discount_value = btn_tag.attr('data-discount-value');
        let price_after_discount = btn_tag.attr('data-price-after-discount');


        let room_id = $("#room_id");
        let before_discount = $("#before_discount del");
        let final_price = $("#final_price");
        let adult_search_count = $("input[name='adult_search_count']");
        let children_search_count = $("input[name='children_search_count']");
        let infant_search_count = $("input[name='infant_search_count']");

        err_choose_room.hide();
        room_id.val(id);
        adult_search_count.attr('max', adults);
        children_search_count.attr('max', children);
        infant_search_count.attr('max', infants);

        if (parseFloat(discount) > 0) {
            before_discount.text('$' + price)
            final_price.text('$' + price_after_discount)
        }

    }

    function submitBookingForm() {
        let booking_form = $("#booking_form");
        let dropdownMenuButton1 = $("#dropdownMenuButton1");

        let room_id = $("#room_id").val();
        let check_in = $("#check_in").val();
        let check_out = $("#check_out").val();
        let adult_search_count = $("input[name='adult_search_count']").val();
        let children_search_count = $("input[name='children_search_count']").val();
        let infant_search_count = $("input[name='infant_search_count']").val();

        let data = [
            room_id,
            check_in,
            check_out,
            adult_search_count,
            children_search_count,
            infant_search_count
        ];

        let inputsNotEmpty = true;

        $.each(data, function (index, value) {
            if (value === "" || (adult_search_count === '0' && children_search_count === '0' && infant_search_count === '0')) {
                inputsNotEmpty = false;
                return false; // exit the loop early
            }
        });

        if (inputsNotEmpty) {
            booking_form.submit();
        } else {
            Swal.fire({
                icon: 'error',
                text: " {{ \App\Helpers\TranslationHelper::translate('Please Complete the Booking Inputs') }}",
                dangerMode: true,
                confirmButtonColor: '#e98f33',
                // cancelButtonColor: '#d33',
                confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate('Fine') }}',
                showCloseButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    clickPersons();
                }
            });
        }
    }


    function submitProgrammeBookingForm() {
        let programme_booking_form = $('#programme_booking_form');

        let adult_search_count = $("input[name='adult_search_count']");
        let children_search_count = $("input[name='children_search_count']");
        let infant_search_count = $("input[name='infant_search_count']");

        let person_count =
            parseInt(adult_search_count.val()) +
            parseInt(children_search_count.val()) +
            parseInt(infant_search_count.val());

        let check_in = $("#check_in");


        if (person_count === 0) {
            Swal.fire({
                icon: 'error',
                text: "{{\App\Helpers\TranslationHelper::translate('Minimum 1 Person in The Programme')}}",
                dangerMode: true,
                confirmButtonColor: '#e98f33',
                // cancelButtonColor: '#d33',
                confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate('Thanks') }}',
                showCloseButton: true,
            });
        }

        if (check_in.val() === '') {
            Swal.fire({
                icon: 'error',
                text: "{{\App\Helpers\TranslationHelper::translate('Please Choose Check in Date')}}",
                dangerMode: true,
                confirmButtonColor: '#e98f33',
                // cancelButtonColor: '#d33',
                confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate('Thanks') }}',
                showCloseButton: true,
            });
        }



        if (check_in.val() !== '' && person_count > 0) {
            programme_booking_form.submit();
        }
    }

      </script>
 @endpush

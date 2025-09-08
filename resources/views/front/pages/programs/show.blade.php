@extends('front.layouts.app')


@section('content')
    <div
        class="tr-breadcurmb-area tr-breadcurmb-bg"
        style="background-image: url({{(setting('image_panarea_tow', 'en'))}}); background-size: cover; background-position: center; height: 200px;"
      >
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-8">
              <div class="tr-breadcurmb-content text-center z-index-3">
                <div class="tr-breadcurmb-title-box">
                  <h3 class="tr-breadcurmb-title">{{ \App\Helpers\TranslationHelper::translate('About Us') }}</h3>
                </div>
                <div class="tr-breadcurmb-list-wrap">
                  <div class="tr-breadcurmb-list">
                    <span><a href="{{route('site.home')}}"></a>{{ \App\Helpers\TranslationHelper::translate('Home') }}</span>
                    <span class="dvdr"
                      ><i class="fa-regular fa-angle-right"></i
                    ></span>
                    <i>{{ \App\Helpers\TranslationHelper::translate('About Us') }}</i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- section start -->
    <section class="single-section small-section bg-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="col-12">
                        <div class="hotel_title_section">
                            <div class="hotel-name p-0">
                                <div class="left-part">
                                    <div class="top">
                                        <h2>{{$programme->name}}</h2>

                                        <div class="share-buttons">
                                            <a href="#" class="btn btn-solid"><i class="far fa-share-square"></i>
                                                share</a>
                                            <a href="#" class="btn btn-solid"><i class="far fa-heart"></i> {{ \App\Helpers\TranslationHelper::translate('save') }}</a>
                                        </div>
                                    </div>
                                    <p><i class="fa-sharp fa-solid fa-location-dot"></i>
                                        {{$programme->getCompleteAddress()}}
                                    </p>
                                </div>
                                <div class="right-part">
                                    <h4 class="colored-main text-start">{{$programme->star > 4 ? \App\Helpers\TranslationHelper::translate('Excellent', 'site') : ''}}</h4>
                                    <div class="rating">
                                        <i class="{{$programme->avg_rate > 0 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$programme->avg_rate > 1 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$programme->avg_rate > 2 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$programme->avg_rate > ؟3 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$programme->avg_rate > 4 ? 'fas' : 'far'}} fa-star"></i>
                                    </div>
                                    <p>
                                        ({{$programme->rates->where('status', 1)->count()}} {{\App\Helpers\TranslationHelper::translate('reviews','site')}}
                                        )</p>

                                </div>
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
                                            <p>{{$programme->programmeItinerary->count()}} {{\App\Helpers\TranslationHelper::translate('Days', 'site')}}</p>
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
                                            <p>{{$programme->group_size}} people{{ \App\Helpers\TranslationHelper::translate('Duration') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fas fa-map-marked"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>{{ \App\Helpers\TranslationHelper::translate('Location') }}</h5>
                                            <p>{{$programme->location_name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="imgs tour_details_boxed mb-3">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @if($programme->programmeImages && $programme->programmeImages->count() > 0)
                                    @foreach($programme->programmeImages as $image)
                                        <div class="swiper-slide"  style="width: 100%; margin-right: 10px;"   >
                                            <img style="width: 100%;" src="{{ asset($image->getFirstMediaUrl('programme_images')) }}"
                                                 class="img-fluid" alt="">
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @if($programme->programmeImages->count() > 0)
                                    @foreach($programme->programmeImages as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($image->getFirstMediaUrl('programme_images')) }}"
                                                 class="img-fluid" alt="">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tour_details_boxed description-section">
                        <h3 class="heading_theme"> Overview </h3>
                        {!! $programme->description !!}
                    </div>
                    <div class="tour_details_boxed description-section tab-section">
                        <h3 class="heading_theme"> Itinerary </h3>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @if($programme->programmeItinerary->count() > 0)
                                @foreach($programme->programmeItinerary as $key => $day)
                                    <div class="accordion-item">
                                        <div class="row align-items-start m-0">

                                            <div class="col-auto day">
                                                Day{{$programme->group_size}} people{{ \App\Helpers\TranslationHelper::translate('Duration') }} {{ $key + 1 }}
                                            </div>
                                            <div class="col">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapse{{$key}}"
                                                            aria-expanded="false"
                                                            aria-controls="flush-collapse{{$key}}">
                                                   {{ \App\Helpers\TranslationHelper::translate('Day') }}      {{\App\Helpers\TranslationHelper::translate('day_' . ($key + 1), 'site')}}
                                                        {{ \App\Helpers\TranslationHelper::translate('Programme') }} {{$programme->group_size}} {{ \App\Helpers\TranslationHelper::translate('people') }}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse{{$key}}" class="accordion-collapse collapse"
                                                     data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            @if($day->programmeItineraryItems->count() > 0)
                                                                @foreach($day->programmeItineraryItems as $item)
                                                                    <li>
                                                                        <i class="fa-sharp fa-regular fa-circle-dot"></i>
                                                                        {{$item->details}}
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
                        <h3 class="heading_theme">  {{ \App\Helpers\TranslationHelper::translate('Included') }}  </h3>
                        <ul>
                            @if($programme->programmeIncludes->count() > 0)
                                @foreach($programme->programmeIncludes as $include)
                                    <li><i class="fa-sharp fa-regular fa-circle-dot"></i>{{$include->details}}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="tour_details_boxed description-section map">
                        <h3 class="heading_theme"> {{ \App\Helpers\TranslationHelper::translate('Tour Location') }} </h3>
                        <div id="map" style="height: 500px;width: 100%">
                        </div>
                    </div>

                    <div class="special-section related-box ratio3_2 grid-box">
                        <div class="slider-3 no-arrow">
                            @if(isset($related) && $related->count() > 0)
                                @foreach($related as $related_item)
                                    <div>
                                        <div class="special-box">
                                            <div class="special-img">
                                                <a href="{{ route('user.programme.show', $related_item->id) }}">
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
                                                <a href="{{ route('user.programme.show', $related_item->id) }}">
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
                                                        <span>$1245 <small> {{ \App\Helpers\TranslationHelper::translate('Price starts from') }} </small></span>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="label-offer">hot deal</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4" id="booking">
                    <div class="">
                        <div class="single-sidebar tour_details_boxed">
                            <div class="tour_details_right_box_heading">
                                <h3 class="heading_theme">Programme Details</h3>
                            </div>
                            <div class="valid_date_area d-flex">
                                <div class="valid_date_area_one px-2">
                                    <h6 class="colored-main">Valid from</h6>
                                    <p>{{\Carbon\Carbon::parse($programme->valid_from)->format('d M Y')}}</p>
                                </div>
                                <div class="valid_date_area_one px-2">
                                    <h6 class="colored-main">Valid till</h6>
                                    <p>{{\Carbon\Carbon::parse($programme->valid_to)->format('d M Y')}}</p>
                                </div>
                            </div>
                            <div class="tour_package_details_bar_list mt-3">
                                <h6 class="heading_theme">Programme details</h6>
                                <ul>
                                    @if($programme->programmeIncludes->count() > 0)
                                        @foreach($programme->programmeIncludes as $include)
                                            <li><i class="fa-sharp fa-regular fa-circle-dot"></i>{{$include->details}}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="tour_package_details_bar_price">
                                <h6 class="heading_theme">Price</h6>
                                <div class="tour_package_bar_price d-flex align-items-end">
                                    @if($programme->discount > 0)
                                        <h6 class="pe-2">
                                            <del>$ {{number_format($programme->price, 1)}}</del>
                                        </h6>
                                        <h3 class="pe-2 colored-main">{{getProgrammePriceIfDiscount($programme)}} <sub>/Per
                                                Person</sub></h3>
                                    @else
                                        <h3 class="pe-2 colored-main">$ {{number_format($programme->price, 1)}} <sub>/Per
                                                Person</sub></h3>
                                    @endif


                                </div>
                            </div>

                            <form action="{{route('user.programme.form', $programme->id)}}" method="POST"
                                  id="programme_booking_form" class="mt-3 text-left">
                                @csrf
                                <div class="flight_Search_boxed date_flex_area mb-3">
                                    <div class="Journey_date">
                                        <p>Check In date</p>
                                        <input type="date" id="check_in" name="check_in"
                                               min="{{\Carbon\Carbon::parse($programme->valid_from)->format('Y-m-d')}}"
                                               max="{{\Carbon\Carbon::parse($programme->valid_to)->format('Y-m-d')}}"
                                        >
                                    </div>

                                </div>
                                <div class="col-12 mb-3">
                                    <div class="flight_Search_boxed dropdown_passenger_area">
                                        <p>Persons </p>
                                        <div class="dropdown">
                                            <button class="dropdown-toggle final-count hotels_persons_count"
                                                    data-toggle="dropdown" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                0 Person
                                            </button>
                                            <div class="dropdown-menu dropdown_passenger_info"
                                                 aria-labelledby="dropdownMenuButton1" style="">
                                                <div class="traveller-calulate-persons">

                                                    <div class="passengers custom_passengers">
                                                        <h6>Persons</h6>
                                                        <div class="passengers-types">
                                                            <div class="passengers-type">
                                                                <div class="text counted">
                                                                    <span class="count pcount">0</span>
                                                                    <input class="countable" type="hidden"
                                                                           value="0" max=""
                                                                           name="adult_search_count" min="0">

                                                                    <div class="type-label">
                                                                        <p>
                                                                            Adult
                                                                        </p>
                                                                        <span>
                                                                                12+ yrs
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                                <div class="button-set">
                                                                    <button type="button"
                                                                            class="btn-add plus_btn"
                                                                            onclick="verify_plus_search_count(this)">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn-subtract minus_btn"
                                                                            onclick="verify_minus_search_count(this)">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="passengers-type">
                                                                <div class="text counted"><span
                                                                        class="count ccount">0</span>
                                                                    <input class="countable" type="hidden"
                                                                           value="0" max=""
                                                                           name="children_search_count" min="0">

                                                                    <div class="type-label">
                                                                        <p class="fz14 mb-xs-0">
                                                                            Children
                                                                        </p>
                                                                        <span>
                                                                                2- Less than 12 yrs
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                                <div class="button-set">
                                                                    <button type="button"
                                                                            class="btn-add-c plus_btn"
                                                                            onclick="verify_plus_search_count(this)">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn-subtract-c minus_btn"
                                                                            onclick="verify_minus_search_count(this)">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="passengers-type">
                                                                <div class="text counted">
                                                                    <span class="count incount">0</span>
                                                                    <input class="countable" type="hidden"
                                                                           value="0" max=""
                                                                           name="infant_search_count" min="0">

                                                                    <div class="type-label">
                                                                        <p class="fz14 mb-xs-0">
                                                                            Infant
                                                                        </p>
                                                                        <span>
                                                                                Less than 2 yrs
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                                <div class="button-set">
                                                                    <button type="button"
                                                                            class="btn-add-in plus_btn"
                                                                            onclick="verify_plus_search_count(this)">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn-subtract-in minus_btn"
                                                                            onclick="verify_minus_search_count(this)">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{--                                            <span>Business</span>--}}
                                    </div>
                                </div>
                            </form>
                            <div class="globalBtn mt-3">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" onclick="submitProgrammeBookingForm()">
                                            book this now
                                            <span></span><span></span><span></span><span></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar tour_details_boxed">
                            <h6 class="contact-title">contact info</h6>
                            <p class="address"><i class="fas fa-map-marker-alt"></i>
                                {{$programme->getCompleteAddress()}}
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
                                <h6>check-in : {{Carbon\Carbon::parse($programme->check_in)->format('h:i a')}}</h6>
                                <h6>check-out : {{Carbon\Carbon::parse($programme->check_out)->format('h:i a')}}</h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
@endsection

@push('user.js')
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
@endpush

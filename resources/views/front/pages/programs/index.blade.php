@extends('front.layouts.app')


@section('content')
    <!-- breadcrumb start -->
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
    <!-- breadcrumb end -->


    <!-- search section start -->
    <section id="theme_search_form_tour">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="theme_search_form_area">
                        <div class="theme_search_form_tabbtn">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="flights-tab" data-bs-toggle="tab"
                                            data-bs-target="#flights" type="button" role="tab" aria-controls="flights"
                                            aria-selected="false"><i class="fas fa-plane-departure"></i>Flights
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="tours-tab" data-bs-toggle="tab"
                                            data-bs-target="#tours" type="button" role="tab" aria-controls="tours"
                                            aria-selected="false"><i class="fas fa-globe"></i>Programmes
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="hotels-tab" data-bs-toggle="tab"
                                            data-bs-target="#hotels"
                                            type="button" role="tab" aria-controls="hotels" aria-selected="true"><i
                                            class="fas fa-hotel"></i>Hotels
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="bus-tab" data-bs-toggle="tab" data-bs-target="#bus"
                                            type="button" role="tab" aria-controls="bus" aria-selected="false"><i
                                            class="fas fa-bus"></i> Cars
                                    </button>
                                </li>


                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade " id="flights" role="tabpanel" aria-labelledby="flights-tab">
                                <div class="tab-content" id="myTabContent1">
                                    <div class="tab-pane fade show active" id="oneway_flight" role="tabpanel"
                                         aria-labelledby="oneway-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="oneway_search_form">
                                                    <form action="#!">
                                                        <div class="row">
                                                            <div class="mb-2 col-lg-3 col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed">
                                                                    <p>From</p>
                                                                    <input type="text" value="New York">
                                                                    <span>JFK - John F. Kennedy International...</span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-departure"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 col-lg-3 col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed">
                                                                    <p>To</p>
                                                                    <input type="text" value="London ">
                                                                    <span>LCY, London city airport </span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div>
                                                                    <div class="range_plan">
                                                                        <i class="fas fa-exchange-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 col-lg-3  col-md-6 col-sm-12 col-12">
                                                                <div class="form_search_date">
                                                                    <div class="flight_Search_boxed date_flex_area">
                                                                        <div class="Journey_date">
                                                                            <p>Journey date</p>
                                                                            <input type="date" value="2022-05-05">
                                                                            <span>Thursday</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 col-lg-3  col-md-6 col-sm-12 col-12">
                                                                <div
                                                                    class="flight_Search_boxed dropdown_passenger_area">
                                                                    <p>Passenger, Class </p>
                                                                    <div class="dropdown">
                                                                        <button class="dropdown-toggle final-count"
                                                                                data-toggle="dropdown" type="button"
                                                                                id="dropdownMenuButton1"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                            0 Passenger
                                                                        </button>
                                                                        <div
                                                                            class="dropdown-menu dropdown_passenger_info"
                                                                            aria-labelledby="dropdownMenuButton1">
                                                                            <div class="traveller-calulate-persons">
                                                                                <div class="passengers">
                                                                                    <h6>Passengers</h6>
                                                                                    <div class="passengers-types">
                                                                                        <div class="passengers-type">
                                                                                            <div class="text"><span
                                                                                                    class="count pcount">2</span>
                                                                                                <div class="type-label">
                                                                                                    <p>Adult</p>
                                                                                                    <span>12+
                                                                                                        yrs</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="button-set">
                                                                                                <button type="button"
                                                                                                        class="btn-add">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                        class="btn-subtract">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="passengers-type">
                                                                                            <div class="text"><span
                                                                                                    class="count ccount">0</span>
                                                                                                <div class="type-label">
                                                                                                    <p
                                                                                                        class="fz14 mb-xs-0">
                                                                                                        Children
                                                                                                    </p><span>2
                                                                                                        - Less than 12
                                                                                                        yrs</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="button-set">
                                                                                                <button type="button"
                                                                                                        class="btn-add-c">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                        class="btn-subtract-c">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="passengers-type">
                                                                                            <div class="text"><span
                                                                                                    class="count incount">0</span>
                                                                                                <div class="type-label">
                                                                                                    <p
                                                                                                        class="fz14 mb-xs-0">
                                                                                                        Infant
                                                                                                    </p><span>Less
                                                                                                        than 2
                                                                                                        yrs</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="button-set">
                                                                                                <button type="button"
                                                                                                        class="btn-add-in">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                        class="btn-subtract-in">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <span>Business</span>
                                                                </div>
                                                            </div>
                                                            <div class="top_form_search_button">
                                                                <div class="globalBtn mt-3 ">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#">Search
                                                                                <span></span><span></span><span></span><span></span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show active" id="tours" role="tabpanel"
                                 aria-labelledby="tours-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="{{route('user.programme.index')}}" id="programme_search_form"
                                                  method="get">
                                                <div class="row">
                                                    <div class="mb-2 col-lg-3 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed custom_flight_Search_boxed">
                                                            <p>{{\App\Helpers\TranslationHelper::translate('Choose City', 'site')}}</p>
                                                            <select name="prog_city" class="prog_city" id="prog_city" style="width: 100%">
                                                                <option value="">{{\App\Helpers\TranslationHelper::translate('Choose City', 'site')}}</option>
                                                                @if(isset($cities) && $cities->count() > 0)
                                                                    @foreach($cities as $city)
                                                                        <option
                                                                            value="{{$city->id}}" {{request()->has('prog_city') && request()->prog_city == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            <span class="custom_span"></span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 col-lg-3 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed custom_flight_Search_boxed">
                                                            <p>{{\App\Helpers\TranslationHelper::translate('Choose Type', 'site')}}</p>
                                                            <select name="tour_type_id" class="tour_type_id" id="tour_type_id" style="width: 100%">
                                                                <option value="">{{\App\Helpers\TranslationHelper::translate('Choose Type', 'site')}}</option>
                                                                @if(isset($types) && $types->count() > 0)
                                                                    @foreach($types as $type)
                                                                        <option
                                                                            value="{{$type->id}}" {{request()->has('tour_type_id') && request()->tour_type_id == $type->id ? 'selected' : ''}}>{{$type->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            <span class="custom_span"></span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 col-lg-3  col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Check in date</p>
                                                                    <input type="date" name="prog_check_in"
                                                                           value="{{request()->prog_check_in ?? ''}}">
                                                                    <span></span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 col-lg-3  col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed dropdown_passenger_area">
                                                            <p>Persons, Class </p>
                                                            <div class="dropdown">
                                                                <button
                                                                    class="dropdown-toggle final-count hotels_persons_count"
                                                                    data-toggle="dropdown" type="button"
                                                                    id="dropdownMenuButton1"
                                                                    data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    {{request()->adult_search_count ?? 0 + request()->children_search_count ?? 0 + request()->infant_search_count ?? 0}}
                                                                    Persons
                                                                </button>
                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                     aria-labelledby="dropdownMenuButton1" style="">
                                                                    <div class="traveller-calulate-persons">
                                                                        <div class="passengers">
                                                                            <h6>Persons</h6>
                                                                            <div class="passengers-types">
                                                                                <div class="passengers-type">
                                                                                    <div class="text counted">
                                                                                        <span
                                                                                            class="count pcount">{{request()->adult_search_count ?? 0}}</span>
                                                                                        <input class="countable"
                                                                                               type="hidden"
                                                                                               value="{{request()->adult_search_count ?? 0}}"
                                                                                               max=""
                                                                                               name="adult_search_count"
                                                                                               min="0">
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
                                                                                                onclick="plus_search_count(this)">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="btn-subtract minus_btn"
                                                                                                onclick="minus_search_count(this)">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text counted">
                                                                                        <span
                                                                                            class="count ccount">{{request()->children_search_count ?? 0}}</span>
                                                                                        <input class="countable"
                                                                                               type="hidden"
                                                                                               value="{{request()->children_search_count ?? 0}}"
                                                                                               max=""
                                                                                               name="children_search_count"
                                                                                               min="0">

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
                                                                                                onclick="plus_search_count(this)">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="btn-subtract-c minus_btn"
                                                                                                onclick="minus_search_count(this)">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text counted">
                                                                                        <span
                                                                                            class="count incount">{{request()->infant_search_count ?? 0}}</span>
                                                                                        <input class="countable"
                                                                                               type="hidden"
                                                                                               value="{{request()->infant_search_count ?? 0}}"
                                                                                               max=""
                                                                                               name="infant_search_count"
                                                                                               min="0">

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
                                                                                                onclick="plus_search_count(this)">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="btn-subtract-in minus_btn"
                                                                                                onclick="minus_search_count(this)">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <div class="globalBtn mt-3 ">
                                                            <ul>
                                                                <li>
                                                                    <button type="submit" id="search_hotels">
                                                                        Search
                                                                        <span></span><span></span><span></span><span></span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade " id="hotels" role="tabpanel"
                                 aria-labelledby="hotels-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="{{route('user.hotels.index')}}" id="hotels_search_form" method="get">
                                                <div class="row">
                                                    <div class="mb-2 col-lg-3 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed custom_flight_Search_boxed">
                                                            <p>Choose City</p>
                                                            <select name="city" class="city_main" id="city_main" style="width: 100%">
                                                                <option value="">{{\App\Helpers\TranslationHelper::translate('Choose City', 'site')}}</option>
                                                                @if(isset($cities) && $cities->count() > 0)
                                                                    @foreach($cities as $city)
                                                                        <option
                                                                            value="{{$city->id}}" {{request()->has('city') && request()->city == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            <span class="custom_span"></span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="form_search_date">
                                                                    <div class="flight_Search_boxed date_flex_area">
                                                                        <div class="Journey_date">
                                                                            <p>Check in date</p>
                                                                            <input type="date" name="check_in"
                                                                                   value="{{request()->check_in ?? ''}}">
                                                                            <span></span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="form_search_date">
                                                                    <div class="flight_Search_boxed date_flex_area">
                                                                        <div class="Journey_date">
                                                                            <p>Check out date</p>
                                                                            <input type="date" name="check_out"
                                                                                   value="{{request()->check_out ?? ''}}">
                                                                            <span></span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="mb-2 col-lg-3  col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed dropdown_passenger_area">
                                                            <p>Persons, Class </p>
                                                            <div class="dropdown">
                                                                <button
                                                                    class="dropdown-toggle final-count hotels_persons_count"
                                                                    data-toggle="dropdown" type="button"
                                                                    id="dropdownMenuButton1"
                                                                    data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    {{request()->adult_search_count ?? 0 + request()->children_search_count ?? 0 + request()->infant_search_count ?? 0}}
                                                                    Persons
                                                                </button>
                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                     aria-labelledby="dropdownMenuButton1" style="">
                                                                    <div class="traveller-calulate-persons">
                                                                        <div class="passengers">
                                                                            <h6>Persons</h6>
                                                                            <div class="passengers-types">
                                                                                <div class="passengers-type">
                                                                                    <div class="text counted">
                                                                                        <span
                                                                                            class="count pcount">{{request()->adult_search_count ?? 0}}</span>
                                                                                        <input class="countable"
                                                                                               type="hidden"
                                                                                               value="{{request()->adult_search_count ?? 0}}"
                                                                                               max=""
                                                                                               name="adult_search_count"
                                                                                               min="0">
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
                                                                                                onclick="plus_search_count(this)">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="btn-subtract minus_btn"
                                                                                                onclick="minus_search_count(this)">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text counted">
                                                                                        <span
                                                                                            class="count ccount">{{request()->children_search_count ?? 0}}</span>
                                                                                        <input class="countable"
                                                                                               type="hidden"
                                                                                               value="{{request()->children_search_count ?? 0}}"
                                                                                               max=""
                                                                                               name="children_search_count"
                                                                                               min="0">

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
                                                                                                onclick="plus_search_count(this)">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="btn-subtract-c minus_btn"
                                                                                                onclick="minus_search_count(this)">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text counted">
                                                                                        <span
                                                                                            class="count incount">{{request()->infant_search_count ?? 0}}</span>
                                                                                        <input class="countable"
                                                                                               type="hidden"
                                                                                               value="{{request()->infant_search_count ?? 0}}"
                                                                                               max=""
                                                                                               name="infant_search_count"
                                                                                               min="0">

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
                                                                                                onclick="plus_search_count(this)">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="btn-subtract-in minus_btn"
                                                                                                onclick="minus_search_count(this)">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <div class="globalBtn mt-3 ">
                                                            <ul>
                                                                <li>
                                                                    <button type="submit" id="search_hotels">
                                                                        Search
                                                                        <span></span><span></span><span></span><span></span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="bus" role="tabpanel" aria-labelledby="bus-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="oneway_search_form">

                                                            <div class="row">
                                                                <div class="mb-2 col-lg-4 col-md-6 col-sm-12 col-12">
                                                                    <div class="flight_Search_boxed">
                                                                        <p>From</p>
                                                                        <input type="text" value="Dhaka">
                                                                        <span>Bus Trtminal</span>
                                                                        <div class="plan_icon_posation">
                                                                            <i class="fas fa-plane-departure"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 col-lg-4 col-md-6 col-sm-12 col-12">
                                                                    <div class="flight_Search_boxed">
                                                                        <p>To</p>
                                                                        <input type="text" value="Cox’s Bazar ">
                                                                        <span>Bus Trtminal</span>
                                                                        <div class="plan_icon_posation">
                                                                            <i class="fas fa-plane-arrival"></i>
                                                                        </div>
                                                                        <div class="range_plan">
                                                                            <i class="fas fa-exchange-alt"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 col-lg-4  col-md-6 col-sm-12 col-12">
                                                                    <div class="form_search_date">
                                                                        <div class="flight_Search_boxed date_flex_area">
                                                                            <div class="Journey_date">
                                                                                <p>Journey date</p>
                                                                                <input type="date" value="2022-05-05">
                                                                                <span>Thursday</span>
                                                                            </div>
                                                                            <div class="Journey_date">
                                                                                <p>Return date</p>
                                                                                <input type="date" value="2022-05-08">
                                                                                <span>Saturday</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="top_form_search_button">
                                                                    <div class="globalBtn mt-3 ">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">Search
                                                                                    <span></span><span></span><span></span><span></span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

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
    <!-- search section end -->


    <!-- section start -->
    <section class="xs-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter-panel">
                        <div class="left-filter">
                            <h4><span
                                    class="result-count">{{$programmes->count()}}</span> {{\App\Helpers\TranslationHelper::translate('Programme Found', 'site')}}
                            </h4>
                        </div>
                        <div id="open_close_filter" onclick="openFilter()">
                            <i class="fas fa-sort-amount-down-alt"></i>
                        </div>
                        <div class="right-panel">

                            <div class="collection-grid-view">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" class="product-2-layout-view">
                                            <i class="far fa-th-large"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="product-3-layout-view">
                                            <i class="far fa-th"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="left-sidebar">
                        <div class="back-btn">
                            back
                        </div>
                        {{--                        <div class="search-bar">--}}
                        {{--                            <input class="form-control" type="text" placeholder="Search here..">--}}
                        {{--                            <i class="fas fa-search"></i>--}}
                        {{--                        </div>--}}
                        <div class="middle-part collection-collapse-block open">
                            <a href="javascript:void(0)" class="section-title collapse-block-title">
                                <h5>{{\App\Helpers\TranslationHelper::translate('filter', 'site')}}</h5>
                                <i class="fas fa-sort-amount-down-alt"></i>

                            </a>
                            <div class="collection-collapse-block-content ">
                                <form action="{{route('user.programme.index')}}">
                                    <input type="hidden" name="adult_search_count" value="{{request()->adult_search_count ?? 0 }}">
                                    <input type="hidden" name="children_search_count" value="{{request()->children_search_count ?? 0 }}">
                                    <input type="hidden" name="infant_search_count" value="{{request()->infant_search_count ?? 0 }}">
                                    <input type="hidden" name="prog_check_in" value="{{request()->prog_check_in ?? ''}}">
{{--                                    <input type="hidden" name="tour_type_id" value="{{request()->tour_type_id ?? ''}}">--}}

                                    <div class="filter-block custom_filter_box">
                                        <div class="row">
                                            <div class="col-lg-6 col-12 m-0 p-0">
                                                <a href="{{route('user.programme.index')}}"
                                                   class="btn btn-warning custom_secondary_btn">
                                                    {{\App\Helpers\TranslationHelper::translate('Reset', 'site')}}
                                                </a>
                                            </div>

                                            <div class="col-lg-6 col-12 m-0 p-0">
                                                <button type="submit" class="btn custom_primary_btn">
                                                    {{\App\Helpers\TranslationHelper::translate('filter', 'site')}}
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="filter-block">
                                        <div class="collection-collapse-block open">
                                            <h6 class="collapse-block-title">{{\App\Helpers\TranslationHelper::translate('Tour Type', 'site')}}</h6>
                                            <div class="collection-collapse-block-content">
                                                <div class="collection-brand-filter">
                                                    @if(isset($types) && $types->count() > 0)
                                                        <div class="form-check collection-filter-checkbox">
                                                            <input type="radio" name="tour_type_id" class="form-check-input"
                                                                   value="" id="all"
                                                                {{request()->has('tour_type_id') && request()->tour_type_id == '' || !request()->has('tour_type_id') ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="all">
                                                                {{\App\Helpers\TranslationHelper::translate('All', 'site')}}
                                                            </label>
                                                        </div>
                                                        @foreach($types as $type)
                                                            <div class="form-check collection-filter-checkbox">
                                                                <input type="radio" name="tour_type_id" class="form-check-input"
                                                                       value="{{$type->id}}" id="tour_type_id_{{$type->id}}" {{request()->has('tour_type_id') && request()->tour_type_id == $type->id ? 'checked' : ''}}>
                                                                <label class="form-check-label" for="tour_type_id_{{$type->id}}">
                                                                    {{$type->name}}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    @endif



                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="filter-block">
                                        <div class="collection-collapse-block open">
                                            <h6 class="collapse-block-title">Duration</h6>
                                            <div class="collection-collapse-block-content">
                                                <div class="wrapper">
                                                    <div class="range-slider">
                                                        <label for="duration" id="duration_label">{{request()->has('duration') && request()->duration != null ? request()->duration . ' ' . \App\Helpers\TranslationHelper::translate('Days', 'site') : 'All' }}</label><br>
                                                        <input type="range" name="duration" id="duration" min="0" max="50"  class="js-range-slider" value="{{request()->duration ?? 0}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="filter-block">
                                        <div class="collection-collapse-block open">
                                            <h6 class="collapse-block-title">star</h6>
                                            <div class="collection-collapse-block-content">
                                                <div class="collection-brand-filter">
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="radio" class="form-check-input" name="prog_stars"
                                                               value="5" id="prog_stars_five" {{request()->has('prog_stars') && request()->prog_stars == '5' ? 'checked' : ''}}>
                                                        <label class="form-check-label rating" for="prog_stars_five">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="radio" class="form-check-input" name="prog_stars"
                                                               value="4" id="prog_stars_four" {{request()->has('prog_stars') && request()->prog_stars == '4' ? 'checked' : ''}}>
                                                        <label class="form-check-label rating" for="prog_stars_four">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="radio" class="form-check-input" name="prog_stars"
                                                               value="3" id="prog_stars_three" {{request()->has('prog_stars') && request()->prog_stars == '3' ? 'checked' : ''}}>
                                                        <label class="form-check-label rating" for="prog_stars_three">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="radio" class="form-check-input" name="prog_stars"
                                                               value="2" id="prog_stars_two" {{request()->has('prog_stars') && request()->prog_stars == '2' ? 'checked' : ''}}>
                                                        <label class="form-check-label rating" for="prog_stars_two">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="radio" class="form-check-input" name="prog_stars"
                                                               value="1" id="prog_stars_one" {{request()->has('prog_stars') && request()->prog_stars == '1' ? 'checked' : ''}}>
                                                        <label class="form-check-label rating" for="prog_stars_one">
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-block">
                                        <div class="collection-collapse-block open">
                                            <h6 class="collapse-block-title">{{\App\Helpers\TranslationHelper::translate('Location', 'site')}}</h6>
                                            <div class="collection-collapse-block-content">
                                                <div class="collection-brand-filter">
                                                    <div class="mb-3">
                                                        <label for="country"
                                                               class="mb-2">{{\App\Helpers\TranslationHelper::translate('Country', 'site')}}</label>
                                                        <select name="country" id="country" class="form-select" onchange="getCitiesFromCountry()">
                                                            <option
                                                                value="" {{request()->has('country') && request()->country != '' || !request()->has('country') ? 'selected' : ''}}>
                                                                {{\App\Helpers\TranslationHelper::translate('Select Country', 'site')}}
                                                            </option>

                                                            @if(isset($countries) && $countries->count() > 0)
                                                                @foreach($countries as $country)
                                                                    <option value="{{$country->id}}" {{request()->has('country') && request()->country == $country->id ? 'selected' : ''}}>
                                                                        {{$country->name}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="city"
                                                               class="mb-2">{{\App\Helpers\TranslationHelper::translate('City', 'site')}}</label>
                                                        <select name="prog_city" id="city" class="form-select prog_filter_city" disabled>
                                                            <option value="">
                                                                {{\App\Helpers\TranslationHelper::translate('Select City', 'site')}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="bottom-info">
                            <h5><span>i</span> need help</h5>
                            <h4>856 - 215 - 211</h4>
                            <h6>Monday to Friday 9.00am - 7.30pm</h6>
                        </div>
                    </div>
                </div>


                <div class="col-lg-9 ratio3_2">
                    <div class="product-wrapper-grid special-section grid-box">
                        <div class="row  content grid">
                            @if(isset($programmes) && $programmes->count() > 0)
                                @foreach($programmes as $programme)
                                    <div class="col-xl-4 col-sm-6 popular grid-item wow fadeInUp">
                                        <div class="special-box">
                                            <div class="special-img">
                                                <a href="{{ route('user.programme.show', $programme->id) }}">
                                                    <img src="{{ $programme->getFirstMediaUrl('programmes') }}"
                                                         class="img-fluid blur-up lazyload bg-img" alt="">
                                                </a>
                                                <div class="top-icon">
                                                    @if(auth('web')->check())
                                                        <a href="javascript:void(0);" class="add_to_fav"
                                                           data-bs-toggle="tooltip"
                                                           data-placement="top" title="" onclick="favouriteChange(this)"
                                                           data-url="{{route('user.programme.favourite.change', ['id' => $programme->id])}}"
                                                           data-original-title="Add to Wishlist">
                                                            <i class="fa{{checkProgrammeWish($programme->id) == 0 ? 's' : 'r'}} fa-heart"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{route('user.login.form')}}" class="add_to_fav"
                                                           data-bs-toggle="tooltip" data-url="javascript:void(0)"
                                                           data-placement="top" title=""
                                                           data-original-title="Add to Wishlist">
                                                            <i class="far fa-heart"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="special-content">
                                                <a href="{{ route('user.programme.show', $programme->id) }}">
                                                    <h5>{{$programme->name}}
                                                        <span><i class="fas fa-map-marker-alt"></i>
                                                    {{$programme->country->name}}</span>
                                                    </h5>
                                                </a>
                                                <p>
                                                    {{Str::words(strip_tags($programme->description), '25')}}
                                                </p>
                                                <div class="bottom-section">
                                                    <div class="rating">
                                                        <i class="{{$programme->avg_rate > 0 ? 'fas' : 'far'}} fa-star"></i>
                                                        <i class="{{$programme->avg_rate > 1 ? 'fas' : 'far'}} fa-star"></i>
                                                        <i class="{{$programme->avg_rate > 2 ? 'fas' : 'far'}} fa-star"></i>
                                                        <i class="{{$programme->avg_rate > 3 ? 'fas' : 'far'}} fa-star"></i>
                                                        <i class="{{$programme->avg_rate > 4 ? 'fas' : 'far'}} fa-star"></i>
                                                        <span>{{$programme->rates->where('status', 1)->count()}} review</span>
                                                    </div>
                                                    <div class="price_fac">
                                                        <div class="price">
                                                            @if($programme->discount > 0)
                                                                <del>${{$programme->price}}</del>
                                                                <span>{{getProgrammePriceIfDiscount($programme)}}</span>

                                                            @else
                                                                <span>${{$programme->price}}</span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                    {{--                                                <div class="price">--}}
                                                    {{--                                                    <span>$1245 <small>Price starts from</small></span>--}}

                                                    {{--                                                </div>--}}
                                                </div>
                                            </div>
                                            <div class="label-offer">hot deal</div>
                                        </div>
                                    </div>
                                @endforeach

                            @else

                                <div class="col-lg-12 text-center">
                                    <h2 class="mb-4">There is no Result</h2>
                                    <img src="{{asset('end-user/assets/images/not_found.png')}}" alt="not_found"
                                         class="" style="width: 100px">
                                </div>


                            @endif
                        </div>
                    </div>
                    <div>
                        {!! $programmes->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->
@endsection


@push('user.js')

    {{--    Start Hotels--}}
    <script>
        $(document).ready(function () {
            let search_hotels = $("#search_hotels");
            let hotels_search_form = $('#hotels_search_form')

            search_hotels.on('click', function () {
                hotels_search_form.submit();
            });

            let city_main = $(".city_main");
            city_main.select2();
        });
    </script>
    {{-- End Hotels --}}


    {{-- Start Programmes--}}
    <script>
        $(document).ready(function () {
            let search_programmes = $("#search_programmes");
            let programmes_search_form = $('#programmes_search_form')

            search_programmes.on('click', function () {
                programmes_search_form.submit();
            });

            let prog_city = $("#prog_city");
            prog_city.select2();
            let tour_type_id = $("#tour_type_id");
            tour_type_id.select2();

            $('#duration').on('input', function() {
                $('#duration_label').text($(this).val() + ' {{\App\Helpers\TranslationHelper::translate('Days', 'site')}}');
            });
        });
    </script>
    @if(request()->has('country') && request()->country != '')
        <script>
            $(document).ready(function () {
                const lang = "{{app()->getLocale()}}";

                let prog_filter_city = $('.prog_filter_city');

                let country = "{{request()->country}}";
                if (country !== "") {
                    $.ajax({
                        url: "{{route('user.country.getCities')}}",
                        data: {
                            _token: "{{csrf_token()}}",
                            id: country,
                        },
                        type: "POST",
                        success: function (response) {
                            if (typeof (response) != 'object') {
                                response = $.parseJSON(response)
                            }
                            console.log(response);
                            prog_filter_city.find('option').remove();
                            if (response.status === 1) {
                                prog_filter_city.removeAttr('disabled');
                                let data = response.data;
                                // console.log(data);
                                let html_option = '';
                                let new_data = [];
                                new_data.push({
                                    id: '',
                                    text: '<span>{{\App\Helpers\TranslationHelper::translate("Choose City", "site")}}</span>',
                                    html: '<span>{{\App\Helpers\TranslationHelper::translate("Choose City", "site")}}</span>',
                                    title: '{{\App\Helpers\TranslationHelper::translate("Choose City", "site")}}',
                                });

                                $.each(data, function (i, item) {
                                    new_data.push({
                                        id: item.id,
                                        text: "<span>" + item.name[lang] + "</span>",
                                        html: "<span>" + item.name[lang] + "</span>",
                                        title: item.name[lang]
                                    });
                                });

                                // console.log(new_data);
                                prog_filter_city.select2({
                                    data: new_data,
                                    escapeMarkup: function (markup) {
                                        return markup;
                                    },
                                    templateResult: function (data) {
                                        return data.html;
                                    },
                                    templateSelection: function (data) {
                                        return data.text;
                                    }
                                });
                                @if(request()->has('prog_city') && request()->prog_city != '')
                                prog_filter_city.val('{{request()->prog_city}}');
                                prog_filter_city.trigger('change');
                                @else
                                prog_filter_city.val('');
                                prog_filter_city.trigger('change');
                                @endif
                            }
                        }
                    });
                } else {
                    prog_filter_city.find('option').remove();
                    let empty_data = [];
                    empty_data.push({
                        id: "",
                        text: '<span>{{\App\Helpers\TranslationHelper::translate("Choose City", "site")}}</span>',
                        html: '<span>{{\App\Helpers\TranslationHelper::translate("Choose City", "site")}}</span>',
                        title: '{{\App\Helpers\TranslationHelper::translate("Choose City", "site")}}',
                    });

                    prog_filter_city.select2({
                        data: empty_data,
                        escapeMarkup: function (markup) {
                            return markup;
                        },
                        templateResult: function (data) {
                            return data.html;
                        },
                        templateSelection: function (data) {
                            return data.text;
                        }
                    });
                    prog_filter_city.val('');
                    prog_filter_city.trigger('change');
                }
            });
        </script>
    @endif
    {{-- End Programmes --}}

@endpush

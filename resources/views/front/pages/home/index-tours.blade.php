@extends('front.layouts.app')

@section('content')
    {{-- image_panarea --}}
    <!-- hero-area-start -->
    <div class="tr-hero-area">
        <div class="container container-1790">
            <div class="tr-hero-bg z-index-1"
                style="background-image: url({{ setting('image_panarea', 'en') }}); background-size: cover; background-position: center; background-repeat: no-repeat; height: 650px;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <div class="tr-hero-content mb-3 text-center">
                                <h2 class="tr-hero-title wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s"
                                    style="font-family: 'Almarai', sans-serif;">
                                    {{ setting('Your_gateway_title', app()->getLocale()) }}
                                </h2>
                                <style>
                                    @import url('https://fonts.googleapis.com/css2?family=Almarai:wght@400;700&display=swap');
                                </style>

                                <div class="wow itfadeUp mb-0" data-wow-duration=".9s" data-wow-delay=".5s">
                                    <p>
                                        {!! setting('travel_agency_description', app()->getLocale()) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-tab text-center ps-4">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">


                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center {{ request()->get('service') == 'flight' ? 'active' : '' }}"
                                    {{-- {{ !request()->has('service') || request()->get('service') == 'flight' ? 'active' : '' }} --}}
                                    id="flight-tab" data-bs-toggle="tab" href="#flight" role="tab"
                                    aria-controls="flight" aria-selected="false">
                                    <i
                                        class="fas fa-hotel me-1"></i>{{ \App\Helpers\TranslationHelper::translate('Flights') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center {{ request()->get('service') == 'hotel' ? 'active' : '' }}"
                                    id="hotel-tab" data-bs-toggle="tab" href="#hotel" role="tab" aria-controls="hotel"
                                    aria-selected="false">
                                    <i
                                        class="fas fa-hotel me-1"></i>{{ \App\Helpers\TranslationHelper::translate('Hotels') }}
                                  </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center  {{ !request()->has('service') || request()->get('service') == 'tour' ? 'active' : '' }} "
                                    {{-- {{ request()->get('service') == 'tour' ? 'active' : '' }} --}}
                                    id="tour-tab" data-bs-toggle="tab" href="#tour" role="tab" aria-controls="tour"
                                    aria-selected="false">
                                    <i
                                        class="fas fa-globe me-1"></i>{{ \App\Helpers\TranslationHelper::translate('Tours') }}
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content search-fields-container" id="myTabContent">
                        <div class="tab-pane fade " id="flight" role="tabpanel" aria-labelledby="flight-tab">
                            {{-- show active --}}
                            <div class="section-tab section-tab-2 pb-3">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="one-way-tab" data-bs-toggle="tab" tab_id="one-way"
                                            href="#one-way" role="tab" aria-controls="one-way" aria-selected="true"
                                            onclick="changeFlightType()">
                                            {{ \App\Helpers\TranslationHelper::translate('One way') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="round-trip-tab" data-bs-toggle="tab" tab_id="round-trip"
                                            href="#round-trip" role="tab" aria-controls="round-trip"
                                            aria-selected="false" onclick="changeFlightType()">
                                            {{ \App\Helpers\TranslationHelper::translate('Round-trip') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="multi-city-tab" data-bs-toggle="tab" tab_id="multi-city"
                                            href="#multi-city" role="tab" aria-controls="multi-city"
                                            aria-selected="false" onclick="changeFlightType()">
                                            {{ \App\Helpers\TranslationHelper::translate('Multi-city') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent3">
                                <div class="tab-pane fade show active" id="one-way" role="tabpanel"
                                    aria-labelledby="one-way-tab">
                                    <div class="contact-form-action">
                                        <form action="{{ route('flight.search') }}" method="post"
                                            class="row align-items-center" id="search_flight_form_one_way">
                                            @csrf
                                            <input type="hidden" name="type" value="1">
                                            <input type="hidden" name="type_key" value="OW">
                                            <div class="col-lg-6 pe-0">
                                                <div class="input-box position-relative">
                                                    <label
                                                        class="label-text">{{ \App\Helpers\TranslationHelper::translate('Flying from') }}</label>
                                                    <div class="form-group">
                                                        <span class="fas fa-map-marker form-icon"></span>
                                                        <input class="form-control input_city" type="text"
                                                            onfocusin="showResultBox(this)"
                                                            onfocusout="hideResultBox(this)"
                                                            oninput="searchAirMasters(this)"
                                                            placeholder="{{ \App\Helpers\TranslationHelper::translate('City or airport') }}" />
                                                        <input type="hidden" name="air_master_id_from"
                                                            id="air_master_id_from" class="air_master_id" value=""
                                                            required>
                                                    </div>
                                                    <div id="air_masters_result" class="air_masters_result">
                                                        @if (isset($air_ports) && $air_ports->count() > 0)
                                                            @foreach ($air_ports as $air_port)
                                                                <div class="row mx-0 align-items-start air_item"
                                                                    onclick="updateInputs(this)"
                                                                    data-id="{{ $air_port->air_id }}"
                                                                    data-name="{{ $air_port->name }}"
                                                                    data-code="{{ $air_port->air_code }}"
                                                                    data-city="{{ $air_port->city_name }}"
                                                                    data-country="{{ $air_port->country_name }}">
                                                                    <div class="col-lg-1">
                                                                        <i class="fas fa-plane me-1"
                                                                            style="font-size: 22px"></i>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <div class="city_country">
                                                                            <span class="fs-5">
                                                                                {{ $air_port->city_name }},
                                                                                {{ $air_port->country_name }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="air_name">
                                                                            <span class="fs-6">
                                                                                {{ $air_port->name }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <div class="city_code text-end">
                                                                            ({{ $air_port->air_code }})
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div id="air_masters_result_ajax" class="air_masters_result">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-box position-relative">
                                                    <label
                                                        class="label-text">{{ \App\Helpers\TranslationHelper::translate('Flying to') }}</label>
                                                    <div class="form-group parent_div">
                                                        <span class="fas fa-map-marker form-icon"></span>
                                                        <input class="form-control input_city" type="text"
                                                            placeholder="{{ \App\Helpers\TranslationHelper::translate('City or airport') }}" onfocusin="showResultBox(this)"
                                                            onfocusout="hideResultBox(this)"
                                                            oninput="searchAirMasters(this)" />
                                                        <input type="hidden" name="air_master_id_to"
                                                            id="air_master_id_to" class="air_master_id" value="">
                                                    </div>
                                                    <div id="air_masters_result" class="air_masters_result">
                                                        @if (isset($air_ports) && $air_ports->count() > 0)
                                                            @foreach ($air_ports as $air_port)
                                                                <div class="row mx-0 align-items-start air_item"
                                                                    onclick="updateInputs(this)"
                                                                    data-id="{{ $air_port->air_id }}"
                                                                    data-name="{{ $air_port->name }}"
                                                                    data-code="{{ $air_port->air_code }}"
                                                                    data-city="{{ $air_port->city_name }}"
                                                                    data-country="{{ $air_port->country_name }}">
                                                                    <div class="col-lg-1">
                                                                        <i class="fas fa-plane me-1"
                                                                            style="font-size: 22px"></i>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <div class="city_country">
                                                                            <span class="fs-5">
                                                                                {{ $air_port->city_name }},
                                                                                {{ $air_port->country_name }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="air_name">
                                                                            <span class="fs-6">
                                                                                {{ $air_port->name }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <div class="city_code text-end">
                                                                            ({{ $air_port->air_code }})
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div id="air_masters_result_ajax" class="air_masters_result">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 pe-0">
                                                <div class="input-box">
                                                    <label
                                                        class="label-text">{{ \App\Helpers\TranslationHelper::translate('Departing') }}</label>
                                                    <div class="form-group">
                                                        <span class="fas fa-calendar form-icon"></span>
                                                        <input class="date-range form-control daterange-single"
                                                            type="text" name="flight_date" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 pe-0">
                                                <div class="input-box">
                                                    <label
                                                        class="label-text">{{ \App\Helpers\TranslationHelper::translate('Passengers') }}</label>
                                                    <div class="form-group">
                                                        <div class="dropdown dropdown-contain gty-container">
                                                            <a class="dropdown-toggle dropdown-btn" href="#"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false" data-bs-auto-close="outside">
                                                                <span class="adult" data-text="Adult"
                                                                    data-text-multi="Adults">
                                                                    0
                                                                    {{ \App\Helpers\TranslationHelper::translate('Adult') }}
                                                                </span>
                                                                -
                                                                <span class="children" data-text="Child"
                                                                    data-text-multi="Children">
                                                                    0
                                                                    {{ \App\Helpers\TranslationHelper::translate('Child') }}
                                                                </span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-wrap">
                                                                <div class="dropdown-item">
                                                                    <div
                                                                        class="qty-box d-flex align-items-center justify-content-between">
                                                                        <label>{{ \App\Helpers\TranslationHelper::translate('Adults') }}</label>
                                                                        <div class="qtyBtn d-flex align-items-center">
                                                                            <div class="qtyDec">
                                                                                <i class="fas fa-minus"></i>
                                                                            </div>
                                                                            <input type="text" name="adult_number"
                                                                                value="0" class="passenger_input"
                                                                                onchange="validateTotalPassengers(this);" />
                                                                            <div class="qtyInc">
                                                                                <i class="fas fa-plus"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown-item">
                                                                    <div
                                                                        class="qty-box d-flex align-items-center justify-content-between">
                                                                        <label>{{ \App\Helpers\TranslationHelper::translate('Children') }}</label>
                                                                        <div class="qtyBtn d-flex align-items-center">
                                                                            <div class="qtyDec">
                                                                                <i class="fas fa-minus"></i>
                                                                            </div>
                                                                            <input type="text" name="child_number"
                                                                                value="0" class="passenger_input"
                                                                                onchange="validateTotalPassengers(this);" />
                                                                            <div class="qtyInc">
                                                                                <i class="fas fa-plus"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown-item">
                                                                    <div
                                                                        class="qty-box d-flex align-items-center justify-content-between">
                                                                        <label>{{ \App\Helpers\TranslationHelper::translate('Infants') }}</label>
                                                                        <div class="qtyBtn d-flex align-items-center">
                                                                            <div class="qtyDec">
                                                                                <i class="fas fa-minus"></i>
                                                                            </div>
                                                                            <input type="text" name="infants_number"
                                                                                value="0"
                                                                                onchange="validateInfantsNumber(this); validateTotalPassengers(this);"
                                                                                class="passenger_input" />
                                                                            <div class="qtyInc">
                                                                                <i class="fas fa-plus"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 pe-0">
                                                <div class="input-box">
                                                    <label class="label-text"
                                                        for="class">{{ \App\Helpers\TranslationHelper::translate('Coach') }}</label>
                                                    <div
                                                        class="form-group select-contain select2-container-wrapper w-auto">
                                                        <select class="select-contain-select" name="class"
                                                            id="class">
                                                            <option value="Y" selected>
                                                                {{ \App\Helpers\TranslationHelper::translate('Economy') }}
                                                            </option>
                                                            <option value="W">
                                                                {{ \App\Helpers\TranslationHelper::translate('Premium Economy') }}
                                                            </option>
                                                            <option value="C">
                                                                {{ \App\Helpers\TranslationHelper::translate('Business Class') }}
                                                            </option>
                                                            <option value="F">
                                                                {{ \App\Helpers\TranslationHelper::translate('First class') }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="submit" class="tr-btn-green mb-lg-0 mb-3"
                                                    id="flight_submit">{{ \App\Helpers\TranslationHelper::translate('Search Now') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="round-trip" role="tabpanel"
                                    aria-labelledby="round-trip-tab">
                                    <div class="contact-form-action">
                                        <form action="{{ route('flight.search') }}" method="post"
                                            id="search_flight_form_round" class="row align-items-center">
                                            @csrf
                                            <input type="hidden" name="type" value="2">
                                            <input type="hidden" name="type_key" value="IRT">
                                            <div class="col-lg-6 pe-0">
                                                <div class="input-box position-relative">
                                                    <label
                                                        class="label-text">{{ \App\Helpers\TranslationHelper::translate('Flying from') }}</label>
                                                    <div class="form-group">
                                                        <span class="fas fa-map-marker form-icon"></span>
                                                        <input class="form-control input_city" type="text"
                                                            onfocusin="showResultBox(this)"
                                                            onfocusout="hideResultBox(this)"
                                                            oninput="searchAirMasters(this)"
                                                            placeholder="{{ \App\Helpers\TranslationHelper::translate('City or airport') }}" />
                                                        <input type="hidden" name="air_master_id_from"
                                                            id="air_master_id_from" class="air_master_id" value=""
                                                            required>
                                                    </div>
                                                    <div id="air_masters_result" class="air_masters_result">
                                                        @if (isset($air_ports) && $air_ports->count() > 0)
                                                            @foreach ($air_ports as $air_port)
                                                                <div class="row mx-0 align-items-start air_item"
                                                                    onclick="updateInputs(this)"
                                                                    data-id="{{ $air_port->air_id }}"
                                                                    data-name="{{ $air_port->name }}"
                                                                    data-code="{{ $air_port->air_code }}"
                                                                    data-city="{{ $air_port->city_name }}"
                                                                    data-country="{{ $air_port->country_name }}">
                                                                    <div class="col-lg-1">
                                                                        <i class="fas fa-plane me-1"
                                                                            style="font-size: 22px"></i>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <div class="city_country">
                                                                            <span class="fs-5">
                                                                                {{ $air_port->city_name }},
                                                                                {{ $air_port->country_name }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="air_name">
                                                                            <span class="fs-6">
                                                                                {{ $air_port->name }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <div class="city_code text-end">
                                                                            ({{ $air_port->air_code }})
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div id="air_masters_result_ajax" class="air_masters_result">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-box position-relative">
                                                    <label
                                                        class="label-text">{{ \App\Helpers\TranslationHelper::translate('Flying to') }}</label>
                                                    <div class="form-group parent_div">
                                                        <span class="fas fa-map-marker form-icon"></span>
                                                        <input class="form-control input_city" type="text"
                                                            placeholder="{{ \App\Helpers\TranslationHelper::translate('City or airport') }}" onfocusin="showResultBox(this)"
                                                            onfocusout="hideResultBox(this)"
                                                            oninput="searchAirMasters(this)" />
                                                        <input type="hidden" name="air_master_id_to"
                                                            id="air_master_id_to" class="air_master_id" value="">
                                                    </div>
                                                    <div id="air_masters_result" class="air_masters_result">
                                                        @if (isset($air_ports) && $air_ports->count() > 0)
                                                            @foreach ($air_ports as $air_port)
                                                                <div class="row mx-0 align-items-start air_item"
                                                                    onclick="updateInputs(this)"
                                                                    data-id="{{ $air_port->air_id }}"
                                                                    data-name="{{ $air_port->name }}"
                                                                    data-code="{{ $air_port->air_code }}"
                                                                    data-city="{{ $air_port->city_name }}"
                                                                    data-country="{{ $air_port->country_name }}">
                                                                    <div class="col-lg-1">
                                                                        <i class="fas fa-plane me-1"
                                                                            style="font-size: 22px"></i>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <div class="city_country">
                                                                            <span class="fs-5">
                                                                                {{ $air_port->city_name }},
                                                                                {{ $air_port->country_name }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="air_name">
                                                                            <span class="fs-6">
                                                                                {{ $air_port->name }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <div class="city_code text-end">
                                                                            ({{ $air_port->air_code }})
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div id="air_masters_result_ajax" class="air_masters_result">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 pe-0">
                                                <div class="input-box">
                                                    <label
                                                        class="label-text">{{ \App\Helpers\TranslationHelper::translate('Departing - Returning') }}</label>
                                                    <div class="form-group">
                                                        <span class="fas fa-calendar form-icon"></span>
                                                        <input class="date-range form-control" type="text"
                                                            name="daterange" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col-lg-3 -->
                                            <div class="col-lg-3 pe-0">
                                                <div class="input-box">
                                                    <label
                                                        class="label-text">{{ \App\Helpers\TranslationHelper::translate('Passengers') }}</label>
                                                    <div class="form-group">
                                                        <div class="dropdown dropdown-contain gty-container">
                                                            <a class="dropdown-toggle dropdown-btn" href="#"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false" data-bs-auto-close="outside">
                                                                <span class="adult" data-text="Adult"
                                                                    data-text-multi="Adults">0
                                                                    {{ \App\Helpers\TranslationHelper::translate('Adult') }}</span>
                                                                -
                                                                <span class="children" data-text="Child"
                                                                    data-text-multi="Children">0
                                                                    {{ \App\Helpers\TranslationHelper::translate('Child') }}</span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-wrap">
                                                                <div class="dropdown-item">
                                                                    <div
                                                                        class="qty-box d-flex align-items-center justify-content-between">
                                                                        <label>{{ \App\Helpers\TranslationHelper::translate('Adults') }}</label>
                                                                        <div class="qtyBtn d-flex align-items-center">
                                                                            <div class="qtyDec">
                                                                                <i class="fas fa-minus"></i>
                                                                            </div>
                                                                            <input type="text" name="adult_number"
                                                                                value="0" class="passenger_input"
                                                                                onchange="validateTotalPassengers(this);" />
                                                                            <div class="qtyInc">
                                                                                <i class="fas fa-plus"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown-item">
                                                                    <div
                                                                        class="qty-box d-flex align-items-center justify-content-between">
                                                                        <label>{{ \App\Helpers\TranslationHelper::translate('Children') }}</label>
                                                                        <div class="qtyBtn d-flex align-items-center">
                                                                            <div class="qtyDec">
                                                                                <i class="fas fa-minus"></i>
                                                                            </div>
                                                                            <input type="text" name="child_number"
                                                                                value="0" class="passenger_input"
                                                                                onchange="validateTotalPassengers(this);" />
                                                                            <div class="qtyInc">
                                                                                <i class="fas fa-plus"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown-item">
                                                                    <div
                                                                        class="qty-box d-flex align-items-center justify-content-between">
                                                                        <label>{{ \App\Helpers\TranslationHelper::translate('Infants') }}</label>
                                                                        <div class="qtyBtn d-flex align-items-center">
                                                                            <div class="qtyDec">
                                                                                <i class="fas fa-minus"></i>
                                                                            </div>
                                                                            <input type="text" name="infants_number"
                                                                                value="0"
                                                                                onchange="validateInfantsNumber(this); validateTotalPassengers(this);"
                                                                                class="passenger_input" />
                                                                            <div class="qtyInc">
                                                                                <i class="fas fa-plus"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end dropdown -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col-lg-3 -->
                                            <div class="col-lg-3 pe-0">
                                                <div class="input-box">
                                                    <label class="label-text"
                                                        for="class_round">{{ \App\Helpers\TranslationHelper::translate('Coach') }}</label>
                                                    <div class="form-group select2-container-wrapper">
                                                        <div class="select-contain w-auto">
                                                            <select class="select-contain-select" name="class"
                                                                id="class_round">
                                                                <option value="Y" selected>
                                                                    {{ \App\Helpers\TranslationHelper::translate('Economy') }}
                                                                </option>
                                                                <option value="W">
                                                                    {{ \App\Helpers\TranslationHelper::translate('Premium Economy') }}
                                                                </option>
                                                                <option value="C">
                                                                    {{ \App\Helpers\TranslationHelper::translate('Business Class') }}
                                                                </option>
                                                                <option value="F">
                                                                    {{ \App\Helpers\TranslationHelper::translate('First class') }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col-lg-3 -->
                                            <div class="col-lg-3">
                                                <button type="submit" class="tr-btn-green mb-lg-0 mb-3"
                                                    id="flight_submit_round">{{ \App\Helpers\TranslationHelper::translate('Search Now') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="advanced-wrap d-none">
                                        <a class="btn collapse-btn theme-btn-hover-gray font-size-15"
                                            data-bs-toggle="collapse" href="#collapseThree" role="button"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            {{ \App\Helpers\TranslationHelper::translate('Advanced options') }}
                                            <i class="fas fa-angle-down ms-1"></i>
                                        </a>
                                        <div class="collapse pt-3" id="collapseThree">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="input-box">
                                                        <label
                                                            class="label-text">{{ \App\Helpers\TranslationHelper::translate('Preferred airline') }}</label>
                                                        <div class="form-group select2-container-wrapper">
                                                            <div class="select-contain w-100">
                                                                <select class="select-contain-select">
                                                                    <option selected="selected" value="">
                                                                        {{ \App\Helpers\TranslationHelper::translate('No preference') }}
                                                                    </option>
                                                                    <option value="AN">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Advanced Air') }}
                                                                    </option>
                                                                    <option value="A3">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Aegean') }}
                                                                    </option>
                                                                    <option value="EI">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Aer Lingus') }}
                                                                    </option>
                                                                    <option value="5G">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Aerocuahonte / Mayair') }}
                                                                    </option>
                                                                    <option value="SU">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Aeroflot-Russian Airlines') }}
                                                                    </option>
                                                                    <option value="AR">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Aerolineas Argentinas') }}
                                                                    </option>
                                                                    <option value="VW">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Aeromar Airlines') }}
                                                                    </option>
                                                                    <option value="AM">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Aeromexic') }}
                                                                    </option>
                                                                    <option value="ZI">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Aigle Azur') }}
                                                                    </option>
                                                                    <option value="AH">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Algerie ') }}
                                                                    </option>
                                                                    <option value="KC">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Austral') }}
                                                                    </option>
                                                                    <option value="UU">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Air Austral') }}
                                                                    </option>
                                                                    <option value="BT">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Baltic ') }}
                                                                    </option>
                                                                    <option value="BP">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Botswana ') }}
                                                                    </option>
                                                                    <option value="AC">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Canada ') }}
                                                                    </option>
                                                                    <option value="TX">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Caraibes ') }}
                                                                    </option>
                                                                    <option value="CA">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Air China') }}
                                                                    </option>
                                                                    <option value="3E">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Choice One ') }}
                                                                    </option>
                                                                    <option value="XK">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Corsica ') }}
                                                                    </option>
                                                                    <option value="UX">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Air Europa') }}
                                                                    </option>
                                                                    <option value="X4">
                                                                        {{ \App\Helpers\TranslationHelper::translate('  Air Excursions LLC ') }}
                                                                    </option>
                                                                    <option value="AF">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Air France') }}
                                                                    </option>
                                                                    <option value="NY">
                                                                        {{ \App\Helpers\TranslationHelper::translate('  Air Iceland Connect') }}
                                                                    </option>
                                                                    <option value="AI">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Air India') }}
                                                                    </option>
                                                                    <option value="IG">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Italy ') }}
                                                                    </option>
                                                                    <option value="MD">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Air Madagascar') }}
                                                                    </option>
                                                                    <option value="KM">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Malta') }}
                                                                    </option>
                                                                    <option value="MK">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Mauritius ') }}
                                                                    </option>
                                                                    <option value="9U">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Moldova ') }}
                                                                    </option>
                                                                    <option value="NZ">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air New Zealand ') }}
                                                                    </option>
                                                                    <option value="PX">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Air Niugini') }}
                                                                    </option>
                                                                    <option value="OG">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Onix ') }}
                                                                    </option>
                                                                    <option value="JU">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Air Serbia') }}
                                                                    </option>
                                                                    <option value="TN">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Tahiti Nui ') }}
                                                                    </option>
                                                                    <option value="TS">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Air Transat ') }}
                                                                    </option>
                                                                    <option value="H/">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' AirAsia with baggage') }}
                                                                    </option>
                                                                    <option value="AS">
                                                                        {{ \App\Helpers\TranslationHelper::translate('  Alaska Airlines ') }}
                                                                    </option>
                                                                    <option value="AZ">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Alitalia') }}
                                                                    </option>
                                                                    <option value="NH">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' All Nippon Airways ') }}
                                                                    </option>
                                                                    <option value="G4">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Allegiant Air') }}
                                                                    </option>
                                                                    <option value="AA">
                                                                        {{ \App\Helpers\TranslationHelper::translate('  American Airlines') }}
                                                                    </option>
                                                                    <option value="OY">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Andes Lineas Aereas') }}
                                                                    </option>
                                                                    <option value="OZ">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Asiana Airlines') }}
                                                                    </option>
                                                                    <option value="KP">
                                                                        {{ \App\Helpers\TranslationHelper::translate('ASKY') }}
                                                                    </option>
                                                                    <option value="OS">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Austrian Airlines') }}
                                                                    </option>
                                                                    <option value="AV">
                                                                        Avianca{{ \App\Helpers\TranslationHelper::translate('Flying to') }}
                                                                    </option>
                                                                    <option value="2K">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Avianca Ecuador') }}
                                                                    </option>
                                                                    <option value="9V">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Avior Airlines') }}
                                                                    </option>
                                                                    <option value="J2">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Azerbaijan Airlines') }}
                                                                    </option>
                                                                    <option value="AD">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Azul') }}
                                                                    </option>
                                                                    <option value="JD">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Beijing Capital Airlines') }}
                                                                    </option>
                                                                    <option value="0B">
                                                                        {{ \App\Helpers\TranslationHelper::translate('BlueAir') }}
                                                                    </option>
                                                                    <option value="OB">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' Boliviana De Aviacion') }}
                                                                    </option>
                                                                    <option value="4B">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Boutique Air') }}
                                                                    </option>
                                                                    <option value="BA">
                                                                        {{ \App\Helpers\TranslationHelper::translate(' British Airways') }}
                                                                    </option>
                                                                    <option value="SN">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Brussels Airlines') }}
                                                                    </option>
                                                                    <option value="A7">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Calafia Airlines') }}
                                                                    </option>
                                                                    <option value="K6">
                                                                        {{ \App\Helpers\TranslationHelper::translate('Cambodia Angkor Air') }}
                                                                    </option>
                                                                    <option value="BW">
                                                                        Caribbean Airlines
                                                                    </option>
                                                                    <option value="CX">Cathay Pacific</option>
                                                                    <option value="KX">Cayman Airways</option>
                                                                    <option value="CI">China Airlines</option>
                                                                    <option value="MU">
                                                                        China Eastern Airlines
                                                                    </option>
                                                                    <option value="CZ">
                                                                        China Southern Airlines
                                                                    </option>
                                                                    <option value="CC">CM Airlines</option>
                                                                    <option value="DE">Condor</option>
                                                                    <option value="LF">
                                                                        Contour Airlines
                                                                    </option>
                                                                    <option value="CM">Copa</option>
                                                                    <option value="SS">Corsair</option>
                                                                    <option value="OK">Czech Airlines</option>
                                                                    <option value="DL">Delta</option>
                                                                    <option value="KG">
                                                                        Denver Air Connection
                                                                    </option>
                                                                    <option value="U2">easyJet</option>
                                                                    <option value="MS">Egyptair</option>
                                                                    <option value="LY">
                                                                        EL AL Israel Airlines
                                                                    </option>
                                                                    <option value="7Q">Elite Airways</option>
                                                                    <option value="EL">Ellinair</option>
                                                                    <option value="EK">Emirates</option>
                                                                    <option value="ET">
                                                                        Ethiopian Airlines
                                                                    </option>
                                                                    <option value="EY">Etihad Airways</option>
                                                                    <option value="EW">Eurowings</option>
                                                                    <option value="BR">EVA Airways</option>
                                                                    <option value="FJ">Fiji Airways</option>
                                                                    <option value="AY">Finnair</option>
                                                                    <option value="FY">Firefly</option>
                                                                    <option value="F8">Flair Airlines</option>
                                                                    <option value="BE">Flybe</option>
                                                                    <option value="FZ">flydubai</option>
                                                                    <option value="XY">flynas</option>
                                                                    <option value="F9">
                                                                        Frontier Airlines
                                                                    </option>
                                                                    <option value="GA">
                                                                        Garuda Indonesia
                                                                    </option>
                                                                    <option value="GM">
                                                                        Germania Flug AG
                                                                    </option>
                                                                    <option value="4U">Germanwings</option>
                                                                    <option value="G3">
                                                                        GOL Linhas Aereas S.A.
                                                                    </option>
                                                                    <option value="ZK">
                                                                        Great Lakes Airlines
                                                                    </option>
                                                                    <option value="GF">Gulf Air</option>
                                                                    <option value="HU">
                                                                        Hainan Airlines
                                                                    </option>
                                                                    <option value="HA">
                                                                        Hawaiian Airlines
                                                                    </option>
                                                                    <option value="HX">
                                                                        Hong Kong Airlines
                                                                    </option>
                                                                    <option value="IB">Iberia</option>
                                                                    <option value="FI">Icelandair</option>
                                                                    <option value="JY">
                                                                        interCaribbean Airways
                                                                    </option>
                                                                    <option value="4O">Interjet</option>
                                                                    <option value="03">Involatus</option>
                                                                    <option value="JL">Japan Airlines</option>
                                                                    <option value="9W">Jet Airways</option>
                                                                    <option value="B6">
                                                                        JetBlue Airways
                                                                    </option>
                                                                    <option value="DV">
                                                                        JSC Aircompany SCAT
                                                                    </option>
                                                                    <option value="KQ">Kenya Airways</option>
                                                                    <option value="KL">KLM</option>
                                                                    <option value="KE">Korean Air</option>
                                                                    <option value="B0">La Compagnie</option>
                                                                    <option value="LR">LACSA</option>
                                                                    <option value="QV">Lao Airlines</option>
                                                                    <option value="LP">
                                                                        LATAM Airlines Group
                                                                    </option>
                                                                    <option value="LA">
                                                                        LATAM Airlines Group
                                                                    </option>
                                                                    <option value="JJ">
                                                                        LATAM Airlines Group
                                                                    </option>
                                                                    <option value="XL">
                                                                        LATAM Airlines Group
                                                                    </option>
                                                                    <option value="4M">
                                                                        LATAM Airlines Group
                                                                    </option>
                                                                    <option value="W4">LC Peru</option>
                                                                    <option value="LI">Liat</option>
                                                                    <option value="LO">
                                                                        LOT-Polish Airlines
                                                                    </option>
                                                                    <option value="LH">Lufthansa</option>
                                                                    <option value="LG">Luxair</option>
                                                                    <option value="MH">
                                                                        Malaysia Airlines
                                                                    </option>
                                                                    <option value="OD">Malindo Air</option>
                                                                    <option value="2M">
                                                                        Maya Island Air
                                                                    </option>
                                                                    <option value="7M">Mayair</option>
                                                                    <option value="OM">
                                                                        MIAT-Mongolian Airlines
                                                                    </option>
                                                                    <option value="ME">
                                                                        Middle East Airlines
                                                                    </option>
                                                                    <option value="YM">Montenegro</option>
                                                                    <option value="8M">
                                                                        Myanmar Airways International
                                                                    </option>
                                                                    <option value="NO">Neos S.P.A.</option>
                                                                    <option value="RA">Nepal Airlines</option>
                                                                    <option value="NP">Nile Air</option>
                                                                    <option value="W/">
                                                                        NokScoot with baggage
                                                                    </option>
                                                                    <option value="DN">
                                                                        Norwegian Air Argentina
                                                                    </option>
                                                                    <option value="D8">
                                                                        Norwegian Air International Ltd
                                                                    </option>
                                                                    <option value="DY">
                                                                        Norwegian Air Shuttle
                                                                    </option>
                                                                    <option value="DI">
                                                                        Norwegian Air UK
                                                                    </option>
                                                                    <option value="Y/">
                                                                        Olympic Air with baggage
                                                                    </option>
                                                                    <option value="WY">Oman Air</option>
                                                                    <option value="8Q">Onur Air</option>
                                                                    <option value="8P">
                                                                        Pacific Coastal Airlines
                                                                    </option>
                                                                    <option value="PK">
                                                                        Pakistan International Airlines
                                                                    </option>
                                                                    <option value="ZM">Pegasus Asia</option>
                                                                    <option value="KS">PenAir</option>
                                                                    <option value="PR">
                                                                        Philippine Airlines
                                                                    </option>
                                                                    <option value="PU">
                                                                        Plus Ultra Lineas Aereas S. A.
                                                                    </option>
                                                                    <option value="PD">
                                                                        Porter Airlines
                                                                    </option>
                                                                    <option value="PW">PrecisionAir</option>
                                                                    <option value="P0">
                                                                        Proflight Zambia
                                                                    </option>
                                                                    <option value="QF">Qantas Airways</option>
                                                                    <option value="QR">Qatar Airways</option>
                                                                    <option value="7H">Ravn Alaska</option>
                                                                    <option value="WZ">
                                                                        Red Wings Airlines
                                                                    </option>
                                                                    <option value="4P">Regional Sky</option>
                                                                    <option value="AT">
                                                                        Royal Air Maroc
                                                                    </option>
                                                                    <option value="BI">
                                                                        Royal Brunei Airlines
                                                                    </option>
                                                                    <option value="RJ">
                                                                        Royal Jordanian
                                                                    </option>
                                                                    <option value="WB">Rwandair</option>
                                                                    <option value="SK">SAS</option>
                                                                    <option value="S4">
                                                                        SATA International-Azores Airlines S.A.
                                                                    </option>
                                                                    <option value="SV">
                                                                        Saudi Arabian Airlines
                                                                    </option>
                                                                    <option value="/Y">
                                                                        Scoot with baggage
                                                                    </option>
                                                                    <option value="BB">
                                                                        Seaborne Airlines
                                                                    </option>
                                                                    <option value="SC">
                                                                        Shandong Airlines
                                                                    </option>
                                                                    <option value="3U">
                                                                        Sichuan Airlines
                                                                    </option>
                                                                    <option value="3M">Silver Airways</option>
                                                                    <option value="SQ">
                                                                        Singapore Airlines
                                                                    </option>
                                                                    <option value="H2">Sky Airlines</option>
                                                                    <option value="GQ">Sky Express</option>
                                                                    <option value="IE">
                                                                        Solomon Airlines
                                                                    </option>
                                                                    <option value="SA">
                                                                        South African Airways
                                                                    </option>
                                                                    <option value="9X">
                                                                        Southern Airways
                                                                    </option>
                                                                    <option value="NK">
                                                                        Spirit Airlines
                                                                    </option>
                                                                    <option value="UL">
                                                                        SriLankan Airlines
                                                                    </option>
                                                                    <option value="2I">STAR PERU</option>
                                                                    <option value="6G">
                                                                        Sun Air Express
                                                                    </option>
                                                                    <option value="SY">
                                                                        Sun Country Airlines
                                                                    </option>
                                                                    <option value="PY">
                                                                        Surinam Airways
                                                                    </option>
                                                                    <option value="LX">
                                                                        Swiss International Air Lines
                                                                    </option>
                                                                    <option value="WO">Swoop</option>
                                                                    <option value="DT">
                                                                        TAAG Angola Airlines
                                                                    </option>
                                                                    <option value="TA">TACA Airlines</option>
                                                                    <option value="VR">
                                                                        TACV-Cabo Verde Airlines
                                                                    </option>
                                                                    <option value="5U">TAG Airlines</option>
                                                                    <option value="EQ">Tame</option>
                                                                    <option value="TP">TAP Portugal</option>
                                                                    <option value="RO">
                                                                        Tarom-Romanian Air Transport
                                                                    </option>
                                                                    <option value="TG">
                                                                        Thai Airways International
                                                                    </option>
                                                                    <option value="MT">
                                                                        Thomas Cook Airlines
                                                                    </option>
                                                                    <option value="/X">
                                                                        Tigerair Australia with Bag
                                                                    </option>
                                                                    <option value="IT">
                                                                        Tigerair Taiwan
                                                                    </option>
                                                                    <option value="/Z">
                                                                        Tigerair Taiwan with bag
                                                                    </option>
                                                                    <option value="TJ">
                                                                        Tradewind Aviation
                                                                    </option>
                                                                    <option value="9N">Tropic Air</option>
                                                                    <option value="TB">TUI fly</option>
                                                                    <option value="TK">
                                                                        Turkish Airlines
                                                                    </option>
                                                                    <option value="PS">
                                                                        Ukraine International Airlines
                                                                    </option>
                                                                    <option value="UA">United</option>
                                                                    <option value="UT">Utair Aviation</option>
                                                                    <option value="HY">
                                                                        Uzbekistan Airways
                                                                    </option>
                                                                    <option value="VN">
                                                                        Vietnam Airlines
                                                                    </option>
                                                                    <option value="VX">Virgin America</option>
                                                                    <option value="VS">
                                                                        Virgin Atlantic
                                                                    </option>
                                                                    <option value="VA">
                                                                        Virgin Australia
                                                                    </option>
                                                                    <option value="V2">
                                                                        Vision Airlines
                                                                    </option>
                                                                    <option value="VB">Viva Aerobus</option>
                                                                    <option value="F1">
                                                                        Viva Air Colombia
                                                                    </option>
                                                                    <option value="VV">
                                                                        Viva Airlines Peru
                                                                    </option>
                                                                    <option value="Y4">Volaris</option>
                                                                    <option value="V7">Volotea</option>
                                                                    <option value="VY">
                                                                        Vueling Airlines
                                                                    </option>
                                                                    <option value="WS">WestJet</option>
                                                                    <option value="WM">
                                                                        Windward Island Airways International
                                                                    </option>
                                                                    <option value="MF">
                                                                        Xiamen Airlines
                                                                    </option>
                                                                    <option value="SE">XL Airways</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end advanced-wrap -->
                                </div>
                                <!-- end tab-pane -->
                                <div class="tab-pane fade multi-flight-wrap" id="multi-city" role="tabpanel"
                                    aria-labelledby="multi-city-tab">
                                    <div class="contact-form-action align-items-center">
                                        <form action="{{ route('flight.multi.search') }}" method="post"
                                            id="search_flight_form_multi" class="">
                                            @csrf
                                            <input type="hidden" name="type" value="3">
                                            <input type="hidden" name="type_key" value="NMC">
                                            <div class="multi-flight-field d-flex align-items-center flight_row">

                                                <div class="row flex-grow-1 align-items-center">
                                                    <div class="col-lg-5 pe-0">
                                                        <div class="input-box position-relative">
                                                            <label class="label-text">{{ \App\Helpers\TranslationHelper::translate('Flying from') }}</label>
                                                            <div class="form-group">
                                                                <span class="fas fa-map-marker form-icon"></span>
                                                                <input class="form-control input_city" type="text"
                                                                    onfocusin="showResultBox(this)"
                                                                    onfocusout="hideResultBox(this)"
                                                                    oninput="searchAirMasters(this)"
                                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('City or airport') }}" />
                                                                <input type="hidden" name="air_master_id_from[]"
                                                                    class="air_master_id" value="" required>
                                                            </div>
                                                            <div id="air_masters_result" class="air_masters_result">
                                                                @if (isset($air_ports) && $air_ports->count() > 0)
                                                                    @foreach ($air_ports as $air_port)
                                                                        <div class="row mx-0 align-items-start air_item"
                                                                            onclick="updateInputs(this)"
                                                                            data-id="{{ $air_port->air_id }}"
                                                                            data-name="{{ $air_port->name }}"
                                                                            data-code="{{ $air_port->air_code }}"
                                                                            data-city="{{ $air_port->city_name }}"
                                                                            data-country="{{ $air_port->country_name }}">
                                                                            <div class="col-lg-1">
                                                                                <i class="fas fa-plane me-1"
                                                                                    style="font-size: 22px"></i>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="city_country">
                                                                                    <span class="fs-5">
                                                                                        {{ $air_port->city_name }},
                                                                                        {{ $air_port->country_name }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="air_name">
                                                                                    <span class="fs-6">
                                                                                        {{ $air_port->name }}
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <div class="city_code text-end">
                                                                                    ({{ $air_port->air_code }})
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div id="air_masters_result_ajax" class="air_masters_result">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col-lg-3 -->
                                                    <div class="col-lg-5 pe-0">
                                                        <div class="input-box position-relative">
                                                            <label class="label-text">{{ \App\Helpers\TranslationHelper::translate('Flying to') }}</label>
                                                            <div class="form-group parent_div">
                                                                <span class="fas fa-map-marker form-icon"></span>
                                                                <input class="form-control input_city" type="text"
                                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('City or airport') }}"
                                                                    onfocusin="showResultBox(this)"
                                                                    onfocusout="hideResultBox(this)"
                                                                    oninput="searchAirMasters(this)" />
                                                                <input type="hidden" name="air_master_id_to[]"
                                                                    class="air_master_id" value="">
                                                            </div>
                                                            <div id="air_masters_result" class="air_masters_result">
                                                                @if (isset($air_ports) && $air_ports->count() > 0)
                                                                    @foreach ($air_ports as $air_port)
                                                                        <div class="row mx-0 align-items-start air_item"
                                                                            onclick="updateInputs(this)"
                                                                            data-id="{{ $air_port->air_id }}"
                                                                            data-name="{{ $air_port->name }}"
                                                                            data-code="{{ $air_port->air_code }}"
                                                                            data-city="{{ $air_port->city_name }}"
                                                                            data-country="{{ $air_port->country_name }}">
                                                                            <div class="col-lg-1">
                                                                                <i class="fas fa-plane me-1"
                                                                                    style="font-size: 22px"></i>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="city_country">
                                                                                    <span class="fs-5">
                                                                                        {{ $air_port->city_name }},
                                                                                        {{ $air_port->country_name }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="air_name">
                                                                                    <span class="fs-6">
                                                                                        {{ $air_port->name }}
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <div class="city_code text-end">
                                                                                    ({{ $air_port->air_code }})
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div id="air_masters_result_ajax" class="air_masters_result">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col-lg-3 -->
                                                    <div class="col-lg-2">
                                                        <div class="input-box">
                                                            <label class="label-text">{{ \App\Helpers\TranslationHelper::translate('Departing') }}</label>
                                                            <div class="form-group">
                                                                <span class="fas fa-calendar form-icon"></span>
                                                                <input class="date-range form-control date-multi-picker"
                                                                    id="date" type="text"
                                                                    name="daterange_single[]" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="multi-flight-delete-wrap pt-3 ps-3">
                                                    <button class="multi-flight-remove" type="button">
                                                        <i class="fas fa-remove"></i>
                                                    </button>
                                                </div>


                                            </div>
                                            <div class="row flex-grow-1 align-items-center">
                                                <div class="col-lg-3 pe-0">
                                                    <div class="form-group">
                                                        <button class="theme-btn add-flight-btn margin-top-40px w-100"
                                                            type="button">
                                                            <i class="fas fa-plus me-1"></i>{{ \App\Helpers\TranslationHelper::translate('Add another flight') }}
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 pe-0">
                                                    <div class="input-box">
                                                        <label
                                                            class="label-text">{{ \App\Helpers\TranslationHelper::translate('Passengers') }}</label>
                                                        <div class="form-group">
                                                            <div class="dropdown dropdown-contain gty-container">
                                                                <a class="dropdown-toggle dropdown-btn" href="#"
                                                                    role="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false" data-bs-auto-close="outside">
                                                                    <span class="adult" data-text="Adult"
                                                                        data-text-multi="Adults">{{ \App\Helpers\TranslationHelper::translate('0 Adult') }}</span>
                                                                    -
                                                                    <span class="children" data-text="Child"
                                                                        data-text-multi="Children">{{ \App\Helpers\TranslationHelper::translate('0 Child') }}</span>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-wrap">
                                                                    <div class="dropdown-item">
                                                                        <div
                                                                            class="qty-box d-flex align-items-center justify-content-between">
                                                                            <label>Adults</label>
                                                                            <div class="qtyBtn d-flex align-items-center">
                                                                                <div class="qtyDec">
                                                                                    <i class="fas fa-minus"></i>
                                                                                </div>
                                                                                <input type="text" name="adult_number"
                                                                                    value="0" class="passenger_input"
                                                                                    onchange="validateTotalPassengers(this);" />
                                                                                <div class="qtyInc">
                                                                                    <i class="fas fa-plus"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-item">
                                                                        <div
                                                                            class="qty-box d-flex align-items-center justify-content-between">
                                                                            <label>Children</label>
                                                                            <div class="qtyBtn d-flex align-items-center">
                                                                                <div class="qtyDec">
                                                                                    <i class="fas fa-minus"></i>
                                                                                </div>
                                                                                <input type="text" name="child_number"
                                                                                    value="0" class="passenger_input"
                                                                                    onchange="validateTotalPassengers(this)" />
                                                                                <div class="qtyInc">
                                                                                    <i class="fas fa-plus"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-item">
                                                                        <div
                                                                            class="qty-box d-flex align-items-center justify-content-between">
                                                                            <label>Infants</label>
                                                                            <div class="qtyBtn d-flex align-items-center">
                                                                                <div class="qtyDec">
                                                                                    <i class="fas fa-minus"></i>
                                                                                </div>
                                                                                <input type="text"
                                                                                    name="infants_number" value="0"
                                                                                    onchange="validateInfantsNumber(this); validateTotalPassengers(this);"
                                                                                    class="passenger_input" />
                                                                                <div class="qtyInc">
                                                                                    <i class="fas fa-plus"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end dropdown -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-lg-3 -->
                                                <div class="col-lg-3 pe-0">
                                                    <div class="input-box">
                                                        <label class="label-text" for="class_multi">Coach</label>
                                                        <div class="form-group select2-container-wrapper">
                                                            <div class="select-contain w-auto">
                                                                <select class="select-contain-select" name="class"
                                                                    id="class_multi">
                                                                    <option value="Y" selected>{{ \App\Helpers\TranslationHelper::translate('Economy') }}</option>
                                                                    <option value="W">{{ \App\Helpers\TranslationHelper::translate('Premium Economy') }}</option>
                                                                    <option value="C">{{ \App\Helpers\TranslationHelper::translate('Business Class') }}</option>
                                                                    <option value="F">{{ \App\Helpers\TranslationHelper::translate('First class') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-lg-3 -->
                                                <div class="col-lg-3">
                                                    <button type="submit" class="tr-btn-green mb-lg-0 mb-3"
                                                        id="flight_submit_multi"> {{ \App\Helpers\TranslationHelper::translate('Search Now') }}
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- end col-lg-3 -->
                                        </form>

                                    </div>
                                </div>
                                <!-- end tab-pane -->
                            </div>
                        </div>
                        <!-- end tab-pane -->
                        <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                            <div class="contact-form-action">
                                <form action="{{ route('hotel.search') }}" class="row align-items-center"
                                    method="post" id="hotel_search">
                                    @csrf

                                    <div class="col-lg-3 pe-0">
                                        <div class="input-box">
                                            <label class="label-text">
                                                {{ \App\Helpers\TranslationHelper::translate('Search Destination') }}
                                            </label>
                                            <div class="form-group">
                                                <span class="fas fa-map-marker form-icon"></span>
                                                <input class="form-control input_destination" type="text"
                                                    onfocusin="showResultBoxDestination(this)"
                                                    onfocusout="hideResultBoxDestination(this)"
                                                    oninput="searchDestination(this)"
                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('Where Are You Going?') }}" />


                                                <input type="hidden" name="destination" id="destination"
                                                    class="destination_id" value="" required>

                                                <div id="destination_result" class="destination_result">
                                                    @if (isset($hotel_cities) && count($hotel_cities) > 0)
                                                        @foreach ($hotel_cities as $hotel_city)
                                                            <div class="row mx-0 align-items-start air_item"
                                                                onclick="updateInputsDestination(this)"
                                                                data-city_Id="{{ $hotel_city->id }}"
                                                                data-cityCode="{{ $hotel_city->code }}"
                                                                data-cityName="{{ $hotel_city->name }}"
                                                                data-displayName="{{ $hotel_city->display_name }}"
                                                                data-country="{{ $hotel_city->country_name }}"
                                                                data-countryCode="{{ $hotel_city->country_code }}">
                                                                <div class="col-lg-1">
                                                                    <i class="fas fa-map-marker  me-1"
                                                                        style="font-size: 15px"></i>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <span class="fs-10">
                                                                        {{ $hotel_city->display_name }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div id="destination_result_ajax" class="destination_result">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 pe-0">
                                        <div class="input-box">
                                            <label class="label-text">
                                                {{ \App\Helpers\TranslationHelper::translate('Search Nationality') }}
                                            </label>
                                            <div class="form-group">
                                                <span class="fas fa-map-marker form-icon"></span>
                                                <input class="form-control input_nationality" type="text"
                                                    onfocusin="showResultBoxNationality(this)"
                                                    onfocusout="hideResultBoxNationality(this)"
                                                    oninput="searchNationality(this)"
                                                    placeholder=" {{ \App\Helpers\TranslationHelper::translate('Where Are You Going?') }}" />

                                                <input type="hidden" name="nationality_id" id="nationality_id"
                                                    class="nationality_id" value="" required>

                                                <div id="nationality_result" class="nationality_result">
                                                    @if (isset($nations) && count($nations) > 0)
                                                        @foreach ($nations as $key => $nation)
                                                            <div class="row mx-0 align-items-start nationality_item"
                                                                onclick="updateInputsNationality(this)"
                                                                data-key="{{ $key }}"
                                                                data-name="{{ $nation }}">

                                                                <div class="col-lg-12">
                                                                    <span class="fs-10">
                                                                        {{ $nation }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div id="nationality_result_ajax" class="nationality_result">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-lg-3 -->
                                    <div class="col-lg-2 pe-0">
                                        <div class="input-box">
                                            <label class="label-text">
                                                {{ \App\Helpers\TranslationHelper::translate('Check in') }}</label>
                                            <div class="form-group">
                                                <span class="fas fa-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text"
                                                    name="hotel_check_in" id="hotel_check_in" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-lg-3 -->
                                    <div class="col-lg-2 pe-0">
                                        <div class="input-box">
                                            <label
                                                class="label-text">{{ \App\Helpers\TranslationHelper::translate('Check out') }}</label>
                                            <div class="form-group">
                                                <span class="fas fa-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text"
                                                    name="hotel_check_out" id="hotel_check_out" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-lg-3 -->
                                    <div class="col-lg-3">
                                        <div class="input-box">
                                            <label
                                                class="label-text">{{ \App\Helpers\TranslationHelper::translate('Guests and Rooms') }}</label>
                                            <div class="form-group">
                                                <div class="dropdown dropdown-contain gty-container">
                                                    <a class="dropdown-toggle dropdown-btn" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        data-bs-auto-close="outside">
                                                        <span class="adult" data-text="Adult" data-text-multi="Adults">
                                                            <span id="room_adults">0</span>
                                                             {{ \App\Helpers\TranslationHelper::translate('Adult') }}</span>
                                                        -
                                                        <span class="children" data-text="Child"
                                                            data-text-multi="Children">
                                                            <span id="room_children">0</span>
                                                            {{ \App\Helpers\TranslationHelper::translate('Child') }}</span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-wrap"
                                                        style="min-width: 1100px">
                                                        <div class="dropdown-item parent_item" id="parent_item">
                                                            <div class="row">
                                                                <div class="col-lg-2 col-3 p-2"></div>
                                                                <div class="col-lg-2 col-3 p-2 text-center">
                                                                    <span
                                                                        class="black_color fw-bold">{{ \App\Helpers\TranslationHelper::translate('Adult') }}</span>
                                                                    <br>
                                                                    <span class="gray_color fw-bold fs-10">
                                                                        (12
                                                                        {{ \App\Helpers\TranslationHelper::translate('Years') }})
                                                                    </span>
                                                                </div>
                                                                <div class="col-lg-2 col-3 p-2 text-center">
                                                                    <span
                                                                        class="black_color fw-bold">{{ \App\Helpers\TranslationHelper::translate('Child') }}</span>
                                                                    <br>
                                                                    <span class="gray_color fw-bold fs-10">
                                                                        (2 -11
                                                                        {{ \App\Helpers\TranslationHelper::translate('years') }})
                                                                    </span>
                                                                </div>
                                                                <div class="col-lg-6 col-3 p-2 text-end"></div>
                                                            </div>
                                                            <div class="row room_item">
                                                                <div class="col-lg-2 col-3 p-2 black_color fw-bold">
                                                                    <img src="{{ asset('front/assets/img/bedroom.png') }}"
                                                                        alt="bedroom" style="width: 30px;">
                                                                    <span>{{ \App\Helpers\TranslationHelper::translate('Room') }}</span>&nbsp;
                                                                    <span class="room_number">1</span>
                                                                </div>
                                                                <div class="col-lg-2 col-3 p-2 text-center">
                                                                    <div class="qtyBtn align-items-center">
                                                                        <div class="qtyDec">
                                                                            <i class="fas fa-minus"></i>
                                                                        </div>
                                                                        <input type="text" name="adult_number[]"
                                                                            value="0" class="qty-input"
                                                                            onchange="updateRoomPersons()">
                                                                        <div class="qtyInc">
                                                                            <i class="fas fa-plus"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-3 p-2 text-center">
                                                                    <div class="qtyBtn align-items-center">
                                                                        <div class="qtyDec">
                                                                            <i class="fas fa-minus"></i>
                                                                        </div>
                                                                        <input type="text" name="child_number[]"
                                                                            value="0" class="qty-input"
                                                                            onchange="updateRoomPersons()" />
                                                                        <div class="qtyInc">
                                                                            <i class="fas fa-plus"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-3 p-2 text-end">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row p-2">
                                                            <div class="col-lg-12 col-12">
                                                                <button type="button" class="tr-btn-green mb-lg-0 mb-3"
                                                                    onclick="addHotelRoom()">
                                                                    <i class="fas fa-plus"></i>
                                                                    {{ \App\Helpers\TranslationHelper::translate('Add Room') }}
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- end dropdown -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-lg-3 -->
                                    <div class="col-lg-12">
                                        <div class="btn-box">
                                            <button type="submit" class="tr-btn-green mb-lg-0 mb-3"
                                                id="hotel_search_btn">{{ \App\Helpers\TranslationHelper::translate('Search Now') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>






                        <!-- end tab-pane -->
                        {{-- <div class="tab-pane fade" id="tour" role="tabpanel" aria-labelledby="tour-tab">
                            <div class="contact-form-action">
                                <form action="{{route('site.tours')}}" class="row align-items-center">
                                    <div class="col-lg-4 pe-0">
                                        <div class="input-box">
                                            <label
                                                class="label-text">{{ \App\Helpers\TranslationHelper::translate('Where would like to go?') }}</label>
                                            <div class="form-group">
                                                <span class="fas fa-map-marker form-icon"></span>
                                                <input class="form-control" type="text"
                                                    placeholder="Destination, city, or region" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-lg-4 -->
                                    <div class="col-lg-4 pe-0">
                                        <div class="input-box">
                                            <label
                                                class="label-text">{{ \App\Helpers\TranslationHelper::translate('From') }}</label>
                                            <div class="form-group">
                                                <span class="fas fa-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text"
                                                    name="daterange-single" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-lg-4 -->
                                    <div class="col-lg-4">
                                        <div class="input-box">
                                            <label class="label-text">
                                                {{ \App\Helpers\TranslationHelper::translate('To') }}</label>
                                            <div class="form-group">
                                                <span class="fas fa-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text"
                                                    name="daterange-single" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-lg-4 -->
                                </form>
                            </div>
                            <div class="btn-box pt-3">
                                <a href="#"
                                    class="tr-btn-green mb-lg-0 mb-3">{{ \App\Helpers\TranslationHelper::translate('Search Now') }}</a>
                            </div>
                        </div> --}}



                                            <!-- Where would you like to go? -->

        {{-- <div class="col-lg-4 pe-0">
            <div class="input-box">
                <label class="label-text">{{ \App\Helpers\TranslationHelper::translate('Where would you like to go?') }}</label>
                <div class="form-group">
                    <span class="fas fa-map-marker form-icon"></span>
                    <input id="city-input" class="form-control" type="text" name="city" placeholder="{{ \App\Helpers\TranslationHelper::translate('Destination, city, or region?') }}" value="{{ request()->city }}" autocomplete="off" />
                    <div id="city-suggestions" class="list-group" style="display:none;"></div>
                </div>
            </div>
        </div> --}}



                                   {{-- star tours search --}}

   <div class="tab-pane fade show active" id="tour" role="tabpanel" aria-labelledby="tour-tab">
    <div class="contact-form-action">
        <form id="tour-search-form" action="{{ route('site.tours') }}" method="GET" class="row align-items-center">



<div class="col-lg-4 pe-0">
    <div class="input-box">
        <label class="label-text">{{ \App\Helpers\TranslationHelper::translate('Where would you like to go?') }}</label>
        <div class="form-group position-relative">
            <span class="fas fa-map-marker form-icon"></span>
            <!-- حقل الإدخال -->
            <input id="city-input" class="form-control" type="text" value="{{ old('city', request('city') ? $cities->find(request('city'))->name : '') }}"
                   placeholder="{{ \App\Helpers\TranslationHelper::translate('Choose a city') }}"
                   autocomplete="off" onfocus="showDropdown()" onkeyup="filterCities()" />
            <!-- حقل مخفي لإرسال الـ ID -->
            {{-- <input type="hidden" id="city-id" name="city" value=""> --}}
            <input type="hidden" id="city-id" name="city" value="{{ old('city', request('city') ? request('city') : '') }}">

            <!-- قائمة المدن -->
            <div id="city-dropdown" class="list-group position-absolute w-100" style="display:none; z-index: 1000;">
                @foreach($cities as $city)
                    <button type="button" class="list-group-item list-group-item-action"
                            data-id="{{ $city->id }}"
                            data-name="{{ $city->name }}"
                            onclick="updateCityInput(this)">
                        {{ $city->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>





            <!-- From Date -->
            <div class="col-lg-4 pe-0">
                <div class="input-box">
                    <label class="label-text">{{ \App\Helpers\TranslationHelper::translate('From') }}</label>
                    <div class="form-group">
                        <span class="fas fa-calendar form-icon"></span>
                        <input class="date-range form-control" type="date" name="from_date" value="{{ request()->from_date }}" />
                    </div>
                </div>
            </div>

            <!-- To Date -->
            <div class="col-lg-4">
                <div class="input-box">
                    <label class="label-text">{{ \App\Helpers\TranslationHelper::translate('To') }}</label>
                    <div class="form-group">
                        <span class="fas fa-calendar form-icon"></span>
                        <input class="date-range form-control" type="date" name="to_date" value="{{ request()->to_date }}" />
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center">
                <button type="submit" class="tr-btn-green mb-lg-0 mb-3">{{ \App\Helpers\TranslationHelper::translate('Search Now') }}</button>
            </div>
        </form>
    </div>
</div>


                        <!-- end tab-pane -->


                    </div>
                </div>
            </div>
        </div>
    </div>

    </ul>
    <!-- hero-area-end -->
    <style>
        @media (max-width: 767px) {
            .trip-one {
                margin-top:150px !important;
            }
        }
    </style>
    <!-- trip-area-start -->
    <div class="tr-trip-area pt-110 pb-50">
        <div class="container">
            <div class="tr-trip-title-wrap trip-one mb-60">
                <div class="row align-items-end">
                    <div class="col-xl-8 col-lg-6 col-md-6">
                        {{-- <div class="tr-trip-title-box">
                            @php
                                $informationType = request('service') ?? setting('information_type');
                            @endphp
                             @if (setting('information_type') == 'information_flight' && isset($informationflight))
                                <h3 class="tr-section-title mb-20">{{ setting('Find_Popular_Flights_title', app()->getLocale()) }}</h3>
                             @endif

                            @if (setting('information_type') == 'information_hotel' && isset($informationhotel))
                                <h3 class="tr-section-title mb-20">{{ setting('Find_Popular_Hotels_title', app()->getLocale()) }}</h3>
                            @endif

                            @if (setting('information_type') == 'information_tour' && isset($informationtour))
                                <h3 class="tr-section-title mb-20">{{ setting('Find_Popular_Tours_title', app()->getLocale()) }}</h3>
                            @endif

                            <p>
                                {!! setting('Whether_you’re_description', app()->getLocale()) !!}
                            </p>
                        </div> --}}

                        <div class="tr-trip-title-box">
                            @php
                                $informationType = request('service') ?? setting('information_type');
                            @endphp
                            @if (request('service'))
                                <h3 class="tr-section-title mb-20">
                                    @if (request('service') == 'flight')
                                        {{ setting('Find_Popular_Flights_title', app()->getLocale()) }}
                                    @elseif(request('service') == 'hotel')
                                        {{ setting('Find_Popular_Hotels_title', app()->getLocale()) }}
                                    @elseif(request('service') == 'tour')
                                        {{ setting('Find_Popular_Tours_title', app()->getLocale()) }}
                                    @else
                                        {{ setting('Find_Popular_Flights_title', app()->getLocale()) }}
                                    @endif
                                </h3>
                            @else
                                @if (setting('information_type') == 'information_flight' && isset($informationflight))
                                    <h3 class="tr-section-title mb-20">
                                        {{ setting('Find_Popular_Flights_title', app()->getLocale()) }}</h3>
                                @endif
                                @if (setting('information_type') == 'information_hotel' && isset($informationhotel))
                                    <h3 class="tr-section-title mb-20">
                                        {{ setting('Find_Popular_Hotels_title', app()->getLocale()) }}</h3>
                                @endif
                                @if (setting('information_type') == 'information_tour' && isset($informationtour))
                                    <h3 class="tr-section-title mb-20">
                                        {{ setting('Find_Popular_Tours_title', app()->getLocale()) }}</h3>
                                @endif
                            @endif
                            <p>
                                {!! setting('Whether_you’re_description', app()->getLocale()) !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="tr-trip-btn text-md-end custom_left_btn">
                            <a class="tr-btn"
                                href="trip.html">{{ \App\Helpers\TranslationHelper::translate('View More') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="swiper-container p-3 tr-hotels-active">

                    <div class="swiper-wrapper">


                        @php
                            $informationType = setting('information_type');
                        @endphp
                        @if ($informationType == 'information_flight' && isset($informationflight))
                            @foreach ($informationflight as $flight)
                          <div class="swiper-slide-star">
    <a href="{{ optional($flight)->linke }}" class="tr-trip-location" target="_blank"
       style="display: block; height: 100%; text-decoration: none;">
        <div class="tr-trip-item mb-30 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="tr-trip-thumb fix"
                style="height: 400px; background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url({{ $flight->getFirstMediaUrl('information_flights') }});">
            </div>
            <div class="tr-trip-content">
                <h5 class="tr-trip-title">
                    <span class="border-line-black">
                        {{ optional($flight)->name ?? '' }}
                    </span>
                </h5>
            </div>
            <div class="overlay"></div>
        </div>
    </a>
</div>

                            @endforeach
                        @elseif ($informationType == 'information_hotel' && isset($informationhotel))
                            @foreach ($informationhotel as $hotel)
                             <div class="swiper-slide">
    <a href="{{ optional($hotel)->linke }}" class="tr-trip-location" target="_blank"
       style="display: block; height: 100%; text-decoration: none;">
        <div class="tr-trip-item mb-30 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="tr-trip-thumb fix"
                style="height: 400px; background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url({{ $hotel->getFirstMediaUrl('information_hotels') }});">
            </div>
            <div class="tr-trip-content">
                <h5 class="tr-trip-title">
                    <span class="border-line-black">
                        {{ optional($hotel)->name ?? '' }}
                    </span>
                </h5>
            </div>
            <div class="overlay"></div>
        </div>
    </a>
</div>

                            @endforeach
                        @elseif ($informationType == 'information_tour' && isset($informationtour))
                            @foreach ($informationtour as $tour)
                            <div class="swiper-slide">
    <a href="{{ optional($tour)->linke }}" class="tr-trip-location" target="_blank"
       style="display: block; height: 100%; text-decoration: none;">
        <div class="tr-trip-item mb-30 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="tr-trip-thumb fix"
                style="height: 400px; background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url({{ $tour->getFirstMediaUrl('information_tours') }});">
            </div>
            <div class="tr-trip-content">
                <h5 class="tr-trip-title">
                    <span class="border-line-black">
                        {{ optional($tour)->name ?? '' }}
                    </span>
                </h5>
            </div>
            <div class="overlay"></div>
        </div>
    </a>
</div>

                            @endforeach
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>


 <div class="container mt-5">
    <div class="row">



        <!-- الشريط الجانبي -->
        <div class="col-lg-3">
            <div class="left-sidebar">
                <form action="{{ route('site.tours') }}" method="GET">
                    <!-- العنوان -->
                    <h5>{{ \App\Helpers\TranslationHelper::translate('Filter') }}</h5>

                    <!-- إدخالات مخفية للاحتفاظ بالقيم -->
                    <input type="hidden" name="adult_search_count" value="{{ request()->adult_search_count ?? 0 }}">
                    <input type="hidden" name="children_search_count" value="{{ request()->children_search_count ?? 0 }}">
                    <input type="hidden" name="infant_search_count" value="{{ request()->infant_search_count ?? 0 }}">
                    <input type="hidden" name="prog_check_in" value="{{ request()->prog_check_in ?? '' }}">

                    <!-- زر إعادة التعيين والفلترة -->
                    <div class="filter-block custom_filter_box">
                        <div class="row">
                            <div class="col-lg-6 col-12 m-0 p-0">
                                <a href="{{ route('site.tours') }}" class="btn btn-warning custom_secondary_btn">
                                    {{ \App\Helpers\TranslationHelper::translate('Reset') }}
                                </a>
                            </div>
                            <div class="col-lg-6 col-12 m-0 p-0">
                                <button type="submit" class="btn custom_primary_btn">
                                    {{ \App\Helpers\TranslationHelper::translate('Filter') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- تصفية حسب النوع -->
                  <div class="filter-section">
    <!-- تصفية حسب النوع -->
                <div class="filter-block">
                    <h6 class="filter-title">{{ \App\Helpers\TranslationHelper::translate('Tour Type') }}</h6>
                    @if(isset($types) && $types->count() > 0)
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="tour_type_id" value=""
                                    {{ request()->has('tour_type_id') && request()->tour_type_id == '' ? 'checked' : '' }}>
                                <span class="custom-radio"></span>
                                {{ \App\Helpers\TranslationHelper::translate('All') }}
                            </label>
                            @foreach($types as $type)
                                <label class="radio-label">
                                    <input type="radio" name="tour_type_id" value="{{ $type->id }}"
                                        {{ request()->tour_type_id == $type->id ? 'checked' : '' }}>
                                    <span class="custom-radio"></span>
                                    {{ $type->name }}
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>

    <!-- تصفية حسب الموقع -->
    <div class="filter-block">
        <h6 class="filter-title">{{ \App\Helpers\TranslationHelper::translate('Location') }}</h6>
        @if(isset($countries) && $countries->count() > 0)
            <div class="checkbox-group">
                @foreach($countries as $country)
                    <label class="checkbox-label">
                        <input type="checkbox" name="countries[]" value="{{ $country->id }}"
                            {{ in_array($country->id, request()->countries ?? []) ? 'checked' : '' }}>
                        <span class="custom-checkbox"></span>
                        {{ $country->name }}
                    </label>
                @endforeach
            </div>
        @endif
    </div>

{{-- <div class="filter-block">
    <h6 class="filter-title">{{ \App\Helpers\TranslationHelper::translate('Duration') }}</h6>
    <div class="duration-container">
        <label for="duration" id="duration-label">{{ request()->duration ? request()->duration . ' Days' : '0 Days' }}</label>
        <input type="range" name="duration" id="duration" min="0" max="50" value="{{ request()->duration ?? 0 }}"
               class="custom-range" oninput="updateDurationLabel(this.value)">
    </div>
</div> --}}

<div class="filter-block">
    <h6 class="filter-title">{{ \App\Helpers\TranslationHelper::translate('Duration') }}</h6>
    <div class="duration-container">
        <label for="duration" id="duration-label">
            {{ request()->duration ? request()->duration . ' ' . (app()->getLocale() === 'ar' ? 'يوم' : 'Days') : '0 ' . (app()->getLocale() === 'ar' ? 'يوم' : 'Days') }}
        </label>
        <input type="range" name="duration" id="duration" min="0" max="50" value="{{ request()->duration ?? 0 }}"
               class="custom-range" oninput="updateDurationLabel(this.value)">
    </div>
</div>



<div class="filter-block">
    <h6 class="filter-title">{{ \App\Helpers\TranslationHelper::translate('pric') }}</h6>
    <div class="duration-container">
        <label for="price" id="price-label">
            {{ request()->price ? request()->price . ' ' . (app()->getLocale() === 'ar' ? 'ريال' : 'SAR') : '0 ' . (app()->getLocale() === 'ar' ? 'ريال' : 'SAR') }}
        </label>
        <input type="range" name="price" id="price" min="0" max="5000" value="{{ request()->price ?? 0 }}"
               class="custom-range" oninput="updatePriceLabel(this.value)">
    </div>
</div>

</div>
                </form>
            </div>
        </div>








        <div class="col-lg-9">
    <div class="row">
        @if ($programmes->count() > 0)
            @foreach ($programmes as $programme)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 card-tiru">
                        <div class="card-body card-tour-img">
                            <!-- الشارة (Badge) -->
                            @if ($programme->isNew)
                                <span class="badge-new">{{ \App\Helpers\TranslationHelper::translate('New') }}</span>
                            @endif
                            <!-- أيقونة القلب -->
                            <div class="top-icon">
                                @if(auth('web')->check())
                                    <span class="favorite-icon"
                                          data-bs-toggle="tooltip"
                                          title="{{ checkProgrammeWish($programme->id) == 0 ? 'Add to Wishlist' : 'Remove from Wishlist' }}"
                                          onclick="favouriteChange(this)"
                                          data-url="{{ route('user.programme.favourite.change', ['id' => $programme->id]) }}">
                                        <i class="fa{{ checkProgrammeWish($programme->id) == 0 ? 'r' : 's' }} fa-heart"></i>
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

                            <!-- صورة البرنامج -->
                            <a href="{{ route('trip_details', $programme->id) }}">
                                <img src="{{ $programme->getFirstMediaUrl('programmes_banners') }}"
                                     alt="Programme Image"
                                     style="width: 100%; height: 200px; object-fit: cover; background-color: #f8f8f8; border-bottom: 1px solid #ddd; padding: 5px;">
                            </a>
                        </div>
                        <div class="special-content">
                            <a href="{{ route('trip_details', $programme->id) }}">
                                <h5 style="display: block;">{{ $programme->city->name }}</h5>
                                <span style="display: block;">
                                    <i class="fas fa-map-marker-alt"></i> {{ $programme->name }}
                                </span>
                            </a>
                            <p>{!! Str::words(strip_tags($programme->description), 15) !!}</p>
                            <div class="bottom-section">
                                <div class="price_fac">
                                    <div class="price">
                                        @php
                                            $currency = app()->getLocale() === 'ar' ? 'ريال' : 'SAR';
                                        @endphp
                                        @if ($programme->discount > 0)
                                            <!-- السعر قبل الخصم -->
                                            <div style="font-size: 18px; color: #2c2a28; display: inline-flex; align-items: center; text-decoration: line-through; margin-bottom: 5px;">
                                                {{ $programme->price }} <span style="margin-left: 5px;">{{ $currency }}</span>
                                            </div>
                                            <!-- السعر بعد الخصم -->
                                            <div style="font-weight: bold; font-size: 20px; color: #e98f33; display: inline-flex; align-items: center;">
                                                {{ getProgrammePriceIfDiscount($programme) }} <span style="margin-left: 5px;">{{ $currency }}</span>
                                            </div>
                                        @else
                                            <!-- السعر بدون خصم -->
                                            <div style="font-weight: bold; font-size: 20px; color: #e98f33; display: inline-flex; align-items: center;">
                                                {{ $programme->price }} <span style="margin-left: 5px;">{{ $currency }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="tr-price-btn">
                {{ $programmes->links() }}
            </div>
        @else
            <p>{{ \App\Helpers\TranslationHelper::translate('No programmes found') }}</p>
        @endif
    </div>
</div>

    </div>
</div>



    {{-- @endif --}}




























    <div class="tr-subscribe-area z-index-2">
        <div class="container">
            <div class="tr-subscribe-bg p-relative fix">
                <div class="tr-subscribe-img d-none d-lg-block">
                    <img src="{{ setting('Subscribe_image', 'en') }}" alt="" />
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
                                    <input type="text"
                                        placeholder="{{ \App\Helpers\TranslationHelper::translate('Your email...') }}" />
                                    <button class="tr-subscribe-button tr-btn-green light-green" type="submit">
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
    {{--    <!-- subdcribe-area-end --> --}}
@endsection


@push('js')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>













{{-- <script>
    function filterCities() {
    var input = document.getElementById('city-input').value.toLowerCase();
    var dropdown = document.getElementById('city-dropdown');
    var items = dropdown.getElementsByTagName('button');

    if (input.length > 0) {
        dropdown.style.display = 'block'; // إظهار القائمة
        for (var i = 0; i < items.length; i++) {
            var item = items[i];
            var cityName = item.getAttribute('data-name').toLowerCase();
            if (cityName.indexOf(input) !== -1) {
                item.style.display = 'block'; // إظهار الخيارات المطابقة
            } else {
                item.style.display = 'none'; // إخفاء الخيارات غير المطابقة
            }
        }
    } else {
        dropdown.style.display = 'none'; // إخفاء القائمة إذا كان النص فارغًا
    }
}

function updateCityInput(selectedItem) {
    var input = document.getElementById('city-input');
    var hiddenInput = document.getElementById('city-id');

    // تحديث حقل الإدخال باسم المدينة
    input.value = selectedItem.getAttribute('data-name');

    // تحديث الحقل المخفي بـ ID المدينة
    hiddenInput.value = selectedItem.getAttribute('data-id');

    // إخفاء القائمة
    document.getElementById('city-dropdown').style.display = 'none';
}

// إخفاء القائمة إذا خرج المستخدم عن النطاق
document.addEventListener('click', function (e) {
    var dropdown = document.getElementById('city-dropdown');
    var input = document.getElementById('city-input');

    if (!dropdown.contains(e.target) && e.target !== input) {
        dropdown.style.display = 'none';
    }
});

</script> --}}

<script>
function showDropdown() {
    var dropdown = document.getElementById('city-dropdown');
    dropdown.style.display = 'block'; // إظهار القائمة عند التركيز على الحقل
}

function filterCities() {
    var input = document.getElementById('city-input').value.toLowerCase();
    var dropdown = document.getElementById('city-dropdown');
    var items = dropdown.getElementsByTagName('button');

    if (input.length > 0) {
        for (var i = 0; i < items.length; i++) {
            var item = items[i];
            var cityName = item.getAttribute('data-name').toLowerCase();
            if (cityName.indexOf(input) !== -1) {
                item.style.display = 'block'; // إظهار الخيارات المطابقة
            } else {
                item.style.display = 'none'; // إخفاء الخيارات غير المطابقة
            }
        }
    } else {
        // إذا كان الإدخال فارغًا، أظهر جميع الخيارات
        for (var i = 0; i < items.length; i++) {
            items[i].style.display = 'block';
        }
    }
}

function updateCityInput(selectedItem) {
    var input = document.getElementById('city-input');
    var hiddenInput = document.getElementById('city-id');

    // تحديث حقل الإدخال باسم المدينة
    input.value = selectedItem.getAttribute('data-name');

    // تحديث الحقل المخفي بـ ID المدينة
    hiddenInput.value = selectedItem.getAttribute('data-id');

    // إخفاء القائمة
    document.getElementById('city-dropdown').style.display = 'none';
}

// إخفاء القائمة إذا خرج المستخدم عن النطاق
document.addEventListener('click', function (e) {
    var dropdown = document.getElementById('city-dropdown');
    var input = document.getElementById('city-input');

    if (!dropdown.contains(e.target) && e.target !== input) {
        dropdown.style.display = 'none';
    }
});

</script>

<script>
    // النصوص الديناميكية بناءً على اللغة
    const durationLabel = "{{ app()->getLocale() === 'ar' ? 'يوم' : 'Days' }}";
    const priceLabel = "{{ app()->getLocale() === 'ar' ? 'ريال' : 'SAR' }}";

    // تحديث النص الخاص بالمدة عند تحريك شريط التمرير
    function updateDurationLabel(value) {
        document.getElementById('duration-label').textContent = value + ' ' + durationLabel;
    }

    // تحديث النص الخاص بالسعر عند تحريك شريط التمرير
    function updatePriceLabel(value) {
        document.getElementById('price-label').textContent = value + ' ' + priceLabel;
    }

    // تأكد من تحديث النص أثناء تحميل الصفحة بناءً على القيمة الافتراضية
    document.addEventListener('DOMContentLoaded', function () {
        updateDurationLabel(document.getElementById('duration').value);
        updatePriceLabel(document.getElementById('price').value);
    });
</script>


<script>
$(document).ready(function () {
    // عند الضغط على زر البحث
    $('#search-btn').on('click', function (e) {
        e.preventDefault(); // منع إعادة تحميل الصفحة

        // جمع البيانات من النموذج
        var formData = $('#tour-search-form').serialize();

        // إرسال البيانات إلى الخادم باستخدام AJAX
        $.ajax({
            url: "{{ route('site.tours') }}", // URL الهدف
            method: 'GET', // طريقة الإرسال
            data: formData, // البيانات المرسلة
            success: function (response) {
                // تحديث المحتوى بالنتائج الجديدة دون إعادة تحميل الصفحة
                $('#tour-results').html(response);  // هنا يتم تحديث المنطقة التي تحتوي على النتائج
            },
            error: function (error) {
                console.log('حدث خطأ:', error);
            }
        });
    });
});
</script>





    <script>
        function validateInfantsNumber(infants_number) {
            let infants_number_input = $(infants_number);
            let infants_number_val = infants_number_input.val();
            let dropdown_menu = infants_number_input.closest('.dropdown-menu');
            let adult_number_input = dropdown_menu.find('input[name="adult_number"]');
            let adult_number_val = adult_number_input.val();

            if (infants_number_val > adult_number_val) {
                toastr.error(
                    '{{ \App\Helpers\TranslationHelper::translate('Infants Must Have Adults to Hold .. Please Add Adults First') }}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                let new_val = infants_number_input.val() - 1;
                infants_number_input.val(new_val);
            }
        }

        function validateTotalPassengers(passenger_inp) {
            let passenger_input = $(passenger_inp);
            let dropdown_menu = passenger_input.closest('.dropdown-menu');
            let all_passenger_inputs = dropdown_menu.find('.passenger_input');

            let total = 0;

            all_passenger_inputs.each(function() {

                total += parseInt($(this).val()) || 0;
            });

            if (total > 9) {
                let new_val = passenger_input.val() - 1;
                passenger_input.val(new_val);

                toastr.error('{{ \App\Helpers\TranslationHelper::translate('Max Passengers Count is') }}' + ' : 9 ' +
                    '{{ \App\Helpers\TranslationHelper::translate('Passengers') }}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
            }
        }

        function changeFlightType() {
            let myTab3 = $("#myTab3");
            let current_active_btn = myTab3.find('.nav-link.active');
            let myTabContent3 = $("#myTabContent3");
            let current_active_tab = $("#" + current_active_btn.attr('tab_id'));

            myTabContent3.find("select, input").prop("disabled", true);
            current_active_tab.find("select, input").prop("disabled", false);

        }

        changeFlightType();

        let lang = "{{ app()->getLocale() }}";

        function searchAirMasters(input) {
            let current_input = $(input);
            let air_masters_result = current_input.parent().parent().find('#air_masters_result');
            let air_masters_result_ajax = current_input.parent().parent().find('#air_masters_result_ajax');

            if (current_input.val().length >= 3) {

                $.ajax({
                    url: "{{ route('searchAirports') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        keyword: current_input.val()
                    },
                    type: 'POST',

                    success: function(response) {
                        if (typeof(response) != 'object') {
                            response = $.parseJSON(response)
                        }
                        let msg = response.msg;
                        let status = response.status;
                        console.log(response);
                        if (status === 1) {
                            air_masters_result.hide();
                            air_masters_result_ajax.find('.ajax_air_item').remove();
                            let ajax_airports = '';
                            $.each(response.data, function(index, item) {
                                ajax_airports +=
                                    '<div class="row mx-0 align-items-start ajax_air_item air_item"\n' +
                                    '                                                                             onclick="updateInputs(this)"\n' +
                                    '                                                                             data-id="' +
                                    item.air_id + '"\n' +
                                    '                                                                             data-name="' +
                                    item.name[lang] + '"\n' +
                                    '                                                                             data-code="' +
                                    item.air_code + '"\n' +
                                    '                                                                             data-city="' +
                                    item.city_name[lang] + '"\n' +
                                    '                                                                             data-country="' +
                                    item.country_name[lang] + '"\n' +
                                    '                                                                        >\n' +
                                    '                                                                            <div class="col-lg-1">\n' +
                                    '                                                                                <i class="fas fa-plane me-1"\n' +
                                    '                                                                                   style="font-size: 22px"></i>\n' +
                                    '                                                                            </div>\n' +
                                    '                                                                            <div class="col-lg-9">\n' +
                                    '                                                                                <div class="city_country">\n' +
                                    '                                                                    <span class="fs-5">\n' +
                                    '                                                                        ' +
                                    item.city_name[lang] + ', ' + item.country_name[lang] + '\n' +
                                    '                                                                    </span>\n' +
                                    '                                                                                </div>\n' +
                                    '                                                                                <div class="air_name">\n' +
                                    '                                                                    <span class="fs-6">\n' +
                                    '                                                                        ' +
                                    item.name[lang] + '\n' +
                                    '                                                                    </span>\n' +
                                    '                                                                                </div>\n' +
                                    '                                                                            </div>\n' +
                                    '                                                                            <div class="col-lg-2">\n' +
                                    '                                                                                <div class="city_code text-end">\n' +
                                    '                                                                                    (' +
                                    item.air_code + ')\n' +
                                    '                                                                                </div>\n' +
                                    '                                                                            </div>\n' +
                                    '                                                                        </div>';
                            });
                            air_masters_result_ajax.append(ajax_airports);
                            air_masters_result_ajax.show();
                        }
                    }

                });

            }

        }

        function showResultBox(input) {
            let current_input = $(input);
            let air_masters_result = current_input.parent().parent().find('#air_masters_result');
            air_masters_result.show();
        }

        function hideResultBox(input) {
            setTimeout(function() {
                let current_input = $(input);
                let air_masters_result = current_input.parent().parent().find('#air_masters_result');
                let air_masters_result_ajax = current_input.parent().parent().find('#air_masters_result_ajax');
                air_masters_result.hide();
                air_masters_result_ajax.hide();
            }, 200);

        }


        function searchDestination(input) {
            let current_input = $(input);
            let destination_result_ajax = current_input.parent().parent().find('#destination_result_ajax');
            let destination_result = current_input.parent().parent().find('#destination_result');

            if (current_input.val().length >= 3) {

                $.ajax({
                    url: "{{ route('searchHotelCities') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        keyword: current_input.val()
                    },
                    type: 'POST',

                    success: function(response) {
                        if (typeof(response) != 'object') {
                            response = $.parseJSON(response)
                        }
                        let msg = response.msg;
                        let status = response.status;
                        console.log(response);
                        if (status === 1) {
                            destination_result.hide();
                            destination_result_ajax.find('.ajax_hotel_city').remove();
                            let hotel_cities = '';
                            $.each(response.data, function(index, item) {
                                hotel_cities +=
                                    '<div class="row mx-0 align-items-start ajax_hotel_city air_item"\n' +
                                    '                                                                 onclick="updateInputsDestination(this)"\n' +
                                    '                                                                 data-city_Id="' +
                                    item.id + '"\n' +
                                    '                                                                 data-cityCode="' +
                                    item.code + '"\n' +
                                    '                                                                 data-cityName="' +
                                    item.name + '"\n' +
                                    '                                                                 data-displayName="' +
                                    item.display_name + '"\n' +
                                    '                                                                 data-country="' +
                                    item.country_name + '"\n' +
                                    '                                                                 data-countryCode="' +
                                    item.country_code + '"\n' +
                                    '                                                            >\n' +
                                    '                                                                <div class="col-lg-1">\n' +
                                    '                                                                    <i class="fas fa-map-marker  me-1"\n' +
                                    '                                                                       style="font-size: 15px"></i>\n' +
                                    '                                                                </div>\n' +
                                    '                                                                <div class="col-lg-10">\n' +
                                    '                                                                    <span class="fs-10">\n' +
                                    '                                                                        ' +
                                    item.display_name + '\n' +
                                    '                                                                    </span>\n' +
                                    '                                                                </div>\n' +
                                    '                                                            </div>';
                            });
                            destination_result_ajax.append(hotel_cities);
                            destination_result_ajax.show();
                        }
                    }

                });

            }

        }

        function showResultBoxDestination(input) {
            let current_input = $(input);
            let destination_result = current_input.parent().parent().find('#destination_result');
            destination_result.show();
        }

        function hideResultBoxDestination(input) {
            setTimeout(function() {
                let current_input = $(input);
                let destination_result = current_input.parent().parent().find('#destination_result');
                let destination_result_ajax = current_input.parent().parent().find('#destination_result_ajax');
                destination_result.hide();
                destination_result_ajax.hide();
            }, 200);

        }

        function showResultBoxNationality(input) {
            let current_input = $(input);
            let nationality_result = current_input.parent().parent().find('#nationality_result');
            nationality_result.show();
        }

        function hideResultBoxNationality(input) {
            setTimeout(function() {
                let current_input = $(input);
                let nationality_result = current_input.parent().parent().find('#nationality_result');
                nationality_result.hide();
            }, 200);

        }

        function updateInputs(air_master) {
            let current_air_master = $(air_master);
            let air_master_id = current_air_master.parent().parent().find('.air_master_id');
            let input_city = current_air_master.parent().parent().find('.input_city');

            let id = current_air_master.attr('data-id');
            // let name = current_air_master.attr('data-name');
            let code = current_air_master.attr('data-code');
            let city = current_air_master.attr('data-city');
            let country = current_air_master.attr('data-country');
            let input_val = code + ' - ' + city + ', ' + country;
            input_city.val(input_val);
            air_master_id.val(id);
        }

        function updateInputsDestination(destination) {
            let current_destination = $(destination);
            let destination_id = current_destination.parent().parent().find('.destination_id');
            let input_destination = current_destination.parent().parent().find('.input_destination');

            let city_Id = current_destination.attr('data-city_Id');
            let cityCode = current_destination.attr('data-cityCode');
            let cityName = current_destination.attr('data-cityName');
            let displayName = current_destination.attr('data-displayName');
            let country = current_destination.attr('data-country');
            let countryCode = current_destination.attr('data-countryCode');


            let input_val = displayName;
            input_destination.val(input_val);
            destination_id.val(cityCode);
        }

        function updateInputsNationality(nationality) {
            let current_nationality = $(nationality);
            let nationality_id = current_nationality.parent().parent().find('.nationality_id');
            let input_nationality = current_nationality.parent().parent().find('.input_nationality');

            let key = current_nationality.attr('data-key');
            let name = current_nationality.attr('data-name');

            input_nationality.val(name);
            nationality_id.val(key);
        }

        $(document).ready(function() {
            let flight_submit = $("#flight_submit");
            flight_submit.on('click', function(e) {
                e.preventDefault();
                var formData = new FormData(document.getElementById('search_flight_form_one_way'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '{{ route('flight.search') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data.errors);
                        // return false;
                        $('#search_flight_form_one_way').submit();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, error) {
                                console.log("Validation Error: " + error[0]);
                                toastr.error(error[0], {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            });
                        } else {
                            toastr.error('{{ \App\Helpers\TranslationHelper::translate('An error occurred. Please try again later.') }}', {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }

                    }
                });
            });


            let flight_submit_round = $("#flight_submit_round");
            flight_submit_round.on('click', function(e) {
                e.preventDefault();
                var formData = new FormData(document.getElementById('search_flight_form_round'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '{{ route('flight.search') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data.errors);
                        // return false;
                        $('#search_flight_form_round').submit();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, error) {
                                console.log("Validation Error: " + error[0]);
                                toastr.error(error[0], {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            });
                        } else {
                            toastr.error('{{ \App\Helpers\TranslationHelper::translate('An error occurred. Please try again later.') }}', {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }

                    }
                });
            });

            let hotel_search_btn = $("#hotel_search_btn");
            hotel_search_btn.on('click', function(e) {
                e.preventDefault();
                var formData = new FormData(document.getElementById('hotel_search'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '{{ route('hotel.search') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data.errors);
                        // return false;
                        $('#hotel_search').submit();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, error) {
                                console.log("Validation Error: " + error[0]);
                                toastr.error(error[0], {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            });
                        } else {
                            toastr.error('{{ \App\Helpers\TranslationHelper::translate('An error occurred. Please try again later.') }}', {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }

                    }
                });
            });

            let flight_submit_multi = $("#flight_submit_multi");
            flight_submit_multi.on('click', function(e) {
                e.preventDefault();
                var formData = new FormData(document.getElementById('search_flight_form_multi'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '{{ route('flight.multi.search') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data.errors);
                        // return false;
                        $('#search_flight_form_multi').submit();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, error) {
                                console.log("Validation Error: " + error[0]);
                                toastr.error(error[0], {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            });
                        } else {
                            toastr.error('{{ \App\Helpers\TranslationHelper::translate('An error occurred. Please try again later.') }}', {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }

                    }
                });
            });
        });
    </script>

    <script>
    function favouriteChange(btn) {
        var href = $(btn).attr('data-url');
        var icon = $(btn).find('i');
        let parent_div = $(btn).parent().parent().parent().parent();

        $.ajax({
            type: 'POST',
            url: href,
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (data) {
                if (data.status === 1) {
                    if (data.new_status === 1) { // تمت الإضافة إلى المفضلة
                        icon.removeClass('far');
                        icon.addClass('fas');
                        Swal.fire({
                            icon: 'success',
                            text: data.msg,
                            confirmButtonColor: '#bf325c',
                            confirmButtonText: 'Thanks!',
                            showCloseButton: true,
                        });
                    } else { // تمت الإزالة من المفضلة
                        icon.removeClass('fas');
                        icon.addClass('far');

                        // إذا كان هذا العنصر داخل قائمة، قم بإزالته
                        if (parent_div.hasClass('parent_div')) {
                            parent_div.remove();
                        }
                        Swal.fire({
                            icon: 'success',
                            text: data.msg,
                            confirmButtonColor: '#bf325c',
                            confirmButtonText: 'Thanks!',
                            showCloseButton: true,
                        });
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: data.msg,
                        confirmButtonColor: '#bf325c',
                        confirmButtonText: 'Thanks!',
                        showCloseButton: true,
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    text: 'Something went wrong. Please try again.',
                    confirmButtonColor: '#bf325c',
                    confirmButtonText: 'Close',
                });
            }
        });
    }
</script>


<script>
    function getCitiesFromCountry() {
        let countryId = document.getElementById('country').value;
        let cityDropdown = document.getElementById('city');
        cityDropdown.disabled = true;

        if (countryId) {
            fetch(`/api/cities/${countryId}`)
                .then(response => response.json())
                .then(data => {
                    cityDropdown.innerHTML = '<option value="">{{ \App\Helpers\TranslationHelper::translate("Select City") }}</option>';
                    data.forEach(city => {
                        cityDropdown.innerHTML += `<option value="${city.id}">${city.name}</option>`;
                    });
                    cityDropdown.disabled = false;
                })
                .catch(error => console.error('Error fetching cities:', error));
        }
    }
</script>





    <script>
        $(document).ready(function() {
            $('#filter-toggle').click(function(e) {
                e.preventDefault();
                $('.cardsid').toggleClass('show');
            });
        });

// function updateDurationLabel(slider) {
//     const durationValue = slider.value;
//     const label = document.getElementById("duration_label");
//     const valueDisplay = document.getElementById("duration_value");

//     valueDisplay.innerHTML = durationValue;
//     valueDisplay.style.left = `calc(${(durationValue / 50) * 100}% - 10px)`;
//     if (durationValue > 0) {
//         label.innerHTML = durationValue + ' ' + '{{ \App\Helpers\TranslationHelper::translate("Days") }}';
//     } else {
//         label.innerHTML = 'All';
//     }
// }
    </script>
            <script>
            $(document).ready(function() {
$('#filter-toggle').click(function(e) {
    e.preventDefault();
    $('.cardsid').toggleClass('show'); /* إظهار أو إخفاء الشريط الجانبي */
});
});
        </script>


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
                $('#duration_label').text($(this).val() + ' {{\App\Helpers\TranslationHelper::translate('Days')}}');
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
                                    text: '<span>{{\App\Helpers\TranslationHelper::translate("Choose City")}}</span>',
                                    html: '<span>{{\App\Helpers\TranslationHelper::translate("Choose City")}}</span>',
                                    title: '{{\App\Helpers\TranslationHelper::translate("Choose City")}}',
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
                        text: '<span>{{\App\Helpers\TranslationHelper::translate("Choose City")}}</span>',
                        html: '<span>{{\App\Helpers\TranslationHelper::translate("Choose City")}}</span>',
                        title: '{{\App\Helpers\TranslationHelper::translate("Choose City")}}',
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


@endpush

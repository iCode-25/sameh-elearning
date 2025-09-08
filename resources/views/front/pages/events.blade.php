@extends('front.layouts.app')
@section('content')
    <main>
        <section class="news">
            <div class="row">
                <div class="col-md-8">
                    <!-- hero-main-stor-1 section -->
                    <section class="hero-main-News" data-aos="fade-up">
                        <section class="tow-news">
                            <div class="popup-title"
                                style="background-image: url('{{ asset('front/assets/img/about/newstow.png') }}')">
                                <p>
                                    {{ \App\Helpers\TranslationHelper::translate('News Updates') }}
                                </p>
                            </div>
                        </section>
                    </section>

                    <!-- hero-main-stor-2 section -->
                    <div class="titel-news text-center">
                        {{ \App\Helpers\TranslationHelper::translate('More News Updates') }}
                    </div>
                    <section class="hero-main-news-2" data-aos="fade-up">

                        <div class="container">
                            <div class="lliest-evint">
                                <p class="feature-text">{!! setting('more_news', app()->getLocale()) !!}</p>
                            </div>
                        </div>

                    </section>


                    <div class="container">
                        <div class="swiper mySwiper-tow">
                            <div class="swiper-wrapper">
                                @foreach ($events as $event)
                                    <div class="swiper-slide">
                                        <div class="image-box">
                                            <div class="image-wrapper">
                                                <a href="{{ route('details-events', ['id' => $event->id]) }}">
                                                    <img src="{{ asset('front/assets/img/event.png') }}" alt="Event Image"
                                                        class="events-image">
                                                </a>

                                                {{-- {{ asset('front/assets/img/event.png') }} --}}
                                                {{-- <a href="{{ route('details-events', ['id' => $event->id]) }}">
                                            @if ($event->getFirstMediaUrl('events_managementvideo'))
                                            <video controls class="events-video">
                                                <source src="{{ $event->getFirstMediaUrl('events_managementvideo') }}"
                                                    type="video/mp4">
                                                {{ \App\Helpers\TranslationHelper::translate('Your browser does not support video playback.') }}
                                            </video>
                                            @elseif($event->getFirstMediaUrl('events_management_image'))
                                            <img src="{{ $event->getFirstMediaUrl('events_management_image') }}" alt=""
                                                class="events-image">
                                            @endif
                                        </a> --}}
                                                <h5 style="padding: 5px; text-align: center;">{{ $event->name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- أزرار التنقل -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>


                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var swiper = new Swiper(".mySwiper-tow", {



                                slidesPerView: 3,
                                spaceBetween: 20,
                                navigation: {
                                    nextEl: ".swiper-button-next",
                                    prevEl: ".swiper-button-prev",
                                },
                                pagination: {
                                    el: ".swiper-pagination",
                                    clickable: true,
                                },
                                breakpoints: {
                                    320: {
                                        slidesPerView: 1
                                    },
                                    768: {
                                        slidesPerView: 2
                                    },
                                    1024: {
                                        slidesPerView: 3
                                    }
                                }
                            });
                        });
                    </script>
                    <!-- hero-main-stor-3 section -->
                </div>
                <div class="col-md-4">
                    <div class="titel-news-main">
                        {{ \App\Helpers\TranslationHelper::translate('News & Updates') }}
                    </div>
                    <button onclick="window.location.href='{{ route('site.home') }}'"
                        class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection

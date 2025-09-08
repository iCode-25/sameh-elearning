@extends('front.layouts.app')
@section('content')

{{-- @push('color_css')
    <style>
          body {
            background-color: {{ $category->color }};
        </style>
@endpush --}}


    <main>
        <section class="jop-main">
            <div class="row">
                <div class="col-md-8">
                    <section class="hero-main-jop" data-aos="fade-up">
                        <section class="hero-main-jop-tow">
                            <div class="titel-viaous-main">
                                {{-- <div class="main-img-owrks">
                                    <div class="title-jop">
                                        {{ \App\Helpers\TranslationHelper::translate('Workshops') }}
                                        <br>{{ \App\Helpers\TranslationHelper::translate('Activities') }}
                                    </div>
                                </div> --}}
                            </div>
                        </section>
                    </section>
                    <section class="hero-main-jop-2" data-aos="fade-up" data-aos-delay="100">
                        <div class="titel-hero-main">
                            {{ $category->name }}
                        </div>
                        <div class="container">
                            <div class="lliest-evint-workshop">
                                <p class="feature-text">
                                    {!! $category->description !!}
                                </p>
                            </div>
                        </div>
                    </section>
                    <section class="hero-main-jop-3" data-aos="fade-up" data-aos-delay="400">
                        <div class="container">
                            <div class="swiper custom-workshop-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div style="text-align: center; font-weight: bold;" class="main-stor-tow2"
                                            data-aos="zoom-in" data-aos-delay="100">
                                            <a href="{{ route('game-drawing-app') }}" class="custom-button">
                                                <img class="ad-image"
                                                    src="{{ asset('front/assets/img/game_drawing_app.png') }}"
                                                    alt="Drawing App">
                                            </a>
                                            <h3 style="margin-top: 8px;">
                                                {{ \App\Helpers\TranslationHelper::translate('Drawing App') }}</h3>
                                        </div>
                                    </div>
                                    @forelse ($category->workshops as $workshop)
                                        <div class="swiper-slide">
                                            <div style="text-align: center; font-weight: bold;" class="main-stor-tow2"
                                                data-aos="zoom-in" data-aos-delay="100">
                                                <a href="{{ route('details-workshops', ['id' => $workshop->id]) }}"
                                                    class="custom-button">
                                                    <img class="ad-image"
                                                        src="{{ $workshop->getFirstMediaUrl('workshops_image') }}"
                                                        alt="{{ $workshop->name }}">
                                                </a>
                                                <h3 style="margin-top: 8px;">{{ $workshop->name }}</h3>
                                            </div>
                                        </div>
                                    @empty
                                     <p>{{ \App\Helpers\TranslationHelper::translate('No workshops found for this category') }}</p>
                                     @endforelse
                                </div>
                                <div class="swiper-button-next custom-swiper-next"></div>
                                <div class="swiper-button-prev custom-swiper-prev"></div>
                                <div class="swiper-pagination custom-swiper-pagination"></div>
                            </div>
                        </div>
                    </section>

               
                    <style>

body {
            background-color: {{ $category->color }};

                        .custom-workshop-swiper {
                            padding: 20px 0;
                        }
                        .custom-workshop-swiper .swiper-slide {
                            display: flex;
                            justify-content: center;
                        }
                        .custom-workshop-swiper .main-stor-tow2 {
                            width: 100%;
                            max-width: 280px;
                            padding: 10px;
                            background-color: #fff;
                            border-radius: 12px;
                            transition: transform 0.3s;
                        }
                        .custom-workshop-swiper .main-stor-tow2:hover {
                            transform: translateY(-5px);
                        }
                        .custom-workshop-swiper .main-stor-tow2 img.ad-image {
                            width: 100%;
                            height: 220px;
                            object-fit: contain;
                            border-radius: 8px;
                        }
                        .custom-workshop-swiper .main-stor-tow2 h3 {
                            font-size: 18px;
                            color: #333;
                            margin-top: 12px;
                        }


                          .hero-main-jop-tow {
        background-image: url('{{ $category->getFirstMediaUrl('categoriesbackground') }}');
        background-size: cover;
        background-position: center;
        padding: 50px 0;
        color: #fff; 
    }
                    </style>
                    <style>
                        .ad-image {
                            -webkit-mask-image: url("{{ asset('front/assets/img/about/wrd.svg') }}");
                            mask-image: url("{{ asset('front/assets/img/about/wrd.svg') }}");
                            -webkit-mask-size: cover;
                            mask-size: cover;
                        }
                    </style>
                </div>
                <div class="col-md-4 jop">
                    <div class="oresh">
                        {{ \App\Helpers\TranslationHelper::translate('Activities') }}
                        {{ \App\Helpers\TranslationHelper::translate('Workshops') }}
                    </div>
                    <button onclick="window.location.href='{{ route('educational-content') }}'"
                        class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols"
                        style="z-index: 9999999999999;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('js')
    <script>
        var customWorkshopSwiper = new Swiper('.custom-workshop-swiper', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.custom-swiper-next',
                prevEl: '.custom-swiper-prev',
            },
            pagination: {
                el: '.custom-swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    </script>
@endpush

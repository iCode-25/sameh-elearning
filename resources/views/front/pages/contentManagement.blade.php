@extends('front.layouts.app')
@section('content')

<main>
    <section class="parint-main">
        <div class="row">
            <div class="col-md-8">
                <div class="man-in-print">
                <section class="hero-main-parint" data-aos="fade-up" data-aos-once="false">
                    <div class="section-mig-main-print">
                        <div class="title-main-sus">{{ \App\Helpers\TranslationHelper::translate('Parents Education') }}</div>
                    </div>
                </section>
                </div>



                <section class="hero-main-parint-2" data-aos="fade-up" data-aos-once="false">
                    <div class="tit-main-top-oarint text-center">
                        {{ \App\Helpers\TranslationHelper::translate('Lessons for teachers parents') }}
                    </div>

                    {{-- {{ setting('lessons_for_teachers_parents', app()->getLocale()) }} --}}

                    <div class="container">
                        <!-- <ul class="features-list-2">
        <li class="feature-item-2 d-flex justify-content-between align-items-center"
            data-aos="fade-up" data-aos-delay="100" data-aos-once="false">

            @if (app()->getLocale() === 'ar')
                <div class="icon ms-3">
                    <img src="{{ asset('front/assets/img/new-images/Untitled-4.png') }}"
                         alt="Feature icon" class="feature-icon">
                </div>
            @endif

            <p class="feature-text flex-grow-1">
               {!! setting('lessons_for_teachers_parents', app()->getLocale()) !!}
            </p>

            @if (app()->getLocale() === 'en')
                <div class="icon me-3">
                    <img src="{{ asset('front/assets/img/new-images/Untitled-4.png') }}"
                         alt="Feature icon" class="feature-icon">
                </div>
            @endif

        </li>
    </ul> -->

                        <div class="lliest-evint-print">
                            <p class="feature-text">
                                {!! setting('lessons_for_teachers_parents', app()->getLocale()) !!}
                            </p>
                        </div>
                    </div>


                </section>



                <div class="container">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($contentManagements as $contentManagement)
                            <div class="swiper-slide">
                                <div class="main-content-box" data-aos="fade-up" data-aos-delay="{{ $loop->index * 200 }}"
                                    style="background: url('{{ asset('front/assets/img/ST/Asset 46.png') }}') no-repeat center center / cover;
                    position: relative; border-radius: 10px; display: flex; flex-direction: column;
                    align-items: center; justify-content: center; padding: 20px;">

                                    <a href="{{ route('details-contentManagement', ['id' => $contentManagement->id]) }}"
                                        style="display: block; width: 80%; text-align: center;">
                                        <img src="{{ $contentManagement->getFirstMediaUrl('content_management_image') }}"
                                            alt="" class="contentManagement-image" style="width: 100%; height: 250px;">
                                    </a>

                                    <h5 style="padding: 10px; text-align: center; color: white;">
                                        {{ $contentManagement->name }}
                                    </h5>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>


            </div>
            <div class="col-md-4">
                <div class="titel-print">
                    {{ \App\Helpers\TranslationHelper::translate('Lessons for teachers parents') }}
                </div>
                <button onclick="window.location.href='{{route('site.home')}}'"
                    class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var swiper = new Swiper(".mySwiper", {
                        loop: false,
                        autoplay: false,
                        keyboard: false,
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




        </div>
    </section>
</main>





@endsection

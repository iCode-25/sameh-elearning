@extends('front.layouts.app')
@section('content')

<main>
    <section class="stor-main">
        <div class="row">
            <div class="col-md-8">
                <section class="bacround-stors-top">
                    <section class="hero-main-stor" data-aos="fade-up" data-aos-once="false">
                        <div class="story-title">{{ \App\Helpers\TranslationHelper::translate('Stories') }}</div>
                    </section>
                </section>

                <section class="stories-info-sec" data-aos="fade-up" data-aos-once="false">
                    <div class="title">
                        {{ \App\Helpers\TranslationHelper::translate('About Stories') }}
                    </div>
                    <div>
                        <p class="feature-text"> {!! setting('stories', app()->getLocale()) !!}</p>
                    </div>
                </section>


                <section class="stories-books-info-sec" data-aos="fade-up" data-aos-once="false">
                    <div class="title">
                        {{ \App\Helpers\TranslationHelper::translate('Sustam and Sustama Adventures') }}
                    </div>

                    <div class="swiper stories-slider">
                        <div class="swiper-wrapper">
                            @foreach ($stories as $story)
                            <div class="swiper-slide">
                                <div class="main-stor-tow"
                                    data-aos="zoom-in"
                                    data-aos-delay="{{ $loop->index * 200 }}"
                                    data-aos-once="false">
                                    <div class="main-img">
                                        <a href="{{ route('details-stories', ['id' => $story->id]) }}">
                                            <img src="{{ $story->getFirstMediaUrl('story_image') }}" alt="" class="story-image" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </section>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        new Swiper(".stories-slider", {
                            loop: true,
                            autoplay: false,
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
                                    slidesPerView: 3
                                },
                                1024: {
                                    slidesPerView: 3
                                }
                            }
                        });
                    });
                </script>

                {{-- <h5 style="position: absolute; bottom: 10px; width: 100%; text-align: center; background: rgba(0, 0, 0, 0.5); color: white; padding: 5px; border-radius: 5px;">
            {{ $story->name }}
                </h5> --}}

                {{-- <div class="main-stor-tow" data-aos="zoom-in" data-aos-once="false">
                                    <a href="#">
                                        <img src="{{asset('front/assets/img/Cover/Asset 2.png')}}" alt="">
                </a>
            </div>
            @foreach ($stories as $story)
            <div class="main-stor-tow" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 200 }}"
                data-aos-once="false">
                <a href="{{ route('details-stories', ['id' => $story->id]) }}">
                    <img src="{{ $story->getFirstMediaUrl('story_image') }}" alt="" class="story-image">
                </a>
                <h5 style="padding: 5px; text-align: center;">{{ $story->name }}</h5>
            </div>
            @endforeach --}}


        </div>

        <div class="col-md-4">
            <div class="title-main-stor">
                {{ \App\Helpers\TranslationHelper::translate('Stories') }}
            </div>
            <button onclick="window.location.href='{{route('educational-content')}}'"
                class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols">
                <i class="fas fa-times"></i>
            </button>
        </div>

        </div>
    </section>
</main>
@endsection


@extends('front.layouts.app')
@section('content')

    <main>
        <section class="hero-main-educational">
            <button onclick="window.location.href='{{route('site.home')}}'"
            class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols">
                <i class="fas fa-times"></i>
            </button>
            <div class="bacround text-end aos-init aos-animate" data-aos="fade-in" data-aos-duration="1200">
            </div>
            <div class="row align-items-center">
                <div class="col-md-8  aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1500"
                    data-aos-easing="ease-in-out">
                    <div class="img-hero-2">
                        <!-- <img src="{{asset('front/assets/img/ST/Asset 5.png')}}" alt="">
                        <div class="titel-edigish">
                            {{ \App\Helpers\TranslationHelper::translate('Educational Content') }}
                        </div> -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-hero">
                        <div class="grid-container">
                            <a href="{{route('games')}}">
                                <div class="card-main text-center">
                                    <img src="{{asset('front/assets/img/Learningcontent/pley.png')}}"
                                        alt="">
                                    <h3> {{ \App\Helpers\TranslationHelper::translate('Games') }}</h3>
                                </div>
                            </a>
                            <a href="{{route('stories')}}" >
                                <div class="card-main text-center">
                                    <img src="{{asset('front/assets/img/Learningcontent/story.png')}}" alt="">
                                    <h3>{{ \App\Helpers\TranslationHelper::translate('Stories') }}</h3>
                                </div>
                            </a>
                            <a href="{{route('Workshops')}}"
                               >
                                <div class="card-main text-center">
                                    <img src="{{asset('front/assets/img/Learningcontent/workshop.png')}}" alt="">
                                    <h3>{{ \App\Helpers\TranslationHelper::translate('Workshops and Activities') }}</h3>
                                </div>
                            </a>
                            <a href="{{route('video')}}"  >
                                <div class="card-main text-center">
                                    <img src="{{asset('front/assets/img/Learningcontent/vides.png')}}" alt="">
                                    <h3>{{ \App\Helpers\TranslationHelper::translate('Video Clips') }}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bacround-2 text-end d-lg-none aos-init aos-animate" data-aos="fade-in" data-aos-delay="500">
            </div>
        </section>
    </main>


       @endsection

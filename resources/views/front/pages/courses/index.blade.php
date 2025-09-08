@extends('front.layouts.app')

@section('content')
    <!-- TITLE BANNER START -->
    <section class="title-banner">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <div class="title-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="title-content">
                                    <h1 class="dark-gray fw-700">Lessons</h1>
                                </div>
                                <div class="img-block">
                                    <img src="{{ asset('front/assets/media/user/star.png') }}" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="{{ setting('image_banner_page_lessons_web', 'en') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TITLE BANNER END -->

    <!-- videos-start -->
    <section class="videos py-80">
        <div class="container-fluid">
            @include('front.components.filter', ['levels' => $levels])
            <div class="video-sec">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="row gy-2">
                            @include('front.components.lesson', ['lessons' => $lessons])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- videos-end-->
@endsection

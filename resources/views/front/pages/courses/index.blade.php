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
                                    <img src="{{ setting('image_banner_page_lessons_web', 'en') }}" alt="">
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
    <section class="videos py-80" dir="ltr">
        <div class="eyebrow heading">{{ \App\Helpers\TranslationHelper::translate('Courses Video') }}</div>
        <h2 class="dark-gray fw-800 heading mb-48">
            <span class="color-sec">{{ \App\Helpers\TranslationHelper::translate('Video Courses') }}</span>
        </h2>

        <div class="container">
            <div class="video-grid">
                @foreach ($lessons as $lesson)
                    <div class="video-card">
                        <div class="card-img">
                            <img src="{{ $lesson->getFirstMediaUrl('newsimage_news') }}" alt="video">
                            <a href="{{ route('site.lesson_details', ['lesson' => $lesson->id]) }}" class="play-btn">
                                <img src="{{ asset('front/assets/media/icons/play-icon.png') }}" alt="play">
                            </a>
                        </div>
                        <div class="card-body" dir="rtl">
                            <h5>{{ $lesson->name }}</h5>
                            <p>{!! strip_tags($lesson->des) !!}</p>
                            <span
                                class="price">{{ $lesson->price . ' ' . \App\Helpers\TranslationHelper::translate('EGP') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- videos-end-->
@endsection

@extends('front.layouts.app')

@push('css')
    <style>
        .image-wrapper {
            /* width: 500px; */
            height: 300px;
            overflow: hidden;
            position: relative;
        }

        .moving-image {
            width: 100%;
            /* height: 100%; */
            object-fit: cover;
            /* position: absolute; */
            top: 0;
            left: 0;
            transition: transform 0.1s linear;
            will-change: transform;
        }
    </style>
@endpush

@section('content')
    <!-- HERO BANNER START -->
    <section class="hero-banner">
        <div class="container-fluid">
            <div class="mt-80">
                <img src="{{ asset('front/assets/media/vector/arrow-line.png') }}" alt=""
                    class="banner-element d-xl-block d-none">
                <div class="row align-items-center row-gap-4 justify-content-between">
                    <div class="col-xl-5 order-xl-1 order-2">
                        <div class="hero-content">
                            <div class="hero-text mb-48">
                                <p class="eyebrow">{{ \App\Helpers\TranslationHelper::translate('Chemistry Made Simple') }}
                                </p>
                                <h1 class="dark-gray mb-16 text-xl-start text-center fw-700 tex">
                                    {{ \App\Helpers\TranslationHelper::translate('Your Future Starts') }}
                                    <br class= "d-sm-block">
                                    <span class=" color-sec fw-700">
                                        {{ \App\Helpers\TranslationHelper::translate('Learn, Apply, Create') }}
                                    </span>
                                </h1>
                                <p class="text-xl-start text-center light-gray fw-400">
                                    {{ \App\Helpers\TranslationHelper::translate('Your Ultimate Platform to Learn Chemistry Professionally We offer you a complete educational experience that combines simplified explanations, interactive lessons, comprehensive quizzes, and informative articles') }}
                                </p>
                            </div>
                            <div class="hero-buttons d-flex gap-16 mb-48">
                                <a href="{{ route('site.lessons') }}" class="cus-btn">
                                    <span
                                        class="btn-text">{{ \App\Helpers\TranslationHelper::translate('explore courses') }}</span>
                                    <span>{{ \App\Helpers\TranslationHelper::translate('explore courses') }}</span>
                                </a>
                                <a href="{{ route('site.about') }}" class="cus-btn-2">
                                    <span
                                        class="btn-text">{{ \App\Helpers\TranslationHelper::translate('Read More') }}</span>
                                    <span>{{ \App\Helpers\TranslationHelper::translate('Read More') }}</span>
                                </a>
                            </div>
                            {{ \App\Helpers\TranslationHelper::translate('Outstanding students') }}
                            <div class="student-images-block">
                                <div class="student-images">
                                    <img src="{{ asset('front/assets/media/user/user-1.png') }}" alt="">
                                    <img src="{{ asset('front/assets/media/user/test-user-1.png') }}" alt="">
                                    <img src="{{ asset('front/assets/media/user/user-2.png') }}" alt="">
                                    <img src="{{ asset('front/assets/media/user/test-user-1.png') }}" alt="">
                                    <img src="{{ asset('front/assets/media/user/user-3.png') }}" alt="">
                                </div>
                                <h6 class="dark-gray font-primary fw-700">
                                    <span class="color-sec  fw-700">+659
                                        {{-- {{ \App\Models\User::count() }} --}}
                                    </span>
                                    {{ \App\Helpers\TranslationHelper::translate('Students') }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 order-xl-2 order-1">
                        <div class="image-wrapper hero-image-block text-xl-start text-center">
                            <img class="moving-image" src="{{ setting('image_banner_home_web', 'en') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- HERO BANNER END -->

    <!-- online-learning -->
    <section class="online py-80">
        <div class="container-fluid">
            <div class="row row-gap-4 justify-content-center">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="row row-gap-3">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="img-online">
                                        <img src="{{ asset('front/assets/media/course/course-1.png') }}" alt="course">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="img-online">
                                        <img src="{{ asset('front/assets/media/course/course-2.png') }}" alt="course">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="img-online">
                                        <img src="{{ asset('front/assets/media/course/course-3.png') }}" alt="course">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="img-onlines">
                                        <img src="{{ asset('front/assets/media/course/tutor-1.png') }}" alt="course">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <div class="eyebrow-2"> {{ \App\Helpers\TranslationHelper::translate('Simply Chemistry') }}
                            </div>
                            <h2 class="dark-gray fw-800 mb-16">
                                {{ setting('title_about_us', app()->getLocale()) }}
                            </h2>
                            <p class="light-gray mb-32">
                                {!! \Illuminate\Support\Str::limit(setting('description_about_us', app()->getLocale()), 400) !!}
                            </p>
                            <div class="d-flex gap-24 align-items-center mb-32  images-block">
                                <img src="{{ asset('front/assets/media/user/image2.png') }}" alt="user" class="img-1">
                                <img src="{{ asset('front/assets/media/user/test-user-2.png') }}" alt="user"
                                    class="img-2">
                                <img src="{{ asset('front/assets/media/user/test-user-3.png') }}" alt="user"
                                    class="img-3">
                            </div>
                            <div class="mb-32">
                                <div class="row row-gap-3">
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="d-flex gap-8 align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.9999 0C5.38321 0 0 5.38309 0 11.9999C0 18.6168 5.38321 24 11.9999 24C18.6167 24 23.9999 18.6168 23.9999 11.9999C23.9999 5.38309 18.6168 0 11.9999 0ZM18.8905 9.97305L11.3516 17.512C11.031 17.8326 10.6049 18.009 10.1516 18.009C9.69832 18.009 9.27221 17.8326 8.95165 17.512L5.10936 13.6697C4.78881 13.3492 4.61225 12.923 4.61225 12.4698C4.61225 12.0163 4.78881 11.5902 5.10936 11.2697C5.42979 10.9491 5.85591 10.7726 6.30932 10.7726C6.7626 10.7726 7.18884 10.9491 7.50927 11.2698L10.1515 13.9119L16.4904 7.57301C16.8109 7.25245 17.237 7.07602 17.6903 7.07602C18.1436 7.07602 18.5697 7.25245 18.8903 7.57301C19.5522 8.23491 19.5522 9.3114 18.8905 9.97305Z"
                                                    fill="var(--secondary-color)"></path>
                                            </svg>
                                            <h6 class="color-primary fw-700">
                                                {{ \App\Helpers\TranslationHelper::translate('Chemistry Lessons') }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="d-flex gap-8 align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.9999 0C5.38321 0 0 5.38309 0 11.9999C0 18.6168 5.38321 24 11.9999 24C18.6167 24 23.9999 18.6168 23.9999 11.9999C23.9999 5.38309 18.6168 0 11.9999 0ZM18.8905 9.97305L11.3516 17.512C11.031 17.8326 10.6049 18.009 10.1516 18.009C9.69832 18.009 9.27221 17.8326 8.95165 17.512L5.10936 13.6697C4.78881 13.3492 4.61225 12.923 4.61225 12.4698C4.61225 12.0163 4.78881 11.5902 5.10936 11.2697C5.42979 10.9491 5.85591 10.7726 6.30932 10.7726C6.7626 10.7726 7.18884 10.9491 7.50927 11.2698L10.1515 13.9119L16.4904 7.57301C16.8109 7.25245 17.237 7.07602 17.6903 7.07602C18.1436 7.07602 18.5697 7.25245 18.8903 7.57301C19.5522 8.23491 19.5522 9.3114 18.8905 9.97305Z"
                                                    fill="var(--secondary-color)"></path>
                                            </svg>
                                            <h6 class="color-primary fw-700">
                                                {{ \App\Helpers\TranslationHelper::translate('Monthly Packages') }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="d-flex gap-8 align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.9999 0C5.38321 0 0 5.38309 0 11.9999C0 18.6168 5.38321 24 11.9999 24C18.6167 24 23.9999 18.6168 23.9999 11.9999C23.9999 5.38309 18.6168 0 11.9999 0ZM18.8905 9.97305L11.3516 17.512C11.031 17.8326 10.6049 18.009 10.1516 18.009C9.69832 18.009 9.27221 17.8326 8.95165 17.512L5.10936 13.6697C4.78881 13.3492 4.61225 12.923 4.61225 12.4698C4.61225 12.0163 4.78881 11.5902 5.10936 11.2697C5.42979 10.9491 5.85591 10.7726 6.30932 10.7726C6.7626 10.7726 7.18884 10.9491 7.50927 11.2698L10.1515 13.9119L16.4904 7.57301C16.8109 7.25245 17.237 7.07602 17.6903 7.07602C18.1436 7.07602 18.5697 7.25245 18.8903 7.57301C19.5522 8.23491 19.5522 9.3114 18.8905 9.97305Z"
                                                    fill="var(--secondary-color)"></path>
                                            </svg>
                                            <h6 class="color-primary fw-700">
                                                {{ \App\Helpers\TranslationHelper::translate('Quizzes') }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="d-flex gap-8 align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.9999 0C5.38321 0 0 5.38309 0 11.9999C0 18.6168 5.38321 24 11.9999 24C18.6167 24 23.9999 18.6168 23.9999 11.9999C23.9999 5.38309 18.6168 0 11.9999 0ZM18.8905 9.97305L11.3516 17.512C11.031 17.8326 10.6049 18.009 10.1516 18.009C9.69832 18.009 9.27221 17.8326 8.95165 17.512L5.10936 13.6697C4.78881 13.3492 4.61225 12.923 4.61225 12.4698C4.61225 12.0163 4.78881 11.5902 5.10936 11.2697C5.42979 10.9491 5.85591 10.7726 6.30932 10.7726C6.7626 10.7726 7.18884 10.9491 7.50927 11.2698L10.1515 13.9119L16.4904 7.57301C16.8109 7.25245 17.237 7.07602 17.6903 7.07602C18.1436 7.07602 18.5697 7.25245 18.8903 7.57301C19.5522 8.23491 19.5522 9.3114 18.8905 9.97305Z"
                                                    fill="var(--secondary-color)"></path>
                                            </svg>
                                            <h6 class="color-primary fw-700">
                                                {{ \App\Helpers\TranslationHelper::translate('Educational Articles') }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('site.about') }}" class="cus-btn-3">
                                <span
                                    class="btn-text">{{ \App\Helpers\TranslationHelper::translate('More abut us') }}</span>
                                <span>{{ \App\Helpers\TranslationHelper::translate('More abut us') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- online-end -->

    <!-- features START -->
    <section class="features py-80" dir="ltr">
        <div class="container-fluid">
            <div class="feature-block">
                <div class="eyebrow heading">{{ \App\Helpers\TranslationHelper::translate('Services') }}</div>
                <h2 class="dark-gray fw-800 heading mb-48">
                    {{ \App\Helpers\TranslationHelper::translate('Exclusive') }}&nbsp;<span
                        class="color-sec">{{ \App\Helpers\TranslationHelper::translate('Services') }}</span></h2>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-arrows mt-sm-0 mt-48 d-xl-flex d-none">
                            <a href="javascript:;" class="arrow-btn btn-prev" data-slide="features-slider">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="49"
                                    viewBox="0 0 48 49" fill="none">
                                    <path
                                        d="M24 0.5C37.2324 0.5 48 11.2676 48 24.5C48 37.7324 37.2324 48.5 24 48.5C10.7676 48.5 0 37.7324 0 24.5C0 11.2676 10.7676 0.5 24 0.5ZM13.4448 26.2724L19.8432 33.8072C20.3832 34.4444 21.156 34.7732 21.93 34.7732C22.5552 34.7732 23.1864 34.5584 23.7024 34.1216C24.8544 33.146 24.996 31.4168 24.018 30.2636L21.4476 27.2384H32.4708C33.9828 27.2384 35.208 26.0132 35.208 24.5012C35.208 22.9892 33.9828 21.764 32.4708 21.764H21.4476L24.018 18.7388C24.996 17.5856 24.8544 15.8588 23.7024 14.8784C22.5504 13.9004 20.8224 14.042 19.8432 15.1952L13.4448 22.73C12.576 23.75 12.576 25.25 13.4448 26.2724Z"
                                        fill="#1E1F20" />
                                </svg>
                            </a>
                            <a href="javascript:;" class="arrow-btn btn-next" data-slide="features-slider">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="49"
                                    viewBox="0 0 48 49" fill="none">
                                    <path
                                        d="M24 0.5C10.7676 0.5 0 11.2676 0 24.5C0 37.7324 10.7676 48.5 24 48.5C37.2324 48.5 48 37.7324 48 24.5C48 11.2676 37.2324 0.5 24 0.5ZM34.5552 26.2724L28.1568 33.8072C27.6168 34.4444 26.844 34.7732 26.07 34.7732C25.4448 34.7732 24.8136 34.5584 24.2976 34.1216C23.1456 33.146 23.004 31.4168 23.982 30.2636L26.5524 27.2384H15.5292C14.0172 27.2384 12.792 26.0132 12.792 24.5012C12.792 22.9892 14.0172 21.764 15.5292 21.764H26.5524L23.982 18.7388C23.004 17.5856 23.1456 15.8588 24.2976 14.8784C25.4496 13.9004 27.1776 14.042 28.1568 15.1952L34.5552 22.73C35.424 23.75 35.424 25.25 34.5552 26.2724Z"
                                        fill="#1E1F20" />

                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="features-slider">
                                <div style="height: 440px;" class="card">
                                    <div class="heading">
                                        <img src="{{ asset('front/assets/media/user/banner-user-1.png') }}"
                                            alt="banner" class="mb-32">
                                    </div>
                                    <h5 class="heading  fw-800 mb-24">
                                        {{ \App\Helpers\TranslationHelper::translate('Monthly Packages') }}</h5>
                                    <p class="light-gray heading">
                                        {{ \App\Helpers\TranslationHelper::translate('Subscribe to our monthly plans and get comprehensive, simplified chemistry lessons, continuous practice, and regular quizzes to help you steadily progress toward excellence') }}
                                    </p>
                                </div>




                                <div style="height: 440px;" class="card">
                                    <div class="heading">
                                        <img src="{{ asset('front/assets/media/user/banner-user-2.png') }}"
                                            alt="banner" class="mb-32">
                                    </div>
                                    <h5 class="heading  fw-800 mb-24">
                                        {{ \App\Helpers\TranslationHelper::translate('Chemistry Lessons') }}</h5>
                                    <p class="light-gray heading">
                                        {{ \App\Helpers\TranslationHelper::translate('Chemistry lessons are designed to simplify complex concepts through clear explanations and practical exercises') }}
                                    </p>
                                </div>
                                <div style="height: 440px;" class="card">
                                    <div class="heading">
                                        <img src="{{ asset('front/assets/media/user/banner-user-3.png') }}"
                                            alt="banner" class="mb-32">
                                    </div>
                                    <h5 class="heading  fw-800 mb-24">
                                        {{ \App\Helpers\TranslationHelper::translate('Educational Articles') }}</h5>
                                    <p class="light-gray heading">
                                        {{ \App\Helpers\TranslationHelper::translate('Educational articles that help you gain a deeper understanding of chemistry concepts, offering effective study tips and strategies for academic excellence') }}

                                    </p>
                                </div>
                                <div style="height: 440px;" class="card">
                                    <div class="heading">
                                        <img src="{{ asset('front/assets/media/user/banner-user-4.png') }}"
                                            alt="banner" class="mb-32">
                                    </div>
                                    <h5 class="heading  fw-800 mb-24">
                                        {{ \App\Helpers\TranslationHelper::translate('Quizzes') }}</h5>
                                    <p class="light-gray heading">

                                        {{ \App\Helpers\TranslationHelper::translate('Our chemistry tests are designed to assess your true understanding of the curriculum and strengthen your skills through comprehensive questions that simulate final exam patterns, helping you prepare with confidence') }}

                                    </p>
                                </div>

                                <div style="height: 440px;" class="card">
                                    <div class="heading">
                                        <img src="{{ asset('front/assets/media/user/banner-user-3.png') }}"
                                            alt="banner" class="mb-32">
                                    </div>
                                    <h5 class="heading  fw-800 mb-24">
                                        {{ \App\Helpers\TranslationHelper::translate('Educational Articles') }}</h5>
                                    <p class="light-gray heading">
                                        {{ \App\Helpers\TranslationHelper::translate('Educational articles that help you gain a deeper understanding of chemistry concepts, offering effective study tips and strategies for academic excellence') }}

                                    </p>
                                </div>

                                <div style="height: 440px;" class="card">
                                    <div class="heading">
                                        <img src="{{ asset('front/assets/media/user/banner-user-2.png') }}"
                                            alt="banner" class="mb-32">
                                    </div>
                                    <h5 class="heading  fw-800 mb-24">
                                        {{ \App\Helpers\TranslationHelper::translate('Chemistry Lessons') }}</h5>
                                    <p class="light-gray heading">
                                        {{ \App\Helpers\TranslationHelper::translate('Chemistry lessons are designed to simplify complex concepts through clear explanations and practical exercises') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- COURSES SECTION END -->

    @if ($packages->count() > 0)
        <section class="course-section py-80">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between mb-48 flex-wrap">
                    <div>
                        <div class="eyebrow-2">{{ \App\Helpers\TranslationHelper::translate('Packages') }}</div>
                        @if (app()->getLocale() == 'ar')
                            <h2 class="dark-gray fw-800 mb-16">
                                <span
                                    class="color-primary">{{ \App\Helpers\TranslationHelper::translate('Packages') }}</span>
                                {{ \App\Helpers\TranslationHelper::translate('Most Popular') }}
                            </h2>
                        @else
                            <h2 class="dark-gray fw-800 mb-16">
                                {{ \App\Helpers\TranslationHelper::translate('Most Popular') }}
                                <span
                                    class="color-primary">{{ \App\Helpers\TranslationHelper::translate('Packages') }}</span>
                            </h2>
                        @endif
                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div>
                        <div class="mb-48">
                            <div class="row row-gap-4">
                                @include('front.components.package', ['packages', $packages])
                            </div>
                        </div>
                    </div>
                </div>

                <p class="light-gray heading fw-400">
                    <a href="{{ route('site.packages') }}">
                        <span
                            class="color-primary fw-700">{{ \App\Helpers\TranslationHelper::translate('Explore all Packages') }}<svg
                                xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                                fill="none">
                                <path
                                    d="M2.92098 11.4097H19.4453L15.8531 7.81736C15.427 7.39131 15.427 6.70066 15.8531 6.27461C16.279 5.84857 16.9698 5.84857 17.3958 6.27461L22.8504 11.7291C23.2764 12.1552 23.2764 12.8458 22.8504 13.2719L17.3959 18.7264C17.1828 18.9395 16.9036 19.046 16.6245 19.046C16.3453 19.046 16.066 18.9395 15.8531 18.7264C15.4271 18.3004 15.4271 17.6097 15.8531 17.1837L19.4453 13.5915H2.92098C2.31849 13.5915 1.83006 13.103 1.83006 12.5005C1.83006 11.8981 2.31849 11.4097 2.92098 11.4097Z"
                                    fill="var(--secondary-color)"></path>
                            </svg>
                        </span>
                    </a>
                </p>
            </div>
        </section>
    @endif

    <!-- videos-start -->
    @if ($lessons->count() > 0)
        <section class="videos py-80" dir="ltr">
            <div class="eyebrow heading">{{ \App\Helpers\TranslationHelper::translate('Courses Video') }}</div>
            <h2 class="dark-gray fw-800 heading mb-48"> {{-- Online &nbsp; --}}<span
                    class="color-sec">{{ \App\Helpers\TranslationHelper::translate('Video Courses') }}</span>
            </h2>
            <div class="container-fluid mb-48">
                <div class="video-sec">
                    <div class="slider-arrows mt-sm-0 mt-48 d-xxl-flex d-none">
                        <a href="javascript:;" class="arrow-btn btn-prev" data-slide="video-slider">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="49" viewBox="0 0 48 49"
                                fill="none">
                                <path
                                    d="M24 0.5C37.2324 0.5 48 11.2676 48 24.5C48 37.7324 37.2324 48.5 24 48.5C10.7676 48.5 0 37.7324 0 24.5C0 11.2676 10.7676 0.5 24 0.5ZM13.4448 26.2724L19.8432 33.8072C20.3832 34.4444 21.156 34.7732 21.93 34.7732C22.5552 34.7732 23.1864 34.5584 23.7024 34.1216C24.8544 33.146 24.996 31.4168 24.018 30.2636L21.4476 27.2384H32.4708C33.9828 27.2384 35.208 26.0132 35.208 24.5012C35.208 22.9892 33.9828 21.764 32.4708 21.764H21.4476L24.018 18.7388C24.996 17.5856 24.8544 15.8588 23.7024 14.8784C22.5504 13.9004 20.8224 14.042 19.8432 15.1952L13.4448 22.73C12.576 23.75 12.576 25.25 13.4448 26.2724Z"
                                    fill="#1E1F20" />
                            </svg>
                        </a>
                        <a href="javascript:;" class="arrow-btn btn-next" data-slide="video-slider">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="49" viewBox="0 0 48 49"
                                fill="none">
                                <path
                                    d="M24 0.5C10.7676 0.5 0 11.2676 0 24.5C0 37.7324 10.7676 48.5 24 48.5C37.2324 48.5 48 37.7324 48 24.5C48 11.2676 37.2324 0.5 24 0.5ZM34.5552 26.2724L28.1568 33.8072C27.6168 34.4444 26.844 34.7732 26.07 34.7732C25.4448 34.7732 24.8136 34.5584 24.2976 34.1216C23.1456 33.146 23.004 31.4168 23.982 30.2636L26.5524 27.2384H15.5292C14.0172 27.2384 12.792 26.0132 12.792 24.5012C12.792 22.9892 14.0172 21.764 15.5292 21.764H26.5524L23.982 18.7388C23.004 17.5856 23.1456 15.8588 24.2976 14.8784C25.4496 13.9004 27.1776 14.042 28.1568 15.1952L34.5552 22.73C35.424 23.75 35.424 25.25 34.5552 26.2724Z"
                                    fill="#1E1F20" />
                            </svg>
                        </a>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="video-slider">
                                @foreach ($lessons as $lesson)
                                    <div class="video-block">
                                        <img src="{{ $lesson->getFirstMediaUrl('news') }}" alt="brand">
                                        <a href="{{ route('site.lesson_details', ['lesson' => $lesson->id]) }}"
                                            class="play-btn">
                                            <img src="{{ asset('front/assets/media/icons/play-icon.png') }}"
                                                alt="video" class="mb-48 video-pic">
                                        </a>
                                        <div class="block" dir="rtl">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5 class="white mb-4p heading-style">{{ $lesson->name }}</h5>
                                                    <p class="text-light description">{!! strip_tags($lesson->des) !!}</p>
                                                </div>
                                                <div>
                                                    <p class="lightest-gray">
                                                        {{ $lesson->price . ' ' . \App\Helpers\TranslationHelper::translate('EGP') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p class="light-gray heading fw-400">
                <a href="{{ route('site.lessons') }}">
                    <span
                        class="color-primary fw-700">{{ \App\Helpers\TranslationHelper::translate('Explore all Lessons') }}<svg
                            xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                            fill="none">
                            <path
                                d="M2.92098 11.4097H19.4453L15.8531 7.81736C15.427 7.39131 15.427 6.70066 15.8531 6.27461C16.279 5.84857 16.9698 5.84857 17.3958 6.27461L22.8504 11.7291C23.2764 12.1552 23.2764 12.8458 22.8504 13.2719L17.3959 18.7264C17.1828 18.9395 16.9036 19.046 16.6245 19.046C16.3453 19.046 16.066 18.9395 15.8531 18.7264C15.4271 18.3004 15.4271 17.6097 15.8531 17.1837L19.4453 13.5915H2.92098C2.31849 13.5915 1.83006 13.103 1.83006 12.5005C1.83006 11.8981 2.31849 11.4097 2.92098 11.4097Z"
                                fill="var(--secondary-color)"></path>
                        </svg>
                    </span>
                </a>
            </p>

        </section>
    @endif

    {{-- Tests --}}
    @if ($tests_lessons->isNotEmpty())
        <section class="course-section py-80">
            <div class="container-fluid">

                {{-- العنوان --}}
                <div class="d-flex align-items-center justify-content-between mb-48 flex-wrap">
                    <div>
                        <div class="eyebrow-2">{{ \App\Helpers\TranslationHelper::translate('Tests') }}</div>

                        <h2 class="dark-gray fw-800 mb-16">
                            @if (app()->getLocale() === 'ar')
                                <span class="color-primary">
                                    {{ \App\Helpers\TranslationHelper::translate('Tests') }}
                                </span>
                                {{ \App\Helpers\TranslationHelper::translate('doors') }}
                            @else
                                {{ \App\Helpers\TranslationHelper::translate('doors') }}
                                <span class="color-primary">
                                    {{ \App\Helpers\TranslationHelper::translate('Lessons') }}
                                </span>
                            @endif
                        </h2>
                    </div>
                </div>

                {{-- البطاقات --}}
                <div class="row g-4">
                    @foreach ($tests_lessons as $lesson)
                        <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                            <div class="card border-0 shadow h-100 hover-shadow w-100">
                                <div class="card-head h-50 d-flex flex-column">
                                    <img src="{{ $lesson->getFirstMediaUrl('news') }}" alt="{{ $lesson->name }}"
                                        class="card-img-top rounded-top h-100">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="mb-4p heading-style">{{ $lesson->name }}</h5>
                                    <p class="text-muted small mb-3 description">
                                        {!! strip_tags($lesson->des) !!}
                                    </p>

                                    {{-- Spacer علشان الزرار يبقى ثابت تحت --}}
                                    <div class="mt-auto">
                                        <a href="{{ route('user.show_lesson', ['lesson' => $lesson->id]) }}" class="cus-btn">
                                            <span
                                                class="btn-text">{{ \App\Helpers\TranslationHelper::translate('view test') }}</span>
                                            <span>{{ \App\Helpers\TranslationHelper::translate('view test') }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif



    <!-- User START -->
    @if ($users->count() > 0)
        <section class="py-5">
            <div class="container-fluid">
                <h2 class="text-center fw-bold mb-5">🥇 {{ \App\Helpers\TranslationHelper::translate('top students') }}
                </h2>


                <div class="swiper topStudentsSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($users as $user)
                            @php
                                $fullName = $user->name . ' ' . $user->l_name;
                                $displayName = strlen($fullName) > 15 ? $user->name : $fullName;
                            @endphp

                            <div class="swiper-slide">
                                <div class="card border shadow-sm rounded-4 p-4 text-center h-100"
                                    style="background-color: #ffffff;">
                                    <img src="{{ $user->getFirstMediaUrl('users') ?: asset('front/assets/media/user/default.jpg') }}"
                                        alt="student photo" class="rounded-circle mb-3"
                                        style="width: 100px; height: 100px; object-fit: cover; margin: 0 auto;">

                                    <h5 class="fw-bold mb-1" title="{{ $fullName }}">{{ $displayName }}</h5>
                                    <p class="text-muted small mb-2">
                                        {{ $user->level?->name ?? App\Helpers\TranslationHelper::translate('undefined') }}
                                    </p>

                                    <img src="{{ asset('front/assets/media/user/quotes.png') }}" alt="quote"
                                        style="width: 24px; opacity: 0.4;" />
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
        <!-- User END -->
    @endif
   <!-- Payment Methods START -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa, #eef1f7);">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">
            💳 {{ \App\Helpers\TranslationHelper::translate('Available Payment Methods on Platform') }}
        </h2>

        <div class="row g-4 justify-content-center">
            <!-- Vodafone Cash -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="{{ asset('front/assets/media/Vodafone-Cash.png') }}"
                        alt="Vodafone Cash" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0">{{ \App\Helpers\TranslationHelper::translate('Vodafone Cash') }}</h6>
                </div>
            </div>

            <!-- Etisalat Cash -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="{{ asset('front/assets/media/Etisalat_Misr-Logo.wine.png') }}"
                        alt="Etisalat Cash" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0">{{ \App\Helpers\TranslationHelper::translate('Etisalat Cash') }}</h6>
                </div>
            </div>

            <!-- Orange Cash -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="{{ asset('front/assets/media/om2.png') }}"
                        alt="Orange Cash" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0">{{ \App\Helpers\TranslationHelper::translate('Orange Cash') }}</h6>
                </div>
            </div>

            <!-- WE Pay -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="{{ asset('front/assets/media/we.png') }}"
                        alt="WE Pay" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0">{{ \App\Helpers\TranslationHelper::translate('WE Pay') }}</h6>
                </div>
            </div>

            <!-- Fawry -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="{{ asset('front/assets/media/fery.jpg') }}"
                        alt="Fawry" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0">{{ \App\Helpers\TranslationHelper::translate('Fawry') }}</h6>
                </div>
            </div>

            <!-- Visa / MasterCard -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png"
                        alt="Visa" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0">{{ \App\Helpers\TranslationHelper::translate('Visa / MasterCard') }}</h6>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Payment Methods END -->

<style>
    .payment-card {transition: transform .3s ease, box-shadow .3s ease;}
    .payment-card:hover {transform: translateY(-8px);box-shadow:0 8px 20px rgba(0,0,0,.15);}
</style>

    <!-- blogs -->
    @include('front.components.blogs', ['blogs' => $blogs])
    <!-- blogs-end -->
    <p class="light-gray heading fw-400 mb-48">
        <a href="{{ route('site.blogs') }}">
            <span class="color-primary fw-700">{{ \App\Helpers\TranslationHelper::translate('Explore all Blogs') }}
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                    fill="none">
                    <path
                        d="M2.92098 11.4097H19.4453L15.8531 7.81736C15.427 7.39131 15.427 6.70066 15.8531 6.27461C16.279 5.84857 16.9698 5.84857 17.3958 6.27461L22.8504 11.7291C23.2764 12.1552 23.2764 12.8458 22.8504 13.2719L17.3959 18.7264C17.1828 18.9395 16.9036 19.046 16.6245 19.046C16.3453 19.046 16.066 18.9395 15.8531 18.7264C15.4271 18.3004 15.4271 17.6097 15.8531 17.1837L19.4453 13.5915H2.92098C2.31849 13.5915 1.83006 13.103 1.83006 12.5005C1.83006 11.8981 2.31849 11.4097 2.92098 11.4097Z"
                        fill="var(--secondary-color)"></path>
                </svg>
            </span>
        </a>
    </p>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@push('js')
    <script>
        const wrapper = document.querySelector('.image-wrapper');
        const image = document.querySelector('.moving-image');

        wrapper.addEventListener('mousemove', (e) => {
            const {
                left,
                top,
                width,
                height
            } = wrapper.getBoundingClientRect();
            const x = (e.clientX - left) / width; 
            const y = (e.clientY - top) / height;

            const moveX = (x - 0.5) * 20; 
            const moveY = (y - 0.5) * 20;

            image.style.transform = `translate(${moveX}px, ${moveY}px)`;
        });

        wrapper.addEventListener('mouseleave', () => {
            image.style.transform = 'translate(0px, 0px)';
        });
    </script>
    <!-- Swiper CSS -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const topStudentsSwiper = new Swiper(".topStudentsSwiper", {
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1.2,
                    spaceBetween: 16
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 24
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 24
                },
            },
        });
    </script>
@endpush

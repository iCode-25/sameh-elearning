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
                                    <h1 class="dark-gray fw-700">{{ \App\Helpers\TranslationHelper::translate('Packages') }}
                                    </h1>
                                </div>
                                <div class="img-block">
                                    <img src="{{ asset('front/assets/media/user/star.png') }}" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="{{ setting('image_banner_page_packages_web', 'en') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TITLE BANNER END -->
    <!-- PRICING START -->
    <section class="course-section py-80">
        <div class="container-fluid">
            {{-- <div class="eyebrow heading">Lesson Packages</div>
            <h2 class="dark-gray fw-800 heading mb-48"><span class="color-sec"> Select a Plan&nbsp</span>That Suits You</h2> --}}
            <div>
                {{-- @include('front.components.filter', ['levels' => $levels]) --}}

                <div class="tab-content" id="pills-tabContent">
                    <div>
                        <div class="mb-48">
                            <div class="row row-gap-4">
                                @foreach ($packages as $package)
                                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                        <div
                                            class="package-card-pro bg-white br-20 shadow-sm h-100 d-flex flex-column transition">

                                            <!-- صورة الكورس -->
                                            <div class="package-img position-relative">
                                                <img src="{{ $package->getFirstMediaUrl('workshops_image') }}"
                                                    alt="" class="w-100 h-100 object-fit-cover br-20-top">
                                                <span class="price-tag bg-primary text-white fw-700">
                                                    {{ $package->price - ($package->price * $package->discount) / 100 }}
                                                    {{ \App\Helpers\TranslationHelper::translate('EGP') }}
                                                </span>
                                            </div>

                                            <!-- تفاصيل -->
                                            <div class="p-20 d-flex flex-column flex-grow-1">
                                                <h5 class="fw-700 mb-12 dark-gray">
                                                    {{ $package->getTranslation('name', app()->getLocale()) }}</h5>

                                                <div class="d-flex gap-2 small text-muted mb-12 flex-wrap">
                                                    <span>{{ $package->lessons()->count() }}
                                                        {{ \App\Helpers\TranslationHelper::translate('Lessons') }}</span>
                                                    <span>•</span>
                                                    <span>{{ $package->level?->getTranslation('name', app()->getLocale()) }}</span>
                                                </div>

                                                <p class="light-gray small mb-20 text-truncate-3 flex-grow-1">
                                                    {!! Str::limit($package->getTranslation('description', app()->getLocale()), 150, '...') !!}
                                                </p>

                                                <!-- زرار -->
                                                <div>
                                                    @if (Route::currentRouteName() === 'user.profile')
                                                        <a href="{{ route('user.site.package.details', $package->id) }}"
                                                            class="btn-enroll w-100">
                                                            {{ \App\Helpers\TranslationHelper::translate('Track your progress') }}
                                                        </a>
                                                    @else
                                                        <a href="{{ route('user.site.package.details', $package->id) }}"
                                                            class="btn-enroll w-100">
                                                            {{ \App\Helpers\TranslationHelper::translate('enroll') }}
                                                        </a>
                                                    @endif
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
        </div>
    </section>
    <!-- pricng END -->


    <style>
            .package-card-pro {
                border-radius: 20px;
                overflow: hidden;
                transition: all .35s ease;
                box-shadow: 0 4px 15px rgba(0, 0, 0, .06);
                padding: 15px;
            }

            .package-card-pro:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 30px rgba(0, 0, 0, .15);
            }

            .package-img {
                position: relative;
                height: 180px;
                border-radius: 20px 20px 0 0;
                overflow: hidden;
            }

            .package-img img {
                transition: transform .4s ease;
            }

            .package-card-pro:hover .package-img img {
                transform: scale(1.08);
            }

            .price-tag {
                position: absolute;
                top: 12px;
                right: 12px;
                padding: 6px 14px;
                border-radius: 30px;
                font-size: 14px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, .2);
            }

            .btn-enroll {
                display: inline-block;
                padding: 12px;
                border-radius: 12px;
                text-align: center;
                background: var(--primary-color);
                color: #fff;
                font-weight: 700;
                transition: all .3s ease;
            }

            .btn-enroll:hover {
                background: var(--secondary-color);
                color: #fff;
            }

            .text-truncate-3 {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </style>
@endsection

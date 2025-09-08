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
                                    <img src="{{ setting('image_banner_page_packages_web', 'en') }}"
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
    <!-- PRICING START -->
    <section class="course-section py-80">
        <div class="container-fluid">
            {{-- <div class="eyebrow heading">Lesson Packages</div>
            <h2 class="dark-gray fw-800 heading mb-48"><span class="color-sec"> Select a Plan&nbsp</span>That Suits You</h2> --}}
            <div>
                @include('front.components.filter', ['levels' => $levels])

                <div class="tab-content" id="pills-tabContent">
                    <div>
                        <div class="mb-48">
                            <div class="row row-gap-4">
                                @include('front.components.package', ['packages', $packages])
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- pricng END -->
@endsection

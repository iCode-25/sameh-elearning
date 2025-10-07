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
                                    <h1 class="dark-gray fw-700">
                                        {{ \App\Helpers\TranslationHelper::translate('Lesson Detail') }}</h1>
                                </div>
                                <div class="img-block">
                                    <img src="{{ asset('front/assets/media/user/star.png') }}" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="{{ setting('image_banner_page_lesson_details_web', 'en') }}"
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

    <!-- COURSE DETAIL START -->
    <section class="course-detail-section pt-80 pb-40">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="row row-gap-4">
                        <div class="col-xl-9">
                            <div class="course-detail-wrapper">
                                <div class="detail-image">
                                    <img src="{{ $lesson->getFirstMediaUrl('news') }}" alt=""
                                        class="mb-24 br-12 w-100">
                                </div>
                                <h4 class="black fw-700 mb-16">{{ $lesson->getTranslation('name', app()->getLocale()) }}
                                </h4>
                                <p class="mb-24">{!! $lesson->getTranslation('des', app()->getLocale()) !!}</p>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="course-sidebar">
                                <div class="pricing-block mb-24">
                                    <h4 class="dark-gray fw-800 mb-12">
                                        {{ $lesson->price . ' ' . \App\Helpers\TranslationHelper::translate('EGP') }}
                                    </h4>
                                    @auth('web')
                                        @if ($myVoucher || $lesson->price == 0)
                                            <a href="{{ route('user.show_lesson', $lesson->id) }}"
                                                class="cus-btn-3 d-flex mb-12">
                                                <span
                                                    class="btn-text">{{ \App\Helpers\TranslationHelper::translate('Show Lesson') }}</span>
                                                <span>{{ \App\Helpers\TranslationHelper::translate('Show Lesson') }}</span>
                                            </a>
                                        @else
                                            <form id="enrollForm" data-lesson-id="{{ $lesson->id }}"
                                                class="cus-btn-3 d-flex mb-12">
                                                @csrf
                                                <button type="submit" style="all: unset; cursor: pointer;">
                                                    <span
                                                        class="btn-text">{{ \App\Helpers\TranslationHelper::translate('enroll now') }}</span>
                                                    <span>{{ \App\Helpers\TranslationHelper::translate('enroll now') }}</span>
                                                </button>
                                            </form>

                                            @if ($errors->any())
                                                <div class="container-fluid">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-8">
                                                            <div class="alert alert-danger alert-dismissible fade show mb-4"
                                                                role="alert">
                                                                <strong>{{ __('Whoops!') }}</strong>
                                                              {{ \App\Helpers\TranslationHelper::translate('There were some problems with your input') }}
                                                                <ul class="mb-0 mt-2">
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <form id="couponForm" dir="ltr" class="mb-3">
                                                <div class="input-group">
                                                    <input type="text" name="coupon_code" id="coupon_code"
                                                        class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Buy now with the coupon') }}" aria-label="{{ \App\Helpers\TranslationHelper::translate('Coupon Code') }}"
                                                        aria-describedby="button-addon2" required>
                                                    <button class="btn btn-success" style="background: var(--secondary-color);" type="submit"
                                                        id="button-addon2">
                                                        <span class="btn-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor" class="bi bi-credit-card"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                                                                <path
                                                                    d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
                                    @endauth

                                    @guest('web')
                                        <a href="{{ route('user.login.form') }}" class="cus-btn-3 d-flex mb-12">
                                            <span
                                                class="btn-text">{{ \App\Helpers\TranslationHelper::translate('Login') }}</span>
                                            <span>{{ \App\Helpers\TranslationHelper::translate('Login') }}</span>
                                        </a>
                                    @endguest

                                    <div id="couponResult"></div>

                                    <div class="d-flex justify-content-between mb-16">
                                        <p class="dark-gray fw-600">
                                            {{ \App\Helpers\TranslationHelper::translate('level') }}
                                        </p>
                                        <p class="light-gray">
                                            {{-- {{ $lesson->level->getTranslation('name', app()->getLocale()) }} --}}
                                              {{ $lesson->level?->name ?? '' }}

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- COURSE DETAIL END -->
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#couponForm').on('submit', function(e) {
                e.preventDefault();
                var code = $('#coupon_code').val();
                var lessonId = {{ $lesson->id }};
                var token = '{{ csrf_token() }}';
                $('#couponResult').html('');
                $.ajax({
                    url: '{{ route('site.lesson.coupon.apply', ['lesson' => $lesson->id]) }}',
                    type: 'POST',
                    data: {
                        coupon_code: code,
                        _token: token
                    },
                    success: function(response) {
                        $('#couponResult').html('<div class="alert alert-success mt-2">' +
                            response.message + '</div>');
                        setTimeout(function() {
                            window.location.href =
                                "{{ route('user.show_lesson', ['lesson' => $lesson->id]) }}";
                        }, 3000);
                    },
                    error: function(xhr) {
                        let msg = 'Error applying coupon.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            msg = xhr.responseJSON.message;
                        } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                            msg = Object.values(xhr.responseJSON.errors).join('<br>');
                        }
                        $('#couponResult').html('<div class="alert alert-danger mt-2">' + msg +
                            '</div>');
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const enrollForm = document.getElementById('enrollForm');

            console.log(enrollForm);

            enrollForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const lessonId = enrollForm.dataset.lessonId;

                fetch(`/lessons/${lessonId}/enroll`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status && data.redirect_url) {
                            document.getElementById('spinner-overlay').style.display = 'none';
                            window.location.href = data.redirect_url;
                        } else {
                            alert(data.message || 'حدث خطأ ما، حاول مرة أخرى');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert('حدث خطأ في الاتصال بالسيرفر');
                    });
            });
        });
    </script>
@endpush

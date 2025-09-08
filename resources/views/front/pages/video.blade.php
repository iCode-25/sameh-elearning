@extends('front.layouts.app')
@section('content')
<main>
    <section class="video">
        <div class="row">
            <div class="col-md-9">
                <section class="hero-main-video" data-aos="fade-up" data-aos-duration="1000">
                    <div class="img-hero-main-video">
                        <div class="img-hero-main-video-tow"></div>
                    </div>
                    <div class="tiel-vides">{{ \App\Helpers\TranslationHelper::translate('Video Clips') }}</div>
                </section>

                <section class="hero-main-video-2" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1200">
                    <div class="container">
                        <div class="titel-videos">
                            {{ \App\Helpers\TranslationHelper::translate('About Video') }}
                        </div>
                        <!-- <ul class="features-list">
                                <li class="feature-item" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="1000">
                                    <p class="feature-text">
                                        {!! setting('about_video', app()->getLocale()) !!}
                                    </p>
                                    <div class="icon">
                                        <img src="{{ asset('front/assets/img/new-images/Untitled-4.png') }}"
                                            alt="Feature icon" class="feature-icon">
                                    </div>
                                </li>

                            </ul> -->

                        <div class="lliest-evint-video">
                            <p class="feature-text">{!! setting('about_video', app()->getLocale()) !!}</p>
                        </div>
                        <div class="img-lifet">
                            <img src="{{ asset('front/assets/img/ST/SVG/Videos/Asset 15.svg') }}" alt="">
                        </div>
                        <div class="img-lifet-2">
                            <img src="{{ asset('front/assets/img/ST/SVG/Videos/Asset 15.svg') }}" alt="">
                        </div>
                    </div>
                </section>


                <section class="hero-main-video-3" data-aos="fade-up" data-aos-duration="1600">
                    <div class="vieds-main">
                        <iframe id="youtubeVideo" src="https://www.youtube.com/embed/VXpBNF35e5M?enablejsapi=1"
                            title="YouTube video player" frameborder="0" allow="autoplay; encrypted-media"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div class="titele-detels-main">{{ \App\Helpers\TranslationHelper::translate('More Videos') }}</div>
                </section>
                <section class="moer-vedoes">
                    <div class="container">
                        <div class="main-pirnt-top">
                            <div class="videos-grid">
                            @foreach ($videos as $video)
    <div class="video-card-wrapper">
        <div class="video-card">
            <img class="img-videus-somell" src="{{ asset('front/assets/img/ST/SVG/Videos/Asset 15.svg') }}" alt="">

            <div class="card-main-vedis">
                <div class="card-vides">
                    <img src="{{ $video->getFirstMediaUrl('news') }}"
                         alt="Thumbnail"
                         class="img-fluid rounded shadow-lg video-thumbnail"
                         data-video="{{ $video->getFirstMediaUrl('newsnews_video') }}"
                         onclick="changeVideo('{{ $video->getFirstMediaUrl('newsnews_video') }}')">
                </div>
            </div>
        </div>

        <!-- العنوان خارج الكرت -->
        <div class="video-title-tow">
            <h5 class="video-title">{{ $video->name }}</h5>
        </div>
    </div>
@endforeach

                            </div>
                        </div>
                    </div>
                </section>







            </div>
            <div class="col-md-3">
                <div class="fixd">
                    <div class="titel-main-videous">
                        {{ \App\Helpers\TranslationHelper::translate('Video Clips') }}
                    </div>
                    <button onclick="window.location.href='{{ route('educational-content') }}'"
                        class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection


@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function changeVideo(videoUrl) {
        let videoFrame = document.getElementById('youtubeVideo');
        if (videoUrl) {
            videoFrame.src = videoUrl + "?autoplay=1";
            videoFrame.scrollIntoView({
                behavior: "smooth",
                block: "center"
            });
        }
    }
</script>
@endpush

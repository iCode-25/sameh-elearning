@extends('front.layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 text-center">
                <div class="text-hero-7">
                    <h2 data-aos="zoom-in" data-aos-duration="1000">
                        {{ setting('title', app()->getLocale()) }}
                    </h2>
                    <p data-aos="fade-up" data-aos-duration="1200">
                        {{ setting('title_tow', app()->getLocale()) }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section class="contact-us" style="margin-bottom: 40px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="text-contact" style="color:#fff !important;">
                    <h2 style="color: rgb(241, 196, 15);">
                           {{ \App\Helpers\TranslationHelper::translate('Couronne Royale News') }}
                    </h2>
                     {!! setting('description', app()->getLocale()) !!}
                   
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 20px;">
    <div class="img-contact">
        <img src="{{ setting('image_one_news', 'en') }}" alt=""
             style="height: 300px; width: auto; object-fit: cover; border-radius: 12px; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);">
    </div>
</div>

        </div>
    </div>
    
</section>

<!-- Videos Section -->
<section class="news-section" style="background-color: #9e445f; padding: 40px 0;">
    <div class="container">
        <div class="row">
            @foreach ($news as $index => $new)
                <div class="col-md-6 mb-4 d-flex justify-content-center">
                    <div style="background-color: #a42249; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 12px; width: 100%; max-width: 450px;">
                        <video width="100%" height="250" controls style="border-radius: 12px;">
                            <source src="{{ $new->getFirstMediaUrl('newsnews_video') }}" type="video/mp4">
                        </video>
                        <div class="rc-post-content" style="text-align: center; margin-top: 10px;">
                            <div class="rc-meta d-flex justify-content-center align-items-center mb-2" style="gap: 5px;">
                                <i class="fa-solid fa-calendar-days" style="color: #fff;"></i>
                                <span style="color: #fff;">{{ $new->created_at->format('Y-m-d') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

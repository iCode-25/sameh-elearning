@extends('front.layouts.app')
@section('content')
<main>
    <section class="jop-main">
        <div class="row">
            <div class="col-md-8">
                <!-- hero-main-stor-1 section -->
                 <div class="section-star">
                     <section class="competition-hero" data-aos="fade-up">
                         <div class="title">
                             {{ \App\Helpers\TranslationHelper::translate('competition') }}
                         </div>
                     </section>
                 </div>

                <!-- hero-main-stor-2 section -->
                <!-- <section class="hero-main-competition-2" data-aos="fade-up">
                    <div class="titel-com">
                        {{ \App\Helpers\TranslationHelper::translate('What about the competition') }}
                    </div>
                    <div class="container">
                        <div class="lliest-evint-comption">
                            <p class="feature-text">   {!! setting('competition', app()->getLocale()) !!}</p>

                        </div>
                    </div>
                </section> -->

                <section class="competition-info-sec" data-aos="fade-up">
                    <div class="title">
                        <p>
                        {{ \App\Helpers\TranslationHelper::translate('What about the competition') }}
                        </p>
                    </div>
                    <div class="info">
                        <div class="events-list">
                            <p>{!! setting('competition', app()->getLocale()) !!}</p>
                        </div>
                    </div>
                </section>



                <section class="hero-main-competition-3" data-aos="fade-up">
                    <div class="container">
                        <div class="titel-com-22">
                            <h3>{{ \App\Helpers\TranslationHelper::translate('Quiz for Kids') }}</h3>
                        </div>
                        <div class="main-cop">
                            @foreach ($tests as $test)
                            <a href="{{ route('details-competition-home', ['id' => $test->id]) }}">
                                <div class="main-stor-tow22" data-aos="zoom-in" data-aos-once="false">
                                </div>
                                <div class="main-titel-mai">
                                    <h3 class="card-title">{{ $test->name }}</h3>
                                </div>
                            </a>
                            @endforeach
                        </div>




                    </div>
                </section>

            </div>
            <div class="col-md-4">
                <div class="titel-row">
                    {{ \App\Helpers\TranslationHelper::translate('competition') }}
                </div>
                <button onclick="window.location.href='{{ route('site.home') }}'"
                    class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </section>
</main>
@endsection

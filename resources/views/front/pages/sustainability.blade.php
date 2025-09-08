@extends('front.layouts.app')
@section('content')

<main>
    <section class="sustainability-main">
        <div class="row">
            <div class="col-md-8">
                <section class="main-hero-sustainability">
                    <div class="section-mig-main">
                        <div class="title-main-sus">{{ \App\Helpers\TranslationHelper::translate('Sustainability Impact') }}
                        </div>
                    </div>
                    <section class="hero-main-sustainability" data-aos="fade-up" data-aos-once="false">
                        </section>
                </section>
                <section class="hero-main-sustainability-2" data-aos="fade-up" data-aos-once="false">
                    <div class="title-main-2">{{ \App\Helpers\TranslationHelper::translate('About Sustainability') }}
                    </div>
                    <div class="img-titel-2">
                        <img src="{{asset('front/assets/img/heroimg/New/Untitled-1.svg')}}" alt="" />
                    </div>

                    <div class="img-titel-3">
                        <img src="{{asset('front/assets/img/heroimg/New/Untitled-10.svg')}}" alt="" />
                    </div>
                </section>
                <section class="hero-main-sustainability-3" data-aos="fade-up" data-aos-once="false">
                    <div class="titel-hero-st">
                        {{ \App\Helpers\TranslationHelper::translate('Global Sustainability Goals') }}</div>
                </section>


                <section class="sustainability-container-box">

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/heroimg/New/Asset 10.svg') }}');">

                            <div class="title pt-4">{{ \App\Helpers\TranslationHelper::translate('No Poverty') }}</div>
                        </div>
                    </div>



                    <div class="row-box">
                        <div class="sust-box" style="
                    background-image: url('{{ asset('front/assets/img/heroimg/New/Asset 8.svg') }}');">
                            <div class="title pt-4">{{ \App\Helpers\TranslationHelper::translate('Zero Hunger') }}</div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box" style="
                    background-image: url('{{ asset('front/assets/img/heroimg/New/Asset 9.svg') }}');">
                            <div class="title pt-5 ms-5">
                                {{ \App\Helpers\TranslationHelper::translate('Good Health and Well-being') }}</div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 13.svg') }}')">
                            <div class="title pt-3 ps-1">
                                {{ \App\Helpers\TranslationHelper::translate('Quality Education') }}</div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 15.svg') }}')">
                            <div class="title pt-1">{{ \App\Helpers\TranslationHelper::translate('Gender Equality') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 14.svg') }}')">
                            <div class="title ms-5 pt-4">
                                {{ \App\Helpers\TranslationHelper::translate('Clean Water') }}<br />
                                {{ \App\Helpers\TranslationHelper::translate('And Personal Hygiene') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 21.svg') }}')">
                            <div class="title">
                                {{ \App\Helpers\TranslationHelper::translate('Clean Energy') }}<br />{{ \App\Helpers\TranslationHelper::translate('And Affordable') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 19.svg') }}')">
                            <div class="title">
                                {{ \App\Helpers\TranslationHelper::translate('Decent Work') }}<br />
                                {{ \App\Helpers\TranslationHelper::translate('and Economic Growth') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 20.svg') }}')">
                            <div class="title">
                                {{ \App\Helpers\TranslationHelper::translate('Industry and Innovation') }}<br />
                                {{ \App\Helpers\TranslationHelper::translate('And Infrastructure') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 25.svg') }}')">
                            <div class="title">{{ \App\Helpers\TranslationHelper::translate('Reducing Inequality') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 26.svg') }}')">
                            <div class="title" style="padding-top: 32px">
                                {{ \App\Helpers\TranslationHelper::translate('Sustainable Cities and Communities') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 24.svg') }}')">
                            <div class="title pe-3 pt-2">
                                {{ \App\Helpers\TranslationHelper::translate('Responsible Consumption and Production') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 31.svg') }}')">
                            <div class="title pt-3">{{ \App\Helpers\TranslationHelper::translate('Climate Action') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 30.svg') }}')">
                            <div class="title pt-3">{{ \App\Helpers\TranslationHelper::translate('Life Below Water') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 32.svg') }}')">
                            <div class="title pt-3">{{ \App\Helpers\TranslationHelper::translate('Life on Land') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 35.svg') }}')">
                            <div class="title me-5">
                                {{ \App\Helpers\TranslationHelper::translate('Peace and Justice') }}<br />{{ \App\Helpers\TranslationHelper::translate('Strong Institutions') }}
                            </div>
                        </div>
                    </div>

                    <div class="row-box">
                        <div class="sust-box"
                            style="background-image: url('{{ asset('front/assets/img/ST/Asset 36.svg') }}')">
                            <div class="title">
                                {{ \App\Helpers\TranslationHelper::translate('Building Partnerships') }}<br />{{ \App\Helpers\TranslationHelper::translate('To Achieve Goals') }}
                            </div>
                        </div>
                    </div>

                </section>
            </div>
            <div class="col-md-4">
                <div class="main-in-title">{{ \App\Helpers\TranslationHelper::translate('Sustainability Impact') }}
                </div>
                <button onclick="window.location.href='{{route('site.home')}}'"
                    class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </section>
</main>


@endsection
@push('js')


<script>
const sustBoxes = document.querySelectorAll(".sust-box");
let lastAnimationEndTime = 0;

document.addEventListener("scroll", (e) => {
    sustBoxes.forEach((s, idx) => {
        const rect = s.getBoundingClientRect();
        const threshold =
            window.innerHeight * (idx + 1 == sustBoxes.length ? 0.6 : 0.5);

        if (rect.top <= threshold && !s.classList.contains("still")) {
            s.classList.add("still");
        }
    });
});
</script>
@endpush

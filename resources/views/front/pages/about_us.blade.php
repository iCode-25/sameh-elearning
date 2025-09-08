@extends('front.layouts.app')

@section('content')

      <!-- breadcurmb-area-start -->
      <div
        class="tr-breadcurmb-area tr-breadcurmb-bg"
        style="background-image: url({{(setting('image_panarea_tow', 'en'))}}); background-size: cover; background-position: center; height: 200px;"
      >
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-8">
              <div class="tr-breadcurmb-content text-center z-index-3">
                <div class="tr-breadcurmb-title-box">
                  <h3 class="tr-breadcurmb-title">{{ \App\Helpers\TranslationHelper::translate('About Us') }}</h3>
                </div>
                <div class="tr-breadcurmb-list-wrap">
                  <div class="tr-breadcurmb-list">
                    <span><a href="{{route('site.home')}}"></a>{{ \App\Helpers\TranslationHelper::translate('Home') }}</span>
                    <span class="dvdr"
                      ><i class="fa-regular fa-angle-right"></i
                    ></span>
                    <i>{{ \App\Helpers\TranslationHelper::translate('About Us') }}</i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- breadcurmb-area-end -->

 <!-- about-area-start -->
      <div class="tr-about-2-area fix pt-120 pb-120">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">

              <div
                class="tr-about-2-thumb-wrap p-relative text-center text-lg-end mt-5 "
              >
                <div class="tr-about-2-thumb-1" style="margin-top: 20px" >
                  <img src="{{(setting('section_one_image_two', 'en'))}}" alt="" style="width: 90%; height: 95%; object-fit: cover" />
                </div>

                <div class="tr-about-2-thumb-2 d-none d-md-block" style="position: absolute; top: -10px; width: 60%;  right: 0; z-index: 2">
                  <img src="{{(setting('section_one_image_one', 'en'))}}" alt="" style="width: 100%; height: 100%; object-fit: cover" />
                </div>

                <div class="tr-about-client d-none d-md-block" style="margin-top: 50px;">
                  <img src="assets/img/avater.jpg" alt="" />
                  <div class="tr-about-client-content mt-25">
                    <h4>
                      <span
                        data-purecounter-duration="1"
                        data-purecounter-end="{{ setting('section_one_number', app()->getLocale()) }}"
                        class="purecounter"
                      >0</span
                      >+
                    </h4>
                    <span>{{ \App\Helpers\TranslationHelper::translate('Happy Clients') }}</span>
                  </div>
                </div>
              </div>

              {{-- <div class="tr-about-2-thumb-wrap p-relative text-center text-lg-end" style="position: relative; overflow: hidden;">
    <div class="tr-about-2-thumb-1" style="position: absolute; inset: 0; min-height: 50%; z-index: 1;">
        <img src="{{ asset(setting('section_one_image_one',app()->getLocale())) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;" />
    </div>

    <div class="tr-about-2-thumb-2 d-none d-md-block" style="position: absolute; top: 10%; right: 10%; width: 80%; z-index: 2;">
        <img src="{{ asset(setting('section_one_image_two',app()->getLocale())) }}" alt="" style="width: 100%; height: auto; object-fit: cover;" />
    </div>

    <div class="tr-about-client d-none d-md-block" style="position: absolute; bottom: 0; right: 10%; width: 30%; z-index: 3; text-align: center;">
        <img src="assets/img/avater.jpg" alt="" style="width: 100%; height: auto; border-radius: 50%;" />
        <div class="tr-about-client-content mt-25">
            <h4>
                <span data-purecounter-duration="1" data-purecounter-end="{{ setting('section_one_number', app()->getLocale()) }}" class="purecounter">0</span>+
            </h4>
            <span>Happy Clients</span>
        </div>
    </div>
</div> --}}

            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="tr-about-left">
                <div class="tr-about-title-box">
                  <span class="tr-section-subtitle mb-10">{{ \App\Helpers\TranslationHelper::translate('Why Choose Us') }}</span>
                  <h3 class="tr-section-title mb-20">
                   {{ setting('section_one_title_one', app()->getLocale()) }}
                  </h3>
                </div>
                <div class="tr-about-text">
                  <p>
                   {!! setting('section_one_description', app()->getLocale()) !!}
                  </p>
                </div>
                <div class="tr-about-list p-relative mb-45">
                  <ul>
                    <li>
                      <span
                        ><i class="fa-regular fa-angle-right"></i> {{ setting('section_one_title_two', app()->getLocale()) }}
                      </span
                      >
                    </li>
                    <li>
                      <span
                        ><i class="fa-regular fa-angle-right"></i>{{ setting('section_one_title_three', app()->getLocale()) }}
                        </span
                      >
                    </li>
                    <li>
                      <span
                        ><i class="fa-regular fa-angle-right"></i>{{ setting('section_one_title_four', app()->getLocale()) }}
                        </span
                      >
                    </li>
                  </ul>
                </div>
                <div class="tr-about-btn">
                    <a class="tr-btn-green" href="#">
                        {{ \App\Helpers\TranslationHelper::translate('Read More') }}

                        <i class="fa-sharp fa-regular fa-arrow-right-long arrow-en"></i>

                        <i class="fa-sharp fa-regular fa-arrow-left-long arrow-ar"></i>
                    </a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- about-area-end -->

      <!-- destination-area-start -->
      <div class="tr-destination-area tr-destination-style-2 pb-90">
        <div class="container">
          <div class="tr-destination-title-wrap mb-60" style="margin-top: 20px;">
            <div class="row align-items-end">
              <div class="col-xl-8 col-lg-7 col-md-8">
                <div class="tr-destination-title-box">
                  <h3 class="tr-section-title mb-25">
                   {{ setting('section_tow_title_one', app()->getLocale()) }}
                  </h3>
                  <p>
                    {!! setting('section_tow_description_one', app()->getLocale()) !!}
                  </p>
                </div>
              </div>
              {{-- <div class="col-xl-4 col-lg-5 col-md-4">
                <div class="tr-destination-btn text-md-end">
                    <a class="tr-btn" href="#">
                        {{ \App\Helpers\TranslationHelper::translate('View More') }}

                        <i class="fa-sharp fa-regular fa-arrow-right-long arrow-en"></i>

                        <i class="fa-sharp fa-regular fa-arrow-left-long arrow-ar"></i>
                    </a>

                </div>
              </div> --}}

            </div>
          </div>
          <div
            class="row row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center"
          >

            {{-- <div class="col">
              <div class="tr-destination-item mb-5">
                <div class="tr-destination-thumb fix">
                  <img src="assets/img/desti-1.jpg" alt="" />
                </div>
                <div class="tr-destination-content text-center">
                  <h4 class="tr-destination-title">
                    <a class="border-line-black" href="#">Louvre Museum</a>
                  </h4>
                  <span>Paris, France</span>
                </div>
              </div>
            </div> --}}

              @foreach ($cities as $city)
              {{-- @dd($city) --}}
      <div class="col">
        <div class="tr-destination-item mb-5">
          <div class="tr-destination-thumb fix"

            style="background-image : url({{$city->getFirstMediaUrl('cities')}})  ; background-size: cover; background-position: center; background-repeat: no-repeat; height: 120px; object-fit: cover;">
          </div>
          <div class="tr-destination-content text-center">
            <h4 class="tr-destination-title">
              <a class="border-line-black" href="#">{{ $city->name }}</a>
            </h4>
            <span>{{ optional($city->country)->name }}</span>
          </div>
        </div>
      </div>
      @endforeach



          </div>
        </div>
      </div>
      <!-- destination-area-end -->






      <!-- testimonial-area-start -->
      <div
        class="tr-testimonial-area tr-testimonial-inner-style tr-testimonial-bg tr-testimonial-mlr"
      >
        <div class="container">

          <div class="tr-testimonial-title-wrap mb-55">

            <div class="row align-items-end">
              <div class="col-xl-8 col-lg-6 col-md-6">
                <div class="tr-testimonial-title-box">
                  <h3 class="tr-section-title mb-25">{{ setting('section_three_title', app()->getLocale()) }}</h3>
                  <p class="mb-0">
                   {!! setting('section_three_description', app()->getLocale()) !!}
                  </p>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="tr-testimonial-btn text-md-end">
                    <a class="tr-btn" href="#">
                        {{ \App\Helpers\TranslationHelper::translate('View More') }}

                        <i class="fa-sharp fa-regular fa-arrow-right-long arrow-en"></i>

                        <i class="fa-sharp fa-regular fa-arrow-left-long arrow-ar"></i>
                    </a>

                </div>
              </div>
            </div>


          <div class="row align-items-center">

            <div class="col-xl-4 col-lg-4">
              <div class="tr-testimonial-left tr-slider-nav fix">


                @foreach ($about_us as $about)
                  <div class="tr-testimonial-author-wrap d-flex align-items-center mb-20">
                    <div class="tr-testimonial-author-thumb">
                      <img src="{{$about->getFirstMediaUrl('testimonials')}}" alt="{{$about->name}}" style="object-fit: cover; width: 80px; height: 80px; border-radius: 50%;" />
                    </div>
                    <div class="tr-testimonial-author-info">
                      <h5 class="tr-testimonial-author-title">{{app()->getLocale() == 'en' ? $about->name : $about->getTranslation('name', 'ar')}}</h5>
                      <span>{{app()->getLocale() == 'en' ? $about->name_job : $about->getTranslation('name_job', 'ar')}}</span>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>



            <div class="col-xl-8 col-lg-8">
              <div class="tr-testimonial-content-wrap tr-slider-for">
                @foreach ($about_us as $about)
                  <div class="tr-testimonial-content">
                    <span class="tr-testimonial-quote">
                      <svg
                        width="65"
                        height="47"
                        viewBox="0 0 65 47"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M65 18.8577H51.0714L60.3572 0.286392H46.4287L37.1429 18.8577V46.7148H65V18.8577ZM27.8571 46.7148V18.8577H13.9286L23.2143 0.286392H9.28577L0 18.8577V46.7148H27.8571Z"
                          fill="currentcolor"
                        />
                      </svg>
                    </span>
                    <p>
                      {!! app()->getLocale() == 'en' ? $about->description : $about->getTranslation('description', 'ar') !!}
                  </div>
                @endforeach
              </div>
            </div>

  </div>

 </div>
        </div>

      <!-- testimonial-area-end -->





      <!-- funfact-area-start -->
          <div class="tr-destination-area pt-85 pb-120">
        <div class="container">
          <div class="tr-funfact-inner-bg z-index-2">
            <div class="row">


              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="tr-funfact-item d-flex align-items-center">
                  <div class="tr-funfact-icon">
                    <span style="width: 65px; height: 65px; border-radius: 50%; overflow: hidden;">
                      <img src=" {{(setting('explorer_image', 'en'))}}" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                    </span>
                  </div>
                  <div class="tr-funfact-content">
                    <h4>
                      <span
                        data-purecounter-duration="1"
                        data-purecounter-end="{{ setting('explorer_number', app()->getLocale()) }}"
                        class="purecounter"
                        >0</span
                      >k+
                    </h4>
                    <span>{{ setting('Explorer_title', app()->getLocale()) }}</span>
                  </div>
                </div>
              </div>


              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="tr-funfact-item d-flex align-items-center">
                  <div class="tr-funfact-icon">
                     <span style="width: 65px; height: 65px; border-radius: 50%; overflow: hidden;">
                      <img src="{{(setting('Winning_award_image', 'en'))}}" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                    </span>
                  </div>
                  <div class="tr-funfact-content">
                    <h4>
                      <span
                        data-purecounter-duration="1"
                        data-purecounter-end="{{ setting('Winning_award_number', app()->getLocale()) }}"
                        class="purecounter"
                        >0</span
                      >+
                    </h4>
                    <span>{{ setting('Winning_award_title', app()->getLocale()) }}</span>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="tr-funfact-item d-flex align-items-center">
                  <div class="tr-funfact-icon">
                    <span style="width: 65px; height: 65px; border-radius: 50%; overflow: hidden;">
                      <img src="{{(setting('Complete_project_image', 'en'))}}" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                    </span>
                  </div>
                  <div class="tr-funfact-content">
                    <h4>
                      <span
                        data-purecounter-duration="1"
                        data-purecounter-end="{{ setting('Complete_project_number', app()->getLocale()) }}"
                        class="purecounter"
                        >0</span
                      >k+
                    </h4>
                    <span>{{ setting('Complete_project_title', app()->getLocale()) }}</span>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="tr-funfact-item d-flex align-items-center">
                  <div class="tr-funfact-icon">
                    <span style="width: 65px; height: 65px; border-radius: 50%; overflow: hidden;">
                      <img src="{{ asset(setting('Client_review_image',app()->getLocale())) }}" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                    </span>
                  </div>
                  <div class="tr-funfact-content">
                    <h4>
                      <span
                        data-purecounter-duration="1"
                        data-purecounter-end="{{ setting('Client_review_number', app()->getLocale()) }}"
                        class="purecounter"
                        >0</span
                      >+
                    </h4>
                    <span>{{ setting('Client_review_title', app()->getLocale()) }}</span>
                  </div>
                </div>
              </div>

            </div>
          </div>
      </div>
          </div>

      <!-- funfact-area-end -->

      <!-- destination-area-start -->
      <div class="tr-destination-area pt-85 pb-120">
        <div class="container">
          <div class="tr-destination-title-wrap mb-55">

            <div style="margin-top: 20px;"></div>
            <div class="row align-items-end">
              <div class="col-xl-8 col-lg-7 col-md-8">
                <div class="tr-destination-title-box">
                  <h3 class="tr-section-title mb-25">
                    {{ setting('section_four_title_one', app()->getLocale()) }}
                  </h3>
                  <p class="mb-0">
                    {!! setting('section_four_description_one', app()->getLocale()) !!}
                  </p>
                </div>
              </div>
              {{-- <div class="col-xl-4 col-lg-5 col-md-4">
                <div class="tr-destination-btn text-md-end">

                  <a class="tr-btn" href="{{route('photo_gallery')}}"
                    >Photo Gallery<i
                      class="fa-sharp fa-regular fa-arrow-right-long"
                    ></i
                  ></a>

                </div>
              </div> --}}
            </div>
          </div>

          <div class="row align-items-center">

            <div class="col-xl-6 col-lg-6">
              <div class="tr-destination-left">
                <ul class="nav nav-tab" id="myTab" role="tablist">

                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link active"
                      id="home-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#home"
                      type="button"
                      role="tab"
                      aria-controls="home"
                      aria-selected="true"
                    >
                      <span><i>{{ setting('Weekend_Wonders_nember', app()->getLocale()) }}</i>{{ setting('Weekend_Wonders_title', app()->getLocale()) }}</span>
                    </button>
                  </li>

                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="profile-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#profile"
                      type="button"
                      role="tab"
                      aria-controls="profile"
                      aria-selected="false"
                    >
                      <span><i>  {{ setting('Eco_Tours_nember', app()->getLocale()) }}</i>  {{ setting('Eco_Tours_title', app()->getLocale()) }}</span>
                    </button>
                  </li>

                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="contact-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#contact"
                      type="button"
                      role="tab"
                      aria-controls="contact"
                      aria-selected="false"
                    >
                      <span><i>  {{ setting('Beach_Tour_nember', app()->getLocale()) }}</i>  {{ setting('Beach_Tour_title', app()->getLocale()) }}</span>
                    </button>
                  </li>

                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="Tours-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#Tours"
                      type="button"
                      role="tab"
                      aria-controls="Tours"
                      aria-selected="false"
                    >
                      <span><i>  {{ setting('Heritage_Tours_nember', app()->getLocale()) }}</i>  {{ setting('Heritage_Tours_title', app()->getLocale()) }}</span>
                    </button>
                  </li>

                </ul>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6">
              <div class="tr-destination-right">
                <div class="tab-content" id="myTabContent">

                  <div
                    class="tab-pane fade show active"
                    id="home"
                    role="tabpanel"
                    aria-labelledby="home-tab"
                  >
                    <div class="tr-destination-thumb-main" style="height: 440px;">
                      <img src="{{(setting('Weekend_Wonders_image', 'en')) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>

                  </div>

                  <div
                    class="tab-pane fade"
                    id="profile"
                    role="tabpanel"
                    aria-labelledby="profile-tab"
                  >
                    <div class="tr-destination-thumb-main" style="height: 440px;">
                      <img src="{{(setting('Weekend_Wonders_image', 'en')) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                  </div>

                  <div
                    class="tab-pane fade"
                    id="contact"
                    role="tabpanel"
                    aria-labelledby="contact-tab"
                  >
                    <div class="tr-destination-thumb-main" style="height: 440px;">
                      <img src="{{(setting('Weekend_Wonders_image', 'en')) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                  </div>

                  <div
                    class="tab-pane fade"
                    id="Tours"
                    role="tabpanel"
                    aria-labelledby="Tours-tab"
                  >
                     <div class="tr-destination-thumb-main" style="height: 440px;">
                      <img src="{{(setting('Weekend_Wonders_image', 'en')) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                  </div>
{{-- {{asset('front/assets/img/desti-9.jpg')}} --}}
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <!-- destination-area-end -->

      <!-- subdcribe-area-start -->
      <div class="tr-subscribe-area z-index-2 subscribe-now" style="transform: translateY(40%)">
        <div class="container">
          <div class="tr-subscribe-bg p-relative fix">

            <div  class="tr-subscribe-img d-none d-lg-block">
                    <img src="{{(setting('Subscribe_image', 'en'))}}" alt=""/>
            </div>

            <div class="tr-subscribe-circle d-none d-lg-block">
              <span></span>
            </div>
            <div class="row">
              <div class="offset-xl-5 offset-lg-5 col-xl-7 col-lg-7">
                <div class="tr-subscribe-tittle-box mb-35">
                  <h3 class="tr-section-title mb-20 text-white">
                    {{ setting('section_five_title_one', app()->getLocale()) }} <br />
                  </h3>
                  <p>
                    {!! setting('section_five_description_one', app()->getLocale()) !!}
                  </p>
                </div>
                <div class="tr-subscribe-form">
                  <form action="#">
                    <div class="tr-subscribe-input p-relative">
                      <input type="text" placeholder="{{ \App\Helpers\TranslationHelper::translate('Your email...') }}" />
                      <button
                        class="tr-subscribe-button tr-btn-green light-green"
                        type="submit"
                      >
                        {{ \App\Helpers\TranslationHelper::translate('Subscribe ') }}
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- subdcribe-area-end -->
       @endsection

@extends('front.layouts.app')


@section('content')
    <!-- breadcrumb start -->
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
    <!-- breadcrumb end -->


    <!-- booking section start -->
    <section class="section-b-space bg-inner animated-section">
        <div class="animation-section">
            <div class="cross po-2"></div>
            <div class="round po-5"></div>
            <div class="round r-2 po-6"></div>
            <div class="round r-2 po-7"></div>
            <div class="round r-y po-8"></div>
            <div class="square po-10"></div>
            <div class="square s-2 po-12"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="guest-detail tour_details_boxed">
                        <h2>{{ \App\Helpers\TranslationHelper::translate('Traveller Information') }}</h2>
                        <form>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col first-name">
                                        <label>{{ \App\Helpers\TranslationHelper::translate('first name') }}</label>
                                        <input type="text" id="firstName" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('first name') }}">
                                    </div>
                                    <div class="col">
                                        <label>{{ \App\Helpers\TranslationHelper::translate('last name') }}</label>
                                        <input type="text" id="lastName" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Last name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ \App\Helpers\TranslationHelper::translate('Email address') }}</label>
                                <input type="email" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Email address') }}">
                                <small id="emailHelp" class="form-text text-muted">{{ \App\Helpers\TranslationHelper::translate('Booking confirmation will be sent to') }}
                                    {{ \App\Helpers\TranslationHelper::translate('this email ID.') }}</small>
                            </div>
                            <div class="form-group">
                                <label>{{ \App\Helpers\TranslationHelper::translate('contact info') }}</label>
                                <input id="mobile-no" type="tel" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ \App\Helpers\TranslationHelper::translate('special request') }}</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="e.g.. early check-in, airport transfer"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ \App\Helpers\TranslationHelper::translate('have a coupon code?') }}</label>
                                <div class="input-group promo-input">
                                    <input type="text" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Promo Code') }}">
                                    <div class="input-group-prepend">
                                        <div class="globalBtn">
                                            <ul>
                                                <li>
                                                    <a>
                                                        {{ \App\Helpers\TranslationHelper::translate('Apply') }}
                                                        <span></span><span></span><span></span><span></span>
    
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-btn">
                                <div class="globalBtn">
                                    <ul>
                                        <li>
                                            <a onclick="window.location.href='{{ route('user.checkout.index') }}';">
                                                {{ \App\Helpers\TranslationHelper::translate('pay now') }}
                                                <span></span><span></span><span></span><span></span>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 booking-order ">
                    <div class="summery-box tour_details_boxed">
                        <h2>{{ \App\Helpers\TranslationHelper::translate('booking summery') }}</h2>
                        <div class="hotel-section">
                            <div class="hotel-img">
                                <img src="{{ asset('end-user/assets/images/hotel/room/4.jpg') }}" class="img-fluid blur-up lazyload"
                                    alt="">
                            </div>
                            <div class="hotel-detail">
                                <h6 class="colored-main">{{ \App\Helpers\TranslationHelper::translate('sea view hotel') }}</h6>
                                <p>{{ \App\Helpers\TranslationHelper::translate('Mina Road, Bur Dubai, Dubai') }}</p>
                            </div>
                        </div>
                        <div class="summery-section">
                            <div class="box">
                                <div class="left">
                                    <div class="up">
                                        <h6>{{ \App\Helpers\TranslationHelper::translate('check in') }}</h6>
                                        <h5>{{ \App\Helpers\TranslationHelper::translate('tue, 18 sep 2019') }}</h5>
                                    </div>
                                    <div class="down">
                                        <h6>{{ \App\Helpers\TranslationHelper::translate('check in time') }}</h6>
                                        <h5>{{ \App\Helpers\TranslationHelper::translate('2.00 pm') }}</h5>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="up">
                                        <h6>{{ \App\Helpers\TranslationHelper::translate('check out') }}</h6>
                                        <h5>{{ \App\Helpers\TranslationHelper::translate('fri, 21 sep 2019') }}</h5>
                                    </div>
                                    <div class="down">
                                        <h6>{{ \App\Helpers\TranslationHelper::translate('check out time') }}</h6>
                                        <h5>{{ \App\Helpers\TranslationHelper::translate('12.00 pm') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="summery-section">
                            <h5 class="mb-0">{{ \App\Helpers\TranslationHelper::translate('2 guest, 1 deluxe room, 3 night') }}</h5>
                            <a href="hotel-single-1.html" class="edit-cls">{{ \App\Helpers\TranslationHelper::translate('edit') }}</a>
                        </div>
                        <div class="summery-section">
                            <div class="payment-details">
                                <h5>{{ \App\Helpers\TranslationHelper::translate('payment details') }}</h5>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>{{ \App\Helpers\TranslationHelper::translate('base price') }}</td>
                                            <td>{{ \App\Helpers\TranslationHelper::translate('$2510') }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ \App\Helpers\TranslationHelper::translate('promo discount') }}</td>
                                            <td>- {{ \App\Helpers\TranslationHelper::translate('$250') }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ \App\Helpers\TranslationHelper::translate('tax & service fees') }}</td>
                                            <td>+ {{ \App\Helpers\TranslationHelper::translate('$150') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="summery-section">
                            <div class="payment-details">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>{{ \App\Helpers\TranslationHelper::translate('Cpayable amountash') }}</td>
                                            <td class="amount colored-main">{{ \App\Helpers\TranslationHelper::translate('$2410') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- booking section end -->
@endsection

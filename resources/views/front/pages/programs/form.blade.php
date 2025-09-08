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
                  <h3 class="tr-breadcurmb-title">{{ \App\Helpers\TranslationHelper::translate('Apply Form') }}</h3>
                </div>
                <div class="tr-breadcurmb-list-wrap">
                  <div class="tr-breadcurmb-list">
                    <span><a href="{{route('site.home')}}"></a>{{ \App\Helpers\TranslationHelper::translate('Home') }}</span>
                    <span class="dvdr"
                      ><i class="fa-regular fa-angle-right"></i
                    ></span>
                    <i>{{ \App\Helpers\TranslationHelper::translate('Apply Form') }}</i>
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
                <div class="col-lg-7">
                    <div class="guest-detail tour_details_boxed">
                        <h2>{{ \App\Helpers\TranslationHelper::translate('Booking Information') }}</h2>
                        <form action="{{route('user.programme.booking.apply')}}" method="POST" id="apply_form">
                            @csrf
                            <input type="hidden" name="programme_id" id="programme_id" value="{{$data['programme']->id}}">
                            <input type="hidden" name="check_in" id="check_in" value="{{$data['check_in']}}">
                            <input type="hidden" name="adult_search_count" value="{{$data['adults']}}">
                            <input type="hidden" name="children_search_count" value="{{$data['children']}}">
                            <input type="hidden" name="infant_search_count" value="{{$data['infants']}}">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col first-name">
                                        <label>{{ \App\Helpers\TranslationHelper::translate('first name') }}  </label>
                                        <input type="text" id="firstName" name="f_name" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('first name') }} " >
                                    </div>
                                    <div class="col">
                                        <label>{{ \App\Helpers\TranslationHelper::translate('last name') }}  </label>
                                        <input type="text" id="lastName" name="l_name" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('last name') }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label> {{ \App\Helpers\TranslationHelper::translate('Email address') }} </label>
                                <input type="email" class="form-control" name="email" placeholder="{{ \App\Helpers\TranslationHelper::translate('Email address') }}" >
                                <small id="emailHelp" class="form-text text-muted">{{ \App\Helpers\TranslationHelper::translate('Booking confirmation will be sent to') }}
                                    {{ \App\Helpers\TranslationHelper::translate('this email ID.') }}</small>
                            </div>
                            <div class="form-group">
                                <label> {{ \App\Helpers\TranslationHelper::translate('contact phone') }} </label>
                                <input style="direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }} !important;"  id="mobile-no" type="tel" name="phone" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Phone Number') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ \App\Helpers\TranslationHelper::translate('special request') }}</label>
                                <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"
                                          placeholder="{{ \App\Helpers\TranslationHelper::translate('e.g.. early check-in, airport transfer') }}"></textarea>
                            </div>


                            <div class="form-group">
    <label for="promo-code">{{ \App\Helpers\TranslationHelper::translate('Have a coupon code?') }}</label>
    <div class="input-group promo-input">
        <!-- حقل الإدخال -->
        <input 
            type="text" 
            class="form-control" 
            id="promo-code" 
            placeholder="{{ \App\Helpers\TranslationHelper::translate('Promo Code') }}" 
            style="direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};"
        >
        <!-- الزر داخل الإدخال -->
        <div class="input-group-append">
            <button 
                id="apply_coupon" 
                class="btn tr-btn-green" 
                style="font-size: 14px; font-weight: bold; padding: 10px 20px; color: #fff; background-color: #e98f33; border: none;">
                {{ \App\Helpers\TranslationHelper::translate('Apply') }}
            </button>
        </div>
    </div>
</div>

<style>
    /* تغيير اللون عند المرور */
    #apply_coupon:hover {
        background-color: #e98f33 !important;
        color: #fff !important;
    }

    /* الاتجاه لليمين في حالة اللغة العربية */
    .rtl-direction {
        text-align: right !important;
        direction: rtl !important;
    }

    /* الاتجاه لليسار في حالة اللغة الإنجليزية */
    .ltr-direction {
        text-align: left !important;
        direction: ltr !important;
    }

    /* تحسين التنسيق */
    .tr-btn-green {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* تصغير المسافات بين حقل الإدخال والزر */
    .input-group .form-control {
        border-top-left-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }

    .input-group .btn {
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
    }
</style>



                            <div class="submit-btn" style="margin: 0 auto ; width: 17% !important" >
                                <div class="tr-btn-green">
                                    <ul>
                                        <li>
{{--                                            <a onclick="window.location.href='{{ route('user.checkout.index') }}';">--}}
                                            <a href="javascript:void(0);" onclick="submitBookingApplyForm()">
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
                <div class="col-lg-5 booking-order ">
                    <div class="summery-box tour_details_boxed">
                        <h2>{{ \App\Helpers\TranslationHelper::translate('booking summery') }}</h2>
                        <div class="programme-section">
                            <div class="programme-img">
                                <img src="{{ $data['programme']->getFirstMediaUrl('programmes') }}"
                                     class="img-fluid blur-up lazyload"
                                     alt="" style="width: 100px">
                            </div>
                            <div class="programme-detail mt-3">
                                <h6 class="colored-main">{{$data['programme']->name}}</h6>
                                <p> {{$data['programme']->getCompleteAddress()}}</p>
                            </div>
                        </div>
                        <div class="summery-section">
                            <div class="box">
                                <div class="left">
                                    <div class="up">
                                        <h6>{{ \App\Helpers\TranslationHelper::translate('check in') }}</h6>
                                        <h5>{{ \Carbon\Carbon::parse($data['check_in'])->locale(app()->getLocale())->isoFormat('dddd, D MMMM YYYY') }}</h5>

                                    </div>
                                </div>
                                <div class="right">

                                    <div class="up">
                                        <h6>{{ \App\Helpers\TranslationHelper::translate('check in time') }}</h6>
                                         <h5>{{ \Carbon\Carbon::parse($data['programme']->check_in)->locale(app()->getLocale())->format('h:i A') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="summery-section">
                            <h5 class="mb-0">{{$data['persons']}}  {{ \App\Helpers\TranslationHelper::translate('Persons') }} </h5>
{{--                            <a href="javascript:void(0);" class="edit-cls">edit</a>--}}
                        </div>
                        <div class="summery-section">
                            <div class="payment-details">
                                <h5>{{ \App\Helpers\TranslationHelper::translate('payment details') }}</h5>
                                <table>
                                    <tbody>

                                    <tr>
                                        <td>{{ \App\Helpers\TranslationHelper::translate('Persons') }}</td>
                                        <td>{{$data['persons']}} {{ \App\Helpers\TranslationHelper::translate('Persons') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ \App\Helpers\TranslationHelper::translate('base price') }} </td>
                                        <td> {{number_format($data['price_before_discount'], 1)}}{{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</td>
                                    </tr>
                                    @if($data['discount'] > 0)
                                        <tr>
                                            <td>{{ \App\Helpers\TranslationHelper::translate('Discount') }} <span class="text-danger bold">({{$data['discount']}})</span></td>
                                            <td>-  {{$data['discount_value']}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <td>Price After Discount /Night</td>--}}
{{--                                            <td>${{$data['price_after_discount']}}</td>--}}
{{--                                        </tr>--}}
                                    @endif

{{--                                    <tr>--}}
{{--                                        <td>promo discount</td>--}}
{{--                                        <td>- $250</td>--}}
{{--                                    </tr>--}}
                                    <tr>
                                        <td>{{ \App\Helpers\TranslationHelper::translate('tax & service fees') }} ({{$data['tax']}}%)</td>
                                        <td>+  {{$data['tax_value']}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</td>
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
                                        <td>{{ \App\Helpers\TranslationHelper::translate('payable amount') }}</td>
                                        <td class="amount colored-main"> {{$data['total']}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</td>
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

    <div class="tr-subscribe-area z-index-2">
        <div class="container">
          <div class="tr-subscribe-bg p-relative fix">
            <div class="tr-subscribe-img d-none d-lg-block">
              <img src="{{(setting('Subscribe_image', 'en'))}}" alt="" />
            </div>
            <div class="tr-subscribe-circle d-none d-lg-block">
              <span></span>
            </div>
            <div class="row">
              <div class="offset-xl-5 offset-lg-5 col-xl-7 col-lg-7">
                <div class="tr-subscribe-tittle-box mb-35">
                  <h3 class="tr-section-title mb-20 text-white">
                    <br />
                     {{ setting('section_five_title_one', app()->getLocale()) }}
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
                        {{ \App\Helpers\TranslationHelper::translate('Subscribe') }}
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
    <!-- booking section end -->
     @push('js')
    <script>
 function submitBookingApplyForm() {
        let booking_form = $("#apply_form");

        let room_id = $("#room_id").val();
        let check_in = $("#check_in").val();
        let check_out = $("#check_out").val();
        let adult_search_count = $("input[name='adult_search_count']").val();
        let children_search_count = $("input[name='children_search_count']").val();
        let infant_search_count = $("input[name='infant_search_count']").val();
        // let f_name = $("input[name='f_name']").val();
        // let l_name = $("input[name='l_name']").val();
        // let email = $("input[name='email']").val();
        // let phone = $("input[name='phone']").val();
        let coupon = $("input[name='coupon_coupon']").val();


        let data = [
            room_id,
            check_in,
            check_out,
            adult_search_count,
            children_search_count,
            infant_search_count,
            // f_name,
            // l_name,
            // email,
            // phone
        ];

        let inputsNotEmpty = true;

        $.each(data, function (index, value) {
            if (value === "" || (adult_search_count === '0' && children_search_count === '0' && infant_search_count === '0')) {
                inputsNotEmpty = false;
                return false; // exit the loop early
            }
        });

        if (inputsNotEmpty) {
            booking_form.submit();
        } else {
            Swal.fire({
                icon: 'error',
               text: "{{ \App\Helpers\TranslationHelper::translate('Please Complete the Personal Information') }}",
                dangerMode: true,
                confirmButtonColor: '#e98f33',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Fine',
                showCloseButton: true,
            });
        }
    }


    function chooseRoom(room) {
        let room_id = $(room).attr('data-id');
        // alert(room_id);
        let choose_room_btn = $('#room_' + room_id);
        choose_room_btn.click();
        clickPersons();
    }

    </script>
 @endpush

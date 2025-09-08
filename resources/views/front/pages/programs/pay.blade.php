@extends('front.layouts.app')


                <style>
                    .sticky-cls-top {
    min-height: 605px !important;
    position: sticky !important;
    top: 22px !important;
}
.summery_box {
    padding-bottom: 20px !important;
}
                </style>

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
                  <h3 class="tr-breadcurmb-title">{{ \App\Helpers\TranslationHelper::translate('Booking Checkout') }}</h3>
                </div>
                <div class="tr-breadcurmb-list-wrap">
                  <div class="tr-breadcurmb-list">
                    <span><a href="{{route('site.home')}}"></a>{{ \App\Helpers\TranslationHelper::translate('Home') }}</span>
                    <span class="dvdr"
                      ><i class="fa-regular fa-angle-right"></i
                    ></span>
                    <i>{{ \App\Helpers\TranslationHelper::translate('Booking Checkout') }}</i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- breadcrumb end -->


    <!-- booking section start -->
    <section class="small-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="review-section">
                        <div class=" tour_details_boxed ">
                            <div class="title-top">
                                <h2>{{ \App\Helpers\TranslationHelper::translate('payment option') }}</h2>
                            </div>
                            <div class="flight_detail payment-gateway">
                                <div class="accordion" id="accordionExample">
                                    <div class="card mb-3">
                                        <div class="card-header" id="h_one">
                                            <div class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#one" aria-expanded="true" aria-controls="one">
                                                <label for="r_one" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                                  <span class="custom-radio"></span>
                                                  <input type="radio" class="radio_animated ms-0" id="r_one" name="payment_method" value="cash" style="display: none;" />
                                                  {{ \App\Helpers\TranslationHelper::translate('Cash') }}
                                                </label>
                                              </div>

                                              <style>
                                                .custom-radio {
                                                  width: 16px;
                                                  height: 16px;
                                                  border: 2px solid rgb(180, 46, 46);
                                                  border-radius: 50%;
                                                  display: flex;
                                                  align-items: center;
                                                  justify-content: center;
                                                  position: relative;
                                                  cursor: pointer;
                                                }

                                                .custom-radio::after {
                                                  content: '';
                                                  width: 8px;
                                                  height: 8px;
                                                  background-color: rgb(180, 46, 46);
                                                  border-radius: 50%;
                                                  /* display: none; */
                                                }

                                                input[type="radio"]:checked + .custom-radio::after {
                                                  display: block;
                                                }
                                              </style>

                                        </div>
                                        <div id="one" class="collapse show" aria-labelledby="h_one"
                                             data-bs-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="{{route('user.programme.booking.pay', $booking->id)}}"
                                                      method="POST" id="pay_form">
                                                    @csrf
                                                    <input type="hidden" name="booking_id" id="booking_id"
                                                           value="{{$booking->id}}">
                                                    <input type="hidden" name="payment_method" id="payment_method"
                                                           value="cash">
                                                    <input type="hidden" name="rate" id="rate" value="">
                                                    <input type="hidden" name="comment" id="comment" value="">

                                                    {{--                                                    <div class="form-group">--}}
                                                    {{--                                                        <label for="name">name on card</label>--}}
                                                    {{--                                                        <input type="text" class="form-control" id="name">--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <div class="form-group">--}}
                                                    {{--                                                        <label for="number">card number</label>--}}
                                                    {{--                                                        <input type="text" class="form-control" id="number">--}}
                                                    {{--                                                        <img src="../assets/images/creditcards.png" alt=""--}}
                                                    {{--                                                            class="img-fluid blur-up lazyload">--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <div class="row">--}}
                                                    {{--                                                        <div class="form-group col-md-4">--}}
                                                    {{--                                                            <label for="month">month</label>--}}
                                                    {{--                                                            <select id="month" class="form-control">--}}
                                                    {{--                                                                <option selected>Month...</option>--}}
                                                    {{--                                                                <option>January</option>--}}
                                                    {{--                                                                <option>February</option>--}}
                                                    {{--                                                                <option>March</option>--}}
                                                    {{--                                                                <option>April</option>--}}
                                                    {{--                                                                <option>May</option>--}}
                                                    {{--                                                                <option>June</option>--}}
                                                    {{--                                                                <option>July</option>--}}
                                                    {{--                                                                <option>August</option>--}}
                                                    {{--                                                                <option>September</option>--}}
                                                    {{--                                                                <option>October</option>--}}
                                                    {{--                                                                <option>November</option>--}}
                                                    {{--                                                                <option>December</option>--}}
                                                    {{--                                                            </select>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                        <div class="form-group col-md-4">--}}
                                                    {{--                                                            <label for="year">year</label>--}}
                                                    {{--                                                            <select id="year" class="form-control">--}}
                                                    {{--                                                                <option selected>Year...</option>--}}
                                                    {{--                                                                <option>...</option>--}}
                                                    {{--                                                            </select>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                        <div class="form-group col-md-4">--}}
                                                    {{--                                                            <label for="cvv">cvv</label>--}}
                                                    {{--                                                            <input type="password" maxlength="4" class="form-control"--}}
                                                    {{--                                                                id="cvv">--}}
                                                    {{--                                                            <img src="../assets/images/cvv.png"--}}
                                                    {{--                                                                class="img-fluid blur-up lazyload" alt="">--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}
                                                    <div class="submit-btn" style="margin: 0 auto ; width: 17% !important">
                                                        <div class="tr-btn-green">
                                                            <ul>
                                                                <li>
                                                                    <a type="button" onclick="showRateModal()">
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
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 res-margin">
                    <div class="sticky-cls-top">
                        <div class="review-section">
                            <div class="tour_details_boxed">
                                <div class="title-top">
                                    <h2>{{ \App\Helpers\TranslationHelper::translate('booking summery') }}</h2>
                                </div>
                                <div class="flight_detail">
                                    <div class="summery_box">
                                        <div class="top-detail">

                                        </div>
                                        <table class="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>{{ \App\Helpers\TranslationHelper::translate('Persons') }}</td>
                                                <td>{{$booking['persons']}} {{ \App\Helpers\TranslationHelper::translate('Persons') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ \App\Helpers\TranslationHelper::translate('Base Price') }}</td>
                                                <td> {{$booking['price_before_discount']}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</td>
                                            </tr>
                                            @if($booking['discount'] > 0)
                                                <tr>
                                                    <td>{{ \App\Helpers\TranslationHelper::translate('Discount') }} <span class="text-danger bold">({{ ($booking['discount_type'] == 'fixed' ? (app()->getLocale() === 'ar' ? 'ريال' : 'SAR') : '') . $booking['discount'] . ($booking['discount_type'] == 'percent' ? '%' : '')}})</span>
                                                    </td>
                                                    <td>-  {{$booking['discount_value']}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</td>
                                                </tr>
                                            @endif
                                            {{--                                    <tr>--}}
                                            {{--                                        <td>promo discount</td>--}}
                                            {{--                                        <td>- $250</td>--}}
                                            {{--                                    </tr>--}}
                                            <tr>
                                                <td>{{ \App\Helpers\TranslationHelper::translate('Tax & Service Fees') }} <span class="text-danger bold">({{$booking['tax']}}%)</span>
                                                </td>
                                                <td>+ {{$booking['tax_value']}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                <div class="summery-section">
                            <div class="payment-details">
                                <table>
                                    <tbody>
                                 <tr>
    <td style="font-size: 25px; font-weight: bold;">
        {{ \App\Helpers\TranslationHelper::translate('grand total:') }}
    </td>
    <td class="amount colored-main" style="font-size: 25px; font-weight: bold;">
        {{$booking['total']}} {{app()->getLocale() === 'ar' ? 'ريال' : 'SAR'}}
    </td>
</tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                                </div>
                        </div>
                    </div>
                </div>

                <style>
                    .sticky-cls-top {
    min-height: 605px !important;
    position: sticky !important;
    top: 22px !important;
}

.summery_box {
    padding-bottom: 20px !important;
}
                </style>

            </div>
        </div>
    </section>
    <!-- booking section end -->
    <div class="modal fade payment-modal" id="rate_modal"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{--                <i class="fa-solid fa-square-check success"></i>--}}
                    <h3 class="mb-0">
                        {{\App\Helpers\TranslationHelper::translate('Leave Your Rate')}}
                    </h3>
                    <div class="rating mt-2">
                        <input type="radio" id="star5" name="rating" value="5" onchange="changeRate(this)">
                        <label for="star5"></label>
                        <input type="radio" id="star4" name="rating" value="4" onchange="changeRate(this)">
                        <label for="star4"></label>
                        <input type="radio" id="star3" name="rating" value="3" onchange="changeRate(this)">
                        <label for="star3"></label>
                        <input type="radio" id="star2" name="rating" value="2" onchange="changeRate(this)">
                        <label for="star2"></label>
                        <input type="radio" id="star1" name="rating" value="1" onchange="changeRate(this)">
                        <label for="star1"></label>
                    </div>
                    <div class="my-3 text-start">
                        <label for="rate_comment" class="form-label">{{\App\Helpers\TranslationHelper::translate('Comment')}}</label>
                        <textarea class="form-control" id="rate_comment" rows="3" onchange="changeComment(this)"></textarea>
                    </div>
                    <div class="my-3 text-center">

                       <div class="submit-btn" style="margin: 0 auto ; width: 17% !important">
                                                        <div class="tr-btn-green">
                                <ul>
                                    <li>
                                        <a type="button"  onclick="submitBookingPayForm()" >
                                            {{ \App\Helpers\TranslationHelper::translate('rate us') }}
                                            <span></span><span></span><span></span><span></span>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade payment-modal" id="failurModal" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <i class="fa-solid fa-square-xmark failur"></i>
                    <h3 class="mb-4">
                       {{ \App\Helpers\TranslationHelper::translate('Your Payment was Failur') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>


    <!-- book now section start -->
    {{-- <div class="book-panel">
        <h6 class="mb-0 text">grand total : <span>$2750</span></h6>
        <button type="button" class="btn bottom-btn theme-color">make payment</button>
    </div> --}}
    <!-- book now section end -->

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

  @push('js')

  <script>
    function showPaymentSuccessMessage() {
    Swal.fire({
        icon: 'success',
        text: "{{ \App\Helpers\TranslationHelper::translate('Payment successful! Thank you for choosing cash payment.') }}",
        confirmButtonColor: '#e98f33',
        confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate('Close') }}',
        showCloseButton: true,
        timer: 3000, // يتم إغلاق البوب أب تلقائيًا بعد 3 ثوانٍ
        timerProgressBar: true,
    }).then(() => {
        // تغيير حالة الراديو بوتون أو تحديث الحالة حسب الحاجة
        document.getElementById('r_one').checked = true; // وضع علامة على خيار "Cash"
        const targetDiv = document.querySelector('[data-bs-target="#one"]');
        if (targetDiv) {
            targetDiv.classList.add('active'); // يمكنك تخصيص التأثير أو التفاعل هنا
        }
    });
}

// ربط البوب-أب بزر الدفع:
document.getElementById('r_one').addEventListener('change', function () {
    if (this.checked) {
        showPaymentSuccessMessage();
    }
});

  </script>
    <script>

    // submitBookingPayForm
    function showRateModal() {
        let rate_modal = $('#rate_modal');
        rate_modal.modal('show');
    }


     function submitBookingPayForm() {
        let pay_form = $("#pay_form");

        let booking_id = $("#booking_id").val();
        let payment_method = $("#payment_method").val();
        let rate = $("#rate").val();

        let data = [
            booking_id,
            payment_method,
            rate
        ];

        let inputsNotEmpty = true;

        $.each(data, function (index, value) {
            if (value === "") {
                inputsNotEmpty = false;
                return false; // exit the loop early
            }
        });

 if (inputsNotEmpty) {
    pay_form.submit();
} else {
    Swal.fire({
        icon: 'error',
        text: "{{ \App\Helpers\TranslationHelper::translate('Some Error Happened .. Try Again Later') }}",
        dangerMode: true,
        confirmButtonColor: '#e98f33',
        confirmButtonText: "{{ \App\Helpers\TranslationHelper::translate('Fine') }}",
        showCloseButton: true,
    });
}

    }


      function changeComment(textarea) {
        let textarea_inp = $(textarea);
        let textarea_val = textarea_inp.val();
        let comment = $("#comment");
        comment.val(textarea_val);
    }

        function changeRate(radio) {
        let radio_inp = $(radio);
        let radio_val = radio_inp.val();
        let rate = $("#rate");
        rate.val(radio_val);
    }

    </script>
 @endpush


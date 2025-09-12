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
                                        {{ \App\Helpers\TranslationHelper::translate('Contact Us') }}</h1>
                                </div>
                                <div class="img-block">
                                    <img src="{{ asset('front/assets/media/user/star.png') }}" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="{{ $contact->getFirstMediaUrl('contacts_image_banner') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TITLE BANNER END -->
    <!-- about -->
    <section class="contact py-80">
        <div class="container">
            <h2 class="text-center fw-700 mb-5">
                {{ $contact->title }}?
                <span class="color-sec">{{ \App\Helpers\TranslationHelper::translate('Contact Us') }}!</span>
            </h2>

            <div class="row g-4">
                <!-- Phone & Email -->
                <div class="col-md-4">
                    <div class="contact-card text-center shadow-sm p-4 rounded-4">
                        <div class="icon-wrapper mx-auto mb-3">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h6 class="fw-600 mb-2">{{ \App\Helpers\TranslationHelper::translate('Call us') }}</h6>
                        <p class="mb-1">
                            <a href="tel:+12345678" class="fw-700 color-primary">{{ $contact->phone }}</a>
                        </p>
                        <p class="text-muted">{{ $contact->email }}</p>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="col-md-4">
                    <div class="contact-card text-center shadow-sm p-4 rounded-4">
                        <div class="icon-wrapper mx-auto mb-3">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <h6 class="fw-600 mb-2">{{ \App\Helpers\TranslationHelper::translate('whatsapp') }}</h6>
                        <p>
                            <a href="tel:{{ $contact->whatsapp }}"
                                class="fw-700 color-primary">{{ $contact->whatsapp }}</a>
                        </p>
                    </div>
                </div>

                <!-- Location -->
                <div class="col-md-4">
                    <div class="contact-card text-center shadow-sm p-4 rounded-4">
                        <div class="icon-wrapper mx-auto mb-3">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h6 class="fw-600 mb-2">{{ \App\Helpers\TranslationHelper::translate('Our Location') }}</h6>
                        <p class="text-muted">{{ $contact->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about end -->

    <!-- page -->
    <!-- Contact Form -->
    <section class="contact-sec py-80">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="img-contact">
                        <img src="{{ $contact->getFirstMediaUrl('contacts_meta_image') }}" alt="contact"
                            class="w-100 rounded-4 shadow">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form-box shadow-sm p-4 rounded-4">
                        <h4 class="mb-4">{{ \App\Helpers\TranslationHelper::translate('Contact Us Now') }}</h4>
                        <form method="post" id="contactForm" action="{{ route('create_message') }}" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="{{ \App\Helpers\TranslationHelper::translate('First Name') }}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <input type="phone" name="phone" id="phone" class="form-control"
                                        placeholder="{{ \App\Helpers\TranslationHelper::translate('Phone') }}" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" id="comments" rows="6" class="form-control"
                                        placeholder="{{ \App\Helpers\TranslationHelper::translate('Your Message') }}"></textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary px-4">
                                        {{ \App\Helpers\TranslationHelper::translate('submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);
            let url = form.attr('action');
            let data = form.serialize();

            // تنظيف رسائل قديمة
            $('#message').html('').removeClass('alert-success alert-danger');

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#message')
                        .addClass('alert alert-success')
                        .text("تم إرسال الرسالة بنجاح ✅")
                        .fadeIn();

                    form.trigger('reset'); // تفريغ الفورم
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors;
                    let message = "حدث خطأ أثناء الإرسال ❌";

                    if (errors) {
                        message = Object.values(errors).join(" - ");
                    }

                    $('#message')
                        .addClass('alert alert-danger')
                        .text(message)
                        .fadeIn();
                }
            });
        });
    </script>
@endpush

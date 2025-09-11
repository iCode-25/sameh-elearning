<?php $__env->startSection('content'); ?>
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
                                        <?php echo e(\App\Helpers\TranslationHelper::translate('Contact Us')); ?></h1>
                                </div>
                                <div class="img-block">
                                    <img src="<?php echo e(asset('front/assets/media/user/star.png')); ?>" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="<?php echo e($contact->getFirstMediaUrl('contacts_image_banner')); ?>" alt="">
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
        <div class="container-fluid">
            <h2 class="medium-black fw-700 heading mb-16"><?php echo e($contact->title); ?>?
                <span class="color-sec"><?php echo e(\App\Helpers\TranslationHelper::translate('Contact Us')); ?>!</span>
            </h2>

            <div class="contact-block">
                <div class="row row-gap-4 justify-content-between">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="d-flex gap-16 align-items-center">
                            <div class="contact-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
                                    fill="none">
                                    <g clip-path="url(#clip0_29656_2887)">
                                        <path
                                            d="M30.4616 5.51562H3.53711C1.9508 5.51562 0.666016 6.80838 0.666016 8.38672V25.6133C0.666016 27.201 1.96024 28.4844 3.53711 28.4844H30.4616C32.0346 28.4844 33.3327 27.2064 33.3327 25.6133V8.38672C33.3327 6.81119 32.053 5.51562 30.4616 5.51562ZM30.0595 7.42969C29.4729 8.01316 19.3781 18.0548 19.0295 18.4015C18.4872 18.9439 17.7663 19.2425 16.9993 19.2425C16.2324 19.2425 15.5115 18.9438 14.9674 18.3998C14.733 18.1666 4.74954 8.23576 3.93919 7.42969H30.0595ZM2.58008 25.2237V8.77751L10.8513 17.0051L2.58008 25.2237ZM3.9404 26.5703L12.2083 18.355L13.6157 19.755C14.5196 20.6588 15.7212 21.1565 16.9993 21.1565C18.2775 21.1565 19.4791 20.6588 20.3812 19.7568L21.7904 18.355L30.0583 26.5703H3.9404ZM31.4186 25.2237L23.1474 17.0051L31.4186 8.77751V25.2237Z"
                                            fill="#FAFAFA"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_29656_2887">
                                            <rect width="32.6667" height="32.6667" fill="white"
                                                transform="translate(0.666016 0.666748)"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                
                                <p class="fw-400 mb-6 light-gray">
                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Call us')); ?>: <span
                                        class="color-primary fw-700"><a
                                            href="tel:+12345678"><?php echo e($contact->phone); ?></a></span></p>

                                <p class="light-gray">
                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Email')); ?>:&nbsp;<?php echo e($contact->email); ?></p>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="d-flex gap-16 align-items-center">
                            <div class="contact-link">
                                <div class="contact-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="34"
                                        viewBox="0 0 448 512" fill="white">
                                        <path
                                            d="M380.9 97.1C339.3 55.5 283.2 32 224.1 32 100.3 32 0 132.3 0 256c0 45.3 11.9 89.1 34.5 127.5L0 480l100.3-33.6C139.1 470 181 480 224 480h.1c123.8 0 224.1-100.3 224.1-224 0-59.1-23.6-115.2-67.3-158.9zM224.1 438.6h-.1c-38.4 0-76.3-10.4-109.2-30.1l-7.8-4.6-59.6 20 20.3-58.3-5.1-8C38.4 317 27.5 287.1 27.5 256c0-108.1 88-196.1 196.1-196.1 52.3 0 101.4 20.4 138.3 57.3s57.3 86 57.3 138.3c0 108-88 196-196.1 196zm101.6-138.6c-5.6-2.8-33.1-16.3-38.2-18.1-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.4 18.1-17.7 21.8-3.3 3.7-6.5 4.2-12.1 1.4-33.1-16.5-54.8-29.5-76.5-66.7-5.8-10 5.8-9.3 16.5-30.9 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.3-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2s-9.7 1.4-14.8 6.9c-5.1 5.6-19.5 19-19.5 46.3s20 53.7 22.8 57.3c2.8 3.7 39.4 60.2 95.5 84.4 13.3 5.7 23.7 9.1 31.8 11.6 13.3 4.2 25.5 3.6 35.1 2.2 10.7-1.6 33.1-13.5 37.8-26.5 4.7-13 4.7-24.2 3.3-26.5-1.3-2.3-5-3.7-10.6-6.5z" />
                                    </svg>
                                </div>

                            </div>
                            <div>
                                <h6 class="dark-gray fw-600 mb-6">
                                    <?php echo e(\App\Helpers\TranslationHelper::translate('whatsapp')); ?></h6>
                                <span class="color-primary fw-700">
                                    <a href="tel:<?php echo e($contact->whatsapp); ?>"><?php echo e($contact->whatsapp); ?>

                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="d-flex gap-16 align-items-center">
                            <div class="contact-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="34" viewBox="0 0 33 34"
                                    fill="none">
                                    <g clip-path="url(#clip0_29656_2901)">
                                        <path
                                            d="M15.5377 32.9072C15.7152 33.1735 16.014 33.3334 16.334 33.3334C16.654 33.3334 16.9528 33.1735 17.1303 32.9072C19.3952 29.5099 22.7312 25.3143 25.0559 21.0471C26.9147 17.6352 27.8184 14.7253 27.8184 12.1511C27.8184 5.81864 22.6665 0.666748 16.334 0.666748C10.0015 0.666748 4.84961 5.81864 4.84961 12.1511C4.84961 14.7253 5.75324 17.6352 7.61205 21.0471C9.93502 25.311 13.2774 29.517 15.5377 32.9072ZM16.334 2.58081C21.6111 2.58081 25.9043 6.87405 25.9043 12.1511C25.9043 14.3972 25.077 17.0076 23.3751 20.1314C21.3713 23.8096 18.5118 27.5406 16.334 30.6773C14.1565 27.5411 11.2968 23.8097 9.29285 20.1314C7.59099 17.0076 6.76367 14.3972 6.76367 12.1511C6.76367 6.87405 11.0569 2.58081 16.334 2.58081Z"
                                            fill="#FAFAFA"></path>
                                        <path
                                            d="M16.334 17.8933C19.5002 17.8933 22.0762 15.3174 22.0762 12.1511C22.0762 8.98488 19.5002 6.40894 16.334 6.40894C13.1677 6.40894 10.5918 8.98488 10.5918 12.1511C10.5918 15.3174 13.1677 17.8933 16.334 17.8933ZM16.334 8.323C18.4448 8.323 20.1621 10.0403 20.1621 12.1511C20.1621 14.262 18.4448 15.9792 16.334 15.9792C14.2232 15.9792 12.5059 14.262 12.5059 12.1511C12.5059 10.0403 14.2232 8.323 16.334 8.323Z"
                                            fill="#FAFAFA"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_29656_2901">
                                            <rect width="32.6667" height="32.6667" fill="white"
                                                transform="translate(0 0.666748)"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <h6 class="dark-gray fw-600 mb-6">
                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Our Location')); ?></h6>
                                <p class="fw-400 mb-6 light-gray"><?php echo e($contact->address); ?></p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about end -->

    <!-- page -->
    <section class="contact-sec pb-80">
        <div class="container-fluid">
            <div class="row row-gap-4">
                <div class="col-xl-6">
                    <div class="img-contact">
                        <img src="<?php echo e($contact->getFirstMediaUrl('contacts_meta_image')); ?>" alt="contct">
                    </div>
                </div>
                <div class="col-xl-6">
                    <!-- Alert Message -->
                    <div id="message" class="alert-msg"></div>
                    <div class="contact-block">
                        <h4 class="mb-2"> <?php echo e(\App\Helpers\TranslationHelper::translate('Contact Us Now')); ?></h4>
                        <form method="post" class="contact-form" id="contactForm" action="<?php echo e(route('create_message')); ?>"
                            novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-block mb-24">
                                        <input type="text" name="name" id="name" class="form-control"
                                            required=""
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('First Name')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-24">
                                        <input type="phone" name="phone" id="phone" class="form-control"
                                            required=""
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Phone')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-block mb-32">
                                        <textarea name="message" rows="12" cols="8" id="comments" class="form-control form-control-2"
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Your Message')); ?>"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" class="cus-btn-3">
                                        <span><?php echo e(\App\Helpers\TranslationHelper::translate('submit')); ?></span>
                                        <span><?php echo e(\App\Helpers\TranslationHelper::translate('submit')); ?></span>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
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
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sameh-elearning\resources\views/front/pages/message.blade.php ENDPATH**/ ?>
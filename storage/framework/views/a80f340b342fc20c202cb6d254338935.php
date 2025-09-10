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
                                    <h1 class="dark-gray fw-700"><?php echo e(\App\Helpers\TranslationHelper::translate('About Us')); ?>

                                    </h1>
                                </div>
                                <div class="img-block">
                                    <img src="<?php echo e(asset('front/assets/media/user/star.png')); ?>" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="<?php echo e(setting('image_banner_page_about', 'en')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TITLE BANNER END -->

    <!-- online learing -->
    <section class="online py-80">
        <div class="container-fluid">
            <div class="row row-gap-4 justify-content-center">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="row row-gap-3">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="img-online">
                                        <img src="<?php echo e(asset('front/assets/media/course/course-1.png')); ?>" alt="course">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="img-online">
                                        <img src="<?php echo e(asset('front/assets/media/course/course-2.png')); ?>" alt="course">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="img-online">
                                        <img src="<?php echo e(asset('front/assets/media/course/course-3.png')); ?>" alt="course">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="img-onlines">
                                        <img src="<?php echo e(asset('front/assets/media/course/tutor-1.png')); ?>" alt="course">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <div class="eyebrow-2"><?php echo e(\App\Helpers\TranslationHelper::translate('Simply Chemistry')); ?>

                            </div>
                            <h2 class="dark-gray fw-800 mb-16"> <?php echo e(setting('title_about_us', app()->getLocale())); ?>

                                
                            </h2>

                            <p class="light-gray mb-32">
                                <?php echo setting('description_about_us', app()->getLocale()); ?>

                            </p>

                            <div class="d-flex gap-24 align-items-center mb-32  images-block">
                                <img src="<?php echo e(asset('front/assets/media/user/image2.png')); ?>" alt="user" class="img-1">
                                <img src="<?php echo e(asset('front/assets/media/user/test-user-2.png')); ?>" alt="user"
                                    class="img-2">
                                <img src="<?php echo e(asset('front/assets/media/user/test-user-3.png')); ?>" alt="user"
                                    class="img-3">
                            </div>
                            <div class="mb-32">
                                <div class="row row-gap-3">
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="d-flex gap-12 align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.9999 0C5.38321 0 0 5.38309 0 11.9999C0 18.6168 5.38321 24 11.9999 24C18.6167 24 23.9999 18.6168 23.9999 11.9999C23.9999 5.38309 18.6168 0 11.9999 0ZM18.8905 9.97305L11.3516 17.512C11.031 17.8326 10.6049 18.009 10.1516 18.009C9.69832 18.009 9.27221 17.8326 8.95165 17.512L5.10936 13.6697C4.78881 13.3492 4.61225 12.923 4.61225 12.4698C4.61225 12.0163 4.78881 11.5902 5.10936 11.2697C5.42979 10.9491 5.85591 10.7726 6.30932 10.7726C6.7626 10.7726 7.18884 10.9491 7.50927 11.2698L10.1515 13.9119L16.4904 7.57301C16.8109 7.25245 17.237 7.07602 17.6903 7.07602C18.1436 7.07602 18.5697 7.25245 18.8903 7.57301C19.5522 8.23491 19.5522 9.3114 18.8905 9.97305Z"
                                                    fill="var(--secondary-color)"></path>
                                            </svg>
                                            <h6 class="color-primary fw-700">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Chemistry Lessons')); ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="d-flex gap-12 align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.9999 0C5.38321 0 0 5.38309 0 11.9999C0 18.6168 5.38321 24 11.9999 24C18.6167 24 23.9999 18.6168 23.9999 11.9999C23.9999 5.38309 18.6168 0 11.9999 0ZM18.8905 9.97305L11.3516 17.512C11.031 17.8326 10.6049 18.009 10.1516 18.009C9.69832 18.009 9.27221 17.8326 8.95165 17.512L5.10936 13.6697C4.78881 13.3492 4.61225 12.923 4.61225 12.4698C4.61225 12.0163 4.78881 11.5902 5.10936 11.2697C5.42979 10.9491 5.85591 10.7726 6.30932 10.7726C6.7626 10.7726 7.18884 10.9491 7.50927 11.2698L10.1515 13.9119L16.4904 7.57301C16.8109 7.25245 17.237 7.07602 17.6903 7.07602C18.1436 7.07602 18.5697 7.25245 18.8903 7.57301C19.5522 8.23491 19.5522 9.3114 18.8905 9.97305Z"
                                                    fill="var(--secondary-color)"></path>
                                            </svg>
                                            <h6 class="color-primary fw-700">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Monthly Packages')); ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="d-flex gap-12 align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.9999 0C5.38321 0 0 5.38309 0 11.9999C0 18.6168 5.38321 24 11.9999 24C18.6167 24 23.9999 18.6168 23.9999 11.9999C23.9999 5.38309 18.6168 0 11.9999 0ZM18.8905 9.97305L11.3516 17.512C11.031 17.8326 10.6049 18.009 10.1516 18.009C9.69832 18.009 9.27221 17.8326 8.95165 17.512L5.10936 13.6697C4.78881 13.3492 4.61225 12.923 4.61225 12.4698C4.61225 12.0163 4.78881 11.5902 5.10936 11.2697C5.42979 10.9491 5.85591 10.7726 6.30932 10.7726C6.7626 10.7726 7.18884 10.9491 7.50927 11.2698L10.1515 13.9119L16.4904 7.57301C16.8109 7.25245 17.237 7.07602 17.6903 7.07602C18.1436 7.07602 18.5697 7.25245 18.8903 7.57301C19.5522 8.23491 19.5522 9.3114 18.8905 9.97305Z"
                                                    fill="var(--secondary-color)"></path>
                                            </svg>
                                            <h6 class="color-primary fw-700">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Quizzes')); ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="d-flex gap-12 align-items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.9999 0C5.38321 0 0 5.38309 0 11.9999C0 18.6168 5.38321 24 11.9999 24C18.6167 24 23.9999 18.6168 23.9999 11.9999C23.9999 5.38309 18.6168 0 11.9999 0ZM18.8905 9.97305L11.3516 17.512C11.031 17.8326 10.6049 18.009 10.1516 18.009C9.69832 18.009 9.27221 17.8326 8.95165 17.512L5.10936 13.6697C4.78881 13.3492 4.61225 12.923 4.61225 12.4698C4.61225 12.0163 4.78881 11.5902 5.10936 11.2697C5.42979 10.9491 5.85591 10.7726 6.30932 10.7726C6.7626 10.7726 7.18884 10.9491 7.50927 11.2698L10.1515 13.9119L16.4904 7.57301C16.8109 7.25245 17.237 7.07602 17.6903 7.07602C18.1436 7.07602 18.5697 7.25245 18.8903 7.57301C19.5522 8.23491 19.5522 9.3114 18.8905 9.97305Z"
                                                    fill="var(--secondary-color)"></path>
                                            </svg>
                                            <h6 class="color-primary fw-700">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Educational Articles')); ?>

                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="video-section"
        style="background-image: url('<?php echo e(asset(setting('image_section_video_about', 'en'))); ?>'); background-size: cover; background-position: center;">
        <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal" class="play-btn">
            <img src="<?php echo e(asset('front/assets/media/user/video.png')); ?>" alt="video" class="btns">
        </a>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- modal-lg لعرض أكبر شوية -->
            <div class="modal-content bg-dark">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <video width="100%" controls autoplay>
                        <source src="<?php echo e(setting('video_page_about', 'en')); ?>" type="video/mp4">
                        <?php echo e(\App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.')); ?>

                    </video>
                </div>
            </div>
        </div>
    </div>


    <!-- video-end -->


    <!-- SERVICE START -->
    <div class="service py-80">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="img-service">
                    <img src="<?php echo e(asset('front/assets/media/user/bulb.png')); ?>" alt="bulb">
                </div>
                <div class="col-xl-10 ">
                    <div class="row align-items-center">
                        <div class="col-xl-5">
                            <div class="eyebrow"><?php echo e(\App\Helpers\TranslationHelper::translate('Services')); ?></div>
                            <h2 class="dark-gray fw-800 mb-16">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('From Confusion to Excellence')); ?>

                                <span class="color-sec ">
                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Your Excellence in Chemistry')); ?></span>
                            </h2>

                            <a href="<?php echo e(route('site.lessons')); ?>" class="cus-btn-3">
                                <span class="btn-text"><?php echo e(\App\Helpers\TranslationHelper::translate('Lessons')); ?></span>
                                <span><?php echo e(\App\Helpers\TranslationHelper::translate('Lessons')); ?></span>
                            </a>
                        </div>

                        <div class="col-xl-7">
                            <div class="row row-gap-3">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="service-wrapper-1">
                                        <div class="service-card mb-24">
                                            <img src="<?php echo e(asset('front/assets/media/user/banner-user-4.png')); ?>"
                                                alt="user-1" class="mb-32">
                                            <h5 class="dark-gray fw-800 mb-24">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Monthly Packages')); ?></h5>
                                            <p class="light-gray">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Subscribe to our monthly plans and get comprehensive, simplified chemistry lessons, continuous practice, and regular quizzes to help you steadily progress toward excellence')); ?>


                                            </p>
                                        </div>
                                        <div class="service-card">
                                            <img src="<?php echo e(asset('front/assets/media/user/banner-user-2.png')); ?>"
                                                alt="user-1" class="mb-32">
                                            <h5 class="dark-gray fw-800 mb-24">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Chemistry Lessons')); ?></h5>
                                            <p class="light-gray">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Chemistry lessons are designed to simplify complex concepts through clear explanations and practical exercises')); ?>


                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="service-wrapper-2">
                                        <div class="service-card mb-24">
                                            <img src="<?php echo e(asset('front/assets/media/user/banner-user-3.png')); ?>"
                                                alt="user-1" class="mb-32">
                                            <h5 class="dark-gray fw-800 mb-24">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Educational Articles')); ?>

                                            </h5>
                                            <p class="light-gray">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Educational articles that help you gain a deeper understanding of chemistry concepts, offering effective study tips and strategies for academic excellence')); ?>


                                            </p>
                                        </div>
                                        <div class="service-card">
                                            <img src="<?php echo e(asset('front/assets/media/user/banner-user-1.png')); ?>"
                                                alt="user-1" class="mb-32">
                                            <h5 class="dark-gray fw-800 mb-24">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Quizzes')); ?></h5>
                                            <p class="light-gray">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Our chemistry tests are designed to assess your true understanding of the curriculum and strengthen your skills through comprehensive questions that simulate final exam patterns, helping you prepare with confidence')); ?>


                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SERVICE END -->

    <!-- Payment Methods START -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa, #eef1f7);">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">
            💳 <?php echo e(\App\Helpers\TranslationHelper::translate('Available Payment Methods on Platform')); ?>

        </h2>

        <div class="row g-4 justify-content-center">
            <!-- Vodafone Cash -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="<?php echo e(asset('front/assets/media/Vodafone-Cash.png')); ?>"
                        alt="Vodafone Cash" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('Vodafone Cash')); ?></h6>
                </div>
            </div>

            <!-- Etisalat Cash -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="<?php echo e(asset('front/assets/media/Etisalat_Misr-Logo.wine.png')); ?>"
                        alt="Etisalat Cash" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('Etisalat Cash')); ?></h6>
                </div>
            </div>

            <!-- Orange Cash -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="<?php echo e(asset('front/assets/media/om2.png')); ?>"
                        alt="Orange Cash" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('Orange Cash')); ?></h6>
                </div>
            </div>

            <!-- WE Pay -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="<?php echo e(asset('front/assets/media/we.png')); ?>"
                        alt="WE Pay" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('WE Pay')); ?></h6>
                </div>
            </div>

            <!-- Fawry -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="<?php echo e(asset('front/assets/media/fery.jpg')); ?>"
                        alt="Fawry" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('Fawry')); ?></h6>
                </div>
            </div>

            <!-- Visa / MasterCard -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png"
                        alt="Visa" class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                    <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('Visa / MasterCard')); ?></h6>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Payment Methods END -->

<style>
    .payment-card {transition: transform .3s ease, box-shadow .3s ease;}
    .payment-card:hover {transform: translateY(-8px);box-shadow:0 8px 20px rgba(0,0,0,.15);}
</style>


    <!-- blogs -->
    <?php echo $__env->make('front.components.blogs', ['blogs' => $blogs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- blogs-end -->
    <p class="light-gray heading fw-400 mb-48">
        <a href="<?php echo e(route('site.blogs')); ?>">
            <span class="color-primary fw-700"><?php echo e(\App\Helpers\TranslationHelper::translate('Explore all Blogs')); ?><svg
                    xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                    fill="none">
                    <path
                        d="M2.92098 11.4097H19.4453L15.8531 7.81736C15.427 7.39131 15.427 6.70066 15.8531 6.27461C16.279 5.84857 16.9698 5.84857 17.3958 6.27461L22.8504 11.7291C23.2764 12.1552 23.2764 12.8458 22.8504 13.2719L17.3959 18.7264C17.1828 18.9395 16.9036 19.046 16.6245 19.046C16.3453 19.046 16.066 18.9395 15.8531 18.7264C15.4271 18.3004 15.4271 17.6097 15.8531 17.1837L19.4453 13.5915H2.92098C2.31849 13.5915 1.83006 13.103 1.83006 12.5005C1.83006 11.8981 2.31849 11.4097 2.92098 11.4097Z"
                        fill="var(--secondary-color)"></path>
                </svg>
            </span>
        </a>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sameh-elearning\resources\views/front/pages/about.blade.php ENDPATH**/ ?>
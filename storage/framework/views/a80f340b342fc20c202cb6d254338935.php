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

    <section class="about-modern py-100">
        <div class="container">
            <div class="row align-items-center g-5">

                <!-- Images Grid -->
                <div class="col-lg-6">
                    <div class="image-masonry">
                        <div class="img-box big">
                            <img width="100%" src="<?php echo e(asset('front/assets/media/course/course-1.png')); ?>" alt="course">
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-6">
                    <div class="about-content">
                        <span class="badge-text">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Simply Chemistry')); ?>

                        </span>
                        <h2 class="section-title">
                            <?php echo e(setting('title_about_us', app()->getLocale())); ?>

                        </h2>
                        <p class="section-desc">
                            <?php echo \Illuminate\Support\Str::limit(setting('description_about_us', app()->getLocale()), 400); ?>

                        </p>

                        <hr class="my-2">

                        <!-- Features -->
                        <div class="features row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="feature-box">
                                    <div class="icon-circle"><i class="fas fa-flask"></i></div>
                                    <h6><?php echo e(\App\Helpers\TranslationHelper::translate('Chemistry Lessons')); ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-box">
                                    <div class="icon-circle"><i class="fas fa-calendar-alt"></i></div>
                                    <h6><?php echo e(\App\Helpers\TranslationHelper::translate('Monthly Packages')); ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-box">
                                    <div class="icon-circle"><i class="fas fa-question-circle"></i></div>
                                    <h6><?php echo e(\App\Helpers\TranslationHelper::translate('Quizzes')); ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-box">
                                    <div class="icon-circle"><i class="fas fa-book-open"></i></div>
                                    <h6><?php echo e(\App\Helpers\TranslationHelper::translate('Educational Articles')); ?></h6>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <a href="<?php echo e(route('site.about')); ?>" class="btn-gradient">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('More about us')); ?>

                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .about-modern {
            background: #f9fbff;
            position: relative;
        }

        .section-title {
            font-size: 36px;
            font-weight: 800;
            margin: 20px 0;
            color: #1a1a1a;
        }

        .section-desc {
            color: #555;
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .badge-text {
            display: inline-block;
            padding: 6px 14px;
            background: #e9f0ff;
            color: #3056d3;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .avatars img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid #fff;
            margin-left: -10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Image Masonry */
        .image-masonry {
            display: grid;
            /* grid-template-columns: repeat(2, 1fr); */
            gap: 15px;
        }

        .image-masonry .img-box {
            overflow: hidden;
            border-radius: 16px;
        }

        .image-masonry img {
            width: 100%;
            height: auto;
            display: block;
            transition: 0.4s;
        }

        .image-masonry img:hover {
            transform: scale(1.05);
        }

        .image-masonry .big {
            grid-row: span 2;
        }

        /* Features */
        .feature-box {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        .icon-circle {
            width: 40px;
            height: 40px;
            background: #4a6cf7;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        /* Button */
        .btn-gradient {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 30px;
            background: linear-gradient(45deg, #4a6cf7, #7d9cff);
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-gradient:hover {
            opacity: 0.85;
        }
    </style>
    <!-- online-end -->

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
    <!-- features START -->
    <section class="features py-80" dir="ltr">
        <div class="container">
            <div class="text-center mb-5">
                <div class="eyebrow heading">
                    <?php echo e(\App\Helpers\TranslationHelper::translate('Services')); ?>

                </div>
                <h2 class="dark-gray fw-800 heading mb-3">
                    <?php echo e(\App\Helpers\TranslationHelper::translate('Exclusive')); ?>

                    <span class="color-sec"><?php echo e(\App\Helpers\TranslationHelper::translate('Services')); ?></span>
                </h2>
                <p class="light-gray">
                    <?php echo e(\App\Helpers\TranslationHelper::translate('Discover our modern and interactive services designed to help you achieve academic excellence')); ?>

                </p>
            </div>

            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center shadow-sm border-0 p-4 hover-card">
                        <div class="icon-box mb-3">
                            <img src="<?php echo e(asset('front/assets/media/user/banner-user-1.png')); ?>" alt="icon"
                                class="w-50 mx-auto">
                        </div>
                        <h5 class="fw-800 mb-2">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Monthly Packages')); ?>

                        </h5>
                        <p class="light-gray small">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Subscribe to our monthly plans for simplified lessons, practice, and regular quizzes')); ?>

                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center shadow-sm border-0 p-4 hover-card">
                        <div class="icon-box mb-3">
                            <img src="<?php echo e(asset('front/assets/media/user/banner-user-2.png')); ?>" alt="icon"
                                class="w-50 mx-auto">
                        </div>
                        <h5 class="fw-800 mb-2">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Chemistry Lessons')); ?>

                        </h5>
                        <p class="light-gray small">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Simplify complex concepts with clear explanations and exercises')); ?>

                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center shadow-sm border-0 p-4 hover-card">
                        <div class="icon-box mb-3">
                            <img src="<?php echo e(asset('front/assets/media/user/banner-user-3.png')); ?>" alt="icon"
                                class="w-50 mx-auto">
                        </div>
                        <h5 class="fw-800 mb-2">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Educational Articles')); ?>

                        </h5>
                        <p class="light-gray small">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Gain deeper understanding and effective study strategies through articles')); ?>

                        </p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center shadow-sm border-0 p-4 hover-card">
                        <div class="icon-box mb-3">
                            <img src="<?php echo e(asset('front/assets/media/user/banner-user-4.png')); ?>" alt="icon"
                                class="w-50 mx-auto">
                        </div>
                        <h5 class="fw-800 mb-2">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Quizzes')); ?>

                        </h5>
                        <p class="light-gray small">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Test your knowledge with comprehensive quizzes simulating final exams')); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .hover-card {
            transition: all 0.3s ease;
            border-radius: 15px;
        }

        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #f0f4f8;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
    </style>
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
                        <img src="<?php echo e(asset('front/assets/media/Vodafone-Cash.png')); ?>" alt="Vodafone Cash"
                            class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                        <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('Vodafone Cash')); ?></h6>
                    </div>
                </div>

                <!-- Etisalat Cash -->
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                        <img src="<?php echo e(asset('front/assets/media/Etisalat_Misr-Logo.wine.png')); ?>" alt="Etisalat Cash"
                            class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                        <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('Etisalat Cash')); ?></h6>
                    </div>
                </div>

                <!-- Orange Cash -->
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                        <img src="<?php echo e(asset('front/assets/media/om2.png')); ?>" alt="Orange Cash" class="img-fluid mb-3"
                            style="width:70px; height:70px; object-fit:contain;">
                        <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('Orange Cash')); ?></h6>
                    </div>
                </div>

                <!-- WE Pay -->
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                        <img src="<?php echo e(asset('front/assets/media/we.png')); ?>" alt="WE Pay" class="img-fluid mb-3"
                            style="width:70px; height:70px; object-fit:contain;">
                        <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('WE Pay')); ?></h6>
                    </div>
                </div>

                <!-- Fawry -->
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                        <img src="<?php echo e(asset('front/assets/media/fery.jpg')); ?>" alt="Fawry" class="img-fluid mb-3"
                            style="width:70px; height:70px; object-fit:contain;">
                        <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('Fawry')); ?></h6>
                    </div>
                </div>

                <!-- Visa / MasterCard -->
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card shadow-sm border-0 text-center p-3 h-100 rounded-4 payment-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa"
                            class="img-fluid mb-3" style="width:70px; height:70px; object-fit:contain;">
                        <h6 class="fw-bold mb-0"><?php echo e(\App\Helpers\TranslationHelper::translate('Visa / MasterCard')); ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Payment Methods END -->

    <style>
        .payment-card {
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .payment-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sameh-elearning\resources\views/front/pages/about.blade.php ENDPATH**/ ?>
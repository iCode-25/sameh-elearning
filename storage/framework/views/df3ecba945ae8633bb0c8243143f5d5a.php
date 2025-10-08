<?php $__env->startPush('css'); ?>
    <style>
        .image-wrapper {
            /* width: 500px; */
            height: 300px;
            overflow: hidden;
            position: relative;
        }

        .moving-image {
            width: 100%;
            /* height: 100%; */
            object-fit: cover;
            /* position: absolute; */
            top: 0;
            left: 0;
            transition: transform 0.1s linear;
            will-change: transform;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- HERO BANNER START -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Content -->
                <div class="col-lg-6">
                    <div class="hero-content">
                        <span class="badge-text">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Physics Made Simple')); ?>

                        </span>
                        <h1 class="hero-title">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Your Future Starts')); ?> <br>
                            <span class="highlight">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('The Physics as it Should Be')); ?>

                            </span>
                        </h1>
                        <p class="hero-subtitle">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Your Ultimate Platform to Learn Physics Professionally We offer you a complete educational experience that combines simplified explanations, interactive lessons, comprehensive quizzes, and informative articles')); ?>

                        </p>

                        <div class="hero-buttons mt-4">
                            <a href="<?php echo e(route('site.lessons')); ?>" class="btn-main">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Explore Courses')); ?>

                            </a>
                            <a href="<?php echo e(route('site.about')); ?>" class="btn-secondary">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Read More')); ?>

                            </a>
                        </div>

                        <div class="students-block mt-5 d-flex align-items-center">
                            <div class="students-avatars">
                                <img src="<?php echo e(asset('front/assets/media/user/user-1.png')); ?>" alt="">
                                <img src="<?php echo e(asset('front/assets/media/user/user-2.png')); ?>" alt="">
                                <img src="<?php echo e(asset('front/assets/media/user/user-3.png')); ?>" alt="">
                                <img src="<?php echo e(asset('front/assets/media/user/test-user-1.png')); ?>" alt="">
                            </div>
                            <h6 class="ms-3">
                                <span class="highlight">+659</span>
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Students')); ?>

                            </h6>
                        </div>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="col-lg-6 text-center">
                    <div class="hero-image">
                        <img src="<?php echo e(setting('image_banner_home_web', 'en')); ?>" alt="Hero Image">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .hero-section {
            background: linear-gradient(135deg, #f0f4ff, #ffffff);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-content .badge-text {
            display: inline-block;
            padding: 6px 14px;
            background: #e0ebff;
            color: #1d3f72;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 800;
            line-height: 1.3;
            color: #1a1a1a;
        }

        .hero-title .highlight {
            color: #4a6cf7;
        }

        .hero-subtitle {
            color: #555;
            font-size: 16px;
            margin-top: 20px;
            max-width: 500px;
        }

        .btn-main {
            padding: 12px 28px;
            background: #4a6cf7;
            color: #fff;
            border-radius: 30px;
            font-weight: 600;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-main:hover {
            background: #354bb5;
        }

        .btn-secondary {
            padding: 12px 28px;
            background: transparent;
            color: #4a6cf7;
            border: 2px solid #4a6cf7;
            border-radius: 30px;
            font-weight: 600;
            margin-left: 15px;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: #4a6cf7;
            color: #fff;
        }

        .students-avatars {
            display: flex;
        }

        .students-avatars img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
            margin-left: -10px;
        }

        .hero-image img {
            max-width: 100%;
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }
    </style>
    <!-- HERO BANNER END -->

    <!-- online-learning -->
    <section class="about-modern py-100">
        <div class="container">
            <div class="row align-items-center g-5">

                <!-- Images Grid -->
                <div class="col-lg-6">
                    <div class="image-masonry">
                        <div class="img-box big">
                            <img width="100%" src="<?php echo e(asset('front/assets/media/course/banersck.jpg')); ?>" alt="course">
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-6">
                    <div class="about-content">
                        <span class="badge-text">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Simply Physics')); ?>

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
                                    <h6><?php echo e(\App\Helpers\TranslationHelper::translate('Physics Lessons')); ?></h6>
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
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Physics Lessons')); ?>

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

    <!-- COURSES SECTION END -->

    <?php if($packages->count() > 0): ?>

        <section class="course-section py-80">
            <div class="container">
                <div class="text-center mb-48">
                    <div class="eyebrow-2"><?php echo e(\App\Helpers\TranslationHelper::translate('Packages')); ?></div>
                    <?php if(app()->getLocale() == 'ar'): ?>
                        <h2 class="dark-gray fw-800 mb-16">
                            <span class="color-primary"><?php echo e(\App\Helpers\TranslationHelper::translate('Packages')); ?></span>
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Most Popular')); ?>

                        </h2>
                    <?php else: ?>
                        <h2 class="dark-gray fw-800 mb-16">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Most Popular')); ?>

                            <span class="color-primary"><?php echo e(\App\Helpers\TranslationHelper::translate('Packages')); ?></span>
                        </h2>
                    <?php endif; ?>
                </div>

                <div class="row g-4">
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                            <div class="package-card-pro bg-white br-20 shadow-sm h-100 d-flex flex-column transition">

                                <!-- صورة الكورس -->
                                <div class="package-img position-relative">
                                    <img src="<?php echo e($package->getFirstMediaUrl('workshops_image')); ?>" alt=""
                                        class="w-100 h-100 object-fit-cover br-20-top">
                                    <span class="price-tag bg-primary text-white fw-700">
                                        <?php echo e($package->price - ($package->price * $package->discount) / 100); ?>

                                        <?php echo e(\App\Helpers\TranslationHelper::translate('EGP')); ?>

                                    </span>
                                </div>

                                <!-- تفاصيل -->
                                <div class="p-20 d-flex flex-column flex-grow-1">
                                    <h5 class="fw-700 mb-12 dark-gray">
                                        <?php echo e($package->getTranslation('name', app()->getLocale())); ?></h5>

                                    <div class="d-flex gap-2 small text-muted mb-12 flex-wrap">
                                        <span><?php echo e($package->lessons()->count()); ?>

                                            <?php echo e(\App\Helpers\TranslationHelper::translate('Lessons')); ?></span>
                                        <span>•</span>
                                        <span><?php echo e($package->level?->getTranslation('name', app()->getLocale())); ?></span>
                                    </div>

                                    <p class="light-gray small mb-20 text-truncate-3 flex-grow-1">
                                        <?php echo Str::limit($package->getTranslation('description', app()->getLocale()), 150, '...'); ?>

                                    </p>

                                    <!-- زرار -->
                                    <div>
                                        <?php if(Route::currentRouteName() === 'user.profile'): ?>
                                            <a href="<?php echo e(route('user.site.package.details', $package->id)); ?>"
                                                class="btn-enroll w-100">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Track your progress')); ?>

                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('user.site.package.details', $package->id)); ?>"
                                                class="btn-enroll w-100">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('enroll')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="text-center mt-40">
                    <a href="<?php echo e(route('site.packages')); ?>" class="fw-700 color-primary hover-underline">
                        <?php echo e(\App\Helpers\TranslationHelper::translate('Explore all Packages')); ?>

                    </a>
                </div>
            </div>
        </section>

        <style>
            .package-card-pro {
                border-radius: 20px;
                overflow: hidden;
                transition: all .35s ease;
                box-shadow: 0 4px 15px rgba(0, 0, 0, .06);
                padding: 15px;
            }

            .package-card-pro:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 30px rgba(0, 0, 0, .15);
            }

            .package-img {
                position: relative;
                height: 180px;
                border-radius: 20px 20px 0 0;
                overflow: hidden;
            }

            .package-img img {
                transition: transform .4s ease;
            }

            .package-card-pro:hover .package-img img {
                transform: scale(1.08);
            }

            .price-tag {
                position: absolute;
                top: 12px;
                right: 12px;
                padding: 6px 14px;
                border-radius: 30px;
                font-size: 14px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, .2);
            }

            .btn-enroll {
                display: inline-block;
                padding: 12px;
                border-radius: 12px;
                text-align: center;
                background: var(--primary-color);
                color: #fff;
                font-weight: 700;
                transition: all .3s ease;
            }

            .btn-enroll:hover {
                background: var(--secondary-color);
                color: #fff;
            }

            .text-truncate-3 {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </style>
    <?php endif; ?>

    <!-- videos-start -->
    <?php if($lessons->count() > 0): ?>
        <section class="videos py-80" dir="ltr">
            <div class="eyebrow heading"><?php echo e(\App\Helpers\TranslationHelper::translate('Courses Video')); ?></div>
            <h2 class="dark-gray fw-800 heading mb-48">
                <span class="color-sec"><?php echo e(\App\Helpers\TranslationHelper::translate('Video Courses')); ?></span>
            </h2>

            <div class="container">
                <div class="video-grid">
                    <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="video-card">
                            <div class="card-img">
                                <img src="<?php echo e($lesson->getFirstMediaUrl('newsimage_news')); ?>" alt="video">
                                <a href="<?php echo e(route('site.lesson_details', ['lesson' => $lesson->id])); ?>" class="play-btn">
                                    <img src="<?php echo e(asset('front/assets/media/icons/play-icon.png')); ?>" alt="play">
                                </a>
                            </div>
                            <div class="card-body" dir="rtl">
                                <h5><?php echo e($lesson->name); ?></h5>
                                <p><?php echo strip_tags($lesson->des); ?></p>
                                <span
                                    class="price"><?php echo e($lesson->price . ' ' . \App\Helpers\TranslationHelper::translate('EGP')); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <p class="light-gray heading fw-400 mt-4">
                <a href="<?php echo e(route('site.lessons')); ?>">
                    <span class="color-primary fw-700">
                        <?php echo e(\App\Helpers\TranslationHelper::translate('Explore all Lessons')); ?>

                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                            fill="none">
                            <path
                                d="M2.92098 11.4097H19.4453L15.8531 7.81736C15.427 7.39131 15.427 6.70066 15.8531 6.27461C16.279 5.84857 16.9698 5.84857 17.3958 6.27461L22.8504 11.7291C23.2764 12.1552 23.2764 12.8458 22.8504 13.2719L17.3959 18.7264C17.1828 18.9395 16.9036 19.046 16.6245 19.046C16.3453 19.046 16.066 18.9395 15.8531 18.7264C15.4271 18.3004 15.4271 17.6097 15.8531 17.1837L19.4453 13.5915H2.92098C2.31849 13.5915 1.83006 13.103 1.83006 12.5005C1.83006 11.8981 2.31849 11.4097 2.92098 11.4097Z"
                                fill="var(--secondary-color)">
                            </path>
                        </svg>
                    </span>
                </a>
            </p>
        </section>
    <?php endif; ?>


    <?php if($tests_lessons->isNotEmpty()): ?>
        <section class="course-section py-80">
            <div class="container-fluid">


                <div class="d-flex align-items-center justify-content-between mb-48 flex-wrap">
                    <div>
                        <div class="eyebrow-2"><?php echo e(\App\Helpers\TranslationHelper::translate('Tests')); ?></div>

                        <h2 class="dark-gray fw-800 mb-16">
                            <?php if(app()->getLocale() === 'ar'): ?>
                                <span class="color-primary">
                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Tests')); ?>

                                </span>
                                <?php echo e(\App\Helpers\TranslationHelper::translate('doors')); ?>

                            <?php else: ?>
                                <?php echo e(\App\Helpers\TranslationHelper::translate('doors')); ?>

                                <span class="color-primary">
                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Lessons')); ?>

                                </span>
                            <?php endif; ?>
                        </h2>
                    </div>
                </div>


                <div class="row g-4">
                    <?php $__currentLoopData = $tests_lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                            <div class="card border-0 shadow h-100 hover-shadow w-100">
                                <div class="card-head h-50 d-flex flex-column">
                                    <img src="<?php echo e($lesson->getFirstMediaUrl('newsimage_news')); ?>" alt="<?php echo e($lesson->name); ?>"
                                        class="card-img-top rounded-top h-100">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="mb-4p heading-style"><?php echo e($lesson->name); ?></h5>
                                    <p class="text-muted small mb-3 description">
                                        <?php echo strip_tags($lesson->des); ?>

                                    </p>


                                    <div class="mt-auto">
                                        <a href="<?php echo e(route('user.show_lesson', ['lesson' => $lesson->id])); ?>"
                                            class="cus-btn">
                                            <span
                                                class="btn-text"><?php echo e(\App\Helpers\TranslationHelper::translate('view test')); ?></span>
                                            <span><?php echo e(\App\Helpers\TranslationHelper::translate('view test')); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
        </section>
    <?php endif; ?>



    <!-- User START -->
    <?php if($users->count() > 0): ?>
        <section class="py-5">
            <div class="container-fluid">
                <h2 class="text-center fw-bold mb-5">🥇 <?php echo e(\App\Helpers\TranslationHelper::translate('top students')); ?>

                </h2>


                <div class="swiper topStudentsSwiper">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $fullName = $user->name . ' ' . $user->l_name;
                                $displayName = strlen($fullName) > 15 ? $user->name : $fullName;
                            ?>

                            <div class="swiper-slide">
                                <div class="card border shadow-sm rounded-4 p-4 text-center h-100"
                                    style="background-color: #ffffff;">
                                    <img src="<?php echo e($user->getFirstMediaUrl('users') ?: asset('front/assets/media/user/default.jpg')); ?>"
                                        alt="student photo" class="rounded-circle mb-3"
                                        style="width: 100px; height: 100px; object-fit: cover; margin: 0 auto;">

                                    <h5 class="fw-bold mb-1" title="<?php echo e($fullName); ?>"><?php echo e($displayName); ?></h5>
                                    <p class="text-muted small mb-2">
                                        <?php echo e($user->level?->name ?? App\Helpers\TranslationHelper::translate('undefined')); ?>

                                    </p>

                                    <img src="<?php echo e(asset('front/assets/media/user/quotes.png')); ?>" alt="quote"
                                        style="width: 24px; opacity: 0.4;" />
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </div>
        </section>
        <!-- User END -->
    <?php endif; ?>
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

    <!-- blogs -->
    <?php echo $__env->make('front.components.blogs', ['blogs' => $blogs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- blogs-end -->
    <p class="light-gray heading fw-400 mb-48">
        <a href="<?php echo e(route('site.blogs')); ?>">
            <span class="color-primary fw-700"><?php echo e(\App\Helpers\TranslationHelper::translate('Explore all Blogs')); ?>

                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                    fill="none">
                    <path
                        d="M2.92098 11.4097H19.4453L15.8531 7.81736C15.427 7.39131 15.427 6.70066 15.8531 6.27461C16.279 5.84857 16.9698 5.84857 17.3958 6.27461L22.8504 11.7291C23.2764 12.1552 23.2764 12.8458 22.8504 13.2719L17.3959 18.7264C17.1828 18.9395 16.9036 19.046 16.6245 19.046C16.3453 19.046 16.066 18.9395 15.8531 18.7264C15.4271 18.3004 15.4271 17.6097 15.8531 17.1837L19.4453 13.5915H2.92098C2.31849 13.5915 1.83006 13.103 1.83006 12.5005C1.83006 11.8981 2.31849 11.4097 2.92098 11.4097Z"
                        fill="var(--secondary-color)"></path>
                </svg>
            </span>
        </a>
    </p>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        const wrapper = document.querySelector('.image-wrapper');
        const image = document.querySelector('.moving-image');

        wrapper.addEventListener('mousemove', (e) => {
            const {
                left,
                top,
                width,
                height
            } = wrapper.getBoundingClientRect();
            const x = (e.clientX - left) / width;
            const y = (e.clientY - top) / height;

            const moveX = (x - 0.5) * 20;
            const moveY = (y - 0.5) * 20;

            image.style.transform = `translate(${moveX}px, ${moveY}px)`;
        });

        wrapper.addEventListener('mouseleave', () => {
            image.style.transform = 'translate(0px, 0px)';
        });
    </script>
    <!-- Swiper CSS -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const topStudentsSwiper = new Swiper(".topStudentsSwiper", {
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1.2,
                    spaceBetween: 16
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 24
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 24
                },
            },
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sameh-elearning\resources\views/front/index.blade.php ENDPATH**/ ?>

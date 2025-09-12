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
                                    <h1 class="dark-gray fw-700">Lessons</h1>
                                </div>
                                <div class="img-block">
                                    <img src="<?php echo e(asset('front/assets/media/user/star.png')); ?>" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="<?php echo e(setting('image_banner_page_lessons_web', 'en')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TITLE BANNER END -->

    <!-- videos-start -->
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
                            <img src="<?php echo e($lesson->getFirstMediaUrl('news')); ?>" alt="video">
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
    </section>
    <!-- videos-end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/front/pages/courses/index.blade.php ENDPATH**/ ?>
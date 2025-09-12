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
                                        <?php echo e(\App\Helpers\TranslationHelper::translate('Blog Detail')); ?>

                                    </h1>
                                </div>
                                <div class="img-block">
                                    <img src="<?php echo e(asset('front/assets/media/user/star.png')); ?>" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="<?php echo e(setting('image_banner_page_blog_web', 'en')); ?>"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TITLE BANNER END -->

    <!-- ARTICLES SECTION START -->
    <section class="article-section py-80">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3">
                    <div class="sidebar">
                        <div class="category-block box-2 mb-24">
                            <div class="title" data-count="2">
                                <h5 class="fw-800 dark-gray mb-16">
                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Latest Blogs')); ?></h5>
                            </div>
                            <div class="hr-line mb-16"></div>
                            <div class="content-block mt-24">
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('site.blog-details', $item->id)); ?>"
                                        class="recent-blogs d-flex gap-12 align-items-center mb-24">
                                        <div class="image-box d-flex flex-shrink-0 br-4">
                                            <img src="<?php echo e($item->getFirstMediaUrl('blogs_image')); ?>" alt=""
                                                class="br-4" width="89px" height="89px">
                                        </div>
                                        <div>
                                            <p class="text fw-500 mb-8"><?php echo e(Str::limit($item->name, 50)); ?></p>
                                            <p class="dark-gray fw-400"><?php echo e($item->created_at->format('d m y')); ?></p>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="detail-image mb-24">
                        <img src="<?php echo e($blog->getFirstMediaUrl('blogs_image')); ?>" alt="image">
                    </div>
                    <div class="d-flex gap-12 align-items-center mb-24">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="3" viewBox="0 0 48 3"
                            fill="none">
                            <path d="M48 1.5H0" stroke="var(--secondary-color)" stroke-width="2" />
                        </svg>
                        <p class="eye-brow-2 light-gray fw-400"><?php echo e($blog->created_at->format('d M Y')); ?></p>
                        <p class="fw-700 light-gray">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Mr') . ' ' . \App\Helpers\TranslationHelper::translate('Samah Shtain')); ?>

                        </p>
                    </div>
                    <h4 class="dark-gray fw-800 mb-24"><?php echo e($blog->name); ?></h4>
                    <div class="light-gray mb-32"><?php echo $blog->description; ?></div>
                    <div class="hr-line light-gray mb-32"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ARTICLES SECTION END -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/front/pages/blog-details.blade.php ENDPATH**/ ?>
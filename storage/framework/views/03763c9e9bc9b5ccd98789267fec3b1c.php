<?php $__env->startSection('title', __('Not Found')); ?>
<?php $__env->startSection('code', '404'); ?>
<?php $__env->startSection('message', __('Not Found')); ?>

<?php $__env->startSection('content'); ?>

    <!-- 404 -->
       <section class="sec-page">
        <div class="container-fluid">
            <div class="page-block">
                <div class="text-center">
                    <h1 class="color-primary fw-700 mb-24 ">4<span class="color-sec">0</span>4</h1>
                    <h4 class="dark-gray fw-700 mb-16 "> <span class="color-sec"> Opps! </span> There is something wrong</h4>
                    <p class="light-gray mb-32 ">Lorem ipsum dolor sit amet consectetur. Orci sit integer eget<br>
                        netus odio. Scelerisque fusce varius imperdiet congue fringilla.</p>
                        <a href="<?php echo e(route('site.home')); ?>" class="cus-btn-3">
                            <span class="btn-text">back to homepage</span>
                            <span>back to homepage</span>
                        </a>
                </div>
            </div>
        </div>
    </section>
    <!-- 404 -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/errors/404.blade.php ENDPATH**/ ?>
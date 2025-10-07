<?php $__env->startSection('title', __('Not Found')); ?>
<?php $__env->startSection('code', '403'); ?>
<?php $__env->startSection('message', __('Not Found')); ?>

<?php $__env->startSection('content'); ?>

    <!-- 404 -->
    <section class="sec-page">
        <div class="container-fluid">
            <div class="page-block">
                <div class="text-center">
                    <h1 class="color-primary fw-700 mb-24 ">4<span class="color-sec">0</span>3</h1>
                    <h4 class="dark-gray fw-700 mb-16 "> <span class="color-sec"> Opps! </span></h4>
                    <p class="color-primary mb-32 fw-700">
                        <?php echo e(\App\Helpers\TranslationHelper::translate($exception->getMessage() ?: 'Forbidden')); ?>

                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- 404 -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sameh-elearning\resources\views/errors/403.blade.php ENDPATH**/ ?>
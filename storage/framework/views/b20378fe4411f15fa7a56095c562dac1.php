<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\sameh-elearning\resources\views/front/components/package.blade.php ENDPATH**/ ?>
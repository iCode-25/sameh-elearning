<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(request()->routeIs('user.profile')): ?>
        <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6">
        <?php else: ?>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
    <?php endif; ?>
    <div class="teacher-block border bg-white br-12 d-flex flex-column h-100">
        <div class="teacher-image text-center shine">
            <div>
                <img height="200px" width="100%" src="<?php echo e($package->getFirstMediaUrl('workshops_image')); ?>" alt="">
            </div>
            <div class="price-block">
                <h6 class="light fw-800"><?php echo e($package->price - ($package->price * $package->discount / 100)); ?>

                    <?php echo e(\App\Helpers\TranslationHelper::translate('EGP')); ?></h6>
            </div>
        </div>
        <div>
            <div class="teacher-content flex-grow-1 d-flex flex-column">
                <div class="h5 fw-700 mb-16 ">
                    <?php echo e($package->getTranslation('name', app()->getLocale())); ?>

                </div>
                <div class="d-flex gap-8 align-items-center mb-16">
                    <div class="d-flex gap-6 align-items-center block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11"
                            fill="none">
                            <circle cx="5" cy="5.5" r="4.0625" stroke="var(--primary-color)" stroke-width="1.875">
                            </circle>
                        </svg>
                        <p class="light-gray fw-500"><?php echo e($package->lessons()->count()); ?>

                            <?php echo e(\App\Helpers\TranslationHelper::translate('Lessons')); ?></p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11"
                            fill="none">
                            <circle cx="5" cy="5.5" r="4.0625" stroke="var(--primary-color)" stroke-width="1.875">
                            </circle>
                        </svg>
                        <p class="light-gray fw-500">
                            <?php echo e($package->level?->getTranslation('name', app()->getLocale())); ?></p>
                    </div>
                </div>
                <p class="light-gray mb-24 text-truncate-4">
                    <?php echo Str::limit($package->getTranslation('description', app()->getLocale()), 200, '...'); ?>

                </p>
                <div class="mb-24"></div>
                <div class="d-flex gap-24 align-items-center mt-auto">
                    <div class="d-flex align-items-center gap-12 flex-wrap">
                        <?php if(Route::currentRouteName() === 'user.profile'): ?>
                            
                            <a href="<?php echo e(route('user.site.package.details', $package->id)); ?>" class="cus-btn">
                                <span
                                    class="btn-text"><?php echo e(\App\Helpers\TranslationHelper::translate('Track your progress')); ?></span>
                                <span><?php echo e(\App\Helpers\TranslationHelper::translate('Track your progress')); ?></span>
                            </a>
                        <?php else: ?>
                            
                            <a href="<?php echo e(route('user.site.package.details', $package->id)); ?>" class="cus-btn">
                                <span class="btn-text"><?php echo e(\App\Helpers\TranslationHelper::translate('enroll')); ?></span>
                                <span><?php echo e(\App\Helpers\TranslationHelper::translate('enroll')); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\sameh-elearning\resources\views/front/components/package.blade.php ENDPATH**/ ?>
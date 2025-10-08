<?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-6">
        <div class="video-block border position-relative">
            <img src="<?php echo e($lesson->getFirstMediaUrl('newsimage_news')); ?>" alt="brand" class="w-100">
            <a <?php if(Route::currentRouteName() === 'user.profile'): ?> href="<?php echo e(route('user.show_lesson', ['lesson' => $lesson->id])); ?>"  <?php else: ?> href="<?php echo e(route('site.lesson_details', ['lesson' => $lesson->id])); ?>" <?php endif; ?> class="play-btn">
                <img src="<?php echo e(asset('front/assets/media/icons/play-icon.png')); ?>" alt="video" class="video-pic">
            </a>

            <div class="block">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="white mb-4p">
                            <?php echo e(Str::limit($lesson->getTranslation('name', app()->getLocale()), 80, '...')); ?>

                        </h5>
                        <p class="lightest-gray">
                            <?php echo e($lesson->level?->getTranslation('name', app()->getLocale())); ?>

                        </p>
                    </div>
                    <div>
                        <p class="lightest-gray">
                            <?php echo e($lesson->price == 0 ? \App\Helpers\TranslationHelper::translate('FREE') : $lesson->price . ' ' . \App\Helpers\TranslationHelper::translate('EGP')); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH C:\laragon\www\Qurtum\resources\views/front/components/lesson.blade.php ENDPATH**/ ?>

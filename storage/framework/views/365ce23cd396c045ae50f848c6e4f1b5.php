<?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section class="videos py-80" dir="ltr">
        <div class="container">
            <div class="video-grid">
                <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="video-card">
                        <div class="card-img">
                            <img src="<?php echo e($lesson->getFirstMediaUrl('newsimage_newsimage_news')); ?>" alt="video">
                            <a href="<?php echo e(route('site.lesson_details', ['lesson' => $lesson->id])); ?>" class="play-btn">
                                <img src="<?php echo e(asset('front/assets/media/icons/play-icon.png')); ?>" alt="play">
                            </a>
                        </div>
                        <div class="card-body" dir="rtl">
                            <h5><?php echo e($lesson->name); ?></h5>
                            <p><?php echo strip_tags($lesson->des); ?></p>
                            <span class="price"><?php echo e($lesson->price . ' ' . \App\Helpers\TranslationHelper::translate('EGP')); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\sameh-elearning\resources\views/front/components/lesson.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>

    <section class="title-banner">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <div class="title-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="title-content">
                                    <h2 class="fw-bold mb-3" style="color: var(--primary-color);">
                                        <?php echo e($lesson->getTranslation('name', app()->getLocale())); ?></h2>
                                    <div class="mb-3">
                                        <span class="badge"
                                            style="background: var(--primary-color); color: #fff; font-size: 1rem;"><?php echo e($lesson->level->getTranslation('name', app()->getLocale())); ?></span>
                                    </div>
                                </div>
                                <div class="img-block">
                                    <img src="<?php echo e(asset('front/assets/media/user/star.png')); ?>" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="<?php echo e($lesson->getFirstMediaUrl('newsimage_news')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lesson-view py-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 p-0">
                    <div class="card border-0 shadow rounded-4 p-2 bg-white mb-2">
                        <div class="video-wrapper" style="position: relative; width: 100%; max-width: 800px; margin: auto;">
                            

                            <?php if(request('type') === 'azhar' && $lesson->azhar_video_url && auth('web')->user()->type == 'azhar'): ?>
                                <iframe width="100%" height="500" src="<?php echo e(App\Helpers\VideoHelpers::toEmbedUrl($lesson->azhar_video_url)); ?>"
                                    style="border-radius: 12px; max-height: 80vh;" frameborder="0" allowfullscreen>
                                </iframe>
                            <?php elseif(request('type') === 'general' && $lesson->school_video_url && auth('web')->user()->type == 'general'): ?>
                                <iframe width="100%" height="500" src="<?php echo e(App\Helpers\VideoHelpers::toEmbedUrl($lesson->school_video_url)); ?>"
                                    style="border-radius: 12px; max-height: 80vh;" frameborder="0" allowfullscreen>
                                </iframe>
                            <?php else: ?>
                                <iframe width="100%" height="500" src="<?php echo e(App\Helpers\VideoHelpers::toEmbedUrl($lesson->video_url)); ?>"
                                    style="border-radius: 12px; max-height: 80vh;" frameborder="0" allowfullscreen>
                                </iframe>
                            <?php endif; ?>


                            <div id="watermark"
                                style="
                                    position: absolute;
                                    top: 10%;
                                    left: 0;
                                    width: 100%;
                                    white-space: nowrap;
                                    text-align: center;
                                    background: rgba(0, 0, 0, 0.2);
                                    color: #FFF;
                                    font-weight: bold;
                                    padding: 5px 0;
                                    font-size: 16px;
                                    z-index: 5;
                                    animation: scrollText 20s linear infinite;
                                    pointer-events: none;
                                ">
                                <?php echo e(auth('web')->user()->name); ?> - <?php echo e(auth('web')->user()->level()->name ?? ''); ?>

                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-semibold mb-2" style="color: var(--primary-color);">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Description')); ?></h5>
                            <div><?php echo $lesson->getTranslation('des', app()->getLocale()); ?></div>
                        </div>
                    </div>
                    <?php if($lesson->getFirstMediaUrl('newsnews_pdf')): ?>
                        <div class="card border-0 shadow rounded-4 p-2 bg-white mb-2">
                            <div class="mb-4">
                                <h5 class="fw-semibold mb-2" style="color: var(--primary-color);">
                                    <?php echo e(\App\Helpers\TranslationHelper::translate('PDF File')); ?></h5>
                                <?php if (isset($component)) { $__componentOriginaldacc50c5ec342d35ab90e0ad87260feb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldacc50c5ec342d35ab90e0ad87260feb = $attributes; } ?>
<?php $component = App\View\Components\PdfViewer::resolve(['url' => $lesson->getFirstMediaUrl('newsnews_pdf')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pdf-viewer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PdfViewer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldacc50c5ec342d35ab90e0ad87260feb)): ?>
<?php $attributes = $__attributesOriginaldacc50c5ec342d35ab90e0ad87260feb; ?>
<?php unset($__attributesOriginaldacc50c5ec342d35ab90e0ad87260feb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldacc50c5ec342d35ab90e0ad87260feb)): ?>
<?php $component = $__componentOriginaldacc50c5ec342d35ab90e0ad87260feb; ?>
<?php unset($__componentOriginaldacc50c5ec342d35ab90e0ad87260feb); ?>
<?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 col-md-12 px-2">

                    
                    <?php if(auth('web')->user()->type == 'azhar' && $lesson->azhar_video_url): ?>
                        <div class="card border-0 shadow rounded-4 mb-2 p-2 bg-white">
                            <h4 class="fw-bold mb-3" style="color: var(--primary-color);">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Homework')); ?></h4>
                            <div class="list-group list-group-flush px-2">
                                <div onclick="window.location.href='<?php echo e(route('user.show_lesson', ['lesson' => $lesson->id, 'type' => 'azhar'])); ?>'"
                                    class="my-2 d-flex justify-content-start align-items-start cursor-pointer"
                                    style="cursor: pointer">

                                    <img src="<?php echo e($lesson->getFirstMediaUrl('newsimage_news')); ?>" class="border"
                                        style="width: 160px; height: 100px; object-fit: cover; border-radius: 12px; flex-shrink: 0;" />

                                    <div class="px-2" style="font-size: 14px !important;">
                                        <span class="fw-bold color-primary overflow-hidden"
                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            <?php echo e(Str::limit($lesson->getTranslation('name', app()->getLocale()))); ?>

                                        </span>
                                        <div class="overflow-hidden"
                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            <?php echo Str::limit(strip_tags($lesson->getTranslation('des', app()->getLocale()))); ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(auth('web')->user()->type == 'general' && $lesson->school_video_url): ?>
                        <div class="card border-0 shadow rounded-4 mb-2 p-2 bg-white">
                            <h4 class="fw-bold mb-3" style="color: var(--primary-color);">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Homework')); ?></h4>
                            <div class="list-group list-group-flush px-2">
                                <div onclick="window.location.href='<?php echo e(route('user.show_lesson', ['lesson' => $lesson->id, 'type' => 'azhar'])); ?>'"
                                    class="my-2 d-flex justify-content-start align-items-start cursor-pointer"
                                    style="cursor: pointer">

                                    <img src="<?php echo e($lesson->getFirstMediaUrl('newsimage_news')); ?>" class="border"
                                        style="width: 160px; height: 100px; object-fit: cover; border-radius: 12px; flex-shrink: 0;" />

                                    <div class="px-2" style="font-size: 14px !important;">
                                        <span class="fw-bold color-primary overflow-hidden"
                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            <?php echo e(Str::limit($lesson->getTranslation('name', app()->getLocale()))); ?>

                                        </span>
                                        <div class="overflow-hidden"
                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            <?php echo Str::limit(strip_tags($lesson->getTranslation('des', app()->getLocale()))); ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="card border-0 shadow rounded-4 p-2 bg-white mb-2">
                        <h4 class="fw-bold mb-3" style="color: var(--primary-color);">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('lesson tests')); ?></h4>
                        <?php if(isset($lesson->tests) &&
                                $lesson->tests()->active()->where('type', auth('web')->user()->type)->count()): ?>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $lesson->tests()->active()->where('type', auth('web')->user()->type)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center mb-0 pb-0">
                                        <div>
                                            <span class="fw-bold"
                                                style="color: var(--primary-color);"><?php echo e($test->name); ?></span>
                                            <span class="text-muted ms-2"><?php echo Str::limit($test->description, 40); ?></span>
                                        </div>
                                        <a href="<?php echo e(route('user.test.show', ['lesson' => $lesson->id, 'test' => $test->id])); ?>"
                                            class="btn btn-sm"
                                            style="background: var(--primary-color); color: #fff; border-radius: 6px;"><?php echo e(\App\Helpers\TranslationHelper::translate('start test')); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <div class="alert alert-info mb-0">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('not tests yet')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if(count($nextLessons) > 0): ?>
                        <div class="card border-0 shadow rounded-4 p-2 bg-white">
                            <h4 class="fw-bold mb-3" style="color: var(--primary-color);">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('next lessons')); ?></h4>
                            <div class="list-group list-group-flush px-2">
                                <?php $__empty_1 = true; $__currentLoopData = $nextLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $next): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div onclick="window.location.href='<?php echo e(route('user.show_lesson', parameters: $next->id)); ?>'"
                                        class="my-2 d-flex justify-content-start align-items-start cursor-pointer"
                                        style="cursor: pointer">

                                        <img src="<?php echo e($next->getFirstMediaUrl('newsimage_news')); ?>" class="border"
                                            style="width: 160px; height: 100px; object-fit: cover; border-radius: 12px; flex-shrink: 0;" />

                                        <div class="px-2" style="font-size: 14px !important;">
                                            <span class="fw-bold color-primary overflow-hidden"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                <?php echo e(Str::limit($next->getTranslation('name', app()->getLocale()))); ?>

                                            </span>
                                            <div class="overflow-hidden"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                <?php echo Str::limit(strip_tags($next->getTranslation('des', app()->getLocale()))); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <li class="list-group-item text-muted">
                                        <?php echo e(\App\Helpers\TranslationHelper::translate('lessons not available')); ?></li>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/front/pages/courses/show_lesson.blade.php ENDPATH**/ ?>
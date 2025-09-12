<?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('News Details')); ?>
<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
        ['text' => \App\Helpers\TranslationHelper::translate('Lessons'), 'link' => route('admin.videos.index')],
        ['text' => \App\Helpers\TranslationHelper::translate('Details')],
    ],'button' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bread-crumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BreadCrumb::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2072a121b282e859e8bdea9c58b76d8)): ?>
<?php $attributes = $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8; ?>
<?php unset($__attributesOriginalc2072a121b282e859e8bdea9c58b76d8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2072a121b282e859e8bdea9c58b76d8)): ?>
<?php $component = $__componentOriginalc2072a121b282e859e8bdea9c58b76d8; ?>
<?php unset($__componentOriginalc2072a121b282e859e8bdea9c58b76d8); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-body py-4 px-0" dir="<?php echo e(Config::get('app.locale') == 'en' ? 'ltr' : 'rtl'); ?>">
                            <div class="row px-0 mt-3">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left">
                                    <h4 class="d-inline-block  py-3">
                                        <?php echo e(\App\Helpers\TranslationHelper::translate('News Details')); ?></h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-right">
                                    <a class="btn btn-primary text-center" style="margin-left: 25px"
                                        href="<?php echo e(route('admin.videos.edit', $videos->id)); ?>">
                                        <span><?php echo e(\App\Helpers\TranslationHelper::translate('Edit')); ?></span> &nbsp;
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                            </div>

                           <?php
    use Illuminate\Support\Str;

    function getYoutubeEmbedUrl($url) {
        if (Str::contains($url, 'watch?v=')) {
            $id = Str::after($url, 'v=');
            $id = Str::before($id, '&');
            return "https://www.youtube.com/embed/$id";
        }

        if (Str::contains($url, 'youtu.be/')) {
            $id = Str::after($url, 'youtu.be/');
            $id = Str::before($id, '?');
            return "https://www.youtube.com/embed/$id";
        }

        return null; // مش يوتيوب
    }

    function renderVideo($url) {
        if (!$url) {
            return '<p class="text-muted">'.\App\Helpers\TranslationHelper::translate('No Video Available').'</p>';
        }

        $youtube = getYoutubeEmbedUrl($url);

        if ($youtube) {
            return '
                <div class="ratio ratio-16x9">
                    <iframe width="100%" height="315"
                        src="'.$youtube.'"
                        title="YouTube video"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            ';
        }

        // اعتبره mp4 مرفوع على السيرفر
        return '
            <video width="100%" height="150" controls>
                <source src="https://abdalhmad.b-cdn.net/'.$url.'" type="video/mp4">
                '.\App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.').'
            </video>
        ';
    }
?>

<!-- الفيديو العادي -->
<div class="row px-0 mt-3">
    <div class="col-lg-12 m-auto text-left">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                <?php echo e(\App\Helpers\TranslationHelper::translate('Video')); ?> :
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-12 text-left details_item">
                <?php echo renderVideo($videos->video_url); ?>

            </div>
        </div>
    </div>
</div>

<!-- فيديو الأزهر -->
<div class="row px-0 mt-3">
    <div class="col-lg-12 m-auto text-left">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                <?php echo e(\App\Helpers\TranslationHelper::translate('Azhar Homework Video')); ?> :
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-12 text-left details_item">
                <?php echo renderVideo($videos->azhar_video_url); ?>

            </div>
        </div>
    </div>
</div>

<!-- فيديو المدرسة -->
<div class="row px-0 mt-3">
    <div class="col-lg-12 m-auto text-left">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                <?php echo e(\App\Helpers\TranslationHelper::translate('School Homework Video')); ?> :
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-12 text-left details_item">
                <?php echo renderVideo($videos->school_video_url); ?>

            </div>
        </div>
    </div>
</div>


                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('Image')); ?> :
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            <a href="<?php echo e($videos->getFirstMediaUrl('newsnews')); ?>" target="_blank">
                                                <img src="<?php echo e($videos->getFirstMediaUrl('newsnews')); ?>" class="w-100"
                                                    alt="test"
                                                    style="width: 150px; height: 150px; object-fit: contain;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          <div class="row px-0 mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                <?php echo e(\App\Helpers\TranslationHelper::translate('PDF')); ?> :
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                <?php if($videos->getFirstMediaUrl('newsnews_pdf')): ?>
                    <iframe src="<?php echo e($videos->getFirstMediaUrl('newsnews_pdf')); ?>"
                            width="100%" height="600px" frameborder="0"></iframe>
                <?php else: ?>
                    <p class="text-danger">
                        <?php echo e(\App\Helpers\TranslationHelper::translate('الملف غير متوفر')); ?>

                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



                            <div class="row px-0 mt-3">
                                <?php $__currentLoopData = Config('language'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Name in')); ?>

                                                <?php echo e(__('methods.' . $lang)); ?>:
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                                <?php echo e($videos->getTranslation('name', $key)); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('Price')); ?>:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            <?php echo e($videos->price); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('Academic Levels')); ?>:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            <?php echo e($videos->level->name ?? '-'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/videos/show.blade.php ENDPATH**/ ?>
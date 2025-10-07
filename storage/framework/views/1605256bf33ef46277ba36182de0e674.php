<?php if($method == 'PUT'): ?>
    <?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Edit Lessons')); ?>
<?php else: ?>
    <?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Add Lessons')); ?>
<?php endif; ?>

<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
        ['text' => \App\Helpers\TranslationHelper::translate('Lessons'), 'link' => route('admin.videos.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ],'button' => [
        'text' => \App\Helpers\TranslationHelper::translate('Go to Lessons'),
        'link' => route('admin.videos.index'),
    ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <div class="card-body pt-0">
                            <form action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php if($method == 'PUT'): ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type="hidden" name="id" value="<?php echo e($videos->id); ?>">
                                <?php endif; ?>
                                <div class="fv-row mb-10">
                                    <div class="row">
                                        <?php $__currentLoopData = Config('language'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-6 mb-5">
                                                <label class="fs-5 fw-bold form-label mb-5">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Name in')); ?>

                                                    <?php echo e(__('methods.' . $lang)); ?>

                                                    :
                                                </label>
                                                <input type="text" class="form-control form-control-solid"
                                                    value="<?php echo e(old('name.' . $key) ?? $videos->getTranslation('name', $key)); ?>"
                                                    placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Name in')); ?> <?php echo e(__('methods.' . $lang)); ?>"
                                                    name="name[<?php echo e($key); ?>]" />
                                                <?php $__errorArgs = ['name.' . $key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Price')); ?>:
                                            </label>

                                            <input type="number" step="0.1"
                                                value="<?php echo e($videos->price ?? old('price')); ?>"
                                                class="form-control form-control-solid" name="price" />
                                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Acadimic Level')); ?> :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="level_id" id="level_id" class="form-control form-control-solid">
                                                <option value="">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Acadimic Level')); ?>

                                                </option>
                                                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($level->id); ?>"
                                                        <?php echo e(old('level_id', $videos->level_id ?? null) == $level->id ? 'selected' : ''); ?>>
                                                        <?php echo e($level->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['level_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <?php $__currentLoopData = Config('language'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-12  mb-5">
                                                <label
                                                    class="fs-5 fw-bold form-label mb-5"><?php echo e(\App\Helpers\TranslationHelper::translate('Description in')); ?>

                                                    <?php echo e(__('methods.' . $lang)); ?>

                                                </label>
                                                <textarea class="form-control form-control-solid full-editor" name="des[<?php echo e($key); ?>]" rows="5"
                                                    id="des<?php echo e($key); ?>" style="height: 300px; direction: rtl;"><?php echo e(old('des.' . $key) ?? $videos->getTranslation('des', $key)); ?></textarea>
                                                <?php $__errorArgs = ['des.' . $key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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

        return $url; // fallback
    }
?>

<div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-2">
        <?php echo e(\App\Helpers\TranslationHelper::translate('Video Link')); ?>:
    </label>
    <input type="url" name="video_url"
        value="<?php echo e(old('video_url', $videos->video_url ?? '')); ?>"
        class="form-control" placeholder="Enter url video" />

    <?php if(!empty($videos->video_url)): ?>
        <div class="mt-4">
            <h5><?php echo e(\App\Helpers\TranslationHelper::translate('Existing Video')); ?>:</h5>
            <div class="ratio ratio-16x9">
                <iframe width="100%" height="315"
                    src="<?php echo e(getYoutubeEmbedUrl($videos->video_url)); ?>"
                    title="YouTube video"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-2">
        <?php echo e(\App\Helpers\TranslationHelper::translate('Azhar Homework Video Link')); ?>:
    </label>
    <input type="url" name="azhar_video_url"
        value="<?php echo e(old('azhar_video_url', $videos->azhar_video_url ?? '')); ?>"
        class="form-control" placeholder="Enter url video" />

    <?php if(!empty($videos->azhar_video_url)): ?>
        <div class="mt-4">
            <h5><?php echo e(\App\Helpers\TranslationHelper::translate('Existing Azhar Video')); ?>:</h5>
            <div class="ratio ratio-16x9">
                <iframe width="100%" height="315"
                    src="<?php echo e(getYoutubeEmbedUrl($videos->azhar_video_url)); ?>"
                    title="YouTube video"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-2">
        <?php echo e(\App\Helpers\TranslationHelper::translate('School Homework Video Link')); ?>:
    </label>
    <input type="url" name="school_video_url"
        value="<?php echo e(old('school_video_url', $videos->school_video_url ?? '')); ?>"
        class="form-control" placeholder="Enter url video" />

    <?php if(!empty($videos->school_video_url)): ?>
        <div class="mt-4">
            <h5><?php echo e(\App\Helpers\TranslationHelper::translate('Existing School Video')); ?>:</h5>
            <div class="ratio ratio-16x9">
                <iframe width="100%" height="315"
                    src="<?php echo e(getYoutubeEmbedUrl($videos->school_video_url)); ?>"
                    title="YouTube video"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    <?php endif; ?>
</div>




                                       <div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        <?php echo e(\App\Helpers\TranslationHelper::translate('pdf')); ?> :
    </label>
    <input type="file" class="form-control form-control-solid" name="news_pdf"
        accept="application/pdf" />
    <?php $__errorArgs = ['news_pdf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <?php if($videos->getFirstMediaUrl('newsimage_newsnews_pdf') != null): ?>
        <div class="mt-4">
            <h5><?php echo e(\App\Helpers\TranslationHelper::translate('Existing PDF')); ?>:</h5>
            <a href="<?php echo e($videos->getFirstMediaUrl('newsimage_newsnews_pdf')); ?>"
               target="_blank"
               class="btn btn-primary">
               <?php echo e(\App\Helpers\TranslationHelper::translate('View')); ?>

            </a>
        </div>
    <?php endif; ?>
</div>


                                        <div class="col-6  mb-5">
                                            <label
                                                class="fs-5 fw-bold form-label mb-5"><?php echo e(\App\Helpers\TranslationHelper::translate('Image')); ?>

                                                : <span class="text-danger">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Size')); ?> <span
                                                        dir="ltr">400 x 400</span></span></label>
                                            <input type="file" class="form-control form-control-solid"
                                                name="image" />
                                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <?php if($videos->getFirstMediaUrl('newsimage_newsimage_news') != null): ?>
                                                <img src="<?php echo e($videos->getFirstMediaUrl('newsimage_newsimage_news')); ?>" alt="videos"
                                                    width="100px" style="border-radius: 5px">
                                            <?php endif; ?>
                                        </div>


                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mb-5">
                                        <span
                                            class="indicator-label"><?php echo e(\App\Helpers\TranslationHelper::translate('Save')); ?></span>
                                    </button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('admin_js'); ?>
    <script src="<?php echo e(asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            console.log("Document is ready");
            $('#level_id').select2({
                placeholder: "<?php echo e(\App\Helpers\TranslationHelper::translate('Acadimic Level')); ?>",
                allowClear: true
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/videos/form.blade.php ENDPATH**/ ?>

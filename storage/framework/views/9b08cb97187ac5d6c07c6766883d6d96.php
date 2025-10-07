<?php $__env->startPush('admin_css'); ?>
    <link href="<?php echo e(asset('dashboard/assets/css/tags-input.min.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    <?php if(App::getLocale() == 'ar'): ?>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php if($method == 'PUT'): ?>
    <?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Edit Test')); ?>
<?php else: ?>
    <?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Add Test')); ?>
<?php endif; ?>

<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
        ['text' => \App\Helpers\TranslationHelper::translate('Tests'), 'link' => route('admin.test.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ],'button' => ['text' => \App\Helpers\TranslationHelper::translate('Go to Test'), 'link' => route('admin.test.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <input type="hidden" name="id" value="<?php echo e($test->id); ?>">
                                <?php endif; ?>
                                <div class="fv-row mb-10">
                                    <div class="row">



                                        <?php $__currentLoopData = Config('language'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-6 mb-5">
                                                <label class="fs-5 fw-bold form-label mb-5">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('name in')); ?>

                                                    <?php echo e(__('methods.' . $lang)); ?>

                                                    :
                                                </label>
                                                <input type="text" class="form-control form-control-solid"
                                                    value="<?php echo e(old('name.' . $key) ?? $test->getTranslation('name', $key)); ?>"
                                                    placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('name in')); ?> <?php echo e(__('methods.' . $lang)); ?>"
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
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Package')); ?> :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="packages_id" id="packages_id"
                                                class="form-control form-control-solid">
                                                <option value="">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Choose Package')); ?>

                                                </option>
                                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($package->id); ?>"
                                                        <?php echo e(old('packages_id', $test->packages_id ?? '') == $package->id ? 'selected' : ''); ?>>
                                                        <?php echo e($package->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['packages_id'];
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
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Lesson')); ?> :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="videos_id" id="videos_id" class="form-control form-control-solid">
                                                <option value="">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Choose Lesson')); ?>

                                                </option>
                                                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($video->id); ?>"
                                                        <?php echo e(old('videos_id', $test->videos_id ?? '') == $video->id ? 'selected' : ''); ?>>
                                                        <?php echo e($video->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['videos_id'];
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


                                        <div class="col-md-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('number of student questions')); ?>:</label>
                                            <input type="number" name="number_student_questions"
                                                class="form-control form-control-solid"
                                                value="<?php echo e(old('number_student_questions')); ?>"
                                                placeholder=" <?php echo e(\App\Helpers\TranslationHelper::translate('number of student questions')); ?>">
                                            <?php $__errorArgs = ['number_student_questions'];
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

                                        <div class="col-md-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        <?php echo e(\App\Helpers\TranslationHelper::translate('Test Type')); ?>:
    </label>
    <select name="type" class="form-select form-select-solid">
        <option value="general" <?php echo e(old('type') == 'general' ? 'selected' : ''); ?>>
            <?php echo e(\App\Helpers\TranslationHelper::translate('General')); ?>

        </option>
        <option value="azhar" <?php echo e(old('type') == 'azhar' ? 'selected' : ''); ?>>
            <?php echo e(\App\Helpers\TranslationHelper::translate('Azhar')); ?>

        </option>
    </select>
    <?php $__errorArgs = ['type'];
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
                                                <textarea class="form-control form-control-solid full-editor" name="description[<?php echo e($key); ?>]" rows="5"
                                                    id="description<?php echo e($key); ?>" style="height: 300px; direction: rtl;"><?php echo e(old('description.' . $key) ?? $test->getTranslation('description', $key)); ?></textarea>
                                                <?php $__errorArgs = ['description.' . $key];
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
    <script src="<?php echo e(asset('dashboard/assets/js/tags-input.min.js')); ?>"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        $(document).ready(function() {
            $('#packages_id').select2({
                placeholder: "<?php echo e(\App\Helpers\TranslationHelper::translate('Choose Package')); ?>",
                allowClear: true
            });

            $('#videos_id').select2({
                placeholder: "<?php echo e(\App\Helpers\TranslationHelper::translate('Choose Lesson')); ?>",
                allowClear: true
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sameh-elearning\resources\views/admin/pages/test/form.blade.php ENDPATH**/ ?>
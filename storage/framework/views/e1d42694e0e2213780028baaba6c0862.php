<?php $__env->startPush('admin_css'); ?>
    <link href="<?php echo e(asset('dashboard/assets/css/tags-input.min.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php if($method == 'PUT'): ?>
    <?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Edit Quiz')); ?>
<?php else: ?>
    <?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Add Quiz')); ?>
<?php endif; ?>

<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
        ['text' => \App\Helpers\TranslationHelper::translate('Quizzes'), 'link' => route('admin.test.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ],'button' => [
        'text' => \App\Helpers\TranslationHelper::translate('Go to Questions'),
        'link' => route('admin.test.answers', ['test' => $test->id]),
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
                                    <input type="hidden" name="quizze_id" value="<?php echo e($quizze->id ?? ''); ?>">
                                <?php endif; ?>


                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>


                                <div class="fv-row mb-10">
                                    <div class="row">
                                        <div class="row">

                                            

                                            <?php $__currentLoopData = Config('language'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-12  mb-5">
                                                    <label
                                                        class="fs-5 fw-bold form-label mb-5"><?php echo e(\App\Helpers\TranslationHelper::translate('Description in')); ?>

                                                        <?php echo e(__('methods.' . $lang)); ?>

                                                    </label>
                                                    <textarea class="form-control form-control-solid full-editor" name="title[<?php echo e($key); ?>]" rows="5"
                                                        id="title<?php echo e($key); ?>" style="height: 300px; direction: rtl;"><?php echo e(old('title.' . $key) ?? $quizze->getTranslation('title', $key)); ?></textarea>
                                                    <?php $__errorArgs = ['title.' . $key];
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


                                            <?php $__currentLoopData = range(1, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-12 mb-5">
                                                    <div class="row">
                                                        <?php $__currentLoopData = Config('language'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-md-6">
                                                                <label class="fs-5 fw-bold form-label mb-3">
                                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Answer')); ?>

                                                                    <?php echo e($index); ?> (<?php echo e(__('methods.' . $lang)); ?>)
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    value="<?php echo e(old("answer_{$index}.$key") ?? $quizze->getTranslation("answer_{$index}", $key)); ?>"
                                                                    placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Enter Answer')); ?> <?php echo e($index); ?> (<?php echo e(__('methods.' . $lang)); ?>)"
                                                                    name="answer_<?php echo e($index); ?>[<?php echo e($key); ?>]" />
                                                                <?php $__errorArgs = ["answer_{$index}.$key"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="text-danger"
                                                                        role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        


                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>

                                        <div class="col-md-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Question Score')); ?>:</label>
                                            <input type="number" name="question_score"
                                                class="form-control form-control-solid" value="<?php echo e(old('question_score')); ?>"
                                                placeholder=" <?php echo e(\App\Helpers\TranslationHelper::translate('Question Score')); ?>">
                                            <?php $__errorArgs = ['question_score'];
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

                                        <div class="col-12 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Correct Answer')); ?>

                                            </label>
                                            <select class="form-control form-control-solid" name="c_answer">
                                                <option value="">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Select Correct Answer')); ?>

                                                </option>
                                                <?php $__currentLoopData = range(1, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="answer_<?php echo e($index); ?>"
                                                        <?php echo e(old('c_answer', $quizze->c_answer) == "answer_$index" ? 'selected' : ''); ?>>
                                                        <?php echo e(\App\Helpers\TranslationHelper::translate('Answer')); ?>

                                                        <?php echo e($index); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['c_answer'];
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


                                        <div class="col-12 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Hint')); ?>

                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="hint" value="<?php echo e(old('hint', $quizze->hint)); ?>  " placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Hint')); ?>">
                                            <?php $__errorArgs = ['hint'];
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
        function addQuestion() {
            let container = document.getElementById('questions-container');
            let questionBlocks = container.getElementsByClassName('question-block');
            let newQuestion = questionBlocks[0].cloneNode(true);

            newQuestion.querySelectorAll('input').forEach(input => {
                input.value = '';
            });

            newQuestion.querySelector('.remove-question-btn').classList.remove('d-none');
            container.appendChild(newQuestion);
        }

        function removeQuestion(element) {
            let container = document.getElementById('questions-container');
            if (container.getElementsByClassName('question-block').length > 1) {
                element.closest('.question-block').remove();
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/test/form_test.blade.php ENDPATH**/ ?>
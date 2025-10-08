<?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Test Details')); ?>
<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
        ['text' => \App\Helpers\TranslationHelper::translate('Tests'), 'link' => route('admin.test.index')],
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

    <div class="container mt-4">
        <h3 class="mb-4"><?php echo e(\App\Helpers\TranslationHelper::translate('Test Questions and Answers')); ?></h3>
<p class="mb-3">
    <?php echo e(\App\Helpers\TranslationHelper::translate('Total Questions')); ?>:
    <strong><?php echo e($test->quizzes->count()); ?></strong> <?php echo e(\App\Helpers\TranslationHelper::translate('number of student questions')); ?>:  <strong><?php echo e($test->number_student_questions); ?></strong>
</p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Question')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Answers')); ?></th>
                      <th><?php echo e(\App\Helpers\TranslationHelper::translate('question_score')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Actions')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $test->quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="quizzes_<?php echo e($quiz->id); ?>">
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo $quiz->title; ?></td>
                            
                            <td>
                                <ul class="list-unstyled">
                                    <?php $__currentLoopData = ['answer_1', 'answer_2', 'answer_3','answer_4']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="mb-3 d-flex align-items-center gap-3">
                                            <?php
                                                $image = $quiz->getFirstMediaUrl("{$answer}_image");
                                            ?>

                                            <?php if($quiz->c_answer === $answer): ?>
                                                <strong class="text-success d-flex align-items-center gap-2">
                                                    <i class="bi bi-check-circle-fill"></i> <?php echo e($quiz->$answer); ?>

                                                </strong>
                                            <?php else: ?>
                                                <?php echo e($quiz->$answer); ?>

                                            <?php endif; ?>

                                            <?php if($image): ?>
                                                <img src="<?php echo e($image); ?>" alt="Answer Image" width="60"
                                                    class="rounded shadow-sm border" />
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </td>

                                                         <td><?php echo e($quiz->question_score); ?></td>


                            <td>

                                <?php if(auth()->guard('admin')->user()->can('test.edit', 'admin')): ?>
                                    <a href="<?php echo e(route('admin.quizzes.edit', ['test' => $quiz->id])); ?>"
                                        class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                        title="<?php echo e(\App\Helpers\TranslationHelper::translate('Edit')); ?>">
                                        <img src="<?php echo e(asset('dashboard/assets/img/edit.png')); ?>" alt="edit"
                                            style="width: 25px">
                                    </a>
                                <?php endif; ?>


                                <?php if(auth()->guard('admin')->user()->can('test.delete', 'admin')): ?>
                                    <button type="button"
                                        data-url="<?php echo e(route('admin.quizzes.destroy', ['quizze' => $quiz->id])); ?>"
                                        data-item-id="<?php echo e($quiz->id); ?>"
                                        class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button" data-toggle="modal"
                                        data-target="#delete_modal">
                                        <img src="<?php echo e(asset('dashboard/assets/img/delete.png')); ?>" alt="edit"
                                            style="width: 25px">
                                    </button>
                                <?php endif; ?>


                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo $__env->make('admin.layouts.delete-modal', [
        'action_message' => \App\Helpers\TranslationHelper::translate('This Item'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('admin_js'); ?>
    <script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sameh-elearning\resources\views/admin/pages/test/show_answers.blade.php ENDPATH**/ ?>
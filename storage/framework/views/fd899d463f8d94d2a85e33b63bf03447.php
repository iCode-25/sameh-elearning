<?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Codes Details')); ?>
<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
        ['text' => \App\Helpers\TranslationHelper::translate('Codes'), 'link' => route('admin.coupon.index')],
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
        <div class="row px-0 mt-3 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-2">
                <form method="GET" action="<?php echo e(route('admin.coupon.show', $group->id)); ?>">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control search-input"
                            placeholder="<?php echo e(__('Search by Code')); ?>" value="<?php echo e(request('search')); ?>">
                        <button class="btn btn-primary search-button" type="submit">
                            <i class="fas fa-search"></i> <?php echo e(__('Search')); ?>

                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-end mb-2">
                <a href="<?php echo e(route('admin.coupon.show', ['coupon' => $group->id, 'export' => 'true'])); ?>"
                    class="btn btn-success export-button">
                    <i class="fas fa-file-excel"></i> <?php echo e(__('Export to Excel')); ?>

                </a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover coupon-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Code')); ?></th>
                                <th><?php echo e(__('user Name')); ?></th>
                                <th><?php echo e(__('Code Status')); ?></th>
                                <th><?php echo e(__('group name')); ?></th>
                                  <th><?php echo e(__('Coupon Price')); ?></th>


                                <th><?php echo e(__('type group Lessons & Package')); ?></th>


                                <th><?php echo e(__('Date Created')); ?></th>
                                <th><?php echo e(__('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($coupon->code); ?></td>

                                    <?php if($coupon?->voucherspages->first()?->user): ?>
                                        <td><?php echo e($coupon?->voucherspages->first()?->user?->name . ' ' . $coupon?->voucherspages->first()?->user?->l_name); ?></td>
                                    <?php else: ?>
                                        <td><?php echo e(__('N/A')); ?></td>
                                    <?php endif; ?>

                                    <td>
                                        <?php if($coupon->voucherspages->first()): ?>
                                            <?php if($coupon->voucherspages->first()->status == 'active'): ?>
                                                <?php echo e(__('Active')); ?>

                                            <?php elseif($coupon->voucherspages->first()->status == 'inactive'): ?>
                                                <?php echo e(__('Inactive')); ?>

                                            <?php else: ?>
                                                <?php echo e(__('Pending')); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo e(__('No Status')); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo e($coupon->group->name); ?></td>
                                     <td><?php echo e($coupon->group->points); ?></td>
                                    <td><?php echo e($coupon->group->type_group); ?></td>

                                    <td>
                                        <?php echo e($coupon->created_at->format('Y-m-d H:i')); ?>

                                    </td>

                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="toggle-status" data-id="<?php echo e($coupon->id); ?>"
                                                <?php echo e($coupon->is_valid === 'valid' ? 'checked' : ''); ?>>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <?php echo e(__('No Codes Available')); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('admin_js'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-status').forEach(function(switchButton) {
                switchButton.addEventListener('change', function() {
                    const couponId = this.getAttribute('data-id');
                    const isChecked = this.checked;
                    const url = '<?php echo e(route('admin.toggleStatus', ':id')); ?>'.replace(':id',
                        couponId);
                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({
                                is_valid: isChecked ? 'valid' : 'not valid'
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (!data.success) {
                                this.checked = !isChecked;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            this.checked = !isChecked;
                        });
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/coupon/show.blade.php ENDPATH**/ ?>
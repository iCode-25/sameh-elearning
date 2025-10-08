

<?php if(auth()->guard('admin')->user()->can('packages.show_package_lessons', 'admin')): ?>
    <a href="<?php echo e(route('admin.packages.show_package_lessons', ['packages' => $packages->id])); ?>"
        class="btn btn-sm btn-clean btn-icon btn-icon-md"
        title="<?php echo e(\App\Helpers\TranslationHelper::translate('Show Package Lessons')); ?>">
        <img src="<?php echo e(asset('dashboard/assets/img/video.png')); ?>" alt="show" style="width: 25px">
    </a>
<?php endif; ?>

<?php if(auth()->guard('admin')->user()->can('packages.view_details', 'admin')): ?>
    <a href="<?php echo e(route('admin.packages.show', ['packages' => $packages->id])); ?>"
        class="btn btn-sm btn-clean btn-icon btn-icon-md"
        title="<?php echo e(\App\Helpers\TranslationHelper::translate('Show Details')); ?>">
        <img src="<?php echo e(asset('dashboard/assets/img/show.png')); ?>" alt="show" style="width: 25px">
    </a>
<?php endif; ?>

<?php if(auth()->guard('admin')->user()->can('packages.edit', 'admin')): ?>
    <a href="<?php echo e(route('admin.packages.edit', ['packages' => $packages->id])); ?>"
        class="btn btn-sm btn-clean btn-icon btn-icon-md"
        title="<?php echo e(\App\Helpers\TranslationHelper::translate('Edit')); ?>">
        <img src="<?php echo e(asset('dashboard/assets/img/edit.png')); ?>" alt="edit" style="width: 25px">
    </a>
<?php endif; ?>

<?php if(auth()->guard('admin')->user()->can('packages.delete', 'admin')): ?>
    <button type="button" data-url="<?php echo e(route('admin.packages.destroy', ['packages' => $packages->id])); ?>"
        data-item-id="<?php echo e($packages->id); ?>" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
        data-toggle="modal" data-target="#delete_modal">
        <img src="<?php echo e(asset('dashboard/assets/img/delete.png')); ?>" alt="edit" style="width: 25px">
    </button>
<?php endif; ?>

<script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<?php /**PATH C:\laragon\www\sameh-elearning\resources\views/admin/pages/packages/buttons.blade.php ENDPATH**/ ?>
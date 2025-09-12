
<?php if(auth()->guard('admin')->user()->can('level.edit', 'admin')): ?>
    <a href="<?php echo e(route('admin.level.edit', ['level' => $level->id])); ?>"
        class="btn btn-sm btn-clean btn-icon btn-icon-md" title="<?php echo e(\App\Helpers\TranslationHelper::translate('Edit')); ?>">
        <img src="<?php echo e(asset('dashboard/assets/img/edit.png')); ?>" alt="edit" style="width: 25px">
    </a>
<?php endif; ?>
<?php if(auth()->guard('admin')->user()->can('level.delete', 'admin')): ?>
    <button type="button" data-url="<?php echo e(route('admin.level.destroy', ['level' => $level->id])); ?>"
        data-item-id="<?php echo e($level->id); ?>" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
        data-toggle="modal" data-target="#delete_modal">
        <img src="<?php echo e(asset('dashboard/assets/img/delete.png')); ?>" alt="edit" style="width: 25px">
    </button>
<?php endif; ?>
<script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/level/buttons.blade.php ENDPATH**/ ?>
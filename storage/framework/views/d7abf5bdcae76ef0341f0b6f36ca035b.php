   <?php if(auth()->guard('admin')->user()->can('controlExpirationDuration.view_details', 'admin')): ?>
<a href="<?php echo e(route('admin.controlExpirationDuration.show',['controlExpirationDuration'=>$controlExpirationDuration->id])); ?>"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="<?php echo e(\App\Helpers\TranslationHelper::translate('Show Details')); ?>">
    <img src="<?php echo e(asset('dashboard/assets/img/show.png')); ?>" alt="show" style="width: 25px">
</a>
<?php endif; ?>

   <?php if(auth()->guard('admin')->user()->can('controlExpirationDuration.edit', 'admin')): ?>
<a href="<?php echo e(route('admin.controlExpirationDuration.edit',['controlExpirationDuration'=>$controlExpirationDuration->id])); ?>"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="<?php echo e(\App\Helpers\TranslationHelper::translate('Edit')); ?>">
    <img src="<?php echo e(asset('dashboard/assets/img/edit.png')); ?>" alt="edit" style="width: 25px">
</a>
<?php endif; ?>


<script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/controlExpirationDuration/buttons.blade.php ENDPATH**/ ?>
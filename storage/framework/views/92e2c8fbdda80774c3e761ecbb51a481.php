    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<?php if(auth()->guard('admin')->user()->can('client.view_details', 'admin')): ?>
<a href="<?php echo e(route('admin.client.show',['client'=>$client->id])); ?>"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="<?php echo e(\App\Helpers\TranslationHelper::translate('Show Details')); ?>">
    <img src="<?php echo e(asset('dashboard/assets/img/show.png')); ?>" alt="show" style="width: 25px">
</a>
<?php endif; ?>


<?php if(auth()->guard('admin')->user()->can('client.delete', 'admin')): ?>
<button type="button" data-url="<?php echo e(route('admin.client.destroy',['client'=>$client->id])); ?>"
   data-item-id="<?php echo e($client->id); ?>"
   class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
   data-toggle="modal"
   data-target="#delete_modal">
    <img src="<?php echo e(asset('dashboard/assets/img/delete.png')); ?>" alt="edit" style="width: 25px">
</button>
<?php endif; ?>


<script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<?php /**PATH C:\laragon\www\Qurtum\resources\views/admin/pages/client/buttons.blade.php ENDPATH**/ ?>
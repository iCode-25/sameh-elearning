
<a href="<?php echo e(route('admin.videos.show',['videos'=>$videos->lesson_id ?? $videos->id])); ?>"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="<?php echo e(\App\Helpers\TranslationHelper::translate('Show Details')); ?>">
    <img src="<?php echo e(asset('dashboard/assets/img/show.png')); ?>" alt="show" style="width: 25px">
</a>




<a href="<?php echo e(route('admin.videos.edit',['videos'=>$videos->lesson_id ?? $videos->id])); ?>"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="<?php echo e(\App\Helpers\TranslationHelper::translate('Edit')); ?>">
    <img src="<?php echo e(asset('dashboard/assets/img/edit.png')); ?>" alt="edit" style="width: 25px">
</a>


<button type="button" data-url="<?php echo e(route('admin.videos.destroy',['videos'=>$videos->lesson_id ?? $videos->id])); ?>"
   data-item-id="<?php echo e($videos->lesson_id ?? $videos->id); ?>"
   class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
   data-toggle="modal"
   data-target="#delete_modal">
    <img src="<?php echo e(asset('dashboard/assets/img/delete.png')); ?>" alt="edit" style="width: 25px">
</button>


<script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>

<?php /**PATH C:\laragon\www\sameh-elearning\resources\views/admin/pages/videos/buttons.blade.php ENDPATH**/ ?>
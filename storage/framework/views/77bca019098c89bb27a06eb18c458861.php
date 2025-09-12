<a href="<?php echo e(route('admin.videos.show', ['videos' => $videos->lesson_id ?? $videos->id])); ?>"
    class="btn btn-sm btn-clean btn-icon btn-icon-md"
    title="<?php echo e(\App\Helpers\TranslationHelper::translate('Show Details')); ?>">
    <img src="<?php echo e(asset('dashboard/assets/img/show.png')); ?>" alt="show" style="width: 25px">
</a>


<a href="<?php echo e(route('admin.videos.edit', ['videos' => $videos->lesson_id ?? $videos->id])); ?>"
    class="btn btn-sm btn-clean btn-icon btn-icon-md" title="<?php echo e(\App\Helpers\TranslationHelper::translate('Edit')); ?>">
    <img src="<?php echo e(asset('dashboard/assets/img/edit.png')); ?>" alt="edit" style="width: 25px">
</a>



<form class="delete-form"
    action="<?php echo e(route('admin.packages.removeLessonFromPackage', ['packages' => $packages->id, 'lesson' => $videos->id])); ?>"
    method="POST" style="display: inline;">
    <?php echo csrf_field(); ?>
    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md"
        title="<?php echo e(\App\Helpers\TranslationHelper::translate('Remove Lesson From Package')); ?>">
        <img src="<?php echo e(asset('dashboard/assets/img/false.png')); ?>" alt="remove" style="width: 25px">
    </button>
</form>


<?php $__env->startPush('admin_js'); ?>

<script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); 

            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن تتمكن من التراجع عن هذا الإجراء!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'نعم، احذف!',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); 
                }
            });
        });
    });
});

</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/packages/lessons_buttons.blade.php ENDPATH**/ ?>
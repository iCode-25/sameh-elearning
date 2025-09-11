<label class="custom-switch mb-0 mt-1">
    <input type="checkbox" onchange="changeGroupStatus(this)" data-url="<?php echo e(route('admin.coupon.changeStatus', $row->id)); ?>"
        <?php echo e($row->is_banned == 1 ? 'checked' : ''); ?>>
    <span class="custom-slider"></span>
</label>


<?php /**PATH C:\laragon\www\sameh-elearning\resources\views/admin/pages/coupon/switch.blade.php ENDPATH**/ ?>
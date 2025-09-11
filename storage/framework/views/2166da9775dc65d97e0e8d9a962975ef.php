<!-- Jquery Js -->
<script src="<?php echo e(asset('front/assets/js/vendor/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/js/vendor/jquery-3.7.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/js/vendor/slick.min.js')); ?>"></script>

<script src="<?php echo e(asset('front/assets/js/app.js')); ?>"></script>

<script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    document.addEventListener('selectstart', event => event.preventDefault());
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && (e.key === 'c' || e.key === 'u' || e.key === 's')) {
            e.preventDefault();
        }
    });

    const watermark = document.getElementById('watermark');
    const name = <?php echo json_encode(auth('web')->user()->name ?? 'Guest'); ?>;
    const level = <?php echo json_encode(auth('web')->user()->level?->name ?? ''); ?>;
    watermark.innerText = `${name} - ${level}`;

    setInterval(() => {
        watermark.innerText = `${name} - ${level}`;
    }, 60000);
</script>

<script>
    document.getElementById('enrollForm').addEventListener('click', function () {
        document.getElementById('spinner-overlay').style.display = 'flex';
    });
</script>


<?php echo $__env->yieldPushContent('js'); ?>
<?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/front/includes/scripts.blade.php ENDPATH**/ ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Future HUB|| E-Learning HTML Template">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Mr-AbdulHamid Quritem</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(setting('image_logo_web', 'en')); ?>">

    <!-- All CSS files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/vendor/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/vendor/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/vendor/slick-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/app.css')); ?>">
    <?php if(app()->getLocale() == 'ar'): ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<?php /**PATH D:\xampp_new\htdocs\abdElHmidQuritem\resources\views/front/includes/head.blade.php ENDPATH**/ ?>
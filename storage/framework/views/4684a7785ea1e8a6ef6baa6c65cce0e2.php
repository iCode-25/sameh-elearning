<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e(\App\Helpers\TranslationHelper::translate('Samah Shtain ')); ?></title>
    
    <meta charset="utf-8"/>
    <meta name="description"
          content="<?php echo e(\App\Helpers\TranslationHelper::translate('Samah Shtain Dashboard')); ?>"/>
    <meta name="keywords"
          content="<?php echo e(\App\Helpers\TranslationHelper::translate('Samah Shtain Dashboard')); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="<?php echo e(\App\Helpers\TranslationHelper::translate('Samah Shtain Dashboard')); ?>"/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content="<?php echo e(\App\Helpers\TranslationHelper::translate('Samah Shtain ')); ?>"/>
    <link rel="canonical" href=""/>
    <link rel="shortcut icon" href="<?php echo e(asset('dashboard/assets/media/logos/logo.png')); ?>"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <link href="<?php echo e(asset('dashboard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('dashboard/assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.8/build/css/intlTelInput.css">

    <link href="<?php echo e(asset('dashboard/assets/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('dashboard/assets/css/custom.css')); ?>" rel="stylesheet" type="text/css"/>
    <script>
    // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>


<body id="kt_body" class="app-blank">
<script>var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
    <style>
        body {
            background-image: url('<?php echo e(asset('dashboard/assets/media/auth/bg10.jpeg')); ?>');
        }

        [data-bs-theme="dark"] body {
            background-image: url('<?php echo e(asset('dashboard/assets/media/auth/bg10-dark.jpeg')); ?>');
        }
    </style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
<?php echo $__env->yieldContent('content'); ?>
<!--end::Authentication - Sign-in-->
</div>
<!--end::Authentication - Multi-steps-->
<!--end::Root-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<script src="<?php echo e(asset('dashboard/assets/plugins/global/plugins.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/assets/js/scripts.bundle.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.8/build/js/intlTelInput.min.js"></script>

<script src="<?php echo e(asset('dashboard/assets/js/custom/utilities/modals/create-account.js')); ?>"></script>
<script>
    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.8/build/js/utils.js",
    });
</script>
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
<?php /**PATH C:\laragon\www\sameh-elearning\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>
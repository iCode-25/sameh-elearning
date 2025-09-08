<!DOCTYPE html>

<html <?php if(app()->getLocale() == 'ar'): ?> lang="ar" dir="rtl" <?php else: ?> lang="en" dir="ltr" <?php endif; ?>>

<?php echo $__env->make('front.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<body class="x-hidden">
    

    <!-- Preloader-->
    <div id="preloader">
        <div class="book">
            <div class="inner">
                
                
                
                

                <img src="<?php echo e(asset('front/assets/media/preloader.gif')); ?>" alt="" srcset="">

            </div>
        </div>
    </div>
    <!-- Preloader-->

    <!-- Overlay Spinner -->
    <div id="spinner-overlay" class="spinner-overlay" style="display: none;">
        <div class="spinner-loader"></div>
    </div>

    <!-- Main Wrapper Start -->

    <!-- HEADER MENU START -->
    <?php echo $__env->make('front.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- HEADER MENU END -->

    
    <?php echo $__env->yieldContent('content'); ?>
    

    <!-- FOOTER START -->
    <?php echo $__env->make('front.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- FOOTER END -->

    <!-- Main Wrapper End -->

    <!-- Back To Top Start -->
    <button class="scrollToTopBtn"><i class="fa fa-arrow-up"></i></button>


    <!-- Mobile Menu Start -->
    <?php echo $__env->make('front.includes.mobile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Mobile Menu End -->



    <?php echo $__env->make('front.includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\xampp_new\htdocs\abdElHmidQuritem\resources\views/front/layouts/app.blade.php ENDPATH**/ ?>
<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
        <div class="logo-box">
            <a href="<?php echo e(route('site.home')); ?>" aria-label="logo image">
                <img src="<?php echo e(setting('image_logo_web', 'en')); ?>" alt="">
            </a>
        </div>
        <div class="mobile-nav__container"></div>
        <ul class="mobile-nav__contact list-unstyled">
            <?php if(auth()->guard()->check()): ?>
                <li class="d-flex justify-content-between">
                    <a href="<?php echo e(route('user.profile')); ?>" class="mobile-nav__contact-item">
                        <?php echo e(auth()->user()->name); ?>

                    </a>
                    <i class="fa fa-user"></i>
                </li>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                <li class="d-flex justify-content-between p-0">
                    <a href="<?php echo e(route('user.login.form')); ?>" class="mobile-nav__contact-item">
                        <?php echo e(App\Helpers\TranslationHelper::translate('login')); ?>

                    </a>
                    <i class="fa fa-user"></i>
                </li>
            <?php endif; ?>
            
        </ul>
        <div class="mobile-nav__social">
            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\sameh-elearning\resources\views/front/includes/mobile-menu.blade.php ENDPATH**/ ?>
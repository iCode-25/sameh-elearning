<header class="header fixed-top">
    <div class="container-fluid">
        <nav class="navigation d-flex align-items-center justify-content-between">

            <!-- Logo -->
            <a href="<?php echo e(route('site.home')); ?>" class="brand-name text-decoration-none">
                <span class="first-part"><?php echo e(\App\Helpers\TranslationHelper::translate('Eng')); ?></span>
                <span class="middle-part">.</span>
                <span class="last-part"><?php echo e(\App\Helpers\TranslationHelper::translate('Samah Shtain')); ?></span>
            </a>

            <!-- Menu -->
            <div class="menu-button-right">
                <div class="main-menu__nav">
                    <ul class="main-menu__list d-flex gap-4">
                        <li><a href="<?php echo e(route('site.home')); ?>" class="nav-link <?php echo e(request()->routeIs('site.home') ? 'active' : ''); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('home')); ?></a></li>
                        <li><a href="<?php echo e(route('site.about')); ?>" class="nav-link <?php echo e(request()->routeIs('site.about') ? 'active' : ''); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('ABOUT US')); ?></a></li>
                        <li><a href="<?php echo e(route('site.blogs')); ?>" class="nav-link <?php echo e(request()->routeIs('site.blogs*') ? 'active' : ''); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('BLOG')); ?></a></li>
                        <li><a href="<?php echo e(route('site.lessons')); ?>" class="nav-link <?php echo e(request()->routeIs('site.lessons*') ? 'active' : ''); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('Lessons')); ?></a></li>
                        <li><a href="<?php echo e(route('site.packages')); ?>" class="nav-link <?php echo e(request()->routeIs('site.packages*') ? 'active' : ''); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('Packages')); ?></a></li>
                        <li><a href="<?php echo e(route('site.contact')); ?>" class="nav-link <?php echo e(request()->routeIs('site.contact') ? 'active' : ''); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('CONTACT')); ?></a></li>
                    </ul>
                </div>
            </div>

            <!-- Right side -->
            <div class="main-menu__right d-flex align-items-center gap-3">

                

                <!-- زرار Login -->
<?php if(auth()->guard('web')->guest()): ?>
    <a href="<?php echo e(route('user.login.form')); ?>" class="login-glass-btn d-flex align-items-center gap-2">
        <i class="fas fa-user"></i>
        <span><?php echo e(\App\Helpers\TranslationHelper::translate('Login')); ?></span>
    </a>
<?php endif; ?>



<style>
    /* Login Button - Glass style */
.login-glass-btn {
    padding: 10px 20px;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: var(--primary-color) !important;
    font-weight: 600;
    font-size: 15px;
    transition: all .3s ease-in-out;
}
.login-glass-btn:hover {
    background: var(--primary-color);
    color: #fff !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}
.login-glass-btn i {
    font-size: 16px;
}

/* Language Dropdown */
.lang-btn {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: none;
    background: var(--primary-color);
    color: #fff;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all .3s ease-in-out;
}
.lang-btn:hover {
    background: var(--secondary-color);
    transform: rotate(10deg) scale(1.1);
}
.lang-dropdown .dropdown-menu {
    border-radius: 12px;
    padding: 8px 0;
}
.lang-dropdown .dropdown-item {
    font-weight: 600;
    font-size: 14px;
}
.lang-dropdown img {
    border-radius: 2px;
}

</style>

                <!-- Language -->
                <div class="lang-toggle-btn">
                    <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($localeCode != app()->getLocale()): ?>
                            <a href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>" class="lang-circle"><?php echo e(strtoupper($localeCode)); ?></a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Mobile Menu -->
                <a href="#" class="d-xl-none d-flex main-menu__toggler mobile-nav__toggler">
                    <img src="<?php echo e(asset('front/assets/media/icons/menu-2.png')); ?>" alt="">
                </a>
            </div>


        </nav>
    </div>
</header>

<style>

.cus-btn {
    padding: 10px 24px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: #fff !important;
    border-radius: 50px;
    font-weight: 600;
    font-size: 15px; 
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    transition: all .3s ease-in-out;
}
.cus-btn:hover {
    background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.2);
}


.lang-circle {
    width: 42px; 
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px; 
    background: #f5f5f5;
    color: var(--primary-color);
    font-weight: 600;
    font-size: 14px;
    border: 1px solid var(--primary-color);
    transition: all 0.3s ease;
}
.lang-circle:hover {
    background: var(--primary-color);
    color: #fff;
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

/* Navbar Base */
.header {
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
    transition: all 0.4s ease-in-out;
    z-index: 999;
}
.header.scrolled {
    background: #fff;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
}

/* Brand */
.brand-name {
    font-size: 28px;
    font-weight: 700;
    font-family: 'Poppins', sans-serif;
    color: var(--primary-color);
    transition: 0.3s ease;
}
.brand-name:hover { transform: scale(1.05); }
.brand-name .last-part { text-transform: uppercase; }

/* Menu Links */
.nav-link {
    position: relative;
    font-weight: 600;
    color: #333;
    transition: color 0.3s ease;
}
.nav-link::after {
    content: "";
    position: absolute;
    bottom: -4px; left: 0;
    width: 0; height: 2px;
    background: var(--primary-color);
    transition: width 0.3s ease;
}
.nav-link:hover::after,
.nav-link.active::after { width: 100%; }
.nav-link.active { color: var(--primary-color); }

/* Buttons */
/* .cus-btn {
    padding: 8px 18px;
    background: var(--primary-color);
    color: #fff !important;
    border-radius: 50px;
    font-weight: 600;
    transition: all .3s;
}
.cus-btn:hover { background: var(--secondary-color); } */

/* Avatar */
.avatar-img {
    width: 42px; height: 42px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--primary-color);
    transition: 0.3s;
}
.avatar-img:hover { transform: scale(1.08); }


</style>

<script>
window.addEventListener("scroll", function() {
    document.querySelector(".header").classList.toggle("scrolled", window.scrollY > 50);
});
</script>



<?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/front/includes/header.blade.php ENDPATH**/ ?>
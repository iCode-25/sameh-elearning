<header class="header">
    <div class="container-fluid">
        <nav class="navigation d-flex align-items-center justify-content-between">
            <a href="<?php echo e(route('site.home')); ?>" class="brand-name text-decoration-none">
                <span class="first-part"><?php echo e(\App\Helpers\TranslationHelper::translate('Mr')); ?></span><span
                    class="middle-part">.</span><span
                    class="last-part"><?php echo e(\App\Helpers\TranslationHelper::translate('AbdulHamid')); ?></span>
            </a>

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Poppins:wght@700&display=swap');

                .brand-name {
                    font-size: 28px;
                    font-weight: 700;
                    font-family: 'Cairo', sans-serif;
                    color: var(--primary-color);
                    display: inline-block;
                    letter-spacing: 1.5px;
                    transition: all 0.4s ease-in-out;
                }

                .brand-name:hover {
                    background-position: right center;
                    transform: scale(1.08);
                }

                .brand-name .first-part {
                    font-style: normal;
                }

                .brand-name .middle-part {
                    margin: 0 3px;
                    font-weight: 400;
                    color: var(--primary-color);
                    -webkit-text-fill-color: #ccc;
                    background: none;
                }

                .brand-name .last-part {
                    text-transform: uppercase;
                }
            </style>

            <div class="menu-button-right">
                <div class="main-menu__nav">
                    <ul class="main-menu__list">
                        <li>
                            <a href="<?php echo e(route('site.home')); ?>"
                                class="text-bold <?php echo e(request()->routeIs('site.home') ? 'active' : ''); ?>">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('home')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('site.about')); ?>"
                                class="text-bold <?php echo e(request()->routeIs('site.about') ? 'active' : ''); ?>">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('ABOUT US')); ?>

                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo e(route('site.blogs')); ?>"
                                class="text-bold <?php echo e(request()->routeIs('site.blogs*') ? 'active' : ''); ?>">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('BLOG')); ?>

                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo e(route('site.lessons')); ?>"
                                class="text-bold <?php echo e(request()->routeIs('site.lessons*') ? 'active' : ''); ?>">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Lessons')); ?>

                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo e(route('site.packages')); ?>"
                                class="text-bold <?php echo e(request()->routeIs('site.packages*') ? 'active' : ''); ?>">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Packages')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('site.contact')); ?>"
                                class="text-bold <?php echo e(request()->routeIs('site.contact') ? 'active' : ''); ?>">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('CONTACT')); ?>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-menu__right">
                <div class="search-heart-icon d-sm-flex d-none align-items-center gap-24">

                    <?php if(auth()->guard('web')->guest()): ?>
                        <a href="<?php echo e(route('user.login.form')); ?>" class="cus-btn">
                            <span class="btn-text"><?php echo e(\App\Helpers\TranslationHelper::translate('login')); ?></span>
                            <span><?php echo e(\App\Helpers\TranslationHelper::translate('login')); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php if(auth()->guard('web')->check()): ?>
                        <div class="avatar-circle dropdown">
                            <a href="#" class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php if(auth('web')->user()->getFirstMediaUrl('users')): ?>
                                    <img src="<?php echo e(auth('web')->user()->getFirstMediaUrl('users')); ?>" alt="avatar"
                                        class="avatar-img">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('front/assets/media/user/default.jpg')); ?>" alt="avatar"
                                        class="avatar-img">
                                <?php endif; ?>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item"
                                        href="<?php echo e(route('user.profile')); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('profile')); ?></a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(\App\Helpers\TranslationHelper::translate('Logout')); ?></a>
                                </li>
                            </ul>
                            <form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="POST"
                                style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    <?php endif; ?>

                    <div class="lang-toggle-btn ms-3">
                        <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($localeCode != app()->getLocale()): ?>
                                <a href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>"
                                    class="lang-circle">
                                    <?php echo e(strtoupper($localeCode)); ?>

                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                    <style>
                        .avatar-circle {
                            display: inline-block;
                            position: relative;
                        }

                        .avatar-img {
                            width: 40px;
                            height: 40px;
                            border-radius: 50%;
                            object-fit: cover;
                            border: 2px solid var(--primary-color);
                            background: #fff;
                            transition: 0.3s;
                        }

                        .avatar-img:hover {
                            border-color: var(--secondary-color);
                            transform: scale(1.08);
                        }

                        .lang-toggle-btn .lang-circle {
                            width: 40px;
                            height: 40px;
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            background: var(--primary-color);
                            color: #fff;
                            border-radius: 50%;
                            font-weight: bold;
                            text-decoration: none;
                            transition: 0.3s ease;
                        }

                        .lang-toggle-btn .lang-circle:hover {
                            background: var(--secondary-color);
                            color: #fff;
                            transform: scale(1.1) rotate(5deg);
                        }
                    </style>


                </div>
                <a href="#" class="d-xl-none d-flex main-menu__toggler mobile-nav__toggler">
                    <img src="<?php echo e(asset('front/assets/media/icons/menu-2.png')); ?>" alt="">
                </a>
            </div>

        </nav>
    </div>
</header>
<?php /**PATH C:\laragon\www\sameh-elearning\resources\views/front/includes/header.blade.php ENDPATH**/ ?>
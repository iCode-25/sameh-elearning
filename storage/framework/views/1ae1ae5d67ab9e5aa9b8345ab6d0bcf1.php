<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo" style="height: 45px">
        <a href="<?php echo e(route('admin.index')); ?>">
            <h1 style="color: #fff"><?php echo e(\App\Helpers\TranslationHelper::translate('M:AbdulHamid')); ?></h1>
        </a>
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-25px w-25px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-1 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>

    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-0" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">


                    <div class="menu-item <?php echo e(activeSingleLink('admin.index')); ?>">
                        <a class="menu-link" href="<?php echo e(route('admin.index')); ?>">
                            <span class="menu-icon">
                                <i class="ki-solid ki-element-11 fs-2">
                                </i>
                            </span>
                            <span class="menu-title">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Dashboard')); ?></span>
                        </a>
                    </div>


                    <?php if(auth()->guard('admin')->user()->can('roles.view_all', 'admin')): ?>
                        <div class="menu-item <?php echo e(activeLink('admin.role.index')); ?>">
                            <a class="menu-link" href="<?php echo e(route('admin.role.index')); ?>">
                                <span class="menu-icon">
                                    <i class="fas fa-lock fs-2"></i>
                                </span>
                                <span class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Roles')); ?>

                                </span>
                            </a>
                        </div>
                    <?php endif; ?>

                     <?php if(auth()->guard('admin')->user()->can('admins.view_all', 'admin')): ?>
                        <div class="menu-item <?php echo e(activeLink('admin.admin.index')); ?>">
                            <a class="menu-link" href="<?php echo e(route('admin.admin.index')); ?>">
                                <span class="menu-icon">
                                    <i class="fas fa-user-shield fs-2"></i>
                                </span>
                                <span class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Admins')); ?>

                                </span>
                            </a>
                        </div>
                    <?php endif; ?>


                    <?php if(auth()->guard('admin')->user()->can('client.view_all', 'admin')): ?>
                        <div class="menu-item <?php echo e(activeLink('admin.client.index')); ?>">
                            <a class="menu-link" href="<?php echo e(route('admin.client.index')); ?>">
                                <span class="menu-icon">
                                    <i class="fas fa-users fs-2"></i>
                                </span>
                                <span class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Students')); ?>

                                </span>
                            </a>
                        </div>
                    <?php endif; ?>



                    <?php if(auth()->guard('admin')->user()->can('level.view_all', 'admin')): ?>
                        <div class="menu-item <?php echo e(activeLink('admin.level')); ?>">
                            <a class="menu-link" href="<?php echo e(route('admin.level.index')); ?>">
                                <span class="menu-icon">
                                    <i class="fas fa-list-ol fs-2"></i>
                                </span>
                                <span
                                    class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Academic Levels')); ?>

                                </span>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if(auth()->guard('admin')->user()->can('videos.view_all', 'admin')): ?>
                    <div class="menu-item">
                        <a class="menu-link" href="<?php echo e(route('admin.videos.index')); ?>">

                            <span class="menu-icon">
                                <i class="fas fa-video fs-2"></i>


                            </span>
                            <span
                                class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Lessons')); ?></span>
                        </a>
                    </div>
                <?php endif; ?>

                    <?php if(auth()->guard('admin')->user()->can('packages.view_all', 'admin')): ?>
                        <div class="menu-item <?php echo e(activeLink('admin.packages.index')); ?>">
                            <a class="menu-link" href="<?php echo e(route('admin.packages.index')); ?>">
                                <span class="menu-icon">
                                    <i class="fas fa-chalkboard-teacher fs-2"></i>
                                </span>
                                <span class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Monthly Package')); ?>

                                </span>
                            </a>
                        </div>
                    <?php endif; ?>



                    

                <?php if(auth()->guard('admin')->user()->can('controlExpirationDuration.view_all', 'admin')): ?>
                <div class="menu-item <?php echo e(activeLink('admin.controlExpirationDuration.index')); ?>">
                    <a class="menu-link" href="<?php echo e(route('admin.controlExpirationDuration.index')); ?>">
                        <span class="menu-icon">
                            <i class="fas fa-clock fs-2"></i>
                        </span>
                        <span class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Control the expiration duration')); ?>

                        </span>
                    </a>
                </div>
            <?php endif; ?>

                


                    <?php if(auth()->guard('admin')->user()->can('coupon.view_all', 'admin')): ?>
                    <div class="menu-item <?php echo e(activeLink('admin.coupon.index')); ?>">
                        <a class="menu-link" href="<?php echo e(route('admin.coupon.index')); ?>">
                            <span class="menu-icon">
                                <i class="fas fa-tags fs-2"></i>

                            </span>
                            <span class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Coupon Subscriptions')); ?>

                            </span>
                        </a>
                    </div>
                <?php endif; ?> 

                <?php if(auth()->guard('admin')->user()->can('transfers.view_all', 'admin')): ?>
                    <div class="menu-item <?php echo e(activeLink('admin.transfer')); ?>">
                        <a class="menu-link" href="<?php echo e(route('admin.transfer.index')); ?>">
                            <span class="menu-icon">
                               <i class="fas fa-exchange-alt fs-2"></i>
                            </span>
                            <span
                                class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Online purchase transactions')); ?> </span>
                        </a>
                    </div>
                    <?php endif; ?>


                     <?php if(auth()->guard('admin')->user()->can('voucherspage.view_all', 'admin')): ?>
                    <div class="menu-item <?php echo e(activeLink('admin.voucherspage')); ?>">
                        <a class="menu-link" href="<?php echo e(route('admin.voucherspage.index')); ?>">
                            <span class="menu-icon">
                               <i class="fas fa-exchange-alt fs-2"></i>
                            </span>
                            <span
                                class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Coupon purchase transactions')); ?> </span>
                        </a>
                    </div>
                    <?php endif; ?>


                    <?php if(auth()->guard('admin')->user()->can('test.view_all', 'admin')): ?>
                    <div class="menu-item <?php echo e(activeLink('admin.test.index')); ?>">
                        <a class="menu-link" href="<?php echo e(route('admin.test.index')); ?>">
                            <span class="menu-icon">
                                <i class="fas fa-question-circle fs-2"></i>
                            </span>
                            <span class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('tests')); ?>

                            </span>
                        </a>
                    </div>
                <?php endif; ?>



                    <?php if(auth()->guard('admin')->user()->can('blogs.view_all', 'admin')): ?>
                        <div class="menu-item <?php echo e(activeLink('admin.blog.index')); ?>">
                            <a class="menu-link" href="<?php echo e(route('admin.blog.index')); ?>">

                                <span class="menu-icon">
                                    <i class="bi bi-file-text fs-2"></i>
                                </span>
                                <span class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Blogs')); ?>

                                </span>
                            </a>
                        </div>
                    <?php endif; ?>













                    

                    






                    


                    

                    


                    
                    


                    <?php if(auth()->guard('admin')->user()->can('messages.view_all', 'admin')): ?>
                        <div class="menu-item <?php echo e(activeLink('admin.message')); ?>">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?php echo e(route('admin.message.index')); ?>">

                                <span class="menu-icon">
                                    <i class="ki-solid ki-messages fs-2"></i>
                                </span>
                                <span class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Messages')); ?>

                                </span>
                            </a>
                        </div>
                    <?php endif; ?>






                    

                    
                    



                    <!-- Countries -->
                    

                    <!-- Cities -->
                    

                    <!-- Regions -->
                    


                    <!-- Contact -->
                    <?php if(auth()->guard('admin')->user()->can('contact.view_all', 'admin')): ?>
                        <div class="menu-item">
                            <a class="menu-link" href="<?php echo e(route('admin.contact.index')); ?>">

                                <span class="menu-icon">
                                    <i class="fas fa-phone-volume fs-2"></i>
                                </span>
                                <span
                                    class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Setting Contact Page')); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>


                    <!-- Privacy Policy -->
                    

                    <!-- Terms and Conditions -->
                    <div class="menu-item">
                        <a class="menu-link" href="<?php echo e(route('admin.termsandcondition.index')); ?>">
                            <span class="menu-icon">
                                <i class="fas fa-quote-left fs-2"></i>
                            </span>
                            <span
                                class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('Terms and Conditions')); ?></span>
                        </a>
                    </div>


                    


                    <?php if(auth()->guard('admin')->user()->can('all_settings.view_all', 'admin')): ?>
                        <div class="menu-item <?php echo e(activeLink('admin.all_settings')); ?>">
                            <a class="menu-link" href="<?php echo e(route('admin.all_settings.index')); ?>">

                                <span class="menu-icon">
                                    <i class="ki-solid ki-gear fs-2"></i>
                                </span>
                                <span
                                    class="menu-title"><?php echo e(\App\Helpers\TranslationHelper::translate('General Settings')); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
               


                    


                    


                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\Qurtum\resources\views/admin/layouts/includes/aside.blade.php ENDPATH**/ ?>
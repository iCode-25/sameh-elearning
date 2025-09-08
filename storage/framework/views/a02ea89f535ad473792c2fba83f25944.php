<?php $__env->startPush('admin_css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center w-100 mb-10 mb-lg-20 gap-5">
                <img style="width: 100%; max-width: 250px; height: 300px; object-fit: contain;" 
                     class="theme-light-show mx-auto mw-100 custom_logo_light"
                     src="<?php echo e(setting('image_logo_dashboard', 'en')); ?>" alt="Logo Light"/>
        
                <img style="width: 100%; max-width: 250px; height: 180px; object-fit: contain;" 
                     class="mx-auto mw-100"
                     src=" <?php echo e(setting('image_login_dashboard', 'en')); ?>" alt="Client"/>
            </div>
        
            <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                <?php echo e(\App\Helpers\TranslationHelper::translate('Login To your Dashboard')); ?> <br/>
                <small class="text-gray-600 fs-3">
                    <?php echo e(\App\Helpers\TranslationHelper::translate('Fast, Efficient and Productive')); ?>

                </small>
            </h1>
        </div>
      
       
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                    <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                              action="<?php echo e(route('login')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3"><?php echo e(\App\Helpers\TranslationHelper::translate('Log In')); ?></h1>
                                <div class="text-gray-500 fw-semibold fs-6"><?php echo e(\App\Helpers\TranslationHelper::translate('Your Dashboard')); ?></div>
                            </div>
                            <div class="fv-row mb-8">
                                <label
                                    class="font-size-h6 font-weight-bolder text-dark mb-2"><?php echo e(\App\Helpers\TranslationHelper::translate('dashboard.email')); ?></label>
                                <input class="form-control bg-transparent
                                              <?php echo e($errors->has('email')||$errors->has('credentials') ? 'is-invalid' : ''); ?>"
                                       type="email" name="email" autocomplete="off"/>
                                <span class="m-form__help text-danger">
                                        <strong><?php echo e($errors->has('email')?$errors->first('email'):null); ?></strong>
                                    </span>                        
                            </div>
                            <div class="fv-row mb-3">
                                    <label
                                        class="font-size-h6 font-weight-bolder text-dark  mb-2"><?php echo e(\App\Helpers\TranslationHelper::translate('dashboard.password')); ?></label>
                                <input class="form-control bg-transparent
                                     <?php echo e($errors->has('password')||$errors->has('credentials') ? 'is-invalid' : ''); ?>"
                                       type="password" name="password" autocomplete="off"/>
                                <span class="m-form__help text-danger">
                                        <strong><?php echo e($errors->has('password')?$errors->first('password'):null); ?></strong>
                                    </span> <span class="m-form__help text-danger">
                                        <strong><?php echo e($errors->has('credentials')?$errors->first('credentials'):null); ?></strong>
                                    </span>
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary mt-4">
                                    <span class="indicator-label"><?php echo e(\App\Helpers\TranslationHelper::translate('Log In')); ?></span>
                         
                                    <span class="indicator-progress"><?php echo e(\App\Helpers\TranslationHelper::translate('Please wait')); ?>

											<span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('admin_js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\abdElHmidQuritem\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>
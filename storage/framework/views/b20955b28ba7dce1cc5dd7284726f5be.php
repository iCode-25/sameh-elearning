<?php $__env->startSection('content'); ?>
    <!-- TITLE BANNER START -->
    <section class="title-banner">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <div class="title-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="title-content">
                                    <h1 class="dark-gray fw-700"><?php echo e(\App\Helpers\TranslationHelper::translate('register')); ?>

                                    </h1>
                                </div>
                                <div class="img-block">
                                    <img src="<?php echo e(asset('front/assets/media/user/star.png')); ?>" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="<?php echo e(setting('image_banner_page_register_web', 'en')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TITLE BANNER END -->

    <!-- ACCOUNT START -->
    <section class="my-account py-40">
        <div class="container-fluid">
            <div class="row row-gap-4">
                <div class="col-xl-6">
                    <div class="account account-1 p-24">
                        <h3 class="dark-gray mb-12 fw-800"><?php echo e(\App\Helpers\TranslationHelper::translate('Login')); ?></h3>
                        <p class="mb-32 light-gray">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Please Enter your detail to Sign In.')); ?></p>
                        <form action="<?php echo e(route('user.login.submit')); ?>" method="post" class="">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <?php if(session('error')): ?>
                                    <div class="alert alert-danger mb-3" style="font-size: 15px; border-radius: 8px;">
                                        <?php echo e(session('error')); ?>

                                    </div>
                                <?php endif; ?>
                                
                                <div class="col-sm-12">
                                    <div class="input-block mb-24">
                                        <input type="email" name="username" required class="form-control"
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Username or email address')); ?>"
                                            value="<?php echo e(old('username')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="...SVG PATH..." fill="#141516" />
                                        </svg>
                                    </div>
                                </div>

                                
                                <div class="col-sm-12">
                                    <div class="input-block mb-24">
                                        <input type="password" class="form-control password-input" id="passWord"
                                            name="password"
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Password')); ?>"
                                            required>
                                        <i class="fas fa-eye-slash" id="eye"></i>
                                    </div>
                                </div>

                                
                                <div class="col-sm-12">
                                    <button type="submit" class="cus-btn-3">
                                        <span><?php echo e(\App\Helpers\TranslationHelper::translate('login')); ?></span>
                                        <span><?php echo e(\App\Helpers\TranslationHelper::translate('login')); ?></span>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="account p-24">
                        <h3 class="fw-800 dark-gray mb-12"><?php echo e(\App\Helpers\TranslationHelper::translate('register')); ?></h3>
                        <p class="mb-32 light-gray">
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Please Enter your detail to Sign Up.')); ?></p>
                        <form action="<?php echo e(route('user.register.submit')); ?>" method="post" class="">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                

                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <div class="col-md-6">
                                    <div class="input-block mb-24">
                                        <input type="text" name="name" required id="firstName" class="form-control"
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('First Name')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M10 0C7.09223 0 4.72656 2.36566 4.72656 5.27344C4.72656 8.18121 7.09223 10.5469 10 10.5469C12.9078 10.5469 15.2734 8.18121 15.2734 5.27344C15.2734 2.36566 12.9078 0 10 0ZM10 9.375C7.7384 9.375 5.89844 7.53504 5.89844 5.27344C5.89844 3.01184 7.7384 1.17188 10 1.17188C12.2616 1.17188 14.1016 3.01184 14.1016 5.27344C14.1016 7.53504 12.2616 9.375 10 9.375Z"
                                                fill="#141516" />
                                            <path
                                                d="M16.5612 13.992C15.1174 12.5261 13.2035 11.7188 11.1719 11.7188H8.82812C6.79656 11.7188 4.88258 12.5261 3.43883 13.992C2.00215 15.4507 1.21094 17.3763 1.21094 19.4141C1.21094 19.7377 1.47328 20 1.79688 20H18.2031C18.5267 20 18.7891 19.7377 18.7891 19.4141C18.7891 17.3763 17.9979 15.4507 16.5612 13.992ZM2.40859 18.8281C2.70215 15.5045 5.46918 12.8906 8.82812 12.8906H11.1719C14.5308 12.8906 17.2979 15.5045 17.5914 18.8281H2.40859Z"
                                                fill="#141516" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-24">
                                        <input type="text" name="l_name" id="l_name" class="form-control" required
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Last Name')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M10 0C7.09223 0 4.72656 2.36566 4.72656 5.27344C4.72656 8.18121 7.09223 10.5469 10 10.5469C12.9078 10.5469 15.2734 8.18121 15.2734 5.27344C15.2734 2.36566 12.9078 0 10 0ZM10 9.375C7.7384 9.375 5.89844 7.53504 5.89844 5.27344C5.89844 3.01184 7.7384 1.17188 10 1.17188C12.2616 1.17188 14.1016 3.01184 14.1016 5.27344C14.1016 7.53504 12.2616 9.375 10 9.375Z"
                                                fill="#141516" />
                                            <path
                                                d="M16.5612 13.992C15.1174 12.5261 13.2035 11.7188 11.1719 11.7188H8.82812C6.79656 11.7188 4.88258 12.5261 3.43883 13.992C2.00215 15.4507 1.21094 17.3763 1.21094 19.4141C1.21094 19.7377 1.47328 20 1.79688 20H18.2031C18.5267 20 18.7891 19.7377 18.7891 19.4141C18.7891 17.3763 17.9979 15.4507 16.5612 13.992ZM2.40859 18.8281C2.70215 15.5045 5.46918 12.8906 8.82812 12.8906H11.1719C14.5308 12.8906 17.2979 15.5045 17.5914 18.8281H2.40859Z"
                                                fill="#141516" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-24">
                                        <input type="email" name="email" required class="form-control"
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Email')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M18.2422 2.96875H1.75781C0.786602 2.96875 0 3.76023 0 4.72656V15.2734C0 16.2455 0.792383 17.0312 1.75781 17.0312H18.2422C19.2053 17.0312 20 16.2488 20 15.2734V4.72656C20 3.76195 19.2165 2.96875 18.2422 2.96875ZM17.996 4.14062C17.6369 4.49785 11.4564 10.6458 11.243 10.8581C10.9109 11.1901 10.4695 11.3729 10 11.3729C9.53047 11.3729 9.08906 11.1901 8.75594 10.857C8.61242 10.7142 2.50012 4.63414 2.00398 4.14062H17.996ZM1.17188 15.0349V4.96582L6.23586 10.0031L1.17188 15.0349ZM2.00473 15.8594L7.06672 10.8296L7.9284 11.6867C8.48176 12.2401 9.21746 12.5448 10 12.5448C10.7825 12.5448 11.5182 12.2401 12.0705 11.6878L12.9333 10.8296L17.9953 15.8594H2.00473ZM18.8281 15.0349L13.7641 10.0031L18.8281 4.96582V15.0349Z"
                                                fill="#141516" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-24">
                                        <input type="text" name="phone" required class="form-control"
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('phone')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-24">
                                        <input type="password" class="form-control password-input" id="password2"
                                            name="password"
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('password')); ?>"
                                            required>
                                        <i class="fas fa-eye-slash" id="eye-icon"></i>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-24">
                                        <input type="password" class="form-control password-input" id="password2"
                                            name="password_confirmation"
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('password confirmation')); ?>"
                                            required>
                                        <i class="fas fa-eye-slash" id="eye-icon"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-24">
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="" selected>
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('select gender')); ?></option>
                                            <option value="male"><?php echo e(\App\Helpers\TranslationHelper::translate('male')); ?>

                                            </option>
                                            <option value="female">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('female')); ?></option>
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-person" viewBox="0 0 24 24">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-24">
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="" selected>
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Select Type')); ?></option>
                                            <option value="azhar"><?php echo e(\App\Helpers\TranslationHelper::translate('Azhar')); ?></option>
                                            <option value="general"><?php echo e(\App\Helpers\TranslationHelper::translate('General')); ?></option>
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 24 24">
                                            <path
                                                d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-24">
                                        <select name="level_id" id="level" class="form-control" required>
                                            <option value="" selected>
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Select Level')); ?></option>
                                            <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($level->id); ?>"><?php echo e($level->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 24 24">
                                            <path
                                                d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p class="mb-32">
                                        <?php echo e(\App\Helpers\TranslationHelper::translate('Your personal information helps improve your experience on our site, manage your account, and fulfill other purposes as detailed in our')); ?>

                                        <a href="" data-bs-toggle="modal" data-bs-target="#privacyModal"
                                            class="color-sec">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('Terms and Conditions')); ?>.
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="cus-btn-3">
                                        <span><?php echo e(\App\Helpers\TranslationHelper::translate('register')); ?></span>
                                        <span><?php echo e(\App\Helpers\TranslationHelper::translate('register')); ?></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ACCOUNT END -->


    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyModalLabel">
                        <?php echo e(\App\Helpers\TranslationHelper::translate('Terms and Conditions')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><?php echo \App\Models\Termsandcondition::first()->description; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"><?php echo e(\App\Helpers\TranslationHelper::translate('close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/auth/login.blade.php ENDPATH**/ ?>
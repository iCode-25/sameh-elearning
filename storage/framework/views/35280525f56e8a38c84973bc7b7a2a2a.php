<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-5">
        <div class="row g-4" style="margin-top: 100px; min-height: 100vh;">
            <!-- Sidebar -->
            <div class="col-md-3 mb-4">
                <div class="list-group shadow-sm rounded-4 overflow-hidden bg-white border-0" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active py-3 px-4 fw-semibold border-0"
                        id="list-profile-list" data-bs-toggle="list" href="#profile" role="tab"
                        style="background: var(--primary-color); color: #fff;"><i
                            class="bi bi-person-circle mx-2"></i><?php echo e(\App\Helpers\TranslationHelper::translate('Profile Overview')); ?></a>
                    <a class="list-group-item list-group-item-action py-3 px-4 border-0" id="list-academic-list"
                        data-bs-toggle="list" href="#academic" role="tab" style="color: var(--primary-color); background: #fff;"><i
                            class="bi bi-mortarboard mx-2"></i><?php echo e(\App\Helpers\TranslationHelper::translate('Academic Details')); ?></a>
                    <a class="list-group-item list-group-item-action py-3 px-4 border-0" id="list-packages-list"
                        data-bs-toggle="list" href="#packages" role="tab" style="color: var(--primary-color); background: #fff;"><i
                            class="bi bi-box-seam mx-2"></i><?php echo e(\App\Helpers\TranslationHelper::translate('Packages')); ?></a>

                    <a class="list-group-item py-3 px-4 border-0 d-flex align-items-center" target="_blank"
                        href="https://wa.me/<?php echo e(App\Models\Contact::first()->whatsapp); ?>"
                        style="color: var(--primary-color); background: #fff;">
                        <i class="bi bi-whatsapp me-2 fs-5"></i>
                        <?php echo e(\App\Helpers\TranslationHelper::translate('ask mr')); ?>

                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Profile Overview -->
                    <div class="tab-pane fade show active" id="profile" role="tabpanel">

                        <div class="card border-0 shadow rounded-4 p-4 bg-white">
                            <form method="POST" action="<?php echo e(route('user.profile.update')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="text-center mb-4">
                                    <label for="user_avatar" style="cursor: pointer;">
                                        <?php if(auth('web')->user()->getFirstMediaUrl('users')): ?>
                                            <img src="<?php echo e(auth('web')->user()->getFirstMediaUrl('users')); ?>" alt="Profile Picture"
                                                id="avatarPreview" class="rounded-circle shadow mb-3"
                                                style="width: 120px; transition: 0.3s;">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('front/assets/media/user/default.jpg')); ?> "
                                                alt="Profile Picture" id="avatarPreview" class="rounded-circle shadow mb-3"
                                                style="width: 120px; transition: 0.3s;">
                                        <?php endif; ?>
                                    </label>
                                    <input type="file" id="user_avatar" name="user_avatar" accept="image/*"
                                        class="d-none" onchange="previewAvatar(event)">
                                </div>

                                
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="name"
                                            class="form-label fw-semibold"><?php echo e(\App\Helpers\TranslationHelper::translate('First Name')); ?></label>
                                        <input type="text" class="form-control rounded-pill px-4" id="name"
                                            name="name" value="<?php echo e(old('name', auth('web')->user()->name)); ?>" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="l_name"
                                            class="form-label fw-semibold"><?php echo e(\App\Helpers\TranslationHelper::translate('Last Name')); ?></label>
                                        <input type="text" class="form-control rounded-pill px-4" id="l_name"
                                            name="l_name" value="<?php echo e(old('l_name', auth('web')->user()->l_name)); ?>">
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="email"
                                            class="form-label fw-semibold"><?php echo e(\App\Helpers\TranslationHelper::translate('Email')); ?></label>
                                        <input type="email" class="form-control rounded-pill px-4" id="email"
                                            name="email" value="<?php echo e(old('email', auth('web')->user()->email)); ?>" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="phone"
                                            class="form-label fw-semibold"><?php echo e(\App\Helpers\TranslationHelper::translate('Phone')); ?></label>
                                        <input type="text" class="form-control rounded-pill px-4" id="phone"
                                            name="phone" value="<?php echo e(old('phone', auth('web')->user()->phone)); ?>">
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="password"
                                            class="form-label fw-semibold"><?php echo e(\App\Helpers\TranslationHelper::translate('New Password')); ?></label>
                                        <input type="password" class="form-control rounded-pill px-4" id="password"
                                            name="password"
                                            placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Leave blank to keep current password')); ?>">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="password_confirmation"
                                            class="form-label fw-semibold"><?php echo e(\App\Helpers\TranslationHelper::translate('Confirm New Password')); ?></label>
                                        <input type="password" class="form-control rounded-pill px-4"
                                            id="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="level"
                                            class="form-label fw-semibold"><?php echo e(\App\Helpers\TranslationHelper::translate('Level')); ?></label>
                                        <select class="form-select rounded-pill px-4" id="level" name="level_id">
                                            <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($level->id); ?>" <?php if(auth('web')->user()->level_id == $level->id): echo 'selected'; endif; ?>>
                                                    <?php echo e($level->getTranslation('name', app()->getLocale())); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="gender"
                                            class="form-label fw-semibold"><?php echo e(\App\Helpers\TranslationHelper::translate('Gender')); ?></label>
                                        <select class="form-select rounded-pill px-4" id="gender" name="gender">
                                            <option value="" <?php if(auth('web')->user()->gender == null): echo 'selected'; endif; ?>>
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('choose gender')); ?>

                                            </option>
                                            <option value="male" <?php if(auth('web')->user()->gender == 'male'): echo 'selected'; endif; ?>>
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('male')); ?>

                                            </option>
                                            <option value="female" <?php if(auth('web')->user()->gender == 'female'): echo 'selected'; endif; ?>>
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('female')); ?>

                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="type"
                                            class="form-label fw-semibold"><?php echo e(\App\Helpers\TranslationHelper::translate('type')); ?></label>
                                        <select class="form-select rounded-pill px-4" id="type" name="type">
                                            <option value="" <?php if(auth('web')->user()->type == null): echo 'selected'; endif; ?>>
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('choose type')); ?>

                                            </option>
                                            <option value="azhar" <?php if(auth('web')->user()->type == 'azhar'): echo 'selected'; endif; ?>>
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Azhar')); ?>

                                            </option>
                                            <option value="general" <?php if(auth('web')->user()->type == 'general'): echo 'selected'; endif; ?>>
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('General')); ?>

                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn px-4 rounded-pill"
                                        style="background: var(--primary-color); color: #fff;">
                                        <?php echo e(\App\Helpers\TranslationHelper::translate('Save Changes')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Academic Details -->
                    <div class="tab-pane fade" id="academic" role="tabpanel">
                        <div class="card border-0 shadow rounded-4 p-4 bg-white">
                            <h5 class="mb-3 fw-semibold" style="color: var(--primary-color);">
                                <i class="bi bi-mortarboard me-2"></i>
                                Academic Details
                            </h5>
                            <div class="videos">
                                <div class="video-sec">
                                    <div class="row justify-content-center">
                                        <div class="row gy-2">
                                            <?php if($lessons->count() > 0): ?>
                                                <?php echo $__env->make('front.components.lesson', [
                                                    'lessons' => $lessons,
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                                <div class="alert alert-info mb-0">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('lessons not available')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Packages -->
                    <div class="tab-pane fade" id="packages" role="tabpanel">
                        <div class="card border-0 shadow rounded-4 p-4 bg-white">
                            <h5 class="mb-3 fw-semibold" style="color: var(--primary-color);"><i
                                    class="bi bi-mortarboard me-2"></i>Packages</h5>
                            <div class="course-section">
                                <div class="mb-2">
                                    <div class="row row-gap-4">
                                        <?php if(count($packages) > 0): ?>
                                            <?php echo $__env->make('front.components.package', [
                                                'packages' => $packages,
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php else: ?>
                                            <div class="alert alert-info mb-0">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('packages not available')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .list-group-item-action:focus,
        .list-group-item-action:focus-visible,
        .list-group-item-action:focus-within {
            background-color: var(--primary-color) !important;
            border: none;
            color: #fff !important;
            outline: none;
        }

        #avatarPreview:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }
    </style>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        function previewAvatar(event) {
            const input = event.target;
            const preview = document.getElementById('avatarPreview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sameh-elearning\resources\views/front/pages/user_dashboard/profile.blade.php ENDPATH**/ ?>
<?php if($method == 'PUT'): ?>
    <?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Edit Lessons')); ?>
<?php else: ?>
    <?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Add Lessons')); ?>
<?php endif; ?>

<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
        ['text' => \App\Helpers\TranslationHelper::translate('Lessons'), 'link' => route('admin.videos.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ],'button' => [
        'text' => \App\Helpers\TranslationHelper::translate('Go to Lessons'),
        'link' => route('admin.videos.index'),
    ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bread-crumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BreadCrumb::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2072a121b282e859e8bdea9c58b76d8)): ?>
<?php $attributes = $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8; ?>
<?php unset($__attributesOriginalc2072a121b282e859e8bdea9c58b76d8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2072a121b282e859e8bdea9c58b76d8)): ?>
<?php $component = $__componentOriginalc2072a121b282e859e8bdea9c58b76d8; ?>
<?php unset($__componentOriginalc2072a121b282e859e8bdea9c58b76d8); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-body pt-0">
                            <form action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php if($method == 'PUT'): ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type="hidden" name="id" value="<?php echo e($videos->id); ?>">
                                <?php endif; ?>
                                <div class="fv-row mb-10">
                                    <div class="row">
                                        <?php $__currentLoopData = Config('language'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-6 mb-5">
                                                <label class="fs-5 fw-bold form-label mb-5">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Name in')); ?>

                                                    <?php echo e(__('methods.' . $lang)); ?>

                                                    :
                                                </label>
                                                <input type="text" class="form-control form-control-solid"
                                                    value="<?php echo e(old('name.' . $key) ?? $videos->getTranslation('name', $key)); ?>"
                                                    placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Name in')); ?> <?php echo e(__('methods.' . $lang)); ?>"
                                                    name="name[<?php echo e($key); ?>]" />
                                                <?php $__errorArgs = ['name.' . $key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Price')); ?>:
                                            </label>

                                            <input type="number" step="0.1"
                                                value="<?php echo e($videos->price ?? old('price')); ?>"
                                                class="form-control form-control-solid" name="price" />
                                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                <?php echo e(\App\Helpers\TranslationHelper::translate('Acadimic Level')); ?> :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="level_id" id="level_id" class="form-control form-control-solid">
                                                <option value="">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Acadimic Level')); ?>

                                                </option>
                                                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($level->id); ?>"
                                                        <?php echo e(old('level_id', $videos->level_id ?? null) == $level->id ? 'selected' : ''); ?>>
                                                        <?php echo e($level->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['level_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <?php $__currentLoopData = Config('language'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-12  mb-5">
                                                <label
                                                    class="fs-5 fw-bold form-label mb-5"><?php echo e(\App\Helpers\TranslationHelper::translate('Description in')); ?>

                                                    <?php echo e(__('methods.' . $lang)); ?>

                                                </label>
                                                <textarea class="form-control form-control-solid full-editor" name="des[<?php echo e($key); ?>]" rows="5"
                                                    id="des<?php echo e($key); ?>" style="height: 300px; direction: rtl;"><?php echo e(old('des.' . $key) ?? $videos->getTranslation('des', $key)); ?></textarea>
                                                <?php $__errorArgs = ['des.' . $key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        <div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        <?php echo e(\App\Helpers\TranslationHelper::translate('Video')); ?>:
    </label>
    <input type="file" id="news_video" accept="video/*" class="form-control form-control-solid" />
    <button type="button" id="uploadBtn" class="btn btn-success mt-3">
        <span id="btnText"><?php echo e(\App\Helpers\TranslationHelper::translate('Upload Video')); ?></span>
        <span id="btnSpinner" class="spinner-border spinner-border-sm ms-2" role="status" style="display: none;"></span>
    </button>
    <div id="uploadStatus" class="mt-2"></div>
    <input type="hidden" name="video_url" id="video_url">

    <?php if($videos->video_url): ?>
        <div class="mt-4">
            <h5><?php echo e(\App\Helpers\TranslationHelper::translate('Existing Video')); ?>:</h5>
            <video width="100%" controls>
                <source src="https://abdalhmad.b-cdn.net/<?php echo e($videos->video_url); ?>" type="video/mp4">
                <?php echo e(\App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.')); ?>

            </video>
        </div>
    <?php endif; ?>
</div>




                                        

                                        
                                       
<!-- Toast -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
  <div id="errorToast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        ⚠️ اختر فيديو أولا
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>









                                        

                                        <div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        <?php echo e(\App\Helpers\TranslationHelper::translate('Azhar Homework Video')); ?>:
    </label>
    <input type="file" id="azhar_video" class="form-control form-control-solid" accept="video/*" />
    <button type="button" id="uploadAzharBtn" class="btn btn-success mt-3">
        <span id="azharBtnText"><?php echo e(\App\Helpers\TranslationHelper::translate('Upload Video')); ?></span>
        <span id="azharBtnSpinner" class="spinner-border spinner-border-sm ms-2" role="status" style="display: none;"></span>
    </button>
    <div id="azharUploadStatus" class="mt-2"></div>
    <input type="hidden" name="azhar_video_url" id="azhar_video_url">

    <?php if($videos->azhar_video_url): ?>
        <div class="mt-4">
            <h5><?php echo e(\App\Helpers\TranslationHelper::translate('Existing Azhar Video')); ?>:</h5>
            <video width="100%" controls>
                <source src="https://abdalhmad.b-cdn.net/<?php echo e($videos->azhar_video_url); ?>" type="video/mp4">
                <?php echo e(\App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.')); ?>

            </video>
        </div>
    <?php endif; ?>
</div>

<div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        <?php echo e(\App\Helpers\TranslationHelper::translate('School Homework Video')); ?>:
    </label>
    <input type="file" id="school_video" class="form-control form-control-solid" accept="video/*" />
    <button type="button" id="uploadSchoolBtn" class="btn btn-success mt-3">
        <span id="schoolBtnText"><?php echo e(\App\Helpers\TranslationHelper::translate('Upload Video')); ?></span>
        <span id="schoolBtnSpinner" class="spinner-border spinner-border-sm ms-2" role="status" style="display: none;"></span>
    </button>
    <div id="schoolUploadStatus" class="mt-2"></div>
    <input type="hidden" name="school_video_url" id="school_video_url">

    <?php if($videos->school_video_url): ?>
        <div class="mt-4">
            <h5><?php echo e(\App\Helpers\TranslationHelper::translate('Existing School Video')); ?>:</h5>
            <video width="100%" controls>
                <source src="https://abdalhmad.b-cdn.net/<?php echo e($videos->school_video_url); ?>" type="video/mp4">
                <?php echo e(\App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.')); ?>

            </video>
        </div>
    <?php endif; ?>
</div>


                                        <div class="col-6  mb-5">
                                            <label
                                                class="fs-5 fw-bold form-label mb-5"><?php echo e(\App\Helpers\TranslationHelper::translate('pdf')); ?>

                                                :</label>
                                            <input type="file" class="form-control form-control-solid" name="news_pdf"
                                                accept="application/pdf" />
                                            <?php $__errorArgs = ['news_pdf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <?php if($videos->getFirstMediaUrl('newsnews_pdf') != null): ?>
                                                <div class="mt-4">
                                                    <h5><?php echo e(\App\Helpers\TranslationHelper::translate('Existing PDF')); ?>:
                                                    </h5>
                                                    <iframe src="<?php echo e($videos->getFirstMediaUrl('newsnews_pdf')); ?>"
                                                        width="100%" height="600px" frameborder="0"></iframe>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-6  mb-5">
                                            <label
                                                class="fs-5 fw-bold form-label mb-5"><?php echo e(\App\Helpers\TranslationHelper::translate('Image')); ?>

                                                : <span class="text-danger">
                                                    <?php echo e(\App\Helpers\TranslationHelper::translate('Size')); ?> <span
                                                        dir="ltr">400 x 400</span></span></label>
                                            <input type="file" class="form-control form-control-solid"
                                                name="image" />
                                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <?php if($videos->getFirstMediaUrl('news') != null): ?>
                                                <img src="<?php echo e($videos->getFirstMediaUrl('news')); ?>" alt="videos"
                                                    width="100px" style="border-radius: 5px">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mb-5">
                                        <span
                                            class="indicator-label"><?php echo e(\App\Helpers\TranslationHelper::translate('Save')); ?></span>
                                    </button>
                                </div>
      

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('admin_js'); ?>
    <script src="<?php echo e(asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            console.log("Document is ready");
            $('#level_id').select2({
                placeholder: "<?php echo e(\App\Helpers\TranslationHelper::translate('Acadimic Level')); ?>",
                allowClear: true
            });
        });
    </script>
    
  
<script>
document.getElementById("uploadBtn").addEventListener("click", async function () {
    let fileInput = document.getElementById("news_video");
    let file = fileInput.files[0];

    if (!file) {
        alert("اختر فيديو أولا");
        return;
    }

    // تفعيل spinner أثناء الرفع
    document.getElementById("btnSpinner").style.display = "inline-block";
    document.getElementById("btnText").innerText = "جاري الرفع...";

    try {
        // 1- نجيب Presigned URL من السيرفر
        let presignRes = await fetch("/admin/videos/presign", {
            method: "POST",
            headers: { 
                "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>", 
                "Content-Type": "application/json" 
            },
            body: JSON.stringify({ file_name: file.name, mime_type: file.type })
        });

        let presignData = await presignRes.json();

        // 2- نرفع الفيديو على Bunny
        let uploadRes = await fetch(presignData.uploadUrl, {
            method: "PUT",
            headers: presignData.headers,
            body: file
        });

        if (uploadRes.ok) {
            document.getElementById("uploadStatus").innerHTML = "<span class='text-success'>✅ تم رفع الفيديو</span>";
            document.getElementById("video_url").value = presignData.path; 
        } else {
            document.getElementById("uploadStatus").innerHTML = "<span class='text-danger'>❌ فشل الرفع</span>";
        }

    } catch (error) {
        document.getElementById("uploadStatus").innerHTML = "<span class='text-danger'>⚠️ حصل خطأ أثناء الرفع</span>";
    } finally {
        // إخفاء spinner بعد الانتهاء
        document.getElementById("btnSpinner").style.display = "none";
        document.getElementById("btnText").innerText = "<?php echo e(\App\Helpers\TranslationHelper::translate('Upload Video')); ?>";
    }
});
</script>

    

<script>
async function uploadVideo(inputId, btnTextId, btnSpinnerId, statusId, hiddenInputId) {
    let fileInput = document.getElementById(inputId);
    let file = fileInput.files[0];
    if (!file) {
        Swal.fire({
            icon: 'warning',
            title: 'تنبيه',
            text: '⚠️ اختر فيديو أولا',
            confirmButtonText: 'تمام'
        });
        return;
    }

    document.getElementById(btnSpinnerId).style.display = "inline-block";
    document.getElementById(btnTextId).innerText = "جاري الرفع الان...";

    try {
        let presignRes = await fetch("/admin/videos/presign", {
            method: "POST",
            headers: { 
                "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>", 
                "Content-Type": "application/json" 
            },
            body: JSON.stringify({ file_name: file.name, mime_type: file.type })
        });

        let presignData = await presignRes.json();

        let uploadRes = await fetch(presignData.uploadUrl, {
            method: "PUT",
            headers: presignData.headers,
            body: file
        });

        if (uploadRes.ok) {
            document.getElementById(statusId).innerHTML = "<span class='text-success'>✅ تم رفع الفيديو بنجاح</span>";
            document.getElementById(hiddenInputId).value = presignData.path; 
        } else {
            document.getElementById(statusId).innerHTML = "<span class='text-danger'>❌ فشل الرفع</span>";
        }

    } catch (error) {
        document.getElementById(statusId).innerHTML = "<span class='text-danger'>⚠️ حصل خطأ أثناء الرفع</span>";
    } finally {
        document.getElementById(btnSpinnerId).style.display = "none";
        document.getElementById(btnTextId).innerText = "<?php echo e(\App\Helpers\TranslationHelper::translate('Upload Video')); ?>";
    }
}

document.getElementById("uploadAzharBtn").addEventListener("click", function() {
    uploadVideo('azhar_video', 'azharBtnText', 'azharBtnSpinner', 'azharUploadStatus', 'azhar_video_url');
});

document.getElementById("uploadSchoolBtn").addEventListener("click", function() {
    uploadVideo('school_video', 'schoolBtnText', 'schoolBtnSpinner', 'schoolUploadStatus', 'school_video_url');
});
</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/videos/form.blade.php ENDPATH**/ ?>
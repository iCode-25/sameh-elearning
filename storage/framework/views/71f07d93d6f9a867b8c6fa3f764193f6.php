<?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Dashboard')); ?>

<?php $__env->startSection('crumb'); ?>
<?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [['text' => \App\Helpers\TranslationHelper::translate('Statics')]],'button' => [],'title' => \App\Helpers\TranslationHelper::translate('Dashboard')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

<?php $__env->startPush('admin_css'); ?>

<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: scale(1.02);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
</style>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->
        <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
            <div class="col-xl-6 mb-xl-10">

                <div class="row ">

                    <!--begin::Col-->
                    <div class="col-md-6 col-lg-6 col-xl-6 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 17-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100">
                            <!--begin::Card body-->

                            <div class="card-body align-items-end mb-0 p-5">
                                <!--begin::Info-->
                                <div class="d-flex align-items-start justify-content-between mb-3">
                                    <div class="fw-bold px-3">
                                        <span
                                            class="fs-4 opacity-50 d-block"><?php echo e(\App\Helpers\TranslationHelper::translate('Packages')); ?></span>
                                        <span class="fs-2x fw-bold "><?php echo e($totalPackages); ?></span>
                                    </div>
                                    <div class="m-0 icon" style="background-color: #3974ff6e;">
                                        <i class="ki-solid ki-calendar-add  fs-3x" style="color: #1b4ec6;">
                                        </i>
                                    </div>
                                </div>

                                


                        <div class="d-flex align-items-center  justify-content-between">
                            <span class="badge badge-light-success fs-3  p-3">
                                <i class="ki-duotone ki-arrow-up fs-4 text-success ms-n1"><span
                                        class="path1"></span><span class="path2"></span></i>
                                9.2%
                            </span>
                            <div class="card-toolbar">
                                <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->

                                <!--begin::Menu wrapper-->
                                
                            <!--end::Dropdown wrapper-->

                            <!--end::Daterangepicker-->
                        </div>
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 17-->

        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 mb-md-5 mb-xl-10">
            <!--begin::Card widget 17-->
            <!--begin::List widget 26-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100">

                <!--begin::Card body-->
                <div class="card-body align-items-end mb-0 p-5">
                    <!--begin::Info-->
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="fw-bold px-3">
                            <span
                                class="fs-4 opacity-50 d-block"><?php echo e(\App\Helpers\TranslationHelper::translate('Lessons')); ?></span>
                            <span class="fs-2x fw-bold "><?php echo e($totalLessons); ?><small class="fs-4"></small></span>
                        </div>
                        <div class="m-0 icon" style="background-color: #39ffa26e;">
                            <i class="ki-solid ki-tag fs-3x" style="color: #1a8855;">

                            </i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center  justify-content-between">
                        
                <span class="badge badge-light-success fs-3  p-3">
                    <i class="ki-duotone ki-arrow-up fs-4 text-success ms-n1"><span class="path1"></span><span
                            class="path2"></span></i>
                    9.2%
                </span>
            </div>

            <!--end::Info-->

        </div>
        <!--end::Card body-->
    </div>
    <!--end::LIst widget 26-->
    <!--end::Card widget 17-->

</div>
<!--end::Col-->


<!--begin::Col-->
<div class="col-md-6 col-lg-6 col-xl-6 mb-md-5 mb-xl-0">
    <!--begin::Card widget 17-->
    <!--begin::List widget 26-->
    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100">

        <!--begin::Card body-->
        <div class="card-body align-items-end mb-0 p-5">
            <!--begin::Info-->
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div class="fw-bold px-3">
                    <span
                        class="fs-4 opacity-50 d-block"><?php echo e(\App\Helpers\TranslationHelper::translate('Tests')); ?></span>
                    <span class="fs-2x fw-bold "><?php echo e($totalTests); ?></span>
                </div>
                <div class="m-0 icon" style="background-color: #ffd5596e;">
                    <i class="ki-duotone ki-shop fs-3x" style="color: #ac9140;">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                </div>
            </div>
            <div class="d-flex align-items-center  justify-content-between">
                
        <span class="badge badge-light-success fs-3  p-3">
            <i class="ki-duotone ki-arrow-up fs-4 text-success ms-n1"><span class="path1"></span><span
                    class="path2"></span></i>
            9.2%
        </span>
    </div>

    <!--end::Info-->

</div>
<!--end::Card body-->
</div>
<!--end::LIst widget 26-->
<!--end::Card widget 17-->

</div>
<!--end::Col-->

<!--begin::Col-->
<div class="col-md-6 col-lg-6 col-xl-6 mb-md-5 mb-xl-0">
    <!--begin::Card widget 17-->
    <!--begin::List widget 26-->
    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100">

        <!--begin::Card body-->
        <div class="card-body align-items-end mb-0 p-5">
            <!--begin::Info-->
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div class="fw-bold px-3">
                    <span
                        class="fs-4 opacity-50 d-block"><?php echo e(\App\Helpers\TranslationHelper::translate('Students')); ?></span>
                    <span class="fs-2x fw-bold "><?php echo e($totalStudents); ?></span>
                </div>
                <div class="m-0 icon" style="background-color: #ff655061;">
                    <i class="ki-duotone ki-people fs-3x" style="color: #d34330;">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>

                </div>
            </div>
            <div class="d-flex align-items-center  justify-content-between">
                
        <span class="badge badge-light-success fs-3  p-3">
            <i class="ki-duotone ki-arrow-up fs-4 text-success ms-n1"><span class="path1"></span><span
                    class="path2"></span></i>
            9.2%
        </span>
    </div>

    <!--end::Info-->

</div>
<!--end::Card body-->
</div>
<!--end::LIst widget 26-->
<!--end::Card widget 17-->

</div>
<!--end::Col-->

</div>
</div>















<div class="col-xl-6 mb-xl-10">
    <div class="card card-flush">
        <!-- Card Header -->
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <div class="d-flex align-items-center mb-2">
                    <span class="card-label fw-bold text-gray-800">
                        <?php echo e(\App\Helpers\TranslationHelper::translate('Latest Top5 Students WebSite')); ?>

                    </span>
                </div>
            </h3>
        </div>

        <!-- Card Body -->
        <div class="card-body py-0 px-0">
            <!-- Table Wrapper -->
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 10%;">#</th>
                            <th class="text-center" style="width: 20%;">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('ID')); ?>

                            </th>
                            <th class="text-center" style="width: 40%;">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Students Name')); ?>

                            </th>


                            <th class="text-center" style="width: 30%;"><?php echo e(\App\Helpers\TranslationHelper::translate('Phone')); ?>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $topClients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center"><?php echo e($key + 1); ?></td> 
                            <td class="text-center"><?php echo e($client->id); ?></td> 
                            <td class="text-center"><?php echo e($client->name); ?></td> 
                            <td class="text-center"><?php echo e($client->phone); ?></td> 
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                <?php echo e(\App\Helpers\TranslationHelper::translate('No clients available')); ?>

                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>




    </div>
</div>




</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row g-5 g-xl-10 g-xl-10">

    





    <!--end::Col-->
    







    <!--begin::Col-->
    <div class="col-xl-12 mb-xl-10">
        <div class="card card-flush h-xl-100">
            <!--begin::Header-->
            <div class="card-header py-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">
                        <?php echo e(\App\Helpers\TranslationHelper::translate('Latest Students')); ?></span>
                </h3>

                <ul class="nav nav-pills nav-pills-custom">
                    <?php if(auth()->guard('admin')->user()->can('client.view_all', 'admin')): ?> 
                    <li class="nav-item me-3 me-lg-6">
                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden p-5 active"
                            id="kt_stats_widget_16_tab_link_1" href="<?php echo e(route('admin.client.index')); ?>">
                            <span
                                class="nav-text text-gray-800 fw-bold fs-6 lh-1"><?php echo e(\App\Helpers\TranslationHelper::translate('All Students')); ?></span>
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
             
            </div>
            <div class="card-body pt-6">

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                        <div class="table-responsive">
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <thead>

                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('ID')); ?>

                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('name')); ?>

                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('phone')); ?>

                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('email')); ?>

                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('gender')); ?>

                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('level')); ?>

                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('created_at')); ?>

                                        </th>
                                    </tr>


                                </thead>
                                <tbody>


                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-start">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                <?php echo e($client->id); ?>

                                            </span>
                                        </td>
                                        <td class="text-start">
    <a href="<?php echo e(route('admin.client.show', $client->id)); ?>" class="text-primary fw-bold fs-6 text-hover-underline">
        <?php echo e($client->name ?? '_'); ?>

    </a>
</td>

                                        <td class="text-start">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                <?php echo e($client->phone ?? '_'); ?>

                                            </span>
                                        </td>
                                        <td class="text-start">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                <?php echo e($client->email ?? '_'); ?>

                                            </span>
                                        </td>
                                        <td class="text-start">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                <?php echo e($client->gender ?? '_'); ?>

                                            </span>
                                        </td>
                                        <td class="text-start"><?php echo e($client->level->name ?? '-'); ?></td>
                                        <td class="text-start pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                <?php echo e($client->created_at->format('d, M, Y')); ?>

                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                    

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_stats_widget_16_tab_2">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('Client')); ?>

                                        </th>
                                        <th class="p-0 pb-3 min-w-100px text-center pe-13">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('Date')); ?>

                                        </th>
                                        <th class="p-0 pb-3 min-w-100px text-center pe-7">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate(' Service Duration')); ?>

                                        </th>
                                        <th class="p-0 pb-3 min-w-100px text-center">
                                            <?php echo e(\App\Helpers\TranslationHelper::translate('Service Name')); ?>

                                        </th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6"><?php echo e(\App\Helpers\TranslationHelper::translate('Guy Hawkins')); ?>

                                                    </a>
                                                    <span
                                                        class="text-gray-500 fw-semibold d-block fs-7"><?php echo e(\App\Helpers\TranslationHelper::translate('Haiti')); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">08,
                                                May, 2024</span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                5 Days
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                Service Name
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jane
                                                        Cooper</a>
                                                    <span class="text-gray-500 fw-semibold d-block fs-7">Monaco</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">08,
                                                May, 2024</span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                5 Days
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                Service Name
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jacob
                                                        Jones</a>
                                                    <span class="text-gray-500 fw-semibold d-block fs-7">Poland</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">08,
                                                May, 2024</span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                5 Days
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                Service Name
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Cody
                                                        Fishers</a>
                                                    <span class="text-gray-500 fw-semibold d-block fs-7">Mexico</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">08,
                                                May, 2024</span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                5 Days
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                Service Name
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Cody
                                                        Fishers</a>
                                                    <span class="text-gray-500 fw-semibold d-block fs-7">Mexico</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">08,
                                                May, 2024</span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                5 Days
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                Service Name
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Tap pane-->
                    <!--end::Table container-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end: Card Body-->
        </div>
    </div>
    <!--begin::Col-->

</div>
<!--end::Row-->
<!--end::Content container-->
</div>
<!--end::Content-->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('admin_js'); ?>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>




<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\abdElHmidQuritem\resources\views/admin/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('code')); ?>

<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
        ['text' => \App\Helpers\TranslationHelper::translate('code'), 'link' => route('admin.coupon.index')],
        ['text' => \App\Helpers\TranslationHelper::translate('List')],
    ],'button' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        .custom-switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 18px;
        }

        /* Hide the default checkbox */
        .custom-switch input {
            display: none;
        }

        /* The slider */
        .custom-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 24px;
        }

        .custom-slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 2px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked+.custom-slider {
            background-color: #4caf50;
        }

        input:checked+.custom-slider:before {
            transform: translateX(19px);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!-- Card Toolbar Section -->
            <div class="card-toolbar w-100 mb-7">
                <!-- Left Part: Create Button -->
                <div class="left-part">
                    <?php if(auth()->guard('admin')->user()->can('coupon.create', 'admin')): ?>
                        <a href="<?php echo e(route('admin.coupon.create')); ?>" class="btn btn-primary text-gray-800 mb-3">
                            <i class="ki-duotone ki-plus fs-2 text-gray-800"></i>
                            <?php echo e(\App\Helpers\TranslationHelper::translate('Create code')); ?>

                        </a>
                    <?php endif; ?>
                </div>

                <!-- Right Part: Filter Section -->
                
            </div>

            <!-- Table Section -->
            <table class="table table-rounded align-middle table-striped border gy-5 gs-7 dataTable no-footer"
                id="kt_table_users">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Name Group')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('type Lessons & Package')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Total code')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Coupon Price')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Date')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Actions')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('is_banned')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- The content will be filled dynamically using DataTables -->
                </tbody>
            </table>

        </div>
    </div>

    <!--end::Content-->
    <?php echo $__env->make('admin.layouts.delete-modal', [
        'action_message' => \App\Helpers\TranslationHelper::translate('This Item'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('admin_js'); ?>
    <script src="<?php echo e(asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />



    <script>
        $(document).ready(function() {
            var table1 = $('#kt_table_users').DataTable({
                serverSide: true,
                processing: true,
                fixedHeader: true,
                orderCellsTop: true,
                language: {
                    <?php if(App::getLocale() == 'ar'): ?>
                        url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json",
                    <?php else: ?>
                        url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json",
                    <?php endif; ?>
                },
                dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-end ' B>> 
              <'row'<'col-sm-12'tr>> 
              <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
                buttons: ['print', 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                order: [
                    [0, "desc"]
                ],
                ajax: {
                    url: '<?php echo e(route('admin.coupon.table')); ?>',
                    data: function(d) {
                        d.name = $('#name').val();
                        d.created_at = $('#created_at').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        defaultContent: '-'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        defaultContent: '-',
                        render: function(data, type, row) {
                            return '<a href="<?php echo e(route('admin.coupon.show', ':coupon_id')); ?>'
                                .replace(":coupon_id", row.id) + '">' + data + '</a>';
                        }
                    },

                    {
                        data: 'type_group',
                        name: 'type_group',
                        defaultContent: '-'
                    },

                    {
                        data: 'coupon',
                        name: 'coupon',
                        defaultContent: '-'
                    },

                    {data: 'points', name: 'points', defaultContent: '-'},

                    {
                        data: 'created_at',
                        name: 'created_at',
                        defaultContent: '-'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'is_banned',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    }
                ],
                order: [
                    [0, 'desc']
                ],
                createdRow: function(row, data, index) {
                    $(row).attr('id', 'row-' + data['id']);
                }
            });

            $('#name').on('keyup change', function() {
                table1.draw();
            });

            $(document).on('change', '.is_banned_switch', function() {
                var groupId = $(this).data('id');
                var isBanned = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    url: '/admin/groups/' + groupId + '/update-status',
                    type: 'PATCH',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        is_banned: isBanned
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Status updated successfully!');
                        } else {
                            toastr.error('Failed to update status!');
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $(document).on('change', '.is_banned_switch', function() {
            var groupId = $(this).data('id');
            var isBanned = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: '/admin/groups/' + groupId + '/update-status',
                type: 'PATCH',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    is_banned: isBanned
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Status updated successfully!');
                    } else {
                        toastr.error('Failed to update status!');
                    }
                }
            });
        });
    </script>

    <script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/coupon/index.blade.php ENDPATH**/ ?>
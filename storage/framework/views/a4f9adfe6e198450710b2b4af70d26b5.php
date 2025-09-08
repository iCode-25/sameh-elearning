<?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Tests')); ?>

<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
        ['text' => \App\Helpers\TranslationHelper::translate('Tests'), 'link' => route('admin.test.index')],
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card-toolbar w-100 mb-7">
                <div class="d-flex justify-content-between w-100 data-kt-Customer-table-toolbar">
                    <div class="left-part">

                        <?php if(auth()->guard('admin')->user()->can('test.create', 'admin')): ?>
                            <a href="<?php echo e(route('admin.test.create')); ?>" class="btn btn-primary text-gray-800">
                                <i class="ki-duotone ki-plus fs-2  text-gray-800"></i>
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Create Test')); ?>

                            </a>
                        <?php endif; ?>
                        <?php if(auth()->guard('admin')->user()->can('test.sort', 'admin')): ?>
                            <a href="<?php echo e(route('admin.test.reorder')); ?>" class="btn btn-primary text-gray-800"
                                style="margin-left: 12px;">
                                <i class="ki-solid ki-sort fs-2  text-gray-800"></i>
                                <?php echo e(\App\Helpers\TranslationHelper::translate('Sort Items')); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <table class="table table-rounded align-middle table-striped border gy-5 gs-7 dataTable no-footer"
                id="kt_table_users">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Name')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('package')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('lesson')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('type')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('total_quizzes')); ?></th>
                        
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('is_active')); ?></th>
                        
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Actions')); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.delete-modal', [
        'action_message' => \App\Helpers\TranslationHelper::translate('This Item'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('admin_js'); ?>
    <script src="<?php echo e(asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>


    <script>
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
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-end'B>>
              <'row'<'col-sm-12'tr>>
              <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: ['print', 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            order: [
                [0, "desc"]
            ],
            ajax: {
                url: '<?php echo e(route('admin.test.table')); ?>',
                data: function(d) {
                    d.id = $('#id').val();
                    d.name = $('#name').val();
                    d.category = $('#category').val();
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
                    defaultContent: '-'
                },
                {
                    data: 'package',
                    name: 'package',
                    defaultContent: '-'
                },
                {
                    data: 'video',
                    name: 'video',
                    defaultContent: '-'
                },
                {
                    data: 'type',
                    name: 'type',
                    defaultContent: '-'
                },
            
                {
                    data: 'total_quizzes',
                    name: 'total_quizzes',
                    defaultContent: '-'
                },
                // {
                //     data: 'created_at',
                //     name: 'created_at',
                //     defaultContent: '-'
                // },
                {
    data: 'is_active',
    name: 'is_active',
    orderable: false,
    searchable: false
},
                {
                    data: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                }
            ],
            createdRow: function(row, data, index) {
                $(row).attr('id', 'row-' + data['id']);
            }
        });
    </script>


<script>
    $(document).on('change', '.toggle-active', function () {
    let checkbox = $(this);
    let testId = checkbox.data('id');

    $.post('<?php echo e(route("admin.test.toggleActiveStatus")); ?>', {
        _token: '<?php echo e(csrf_token()); ?>',
        id: testId
    }, function (response) {
        if (response.success) {
            Swal.fire(
                '<?php echo e(\App\Helpers\TranslationHelper::translate("Updated")); ?>',
                '<?php echo e(\App\Helpers\TranslationHelper::translate("Status changed successfully")); ?>',
                'success'
            );
        }
    }).fail(function () {
        Swal.fire(
            '<?php echo e(\App\Helpers\TranslationHelper::translate("Error")); ?>',
            '<?php echo e(\App\Helpers\TranslationHelper::translate("Something went wrong. Please try again later.")); ?>',
            'error'
        );
        // ترجع الحالة لو حصل خطأ
        checkbox.prop('checked', !checkbox.prop('checked'));
    });
});

</script>


<script>
$(document).on('click', '.toggle-exceptional', function () {
    let icon = $(this);
    let clientId = icon.data('id');

    if (icon.hasClass('fas')) {
        $.post('<?php echo e(route("admin.test.toggleActiveStatus")); ?>', {
            _token: '<?php echo e(csrf_token()); ?>',
            id: clientId
        }, function (response) {
            if (response.success) {
                icon.removeClass('fas').addClass('far').css('color', 'gray');
                Swal.fire(
                    '<?php echo e(\App\Helpers\TranslationHelper::translate("Updated")); ?>',
                    '<?php echo e(\App\Helpers\TranslationHelper::translate("The student is no longer marked as exceptional.")); ?>',
                    'success'
                );
            }
        }).fail(function () {
            Swal.fire(
                '<?php echo e(\App\Helpers\TranslationHelper::translate("Error")); ?>',
                '<?php echo e(\App\Helpers\TranslationHelper::translate("Something went wrong. Please try again later.")); ?>',
                'error'
            );
        });
        return;
    }

    Swal.fire({
        title: '<?php echo e(\App\Helpers\TranslationHelper::translate("Enter number of days for exceptional status")); ?>',
        input: 'number',
        inputLabel: '<?php echo e(\App\Helpers\TranslationHelper::translate("Number of days")); ?>',
        inputAttributes: {
            min: 1,
            max: 30,
            step: 1
        },
        inputValue: 3,
        showCancelButton: true,
        confirmButtonText: '<?php echo e(\App\Helpers\TranslationHelper::translate("Confirm")); ?>',
        cancelButtonText: '<?php echo e(\App\Helpers\TranslationHelper::translate("Cancel")); ?>',
    }).then((result) => {
        if (result.isConfirmed && result.value > 0) {
            $.post('<?php echo e(route("admin.test.toggleActiveStatus")); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                id: clientId,
                days: result.value
            }, function (response) {
                if (response.success) {
                    icon.removeClass('far').addClass('fas').css('color', 'gold');
                    Swal.fire(
                        '<?php echo e(\App\Helpers\TranslationHelper::translate("Updated")); ?>',
                        '<?php echo e(\App\Helpers\TranslationHelper::translate("The student is now marked as exceptional for")); ?> ' + result.value + ' <?php echo e(\App\Helpers\TranslationHelper::translate("days")); ?>.',
                        'success'
                    );
                }
            }).fail(function () {
                Swal.fire(
                    '<?php echo e(\App\Helpers\TranslationHelper::translate("Error")); ?>',
                    '<?php echo e(\App\Helpers\TranslationHelper::translate("Something went wrong. Please try again later.")); ?>',
                    'error'
                );
            });
        }
    });
});
</script>



<script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.js"></script>

    <script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Qurtum\resources\views/admin/pages/test/index.blade.php ENDPATH**/ ?>
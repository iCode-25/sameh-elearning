<?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('Transfers')); ?>

<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
        ['text' => \App\Helpers\TranslationHelper::translate('Transfers'), 'link' => route('admin.transfer.index')],
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
                    </div>
                </div>
            </div>
            <table class="table table-rounded align-middle table-striped border gy-5 gs-7 dataTable no-footer"
                id="kt_table_users">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Name')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Amount')); ?></th>
                        
                        
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Lesson')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Package')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Level')); ?></th>
                        <th><?php echo e(\App\Helpers\TranslationHelper::translate('Created_at')); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.delete-modal', [
        'action_transfer' => \App\Helpers\TranslationHelper::translate('This Item'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('admin_js'); ?>
    <script>
        var table1 = $('#kt_table_users').DataTable({
            serverSide: true,
            orderCellsTop: true,
            fixedHeader: true,
            language: {
                <?php if(App::getLocale() == 'ar'): ?>
                    url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json",
                <?php else: ?>
                    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json",
                <?php endif; ?>
            },
            processing: true,

            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-end ' B>>
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
                url: '<?php echo e(route('admin.transfer.table')); ?>',
                data: function(d) {
                    d.name = $('#name').val();
                }
            },
            columns:
            [
    { data: 'id', name: 'id' },
    { data: 'client_title', name: 'client_title', searchable: false, orderable: false },
    { data: 'amount_title', name: 'amount_title' },
    { data: 'videos_title', name: 'videos_title', searchable: false, orderable: false },
    { data: 'packages_title', name: 'packages_title', searchable: false, orderable: false },
    { data: 'level_title', name: 'level_title', searchable: false, orderable: false },
    { data: 'created_at', name: 'created_at' },
                // {
                //     data: 'id',
                //     name: 'id',
                //     defaultContent: '-'
                // },
                // {
                //     data: 'name',
                //     name: 'user.name',
                //     defaultContent: '-'
                // },
                // {
                //     data: 'amount',
                //     name: 'amount',
                //     defaultContent: '-'
                // },
                // {
                //     data: 'video',
                //     name: 'video',
                //     defaultContent: '-'
                // },
                // {
                //     data: 'package',
                //     name: 'package',
                //     defaultContent: '-'
                // },
                // {
                //     data: 'level',
                //     name: 'level',
                //     defaultContent: '-'
                // },

                // {
                //     data: 'created_at',
                //     name: 'created_at',
                //     defaultContent: '-'
                // },
            ],

            createdRow: function(row, data, index) {
                $(row).attr('id', 'row-' + data['id']);
            }
        });

        $('#name, #email, #phone').on('keyup change', function() {
            table1.draw();
        });
    </script>

    <script src="<?php echo e(asset('dashboard/assets/js/delete-item.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/transfer/index.blade.php ENDPATH**/ ?>
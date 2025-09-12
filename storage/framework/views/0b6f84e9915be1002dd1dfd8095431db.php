<?php $__env->startSection('title', \App\Helpers\TranslationHelper::translate('User')); ?>

<?php $__env->startSection('crumb'); ?>
    <?php if (isset($component)) { $__componentOriginalc2072a121b282e859e8bdea9c58b76d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2072a121b282e859e8bdea9c58b76d8 = $attributes; } ?>
<?php $component = App\View\Components\BreadCrumb::resolve(['breadcrumbs' => [
    ['text'=> \App\Helpers\TranslationHelper::translate('Users'),'link'=>route('admin.client.index')],
    ['text'=> \App\Helpers\TranslationHelper::translate('List')]
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div id="kt_app_content" class="app-content flex-column-fluid">

    <div id="kt_app_content_container" class="app-container container-xxl">

        <div class="row mb-5">
            <div class="col-md-3">
                <input type="text" id="search" class="form-control" placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Search by name, email or phone')); ?>">
            </div>
        
            <div class="col-md-2">
                <select id="gender" class="form-control">
                    <option value=""><?php echo e(\App\Helpers\TranslationHelper::translate('Select Gender')); ?></option>
                    <option value="male"><?php echo e(\App\Helpers\TranslationHelper::translate('Male')); ?></option>
                    <option value="female"><?php echo e(\App\Helpers\TranslationHelper::translate('Female')); ?></option>
                </select>
            </div>
        
            <div class="col-md-3">
                <select id="level" class="form-control">
                    <option value=""><?php echo e(\App\Helpers\TranslationHelper::translate('Select Level')); ?></option>
                    <?php $__currentLoopData = \App\Models\Level::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($level->id); ?>"><?php echo e($level->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        
            <div class="col-md-2">
                <input type="text" id="created_at" class="form-control datepicker" placeholder="<?php echo e(\App\Helpers\TranslationHelper::translate('Creation Date')); ?>">
            </div>
        
            <div class="col-md-2">
                <button type="button" class="btn btn-primary w-100" id="filterBtn">
                    <?php echo e(\App\Helpers\TranslationHelper::translate('Search')); ?>

                </button>
            </div>
        </div>
        
        


        <div class="card-toolbar w-100 mb-7">
            <table class="table table-rounded align-middle table-striped border gy-5 gs-7 dataTable no-footer"
                   id="kt_table_users">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(\App\Helpers\TranslationHelper::translate('Name')); ?></th>
                    <th><?php echo e(\App\Helpers\TranslationHelper::translate('email')); ?></th>
                    <th><?php echo e(\App\Helpers\TranslationHelper::translate('Phone')); ?></th>
                    <th><?php echo e(\App\Helpers\TranslationHelper::translate('gender')); ?></th>
                    <th><?php echo e(\App\Helpers\TranslationHelper::translate('type')); ?></th>
                    <th><?php echo e(\App\Helpers\TranslationHelper::translate('level')); ?></th>
                    <th><?php echo e(\App\Helpers\TranslationHelper::translate('created_at')); ?></th>
                    <th><?php echo e(\App\Helpers\TranslationHelper::translate('Ban')); ?></th> 
                    <th><?php echo e(\App\Helpers\TranslationHelper::translate('Exceptional')); ?></th> 
                    <th><?php echo e(\App\Helpers\TranslationHelper::translate('Actions')); ?></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

    <?php echo $__env->make('admin.layouts.delete-modal',['action_message' => \App\Helpers\TranslationHelper::translate('This Item')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('admin_js'); ?>


<script src="<?php echo e(asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

<script>
    $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});

</script>

<script>

$('#kt_table_users').DataTable({
    serverSide: true,
    processing: true,
    ajax: '<?php echo e(route("admin.client.table")); ?>',
    columns: [
{ data: 'DT_RowIndex', name: '', orderable: false, searchable: false },
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'phone', name: 'phone' },
        { data: 'gender', name: 'gender' },
        { data: 'type', name: 'type' },
        { data: 'level', name: 'level' },
        { data: 'created_at', name: 'created_at' },
        { data: 'ban', name: 'ban', orderable: false, searchable: false },
        { data: 'is_active', name: 'is_active', orderable: false, searchable: false },
        { data: 'action', name: 'action', orderable: false, searchable: false },
    ],
    createdRow: function(row, data, index) {
        $(row).attr('id', 'row-' + data['id']);
    }
});


$('#filterBtn').on('click', function () {
    table1.ajax.reload();
});



$(document).on('change', '.ban-toggle', function () {
    let clientId = $(this).data('id');
    let isBanned = $(this).is(':checked') ? 1 : 0;  
    Swal.fire({
        title: isBanned ? '<?php echo app('translator')->get('Are you sure you want to ban this client?'); ?>' : '<?php echo app('translator')->get('Are you sure you want to unban this client?'); ?>',
        text: isBanned ? '<?php echo app('translator')->get('This action will block the client and they will not be able to log in.'); ?>' : '<?php echo app('translator')->get('This action will lift the ban and the client will be able to log in again.'); ?>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: isBanned ? '<?php echo app('translator')->get('Yes, ban it!'); ?>' : '<?php echo app('translator')->get('Yes, unban it!'); ?>',
        cancelButtonText: '<?php echo app('translator')->get('Cancel'); ?>',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '<?php echo e(route("admin.client.ban")); ?>',
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: clientId,
                    is_banned: isBanned
                },
                success: function (response) {
                    Swal.fire(
                        isBanned ? '<?php echo app('translator')->get('Client Banned'); ?>' : '<?php echo app('translator')->get('Client Unbanned'); ?>',
                        isBanned ? '<?php echo app('translator')->get('The client has been banned successfully.'); ?>' : '<?php echo app('translator')->get('The client has been unbanned successfully.'); ?>',
                        'success'
                    );
                    table1.ajax.reload();  
                }
            });
        } else {
            $(this).prop('checked', !isBanned);
        }
    });
});
</script>

<script>
$(document).on('click', '.toggle-exceptional', function () {
    let icon = $(this);
    let clientId = icon.data('id');

    if (icon.hasClass('fas')) {
        $.post('<?php echo e(route("admin.client.toggleActiveStatus")); ?>', {
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
            $.post('<?php echo e(route("admin.client.toggleActiveStatus")); ?>', {
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



<?php $__env->stopPush(); ?>








<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_new\htdocs\sameh_stein\resources\views/admin/pages/client/index.blade.php ENDPATH**/ ?>
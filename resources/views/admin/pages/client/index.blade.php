@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('User'))

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
    ['text'=> \App\Helpers\TranslationHelper::translate('Users'),'link'=>route('admin.client.index')],
    ['text'=> \App\Helpers\TranslationHelper::translate('List')]
    ]" :button="[]">
    </x-bread-crumb>
@endsection
@push('admin_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
@endpush
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">

    <div id="kt_app_content_container" class="app-container container-xxl">

        <div class="row mb-5">
            <div class="col-md-3">
                <input type="text" id="search" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Search by name, email or phone') }}">
            </div>
        
            <div class="col-md-2">
                <select id="gender" class="form-control">
                    <option value="">{{ \App\Helpers\TranslationHelper::translate('Select Gender') }}</option>
                    <option value="male">{{ \App\Helpers\TranslationHelper::translate('Male') }}</option>
                    <option value="female">{{ \App\Helpers\TranslationHelper::translate('Female') }}</option>
                </select>
            </div>
        
            <div class="col-md-3">
                <select id="level" class="form-control">
                    <option value="">{{ \App\Helpers\TranslationHelper::translate('Select Level') }}</option>
                    @foreach(\App\Models\Level::all() as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="col-md-2">
                <input type="text" id="created_at" class="form-control datepicker" placeholder="{{ \App\Helpers\TranslationHelper::translate('Creation Date') }}">
            </div>
        
            <div class="col-md-2">
                <button type="button" class="btn btn-primary w-100" id="filterBtn">
                    {{ \App\Helpers\TranslationHelper::translate('Search') }}
                </button>
            </div>
        </div>
        
        


        <div class="card-toolbar w-100 mb-7">
            <table class="table table-rounded align-middle table-striped border gy-5 gs-7 dataTable no-footer"
                   id="kt_table_users">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('Name') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('email') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('Phone') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('gender') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('type') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('level') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('created_at') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('Ban') }}</th> 
                    <th>{{ \App\Helpers\TranslationHelper::translate('Exceptional') }}</th> 
                    <th>{{ \App\Helpers\TranslationHelper::translate('Actions') }}</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

    @include('admin.layouts.delete-modal',['action_message' => \App\Helpers\TranslationHelper::translate('This Item')])
@endsection

@push('admin_js')


<script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
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
    ajax: '{{ route("admin.client.table") }}',
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
        title: isBanned ? '@lang('Are you sure you want to ban this client?')' : '@lang('Are you sure you want to unban this client?')',
        text: isBanned ? '@lang('This action will block the client and they will not be able to log in.')' : '@lang('This action will lift the ban and the client will be able to log in again.')',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: isBanned ? '@lang('Yes, ban it!')' : '@lang('Yes, unban it!')',
        cancelButtonText: '@lang('Cancel')',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.client.ban") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: clientId,
                    is_banned: isBanned
                },
                success: function (response) {
                    Swal.fire(
                        isBanned ? '@lang('Client Banned')' : '@lang('Client Unbanned')',
                        isBanned ? '@lang('The client has been banned successfully.')' : '@lang('The client has been unbanned successfully.')',
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
        $.post('{{ route("admin.client.toggleActiveStatus") }}', {
            _token: '{{ csrf_token() }}',
            id: clientId
        }, function (response) {
            if (response.success) {
                icon.removeClass('fas').addClass('far').css('color', 'gray');
                Swal.fire(
                    '{{ \App\Helpers\TranslationHelper::translate("Updated") }}',
                    '{{ \App\Helpers\TranslationHelper::translate("The student is no longer marked as exceptional.") }}',
                    'success'
                );
            }
        }).fail(function () {
            Swal.fire(
                '{{ \App\Helpers\TranslationHelper::translate("Error") }}',
                '{{ \App\Helpers\TranslationHelper::translate("Something went wrong. Please try again later.") }}',
                'error'
            );
        });
        return;
    }

    Swal.fire({
        title: '{{ \App\Helpers\TranslationHelper::translate("Enter number of days for exceptional status") }}',
        input: 'number',
        inputLabel: '{{ \App\Helpers\TranslationHelper::translate("Number of days") }}',
        inputAttributes: {
            min: 1,
            max: 30,
            step: 1
        },
        inputValue: 3,
        showCancelButton: true,
        confirmButtonText: '{{ \App\Helpers\TranslationHelper::translate("Confirm") }}',
        cancelButtonText: '{{ \App\Helpers\TranslationHelper::translate("Cancel") }}',
    }).then((result) => {
        if (result.isConfirmed && result.value > 0) {
            $.post('{{ route("admin.client.toggleActiveStatus") }}', {
                _token: '{{ csrf_token() }}',
                id: clientId,
                days: result.value
            }, function (response) {
                if (response.success) {
                    icon.removeClass('far').addClass('fas').css('color', 'gold');
                    Swal.fire(
                        '{{ \App\Helpers\TranslationHelper::translate("Updated") }}',
                        '{{ \App\Helpers\TranslationHelper::translate("The student is now marked as exceptional for") }} ' + result.value + ' {{ \App\Helpers\TranslationHelper::translate("days") }}.',
                        'success'
                    );
                }
            }).fail(function () {
                Swal.fire(
                    '{{ \App\Helpers\TranslationHelper::translate("Error") }}',
                    '{{ \App\Helpers\TranslationHelper::translate("Something went wrong. Please try again later.") }}',
                    'error'
                );
            });
        }
    });
});
</script>

<script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.js"></script>



@endpush

{{-- 
<script>
    $(document).on('click', '.toggle-exceptional', function () {
    let icon = $(this);
    let clientId = icon.data('id');

    $.ajax({
        url: '{{ route("admin.client.toggleActiveStatus") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: clientId
        },
        success: function (response) {
            if (response.success) {
                if (response.is_active) {
                    icon.removeClass('far').addClass('fas').css('color', 'gold');
                } else {
                    icon.removeClass('fas').addClass('far').css('color', 'gray');
                }

                Swal.fire(
                    'Updated!',
                    response.is_active ? 'The student is now marked as exceptional.' : 'The student is no longer marked as exceptional.',
                    'success'
                );
            } else {
                Swal.fire('Error!', 'Failed to update student status.', 'error');
            }
        },
        error: function () {
            Swal.fire('Error!', 'Something went wrong. Please try again later.', 'error');
        }
    });
});

</script> --}}


{{-- 
<script>
$(document).on('click', '.toggle-exceptional', function () {
    let icon = $(this);
    let clientId = icon.data('id');

    if (icon.hasClass('fas')) {
        $.post('{{ route("admin.client.toggleActiveStatus") }}', {
            _token: '{{ csrf_token() }}',
            id: clientId
        }, function (response) {
            if (response.success) {
                icon.removeClass('fas').addClass('far').css('color', 'gray');
                Swal.fire('تم التحديث', 'الطالب لم يعد مميزًا.', 'success');
            }
        }).fail(function () {
            Swal.fire('خطأ!', 'حدث خطأ أثناء التحديث.', 'error');
        });
        return;
    }

    Swal.fire({
        title: 'حدد عدد الأيام للتمييز',
        input: 'number',
        inputLabel: 'عدد الأيام',
        inputAttributes: {
            min: 1,
            max: 30,
            step: 1
        },
        inputValue: 3,
        showCancelButton: true,
        confirmButtonText: 'تأكيد',
        cancelButtonText: 'إلغاء',
    }).then((result) => {
        if (result.isConfirmed && result.value > 0) {
            $.post('{{ route("admin.client.toggleActiveStatus") }}', {
                _token: '{{ csrf_token() }}',
                id: clientId,
                days: result.value
            }, function (response) {
                if (response.success) {
                    icon.removeClass('far').addClass('fas').css('color', 'gold');
                    Swal.fire('تم التحديث', 'تم تمييز الطالب لمدة ' + result.value + ' يوم.', 'success');
                }
            }).fail(function () {
                Swal.fire('خطأ!', 'حدث خطأ أثناء التحديث.', 'error');
            });
        }
    });
});
</script> --}}

{{-- 
<script>
$(document).on('change', '.active-toggle', function () {
    let clientId = $(this).data('id');
    let isActive = $(this).prop('checked') ? 1 : 0; 
    $.ajax({
        url: '{{ route("admin.client.toggleActiveStatus") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: clientId,
            is_active: isActive
        },
        success: function (response) {
            if (response.success) {
                Swal.fire(
                    'Success!',
                    response.is_active ? 'The student has been marked as exceptional.' : 'The student is no longer marked as exceptional.'
,
                    'success'
                );
            } else {
                Swal.fire('Error!', 'Failed to update client status.', 'error');
            }
        },
        error: function () {
            Swal.fire('Error!', 'Something went wrong, please try again later.', 'error');
        }
    });
});
</script> --}}

@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Tests'))

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Tests'), 'link' => route('admin.test.index')],
        ['text' => \App\Helpers\TranslationHelper::translate('List')],
    ]" :button="[]">
    </x-bread-crumb>
@endsection

@push('admin_css')
@endpush

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card-toolbar w-100 mb-7">
                <div class="d-flex justify-content-between w-100 data-kt-Customer-table-toolbar">
                    <div class="left-part">

                        @if (auth()->guard('admin')->user()->can('test.create', 'admin'))
                            <a href="{{ route('admin.test.create') }}" class="btn btn-primary text-gray-800">
                                <i class="ki-duotone ki-plus fs-2  text-gray-800"></i>
                                {{ \App\Helpers\TranslationHelper::translate('Create Test') }}
                            </a>
                        @endif
                        @if (auth()->guard('admin')->user()->can('test.sort', 'admin'))
                            <a href="{{ route('admin.test.reorder') }}" class="btn btn-primary text-gray-800"
                                style="margin-left: 12px;">
                                <i class="ki-solid ki-sort fs-2  text-gray-800"></i>
                                {{ \App\Helpers\TranslationHelper::translate('Sort Items') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <table class="table table-rounded align-middle table-striped border gy-5 gs-7 dataTable no-footer"
                id="kt_table_users">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('Name') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('package') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('lesson') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('type') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('total_quizzes') }}</th>
                        {{-- <th>{{ \App\Helpers\TranslationHelper::translate('Date') }}</th> --}}
                        <th>{{ \App\Helpers\TranslationHelper::translate('is_active') }}</th>
                        
                        <th>{{ \App\Helpers\TranslationHelper::translate('Actions') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('admin.layouts.delete-modal', [
        'action_message' => \App\Helpers\TranslationHelper::translate('This Item'),
    ])

@endsection

@push('admin_js')
    <script src="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>


    <script>
        var table1 = $('#kt_table_users').DataTable({
            serverSide: true,
            processing: true,
            fixedHeader: true,
            orderCellsTop: true,
            language: {
                @if (App::getLocale() == 'ar')
                    url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json",
                @else
                    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json",
                @endif
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
                url: '{{ route('admin.test.table') }}',
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

    $.post('{{ route("admin.test.toggleActiveStatus") }}', {
        _token: '{{ csrf_token() }}',
        id: testId
    }, function (response) {
        if (response.success) {
            Swal.fire(
                '{{ \App\Helpers\TranslationHelper::translate("Updated") }}',
                '{{ \App\Helpers\TranslationHelper::translate("Status changed successfully") }}',
                'success'
            );
        }
    }).fail(function () {
        Swal.fire(
            '{{ \App\Helpers\TranslationHelper::translate("Error") }}',
            '{{ \App\Helpers\TranslationHelper::translate("Something went wrong. Please try again later.") }}',
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
        $.post('{{ route("admin.test.toggleActiveStatus") }}', {
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
            $.post('{{ route("admin.test.toggleActiveStatus") }}', {
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

    <script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>
@endpush

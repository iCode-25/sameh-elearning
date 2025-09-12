@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Lessons'))

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Lessons'), 'link' => route('admin.videos.index')],
        ['text' => \App\Helpers\TranslationHelper::translate('List')],
    ]" :button="[]">
    </x-bread-crumb>
@endsection

@push('admin_css')
    <style>
        #level_id {
            max-width: 100%;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 14px;
        }
    </style>
@endpush
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card-toolbar w-100 mb-7">
                <div class="d-flex justify-content-between w-100 data-kt-Customer-table-toolbar">
                    <div class="left-part">
                        <a href="{{ route('admin.videos.create') }}" class="btn btn-primary text-gray-800">
                            <i class="ki-duotone ki-plus fs-2  text-gray-800"></i>
                            {{ \App\Helpers\TranslationHelper::translate('Create Lessons') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4">
                    <label for="level_id" class="form-label fw-bold">
                        {{ \App\Helpers\TranslationHelper::translate('Level') }}
                    </label>
                    <select id="level_id" class="form-select form-select-sm">
                        <option value="">{{ \App\Helpers\TranslationHelper::translate('All Levels') }}</option>
                        @foreach (\App\Models\Level::all() as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>




            <table class="table table-rounded align-middle table-striped border gy-5 gs-7 dataTable no-footer"
                id="kt_table_users">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('image') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('name') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('level') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('price') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('is_active') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('Created_at') }}</th>
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
            orderCellsTop: true,
            fixedHeader: true,
            language: {
                @if (App::getLocale() == 'ar')
                    url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json",
                @else
                    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json",
                @endif
            },
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
                url: '{{ route('admin.videos.table') }}',
                data: function(d) {
                    d.id = $('#id').val();
                    d.name = $('#name').val();
                    d.created_at = $('#created_at').val();
                    d.level_id = $('#level_id').val();
                }
            },
            columns: [{
                    data: 'index',
                    name: 'index',
                    orderable: false,
                    searchable: false
                },

                {
                    data: 'image',
                    name: 'image',
                    defaultContent: '-',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    defaultContent: '-'
                },
                {
                    data: 'level',
                    name: 'level',
                    defaultContent: '-'
                },
                {
                    data: 'price',
                    name: 'price',
                    defaultContent: '-'
                },
                {
                    data: 'is_active',
                    name: 'is_active',
                    defaultContent: '-'
                },
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
                }
            ],
            createdRow: function(row, data, index) {
                $(row).attr('id', 'row-' + data['id']);
            },
        });
    </script>

    <script>
        $('#level_id').on('change', function() {
            table1.draw();
        });
    </script>

    <script>
        $(document).on('change', '.active-toggle', function() {
            let clientId = $(this).data('id');
            let isActive = $(this).prop('checked') ? 1 : 0;
            $.ajax({
                url: '{{ route('admin.videos.toggleActiveStatus') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: clientId,
                    is_active: isActive
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire(
                            'Success!',
                            response.is_active ? 'lesson  is activated.' :
                            'lesson  is deactivated.',
                            'success'
                        );
                    } else {
                        Swal.fire('Error!', 'Failed to update lesson status.', 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong, please try again later.', 'error');
                }
            });
        });
    </script>


    <script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>
@endpush

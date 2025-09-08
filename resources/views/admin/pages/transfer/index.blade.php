@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Transfers'))

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Transfers'), 'link' => route('admin.transfer.index')],
        ['text' => \App\Helpers\TranslationHelper::translate('List')],
    ]" :button="[]">
    </x-bread-crumb>
@endsection

@push('admin_css')
    {{--    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/> --}}
@endpush
@section('content')
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
                        <th>{{ \App\Helpers\TranslationHelper::translate('Name') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('Amount') }}</th>
                        {{-- <th>{{ \App\Helpers\TranslationHelper::translate('Method') }}</th> --}}
                        {{-- <th>{{ \App\Helpers\TranslationHelper::translate('Transfer_type') }}</th> --}}
                        <th>{{ \App\Helpers\TranslationHelper::translate('Lesson') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('Package') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('Level') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('Created_at') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('admin.layouts.delete-modal', [
        'action_transfer' => \App\Helpers\TranslationHelper::translate('This Item'),
    ])

@endsection

@push('admin_js')
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
                url: '{{ route('admin.transfer.table') }}',
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

    <script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>
@endpush

@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Control the expiration duration'))

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
    ['text'=> \App\Helpers\TranslationHelper::translate('Control the expiration duration'),'link'=>route('admin.controlExpirationDuration.index')],
    ['text'=> \App\Helpers\TranslationHelper::translate('List')]
    ]" :button="[]">
    </x-bread-crumb>
@endsection

@push('admin_css')

@endpush

@section('content')

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            {{-- <div class="card-toolbar w-100 mb-7">
                <div class="d-flex justify-content-between w-100 data-kt-Customer-table-toolbar">
                    <div class="left-part">
                        @if (auth()->guard('admin')->user()->can('controlExpirationDuration.create', 'admin'))
                        <a href="{{ route('admin.controlExpirationDuration.create') }}" class="btn btn-primary text-gray-800">
                            <i class="ki-duotone ki-plus fs-2  text-gray-800"></i>
                            {{\App\Helpers\TranslationHelper::translate('Create controlExpirationDuration')}}
                        </a>
                        @endif
                    </div>
                </div>
            </div> --}}

            <table class="table table-rounded align-middle table-striped border gy-5 gs-7 dataTable no-footer"
                   id="kt_table_users">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{\App\Helpers\TranslationHelper::translate('Lesson Expiration Time')}}</th>
                    <th>{{\App\Helpers\TranslationHelper::translate('Package Expiration Time')}}</th>
                    <th>{{\App\Helpers\TranslationHelper::translate('Date')}}</th>
                    <th>{{\App\Helpers\TranslationHelper::translate('Actions')}}</th>
                </tr>
                </thead>
            </table>

            <!--end::Table-->
        </div>
    </div>

    <!--end::Content-->
    @include('admin.layouts.delete-modal',['action_message' => \App\Helpers\TranslationHelper::translate('This Item')])

@endsection

@push('admin_js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    <script>
        // begin first table
        var table1 = $('#kt_table_users').DataTable({
            serverSide: true,
            orderCellsTop: true,
            fixedHeader: true,
            language: {
                @if(App::getLocale()=='ar')
                url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json",
                @else
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json",
                @endif
            },
            processing: true,
            ajax: {
                url: '{{ route('admin.controlExpirationDuration.table') }}',
                data: function (d) {
                    d.id = $('#id').val();
                    d.name = $('#name').val();
                    d.created_at = $('#created_at').val();
                }
                
            },
            columns: [
                {data: 'id', name: 'id', defaultContent: '-'},
                                 {data: 'lesson_expiration_time', name: 'lesson_expiration_time', defaultContent: '-'},
                {data: 'package_expiration_time', name: 'package_expiration_time', defaultContent: '-'},
                {data: 'created_at', name: 'created_at', defaultContent: '-'},
                {data: 'action', orderable: false, searchable: false, className: 'text-center'}
            ], createdRow: function (row, data, index) {
                $(row).attr('id', 'row-' + data['id']);
            },
        });
    </script>

    <script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>
@endpush

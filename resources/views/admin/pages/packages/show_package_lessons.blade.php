@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Packages'))

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Packages'), 'link' => route('admin.packages.index')],
        ['text' => \App\Helpers\TranslationHelper::translate('Show Package Lessons')],
    ]" :button="[]">
    </x-bread-crumb>
@endsection

@push('admin_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card-toolbar w-100 mb-7">
                <div class="d-flex justify-content-between w-100 data-kt-Customer-table-toolbar">
                    <div class="left-part">
                        <button type="button" class="btn btn-primary text-gray-800" data-bs-toggle="modal"
                            data-bs-target="#addLessonsModal">
                            <i class="ki-duotone ki-plus fs-2 text-gray-800"></i>
                            {{ \App\Helpers\TranslationHelper::translate('Add Lessons To Package') }}
                        </button>
                    </div>
                </div>
            </div>
            {{ \App\Helpers\TranslationHelper::translate('PackageName:') . $package->name }}
            <table class="table table-rounded align-middle table-striped border gy-5 gs-7 dataTable no-footer"
                id="kt_table_users">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('image') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('name') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('level') }}</th>
                        {{-- <th>{{ \App\Helpers\TranslationHelper::translate('price') }}</th> --}}
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

    <!-- Modal -->
    <div class="modal fade" id="addLessonsModal" tabindex="-1" aria-labelledby="addLessonsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.packages.attachToPackage', $package->id) }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addLessonsModalLabel">
                            {{ \App\Helpers\TranslationHelper::translate('Select Lessons') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Select multiple lessons -->
                        <div class="mb-3">
                            <label for="lessons"
                                class="form-label">{{ \App\Helpers\TranslationHelper::translate('Choose Lessons') }}</label>
                            {{-- <select name="lessons[]" id="lessons" class="form-select" multiple required>
                                @foreach ($lessons as $lesson)
                                    <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                                @endforeach
                            </select> --}}
                            <select name="lessons[]" id="lessons" class="form-select select2-lessons" multiple required>
                                @foreach ($lessons as $lesson)
                                    <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit"
                            class="btn btn-success">{{ \App\Helpers\TranslationHelper::translate('Attach') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ \App\Helpers\TranslationHelper::translate('Cancel') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@push('admin_js')
    <script src="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
            ajax: {
                url: '{{ route('admin.packages.show_package_lessons_table', $package->id) }}',
                data: function(d) {
                    d.id = $('#id').val();
                    d.name = $('#name').val();
                    d.created_at = $('#created_at').val();
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
        $(document).ready(function() {
            $('.select2-lessons').select2({
                placeholder: "{{ \App\Helpers\TranslationHelper::translate('Choose Lessons') }}",
                allowClear: true,
                width: '100%'
            });
        });
    </script>


    <script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>
@endpush

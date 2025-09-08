@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Reorder Categories'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Categories'), 'link' => route('admin.category.index')],
        ['text' => \App\Helpers\TranslationHelper::translate('Reorder Categories')],
    ]" :button="[]">
    </x-bread-crumb>
@endsection
@push('admin_css')
    @include('admin.layouts.reorder.css')
@endpush
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-body py-4 px-0">
                            <div class="row px-0 mt-3">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left">
                                    <h4 class="d-inline-block  py-3">
                                        {{ \App\Helpers\TranslationHelper::translate('Reorder Categories') }}</h4>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end">
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.category.index') }}">{{ \App\Helpers\TranslationHelper::translate('Go to Categories') }}</a>
                                </div>
                            </div>
                            @include('admin.layouts.reorder.view', ['data' => $data, 'label' => $label])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
@push('admin_js')
    @include('admin.layouts.reorder.js', [
        'max' => $max_num ?? 3,
        'route' => route('admin.category.reorder.save'),
    ])
@endpush

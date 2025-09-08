@extends('admin.layouts.app')

@if ($method == 'PUT')
    @section('title', \App\Helpers\TranslationHelper::translate('Edit Level'))
@else
    @section('title', \App\Helpers\TranslationHelper::translate('Add Level'))
@endif

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Levels'), 'link' => route('admin.level.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ]" :button="[
        'text' => \App\Helpers\TranslationHelper::translate('Go to Level'),
        'link' => route('admin.level.index'),
    ]">
    </x-bread-crumb>
@endsection
@push('admin_css')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/tags-input.min.css') }}">
@endpush

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-body pt-0">
                            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if ($method == 'PUT')
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $level->id }}">
                                @endif
                                <div class="fv-row mb-10">

                                    <div class="row">
                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-6 mb-5">
                                                <label class="fs-5 fw-bold form-label mb-5">
                                                    {{ \App\Helpers\TranslationHelper::translate('name in') }}
                                                    {{ __('methods.' . $lang) }}
                                                    :
                                                </label>
                                                <input type="text" class="form-control form-control-solid"
                                                    value="{{ old('name.' . $key) ?? $level->getTranslation('name', $key) }}"
                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('name in') }} {{ __('methods.' . $lang) }}"
                                                    name="name[{{ $key }}]" />
                                                @error('name.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mb-5">
                                            <span
                                                class="indicator-label">{{ \App\Helpers\TranslationHelper::translate('Save') }}</span>
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_js')
    <script src="{{ asset('dashboard/assets/js/tags-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#meta-tags').tagsinput();
        });
    </script>
@endpush

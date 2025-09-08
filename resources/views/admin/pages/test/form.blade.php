@extends('admin.layouts.app')

@push('admin_css')
    <link href="{{ asset('dashboard/assets/css/tags-input.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    @if (App::getLocale() == 'ar')
    @endif
@endpush

@if ($method == 'PUT')
    @section('title', \App\Helpers\TranslationHelper::translate('Edit Test'))
@else
    @section('title', \App\Helpers\TranslationHelper::translate('Add Test'))
@endif

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Tests'), 'link' => route('admin.test.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ]" :button="['text' => \App\Helpers\TranslationHelper::translate('Go to Test'), 'link' => route('admin.test.index')]">
    </x-bread-crumb>
@endsection

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-body pt-0">
                            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($method == 'PUT')
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $test->id }}">
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
                                                    value="{{ old('name.' . $key) ?? $test->getTranslation('name', $key) }}"
                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('name in') }} {{ __('methods.' . $lang) }}"
                                                    name="name[{{ $key }}]" />
                                                @error('name.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach

                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Package') }} :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="packages_id" id="packages_id"
                                                class="form-control form-control-solid">
                                                <option value="">
                                                    {{ \App\Helpers\TranslationHelper::translate('Choose Package') }}
                                                </option>
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}"
                                                        {{ old('packages_id', $test->packages_id ?? '') == $package->id ? 'selected' : '' }}>
                                                        {{ $package->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('packages_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- اختيار الدرس --}}
                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Lesson') }} :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="videos_id" id="videos_id" class="form-control form-control-solid">
                                                <option value="">
                                                    {{ \App\Helpers\TranslationHelper::translate('Choose Lesson') }}
                                                </option>
                                                @foreach ($videos as $video)
                                                    <option value="{{ $video->id }}"
                                                        {{ old('videos_id', $test->videos_id ?? '') == $video->id ? 'selected' : '' }}>
                                                        {{ $video->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('videos_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-md-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('number of student questions') }}:</label>
                                            <input type="number" name="number_student_questions"
                                                class="form-control form-control-solid"
                                                value="{{ old('number_student_questions') }}"
                                                placeholder=" {{ \App\Helpers\TranslationHelper::translate('number of student questions') }}">
                                            @error('number_student_questions')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        {{ \App\Helpers\TranslationHelper::translate('Test Type') }}:
    </label>
    <select name="type" class="form-select form-select-solid">
        <option value="general" {{ old('type') == 'general' ? 'selected' : '' }}>
            {{ \App\Helpers\TranslationHelper::translate('General') }}
        </option>
        <option value="azhar" {{ old('type') == 'azhar' ? 'selected' : '' }}>
            {{ \App\Helpers\TranslationHelper::translate('Azhar') }}
        </option>
    </select>
    @error('type')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>



                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-12  mb-5">
                                                <label
                                                    class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('Description in') }}
                                                    {{ __('methods.' . $lang) }}
                                                </label>
                                                <textarea class="form-control form-control-solid full-editor" name="description[{{ $key }}]" rows="5"
                                                    id="description{{ $key }}" style="height: 300px; direction: rtl;">{{ old('description.' . $key) ?? $test->getTranslation('description', $key) }}</textarea>
                                                @error('description.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        $(document).ready(function() {
            $('#packages_id').select2({
                placeholder: "{{ \App\Helpers\TranslationHelper::translate('Choose Package') }}",
                allowClear: true
            });

            $('#videos_id').select2({
                placeholder: "{{ \App\Helpers\TranslationHelper::translate('Choose Lesson') }}",
                allowClear: true
            });
        });
    </script>
@endpush

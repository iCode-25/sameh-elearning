@extends('admin.layouts.app')

@push('admin_css')
    <link href="{{ asset('dashboard/assets/css/tags-input.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    @if (App::getLocale() == 'ar')
    @endif
@endpush
@if ($method == 'PUT')
    @section('title', \App\Helpers\TranslationHelper::translate('Edit Packages'))
@else
    @section('title', \App\Helpers\TranslationHelper::translate('Add Packages'))
@endif
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Packages'), 'link' => route('admin.packages.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ]" :button="[
        'text' => \App\Helpers\TranslationHelper::translate('Go to Packages'),
        'link' => route('admin.packages.index'),
    ]">
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
                                    <input type="hidden" name="id" value="{{ $packages->id }}">
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
                                                    value="{{ old('name.' . $key) ?? $packages->getTranslation('name', $key) }}"
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
                                                {{ \App\Helpers\TranslationHelper::translate('Acadimic Level') }} :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="level_id" id="level_id" class="form-control form-control-solid">
                                                <option value="">
                                                    {{ \App\Helpers\TranslationHelper::translate('Acadimic Level') }}
                                                </option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id }}"
                                                        {{ old('level_id', $packages->level_id ?? null) == $level->id ? 'selected' : '' }}>
                                                        {{ $level->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('level_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-6  mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Price') }}
                                                :
                                            </label>
                                            <input type="number" class="form-control form-control-solid"
                                                value="{{ old('price') ?? $packages->price }}"
                                                placeholder="{{ \App\Helpers\TranslationHelper::translate('Price') }}"
                                                name="price" />
                                            @error('price')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-6  mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Discount') }}
                                                (%):
                                            </label>
                                            <input type="number" class="form-control form-control-solid"
                                                value="{{ old('discount') ?? $packages->discount }}"
                                                placeholder="{{ \App\Helpers\TranslationHelper::translate('discount') }}"
                                                name="discount" />
                                            @error('discount')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-6  mb-5">
                                            <label
                                                class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('Image') }}
                                                : <span class="text-danger">
                                                    {{ \App\Helpers\TranslationHelper::translate('Size') }} <span
                                                        dir="ltr">400 x 400</span></span></label>
                                            <input type="file" class="form-control form-control-solid" name="image" />
                                            @error('image')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($packages->getFirstMediaUrl('workshops_image') != null)
                                                <img src="{{ $packages->getFirstMediaUrl('workshops_image') }}"
                                                    alt="packagess" width="100px" style="border-radius: 5px">
                                            @endif
                                        </div>

                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-12  mb-5">
                                                <label
                                                    class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('Description in') }}
                                                    {{ __('methods.' . $lang) }}
                                                </label>
                                                <textarea class="form-control form-control-solid full-editor" name="description[{{ $key }}]" rows="5"
                                                    id="description{{ $key }}" style="height: 300px; direction: rtl;">{{ old('description.' . $key) ?? $packages->getTranslation('description', $key) }}</textarea>
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
            $('#meta_tags').select2({
                tags: true,
                placeholder: 'Select or create options',
                allowClear: true
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            console.log("Document is ready");
            $('#level_id').select2({
                placeholder: "{{ \App\Helpers\TranslationHelper::translate('Acadimic Level') }}",
                allowClear: true
            });
        });
    </script>
@endpush

@extends('admin.layouts.app')

@push('admin_css')
    <link href="{{ asset('dashboard/assets/css/tags-input.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">

    @if (App::getLocale() == 'ar')
    @endif

@endpush

@if ($method == 'PUT')
    @section('title', \App\Helpers\TranslationHelper::translate('Edit Blog'))
@else
    @section('title', \App\Helpers\TranslationHelper::translate('Add Blog'))
@endif

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Blogs'), 'link' => route('admin.blog.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ]" :button="['text' => \App\Helpers\TranslationHelper::translate('Go to Blog'), 'link' => route('admin.blog.index')]">
    </x-bread-crumb>
@endsection

@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">

                        <!--begin::Card body-->

                        <div class="card-body pt-0">
                            <!--begin::Form-->
                            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($method == 'PUT')
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $blog->id }}">
                                @endif
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <div class="row">



                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-6 mb-5">
                                                <label class="fs-5 fw-bold form-label mb-5">
                                                    {{ \App\Helpers\TranslationHelper::translate('name in') }}
                                                    {{ __('methods.' . $lang) }}
                                                    :
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid"
                                                    value="{{ old('name.' . $key) ?? $blog->getTranslation('name', $key) }}"
                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('name in') }} {{ __('methods.' . $lang) }}"
                                                    name="name[{{ $key }}]" />
                                                @error('name.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach


                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-12  mb-5">
                                                <label
                                                    class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('Description in') }}
                                                    {{ __('methods.' . $lang) }}
                                                </label>
                                                <textarea class="form-control form-control-solid full-editor" name="description[{{ $key }}]" rows="5"
                                                    id="description{{ $key }}" style="height: 300px; direction: rtl;">{{ old('description.' . $key) ?? $blog->getTranslation('description', $key) }}</textarea>
                                                @error('description.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach




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
                                            @if ($blog->getFirstMediaUrl('blogs_image') != null)
                                                <img src="{{ $blog->getFirstMediaUrl('blogs_image') }}" alt="blogs"
                                                    width="100px" style="border-radius: 5px">
                                            @endif
                                        </div>

                                    </div>
                                    <!--begin::Label-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mb-5">
                                        <span
                                            class="indicator-label">{{ \App\Helpers\TranslationHelper::translate('Save') }}</span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>


                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
    </div>
    <!--end::Content-->

@endsection

@push('admin_js')
    {{-- <script src="/path-to-your-js-file/custom.js"></script> --}}
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


@endpush

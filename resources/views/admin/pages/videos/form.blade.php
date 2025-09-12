@extends('admin.layouts.app')

@if ($method == 'PUT')
    @section('title', \App\Helpers\TranslationHelper::translate('Edit Lessons'))
@else
    @section('title', \App\Helpers\TranslationHelper::translate('Add Lessons'))
@endif

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Lessons'), 'link' => route('admin.videos.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ]" :button="[
        'text' => \App\Helpers\TranslationHelper::translate('Go to Lessons'),
        'link' => route('admin.videos.index'),
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
                                    <input type="hidden" name="id" value="{{ $videos->id }}">
                                @endif
                                <div class="fv-row mb-10">
                                    <div class="row">
                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-6 mb-5">
                                                <label class="fs-5 fw-bold form-label mb-5">
                                                    {{ \App\Helpers\TranslationHelper::translate('Name in') }}
                                                    {{ __('methods.' . $lang) }}
                                                    :
                                                </label>
                                                <input type="text" class="form-control form-control-solid"
                                                    value="{{ old('name.' . $key) ?? $videos->getTranslation('name', $key) }}"
                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('Name in') }} {{ __('methods.' . $lang) }}"
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
                                                {{ \App\Helpers\TranslationHelper::translate('Price') }}:
                                            </label>

                                            <input type="number" step="0.1"
                                                value="{{ $videos->price ?? old('price') }}"
                                                class="form-control form-control-solid" name="price" />
                                            @error('price')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

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
                                                        {{ old('level_id', $videos->level_id ?? null) == $level->id ? 'selected' : '' }}>
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

                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-12  mb-5">
                                                <label
                                                    class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('Description in') }}
                                                    {{ __('methods.' . $lang) }}
                                                </label>
                                                <textarea class="form-control form-control-solid full-editor" name="des[{{ $key }}]" rows="5"
                                                    id="des{{ $key }}" style="height: 300px; direction: rtl;">{{ old('des.' . $key) ?? $videos->getTranslation('des', $key) }}</textarea>
                                                @error('des.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach


                                       @php
    use Illuminate\Support\Str;

    function getYoutubeEmbedUrl($url) {
        if (Str::contains($url, 'watch?v=')) {
            $id = Str::after($url, 'v=');
            $id = Str::before($id, '&'); // عشان لو فيه بارامترات زيادة
            return "https://www.youtube.com/embed/$id";
        }

        if (Str::contains($url, 'youtu.be/')) {
            $id = Str::after($url, 'youtu.be/');
            $id = Str::before($id, '?');
            return "https://www.youtube.com/embed/$id";
        }

        return $url; // fallback
    }
@endphp

<div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-2">
        {{ \App\Helpers\TranslationHelper::translate('Video Link') }}:
    </label>
    <input type="url" name="video_url"
        value="{{ old('video_url', $videos->video_url ?? '') }}"
        class="form-control" placeholder="Enter url video" />

    @if (!empty($videos->video_url))
        <div class="mt-4">
            <h5>{{ \App\Helpers\TranslationHelper::translate('Existing Video') }}:</h5>
            <div class="ratio ratio-16x9">
                <iframe width="100%" height="315"
                    src="{{ getYoutubeEmbedUrl($videos->video_url) }}"
                    title="YouTube video"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    @endif
</div>

<div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-2">
        {{ \App\Helpers\TranslationHelper::translate('Azhar Homework Video Link') }}:
    </label>
    <input type="url" name="azhar_video_url"
        value="{{ old('azhar_video_url', $videos->azhar_video_url ?? '') }}"
        class="form-control" placeholder="Enter url video" />

    @if (!empty($videos->azhar_video_url))
        <div class="mt-4">
            <h5>{{ \App\Helpers\TranslationHelper::translate('Existing Azhar Video') }}:</h5>
            <div class="ratio ratio-16x9">
                <iframe width="100%" height="315"
                    src="{{ getYoutubeEmbedUrl($videos->azhar_video_url) }}"
                    title="YouTube video"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    @endif
</div>

<div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-2">
        {{ \App\Helpers\TranslationHelper::translate('School Homework Video Link') }}:
    </label>
    <input type="url" name="school_video_url"
        value="{{ old('school_video_url', $videos->school_video_url ?? '') }}"
        class="form-control" placeholder="Enter url video" />

    @if (!empty($videos->school_video_url))
        <div class="mt-4">
            <h5>{{ \App\Helpers\TranslationHelper::translate('Existing School Video') }}:</h5>
            <div class="ratio ratio-16x9">
                <iframe width="100%" height="315"
                    src="{{ getYoutubeEmbedUrl($videos->school_video_url) }}"
                    title="YouTube video"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    @endif
</div>




                                       <div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        {{ \App\Helpers\TranslationHelper::translate('pdf') }} :
    </label>
    <input type="file" class="form-control form-control-solid" name="news_pdf"
        accept="application/pdf" />
    @error('news_pdf')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    @if ($videos->getFirstMediaUrl('newsnews_pdf') != null)
        <div class="mt-4">
            <h5>{{ \App\Helpers\TranslationHelper::translate('Existing PDF') }}:</h5>
            <a href="{{ $videos->getFirstMediaUrl('newsnews_pdf') }}" 
               target="_blank" 
               class="btn btn-primary">
               {{ \App\Helpers\TranslationHelper::translate('View') }}
            </a>
        </div>
    @endif
</div>


                                        <div class="col-6  mb-5">
                                            <label
                                                class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('Image') }}
                                                : <span class="text-danger">
                                                    {{ \App\Helpers\TranslationHelper::translate('Size') }} <span
                                                        dir="ltr">400 x 400</span></span></label>
                                            <input type="file" class="form-control form-control-solid"
                                                name="image" />
                                            @error('image')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($videos->getFirstMediaUrl('news') != null)
                                                <img src="{{ $videos->getFirstMediaUrl('news') }}" alt="videos"
                                                    width="100px" style="border-radius: 5px">
                                            @endif
                                        </div>

                                        
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
    <script src="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

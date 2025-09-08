@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('News Details'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Lessons'), 'link' => route('admin.videos.index')],
        ['text' => \App\Helpers\TranslationHelper::translate('Details')],
    ]" :button="[]">
    </x-bread-crumb>
@endsection
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-body py-4 px-0" dir="{{ Config::get('app.locale') == 'en' ? 'ltr' : 'rtl' }}">
                            <div class="row px-0 mt-3">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left">
                                    <h4 class="d-inline-block  py-3">
                                        {{ \App\Helpers\TranslationHelper::translate('News Details') }}</h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-right">
                                    <a class="btn btn-primary text-center" style="margin-left: 25px"
                                        href="{{ route('admin.videos.edit', $videos->id) }}">
                                        <span>{{ \App\Helpers\TranslationHelper::translate('Edit') }}</span> &nbsp;
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('Video') }} :
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-12 text-left details_item">
                                            <div class="row">
                                                @if ($videos->video_url)
                                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                                        <video width="100%" height="150" controls>
                                                            <source src="https://abdalhmad.b-cdn.net/{{ $videos->video_url }}"
                                                                type="video/mp4">
                                                            {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
                                                        </video>
                                                    </div>
                                                @else
                                                    <div class="col-12">
                                                        <p class="text-muted">
                                                            {{ \App\Helpers\TranslationHelper::translate('No Video Available') }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- فيديو الأزهر -->
<div class="row px-0 mt-3">
    <div class="col-lg-12 m-auto text-left">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                {{ \App\Helpers\TranslationHelper::translate('Azhar Homework Video') }} :
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-12 text-left details_item">
                <div class="row">
                    @if ($videos->azhar_video_url)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <video width="100%" height="150" controls>
                                <source src="https://abdalhmad.b-cdn.net/{{ $videos->azhar_video_url }}" type="video/mp4">
                            </video>
                        </div>
                    @else
                        <div class="col-12">
                            <p class="text-muted">{{ \App\Helpers\TranslationHelper::translate('No Video Available') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- فيديو المدرسة -->
<div class="row px-0 mt-3">
    <div class="col-lg-12 m-auto text-left">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                {{ \App\Helpers\TranslationHelper::translate('School Homework Video') }} :
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-12 text-left details_item">
                <div class="row">
                    @if ($videos->school_video_url)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <video width="100%" height="150" controls>
                                <source src="https://abdalhmad.b-cdn.net/{{ $videos->school_video_url }}" type="video/mp4">
                            </video>
                        </div>
                    @else
                        <div class="col-12">
                            <p class="text-muted">{{ \App\Helpers\TranslationHelper::translate('No Video Available') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('Image') }} :
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            <a href="{{ $videos->getFirstMediaUrl('news') }}" target="_blank">
                                                <img src="{{ $videos->getFirstMediaUrl('news') }}" class="w-100"
                                                    alt="test"
                                                    style="width: 150px; height: 150px; object-fit: contain;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('PDF') }} :
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            <iframe src="{{ $videos->getFirstMediaUrl('newsnews_pdf') }}" width="100%"
                                                height="600px" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row px-0 mt-3">
                                @foreach (Config('language') as $key => $lang)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                                {{ \App\Helpers\TranslationHelper::translate('Name in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                                {{ $videos->getTranslation('name', $key) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('Price') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            {{ $videos->price }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('Academic Levels') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            {{ $videos->level->name ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

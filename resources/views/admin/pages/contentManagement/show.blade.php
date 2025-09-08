@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('ContentManagement Details'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        [
            'text' => \App\Helpers\TranslationHelper::translate('ContentManagement'),
            'link' => route('admin.contentManagement.index'),
        ],
        ['text' => \App\Helpers\TranslationHelper::translate('Details')],
    ]" :button="[]">
    </x-bread-crumb>
@endsection
@section('content')


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

                        <div class="card-body py-4 px-0" dir="{{ Config::get('app.locale') == 'en' ? 'ltr' : 'rtl' }}">

                            <div class="row px-0 mt-3">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left">
                                    <h4 class="d-inline-block  py-3">
                                        {{ \App\Helpers\TranslationHelper::translate('ContentManagement Details') }}</h4>

                                </div>
                                @if (auth()->guard('admin')->user()->can('contentManagement.edit', 'admin'))
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-right">
                                        <a class="btn btn-primary text-center" style="margin-left: 25px"
                                            href="{{ route('admin.contentManagement.edit', $contentManagement->id) }}">
                                            <span>{{ \App\Helpers\TranslationHelper::translate('Edit') }}</span> &nbsp;
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>



                            <div class="row px-0 mt-3">
                                @foreach (Config('language') as $key => $lang)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                                {{ \App\Helpers\TranslationHelper::translate('name in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                                {!! $contentManagement->getTranslation('name', $key) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row px-0 mt-3">
                                @foreach (Config('language') as $key => $lang)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                                {{ \App\Helpers\TranslationHelper::translate('description in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                                {!! $contentManagement->getTranslation('description', $key) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>



                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('Image') }} :
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            <a href="{{ $contentManagement->getFirstMediaUrl('content_management_image') }}"
                                                target="_blank">
                                                <img src="{{ $contentManagement->getFirstMediaUrl('content_management_image') }}"
                                                    class="w-100" alt="test"
                                                    style="width: 150px; height: 150px; object-fit: contain;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('PDF') }} :
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            @if ($contentManagement->getFirstMediaUrl('pdf'))
                                                <a href="{{ $contentManagement->getFirstMediaUrl('pdf') }}" target="_blank"
                                                    class="btn btn-primary">
                                                    {{ \App\Helpers\TranslationHelper::translate('View PDF') }}
                                                </a>
                                            @else
                                                <span class="text-muted">
                                                    {{ \App\Helpers\TranslationHelper::translate('No PDF Uploaded') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
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
                                                @if ($contentManagement->getFirstMediaUrl('content_managementvideo'))
                                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                                        <video width="100%" height="150" controls>
                                                            <source
                                                                src="{{ $contentManagement->getFirstMediaUrl('content_managementvideo') }}"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
@section('script')
    <script></script>
@stop

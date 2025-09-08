@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Blog Details'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Blogs'), 'link' => route('admin.blog.index')],
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
                                        {{ \App\Helpers\TranslationHelper::translate('Blog Details') }}</h4>

                                </div>
                                @if (auth()->guard('admin')->user()->can('blogs.edit', 'admin'))
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-right">
                                        <a class="btn btn-primary text-center" style="margin-left: 25px"
                                            href="{{ route('admin.blog.edit', $blog->id) }}">
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
                                                {!! $blog->getTranslation('name', $key) !!}
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
                                                {!! $blog->getTranslation('description', $key) !!}
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
                                            <a href="{{ $blog->getFirstMediaUrl('blogs_image') }}" target="_blank">
                                                <img src="{{ $blog->getFirstMediaUrl('blogs_image') }}" class="w-100"
                                                    alt="test"
                                                    style="width: 150px; height: 150px; object-fit: contain;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    </div>

@stop
@section('script')
    <script></script>
@stop

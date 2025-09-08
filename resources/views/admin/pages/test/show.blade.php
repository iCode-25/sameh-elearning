@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Test Details'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Tests'), 'link' => route('admin.test.index')],
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
                                        {{ \App\Helpers\TranslationHelper::translate('Test Details') }}</h4>
                                </div>
                                @if (auth()->guard('admin')->user()->can('test.edit', 'admin'))
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-right">
                                        <a class="btn btn-primary text-center" style="margin-left: 25px"
                                            href="{{ route('admin.test.edit', $test->id) }}">
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
                                                {!! $test->getTranslation('name', $key) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>




<div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
            {{ __('Lesson') }}:
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
            @php
                $lessonLevel = $test->video?->level?->name ?? '-';
                $lessonName = $test->video?->name ?? '-';
            @endphp
            <span class="text-muted">[{{ $lessonLevel }}]</span> {{ $lessonName }}
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left mt-2">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
            {{ __('Package') }}:
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
            @php
                $packageLevel = $test->package?->level?->name ?? '-';
                $packageName = $test->package?->name ?? '-';
            @endphp
            <span class="text-muted">[{{ $packageLevel }}]</span> {{ $packageName }}
        </div>
    </div>
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
                                                {!! $test->getTranslation('description', $key) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row px-0 mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                {{ \App\Helpers\TranslationHelper::translate('Number of Student Questions') }}:
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                {{ $test->number_student_questions }}
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

@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Category Details'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Categories'), 'link' => route('admin.category.index')],
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
                                        {{ \App\Helpers\TranslationHelper::translate('Category Details') }}</h4>
                                </div>
                                @if (auth()->guard('admin')->user()->can('level.edit', 'admin'))
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-right">
                                        <a class="btn btn-primary text-center" style="margin-left: 25px"
                                            href="{{ route('admin.category.edit', $category->id) }}">
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
                                                {{ $category->getTranslation('name', $key) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('Description') }}
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            {!! $category->description !!}
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
                                            <a href="{{ $category->getFirstMediaUrl('categories') }}" target="_blank">
                                                <img src="{{ $category->getFirstMediaUrl('categories') }}" class="w-100"
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
                                            {{ \App\Helpers\TranslationHelper::translate('background') }} :
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            <a href="{{ $category->getFirstMediaUrl('categoriesbackground') }}"
                                                target="_blank">
                                                <img src="{{ $category->getFirstMediaUrl('categoriesbackground') }}"
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
                                            {{ \App\Helpers\TranslationHelper::translate('Color') }} :
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            @if ($category->color)
                                                <div
                                                    style="width: 50px; height: 50px; background-color: {{ $category->color }}; border: 1px solid #ccc; border-radius: 5px;">
                                                </div>
                                                <span class="d-block mt-2">{{ $category->color }}</span>
                                            @else
                                                <span
                                                    class="text-muted">{{ \App\Helpers\TranslationHelper::translate('no color') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>



                            {{-- 
                            background
 --}}

                            {{-- 
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                        <div class="row">
                                            <div
                                                class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                                {{\App\Helpers\TranslationHelper::translate('Name')}}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                                {{ $category->name }}
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div
                                            class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{\App\Helpers\TranslationHelper::translate('slug')}}
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            {{ $category->slug }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div
                                            class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{\App\Helpers\TranslationHelper::translate('Meta Title')}}
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            {{ $category->meta_title }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div
                                            class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{\App\Helpers\TranslationHelper::translate('Alt Text')}}
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            {{ $category->alt_text }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                                 <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div
                                            class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{\App\Helpers\TranslationHelper::translate('Meta Tags')}}
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            {{ $category->meta_tags }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                          

                             <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                    <div class="row">
                                        <div
                                            class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                            {{\App\Helpers\TranslationHelper::translate('Meta Image')}} :
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            <a href="{{ $category->getFirstMediaUrl('categories_meta_image') }}" target="_blank">
                                                <img src="{{ $category->getFirstMediaUrl('categories_meta_image') }}" class="w-100"
                                                     alt="test" style="width: 150px; height: 150px; object-fit: contain;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
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

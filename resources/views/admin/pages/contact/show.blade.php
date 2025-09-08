@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Contact Details'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Contacts'), 'link' => route('admin.contact.index')],
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
                                        {{ \App\Helpers\TranslationHelper::translate('Contact Details') }}</h4>
                                </div>
                                {{--                                @if (auth()->user()->id == 1 || auth()->user()->can('Region Edit')) --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-right">
                                    <a class="btn btn-primary text-center" style="margin-left: 25px"
                                        href="{{ route('admin.contact.edit', $contact->id) }}">
                                        <span>{{ \App\Helpers\TranslationHelper::translate('Edit') }}</span> &nbsp;
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                                {{--                                @endif --}}
                            </div>

                            {{-- <div class="row px-0 mt-3">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                        <div class="row">
                                            <div
                                                class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                                {{\App\Helpers\TranslationHelper::translate('Title in')}}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                                {{$contact->title}}
                                            </div>
                                        </div>
                                    </div>
                            </div> --}}

                            <div class="row px-0 mt-3">
                                @foreach (Config('language') as $key => $lang)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                                {{ \App\Helpers\TranslationHelper::translate('title in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                                {{ $contact->getTranslation('title', $key) }}
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
                                                {{ \App\Helpers\TranslationHelper::translate('address in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                                {{ $contact->getTranslation('address', $key) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
{{-- 
                            <div class="row px-0 mt-3">
                                @foreach (Config('language') as $key => $lang)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left ">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-6  text-left details_item bold">
                                                {{ \App\Helpers\TranslationHelper::translate('description in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                                {!! $contact->getTranslation('description', $key) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div> --}}






                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                        {{ \App\Helpers\TranslationHelper::translate('Facebook') }}:
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                        <a href="{{ $contact->facebook }}" target="_blank" rel="noopener noreferrer">
                                            {{ $contact->facebook }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                        {{ \App\Helpers\TranslationHelper::translate('Instagram') }}:
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                        <a href="{{ $contact->iniesta }}" target="_blank" rel="noopener noreferrer">
                                            {{ $contact->iniesta }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                        {{ \App\Helpers\TranslationHelper::translate('whatsapp') }}:
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                        <a href="{{ $contact->whatsapp }}" target="_blank" rel="noopener noreferrer">
                                            {{ $contact->whatsapp }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                        {{ \App\Helpers\TranslationHelper::translate('phone') }}:
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                        <a href="{{ $contact->phone }}" target="_blank" rel="noopener noreferrer">
                                            {{ $contact->phone }}
                                        </a>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                        {{ \App\Helpers\TranslationHelper::translate('tik tok') }}:
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                        <a href="{{ $contact->tiktok }}" target="_blank" rel="noopener noreferrer">
                                            {{ $contact->tiktok }}
                                        </a>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                        {{ \App\Helpers\TranslationHelper::translate('Youtube') }}:
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                        <a href="{{ $contact->youtube }}" target="_blank" rel="noopener noreferrer">
                                            {{ $contact->youtube }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                        {{ \App\Helpers\TranslationHelper::translate('x') }}:
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                        <a href="{{ $contact->x }}" target="_blank" rel="noopener noreferrer">
                                            {{ $contact->x }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                        {{ \App\Helpers\TranslationHelper::translate('email') }}:
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                        <a href="{{ $contact->email }}" target="_blank" rel="noopener noreferrer">
                                            {{ $contact->email }}
                                        </a>
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
                                            <a href="{{ $contact->getFirstMediaUrl('contacts_meta_image') }}"
                                                target="_blank">
                                                <img src="{{ $contact->getFirstMediaUrl('contacts_meta_image') }}"
                                                    class="img-fluid" alt="test"
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
                                            {{ \App\Helpers\TranslationHelper::translate('image_banner_contact') }} :
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  text-left details_item ">
                                            <a href="{{ $contact->getFirstMediaUrl('contacts_image_banner') }}" target="_blank">
                                                <img src="{{ $contact->getFirstMediaUrl('contacts_image_banner') }}"
                                                    class="img-fluid" alt="test"
                                                    style="width: 150px; height: 150px; object-fit: contain;">
                                            </a>
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

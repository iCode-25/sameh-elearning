@extends('admin.layouts.app')

@push('admin_css')
    <link href="{{ asset('dashboard/assets/css/tags-input.min.css') }}" rel="stylesheet">
@endpush

@if ($method == 'PUT')
    @section('title', \App\Helpers\TranslationHelper::translate('Edit Contact'))
@else
    @section('title', \App\Helpers\TranslationHelper::translate('Add Contact'))
@endif

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Contacts'), 'link' => route('admin.contact.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ]" :button="[
        'text' => \App\Helpers\TranslationHelper::translate('Go to Contact'),
        'link' => route('admin.contact.index'),
    ]">
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($method == 'PUT')
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $contact->id }}">
                                @endif
                                <div class="fv-row mb-10">
                                    <div class="row">
                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-6 mb-5">
                                                <label class="fs-5 fw-bold form-label mb-5">
                                                    {{ \App\Helpers\TranslationHelper::translate('title in') }}
                                                    {{ __('methods.' . $lang) }}
                                                    :
                                                </label>
                                                <input type="text" class="form-control form-control-solid"
                                                    value="{{ old('title.' . $key) ?? $contact->getTranslation('title', $key) }}"
                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('title in') }} {{ __('methods.' . $lang) }}"
                                                    name="title[{{ $key }}]" />
                                                @error('title.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach

                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-6 mb-5">
                                                <label class="fs-5 fw-bold form-label mb-5">
                                                    {{ \App\Helpers\TranslationHelper::translate('address in') }}
                                                    {{ __('methods.' . $lang) }}
                                                    :
                                                </label>
                                                <input type="text" class="form-control form-control-solid"
                                                    value="{{ old('address.' . $key) ?? $contact->getTranslation('address', $key) }}"
                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('address in') }} {{ __('methods.' . $lang) }}"
                                                    name="address[{{ $key }}]" />
                                                @error('address.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach

                                        {{-- <div class="row px-0 mt-3">
                                            @foreach (Config('language') as $key => $lang)
                                                <div class="col-12 my-5">
                                                    <label class="fs-5 fw-bold form-label bold mb-2">
                                                        {{ \App\Helpers\TranslationHelper::translate('description in') }}
                                                        {{ __('methods.' . $lang) }}:
                                                    </label>
                                                    <textarea name="description[{{ $key }}]" class="form-control form-control-solid content_textarea full-editor"
                                                        id="Discover the World description_{{ $key }}">{{ old('description.' . $key) ?? setting('description', $key) }}</textarea>
                                                    @error('description.' . $key)
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            @endforeach
                                        </div> --}}



                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('facebook') }}:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="facebook"
                                                value="{{ old('facebook') ?? $contact->facebook }}" />
                                            @error('facebook')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('instagram') }}:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="iniesta"
                                                value="{{ old('iniesta') ?? $contact->iniesta }}" />
                                            @error('iniesta')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('whatsapp') }}:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="whatsapp"
                                                value="{{ old('whatsapp') ?? $contact->whatsapp }}" />
                                            @error('whatsapp')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('phone') }}:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="phone"
                                                value="{{ old('phone') ?? $contact->phone }}" />
                                            @error('phone')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('tiktok') }}:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="tiktok"
                                                value="{{ old('tiktok') ?? $contact->tiktok }}" />
                                            @error('tiktok')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                         <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('youtube') }}:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="youtube"
                                                value="{{ old('youtube') ?? $contact->youtube }}" />
                                            @error('youtube')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        


                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('x') }}:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="x"
                                                value="{{ old('x') ?? $contact->x }}" />
                                            @error('x')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>




                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('E-mail') }}:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="email"
                                                value="{{ old('email') ?? $contact->email }}" />
                                            @error('email')
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
                                            <input type="file" class="form-control form-control-solid"
                                                name="meta_image" />
                                            @error('meta_image')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($contact->getFirstMediaUrl('contacts_meta_image') != null)
                                                <img src="{{ $contact->getFirstMediaUrl('contacts_meta_image') }}"
                                                    alt="contacts" width="100px" style="border-radius: 5px">
                                            @endif
                                        </div>


                                        <div class="col-6  mb-5">
                                            <label
                                                class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('image_banner_contact') }}
                                                : <span class="text-danger">
                                                    {{ \App\Helpers\TranslationHelper::translate('Size') }} <span
                                                        dir="ltr">400 x 400</span></span></label>
                                            <input type="file" class="form-control form-control-solid"
                                                name="image_banner" />
                                            @error('image_banner')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($contact->getFirstMediaUrl('contacts_image_banner') != null)
                                                <img src="{{ $contact->getFirstMediaUrl('contacts_image_banner') }}"
                                                    alt="contacts" width="100px" style="border-radius: 5px">
                                            @endif
                                        </div>

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
    <script src="{{ asset('dashboard/assets/js/tags-input.min.js') }}"></script>
@endpush

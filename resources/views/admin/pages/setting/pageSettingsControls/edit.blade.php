@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Settings Page about'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        [
            'text' => \App\Helpers\TranslationHelper::translate('Settings Page about'),
            'link' => route('admin.setting.pageSettingsControls.index'),
        ],
        ['text' => \App\Helpers\TranslationHelper::translate('Edit')],
    ]" :button="[]">
    </x-bread-crumb>
@endsection
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-body py-4 px-0">
                            <div class="row px-0 mt-3">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left">
                                    <h4 class="d-inline-block  py-3">
                                        {{ \App\Helpers\TranslationHelper::translate('Edit Settings Page about') }} </h4>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('admin.setting.pageSettingsControls.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="row px-0 mt-3">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label
                                                class="bold">{{ \App\Helpers\TranslationHelper::translate('image_banner_page_about') }}
                                                <span class="text-danger">*</span></label>
                                            <input type="file" name="image_banner_page_about"
                                                class="form-control form-control-solid" />
                                            @if (setting('image_banner_page_about', 'en'))
                                                <img src="{{ setting('image_banner_page_about', 'en') }}" width="100"
                                                    class="mt-2" />
                                            @endif
                                            @error('image_banner_page_about')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>




                                <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label
                                                    class="bold">{{ \App\Helpers\TranslationHelper::translate('title_about_us') }}
                                                    <span class="text-danger">*</span> {{ __('methods.' . $lang) }}</label>
                                                <input type="text" name="title_about_us[{{ $key }}]"
                                                    class="form-control form-control-solid"
                                                    value="{{ old('title_about_us.' . $key) ?? setting('title_about_us', $key) }}" />
                                                @error('title_about_us.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                                <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-12 my-5">
                                            <label class="fs-5 fw-bold form-label bold mb-2">
                                                {{ \App\Helpers\TranslationHelper::translate('description_about_us') }}
                                                {{ __('methods.' . $lang) }}:
                                            </label>
                                            <textarea name="description_about_us[{{ $key }}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="{{ $key }}">{{ old('description_about_us.' . $key) ?? setting('description_about_us', $key) }}</textarea>
                                            @error('description_about_us.' . $key)
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>





                                <div class="row px-0 mt-3">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label
                                                class="bold">{{ \App\Helpers\TranslationHelper::translate('image_section_video_about') }}
                                                <span class="text-danger">*</span></label>
                                            <input type="file" name="image_section_video_about"
                                                class="form-control form-control-solid" />
                                            @if (setting('image_section_video_about', 'en'))
                                                <img src="{{ setting('image_section_video_about', 'en') }}" width="100"
                                                    class="mt-2" />
                                            @endif
                                            @error('image_section_video_about')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="row px-0 mt-3">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label
                                                class="bold">{{ \App\Helpers\TranslationHelper::translate('video_page_about') }}
                                                <span class="text-danger">*</span></label>
                                            {{-- <input type="file" name="video_page_about"
                                                class="form-control form-control-solid" /> --}}
                                                <input type="file" name="video_page_about" accept="video/mp4,video/x-m4v,video/*" class="form-control form-control-solid" />
                                            @if (setting('video_page_about', 'en'))
                                                <video width="300" class="mt-2" controls>
                                                    <source src="{{ setting('video_page_about', 'en') }}" type="video/mp4">
                                                    {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
                                                </video>
                                            @endif
                                            @error('video_page_about')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>












                                {{-- <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-12 my-5">
                                            <label class="fs-5 fw-bold form-label bold mb-2">
                                                {{ \App\Helpers\TranslationHelper::translate('description sustainability in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </label>
                                            <textarea name="sustainability[{{ $key }}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="sustainability_{{ $key }}">{{ old('sustainability.' . $key) ?? setting('sustainability', $key) }}</textarea>
                                            @error('sustainability.' . $key)
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-12 my-5">
                                            <label class="fs-5 fw-bold form-label bold mb-2">
                                                {{ \App\Helpers\TranslationHelper::translate('description more_news in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </label>
                                            <textarea name="more_news[{{ $key }}]" class="form-control form-control-solid content_textarea full-editor"
                                                id="more_news_{{ $key }}">{{ old('more_news.' . $key) ?? setting('more_news', $key) }}</textarea>
                                            @error('more_news.' . $key)
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-12 my-5">
                                            <label class="fs-5 fw-bold form-label bold mb-2">
                                                {{ \App\Helpers\TranslationHelper::translate('description competition in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </label>
                                            <textarea name="competition[{{ $key }}]" class="form-control form-control-solid content_textarea full-editor"
                                                id="competition_{{ $key }}">{{ old('competition.' . $key) ?? setting('competition', $key) }}</textarea>
                                            @error('competition.' . $key)
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>


                                <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-12 my-5">
                                            <label class="fs-5 fw-bold form-label bold mb-2">
                                                {{ \App\Helpers\TranslationHelper::translate('description about_games in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </label>
                                            <textarea name="about_games[{{ $key }}]" class="form-control form-control-solid content_textarea full-editor"
                                                id="about_games_{{ $key }}">{{ old('about_games.' . $key) ?? setting('about_games', $key) }}</textarea>
                                            @error('about_games.' . $key)
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-12 my-5">
                                            <label class="fs-5 fw-bold form-label bold mb-2">
                                                {{ \App\Helpers\TranslationHelper::translate('description stories in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </label>
                                            <textarea name="stories[{{ $key }}]" class="form-control form-control-solid content_textarea full-editor"
                                                id="stories_{{ $key }}">{{ old('stories.' . $key) ?? setting('stories', $key) }}</textarea>
                                            @error('stories.' . $key)
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-12 my-5">
                                            <label class="fs-5 fw-bold form-label bold mb-2">
                                                {{ \App\Helpers\TranslationHelper::translate('description about_video in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </label>
                                            <textarea name="about_video[{{ $key }}]" class="form-control form-control-solid content_textarea full-editor"
                                                id="about_video_{{ $key }}">{{ old('about_video.' . $key) ?? setting('about_video', $key) }}</textarea>
                                            @error('about_video.' . $key)
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>


                              

                                <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-12 my-5">
                                            <label class="fs-5 fw-bold form-label bold mb-2">
                                                {{ \App\Helpers\TranslationHelper::translate('description about_workshops in') }}
                                                {{ __('methods.' . $lang) }}:
                                            </label>
                                            <textarea name="about_workshops[{{ $key }}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="about_workshops_{{ $key }}">{{ old('about_workshops.' . $key) ?? setting('about_workshops', $key) }}</textarea>
                                            @error('about_workshops.' . $key)
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div> --}}




                                {{-- <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label
                                                    class="bold">{{ \App\Helpers\TranslationHelper::translate('title') }}
                                                    <span class="text-danger">*</span> {{ __('methods.' . $lang) }}</label>
                                                <input type="text" name="title[{{ $key }}]"
                                                    class="form-control form-control-solid"
                                                    value="{{ old('title.' . $key) ?? setting('title', $key) }}" />
                                                @error('title.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div> --}}


                                {{-- <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label
                                                    class="bold">{{ \App\Helpers\TranslationHelper::translate('title_tow') }}
                                                    <span class="text-danger">*</span> {{ __('methods.' . $lang) }}</label>
                                                <input type="text" name="title_tow[{{ $key }}]"
                                                    class="form-control form-control-solid"
                                                    value="{{ old('title_tow.' . $key) ?? setting('title_tow', $key) }}" />
                                                @error('title_tow.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div> --}}




                                {{-- <div class="row px-0 mt-3">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label
                                                class="bold">{{ \App\Helpers\TranslationHelper::translate('image_one_pageSettingsControls') }}
                                                <span class="text-danger">*</span></label>
                                            <input type="file" name="image_one_pageSettingsControls"
                                                class="form-control form-control-solid" />
                                            @if (setting('image_one_pageSettingsControls', 'en'))
                                                <img src="{{ setting('image_one_pageSettingsControls', 'en') }}"
                                                    width="100" class="mt-2" />
                                            @endif
                                            @error('image_one_pageSettingsControls')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}





                                {{-- <div class="row px-0 mt-3">
    <div class="col-md-6 mb-4">
        <div class="form-group">
            <label class="bold">{{ \App\Helpers\TranslationHelper::translate('image_one') }}
                <span class="text-danger">*</span>
            </label>
            <input type="file" name="image_one" class="form-control form-control-solid" />
            <img src="{{ setting('image_one', 'en') }}" width="100" class="mt-2" />
            @error('image_one')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div> --}}



                                {{-- <div class="row px-0 mt-3">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_tow')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_tow" class="form-control form-control-solid" />
                                                <img src="{{ setting('image_tow', 'en') }}" width="100" class="mt-2" />
                                                @error('image_tow')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}

                                {{-- <div class="row px-0 mt-3">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_tow')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_tow" class="form-control form-control-solid" />
                                                @if (setting('image_tow', 'en'))
                                                    <img src="{{ setting('image_tow', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_tow')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}



                                <div class="mt-5" style="text-align: right">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Update</span>
                                    </button>
                                </div>
                            </form>
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
@stop
@section('script')
    <script></script>
@stop

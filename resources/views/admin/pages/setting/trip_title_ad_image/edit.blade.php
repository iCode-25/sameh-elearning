@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Banner and image'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text'=>\App\Helpers\TranslationHelper::translate('Banner and image'),'link'=>route('admin.setting.trip_title_ad_image.index')],
        ['text'=> \App\Helpers\TranslationHelper::translate('Edit')]
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

                        <div class="card-body py-4 px-0">

                            <div class="row px-0 mt-3">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left">
                                    <h4 class="d-inline-block  py-3">{{\App\Helpers\TranslationHelper::translate('Edit Banner and image')}} </h4>
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
                            <form action="{{ route('admin.setting.trip_title_ad_image.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                
                                

    

                                      {{-- <div class="row px-0 mt-3">
                                    @foreach (Config('language') as $key => $lang)
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('title_Where_the_journey')}}
                                                    <span class="text-danger">*</span> {{__('methods.' . $lang)}}</label>
                                                <input type="text" name="title_Where_the_journey[{{ $key}}]"
                                                       class="form-control form-control-solid"
                                                       value="{{ old('title_Where_the_journey.'.$key) ?? setting('title_Where_the_journey',$key)}}" />
                                                @error('title_Where_the_journey.'.$key)
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                     --}}
                                    
                                    

                                      <div class="row px-0 mt-3">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_logo_dashboard')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_logo_dashboard" class="form-control form-control-solid" />
                                                @if (setting('image_logo_dashboard', 'en'))
                                                    <img src="{{ setting('image_logo_dashboard', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_logo_dashboard')
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
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_logo_web')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_logo_web" class="form-control form-control-solid" />
                                                @if (setting('image_logo_web', 'en'))
                                                    <img src="{{ setting('image_logo_web', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_logo_web')
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
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_login_dashboard')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_login_dashboard" class="form-control form-control-solid" />
                                                @if (setting('image_login_dashboard', 'en'))
                                                    <img src="{{ setting('image_login_dashboard', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_login_dashboard')
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
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_banner_home_web')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_banner_home_web" class="form-control form-control-solid" />
                                                @if (setting('image_banner_home_web', 'en'))
                                                    <img src="{{ setting('image_banner_home_web', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_banner_home_web')
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
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_banner_page_blog_web')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_banner_page_blog_web" class="form-control form-control-solid" />
                                                @if (setting('image_banner_page_blog_web', 'en'))
                                                    <img src="{{ setting('image_banner_page_blog_web', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_banner_page_blog_web')
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
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_banner_page_packages_web')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_banner_page_packages_web" class="form-control form-control-solid" />
                                                @if (setting('image_banner_page_packages_web', 'en'))
                                                    <img src="{{ setting('image_banner_page_packages_web', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_banner_page_packages_web')
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
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_banner_page_lessons_web')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_banner_page_lessons_web" class="form-control form-control-solid" />
                                                @if (setting('image_banner_page_lessons_web', 'en'))
                                                    <img src="{{ setting('image_banner_page_lessons_web', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_banner_page_lessons_web')
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
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_banner_page_register_web')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_banner_page_register_web" class="form-control form-control-solid" />
                                                @if (setting('image_banner_page_register_web', 'en'))
                                                    <img src="{{ setting('image_banner_page_register_web', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_banner_page_register_web')
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
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_banner_page_package_details_web')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_banner_page_package_details_web" class="form-control form-control-solid" />
                                                @if (setting('image_banner_page_package_details_web', 'en'))
                                                    <img src="{{ setting('image_banner_page_package_details_web', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_banner_page_package_details_web')
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
                                                <label class="bold">{{\App\Helpers\TranslationHelper::translate('image_banner_page_lesson_details_web')}}
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="image_banner_page_lesson_details_web" class="form-control form-control-solid" />
                                                @if (setting('image_banner_page_lesson_details_web', 'en'))
                                                    <img src="{{ setting('image_banner_page_lesson_details_web', 'en') }}" width="100" class="mt-2" />
                                                @endif
                                                @error('image_banner_page_lesson_details_web')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                <div class="mt-5" style="text-align: right">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">{{\App\Helpers\TranslationHelper::translate('Update')}}</span>
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
    <script>

    </script>
@stop

@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('About us Setting'))

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text'=>\App\Helpers\TranslationHelper::translate('About us Setting'),'link'=>route('admin.setting.aboutUs.index')],
        ['text'=> \App\Helpers\TranslationHelper::translate('Edit')]
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
                                <div class="col-12 text-left">
                                    <h4 class="d-inline-block py-3">{{ \App\Helpers\TranslationHelper::translate('Edit About us Setting') }}</h4>
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

                            <form action="{{ route('admin.setting.aboutUs.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Start Tabs Navigation -->
                                <ul class="nav nav-tabs" id="aboutUsTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="mission-tab" data-bs-toggle="tab" href="#mission" role="tab">Mission Statement</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="vision-tab" data-bs-toggle="tab" href="#vision" role="tab">Vision</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="offer-tab" data-bs-toggle="tab" href="#offer" role="tab">What We Offer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="values-tab" data-bs-toggle="tab" href="#values" role="tab">Values</a>
                                    </li>
                                </ul>

                                <!-- Start Tabs Content -->
                                <div class="tab-content mt-4" id="aboutUsTabsContent">
                                    <!-- Mission Statement -->
                                    
                                     <div class="tab-pane fade show active" id="mission" role="tabpanel">
                                            @foreach (Config('language') as $key => $lang)
                                          <div class="col-12 my-5">
                                       <label class="fs-5 fw-bold form-label bold mb-2">
                                          {{\App\Helpers\TranslationHelper::translate('description_Mission_Statement in')}} {{__('methods.' . $lang)}}:
                                              </label>
                                            <textarea name="description_Mission_Statement[{{ $key}}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="{{$key}}">{{ old('description_Mission_Statement.'.$key) ?? setting('description_Mission_Statement',$key)}}</textarea>
                                              @error('description_Mission_Statement.'.$key)
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                             </div>
                                            @endforeach
                                            </div>

                                    <!-- Vision -->
                                    <div class="tab-pane fade" id="vision" role="tabpanel">
                                            @foreach (Config('language') as $key => $lang)
                                          <div class="col-12 my-5">
                                       <label class="fs-5 fw-bold form-label bold mb-2">
                                          {{\App\Helpers\TranslationHelper::translate('description_Vision in')}} {{__('methods.' . $lang)}}:
                                              </label>
                                            <textarea name="description_Vision[{{ $key}}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="Discover the World description_one_{{$key}}">{{ old('description_Vision.'.$key) ?? setting('description_Vision',$key)}}</textarea>
                                              @error('description_Vision.'.$key)
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                             </div>
                                            @endforeach
                                            </div> 

                    
                                    <!-- What We Offer -->
                                    {{-- <div class="tab-pane fade" id="offer" role="tabpanel">
                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-12 my-3">
                                                <label class="fs-5 fw-bold form-label">
                                                    {{\App\Helpers\TranslationHelper::translate('description_What_We_Offer in')}} {{__('methods.' . $lang)}}:
                                                </label>
                                                <textarea name="description_What_We_Offer[{{ $key }}]" class="form-control content_textarea full-editor">{{ old('description_What_We_Offer.'.$key) ?? setting('description_What_We_Offer',$key) }}</textarea>
                                                @error('description_What_We_Offer.'.$key)
                                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div> --}}

                                                <div class="tab-pane fade" id="offer" role="tabpanel">
                                            @foreach (Config('language') as $key => $lang)
                                          <div class="col-12 my-5">
                                       <label class="fs-5 fw-bold form-label bold mb-2">
                                          {{\App\Helpers\TranslationHelper::translate('description_What_We_Offer in')}} {{__('methods.' . $lang)}}:
                                              </label>
                                            <textarea name="description_What_We_Offer[{{ $key}}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="Discover the World description_What_We_Offer_{{$key}}">{{ old('description_What_We_Offer.'.$key) ?? setting('description_What_We_Offer',$key)}}</textarea>
                                              @error('description_What_We_Offer.'.$key)
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                             </div>
                                            @endforeach
                                            </div> 

                                    <!-- Values -->
                                    {{-- <div class="tab-pane fade" id="values" role="tabpanel">
                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-12 my-3">
                                                <label class="fs-5 fw-bold form-label">
                                                    {{\App\Helpers\TranslationHelper::translate('description_Values in')}} {{__('methods.' . $lang)}}:
                                                </label>
                                                <textarea name="description_Values[{{ $key }}]" class="form-control content_textarea full-editor">{{ old('description_Values.'.$key) ?? setting('description_Values',$key) }}</textarea>
                                                @error('description_Values.'.$key)
                                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div> --}}

                                     <div class="tab-pane fade" id="values" role="tabpanel">
                                            @foreach (Config('language') as $key => $lang)
                                          <div class="col-12 my-5">
                                       <label class="fs-5 fw-bold form-label bold mb-2">
                                          {{\App\Helpers\TranslationHelper::translate('description_Values in')}} {{__('methods.' . $lang)}}:
                                              </label>
                                            <textarea name="description_Values[{{ $key}}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="Discover the World description_Values_{{$key}}">{{ old('description_Values.'.$key) ?? setting('description_Values',$key)}}</textarea>
                                              @error('description_Values.'.$key)
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                             </div>
                                            @endforeach
                                            </div> 

                                </div>

                                <div class="mt-5" style="text-align: right">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Update</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('admin_js')
    <script>
        // إضافة كود تفعيل التبويبات في حالة استخدام Bootstrap 5
        var firstTabEl = document.querySelector('#aboutUsTabs a.nav-link.active');
        var firstTab = new bootstrap.Tab(firstTabEl);
        firstTab.show();
    </script>
@stop




{{-- @extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('About us Setting'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text'=>\App\Helpers\TranslationHelper::translate('About us Setting'),'link'=>route('admin.setting.aboutUs.index')],
        ['text'=> \App\Helpers\TranslationHelper::translate('Edit')]
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
                                    <h4 class="d-inline-block  py-3">{{\App\Helpers\TranslationHelper::translate('Edit About us Setting')}} </h4>
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
                            <form action="{{ route('admin.setting.aboutUs.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                 <div class="row px-0 mt-3">
                                            @foreach (Config('language') as $key => $lang)
                                          <div class="col-12 my-5">
                                       <label class="fs-5 fw-bold form-label bold mb-2">
                                          {{\App\Helpers\TranslationHelper::translate('description_Mission_Statement in')}} {{__('methods.' . $lang)}}:
                                              </label>
                                            <textarea name="description_Mission_Statement[{{ $key}}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="{{$key}}">{{ old('description_Mission_Statement.'.$key) ?? setting('description_Mission_Statement',$key)}}</textarea>
                                              @error('description_Mission_Statement.'.$key)
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
                                          {{\App\Helpers\TranslationHelper::translate('description_Vision in')}} {{__('methods.' . $lang)}}:
                                              </label>
                                            <textarea name="description_Vision[{{ $key}}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="Discover the World description_one_{{$key}}">{{ old('description_Vision.'.$key) ?? setting('description_Vision',$key)}}</textarea>
                                              @error('description_Vision.'.$key)
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
                                          {{\App\Helpers\TranslationHelper::translate('description_What_We_Offer in')}} {{__('methods.' . $lang)}}:
                                              </label>
                                            <textarea name="description_What_We_Offer[{{ $key}}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="Discover the World description_What_We_Offer_{{$key}}">{{ old('description_What_We_Offer.'.$key) ?? setting('description_What_We_Offer',$key)}}</textarea>
                                              @error('description_What_We_Offer.'.$key)
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
                                          {{\App\Helpers\TranslationHelper::translate('description_Values in')}} {{__('methods.' . $lang)}}:
                                              </label>
                                            <textarea name="description_Values[{{ $key}}]"
                                                class="form-control form-control-solid content_textarea full-editor" id="Discover the World description_Values_{{$key}}">{{ old('description_Values.'.$key) ?? setting('description_Values',$key)}}</textarea>
                                              @error('description_Values.'.$key)
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                             </div>
                                            @endforeach
                                            </div> 
                            
                                <div class="mt-5" style="text-align: right">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Update</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>

    </script>
@stop --}}

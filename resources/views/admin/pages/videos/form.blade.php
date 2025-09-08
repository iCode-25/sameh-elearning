@extends('admin.layouts.app')

@if ($method == 'PUT')
    @section('title', \App\Helpers\TranslationHelper::translate('Edit Lessons'))
@else
    @section('title', \App\Helpers\TranslationHelper::translate('Add Lessons'))
@endif

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Lessons'), 'link' => route('admin.videos.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ]" :button="[
        'text' => \App\Helpers\TranslationHelper::translate('Go to Lessons'),
        'link' => route('admin.videos.index'),
    ]">
    </x-bread-crumb>
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-body pt-0">
                            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($method == 'PUT')
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $videos->id }}">
                                @endif
                                <div class="fv-row mb-10">
                                    <div class="row">
                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-6 mb-5">
                                                <label class="fs-5 fw-bold form-label mb-5">
                                                    {{ \App\Helpers\TranslationHelper::translate('Name in') }}
                                                    {{ __('methods.' . $lang) }}
                                                    :
                                                </label>
                                                <input type="text" class="form-control form-control-solid"
                                                    value="{{ old('name.' . $key) ?? $videos->getTranslation('name', $key) }}"
                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('Name in') }} {{ __('methods.' . $lang) }}"
                                                    name="name[{{ $key }}]" />
                                                @error('name.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach

                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Price') }}:
                                            </label>

                                            <input type="number" step="0.1"
                                                value="{{ $videos->price ?? old('price') }}"
                                                class="form-control form-control-solid" name="price" />
                                            @error('price')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Acadimic Level') }} :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="level_id" id="level_id" class="form-control form-control-solid">
                                                <option value="">
                                                    {{ \App\Helpers\TranslationHelper::translate('Acadimic Level') }}
                                                </option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id }}"
                                                        {{ old('level_id', $videos->level_id ?? null) == $level->id ? 'selected' : '' }}>
                                                        {{ $level->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('level_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        @foreach (Config('language') as $key => $lang)
                                            <div class="col-12  mb-5">
                                                <label
                                                    class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('Description in') }}
                                                    {{ __('methods.' . $lang) }}
                                                </label>
                                                <textarea class="form-control form-control-solid full-editor" name="des[{{ $key }}]" rows="5"
                                                    id="des{{ $key }}" style="height: 300px; direction: rtl;">{{ old('des.' . $key) ?? $videos->getTranslation('des', $key) }}</textarea>
                                                @error('des.' . $key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach


                                        <div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        {{ \App\Helpers\TranslationHelper::translate('Video') }}:
    </label>
    <input type="file" id="news_video" accept="video/*" class="form-control form-control-solid" />
    <button type="button" id="uploadBtn" class="btn btn-success mt-3">
        <span id="btnText">{{ \App\Helpers\TranslationHelper::translate('Upload Video') }}</span>
        <span id="btnSpinner" class="spinner-border spinner-border-sm ms-2" role="status" style="display: none;"></span>
    </button>
    <div id="uploadStatus" class="mt-2"></div>
    <input type="hidden" name="video_url" id="video_url">

    @if ($videos->video_url)
        <div class="mt-4">
            <h5>{{ \App\Helpers\TranslationHelper::translate('Existing Video') }}:</h5>
            <video width="100%" controls>
                <source src="https://abdalhmad.b-cdn.net/{{ $videos->video_url }}" type="video/mp4">
                {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
            </video>
        </div>
    @endif
</div>




                                        {{-- <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Video') }}:
                                            </label>
                                            <input type="file" class="form-control form-control-solid" name="news_video"
                                                accept="video/*" />
                                            @error('news_video')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($videos->video_url)
                                                <div class="mt-4">
                                                    <h5>{{ \App\Helpers\TranslationHelper::translate('Existing Video') }}:
                                                    </h5>
                                                    <video width="100%" controls>
                                                        <source src="https://abdalhmad.b-cdn.net/{{ $videos->video_url }}"
                                                            type="video/mp4">
                                                        {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
                                                    </video>
                                                </div>
                                            @endif
                                        </div> --}}

                                        {{-- مضبوط --}}
                                       {{-- <div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        {{ \App\Helpers\TranslationHelper::translate('Video') }}:
    </label>
    <input type="file" id="news_video" accept="video/*" class="form-control form-control-solid" />
    <button type="button" id="uploadBtn" class="btn btn-success mt-3">{{ \App\Helpers\TranslationHelper::translate('Upload Video') }}</button>
    <div id="uploadStatus" class="mt-2"></div>
    <input type="hidden" name="video_url" id="video_url">
    @if ($videos->video_url)
        <div class="mt-4">
            <h5>{{ \App\Helpers\TranslationHelper::translate('Existing Video') }}:</h5>
            <video width="100%" controls>
                <source src="https://abdalhmad.b-cdn.net/{{ $videos->video_url }}" type="video/mp4">
                {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
            </video>
        </div>
    @endif
</div>  --}}
<!-- Toast -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
  <div id="errorToast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        ⚠️ اختر فيديو أولا
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>


{{-- <div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        {{ \App\Helpers\TranslationHelper::translate('Video') }}:
    </label>
    <input type="file" id="news_video" accept="video/*" class="form-control form-control-solid" />
    <button type="button" id="uploadBtn" class="btn btn-success mt-3">
        <span id="btnText">{{ \App\Helpers\TranslationHelper::translate('Upload Video') }}</span>
        <span id="btnSpinner" class="spinner-border spinner-border-sm ms-2" role="status" style="display: none;"></span>
    </button>
    <div id="uploadStatus" class="mt-2"></div>
    <input type="hidden" name="video_url" id="video_url">

    @if ($videos->video_url)
        <div class="mt-4">
            <h5>{{ \App\Helpers\TranslationHelper::translate('Existing Video') }}:</h5>
            <video width="100%" controls>
                <source src="https://abdalhmad.b-cdn.net/{{ $videos->video_url }}" type="video/mp4">
                {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
            </video>
        </div>
    @endif
</div> --}}


{{--  
<div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        {{ \App\Helpers\TranslationHelper::translate('Video') }}:
    </label>
        <div class="progress mb-3" style="height: 20px; display: none;">
        <div id="uploadProgress" 
             class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
             role="progressbar" style="width: 0%">0%</div>
    </div>
    <input type="file" id="news_video" accept="video/*" class="form-control form-control-solid" />
    <button type="button" id="uploadBtn" class="btn btn-success mt-3">Upload Video</button>
    <div id="uploadStatus" class="mt-2"></div>
        <input type="hidden" name="video_url" id="video_url">
    @if ($videos->video_url)
        <div class="mt-4">
            <h5>{{ \App\Helpers\TranslationHelper::translate('Existing Video') }}:</h5>
            <video width="100%" controls>
                <source src="https://abdalhmad.b-cdn.net/{{ $videos->video_url }}" type="video/mp4">
                {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
            </video>
        </div>
    @endif
</div>
  --}}



                                        {{-- <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Azhar Homework Video') }}:
                                            </label>
                                            <input type="file" class="form-control form-control-solid" name="azhar_video"
                                                accept="video/*" />
                                            @error('azhar_video')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            @if ($videos->azhar_video_url)
                                                <div class="mt-4">
                                                    <h5>{{ \App\Helpers\TranslationHelper::translate('Existing Azhar Video') }}:
                                                    </h5>
                                                    <video width="100%" controls>
                                                        <source
                                                            src="https://abdalhmad.b-cdn.net/{{ $videos->azhar_video_url }}"
                                                            type="video/mp4">
                                                        {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
                                                    </video>
                                                </div>
                                            @endif
                                        </div>


                                        <div class="col-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('School Homework Video') }}:
                                            </label>
                                            <input type="file" class="form-control form-control-solid"
                                                name="school_video" accept="video/*" />
                                            @error('school_video')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            @if ($videos->school_video_url)
                                                <div class="mt-4">
                                                    <h5>{{ \App\Helpers\TranslationHelper::translate('Existing School Video') }}:
                                                    </h5>
                                                    <video width="100%" controls>
                                                        <source
                                                            src="https://abdalhmad.b-cdn.net/{{ $videos->school_video_url }}"
                                                            type="video/mp4">
                                                        {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
                                                    </video>
                                                </div>
                                            @endif
                                        </div> --}}

                                        <div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        {{ \App\Helpers\TranslationHelper::translate('Azhar Homework Video') }}:
    </label>
    <input type="file" id="azhar_video" class="form-control form-control-solid" accept="video/*" />
    <button type="button" id="uploadAzharBtn" class="btn btn-success mt-3">
        <span id="azharBtnText">{{ \App\Helpers\TranslationHelper::translate('Upload Video') }}</span>
        <span id="azharBtnSpinner" class="spinner-border spinner-border-sm ms-2" role="status" style="display: none;"></span>
    </button>
    <div id="azharUploadStatus" class="mt-2"></div>
    <input type="hidden" name="azhar_video_url" id="azhar_video_url">

    @if ($videos->azhar_video_url)
        <div class="mt-4">
            <h5>{{ \App\Helpers\TranslationHelper::translate('Existing Azhar Video') }}:</h5>
            <video width="100%" controls>
                <source src="https://abdalhmad.b-cdn.net/{{ $videos->azhar_video_url }}" type="video/mp4">
                {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
            </video>
        </div>
    @endif
</div>

<div class="col-6 mb-5">
    <label class="fs-5 fw-bold form-label mb-5">
        {{ \App\Helpers\TranslationHelper::translate('School Homework Video') }}:
    </label>
    <input type="file" id="school_video" class="form-control form-control-solid" accept="video/*" />
    <button type="button" id="uploadSchoolBtn" class="btn btn-success mt-3">
        <span id="schoolBtnText">{{ \App\Helpers\TranslationHelper::translate('Upload Video') }}</span>
        <span id="schoolBtnSpinner" class="spinner-border spinner-border-sm ms-2" role="status" style="display: none;"></span>
    </button>
    <div id="schoolUploadStatus" class="mt-2"></div>
    <input type="hidden" name="school_video_url" id="school_video_url">

    @if ($videos->school_video_url)
        <div class="mt-4">
            <h5>{{ \App\Helpers\TranslationHelper::translate('Existing School Video') }}:</h5>
            <video width="100%" controls>
                <source src="https://abdalhmad.b-cdn.net/{{ $videos->school_video_url }}" type="video/mp4">
                {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
            </video>
        </div>
    @endif
</div>


                                        <div class="col-6  mb-5">
                                            <label
                                                class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('pdf') }}
                                                :</label>
                                            <input type="file" class="form-control form-control-solid" name="news_pdf"
                                                accept="application/pdf" />
                                            @error('news_pdf')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($videos->getFirstMediaUrl('newsnews_pdf') != null)
                                                <div class="mt-4">
                                                    <h5>{{ \App\Helpers\TranslationHelper::translate('Existing PDF') }}:
                                                    </h5>
                                                    <iframe src="{{ $videos->getFirstMediaUrl('newsnews_pdf') }}"
                                                        width="100%" height="600px" frameborder="0"></iframe>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-6  mb-5">
                                            <label
                                                class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('Image') }}
                                                : <span class="text-danger">
                                                    {{ \App\Helpers\TranslationHelper::translate('Size') }} <span
                                                        dir="ltr">400 x 400</span></span></label>
                                            <input type="file" class="form-control form-control-solid"
                                                name="image" />
                                            @error('image')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($videos->getFirstMediaUrl('news') != null)
                                                <img src="{{ $videos->getFirstMediaUrl('news') }}" alt="videos"
                                                    width="100px" style="border-radius: 5px">
                                            @endif
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
    <script src="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            console.log("Document is ready");
            $('#level_id').select2({
                placeholder: "{{ \App\Helpers\TranslationHelper::translate('Acadimic Level') }}",
                allowClear: true
            });
        });
    </script>
    
  {{-- <script>
document.getElementById("uploadBtn").addEventListener("click", async function () {
    let fileInput = document.getElementById("news_video");
    let file = fileInput.files[0];
    if (!file) {
        alert("اختر فيديو أولا");
        return;
    }
    // 1- نجيب Presigned URL من السيرفر
    let presignRes = await fetch("/admin/videos/presign", {
        method: "POST",
        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}", "Content-Type": "application/json" },
        body: JSON.stringify({ file_name: file.name, mime_type: file.type })
    });
    let presignData = await presignRes.json();
    // 2- نرفع الفيديو على Bunny
    let uploadRes = await fetch(presignData.uploadUrl, {
        method: "PUT",
        headers: presignData.headers,
        body: file
    });
    if (uploadRes.ok) {
        document.getElementById("uploadStatus").innerHTML = "<span class='text-success'>✅ تم رفع الفيديو</span>";
        document.getElementById("video_url").value = presignData.path; 
    } else {
        document.getElementById("uploadStatus").innerHTML = "<span class='text-danger'>❌ فشل الرفع</span>";
    }
});
</script>  --}}
<script>
document.getElementById("uploadBtn").addEventListener("click", async function () {
    let fileInput = document.getElementById("news_video");
    let file = fileInput.files[0];

    if (!file) {
        alert("اختر فيديو أولا");
        return;
    }

    // تفعيل spinner أثناء الرفع
    document.getElementById("btnSpinner").style.display = "inline-block";
    document.getElementById("btnText").innerText = "جاري الرفع...";

    try {
        // 1- نجيب Presigned URL من السيرفر
        let presignRes = await fetch("/admin/videos/presign", {
            method: "POST",
            headers: { 
                "X-CSRF-TOKEN": "{{ csrf_token() }}", 
                "Content-Type": "application/json" 
            },
            body: JSON.stringify({ file_name: file.name, mime_type: file.type })
        });

        let presignData = await presignRes.json();

        // 2- نرفع الفيديو على Bunny
        let uploadRes = await fetch(presignData.uploadUrl, {
            method: "PUT",
            headers: presignData.headers,
            body: file
        });

        if (uploadRes.ok) {
            document.getElementById("uploadStatus").innerHTML = "<span class='text-success'>✅ تم رفع الفيديو</span>";
            document.getElementById("video_url").value = presignData.path; 
        } else {
            document.getElementById("uploadStatus").innerHTML = "<span class='text-danger'>❌ فشل الرفع</span>";
        }

    } catch (error) {
        document.getElementById("uploadStatus").innerHTML = "<span class='text-danger'>⚠️ حصل خطأ أثناء الرفع</span>";
    } finally {
        // إخفاء spinner بعد الانتهاء
        document.getElementById("btnSpinner").style.display = "none";
        document.getElementById("btnText").innerText = "{{ \App\Helpers\TranslationHelper::translate('Upload Video') }}";
    }
});
</script>

    {{-- <script>
document.getElementById("uploadBtn").addEventListener("click", async function () {
    let fileInput = document.getElementById("news_video");
    let file = fileInput.files[0];
    if (!file) {
    Swal.fire({
        icon: 'warning',
        title: 'تنبيه',
        text: '⚠️ اختر فيديو أولا',
        confirmButtonText: 'تمام'
    });
    return;
}
    document.getElementById("btnSpinner").style.display = "inline-block";
    document.getElementById("btnText").innerText = "جاري الرفع الان...";
    try {
        let presignRes = await fetch("/admin/videos/presign", {
            method: "POST",
            headers: { 
                "X-CSRF-TOKEN": "{{ csrf_token() }}", 
                "Content-Type": "application/json" 
            },
            body: JSON.stringify({ file_name: file.name, mime_type: file.type })
        });
        let presignData = await presignRes.json();
        let uploadRes = await fetch(presignData.uploadUrl, {
            method: "PUT",
            headers: presignData.headers,
            body: file
        });
        if (uploadRes.ok) {
            document.getElementById("uploadStatus").innerHTML = "<span class='text-success'>✅  تم رفع الفديو با نجاح</span>";
            document.getElementById("video_url").value = presignData.path; 
        } else {
            document.getElementById("uploadStatus").innerHTML = "<span class='text-danger'>❌ فشل الرفع</span>";
        }
    } catch (error) {
        document.getElementById("uploadStatus").innerHTML = "<span class='text-danger'>⚠️ حصل خطأ أثناء الرفع</span>";
    } finally {
        document.getElementById("btnSpinner").style.display = "none";
        document.getElementById("btnText").innerText = "{{ \App\Helpers\TranslationHelper::translate('Upload Video') }}";
    }
});
</script> --}}

<script>
async function uploadVideo(inputId, btnTextId, btnSpinnerId, statusId, hiddenInputId) {
    let fileInput = document.getElementById(inputId);
    let file = fileInput.files[0];
    if (!file) {
        Swal.fire({
            icon: 'warning',
            title: 'تنبيه',
            text: '⚠️ اختر فيديو أولا',
            confirmButtonText: 'تمام'
        });
        return;
    }

    document.getElementById(btnSpinnerId).style.display = "inline-block";
    document.getElementById(btnTextId).innerText = "جاري الرفع الان...";

    try {
        let presignRes = await fetch("/admin/videos/presign", {
            method: "POST",
            headers: { 
                "X-CSRF-TOKEN": "{{ csrf_token() }}", 
                "Content-Type": "application/json" 
            },
            body: JSON.stringify({ file_name: file.name, mime_type: file.type })
        });

        let presignData = await presignRes.json();

        let uploadRes = await fetch(presignData.uploadUrl, {
            method: "PUT",
            headers: presignData.headers,
            body: file
        });

        if (uploadRes.ok) {
            document.getElementById(statusId).innerHTML = "<span class='text-success'>✅ تم رفع الفيديو بنجاح</span>";
            document.getElementById(hiddenInputId).value = presignData.path; 
        } else {
            document.getElementById(statusId).innerHTML = "<span class='text-danger'>❌ فشل الرفع</span>";
        }

    } catch (error) {
        document.getElementById(statusId).innerHTML = "<span class='text-danger'>⚠️ حصل خطأ أثناء الرفع</span>";
    } finally {
        document.getElementById(btnSpinnerId).style.display = "none";
        document.getElementById(btnTextId).innerText = "{{ \App\Helpers\TranslationHelper::translate('Upload Video') }}";
    }
}

document.getElementById("uploadAzharBtn").addEventListener("click", function() {
    uploadVideo('azhar_video', 'azharBtnText', 'azharBtnSpinner', 'azharUploadStatus', 'azhar_video_url');
});

document.getElementById("uploadSchoolBtn").addEventListener("click", function() {
    uploadVideo('school_video', 'schoolBtnText', 'schoolBtnSpinner', 'schoolUploadStatus', 'school_video_url');
});
</script>

{{-- <script>
document.getElementById("uploadBtn").addEventListener("click", async function () {
    let fileInput = document.getElementById("news_video");
    let file = fileInput.files[0];
    if (!file) {
        alert("اختر فيديو أولا");
        return;
    }

    let presignRes = await fetch("/admin/videos/presign", {
        method: "POST",
        headers: { 
            "X-CSRF-TOKEN": "{{ csrf_token() }}", 
            "Content-Type": "application/json" 
        },
        body: JSON.stringify({ file_name: file.name, mime_type: file.type })
    });

    let presignData = await presignRes.json();

    document.querySelector(".progress").style.display = "block";

    let xhr = new XMLHttpRequest();
    xhr.open("PUT", presignData.uploadUrl, true);

    for (const [key, value] of Object.entries(presignData.headers)) {
        xhr.setRequestHeader(key, value);
    }

    xhr.upload.addEventListener("progress", function (e) {
        if (e.lengthComputable) {
            let percentComplete = Math.round((e.loaded / e.total) * 100);
            let progressBar = document.getElementById("uploadProgress");
            progressBar.style.width = percentComplete + "%";
            progressBar.innerText = percentComplete + "%";
        }
    });

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            document.getElementById("uploadStatus").innerHTML = "<span class='text-success'>✅ تم رفع الفيديو</span>";
            document.getElementById("video_url").value = presignData.path;
        } else {
            document.getElementById("uploadStatus").innerHTML = "<span class='text-danger'>❌ فشل الرفع</span>";
        }
    };

    xhr.onerror = function () {
        document.getElementById("uploadStatus").innerHTML = "<span class='text-danger'>⚠️ حصل خطأ أثناء الرفع</span>";
    };

    xhr.send(file);
});
</script>  --}}
@endpush

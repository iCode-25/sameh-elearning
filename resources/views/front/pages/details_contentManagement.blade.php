@extends('front.layouts.app')

@section('content')

<main>
    <section class="jop-main">
        <div class="row">

             <section class="jop-main">
            <div class="row">
                <div class="col-md-4 jop-contentManagement">
                    <div class="oresh">
                        <br>
                    </div>
                    <button onclick="window.location.href='{{route('contentManagement')}}'"
                          class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols"
                         style="z-index: 9999999999999;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </section>

        <div class="col-md-8" style="padding: 10px; margin-left: 7px;">
    <div class="workshop-detailss  p-4 text-center">
        <div class="text-center mb-3">
            <img src="{{ $details_contentManagement->getFirstMediaUrl('content_management_image') }}"
                 class="img-fluid rounded-circle shadow"
                 style="width: 150px; height: 150px; object-fit: cover;"
                 alt="{{ $details_contentManagement->name }}">
        </div>
        <h2 style="color: rgba(var(--bs-success-rgb), var(--bs-text-opacity)) !important;"
            class="fw-bold text-primary">{{ $details_contentManagement->name }}</h2>
        <p class="description"> {!! $details_contentManagement->description !!}</p>

        @if($details_contentManagement->getFirstMediaUrl('content_managementvideo'))
            <div class="video-container">
                <video controls class="w-100 rounded shadow">
                    <source src="{{ $details_contentManagement->getFirstMediaUrl('content_managementvideo') }}" type="video/mp4">
                      {{ \App\Helpers\TranslationHelper::translate('Your browser does not support video playback.') }}
                </video>
            </div>
        @elseif($details_contentManagement->getFirstMediaUrl('pdf'))
            <a href="{{ $details_contentManagement->getFirstMediaUrl('pdf') }}" target="_blank"
               class="btn story-pdf-btn"
               style="background-color: #198754 !important; color: #fff !important;">
                <i class="fas fa-file-pdf"></i>{{ \App\Helpers\TranslationHelper::translate('Views PDF') }}
            </a>
        @endif
    </div>
</div>

<style>
    .video-container {
    position: relative;
    width: 100%;
    max-width: 600px;
    margin: 15px auto;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.video-container video {
    width: 100%;
    height: 300px;
    border-radius: 10px;
}

</style>

    </section>
</main>


@endsection








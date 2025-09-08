@extends('front.layouts.app')

@section('content')

<main>
    <section class="jop-main">
        <div class="row">

             <section class="jop-main">
            <div class="row">
            <div class="col-md-4 jop-events">
                <div class="oresh resetP">
                    {{ \App\Helpers\TranslationHelper::translate('News & Updates') }}
                </div>
                <button onclick="window.location.href='{{route('events')}}'"
                    class="position-absolute bottom-2 end-0 m-2 border-0 bg-transparent btn-cols">
                    <i class="fas fa-times"></i>
                </button>
            </div>
                <!-- <div class="col-md-4 jop-events">
                    <div class="oresh">
                        <br>
                    </div>
                    <button onclick="window.location.href='{{route('events')}}'"
                         class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols"
                        style="z-index: 9999999999999;">
                        <i class="fas fa-times"></i>
                    </button>
                </div> -->
            </div>
        </section>

       <div class="col-md-8" style="padding: 15px; margin-left: 7px;">
    <div class="workshop-detailss p-4">

        @if($details_event->getFirstMediaUrl('events_managementvideo'))
            <div class="media-container text-center">
                <video controls class="w-100 rounded ">
                    <source src="{{ $details_event->getFirstMediaUrl('events_managementvideo') }}" type="video/mp4">
                    {{ \App\Helpers\TranslationHelper::translate('Your browser does not support video playback.') }}
                </video>
            </div>
        @elseif($details_event->getFirstMediaUrl('events_management_image'))
            <div class="media-container text-center">
                <img src="{{ $details_event->getFirstMediaUrl('events_management_image') }}"
                     alt="{{ $details_event->name }}"
                     class="img-fluid rounded">
            </div>
        @endif
        <div class="event-detels">
        <h2 class="event-title text-center">{{ $details_event->name }}</h2>
        <p class="event-description"> {!! $details_event->description !!}</p>
        </div>


    </div>
</div>




    </section>
</main>



@endsection








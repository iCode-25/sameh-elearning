@extends('front.layouts.app')

@section('content')
    <section class="title-banner">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <div class="title-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="title-content">
                                    <h2 class="fw-bold mb-3" style="color: var(--primary-color);">
                                        {{ $package->getTranslation('name', app()->getLocale()) }}</h2>
                                    <div class="mb-3">
                                        <span class="badge"
                                            style="background: var(--primary-color); color: #fff; font-size: 1rem;">{{ $package->level->getTranslation('name', app()->getLocale()) }}</span>
                                    </div>
                                </div>
                                <div class="img-block">
                                    <img src="{{ asset('front/assets/media/user/star.png') }}" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="{{ $package->getFirstMediaUrl('workshops_image') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lesson-view py-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 p-0">
                    <div class="card border-0 shadow rounded-4 p-2 bg-white mb-2">
                        <div style="position: relative; width: 100%; max-width: 800px; margin: auto;">
                            {{-- <video controls width="100%" style="border-radius: 12px; max-height: 80vh;">
                                <source src="https://abdalhmad.b-cdn.net/{{ $lesson->video_url }}" type="video/mp4">
                                {{ \App\Helpers\TranslationHelper::translate('Your browser does not support the video tag.') }}
                            </video> --}}

                            <iframe width="100%" height="500" src="{{ App\Helpers\VideoHelpers::toEmbedUrl($lesson->video_url) }}"
                                style="border-radius: 12px; max-height: 80vh;" frameborder="0" allowfullscreen>
                            </iframe>

                            <div id="watermark"
                                style="position: absolute;
                                    top: 10px;
                                    left: 0;
                                    white-space: nowrap;
                                    background: rgba(255,255,255,0.1);
                                    color: red;
                                    font-weight: bold;
                                    padding: 5px 15px;
                                    animation: scrollText 15s linear infinite;
                                    pointer-events: none;
                                    z-index: 10;
                                ">
                                {{ auth('web')->user()->email }} - {{ now()->format('H:i:s') }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-semibold m-2" style="color: var(--primary-color);">
                                {{ $lesson->name }}</h5>
                        </div>
                        <div class="mb-4">
                            <h5 class="fw-semibold mb-2" style="color: var(--primary-color);">
                                {{ \App\Helpers\TranslationHelper::translate('Description') }}</h5>
                            <div>{!! $lesson->getTranslation('des', app()->getLocale()) !!}</div>
                        </div>
                    </div>
                    @if ($lesson->getFirstMediaUrl('newsimage_newsnews_pdf'))
                        <div class="card border-0 shadow rounded-4 p-2 bg-white mb-2">
                            <div class="mb-4">
                                <h5 class="fw-semibold mb-2" style="color: var(--primary-color);">
                                    {{ \App\Helpers\TranslationHelper::translate('PDF File') }}</h5>
                                <x-pdf-viewer :url="$lesson->getFirstMediaUrl('newsimage_newsnews_pdf')" />
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 col-md-12 px-2">
                    {{-- Homework --}}
                    {{-- Homework --}}
                    @if (auth('web')->user()->type == 'azhar' && $lesson->azhar_video_url)
                        <div class="card border-0 shadow rounded-4 mb-2 p-2 bg-white">
                            <h4 class="fw-bold mb-3" style="color: var(--primary-color);">
                                {{ \App\Helpers\TranslationHelper::translate('Homework') }}</h4>
                            <div class="list-group list-group-flush px-2">
                                <div onclick="window.location.href='{{ route('user.show_lesson', ['lesson' => $lesson->id, 'type' => 'azhar']) }}'"
                                    class="my-2 d-flex justify-content-start align-items-start cursor-pointer"
                                    style="cursor: pointer">

                                    <img src="{{ $lesson->getFirstMediaUrl('newsimage_newsimage_news') }}" class="border"
                                        style="width: 160px; height: 100px; object-fit: cover; border-radius: 12px; flex-shrink: 0;" />

                                    <div class="px-2" style="font-size: 14px !important;">
                                        <span class="fw-bold color-primary overflow-hidden"
                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            {{ Str::limit($lesson->getTranslation('name', app()->getLocale())) }}
                                        </span>
                                        <div class="overflow-hidden"
                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            {!! Str::limit(strip_tags($lesson->getTranslation('des', app()->getLocale()))) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                    @if (auth('web')->user()->type == 'general' && $lesson->school_video_url)
                        <div class="card border-0 shadow rounded-4 mb-2 p-2 bg-white">
                            <h4 class="fw-bold mb-3" style="color: var(--primary-color);">
                                {{ \App\Helpers\TranslationHelper::translate('Homework') }}</h4>
                            <div class="list-group list-group-flush px-2">
                                <div onclick="window.location.href='{{ route('user.show_lesson', ['lesson' => $lesson->id, 'type' => 'azhar']) }}'"
                                    class="my-2 d-flex justify-content-start align-items-start cursor-pointer"
                                    style="cursor: pointer">

                                    <img src="{{ $lesson->getFirstMediaUrl('newsimage_newsimage_news') }}" class="border"
                                        style="width: 160px; height: 100px; object-fit: cover; border-radius: 12px; flex-shrink: 0;" />

                                    <div class="px-2" style="font-size: 14px !important;">
                                        <span class="fw-bold color-primary overflow-hidden"
                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            {{ Str::limit($lesson->getTranslation('name', app()->getLocale())) }}
                                        </span>
                                        <div class="overflow-hidden"
                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            {!! Str::limit(strip_tags($lesson->getTranslation('des', app()->getLocale()))) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif

                    {{-- Tests --}}
                    <div class="card border-0 shadow rounded-4 p-2 bg-white mb-2">
                        <h4 class="fw-bold mb-3" style="color: var(--primary-color);">
                            {{ \App\Helpers\TranslationHelper::translate('lesson tests') }}</h4>
                        @if (isset($lesson->tests) && $lesson->tests()->active()->where('type', auth('web')->user()->type)->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach ($lesson->tests()->active()->where('type', auth('web')->user()->type)->get() as $test)
                                    <li class="list-group-item d-flex justify-content-between align-items-center mb-0 pb-0">
                                        <div>
                                            <span class="fw-bold"
                                                style="color: var(--primary-color);">{{ $test->name }}</span>
                                            <span class="text-muted ms-2">{!! Str::limit($test->description, 40) !!}</span>
                                        </div>
                                        <a href="{{ route('user.test.show', ['lesson' => $lesson->id, 'test' => $test->id]) }}"
                                            class="btn btn-sm"
                                            style="background: var(--primary-color); color: #fff; border-radius: 6px;">{{ \App\Helpers\TranslationHelper::translate('start test') }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-info mb-0">
                                {{ \App\Helpers\TranslationHelper::translate('not tests yet') }}
                            </div>
                        @endif
                    </div>

                    <div class="card border-0 shadow rounded-4 p-2 bg-white mb-2">
                        <h4 class="fw-bold mb-3" style="color: var(--primary-color);">
                            {{ \App\Helpers\TranslationHelper::translate('package tests') }}</h4>
                        @if (isset($package->tests) && $package->tests()->active()->where('type', auth('web')->user()->type)->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach ($package->tests()->active()->where('type', auth('web')->user()->type)->get() as $test)
                                    <li class="list-group-item d-flex justify-content-between align-items-center mb-0 pb-0">
                                        <div
                                            title="{{ $test->quizzes->count() == 0 ? \App\Helpers\TranslationHelper::translate('Quizzes not found') : \App\Helpers\TranslationHelper::translate('start') }}">
                                            <span class="fw-bold"
                                                style="color: var(--primary-color);">{{ $test->name }}</span>
                                            <span class="text-muted ms-2">{!! Str::limit($test->description, 40) !!}</span>
                                        </div>
                                        <a href="{{ route('user.package.test.show', ['package' => $package->id, 'test' => $test->id]) }}"
                                            class="btn btn-sm {{ $test->quizzes->count() == 0 ? 'disabled' : '' }}"
                                            style="background: var(--primary-color); color: #fff; border-radius: 6px;">{{ \App\Helpers\TranslationHelper::translate('start test') }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-info mb-0">
                                {{ \App\Helpers\TranslationHelper::translate('not tests yet') }}
                            </div>
                        @endif
                    </div>
                    @if (count($package->lessons) > 0)
                        <div class="card border-0 shadow rounded-4 p-2 bg-white">
                            <h4 class="fw-bold mb-3" style="color: var(--primary-color);">
                                {{ \App\Helpers\TranslationHelper::translate('package lessons') }}</h4>
                            <div class="list-group list-group-flush px-2">
                                @forelse($package->lessons as $next)
                                    <div onclick="window.location.href='{{ route('user.show_package', ['package' => $package->id, 'lesson' => $next->id]) }}'"
                                        class="py-2 d-flex justify-content-start align-items-start cursor-pointer"
                                        style="cursor: pointer">

                                        <img src="{{ $next->getFirstMediaUrl('newsimage_news') }}" class="border"
                                            style="width: 160px; height: 100px; object-fit: cover; border-radius: 12px; flex-shrink: 0;" />

                                        <div class="px-2" style="font-size: 14px !important;">
                                            <span class="fw-bold color-primary overflow-hidden"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                {{ Str::limit($next->getTranslation('name', app()->getLocale())) }}
                                            </span>
                                            <div class="overflow-hidden"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                {!! Str::limit(strip_tags($next->getTranslation('des', app()->getLocale()))) !!}
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <li class="list-group-item text-muted">
                                        {{ \App\Helpers\TranslationHelper::translate('lessons not available') }}</li>
                                @endforelse
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </section>
@endsection

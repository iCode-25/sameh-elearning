@foreach ($lessons as $lesson)
    <div class="col-md-6">
        <div class="video-block border position-relative">
            <img src="{{ $lesson->getFirstMediaUrl('news') }}" alt="brand" class="w-100">
            <a @if(Route::currentRouteName() === 'user.profile') href="{{ route('user.show_lesson', ['lesson' => $lesson->id]) }}"  @else href="{{ route('site.lesson_details', ['lesson' => $lesson->id]) }}" @endif class="play-btn">
                <img src="{{ asset('front/assets/media/icons/play-icon.png') }}" alt="video" class="video-pic">
            </a>

            <div class="block">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="white mb-4p">
                            {{ Str::limit($lesson->getTranslation('name', app()->getLocale()), 80, '...') }}
                        </h5>
                        <p class="lightest-gray">
                            {{ $lesson->level?->getTranslation('name', app()->getLocale()) }}
                        </p>
                    </div>
                    <div>
                        <p class="lightest-gray">
                            {{ $lesson->price == 0 ? \App\Helpers\TranslationHelper::translate('FREE') : $lesson->price . ' ' . \App\Helpers\TranslationHelper::translate('EGP') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach



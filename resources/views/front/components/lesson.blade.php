@foreach ($lessons as $lesson)
    <section class="videos py-80" dir="ltr">
        <div class="container">
            <div class="video-grid">
                @foreach ($lessons as $lesson)
                    <div class="video-card">
                        <div class="card-img">
                            <img src="{{ $lesson->getFirstMediaUrl('newsimage_news') }}" alt="video">
                            <a href="{{ route('site.lesson_details', ['lesson' => $lesson->id]) }}" class="play-btn">
                                <img src="{{ asset('front/assets/media/icons/play-icon.png') }}" alt="play">
                            </a>
                        </div>
                        <div class="card-body" dir="rtl">
                            <h5>{{ $lesson->name }}</h5>
                            <p>{!! strip_tags($lesson->des) !!}</p>
                            <span class="price">{{ $lesson->price . ' ' . \App\Helpers\TranslationHelper::translate('EGP') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endforeach

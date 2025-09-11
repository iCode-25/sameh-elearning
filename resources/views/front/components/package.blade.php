@foreach ($packages as $package)
    <div class="row g-4">
        @foreach ($packages as $package)
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                <div class="package-card-pro bg-white br-20 shadow-sm h-100 d-flex flex-column transition">

                    <!-- صورة الكورس -->
                    <div class="package-img position-relative">
                        <img src="{{ $package->getFirstMediaUrl('workshops_image') }}" alt=""
                            class="w-100 h-100 object-fit-cover br-20-top">
                        <span class="price-tag bg-primary text-white fw-700">
                            {{ $package->price - ($package->price * $package->discount) / 100 }}
                            {{ \App\Helpers\TranslationHelper::translate('EGP') }}
                        </span>
                    </div>

                    <!-- تفاصيل -->
                    <div class="p-20 d-flex flex-column flex-grow-1">
                        <h5 class="fw-700 mb-12 dark-gray">
                            {{ $package->getTranslation('name', app()->getLocale()) }}</h5>

                        <div class="d-flex gap-2 small text-muted mb-12 flex-wrap">
                            <span>{{ $package->lessons()->count() }}
                                {{ \App\Helpers\TranslationHelper::translate('Lessons') }}</span>
                            <span>•</span>
                            <span>{{ $package->level?->getTranslation('name', app()->getLocale()) }}</span>
                        </div>

                        <p class="light-gray small mb-20 text-truncate-3 flex-grow-1">
                            {!! Str::limit($package->getTranslation('description', app()->getLocale()), 150, '...') !!}
                        </p>

                        <!-- زرار -->
                        <div>
                            @if (Route::currentRouteName() === 'user.profile')
                                <a href="{{ route('user.site.package.details', $package->id) }}"
                                    class="btn-enroll w-100">
                                    {{ \App\Helpers\TranslationHelper::translate('Track your progress') }}
                                </a>
                            @else
                                <a href="{{ route('user.site.package.details', $package->id) }}"
                                    class="btn-enroll w-100">
                                    {{ \App\Helpers\TranslationHelper::translate('enroll') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach

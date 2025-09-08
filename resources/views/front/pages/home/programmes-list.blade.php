

   <div class="col-lg-9">

    <div class="row">
        @if ($programmes->count() > 0)
            @foreach ($programmes as $programme)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 card-tiru">
                        <div class="card-body card-tour-img">
                            <!-- الشارة (Badge) -->
                            @if ($programme->isNew)
                                <span class="badge-new">New</span>
                            @endif

                            <!-- أيقونة القلب -->
                            <div class="top-icon">
                                @if(auth('web')->check())
                                    <span class="favorite-icon"
                                          data-bs-toggle="tooltip"
                                          title="{{ checkProgrammeWish($programme->id) == 0 ? 'Add to Wishlist' : 'Remove from Wishlist' }}"
                                          onclick="favouriteChange(this)"
                                          data-url="{{ route('user.programme.favourite.change', ['id' => $programme->id]) }}">
                                        <i class="fa{{ checkProgrammeWish($programme->id) == 0 ? 'r' : 's' }} fa-heart"></i>
                                    </span>
                                @else
                                    <span class="favorite-icon"
                                          data-bs-toggle="tooltip"
                                          title="Login to add to Wishlist"
                                          onclick="window.location.href='{{ route('user.login.form') }}'">
                                        <i class="far fa-heart"></i>
                                    </span>
                                @endif
                            </div>

                            <!-- صورة البرنامج -->
                            <a href="{{ route('trip_details', $programme->id) }}">
                                <img src="{{ $programme->getFirstMediaUrl('programmes_banners') }}"
                                     alt="Programme Image"
                                     style="width: 100%; height: 200px; object-fit: cover; background-color: #f8f8f8; border-bottom: 1px solid #ddd; padding: 5px;">
                            </a>
                        </div>
                        <div class="special-content">
                            <a href="{{ route('trip_details', $programme->id) }}">
                                <h5 style="display: block;">{{ $programme->city->name }}</h5>
                                <span style="display: block;">
                                    <i class="fas fa-map-marker-alt"></i> {{ $programme->name }}
                                </span>
                            </a>
                            <p>{!! Str::words(strip_tags($programme->description), 15) !!}</p>
                            <div class="bottom-section">
                                <div class="price_fac">
                                    <div class="price">
                                        @php
                                            $currency = app()->getLocale() === 'ar' ? 'ريال' : 'SAR';
                                        @endphp
                                        @if ($programme->discount > 0)
                                            <!-- السعر قبل الخصم -->
                                            <div style="font-size: 18px; color: #2c2a28; display: inline-flex; align-items: center; text-decoration: line-through; margin-bottom: 5px;">
                                                {{ $programme->price }} <span style="margin-left: 5px;">{{ $currency }}</span>
                                            </div>
                                            <!-- السعر بعد الخصم -->
                                            <div style="font-weight: bold; font-size: 20px; color: #e98f33; display: inline-flex; align-items: center;">
                                                {{ getProgrammePriceIfDiscount($programme) }} <span style="margin-left: 5px;">{{ $currency }}</span>
                                            </div>
                                        @else
                                            <!-- السعر بدون خصم -->
                                            <div style="font-weight: bold; font-size: 20px; color: #e98f33; display: inline-flex; align-items: center;">
                                                {{ $programme->price }} <span style="margin-left: 5px;">{{ $currency }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="tr-price-btn">
                {{ $programmes->links() }}
            </div>
        @else
            <p>{{ \App\Helpers\TranslationHelper::translate('No programmes found', 'site') }}</p>
        @endif
    </div>
</div>

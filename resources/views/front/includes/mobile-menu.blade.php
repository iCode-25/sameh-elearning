<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
        <div class="logo-box">
            <a href="{{ route('site.home') }}" aria-label="logo image">
                <img src="{{ setting('image_logo_web', 'en') }}" alt="">
            </a>
        </div>
        <div class="mobile-nav__container"></div>
        <ul class="mobile-nav__contact list-unstyled">
            @auth
                <li class="d-flex justify-content-between">
                    <a href="{{ route('user.profile') }}" class="mobile-nav__contact-item">
                        {{ auth()->user()->name }}
                    </a>
                    <i class="fa fa-user"></i>
                </li>
            @endauth
            @guest
                <li class="d-flex justify-content-between p-0">
                    <a href="{{ route('user.login.form') }}" class="mobile-nav__contact-item">
                        {{ App\Helpers\TranslationHelper::translate('login') }}
                    </a>
                    <i class="fa fa-user"></i>
                </li>
            @endguest
            {{-- <li>
                <i class="fas fa-envelope"></i>
                <a href="mailto:example@company.com">example@company.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:+12345678">+123 (4567) -890</a>
            </li> --}}
        </ul>
        <div class="mobile-nav__social">
            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>

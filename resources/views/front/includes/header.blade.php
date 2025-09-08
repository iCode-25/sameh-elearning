<header class="header">
    <div class="container-fluid">
        <nav class="navigation d-flex align-items-center justify-content-between">
            <a href="{{ route('site.home') }}" class="brand-name text-decoration-none">
                <span class="first-part">{{ \App\Helpers\TranslationHelper::translate('Mr') }}</span><span
                    class="middle-part">.</span><span
                    class="last-part">{{ \App\Helpers\TranslationHelper::translate('AbdulHamid') }}</span>
            </a>

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Poppins:wght@700&display=swap');

                .brand-name {
                    font-size: 28px;
                    font-weight: 700;
                    font-family: 'Cairo', sans-serif;
                    color: var(--primary-color);
                    display: inline-block;
                    letter-spacing: 1.5px;
                    transition: all 0.4s ease-in-out;
                }

                .brand-name:hover {
                    background-position: right center;
                    transform: scale(1.08);
                }

                .brand-name .first-part {
                    font-style: normal;
                }

                .brand-name .middle-part {
                    margin: 0 3px;
                    font-weight: 400;
                    color: var(--primary-color);
                    -webkit-text-fill-color: #ccc;
                    background: none;
                }

                .brand-name .last-part {
                    text-transform: uppercase;
                }
            </style>

            <div class="menu-button-right">
                <div class="main-menu__nav">
                    <ul class="main-menu__list">
                        <li>
                            <a href="{{ route('site.home') }}"
                                class="text-bold {{ request()->routeIs('site.home') ? 'active' : '' }}">
                                {{ \App\Helpers\TranslationHelper::translate('home') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.about') }}"
                                class="text-bold {{ request()->routeIs('site.about') ? 'active' : '' }}">
                                {{ \App\Helpers\TranslationHelper::translate('ABOUT US') }}
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('site.blogs') }}"
                                class="text-bold {{ request()->routeIs('site.blogs*') ? 'active' : '' }}">
                                {{ \App\Helpers\TranslationHelper::translate('BLOG') }}
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('site.lessons') }}"
                                class="text-bold {{ request()->routeIs('site.lessons*') ? 'active' : '' }}">
                                {{ \App\Helpers\TranslationHelper::translate('Lessons') }}
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('site.packages') }}"
                                class="text-bold {{ request()->routeIs('site.packages*') ? 'active' : '' }}">
                                {{ \App\Helpers\TranslationHelper::translate('Packages') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.contact') }}"
                                class="text-bold {{ request()->routeIs('site.contact') ? 'active' : '' }}">
                                {{ \App\Helpers\TranslationHelper::translate('CONTACT') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-menu__right">
                <div class="search-heart-icon d-sm-flex d-none align-items-center gap-24">

                    @guest('web')
                        <a href="{{ route('user.login.form') }}" class="cus-btn">
                            <span class="btn-text">{{ \App\Helpers\TranslationHelper::translate('login') }}</span>
                            <span>{{ \App\Helpers\TranslationHelper::translate('login') }}</span>
                        </a>
                    @endguest

                    @auth('web')
                        <div class="avatar-circle dropdown">
                            <a href="#" class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @if (auth('web')->user()->getFirstMediaUrl('users'))
                                    <img src="{{ auth('web')->user()->getFirstMediaUrl('users') }}" alt="avatar"
                                        class="avatar-img">
                                @else
                                    <img src="{{ asset('front/assets/media/user/default.jpg') }}" alt="avatar"
                                        class="avatar-img">
                                @endif
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('user.profile') }}">{{ \App\Helpers\TranslationHelper::translate('profile') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ \App\Helpers\TranslationHelper::translate('Logout') }}</a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @endauth

                    <div class="lang-toggle-btn ms-3">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if ($localeCode != app()->getLocale())
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    class="lang-circle">
                                    {{ strtoupper($localeCode) }}
                                </a>
                            @endif
                        @endforeach
                    </div>


                    <style>
                        .avatar-circle {
                            display: inline-block;
                            position: relative;
                        }

                        .avatar-img {
                            width: 40px;
                            height: 40px;
                            border-radius: 50%;
                            object-fit: cover;
                            border: 2px solid var(--primary-color);
                            background: #fff;
                            transition: 0.3s;
                        }

                        .avatar-img:hover {
                            border-color: var(--secondary-color);
                            transform: scale(1.08);
                        }

                        .lang-toggle-btn .lang-circle {
                            width: 40px;
                            height: 40px;
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            background: var(--primary-color);
                            color: #fff;
                            border-radius: 50%;
                            font-weight: bold;
                            text-decoration: none;
                            transition: 0.3s ease;
                        }

                        .lang-toggle-btn .lang-circle:hover {
                            background: var(--secondary-color);
                            color: #fff;
                            transform: scale(1.1) rotate(5deg);
                        }
                    </style>


                </div>
                <a href="#" class="d-xl-none d-flex main-menu__toggler mobile-nav__toggler">
                    <img src="{{ asset('front/assets/media/icons/menu-2.png') }}" alt="">
                </a>
            </div>

        </nav>
    </div>
</header>

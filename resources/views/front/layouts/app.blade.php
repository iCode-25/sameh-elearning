<!DOCTYPE html>

<html @if (app()->getLocale() == 'ar') lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif>

@include('front.includes.head')


<body class="x-hidden">
    {{-- <div id="watermark" style="
    position: fixed;
    top: 40%;
    left: 30%;
    font-size: 2rem;
    color: rgba(255,0,0,0.2);
    transform: rotate(-30deg);
    z-index: 9999;
    pointer-events: none;
">
    {{ auth('web')->user()->name ?? 'guest' }}
</div> --}}

    <!-- Preloader-->
    <div id="preloader">
        <div class="book">
            <div class="inner">
                {{-- <div class="left"></div> --}}
                {{-- <div class="middle"></div> --}}
                {{-- <div class="right"></div> --}}
                {{-- <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul> --}}

                <img src="{{ asset('front/assets/media/preloader.png') }}" alt="" srcset="">

            </div>
        </div>
    </div>
    <!-- Preloader-->

    <!-- Overlay Spinner -->
    <div id="spinner-overlay" class="spinner-overlay" style="display: none;">
        <div class="spinner-loader"></div>
    </div>

    <!-- Main Wrapper Start -->

    <!-- HEADER MENU START -->
    @include('front.includes.header')
    <!-- HEADER MENU END -->

    {{-- Content Start --}}
    @yield('content')
    {{-- Content End --}}

    <!-- FOOTER START -->
    @include('front.includes.footer')
    <!-- FOOTER END -->

    <!-- Main Wrapper End -->

    <!-- Back To Top Start -->
    <button class="scrollToTopBtn"><i class="fa fa-arrow-up"></i></button>


    <!-- Mobile Menu Start -->
    @include('front.includes.mobile-menu')
    <!-- Mobile Menu End -->



    @include('front.includes.scripts')

</body>

</html>

@extends('front.layouts.app')
@section('content')
    <!-- COMING SOON START -->
    <section class="coming-soon-page">
        <div class="container">
            <div class="row">
                <div class="cs-block py-80">
                    <div class="logo-img">
                        <img src="{{ asset('front/assets/media/cs-logo.png') }}" alt="logo" class="mb-32">
                    </div>
                    <div class="coming-soon-wrapper mb-32">
                        <ul class="unstyled countdown">
                            <li>
                                <h2 class="fw-800 dark-gray">44</h2>
                                <p>Days</p>
                            </li>
                            <li>
                                <h2 class="fw-800 dark-gray">20</h2>
                                <p>Hrs</p>
                            </li>
                            <li>
                                <h2 class="fw-800 dark-gray">44</h2>
                                <p>Mins</p>
                            </li>
                            <li>
                                <h2 class="fw-800 dark-gray">16</h2>
                                <p>Secs</p>
                            </li>
                        </ul>
                    </div>
                    <h1 class="color-primary text-center mb-32">COMING SOON</h1>
                    <h5 class="fw-800 color-sec text-center mb-8">Subscribe to Our Newsletter</h5>
                    <p class="light-gray text-center mb-24">Get notified when we are live</p>
                    <form action="contact.html" method="post" class="text-center">
                        <input type="email" name="email" id="mail" class="" placeholder="Enter your email">
                        <button type="submit" class="cus-btn-3">
                            <span class="btn-text">subscribe</span>
                            <span class="btn-text">subscribe</span>

                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- COMING SOON END -->
@endsection

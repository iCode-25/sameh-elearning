@extends('front.layouts.app')

@section('content')
    <!-- TITLE BANNER START -->
    <section class="title-banner">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <div class="title-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="title-content">
                                    <h1 class="dark-gray fw-700">Register</h1>
                                </div>
                                <div class="img-block">
                                    <img src="{{ asset('front/assets/media/user/star.png') }}" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="{{ asset('front/assets/media/backgrounds/title-banner.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TITLE BANNER END -->

    <!-- ACCOUNT START -->
    <section class="my-account py-40">
        <div class="container-fluid">
            <div class="row row-gap-4">
                <div class="col-xl-6">
                    <div class="account account-1 p-24">
                        <h3 class="dark-gray mb-12 fw-800">{{ \App\Helpers\TranslationHelper::translate('login') }}</h3>
                        <p class="mb-32 light-gray">Please Enter your detail to Sign In.</p>
                        <form action="course.html" method="post" class="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-block mb-24">
                                        <input type="email" name="mail" required class="form-control"
                                            placeholder="Username or email address">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M18.2422 2.96875H1.75781C0.786602 2.96875 0 3.76023 0 4.72656V15.2734C0 16.2455 0.792383 17.0312 1.75781 17.0312H18.2422C19.2053 17.0312 20 16.2488 20 15.2734V4.72656C20 3.76195 19.2165 2.96875 18.2422 2.96875ZM17.996 4.14062C17.6369 4.49785 11.4564 10.6458 11.243 10.8581C10.9109 11.1901 10.4695 11.3729 10 11.3729C9.53047 11.3729 9.08906 11.1901 8.75594 10.857C8.61242 10.7142 2.50012 4.63414 2.00398 4.14062H17.996ZM1.17188 15.0349V4.96582L6.23586 10.0031L1.17188 15.0349ZM2.00473 15.8594L7.06672 10.8296L7.9284 11.6867C8.48176 12.2401 9.21746 12.5448 10 12.5448C10.7825 12.5448 11.5182 12.2401 12.0705 11.6878L12.9333 10.8296L17.9953 15.8594H2.00473ZM18.8281 15.0349L13.7641 10.0031L18.8281 4.96582V15.0349Z"
                                                fill="#141516" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-24">
                                        <input type="password" class="form-control password-input" id="passWord"
                                            name="password" placeholder="Password" required>
                                        <i class="fas fa-eye-slash" id="eye"></i>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="cus-btn-3">
                                        <span>{{ \App\Helpers\TranslationHelper::translate('login') }}</span>
                                        <span>{{ \App\Helpers\TranslationHelper::translate('login') }}</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="account p-24">
                        <h3 class="fw-800 dark-gray mb-12">{{ \App\Helpers\TranslationHelper::translate('register') }}</h3>
                        <p class="mb-32 light-gray">Please Enter your detail to Sign Up.</p>
                        <form action="course.html" method="post" class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-block mb-24">
                                        <input type="text" name="name" required id="firstName" class="form-control"
                                            placeholder="First Name">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M10 0C7.09223 0 4.72656 2.36566 4.72656 5.27344C4.72656 8.18121 7.09223 10.5469 10 10.5469C12.9078 10.5469 15.2734 8.18121 15.2734 5.27344C15.2734 2.36566 12.9078 0 10 0ZM10 9.375C7.7384 9.375 5.89844 7.53504 5.89844 5.27344C5.89844 3.01184 7.7384 1.17188 10 1.17188C12.2616 1.17188 14.1016 3.01184 14.1016 5.27344C14.1016 7.53504 12.2616 9.375 10 9.375Z"
                                                fill="#141516" />
                                            <path
                                                d="M16.5612 13.992C15.1174 12.5261 13.2035 11.7188 11.1719 11.7188H8.82812C6.79656 11.7188 4.88258 12.5261 3.43883 13.992C2.00215 15.4507 1.21094 17.3763 1.21094 19.4141C1.21094 19.7377 1.47328 20 1.79688 20H18.2031C18.5267 20 18.7891 19.7377 18.7891 19.4141C18.7891 17.3763 17.9979 15.4507 16.5612 13.992ZM2.40859 18.8281C2.70215 15.5045 5.46918 12.8906 8.82812 12.8906H11.1719C14.5308 12.8906 17.2979 15.5045 17.5914 18.8281H2.40859Z"
                                                fill="#141516" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-24">
                                        <input type="text" name="lastname" id="lastName" class="form-control"
                                            required placeholder="Last Name">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M10 0C7.09223 0 4.72656 2.36566 4.72656 5.27344C4.72656 8.18121 7.09223 10.5469 10 10.5469C12.9078 10.5469 15.2734 8.18121 15.2734 5.27344C15.2734 2.36566 12.9078 0 10 0ZM10 9.375C7.7384 9.375 5.89844 7.53504 5.89844 5.27344C5.89844 3.01184 7.7384 1.17188 10 1.17188C12.2616 1.17188 14.1016 3.01184 14.1016 5.27344C14.1016 7.53504 12.2616 9.375 10 9.375Z"
                                                fill="#141516" />
                                            <path
                                                d="M16.5612 13.992C15.1174 12.5261 13.2035 11.7188 11.1719 11.7188H8.82812C6.79656 11.7188 4.88258 12.5261 3.43883 13.992C2.00215 15.4507 1.21094 17.3763 1.21094 19.4141C1.21094 19.7377 1.47328 20 1.79688 20H18.2031C18.5267 20 18.7891 19.7377 18.7891 19.4141C18.7891 17.3763 17.9979 15.4507 16.5612 13.992ZM2.40859 18.8281C2.70215 15.5045 5.46918 12.8906 8.82812 12.8906H11.1719C14.5308 12.8906 17.2979 15.5045 17.5914 18.8281H2.40859Z"
                                                fill="#141516" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-24">
                                        <input type="email" name="mail" required class="form-control"
                                            placeholder="Your Email">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M18.2422 2.96875H1.75781C0.786602 2.96875 0 3.76023 0 4.72656V15.2734C0 16.2455 0.792383 17.0312 1.75781 17.0312H18.2422C19.2053 17.0312 20 16.2488 20 15.2734V4.72656C20 3.76195 19.2165 2.96875 18.2422 2.96875ZM17.996 4.14062C17.6369 4.49785 11.4564 10.6458 11.243 10.8581C10.9109 11.1901 10.4695 11.3729 10 11.3729C9.53047 11.3729 9.08906 11.1901 8.75594 10.857C8.61242 10.7142 2.50012 4.63414 2.00398 4.14062H17.996ZM1.17188 15.0349V4.96582L6.23586 10.0031L1.17188 15.0349ZM2.00473 15.8594L7.06672 10.8296L7.9284 11.6867C8.48176 12.2401 9.21746 12.5448 10 12.5448C10.7825 12.5448 11.5182 12.2401 12.0705 11.6878L12.9333 10.8296L17.9953 15.8594H2.00473ZM18.8281 15.0349L13.7641 10.0031L18.8281 4.96582V15.0349Z"
                                                fill="#141516" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-24">
                                        <input type="password" class="form-control password-input" id="password2"
                                            name="password" placeholder="••••••••" required>
                                        <i class="fas fa-eye-slash" id="eye-icon"></i>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p class="mb-32">Your personal information helps improve your experience on our
                                        site, manage your account, and fulfill other purposes
                                        as detailed in our <a href="" class="color-sec">privacy policy.</a>
                                    </p>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="cus-btn-3">
                                        <span>Sign Up</span>
                                        <span>Sign Up</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ACCOUNT END -->
@endsection

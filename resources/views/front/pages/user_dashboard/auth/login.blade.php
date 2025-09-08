@extends('front.layouts.app')

@push('color_css')
    {{-- <link rel="stylesheet" href="{{ asset('front/assets/css/color1.css') }}"/> --}}
    <style>
    /* تنسيق عام */
body {
    background-color: #1a1a1a;
    font-family: 'Arial', sans-serif;
}

/* تهيئة القسم */
.hero-section {
    background: url("../images/hero-bg.jpg") no-repeat center center/cover;
    padding: 80px 0;
    position: relative;
}

.hero-section .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
}

.text-hero-7 h2 {
    color: #FFD700;
    font-size: 36px;
    font-weight: bold;
}

.text-hero-7 p {
    color: #fff;
    font-size: 18px;
}

/* تصميم صندوق تسجيل الدخول */
.common_author_boxed {
    background: #222;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
    text-align: center;
}

.common_author_heading h3 {
    font-size: 24px;
    font-weight: bold;
    color: #FFD700;
}

.common_author_heading h2 {
    font-size: 20px;
    color: #fff;
}

/* تنسيق الحقول */
.form-group input {
    /* background: #333; */
    color: #fff;
    /* border: 1px solid #FFD700; */
    border-radius: 5px;
    padding: 12px;
}

.form-group input::placeholder {
    color: #bbb;
}

/* تنسيق زر تسجيل الدخول */
.common_form_submit button {
    background: #8A1538;
    color: #fff;
    border: none;
    padding: 12px;
    font-size: 18px;
    font-weight: bold;
    border-radius: 5px;
    transition: background 0.3s ease-in-out;
}

.common_form_submit button:hover {
    background: #FFD700;
    color: #000;
}

/* تنسيق رابط نسيان كلمة المرور */
a.text-white {
    color: #FFD700 !important;
}

/* تنسيق رابط التسجيل */
.text-center a {
    color: #FFD700;
    font-weight: bold;
}

.text-center a:hover {
    text-decoration: underline;
}
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 text-center">
                <div class="text-hero-7">
                    <h2 data-aos="zoom-in" data-aos-duration="1000">
                        {{ \App\Helpers\TranslationHelper::translate('Login') }}
                    </h2>
                    {{-- <p data-aos="fade-up" data-aos-duration="1200">
                        {{ \App\Helpers\TranslationHelper::translate('Home') }}
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login Section -->
<section id="common_author_area" class="section_padding" style="margin-top: 50px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="common_author_boxed">
                    <div class="common_author_heading text-center">
                        <h3 class="text-white">{{ \App\Helpers\TranslationHelper::translate('Login to your account') }}</h3>
                        <h2 class="text-white">{{ \App\Helpers\TranslationHelper::translate('Stay connected with us') }}</h2>
                    </div>
                    <div class="common_author_form">
                        <form action="{{ route('user.login.submit') }}" method="post" id="login_form">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="username" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Enter email or username') }}" required>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Enter password') }}" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {{-- <a href="{{ route('password.request') }}" class="d-block text-end text-white mt-2">{{ \App\Helpers\TranslationHelper::translate('Forgot password?') }}</a> --}}
                            </div>
                            <div class="common_form_submit text-center">
                                <button type="submit" class="btn btn-primary w-100" style="background-color: #8A1538; border: none; padding: 12px; font-size: 18px; font-weight: bold;">{{ \App\Helpers\TranslationHelper::translate('Login') }}</button>
                            </div>
                            <div class="text-center mt-3">
                                <p class="text-white">{{ \App\Helpers\TranslationHelper::translate('Don\'t have an account?') }} 
                                    <a href="{{ route('user.register.form') }}" class="text-decoration-none" style="color: #FFD700; font-weight: bold;">{{ \App\Helpers\TranslationHelper::translate('Register now') }}</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



{{-- 
@extends('front.layouts.app')

@push('color_css')
    <link rel="stylesheet" href="{{asset('front/assets/css/color1.css')}}"/>
@endpush

@section('content')

    <!-- breadcrumb start -->
    <section class="hero-section">
            <div class="overlay"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-10 text-center">
                        <div class="text-hero-7">
                            <h2 data-aos="zoom-in" data-aos-duration="1000">
                             {{ \App\Helpers\TranslationHelper::translate('login') }}
                            </h2>
                            <p data-aos="fade-up" data-aos-duration="1200">
                                {{ \App\Helpers\TranslationHelper::translate('Home') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- section start -->
    <section id="common_author_area" class="section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 ">
                    <div class="common_author_boxed">
                        <div class="common_author_heading">
                            <h3 style="color: #fff" class="text-center"> {{\App\Helpers\TranslationHelper::translate('Login your account')}}</h3>
                            <h2 style="color: #fff" class="text-center">{{\App\Helpers\TranslationHelper::translate('Logged in to stay in touch')}}</h2>
                        </div>
                        <div class="common_author_form">
                            <form action="{{route('user.login.submit')}}" id="main_author_form" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Enter email') }}">
                                    @error('username')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Enter password') }}">
                                    @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <a style="color: #fff" href="javascript:void(0);">{{\App\Helpers\TranslationHelper::translate('Forgot password?')}}</a>
                                </div>
       
<div class="common_form_submit" style="text-align: center;">
    <div class="globalBtn mt-3">
        <ul style="list-style: none; padding: 0; margin: 0;">
            <li>
                <button 
                    style="
                        border: none; 
                  
                  
                        transition: background-color 0.3s ease; !import"
                    type="submit">
                    {{\App\Helpers\TranslationHelper::translate('Login')}}
                    <span></span><span></span><span></span><span></span>
                </button>
            </li>
        </ul>
    </div>
</div>

<div class="have_acount_area" style="display: flex; align-items: center; justify-content: center; gap: 10px; margin-top: 15px;">
    <p style="color: #fff; margin: 0;">{{ \App\Helpers\TranslationHelper::translate('Dont have an account?') }}</p>
    <a style="color: #28251d; font-weight: bold; text-decoration: none;" href="{{ route('user.register.form') }}">
        {{ \App\Helpers\TranslationHelper::translate('Register now') }}
    </a>
</div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      
@endsection --}}

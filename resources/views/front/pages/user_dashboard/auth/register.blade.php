@extends('front.layouts.app')

@push('color_css')
    {{-- <link rel="stylesheet" href="{{ asset('front/assets/css/color1.css') }}"/> --}}
    <style>
        body {
            background-color: #f8f9fa;
            /* background-color: #222; */
        }
        .register-section {
            /* background: #8A1538; */

            padding: 60px 0;
            border-radius: 10px;
            /* box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); */
         box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
        }
        .register-box {
            /* background: #fff; */
              background: #222;
            padding: 40px;
            border-radius: 10px;
            /* box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); */
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
        }
        .register-box h3 {
            /* color: #8A1538; */
             color: #FFD700;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .form-control {
            border-radius: 8px;
            padding: 14px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .btn-register {
            background: #8A1538;
            color: #fff;
            font-weight: bold;
            padding: 14px;
            width: 100%;
            border-radius: 8px;
            transition: 0.3s;
            font-size: 18px;
            text-transform: uppercase;
        }
        .btn-register:hover {
            background: #6f102d;
            transform: scale(1.05);
        }
        .login-link a {
            /* color: #8A1538; */
            color:  #FFD700;
           
            font-weight: bold;
            text-decoration: none;
        }
        .terms-link {
            font-weight: bold;
            /* color: #8A1538; */
            color:  #FFD700;
            text-decoration: underline;
        }
        .form-group {
    margin-bottom: 15px; 
    /* border: 1px solid #FFD700; */
}

    </style>
@endpush

@section('content')
<section class="hero-section">
    <div class="overlay"></div>
    <div class="container text-center">
        <h2 class="text-white" style="color:#FFD700 !important;">{{ \App\Helpers\TranslationHelper::translate('Register') }}</h2>
    </div>
</section>

<section class="register-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="register-box">
                    <h3 class="text-center">{{ \App\Helpers\TranslationHelper::translate('Register your account') }}</h3>
                    <form action="{{ route('user.register.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="{{ \App\Helpers\TranslationHelper::translate('Enter first name') }}*" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="l_name" value="{{old('l_name')}}" placeholder="{{ \App\Helpers\TranslationHelper::translate('Enter last name') }}*" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="{{ \App\Helpers\TranslationHelper::translate('Your email address') }}*">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="phone" value="{{old('phone')}}" placeholder="{{ \App\Helpers\TranslationHelper::translate('Mobile number') }}*" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="{{ \App\Helpers\TranslationHelper::translate('User name') }}*" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="{{ \App\Helpers\TranslationHelper::translate('Password') }}" required>
                        </div>
                        <button type="submit" class="btn btn-register">{{ \App\Helpers\TranslationHelper::translate('Register') }}</button>
                        <p class="text-center mt-3 login-link" style="color: #fff">
                            {{ \App\Helpers\TranslationHelper::translate('Already have an account?') }}
                            <a href="{{ route('user.login.form') }}">{{ \App\Helpers\TranslationHelper::translate('Log in now') }}</a>
                        </p>
                        <p class="text-center mt-2" style="color: #fff; font-weight: bold;">
                            {{ \App\Helpers\TranslationHelper::translate('Registration subject to') }}
                            <a href="{{ route('termsandcondition') }}" class="terms-link">{{ \App\Helpers\TranslationHelper::translate('terms and conditions') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection








{{-- @extends('front.layouts.app')

@push('color_css')
    <link rel="stylesheet" href="{{asset('front/assets/css/color1.css')}}"/>
@endpush

@section('content')


<section class="hero-section">
            <div class="overlay"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-10 text-center">
                        <div class="text-hero-7">
                            <h2 data-aos="zoom-in" data-aos-duration="1000">
                             {{ \App\Helpers\TranslationHelper::translate('Register') }}
                            </h2>
                            <p data-aos="fade-up" data-aos-duration="1200">
                                {{ \App\Helpers\TranslationHelper::translate('Home') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <section id="common_author_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 m-auto">
                    <div class="common_author_boxed">
                        <div class="common_author_heading">
                            <h3 style="color: #fff" class="text-center">{{\App\Helpers\TranslationHelper::translate('Register account')}}</h3>
                            <h2 style="color: #fff" class="text-center">{{\App\Helpers\TranslationHelper::translate('Register your account')}}</h2>
                        </div>
                        <div class="common_author_form">
                            <form action="{{route('user.register.submit')}}" method="POST" id="main_author_form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                           id="name"
                                           placeholder="{{\App\Helpers\TranslationHelper::translate('Enter first name')}}*"
                                           required>
                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="l_name" value="{{old('l_name')}}"
                                           id="l_name"
                                           placeholder="{{\App\Helpers\TranslationHelper::translate('Enter last name')}}*"
                                           required>
                                    @error('l_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}"
                                           id="email"
                                           placeholder="{{\App\Helpers\TranslationHelper::translate('your email address')}}*">
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="phone" value="{{old('phone')}}"
                                           id="phone"
                                           placeholder="{{\App\Helpers\TranslationHelper::translate('Mobile number')}}*"
                                           required>
                                    @error('phone')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" value="{{old('username')}}"
                                           id="username"
                                           placeholder="{{\App\Helpers\TranslationHelper::translate('User name')}}*"
                                           required>
                                    @error('username')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password"
                                           placeholder="{{\App\Helpers\TranslationHelper::translate('Password')}}"
                                           required>
                                    @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="common_form_submit">
                                    <div class="globalBtn mt-3 ">
                                        <ul>
                                            <li>
                                       
                                                 <button style="color: #141313" type="submit">{{\App\Helpers\TranslationHelper::translate('Register')}}
                                                    <span></span><span></span><span></span><span></span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                
                                <div class="have_acount_area other_author_option">
                                    <p style="color: #fff">
                                        {{\App\Helpers\TranslationHelper::translate('Already have an account?')}}
                                        <a style="color: #181616" href="{{route('user.login.form')}}">{{\App\Helpers\TranslationHelper::translate('Log in now')}}</a>
                                    </p>

                                    <p style="color: #fff; font-weight: bold;">
     {{ \App\Helpers\TranslationHelper::translate('Registration subject to') }}
    <a href="{{ route('termsandcondition') }}" style="color: #181616; text-decoration: underline;">
         {{ \App\Helpers\TranslationHelper::translate('terms and conditions') }}
    </a>
</p>


                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection --}}

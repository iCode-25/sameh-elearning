{{-- @extends('errors::minimal') --}}
@extends('front.layouts.app')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))

@section('content')

    <!-- 404 -->
       <section class="sec-page">
        <div class="container-fluid">
            <div class="page-block">
                <div class="text-center">
                    <h1 class="color-primary fw-700 mb-24 ">4<span class="color-sec">0</span>4</h1>
                    <h4 class="dark-gray fw-700 mb-16 "> <span class="color-sec"> Opps! </span> There is something wrong</h4>
                    <p class="light-gray mb-32 ">Lorem ipsum dolor sit amet consectetur. Orci sit integer eget<br>
                        netus odio. Scelerisque fusce varius imperdiet congue fringilla.</p>
                        <a href="{{ route('site.home') }}" class="cus-btn-3">
                            <span class="btn-text">back to homepage</span>
                            <span>back to homepage</span>
                        </a>
                </div>
            </div>
        </div>
    </section>
    <!-- 404 -->

@endsection

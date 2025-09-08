{{-- @extends('errors::minimal') --}}
@extends('front.layouts.app')

@section('title', __('Not Found'))
@section('code', '403')
@section('message', __('Not Found'))

@section('content')

    <!-- 404 -->
    <section class="sec-page">
        <div class="container-fluid">
            <div class="page-block">
                <div class="text-center">
                    <h1 class="color-primary fw-700 mb-24 ">4<span class="color-sec">0</span>3</h1>
                    <h4 class="dark-gray fw-700 mb-16 "> <span class="color-sec"> Opps! </span></h4>
                    <p class="color-primary mb-32 fw-700">
                        {{ \App\Helpers\TranslationHelper::translate($exception->getMessage() ?: 'Forbidden') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- 404 -->

@endsection

@extends('front.layouts.app')

@section('content')

    

<div class="tr-company-info-area" style=" padding: 70px 0; margin-top: 50px; margin-bottom: 50px; text-align: center;">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-6 col-lg-6">
        <div class="tr-company-info-content">
          <h2 class="tr-company-title" style="font-size: 40px; color: #f9f9f9;">
            {{ \App\Helpers\TranslationHelper::translate('Privacy Policy') }}
          </h2>
          <p class="tr-company-description" style="font-size: 20px; color: #f9f9f9; margin-top: 30px; line-height: 1.6;">
           @if($privacypolicy && $privacypolicy->description)
    {!! $privacypolicy->description !!}
@else
    <p>{{ \App\Helpers\TranslationHelper::translate('Privacy policy content is not available at the moment.') }}</p>
@endif

          </p>
        </div>
      </div>
    </div>
  </div>
</div>




       @endsection
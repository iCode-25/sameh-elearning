<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ \App\Helpers\TranslationHelper::translate('contact us') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00000094;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 50px 0; 
        }
        .contact-container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 800px;
        }
        .contact-container img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .contact-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-group textarea {
            resize: none;
            height: 120px;
        }
        .contact-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
        }
        .contact-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <img src="{{ asset('dashboard/assets/media/logos/logo.png') }}" alt="Logo">
        <div class="contact-title">{{ \App\Helpers\TranslationHelper::translate('Terms and Condition') }}</div>

  <p class="tr-company-description" style="font-size: 20px; color: #000000; margin-top: 30px; line-height: 1.6;">
                      @if($termsandcondition && $termsandcondition->description)
    {!! $termsandcondition->description !!}
@else
    <p>{{ \App\Helpers\TranslationHelper::translate('No terms and conditions available at the moment.') }}</p>
@endif
          </p>
          </div> 

          {{-- <div class="tr-company-info-area" style=" padding: 70px 0; margin-top: 50px; margin-bottom: 50px; text-align: center;">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-6 col-lg-6">
        <div class="tr-company-info-content">
                  <img src="{{ asset('dashboard/assets/media/logos/logo.png') }}" alt="Logo">

          <h2 class="tr-company-title" style="font-size: 40px; color: #f9f9f9;">
            {{ \App\Helpers\TranslationHelper::translate('Terms and Condition') }}
          </h2>
          <p class="tr-company-description" style="font-size: 20px; color: #f9f9f9; margin-top: 30px; line-height: 1.6;">
                      @if($termsandcondition && $termsandcondition->description)
    {!! $termsandcondition->description !!}
@else
    <p>{{ \App\Helpers\TranslationHelper::translate('No terms and conditions available at the moment.') }}</p>
@endif
          </p>
        </div>
      </div>
    </div>
  </div>
</div> --}}

</body>
</html>



{{-- @extends('front.layouts.app')

@section('content')
   
<div class="tr-company-info-area" style=" padding: 70px 0; margin-top: 50px; margin-bottom: 50px; text-align: center;">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-6 col-lg-6">
        <div class="tr-company-info-content">
          <h2 class="tr-company-title" style="font-size: 40px; color: #f9f9f9;">
            {{ \App\Helpers\TranslationHelper::translate('Terms and Condition') }}
          </h2>
          <p class="tr-company-description" style="font-size: 20px; color: #f9f9f9; margin-top: 30px; line-height: 1.6;">
                      @if($termsandcondition && $termsandcondition->description)
    {!! $termsandcondition->description !!}
@else
    <p>{{ \App\Helpers\TranslationHelper::translate('No terms and conditions available at the moment.') }}</p>
@endif
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


       @endsection --}}
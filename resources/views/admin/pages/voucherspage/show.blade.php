@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Purchase Transactions us Details'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        [
            'text' => \App\Helpers\TranslationHelper::translate('Purchase Transactions us'),
            'link' => route('admin.voucherspage.index'),
        ],
        ['text' => \App\Helpers\TranslationHelper::translate('Details')],
    ]" :button="[]">
    </x-bread-crumb>
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-body py-4 px-0" dir="{{ Config::get('app.locale') == 'en' ? 'ltr' : 'rtl' }}">

                            <div class="row px-0 mt-3">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left">
                                    <h4 class="d-inline-block py-3">
                                        {{ \App\Helpers\TranslationHelper::translate('Purchase Transactions us Details') }}
                                    </h4>
                                </div>
                            </div>


                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('first name') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            {{ $voucherspage->first_name ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('last name') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            {{ $voucherspage->last_name ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('email') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            {{ $voucherspage->email ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('phone') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            {{ $voucherspage->phone ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('category card') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            {{ $voucherspage->cards->category_card ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('name card') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            {{ $voucherspage->cards->categorycolid->name ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('number card') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            {{ $voucherspage->number_card ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('price card') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            {{ $voucherspage->cards->price ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row px-0 mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 m-auto text-left">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-left details_item bold">
                                            {{ \App\Helpers\TranslationHelper::translate('total price cards') }}:
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left details_item">
                                            {{ $voucherspage->total_price ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection

@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Dashboard'))

@section('crumb')
<x-bread-crumb :breadcrumbs="[['text' => \App\Helpers\TranslationHelper::translate('Statics')]]" :button="[]"
    :title="\App\Helpers\TranslationHelper::translate('Dashboard')">
</x-bread-crumb>
@endsection

@push('admin_css')

<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: scale(1.02);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
</style>

@endpush

@section('content')


<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->
        <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
            <div class="col-xl-6 mb-xl-10">

                <div class="row ">

                    <!--begin::Col-->
                    <div class="col-md-6 col-lg-6 col-xl-6 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 17-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100">
                            <!--begin::Card body-->

                            <div class="card-body align-items-end mb-0 p-5">
                                <!--begin::Info-->
                                <div class="d-flex align-items-start justify-content-between mb-3">
                                    <div class="fw-bold px-3">
                                        <span
                                            class="fs-4 opacity-50 d-block">{{ \App\Helpers\TranslationHelper::translate('Packages') }}</span>
                                        <span class="fs-2x fw-bold ">{{$totalPackages}}</span>
                                    </div>
                                    <div class="m-0 icon" style="background-color: #3974ff6e;">
                                        <i class="ki-solid ki-calendar-add  fs-3x" style="color: #1b4ec6;">
                                        </i>
                                    </div>
                                </div>

                                {{-- <div class="d-flex align-items-start justify-content-between mb-3">
    <div class="fw-bold px-3">
        <span class="fs-4 opacity-50 d-block">{{ \App\Helpers\TranslationHelper::translate('Bookings') }}</span>
                                <span class="fs-2x fw-bold ">{{ $totalBookings }}</span>
                            </div>
                            <div class="m-0 icon" style="background-color: #3974ff6e;">
                                <i class="ki-solid ki-calendar-add  fs-3x" style="color: #1b4ec6;"></i>
                            </div>
                        </div> --}}


                        <div class="d-flex align-items-center  justify-content-between">
                            <span class="badge badge-light-success fs-3  p-3">
                                <i class="ki-duotone ki-arrow-up fs-4 text-success ms-n1"><span
                                        class="path1"></span><span class="path2"></span></i>
                                9.2%
                            </span>
                            <div class="card-toolbar">
                                <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->

                                <!--begin::Menu wrapper-->
                                {{-- <div>
                                                <button type="button"
                                                        class="btn btn-primary rotate px-2 py-1 fs-7"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-start"
                                                        data-kt-menu-offset="0px, 5px">
                                                    {{ \App\Helpers\TranslationHelper::translate('Today') }}
                                <span class="svg-icon fs-3 rotate-180 ms-3 me-0">
                                    <i class="ki-duotone ki-down"></i>
                                </span>
                                </button>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-auto min-w-200 mw-300px"
                                    data-kt-menu="true">

                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            {{ \App\Helpers\TranslationHelper::translate('Week') }}
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                            <!--end::Dropdown wrapper-->

                            <!--end::Daterangepicker-->
                        </div>
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 17-->

        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 mb-md-5 mb-xl-10">
            <!--begin::Card widget 17-->
            <!--begin::List widget 26-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100">

                <!--begin::Card body-->
                <div class="card-body align-items-end mb-0 p-5">
                    <!--begin::Info-->
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="fw-bold px-3">
                            <span
                                class="fs-4 opacity-50 d-block">{{ \App\Helpers\TranslationHelper::translate('Lessons') }}</span>
                            <span class="fs-2x fw-bold ">{{$totalLessons}}<small class="fs-4"></small></span>
                        </div>
                        <div class="m-0 icon" style="background-color: #39ffa26e;">
                            <i class="ki-solid ki-tag fs-3x" style="color: #1a8855;">

                            </i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center  justify-content-between">
                        {{-- <div class="card-toolbar">
                                            <div>
                                                <button type="button"
                                                        class="btn btn-primary rotate px-2 py-1 fs-7"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-start"
                                                        data-kt-menu-offset="0px, 5px">
                                                    {{ \App\Helpers\TranslationHelper::translate('Today') }}
                        <span class="svg-icon fs-3 rotate-180 ms-3 me-0">
                            <i class="ki-duotone ki-down"></i>
                        </span>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-auto min-w-200 mw-300px"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    {{ \App\Helpers\TranslationHelper::translate('Week') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <span class="badge badge-light-success fs-3  p-3">
                    <i class="ki-duotone ki-arrow-up fs-4 text-success ms-n1"><span class="path1"></span><span
                            class="path2"></span></i>
                    9.2%
                </span>
            </div>

            <!--end::Info-->

        </div>
        <!--end::Card body-->
    </div>
    <!--end::LIst widget 26-->
    <!--end::Card widget 17-->

</div>
<!--end::Col-->


<!--begin::Col-->
<div class="col-md-6 col-lg-6 col-xl-6 mb-md-5 mb-xl-0">
    <!--begin::Card widget 17-->
    <!--begin::List widget 26-->
    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100">

        <!--begin::Card body-->
        <div class="card-body align-items-end mb-0 p-5">
            <!--begin::Info-->
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div class="fw-bold px-3">
                    <span
                        class="fs-4 opacity-50 d-block">{{ \App\Helpers\TranslationHelper::translate('Tests') }}</span>
                    <span class="fs-2x fw-bold ">{{$totalTests}}</span>
                </div>
                <div class="m-0 icon" style="background-color: #ffd5596e;">
                    <i class="ki-duotone ki-shop fs-3x" style="color: #ac9140;">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                </div>
            </div>
            <div class="d-flex align-items-center  justify-content-between">
                {{-- <div class="card-toolbar">
                                            <div>
                                                <button type="button"
                                                        class="btn btn-primary rotate px-2 py-1 fs-7"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-start"
                                                        data-kt-menu-offset="0px, 5px">
                                                    {{ \App\Helpers\TranslationHelper::translate('Today') }}
                <span class="svg-icon fs-3 rotate-180 ms-3 me-0">
                    <i class="ki-duotone ki-down"></i>
                </span>
                </button>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-auto min-w-200 mw-300px"
                    data-kt-menu="true">
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">
                            {{ \App\Helpers\TranslationHelper::translate('Week') }}
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
        <span class="badge badge-light-success fs-3  p-3">
            <i class="ki-duotone ki-arrow-up fs-4 text-success ms-n1"><span class="path1"></span><span
                    class="path2"></span></i>
            9.2%
        </span>
    </div>

    <!--end::Info-->

</div>
<!--end::Card body-->
</div>
<!--end::LIst widget 26-->
<!--end::Card widget 17-->

</div>
<!--end::Col-->

<!--begin::Col-->
<div class="col-md-6 col-lg-6 col-xl-6 mb-md-5 mb-xl-0">
    <!--begin::Card widget 17-->
    <!--begin::List widget 26-->
    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100">

        <!--begin::Card body-->
        <div class="card-body align-items-end mb-0 p-5">
            <!--begin::Info-->
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div class="fw-bold px-3">
                    <span
                        class="fs-4 opacity-50 d-block">{{ \App\Helpers\TranslationHelper::translate('Students') }}</span>
                    <span class="fs-2x fw-bold ">{{$totalStudents}}</span>
                </div>
                <div class="m-0 icon" style="background-color: #ff655061;">
                    <i class="ki-duotone ki-people fs-3x" style="color: #d34330;">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>

                </div>
            </div>
            <div class="d-flex align-items-center  justify-content-between">
                {{-- <div class="card-toolbar">
                                            <div>
                                                <button type="button"
                                                        class="btn btn-primary rotate px-2 py-1 fs-7"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-start"
                                                        data-kt-menu-offset="0px, 5px">
                                                    {{ \App\Helpers\TranslationHelper::translate('Today') }}
                <span class="svg-icon fs-3 rotate-180 ms-3 me-0">
                    <i class="ki-duotone ki-down"></i>
                </span>
                </button>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-auto min-w-200 mw-300px"
                    data-kt-menu="true">
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">
                            {{ \App\Helpers\TranslationHelper::translate('Week') }}
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
        <span class="badge badge-light-success fs-3  p-3">
            <i class="ki-duotone ki-arrow-up fs-4 text-success ms-n1"><span class="path1"></span><span
                    class="path2"></span></i>
            9.2%
        </span>
    </div>

    <!--end::Info-->

</div>
<!--end::Card body-->
</div>
<!--end::LIst widget 26-->
<!--end::Card widget 17-->

</div>
<!--end::Col-->

</div>
</div>

{{--
                <div class="col-xl-6 mb-xl-10">
                    <div class="card card-flush h-md-100">
                        <div class="card-header py-5 mb-6">
                            <h3 class="card-title align-items-start flex-column">
                                <div class="d-flex align-items-center mb-2">
														<span class="card-label fw-bold text-gray-800">{{ \App\Helpers\TranslationHelper::translate('Points') }}
</span>
</div>
</h3>
<div class="card-toolbar">
    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">By
        Provider</a>
</div>
<!--end::Title-->
</div>
<div class="card-body py-0 px-0">
    <div class="tab-content mt-n6">
        <div class="tab-pane fade active show" id="kt_charts_widget_35_tab_content_1">
            <div id="kt_charts_widget_35_chart_1" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6">
            </div>
        </div>
    </div>
</div>
</div>
</div> --}}


{{-- charts --}}



{{-- <div class="col-xl-6 mb-xl-10">
    <div class="card card-flush h-md-100">
        <div class="card-header py-5 mb-6">
            <h3 class="card-title align-items-start flex-column">
                <div class="d-flex align-items-center mb-2">
                    <span class="card-label fw-bold text-gray-800">{{ \App\Helpers\TranslationHelper::translate('Top 5 Clients (Points)') }}</span>
</div>
</h3>
</div>
<div class="card-body py-0 px-0">
    <div class="tab-content mt-n6">
        <div class="tab-pane fade active show" id="kt_charts_widget_35_tab_content_1">
            <div id="client_points" data-kt-chart-color="primary" class="min-h-auto h-400px  ps-3 pe-6"></div>
        </div>
    </div>
</div>
</div>
</div> --}}

{{-- <div class="col-xl-6 mb-xl-10">
    <div class="card card-flush h-md-100">
        <!-- Card Header -->
        <div class="card-header py-5 mb-6">
            <h3 class="card-title align-items-start flex-column">
                <div class="d-flex align-items-center mb-2">
                    <span class="card-label fw-bold text-gray-800">
                        {{ \App\Helpers\TranslationHelper::translate('Top 5 Clients (Points)') }}
</span>
</div>
</h3>
</div>

<!-- Card Body -->
<div class="card-body py-0 px-0">
    <!-- Table Wrapper -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 10%;">#</th>
                    <th class="text-center" style="width: 40%;">
                        {{ \App\Helpers\TranslationHelper::translate('Client Name') }}
                    </th>
                    <th class="text-center" style="width: 20%;">{{ \App\Helpers\TranslationHelper::translate('ID') }}
                    </th>
                    <th class="text-center" style="width: 30%;">
                        {{ \App\Helpers\TranslationHelper::translate('Points') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($topClients as $key => $client)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td> <!-- ترتيب العميل 1، 2، 3 ... -->
                    <td class="text-center">{{ $client->name }}</td> <!-- اسم العميل -->
                    <td class="text-center">{{ $client->id }}</td> <!-- ID العميل -->
                    <td class="text-center fw-bold text-primary">{{ $client->points }}</td> <!-- عدد النقاط -->
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        {{ \App\Helpers\TranslationHelper::translate('No clients available') }}
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>
</div> --}}


{{-- <div class="col-xl-6 mb-xl-10">
    <div class="card card-flush ">
        <!-- Card Header -->
        <div class="card-header ">
            <h3 class="card-title align-items-start flex-column">
                <div class="d-flex align-items-center mb-2">
                    <span class="card-label fw-bold text-gray-800">
                        {{ \App\Helpers\TranslationHelper::translate('Top 5 Clients (Points)') }}
</span>
</div>
</h3>
</div>

<!-- Card Body -->
<div class="card-body py-0 px-0">
    <!-- Table Wrapper -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 10%;">#</th>
                    <th class="text-center" style="width: 20%;">{{ \App\Helpers\TranslationHelper::translate('ID') }}
                    </th>
                    <th class="text-center" style="width: 40%;">
                        {{ \App\Helpers\TranslationHelper::translate('Client Name') }}
                    </th>
                    <th class="text-center" style="width: 30%;">
                        {{ \App\Helpers\TranslationHelper::translate('Points') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($topClients as $key => $client)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td> <!-- ترتيب العميل 1، 2، 3 ... -->
                    <td class="text-center">{{ $client->id }}</td> <!-- ID العميل -->
                    <td class="text-center">{{ $client->name }}</td> <!-- اسم العميل -->
                    <td class="text-center fw-bold text-primary">{{ $client->points }}</td> <!-- عدد النقاط -->
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        {{ \App\Helpers\TranslationHelper::translate('No clients available') }}
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
--}}

<div class="col-xl-6 mb-xl-10">
    <div class="card card-flush">
        <!-- Card Header -->
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <div class="d-flex align-items-center mb-2">
                    <span class="card-label fw-bold text-gray-800">
                        {{ \App\Helpers\TranslationHelper::translate('Latest Top5 Students WebSite') }}
                    </span>
                </div>
            </h3>
        </div>

        <!-- Card Body -->
        <div class="card-body py-0 px-0">
            <!-- Table Wrapper -->
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 10%;">#</th>
                            <th class="text-center" style="width: 20%;">
                                {{ \App\Helpers\TranslationHelper::translate('ID') }}
                            </th>
                            <th class="text-center" style="width: 40%;">
                                {{ \App\Helpers\TranslationHelper::translate('Students Name') }}
                            </th>


                            <th class="text-center" style="width: 30%;">{{ \App\Helpers\TranslationHelper::translate('Phone') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topClients as $key => $client)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td> 
                            <td class="text-center">{{ $client->id }}</td> 
                            <td class="text-center">{{ $client->name }}</td> 
                            <td class="text-center">{{ $client->phone }}</td> 
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                {{ \App\Helpers\TranslationHelper::translate('No clients available') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>




    </div>
</div>




</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row g-5 g-xl-10 g-xl-10">

    {{-- <div class="col-xl-6  mb-xl-10">
                    <!--begin::Table widget 15-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header py-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Recent Orders</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-6">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <!--begin::Table head-->
                                <thead>
                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                    <th class="p-0 pb-3 w-150px text-start">
                                        Number
                                    </th>
                                    <th class="p-0 pb-3 w-100px text-center">
                                        Status
                                    </th>
                                    <th class="p-0 pb-3 w-125px text-center">Date
                                    </th>
                                    <th class="p-0 pb-3 w-150px text-center">Price</th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                <tr>
                                    <td>
                                        342342
                                    </td>
                                    <td class="text-center">
																<span class="badge badge-light-success">
																	Active
																</span>
                                    </td>
                                    <td class="text-center">
                                        12 May, 2024
                                    </td>
                                    <td class="text-center">
                                        <span class="text-gray-600 fw-bold fs-6">$432</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        342342
                                    </td>
                                    <td class="text-center">
																<span class="badge badge-light-success">
																	Active
																</span>
                                    </td>
                                    <td class="text-center">
                                        12 May, 2024
                                    </td>
                                    <td class="text-center">
                                        <span class="text-gray-600 fw-bold fs-6">$432</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        342342
                                    </td>
                                    <td class="text-center">
																<span class="badge badge-light-success">
																	Active
																</span>
                                    </td>
                                    <td class="text-center">
                                        12 May, 2024
                                    </td>
                                    <td class="text-center">
                                        <span class="text-gray-600 fw-bold fs-6">$432</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        342342
                                    </td>
                                    <td class="text-center">
																<span class="badge badge-light-success">
																	Active
																</span>
                                    </td>
                                    <td class="text-center">
                                        12 May, 2024
                                    </td>
                                    <td class="text-center">
                                        <span class="text-gray-600 fw-bold fs-6">$432</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        342342
                                    </td>
                                    <td class="text-center">
																<span class="badge badge-light-success">
																	Active
																</span>
                                    </td>
                                    <td class="text-center">
                                        12 May, 2024
                                    </td>
                                    <td class="text-center">
                                        <span class="text-gray-600 fw-bold fs-6">$432</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        342342
                                    </td>
                                    <td class="text-center">
																<span class="badge badge-light-success">
																	Active
																</span>
                                    </td>
                                    <td class="text-center">
                                        12 May, 2024
                                    </td>
                                    <td class="text-center">
                                        <span class="text-gray-600 fw-bold fs-6">$432</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        342342
                                    </td>
                                    <td class="text-center">
																<span class="badge badge-light-success">
																	Active
																</span>
                                    </td>
                                    <td class="text-center">
                                        12 May, 2024
                                    </td>
                                    <td class="text-center">
                                        <span class="text-gray-600 fw-bold fs-6">$432</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        342342
                                    </td>
                                    <td class="text-center">
																<span class="badge badge-light-success">
																	Active
																</span>
                                    </td>
                                    <td class="text-center">
                                        12 May, 2024
                                    </td>
                                    <td class="text-center">
                                        <span class="text-gray-600 fw-bold fs-6">$432</span>
                                    </td>
                                </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Table widget 15-->
                </div> --}}





    <!--end::Col-->
    {{-- <div class="col-xl-6 mb-xl-10">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header py-5">
                            <h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bold text-gray-800">Most Clients use the App
												</span>
                            </h3>
                            <div class="card-toolbar">
                                <div data-kt-daterangepicker="true"
                                     data-kt-daterangepicker-opens="left"
                                     class="btn btn-sm btn-primary d-flex align-items-center px-4">
                                    <div class=" fw-bold">Loading date range...
                                    </div>
                                    <i class="ki-duotone ki-calendar-8 lh-0 fs-2 ms-2 me-0">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                            <div id="kt_charts_widget_18_chart"
                                 class="h-325px w-100 min-h-auto ps-4 pe-6"></div>
                        </div>
                    </div>
                </div> --}}







    <!--begin::Col-->
    <div class="col-xl-12 mb-xl-10">
        <div class="card card-flush h-xl-100">
            <!--begin::Header-->
            <div class="card-header py-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">
                        {{ \App\Helpers\TranslationHelper::translate('Latest Students') }}</span>
                </h3>

                <ul class="nav nav-pills nav-pills-custom">
                    @if (auth()->guard('admin')->user()->can('client.view_all', 'admin')) 
                    <li class="nav-item me-3 me-lg-6">
                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden p-5 active"
                            id="kt_stats_widget_16_tab_link_1" href="{{ route('admin.client.index') }}">
                            <span
                                class="nav-text text-gray-800 fw-bold fs-6 lh-1">{{ \App\Helpers\TranslationHelper::translate('All Students') }}</span>
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        </a>
                    </li>
                    @endif
                </ul>
             
            </div>
            <div class="card-body pt-6">

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                        <div class="table-responsive">
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <thead>

                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            {{ \App\Helpers\TranslationHelper::translate('ID') }}
                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            {{ \App\Helpers\TranslationHelper::translate('name') }}
                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            {{ \App\Helpers\TranslationHelper::translate('phone') }}
                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            {{ \App\Helpers\TranslationHelper::translate('email') }}
                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            {{ \App\Helpers\TranslationHelper::translate('gender') }}
                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            {{ \App\Helpers\TranslationHelper::translate('level') }}
                                        </th>
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            {{ \App\Helpers\TranslationHelper::translate('created_at') }}
                                        </th>
                                    </tr>


                                </thead>
                                <tbody>


                                    @foreach($clients as $client)
                                    <tr>
                                        <td class="text-start">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                {{ $client->id }}
                                            </span>
                                        </td>
                                        <td class="text-start">
    <a href="{{ route('admin.client.show', $client->id) }}" class="text-primary fw-bold fs-6 text-hover-underline">
        {{ $client->name ?? '_' }}
    </a>
</td>

                                        <td class="text-start">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                {{ $client->phone ?? '_' }}
                                            </span>
                                        </td>
                                        <td class="text-start">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                {{ $client->email ?? '_' }}
                                            </span>
                                        </td>
                                        <td class="text-start">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                {{ $client->gender ?? '_' }}
                                            </span>
                                        </td>
                                        <td class="text-start">{{ $client->level->name ?? '-' }}</td>
                                        <td class="text-start pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                {{ $client->created_at->format('d, M, Y') }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach



                                    {{-- <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <div
                                                            class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                               class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jane
                                                                Cooper</a>
                                                            <span
                                                                class="text-gray-500 fw-semibold d-block fs-7">Monaco</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center pe-13">
																			<span class="text-gray-600 fw-bold fs-6">08,
																				May, 2024</span>
                                                </td>
                                                <td class="text-center pe-0">
																			<span class="text-gray-600 fw-bold fs-6">
																				5 Days
																			</span>
                                                </td>
                                                <td class="text-center">
																			<span class="text-gray-600 fw-bold fs-6">
																				Service Name
																			</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <div
                                                            class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                               class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jacob
                                                                Jones</a>
                                                            <span
                                                                class="text-gray-500 fw-semibold d-block fs-7">Poland</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center pe-13">
																			<span class="text-gray-600 fw-bold fs-6">08,
																				May, 2024</span>
                                                </td>
                                                <td class="text-center pe-0">
																			<span class="text-gray-600 fw-bold fs-6">
																				5 Days
																			</span>
                                                </td>
                                                <td class="text-center">
																			<span class="text-gray-600 fw-bold fs-6">
																				Service Name
																			</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <div
                                                            class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                               class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Cody
                                                                Fishers</a>
                                                            <span
                                                                class="text-gray-500 fw-semibold d-block fs-7">Mexico</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center pe-13">
																			<span class="text-gray-600 fw-bold fs-6">08,
																				May, 2024</span>
                                                </td>
                                                <td class="text-center pe-0">
																			<span class="text-gray-600 fw-bold fs-6">
																				5 Days
																			</span>
                                                </td>
                                                <td class="text-center">
																			<span class="text-gray-600 fw-bold fs-6">
																				Service Name
																			</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <div
                                                            class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                               class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Cody
                                                                Fishers</a>
                                                            <span
                                                                class="text-gray-500 fw-semibold d-block fs-7">Mexico</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center pe-13">
																			<span class="text-gray-600 fw-bold fs-6">08,
																				May, 2024</span>
                                                </td>
                                                <td class="text-center pe-0">
																			<span class="text-gray-600 fw-bold fs-6">
																				5 Days
																			</span>
                                                </td>
                                                <td class="text-center">
																			<span class="text-gray-600 fw-bold fs-6">
																				Service Name
																			</span>
                                                </td>
                                            </tr> --}}

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_stats_widget_16_tab_2">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-150px text-start">
                                            {{ \App\Helpers\TranslationHelper::translate('Client') }}
                                        </th>
                                        <th class="p-0 pb-3 min-w-100px text-center pe-13">
                                            {{ \App\Helpers\TranslationHelper::translate('Date') }}
                                        </th>
                                        <th class="p-0 pb-3 min-w-100px text-center pe-7">
                                            {{ \App\Helpers\TranslationHelper::translate(' Service Duration') }}
                                        </th>
                                        <th class="p-0 pb-3 min-w-100px text-center">
                                            {{ \App\Helpers\TranslationHelper::translate('Service Name') }}
                                        </th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ \App\Helpers\TranslationHelper::translate('Guy Hawkins') }}
                                                    </a>
                                                    <span
                                                        class="text-gray-500 fw-semibold d-block fs-7">{{ \App\Helpers\TranslationHelper::translate('Haiti') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">08,
                                                May, 2024</span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                5 Days
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                Service Name
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jane
                                                        Cooper</a>
                                                    <span class="text-gray-500 fw-semibold d-block fs-7">Monaco</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">08,
                                                May, 2024</span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                5 Days
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                Service Name
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jacob
                                                        Jones</a>
                                                    <span class="text-gray-500 fw-semibold d-block fs-7">Poland</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">08,
                                                May, 2024</span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                5 Days
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                Service Name
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Cody
                                                        Fishers</a>
                                                    <span class="text-gray-500 fw-semibold d-block fs-7">Mexico</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">08,
                                                May, 2024</span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                5 Days
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                Service Name
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Cody
                                                        Fishers</a>
                                                    <span class="text-gray-500 fw-semibold d-block fs-7">Mexico</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">08,
                                                May, 2024</span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                5 Days
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600 fw-bold fs-6">
                                                Service Name
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Tap pane-->
                    <!--end::Table container-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end: Card Body-->
        </div>
    </div>
    <!--begin::Col-->

</div>
<!--end::Row-->
<!--end::Content container-->
</div>
<!--end::Content-->
</div>

@endsection

@push('admin_js')
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>




@endpush

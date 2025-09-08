@extends('admin.layouts.app')

@section('title', \App\Helpers\TranslationHelper::translate('Registration Details'))

@section('crumb')
   <x-bread-crumb :breadcrumbs="[
    ['text' => \App\Helpers\TranslationHelper::translate('Workshops'), 'link' => route('admin.packages.index')],
     ['text'=> \App\Helpers\TranslationHelper::translate('Registration details for')]
]" :button="[]">
</x-bread-crumb>

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{\App\Helpers\TranslationHelper::translate('Registered in')}}
                "{{ $workshop->name }}"</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{\App\Helpers\TranslationHelper::translate('name')}}</th>
                        <th>{{\App\Helpers\TranslationHelper::translate('phone')}}</th>
                        <th>{{\App\Helpers\TranslationHelper::translate('email')}}</th>
                        <th>{{\App\Helpers\TranslationHelper::translate('age')}}</th>
                        <th>{{\App\Helpers\TranslationHelper::translate('created_at')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registrations as $index => $registration)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $registration->name }}</td>
                            <td>{{ $registration->phone }}</td>
                            <td>{{ $registration->email }}</td>
                            <td>{{ $registration->age }}</td>
                            <td>{{ $registration->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

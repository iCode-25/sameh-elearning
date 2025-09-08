@extends('admin.layouts.app')

@section('title', \App\Helpers\TranslationHelper::translate('Registration Details'))

@section('crumb')
   <x-bread-crumb :breadcrumbs="[
    ['text' => \App\Helpers\TranslationHelper::translate('Challenges'), 'link' => route('admin.challenges.index')],
     ['text'=> \App\Helpers\TranslationHelper::translate('Registration details for')]
]" :button="[]">
</x-bread-crumb>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{ \App\Helpers\TranslationHelper::translate('Registered in') }} "{{ $challenge->name }}"
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('name') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('phone') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('email') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('created_at') }}</th>
                    <th>{{ \App\Helpers\TranslationHelper::translate('File') }}</th> <!-- العمود الجديد -->
                </tr>
            </thead>
            <tbody>
                @foreach($registrations as $index => $registration)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $registration->name }}</td>
                        <td>{{ $registration->phone }}</td>
                        <td>{{ $registration->email }}</td>
                        <td>{{ $registration->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            @php
                                $media = $registration->getFirstMediaUrl('registration_challenges');
                            @endphp
                            @if($media)
                                 @if(in_array(pathinfo($media, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
<img src="{{ $media }}" style="width: 100px; height: 100px; border-radius: 8px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);" alt="Image">
                                @elseif(in_array(pathinfo($media, PATHINFO_EXTENSION), ['mp4', 'mov', 'avi']))
                                    <video width="100" height="100" controls>
                                        <source src="{{ $media }}" type="video/{{ pathinfo($media, PATHINFO_EXTENSION) }}">
                                    </video>
                                @elseif(in_array(pathinfo($media, PATHINFO_EXTENSION), ['pdf', 'doc', 'docx']))
                                    <a href="{{ $media }}" target="_blank">{{ \App\Helpers\TranslationHelper::translate('view file') }}</a>
                                @endif
                            @else
                                  {{ \App\Helpers\TranslationHelper::translate('No file') }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    {{-- <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{\App\Helpers\TranslationHelper::translate('Registered in')}} "{{ $challenge->name }}"
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{\App\Helpers\TranslationHelper::translate('name')}}</th>
                        <th>{{\App\Helpers\TranslationHelper::translate('phone')}}</th>
                        <th>{{\App\Helpers\TranslationHelper::translate('email')}}</th>
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
                            <td>{{ $registration->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
@endsection

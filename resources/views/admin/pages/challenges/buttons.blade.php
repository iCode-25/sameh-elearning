{{--@can('place_challengess.view_details')--}}

@if (auth()->guard('admin')->user()->can('challenges.view_details', 'admin'))

<a href="{{route('admin.challenges.create.viewRegistrationChallenges',['challenges'=>$challenges->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('view Registration')}}">
    <img src="{{asset('dashboard/assets/img/about_us.png')}}" alt="show" style="width: 25px">
</a>
{{-- <a href="{{ route('admin.challenges.create.viewRegistrationChallenges', ['challenges' => $challenges->id]) }}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" 
   title="{{ \App\Helpers\TranslationHelper::translate('view Registration') }}">
<i class="bi bi-info-circle fs-4"></i>
</a> --}}
@endif

@if (auth()->guard('admin')->user()->can('challenges.view_details', 'admin'))
<a href="{{route('admin.challenges.show',['challenges'=>$challenges->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Show Details')}}">
    <img src="{{asset('dashboard/assets/img/show.png')}}" alt="show" style="width: 25px">
</a>
@endif
{{--@endcan--}}
{{--@can('place_challengess.edit')--}}
@if (auth()->guard('admin')->user()->can('challenges.edit', 'admin'))
<a href="{{route('admin.challenges.edit',['challenges'=>$challenges->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Edit')}}">
    <img src="{{asset('dashboard/assets/img/edit.png')}}" alt="edit" style="width: 25px">
</a>
{{--@endcan--}}
@endif
{{--@can('place_challengess.delete')--}}
@if (auth()->guard('admin')->user()->can('challenges.delete', 'admin'))
<button type="button" data-url="{{route('admin.challenges.destroy',['challenges'=>$challenges->id])}}"
   data-item-id="{{ $challenges->id }}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
   data-toggle="modal"
   data-target="#delete_modal">
    <img src="{{asset('dashboard/assets/img/delete.png')}}" alt="edit" style="width: 25px">
</button>
@endif
{{--@endcan--}}

<script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>

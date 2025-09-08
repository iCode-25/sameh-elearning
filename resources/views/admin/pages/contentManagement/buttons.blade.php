{{--@can('place_contentManagements.view_details')--}}
@if (auth()->guard('admin')->user()->can('contentManagement.view_details', 'admin'))
<a href="{{route('admin.contentManagement.show',['contentManagement'=>$contentManagement->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Show Details')}}">
    <img src="{{asset('dashboard/assets/img/show.png')}}" alt="show" style="width: 25px">
</a>
@endif
{{--@endcan--}}
{{--@can('place_contentManagements.edit')--}}
@if (auth()->guard('admin')->user()->can('contentManagement.edit', 'admin'))
<a href="{{route('admin.contentManagement.edit',['contentManagement'=>$contentManagement->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Edit')}}">
    <img src="{{asset('dashboard/assets/img/edit.png')}}" alt="edit" style="width: 25px">
</a>
{{--@endcan--}}
@endif
{{--@can('place_contentManagements.delete')--}}
@if (auth()->guard('admin')->user()->can('contentManagement.delete', 'admin'))
<button type="button" data-url="{{route('admin.contentManagement.destroy',['contentManagement'=>$contentManagement->id])}}"
   data-item-id="{{ $contentManagement->id }}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
   data-toggle="modal"
   data-target="#delete_modal">
    <img src="{{asset('dashboard/assets/img/delete.png')}}" alt="edit" style="width: 25px">
</button>
@endif

{{--@endcan--}}

<script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>

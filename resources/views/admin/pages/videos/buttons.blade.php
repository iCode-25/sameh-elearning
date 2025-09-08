{{-- @if (auth()->guard('admin')->user()->can('blogs.view_details', 'admin')) --}}
<a href="{{route('admin.videos.show',['videos'=>$videos->lesson_id ?? $videos->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Show Details')}}">
    <img src="{{asset('dashboard/assets/img/show.png')}}" alt="show" style="width: 25px">
</a>
{{-- @endif --}}



<a href="{{route('admin.videos.edit',['videos'=>$videos->lesson_id ?? $videos->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Edit')}}">
    <img src="{{asset('dashboard/assets/img/edit.png')}}" alt="edit" style="width: 25px">
</a>
{{-- @endcan --}}
{{-- @can('videoss.delete') --}}
<button type="button" data-url="{{route('admin.videos.destroy',['videos'=>$videos->lesson_id ?? $videos->id])}}"
   data-item-id="{{ $videos->lesson_id ?? $videos->id }}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
   data-toggle="modal"
   data-target="#delete_modal">
    <img src="{{asset('dashboard/assets/img/delete.png')}}" alt="edit" style="width: 25px">
</button>
{{-- @endcan --}}

<script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>


{{-- @if (auth()->guard('admin')->user()->can('blogs.view_details', 'admin')) --}}
<a href="{{route('admin.banner.show',['banner'=>$banner->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Show Details')}}">
    <img src="{{asset('dashboard/assets/img/show.png')}}" alt="show" style="width: 25px">
</a>
{{-- @endif --}}



<a href="{{route('admin.banner.edit',['banner'=>$banner->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Edit')}}">
    <img src="{{asset('dashboard/assets/img/edit.png')}}" alt="edit" style="width: 25px">
</a>
{{-- @endcan --}}
{{-- @can('banners.delete') --}}
<button type="button" data-url="{{route('admin.banner.destroy',['banner'=>$banner->id])}}"
   data-item-id="{{ $banner->id }}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
   data-toggle="modal"
   data-target="#delete_modal">
    <img src="{{asset('dashboard/assets/img/delete.png')}}" alt="edit" style="width: 25px">
</button>
{{-- @endcan --}}

<script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>


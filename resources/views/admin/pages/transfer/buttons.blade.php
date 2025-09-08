@if (auth()->guard('admin')->user()->can('transfers.view_details', 'admin'))
<a href="{{route('admin.transfer.show',['transfer'=>$transfer->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Show Details')}}">
    <img src="{{asset('dashboard/assets/img/show.png')}}" alt="show" style="width: 25px">
</a>
@endif

{{-- @if (auth()->guard('admin')->user()->can('transfers.delete', 'admin'))
<button type="button" data-url="{{route('admin.transfer.destroy',['transfer'=>$transfer->id])}}"
   data-item-id="{{ $transfer->id }}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
   data-toggle="modal"
   data-target="#delete_modal">
    <img src="{{asset('dashboard/assets/img/delete.png')}}" alt="edit" style="width: 25px">
</button>
@endif --}}

<script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>

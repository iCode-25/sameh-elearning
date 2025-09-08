    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

@if (auth()->guard('admin')->user()->can('client.view_details', 'admin'))
<a href="{{route('admin.client.show',['client'=>$client->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Show Details')}}">
    <img src="{{asset('dashboard/assets/img/show.png')}}" alt="show" style="width: 25px">
</a>
@endif


@if (auth()->guard('admin')->user()->can('client.delete', 'admin'))
<button type="button" data-url="{{route('admin.client.destroy',['client'=>$client->id])}}"
   data-item-id="{{ $client->id }}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
   data-toggle="modal"
   data-target="#delete_modal">
    <img src="{{asset('dashboard/assets/img/delete.png')}}" alt="edit" style="width: 25px">
</button>
@endif


<script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>

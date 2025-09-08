   @if (auth()->guard('admin')->user()->can('voucherspage.view_details', 'admin'))
       <a href="{{ route('admin.voucherspage.show', ['voucherspage' => $voucherspage->id]) }}"
           class="btn btn-sm btn-clean btn-icon btn-icon-md"
           title="{{ \App\Helpers\TranslationHelper::translate('Show Details') }}">
           <img src="{{ asset('dashboard/assets/img/show.png') }}" alt="show" style="width: 25px">
       </a>
   @endif

   @if (auth()->guard('admin')->user()->can('voucherspage.delete', 'admin'))
       <button type="button" data-url="{{ route('admin.voucherspage.destroy', ['voucherspage' => $voucherspage->id]) }}"
           data-item-id="{{ $voucherspage->id }}" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
           data-toggle="modal" data-target="#delete_modal">
           <img src="{{ asset('dashboard/assets/img/delete.png') }}" alt="edit" style="width: 25px">
       </button>
   @endif

   <script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>

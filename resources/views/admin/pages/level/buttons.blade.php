
@if (auth()->guard('admin')->user()->can('level.edit', 'admin'))
    <a href="{{ route('admin.level.edit', ['level' => $level->id]) }}"
        class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{ \App\Helpers\TranslationHelper::translate('Edit') }}">
        <img src="{{ asset('dashboard/assets/img/edit.png') }}" alt="edit" style="width: 25px">
    </a>
@endif
@if (auth()->guard('admin')->user()->can('level.delete', 'admin'))
    <button type="button" data-url="{{ route('admin.level.destroy', ['level' => $level->id]) }}"
        data-item-id="{{ $level->id }}" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
        data-toggle="modal" data-target="#delete_modal">
        <img src="{{ asset('dashboard/assets/img/delete.png') }}" alt="edit" style="width: 25px">
    </button>
@endif
<script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>

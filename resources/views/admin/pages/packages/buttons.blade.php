{{-- @if (auth()->guard('admin')->user()->can('packages.view_details', 'admin'))
<a href="{{route('admin.packages.create.viewRegistrationWorkshops',['workshops'=>$workshops->id])}}"
    class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('view Registration')}}">
    <img src="{{asset('dashboard/assets/img/about_us.png')}}" alt="show" style="width: 25px">
</a>
@endif --}}

@if (auth()->guard('admin')->user()->can('packages.show_package_lessons', 'admin'))
    <a href="{{ route('admin.packages.show_package_lessons', ['packages' => $packages->id]) }}"
        class="btn btn-sm btn-clean btn-icon btn-icon-md"
        title="{{ \App\Helpers\TranslationHelper::translate('Show Package Lessons') }}">
        <img src="{{ asset('dashboard/assets/img/video.png') }}" alt="show" style="width: 25px">
    </a>
@endif

@if (auth()->guard('admin')->user()->can('packages.view_details', 'admin'))
    <a href="{{ route('admin.packages.show', ['packages' => $packages->id]) }}"
        class="btn btn-sm btn-clean btn-icon btn-icon-md"
        title="{{ \App\Helpers\TranslationHelper::translate('Show Details') }}">
        <img src="{{ asset('dashboard/assets/img/show.png') }}" alt="show" style="width: 25px">
    </a>
@endif

@if (auth()->guard('admin')->user()->can('packages.edit', 'admin'))
    <a href="{{ route('admin.packages.edit', ['packages' => $packages->id]) }}"
        class="btn btn-sm btn-clean btn-icon btn-icon-md"
        title="{{ \App\Helpers\TranslationHelper::translate('Edit') }}">
        <img src="{{ asset('dashboard/assets/img/edit.png') }}" alt="edit" style="width: 25px">
    </a>
@endif

@if (auth()->guard('admin')->user()->can('packages.delete', 'admin'))
    <button type="button" data-url="{{ route('admin.packages.destroy', ['packages' => $packages->id]) }}"
        data-item-id="{{ $packages->id }}" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
        data-toggle="modal" data-target="#delete_modal">
        <img src="{{ asset('dashboard/assets/img/delete.png') }}" alt="edit" style="width: 25px">
    </button>
@endif

<script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>

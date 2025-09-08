{{--@can('place_tests.view_details')--}}
@if (auth()->guard('admin')->user()->can('test.create', 'admin'))
    <a href="{{ route('admin.test.create.quizzes', ['test' => $test->id]) }}"
       class="btn btn-primary btn-sm me-2">
        <i class="bi bi-plus-circle me-1"></i> {{ \App\Helpers\TranslationHelper::translate('Add Questions') }}
    </a>
@endif


@if (auth()->guard('admin')->user()->can('test.view_details', 'admin'))
    <a href="{{ route('admin.test.answers', ['test' => $test->id]) }}"
       class="btn btn-info btn-sm">
        <i class="bi bi-list-check me-1"></i> {{ \App\Helpers\TranslationHelper::translate('Show Answers') }}
    </a>
@endif



@if (auth()->guard('admin')->user()->can('test.view_details', 'admin'))
<a href="{{route('admin.test.show',['test'=>$test->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Show Details')}}">
    <img src="{{asset('dashboard/assets/img/show.png')}}" alt="show" style="width: 25px">
</a>
@endif


@if (auth()->guard('admin')->user()->can('test.edit', 'admin'))
<a href="{{route('admin.test.edit',['test'=>$test->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{\App\Helpers\TranslationHelper::translate('Edit')}}">
    <img src="{{asset('dashboard/assets/img/edit.png')}}" alt="edit" style="width: 25px">
</a>
@endif


@if (auth()->guard('admin')->user()->can('test.delete', 'admin'))
<button type="button" data-url="{{route('admin.test.destroy',['test'=>$test->id])}}"
   data-item-id="{{ $test->id }}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
   data-toggle="modal"
   data-target="#delete_modal">
    <img src="{{asset('dashboard/assets/img/delete.png')}}" alt="edit" style="width: 25px">
</button>
@endif

<script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>

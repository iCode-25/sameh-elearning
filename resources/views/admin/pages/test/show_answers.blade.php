@extends('admin.layouts.app')
@section('title', \App\Helpers\TranslationHelper::translate('Test Details'))
@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Tests'), 'link' => route('admin.test.index')],
        ['text' => \App\Helpers\TranslationHelper::translate('Details')],
    ]" :button="[]">
    </x-bread-crumb>
@endsection
@section('content')

    <div class="container mt-4">
        <h3 class="mb-4">{{ \App\Helpers\TranslationHelper::translate('Test Questions and Answers') }}</h3>
<p class="mb-3">
    {{ \App\Helpers\TranslationHelper::translate('Total Questions') }}:
    <strong>{{ $test->quizzes->count() }}</strong> {{ \App\Helpers\TranslationHelper::translate('number of student questions') }}:  <strong>{{ $test->number_student_questions }}</strong>
</p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('Question') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('Answers') }}</th>
                      <th>{{ \App\Helpers\TranslationHelper::translate('question_score') }}</th>
                        <th>{{ \App\Helpers\TranslationHelper::translate('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($test->quizzes as $index => $quiz)
                        <tr id="quizzes_{{ $quiz->id }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{!! $quiz->title !!}</td>
                            
                            <td>
                                <ul class="list-unstyled">
                                    @foreach (['answer_1', 'answer_2', 'answer_3','answer_4'] as $answer)
                                        <li class="mb-3 d-flex align-items-center gap-3">
                                            @php
                                                $image = $quiz->getFirstMediaUrl("{$answer}_image");
                                            @endphp

                                            @if ($quiz->c_answer === $answer)
                                                <strong class="text-success d-flex align-items-center gap-2">
                                                    <i class="bi bi-check-circle-fill"></i> {{ $quiz->$answer }}
                                                </strong>
                                            @else
                                                {{ $quiz->$answer }}
                                            @endif

                                            @if ($image)
                                                <img src="{{ $image }}" alt="Answer Image" width="60"
                                                    class="rounded shadow-sm border" />
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </td>

                                                         <td>{{ $quiz->question_score }}</td>


                            <td>

                                @if (auth()->guard('admin')->user()->can('test.edit', 'admin'))
                                    <a href="{{ route('admin.quizzes.edit', ['test' => $quiz->id]) }}"
                                        class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                        title="{{ \App\Helpers\TranslationHelper::translate('Edit') }}">
                                        <img src="{{ asset('dashboard/assets/img/edit.png') }}" alt="edit"
                                            style="width: 25px">
                                    </a>
                                @endif


                                @if (auth()->guard('admin')->user()->can('test.delete', 'admin'))
                                    <button type="button"
                                        data-url="{{ route('admin.quizzes.destroy', ['quizze' => $quiz->id]) }}"
                                        data-item-id="{{ $quiz->id }}"
                                        class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button" data-toggle="modal"
                                        data-target="#delete_modal">
                                        <img src="{{ asset('dashboard/assets/img/delete.png') }}" alt="edit"
                                            style="width: 25px">
                                    </button>
                                @endif


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.layouts.delete-modal', [
        'action_message' => \App\Helpers\TranslationHelper::translate('This Item'),
    ])
@stop

@push('admin_js')
    <script src="{{ asset('dashboard/assets/js/delete-item.js') }}" type="text/javascript"></script>
@endpush

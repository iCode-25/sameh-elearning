@extends('admin.layouts.app')

@push('admin_css')
    <link href="{{ asset('dashboard/assets/css/tags-input.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
@endpush

@if ($method == 'PUT')
    @section('title', \App\Helpers\TranslationHelper::translate('Edit Quiz'))
@else
    @section('title', \App\Helpers\TranslationHelper::translate('Add Quiz'))
@endif

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text' => \App\Helpers\TranslationHelper::translate('Quizzes'), 'link' => route('admin.test.index')],
        ['text' => __('methods.' . getLastKeyRoute(request()->route()->getName()))],
    ]" :button="[
        'text' => \App\Helpers\TranslationHelper::translate('Go to Questions'),
        'link' => route('admin.test.answers', ['test' => $test->id]),
    ]">
    </x-bread-crumb>
@endsection

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-body pt-0">
                            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($method == 'PUT')
                                    @method('PUT')
                                    <input type="hidden" name="quizze_id" value="{{ $quizze->id ?? '' }}">
                                @endif


                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <div class="fv-row mb-10">
                                    <div class="row">
                                        <div class="row">

                                            {{-- @foreach (Config('language') as $key => $lang)
                                                <div class="col-6 mb-5">
                                                    <label class="fs-5 fw-bold form-label mb-5">
                                                        {{ \App\Helpers\TranslationHelper::translate('Title in') }}
                                                        {{ __('methods.' . $lang) }}:
                                                    </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ old('title.' . $key) ?? $quizze->getTranslation('title', $key) }}"
                                                        placeholder="{{ \App\Helpers\TranslationHelper::translate('Title in') }} {{ __('methods.' . $lang) }}"
                                                        name="title[{{ $key }}]" />
                                                    @error('title.' . $key)
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            @endforeach --}}

                                            @foreach (Config('language') as $key => $lang)
                                                <div class="col-12  mb-5">
                                                    <label
                                                        class="fs-5 fw-bold form-label mb-5">{{ \App\Helpers\TranslationHelper::translate('Description in') }}
                                                        {{ __('methods.' . $lang) }}
                                                    </label>
                                                    <textarea class="form-control form-control-solid full-editor" name="title[{{ $key }}]" rows="5"
                                                        id="title{{ $key }}" style="height: 300px; direction: rtl;">{{ old('title.' . $key) ?? $quizze->getTranslation('title', $key) }}</textarea>
                                                    @error('title.' . $key)
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            @endforeach


                                            @foreach (range(1, 4) as $index)
                                                <div class="col-12 mb-5">
                                                    <div class="row">
                                                        @foreach (Config('language') as $key => $lang)
                                                            <div class="col-md-6">
                                                                <label class="fs-5 fw-bold form-label mb-3">
                                                                    {{ \App\Helpers\TranslationHelper::translate('Answer') }}
                                                                    {{ $index }} ({{ __('methods.' . $lang) }})
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    value="{{ old("answer_{$index}.$key") ?? $quizze->getTranslation("answer_{$index}", $key) }}"
                                                                    placeholder="{{ \App\Helpers\TranslationHelper::translate('Enter Answer') }} {{ $index }} ({{ __('methods.' . $lang) }})"
                                                                    name="answer_{{ $index }}[{{ $key }}]" />
                                                                @error("answer_{$index}.$key")
                                                                    <span class="text-danger"
                                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                                @enderror
                                                            </div>
                                                        @endforeach

                                                        {{-- <div class="col-md-6 mt-4">
                                                            <label class="fs-5 fw-bold form-label mb-3">
                                                                {{ \App\Helpers\TranslationHelper::translate('Image for Answer') }}
                                                                {{ $index }}
                                                            </label>
                                                            <input type="file" class="form-control form-control-solid"
                                                                name="image_answer_{{ $index }}">
                                                            @php
                                                                $image = $quizze->getFirstMediaUrl(
                                                                    "answer_{$index}_image",
                                                                );
                                                            @endphp
                                                            @if ($image)
                                                                <div class="mt-3">
                                                                    <img src="{{ $image }}"
                                                                        alt="Current Answer Image" width="100"
                                                                        class="rounded shadow-sm border">
                                                                </div>
                                                            @endif
                                                            @error("image_answer_{$index}")
                                                                <span class="text-danger"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div> --}}


                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                        <div class="col-md-6 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Question Score') }}:</label>
                                            <input type="number" name="question_score"
                                                class="form-control form-control-solid" value="{{ old('question_score') }}"
                                                placeholder=" {{ \App\Helpers\TranslationHelper::translate('Question Score') }}">
                                            @error('question_score')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Correct Answer') }}
                                            </label>
                                            <select class="form-control form-control-solid" name="c_answer">
                                                <option value="">
                                                    {{ \App\Helpers\TranslationHelper::translate('Select Correct Answer') }}
                                                </option>
                                                @foreach (range(1, 4) as $index)
                                                    <option value="answer_{{ $index }}"
                                                        {{ old('c_answer', $quizze->c_answer) == "answer_$index" ? 'selected' : '' }}>
                                                        {{ \App\Helpers\TranslationHelper::translate('Answer') }}
                                                        {{ $index }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('c_answer')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-12 mb-5">
                                            <label class="fs-5 fw-bold form-label mb-5">
                                                {{ \App\Helpers\TranslationHelper::translate('Hint') }}
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="hint" value="{{ old('hint', $quizze->hint) }}  " placeholder="{{ \App\Helpers\TranslationHelper::translate('Hint') }}">
                                            @error('hint')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mb-5">
                                        <span
                                            class="indicator-label">{{ \App\Helpers\TranslationHelper::translate('Save') }}</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('admin_js')
    <script src="{{ asset('dashboard/assets/js/tags-input.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        function addQuestion() {
            let container = document.getElementById('questions-container');
            let questionBlocks = container.getElementsByClassName('question-block');
            let newQuestion = questionBlocks[0].cloneNode(true);

            newQuestion.querySelectorAll('input').forEach(input => {
                input.value = '';
            });

            newQuestion.querySelector('.remove-question-btn').classList.remove('d-none');
            container.appendChild(newQuestion);
        }

        function removeQuestion(element) {
            let container = document.getElementById('questions-container');
            if (container.getElementsByClassName('question-block').length > 1) {
                element.closest('.question-block').remove();
            }
        }
    </script>
@endpush

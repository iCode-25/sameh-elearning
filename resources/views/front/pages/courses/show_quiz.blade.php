@extends('front.layouts.app')

@section('content')
    <section class="title-banner">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <div class="title-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="title-content">
                                    <h2 class="fw-bold mb-3" style="color: var(--primary-color);">
                                        {{ $test->name }}</h2>
                                </div>
                                <div class="img-block">
                                    <img src="{{ asset('front/assets/media/user/star.png') }}" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="{{ $lesson->getFirstMediaUrl('newsimage_news') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container py-5">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom-0 px-4 py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold" style="color: var(--primary-color);">اختبار</h5>
                {{-- <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                    ⏱️ <span id="timer">60</span> ثانية
                </span> --}}
            </div>
            <div class="card-body px-4 py-4" id="question-area">
                <h6 class="text-muted mb-2">السؤال <span id="question-number">1</span> من
                    <span>{{ $test->number_student_questions > count($test->quizzes) ? count($test->quizzes) : $test->number_student_questions }}</span>
                </h6>
                <div id="question-text" class="fw-bold fs-4 mb-4 text-dark"></div>

                <div id="options" class="d-flex flex-wrap gap-3 mb-4"></div>

                <div id="feedback" class="text-center fw-semibold fs-5 mt-3"></div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('css')
    <style>
        :root {
            --main-color: var(--primary-color);
            --main-color-light: #fff3e0;
            --main-color-dark: #cf7a14;
        }

        .card {
            border-radius: 1rem;
        }

        .card-header h5 {
            color: var(--main-color);
        }

        .badge.bg-warning {
            background-color: var(--main-color) !important;
            color: #fff !important;
            font-weight: 500;
        }

        #question-text {
            color: #333;
        }

        .option-card {
            display: flex;
            align-items: center;
            gap: 10px;
            border: 2px solid #ddd;
            border-radius: 12px;
            padding: 14px 18px;
            background-color: #fdfdfd;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1 1 calc(50% - 1rem);
        }

        .option-card input[type="radio"] {
            accent-color: var(--main-color);
            transform: scale(1.3);
        }

        .option-card:hover {
            border-color: var(--main-color);
            background-color: var(--main-color-light);
        }

        .option-card input[type="radio"]:checked+span {
            font-weight: bold;
            color: var(--main-color-dark);
        }

        .option-card.correct {
            background-color: #d1e7dd !important;
            border-color: #198754 !important;
            color: #0f5132 !important;
        }

        .option-card.wrong {
            background-color: #f8d7da !important;
            border-color: #dc3545 !important;
            color: #842029 !important;
        }

        .option-card.disabled {
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .option-card {
                flex: 1 1 100%;
            }
        }
    </style>
@endpush --}}

@push('css')
    <style>
        :root {
            --main-color: var(--primary-color);
            --main-color-light: #d6f5fb;
            --main-color-dark: var(--primary-color);
        }

        .card {
            border-radius: 1rem;
        }

        .card-header h5 {
            color: var(--main-color);
        }

        .badge.bg-warning {
            background-color: var(--main-color) !important;
            color: #fff !important;
            font-weight: 500;
        }

        #question-text {
            color: #333;
            line-height: 1.7;
        }

        #question-area {
            min-height: 300px;
        }

        .option-card {
            display: flex;
            align-items: center;
            gap: 12px;
            border: 2px solid #ddd;
            border-radius: 14px;
            padding: 14px 20px;
            background-color: #fff;
            cursor: pointer;
            transition: all 0.25s ease-in-out;
            flex: 1 1 calc(50% - 1rem);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        }

        .option-card:hover {
            border-color: var(--main-color);
            background-color: var(--main-color-light);
        }

        .option-card input[type="radio"] {
            accent-color: var(--main-color);
            transform: scale(1.4);
            margin-right: 6px;
        }

        .option-card input[type="radio"]:checked+span {
            font-weight: 600;
            color: var(--main-color-dark);
        }

        .option-card.correct {
            background-color: #e9f7ef !important;
            border-color: #198754 !important;
            color: #14532d !important;
        }

        .option-card.wrong {
            background-color: #fcebea !important;
            border-color: #dc3545 !important;
            color: #842029 !important;
        }

        .option-card.disabled {
            opacity: 0.9;
            pointer-events: none;
        }

        #feedback {
            padding: 10px 20px;
            border-radius: 8px;
            margin-top: 15px;
        }

        @media (max-width: 768px) {
            .option-card {
                flex: 1 1 100%;
            }
        }

        /* نتيجة الاختبار النهائية */
        .result-box {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 1rem;
            padding: 30px;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
    </style>
@endpush


@php
    $questions = $test->quizzes->shuffle()->take($test->number_student_questions);
@endphp

@push('js')
    <script>
        const locale = "{{ app()->getLocale() }}";
        const questions = @json($questions);
        let currentIndex = 0;
        let correctCount = 0;
        let answers = [];

        function renderQuestion(index) {
            const q = questions[index];
            console.log(q);
            const qText = q.title[locale] ?? q.title.en;
            const optionsDiv = document.getElementById('options');
            const feedback = document.getElementById('feedback');

            document.getElementById('question-number').textContent = index + 1;
            document.getElementById('question-text').innerHTML = `
            ${qText}
            <div class="mt-2 fs-6 text-secondary">درجة السؤال: <strong>${q.question_score ?? 1}</strong></div>
        `;

            feedback.textContent = '';
            optionsDiv.innerHTML = '';

            const options = [];
            if (q.answer_1) options.push({
                key: 'answer_1',
                text: q.answer_1[locale] ?? q.answer_1.en
            });
            if (q.answer_2) options.push({
                key: 'answer_2',
                text: q.answer_2[locale] ?? q.answer_2.en
            });
            if (q.answer_3) options.push({
                key: 'answer_3',
                text: q.answer_3[locale] ?? q.answer_3.en
            });
            if (q.answer_4) options.push({
                key: 'answer_4',
                text: q.answer_4[locale] ?? q.answer_4.en
            });

            options.forEach((opt) => {
                const wrapper = document.createElement('label');
                wrapper.className = 'option-card';
                wrapper.innerHTML = `
                <input type="radio" name="answer" value="${opt.key}">
                <span>${opt.text}</span>
            `;
                wrapper.addEventListener('click', () => {
                    if (document.querySelector('input[name="answer"]:checked')) {
                        handleAnswer(opt.key, q.c_answer, q);
                    }
                });
                optionsDiv.appendChild(wrapper);
            });

            startTimer(60); // العدّاد لكل سؤال (لو عندك دوال startTimer و stopTimer)
        }

        function handleAnswer(selectedKey, correctKey, q) {
            // stopTimer();

            const wrappers = document.querySelectorAll('.option-card');
            wrappers.forEach(wrapper => {
                const radio = wrapper.querySelector('input');
                const key = radio.value;

                wrapper.classList.add('disabled');
                wrapper.style.pointerEvents = "none";

                if (key === correctKey) wrapper.classList.add('correct');
                if (key === selectedKey && selectedKey !== correctKey) wrapper.classList.add('wrong');
            });

            const feedback = document.getElementById('feedback');
            feedback.classList.remove('text-success', 'text-danger');

            if (selectedKey === correctKey) {
                feedback.innerHTML = '✅ إجابة صحيحة';
                feedback.classList.add('text-success');
                correctCount++;
            } else {
                feedback.innerHTML = '❌ إجابة خاطئة';
                feedback.classList.add('text-danger');
            }

            // ✅ عرض الـ Hint لو موجود (لغة واحدة فقط)
            if (q.hint) {
                const hintBox = document.createElement('div');
                hintBox.className = 'alert alert-info mt-3';
                hintBox.innerHTML = `<strong>💡 تلميح:</strong> ${q.hint}`;
                feedback.insertAdjacentElement('afterend', hintBox);
            }

            // ✅ حفظ الإجابة
            answers.push({
                question_id: q.id,
                correct_answer: q.c_answer,
                student_answer: selectedKey,
                is_correct: selectedKey === q.c_answer ? 1 : 0
            });

            console.log(answers);

            // ✅ زر "التالي" أو "عرض النتيجة"
            const nextBtnContainer = document.createElement('div');
            nextBtnContainer.className = 'text-center mt-4';

            const nextBtn = document.createElement('button');
            nextBtn.textContent = currentIndex + 1 < questions.length ? 'السؤال التالي ➡️' : 'عرض النتيجة 🏁';
            nextBtn.className = currentIndex + 1 < questions.length ? 'btn btn-primary px-4 py-2' :
                'btn btn-success px-4 py-2';

            nextBtn.addEventListener('click', () => {
                const hintBox = document.querySelector('.alert.alert-info');
                if (hintBox) hintBox.remove();

                nextBtnContainer.remove();

                currentIndex++;
                if (currentIndex < questions.length) {
                    renderQuestion(currentIndex);
                } else {
                    // ✅ الاختبار خلص - حساب النتيجة النهائية
                    let totalScore = 0;
                    let maxScore = 0;

                    answers.forEach(ans => {
                        const question = questions.find(q => q.id === ans.question_id);
                        const score = Number(question.question_score) || 1;
                        maxScore += score;
                        if (ans.is_correct) totalScore += score;
                    });

                    let percentage = ((totalScore / maxScore) * 100).toFixed(2);
                    let resultStatus = totalScore >= (maxScore / 2) ? '✅ ناجح' : '❌ راسب';
                    let resultColor = totalScore >= (maxScore / 2) ? 'text-success' : 'text-danger';
                    const correctAnswers = answers.filter(ans => ans.is_correct).length;
                    const wrongAnswers = answers.length - correctAnswers;

                    let retryButton = '';
                    let testStatus = 1;
                    if (resultStatus === '❌ راسب') {
                        testStatus = 0;
                        retryButton = `
                        <button onclick="location.reload()" class="btn btn-danger mt-4 px-4 py-2">
                            {{ \App\Helpers\TranslationHelper::translate('حاول تاني') }} 💪
                        </button>
                    `;
                    }

                    document.getElementById('question-area').innerHTML = `
                    <div class="text-center p-5 result-box">
                        <h2 class="${resultColor} mb-4">انتهى الاختبار 🎉</h2>
                        <p class="fs-5 mb-2">✅ عدد الإجابات الصحيحة: <strong>${correctAnswers}</strong></p>
                        <p class="fs-5 mb-2">❌ عدد الإجابات الخاطئة: <strong>${wrongAnswers}</strong></p>
                        <p class="fs-5 mb-2">🧮 الدرجة: <strong>${totalScore}</strong> من <strong>${maxScore}</strong></p>
                        <p class="fs-5 mb-2">📊 نسبة النجاح: <strong>${percentage}%</strong></p>
                        <p class="fs-4 mt-4 fw-bold ${resultColor}">${resultStatus}</p>
                        ${retryButton}
                    </div>
                `;

                    // ✅ إرسال النتيجة للسيرفر
                    fetch("{{ route('user.test.submit', ['lesson' => $lesson->id, 'test' => $test->id]) }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "X-Requested-With": "XMLHttpRequest"
                            },
                            body: JSON.stringify({
                                answers: answers,
                                total_questions: Number(correctAnswers + wrongAnswers),
                                total_score: maxScore,
                                student_score: totalScore,
                                result_status: testStatus
                            }),
                            credentials: 'same-origin',
                        })
                        .then(res => res.json())
                        .then(data => {
                            console.log("تم إرسال الإجابات بنجاح:", data);
                        })
                        .catch(err => {
                            console.error("خطأ أثناء إرسال البيانات:", err);
                        });
                }
            });

            nextBtnContainer.appendChild(nextBtn);
            feedback.insertAdjacentElement('afterend', nextBtnContainer);
        }

        renderQuestion(currentIndex);
    </script>
@endpush

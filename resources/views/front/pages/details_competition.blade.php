@extends('front.layouts.app')

@section('content')
<main>
    <section style="background:#F7F0E9;" class="jop-mainm">
        <div class="row">
            <section class="jop-main">
                <div class="row">
                    <div class="col-md-4 jop-competition">
                        <div class="oresh"><br></div>
                        <button onclick="window.location.href='{{ route('competition') }}'"
                            class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols"
                            style="z-index: 9999999999999;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </section>

            <div class="col-md-8" style="padding: 10px; margin-left: 2px;">
                <div class="main-img-left">
                    <div class="img-progrees">
                        <img src="../../front/assets/img/about/tiem.png" alt="Question Image" id="question-img"
                            class="img-fluid">
                    </div>
                    <div class="timer" id="timer"></div>
                    <div class="progress" style="height: 10px; margin-top: 10px;">
                        <div id="timer-bar" class="progress-bar progress-bar-striped progress-bar-animated"
                            role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>




                <div class="quiz-section mt-4">
                    <div class="quiz-container card-2 p-4">
                        @foreach ($details_competition->quizzes as $index => $quiz)
                        <div class="quiz-item p-4 mb-4 rounded"
                            style="display: {{ $index == 0 ? 'block' : 'none' }};" data-index="{{ $index }}">
                            <h5 class="mb-3">{{ $index + 1 }}. {{ $quiz->title }}</h5>
                            <div class="options d-flex justify-content-center gap-3">
                                @foreach ([1, 2, 3] as $num)
                                @php
                                $answerColumn = 'answer_' . $num;
                                $collection = "answer_{$num}_image";
                                $imageUrl = $quiz->hasMedia($collection)
                                ? $quiz->getFirstMediaUrl($collection)
                                : asset('front/assets/img/about/Screenshotpng.png');
                                @endphp
                                <div class="form-check option-container text-center option-clickable"
                                    data-correct="{{ $quiz->{$quiz->c_answer} }}"
                                    data-value="{{ $quiz->$answerColumn }}">
                                    <img src="{{ $imageUrl }}" alt="Option Image" class="mb-2 img-main-qouz">
                                    <div class="option-text" style="cursor: pointer;">
                                        {{ $quiz->$answerColumn }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="feedback mt-3 fw-bold text-center"></div>
                            <div class="question-progress text-center mt-2">
                                {{ $index + 1 }} _ {{ count($details_competition->quizzes) }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>





            </div>

        </div>
    </section>
</main>

<div id="successPopup"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
    background:#F7F0E9; z-index: 999999999; justify-content: center; align-items: center; flex-direction: column; text-align: center; color: white;">
    <img id="popupImage" src="" style="max-width: 300px; max-height: 300px; margin-bottom: 20px;">
    <h2 id="popupText"></h2>
</div>

<audio id="correctSound" src="{{ asset('sounds/correct.mp3') }}"></audio>
<audio id="wrongSound" src="{{ asset('sounds/wrong.mp3') }}"></audio>
<audio id="fireworksSound" src="{{ asset('front/assets/img/about/fireworks-sound.mp3') }}"></audio>

<div id="finalPopup">
    <div style="position: relative; width: 50%; height: auto; margin-bottom: 20px; border-radius: 8px; object-fit: contain;">
        <video src="{{ asset('front/assets/img/about/Animation - video.webm') }}"
               style="width: 100%; height: auto; border-radius: 8px; object-fit: contain;"
               autoplay muted loop playsinline></video>
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size:70px; color: #1A997B; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); width: max-content;">
{{ \App\Helpers\TranslationHelper::translate('My answer is correct') }}        </div>
    </div>
    <h2 id="finalText" style="font-size: 26px; text-align: center; margin-top: 10px;"></h2>
</div>


<div id="failurePopup"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
    background:#F7F0E9; z-index: 999999999; justify-content: center; align-items: center; flex-direction: column; text-align: center; color: #f46a50">
    <img id="failurePopupImage" src="" style="max-width: 100%; max-height: 300px; margin-bottom: 20px;">
    <h2 id="failureText">{{ \App\Helpers\TranslationHelper::translate('Test result Failed Your score is') }}</h2>
</div>


@endsection

@push('css')
<style>
    .shake {
        animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {
        0% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        50% { transform: translateX(10px); }
        75% { transform: translateX(-10px); }
        100% { transform: translateX(10px); }
    }

    .timer {
        font-size: 20px;
        font-weight: bold;
        color: #333;
        margin-top: 10px;
        text-align: center;
    }
</style>
@endpush

@push('js')
<script>
    const translations = {
        correct: @json(\App\Helpers\TranslationHelper::translate('Correct answer!')),
        wrong: @json(\App\Helpers\TranslationHelper::translate('Wrong answer!')),
        quiz_success: @json(\App\Helpers\TranslationHelper::translate('🎉 You have finished the quiz! You answered :correct/:total questions correctly 🎊')),
        quiz_failure: @json(\App\Helpers\TranslationHelper::translate('You have finished the quiz and failed! You answered :correct/:total questions correctly'))
    };

    document.addEventListener("DOMContentLoaded", function () {
        let quizItems = document.querySelectorAll('.quiz-item');
        let currentIndex = 0;
        const totalQuestions = quizItems.length;
        let correctAnswers = 0;
        let wrongAnswers = 0;
        const questionImage = document.getElementById('question-img');
        const timerElement = document.getElementById('timer');
        const timerBar = document.getElementById('timer-bar');
        let countdownTimer;

        function startTimer() {
            let timeLeft = 15;
            let progressWidth = 100;
       function updateTimer() {
    timerElement.textContent = `${timeLeft.toLocaleString('en')}s`;
    progressWidth = (timeLeft / 15) * 100;
    timerBar.style.width = `${progressWidth}%`;
    if (timeLeft <= 0) {
        clearInterval(countdownTimer);
        document.getElementById("wrongSound").play();
        wrongAnswers++;
        triggerImageShake();
        setTimeout(() => {
            showNextQuestion();
        }, 1000);
    }
    timeLeft--;
}

            updateTimer();
            countdownTimer = setInterval(updateTimer, 1000);
        }

        function triggerImageShake() {
            questionImage.classList.add('shake');
            setTimeout(() => {
                questionImage.classList.remove('shake');
            }, 1000);
        }

        function showNextQuestion() {
            clearInterval(countdownTimer);
            if (currentIndex < quizItems.length - 1) {
                $(quizItems[currentIndex]).fadeOut(500, function () {
                    currentIndex++;
                    $(quizItems[currentIndex]).fadeIn(500);
                    startTimer();
                });
            } else {
                setTimeout(() => {
                    const passingScore = Math.ceil(totalQuestions / 2);
                    if (correctAnswers >= passingScore) {
                        document.getElementById("finalText").innerText = translations.quiz_success
                            .replace(':correct', correctAnswers.toLocaleString('en'))
                            .replace(':total', totalQuestions.toLocaleString('en'));
                        document.getElementById("finalPopup").style.display = "flex";
                        document.getElementById("fireworksSound").play();
                    } else {
                        document.getElementById("failureText").innerText = translations.quiz_failure
                            .replace(':correct', correctAnswers.toLocaleString('en'))
                            .replace(':total', totalQuestions.toLocaleString('en'));
                        document.getElementById("failurePopup").style.display = "flex";
                    }
                }, 1000);
            }
        }
        startTimer();
        document.querySelectorAll('.option-clickable').forEach(option => {
            option.addEventListener('click', function () {
                clearInterval(countdownTimer);
                const parent = this.closest('.quiz-item');
                const feedback = parent.querySelector('.feedback');
                const selectedValue = this.getAttribute('data-value')?.trim().toLowerCase();
                const correctValue = this.getAttribute('data-correct')?.trim().toLowerCase();
                if (selectedValue === correctValue) {
                    feedback.innerHTML = `<span class="text-success">${translations.correct}</span> 🌟`;
                    document.getElementById("correctSound").play();
                    correctAnswers++;
                    const imageElement = this.querySelector('img');
                    const textElement = this.querySelector('.option-text');
                    document.getElementById("popupImage").src = imageElement.src;
                    document.getElementById("popupText").innerText = textElement.innerText;
                    document.getElementById("successPopup").style.display = 'flex';
                    setTimeout(() => {
                        document.getElementById("successPopup").style.display = 'none';
                        showNextQuestion();
                    }, 3000);
                } else {
                    feedback.innerHTML = `<span class="text-danger">${translations.wrong}</span> 😞`;
                    document.getElementById("wrongSound").play();
                    wrongAnswers++;
                    setTimeout(() => {
                        showNextQuestion();
                    }, 3000);
                }
            });
        });
    });
</script>

{{--
<script>
    const translations = {
        correct: @json(\App\Helpers\TranslationHelper::translate('Correct answer!')),
        wrong: @json(\App\Helpers\TranslationHelper::translate('Wrong answer!')),
        quiz_success: @json(\App\Helpers\TranslationHelper::translate('🎉 You have finished the quiz! You answered :correct/:total questions correctly 🎊')),
        quiz_failure: @json(\App\Helpers\TranslationHelper::translate('You have finished the quiz and failed! You answered :correct/:total questions correctly'))
    };
    document.addEventListener("DOMContentLoaded", function () {
        let quizItems = document.querySelectorAll('.quiz-item');
        let currentIndex = 0;
        const totalQuestions = quizItems.length;
        let correctAnswers = 0;
        let wrongAnswers = 0;
        const questionImage = document.getElementById('question-img');
        const timerElement = document.getElementById('timer');
        const timerBar = document.getElementById('timer-bar');
        let countdownTimer;
        function startTimer() {
            let timeLeft = 15;
            let progressWidth = 100;
            function updateTimer() {
                timerElement.textContent = `${timeLeft}s`;
                progressWidth = (timeLeft / 15) * 100;
                timerBar.style.width = `${progressWidth}%`;
                if (timeLeft <= 0) {
                    clearInterval(countdownTimer);
                    document.getElementById("wrongSound").play();
                    wrongAnswers++;
                    triggerImageShake();
                    setTimeout(() => {
                        showNextQuestion();
                    }, 1000);
                }
                timeLeft--;
            }
            updateTimer();
            countdownTimer = setInterval(updateTimer, 1000);
        }
        function triggerImageShake() {
            questionImage.classList.add('shake');
            setTimeout(() => {
                questionImage.classList.remove('shake');
            }, 1000);
        }
        function showNextQuestion() {
            clearInterval(countdownTimer);
            if (currentIndex < quizItems.length - 1) {
                $(quizItems[currentIndex]).fadeOut(500, function () {
                    currentIndex++;
                    $(quizItems[currentIndex]).fadeIn(500);
                    startTimer();
                });
            } else {
                setTimeout(() => {
                    const passingScore = Math.ceil(totalQuestions / 2);
                    if (correctAnswers >= passingScore) {
                        document.getElementById("finalText").innerText = translations.quiz_success
                            .replace(':correct', correctAnswers)
                            .replace(':total', totalQuestions);
                        document.getElementById("finalPopup").style.display = "flex";
                        document.getElementById("fireworksSound").play();
                    } else {
                        document.getElementById("failureText").innerText = translations.quiz_failure
                            .replace(':correct', correctAnswers)
                            .replace(':total', totalQuestions);
                        document.getElementById("failurePopup").style.display = "flex";
                    }
                }, 1000);
            }
        }
        startTimer();
        document.querySelectorAll('.option-clickable').forEach(option => {
            option.addEventListener('click', function () {
                clearInterval(countdownTimer);
                const parent = this.closest('.quiz-item');
                const feedback = parent.querySelector('.feedback');
                const selectedValue = this.getAttribute('data-value')?.trim().toLowerCase();
                const correctValue = this.getAttribute('data-correct')?.trim().toLowerCase();
                if (selectedValue === correctValue) {
                    feedback.innerHTML = `<span class="text-success">${translations.correct}</span> 🌟`;
                    document.getElementById("correctSound").play();
                    correctAnswers++;
                    const imageElement = this.querySelector('img');
                    const textElement = this.querySelector('.option-text');
                    document.getElementById("popupImage").src = imageElement.src;
                    document.getElementById("popupText").innerText = textElement.innerText;
                    document.getElementById("successPopup").style.display = 'flex';
                    setTimeout(() => {
                        document.getElementById("successPopup").style.display = 'none';
                        showNextQuestion();
                    }, 3000);
                } else {
                    feedback.innerHTML = `<span class="text-danger">${translations.wrong}</span> 😞`;
                    document.getElementById("wrongSound").play();
                    wrongAnswers++;
                    setTimeout(() => {
                        showNextQuestion();
                    }, 3000);
                }
            });
        });
    });
</script> --}}


{{-- <script>
    const translations = {
        correct: @json(\App\Helpers\TranslationHelper::translate('Correct answer!')),
        wrong: @json(\App\Helpers\TranslationHelper::translate('Wrong answer!')),
                quiz_success: @json(\App\Helpers\TranslationHelper::translate('🎉 You have finished the quiz!\nYou answered :correct out of :total questions correctly 🎊')),
        quiz_failure: @json(\App\Helpers\TranslationHelper::translate('You have finished the quiz and failed!\nYou answered :correct out of :total questions correctly'))
    };

    document.addEventListener("DOMContentLoaded", function () {
        let quizItems = document.querySelectorAll('.quiz-item');
        let currentIndex = 0;
        const totalQuestions = quizItems.length;
        let correctAnswers = 0;
        let wrongAnswers = 0;
        const questionImage = document.getElementById('question-img');
        const timerElement = document.getElementById('timer');
        const timerBar = document.getElementById('timer-bar');
        let countdownTimer;

        function startTimer() {
            let timeLeft = 15;
            let progressWidth = 100;

            function updateTimer() {
                timerElement.textContent = `${timeLeft}s`;
                progressWidth = (timeLeft / 15) * 100;
                timerBar.style.width = `${progressWidth}%`;

                if (timeLeft <= 0) {
                    clearInterval(countdownTimer);
                    document.getElementById("wrongSound").play();
                    wrongAnswers++;
                    triggerImageShake();

                    setTimeout(() => {
                        showNextQuestion();
                    }, 1000);
                }

                timeLeft--;
            }

            updateTimer();
            countdownTimer = setInterval(updateTimer, 1000);
        }

        function triggerImageShake() {
            questionImage.classList.add('shake');
            setTimeout(() => {
                questionImage.classList.remove('shake');
            }, 1000);
        }

        function showNextQuestion() {
            clearInterval(countdownTimer);

            if (currentIndex < quizItems.length - 1) {
                $(quizItems[currentIndex]).fadeOut(500, function () {
                    currentIndex++;
                    $(quizItems[currentIndex]).fadeIn(500);
                    startTimer();
                });
            } else {
                setTimeout(() => {
                    const passingScore = Math.ceil(totalQuestions / 2);



                    if (correctAnswers >= passingScore) {
    document.getElementById("finalText").innerText = translations.quiz_success
        .replace(':correct', correctAnswers)
        .replace(':total', totalQuestions);
    document.getElementById("finalPopup").style.display = "flex";
    document.getElementById("fireworksSound").play();
} else {
    document.getElementById("failureText").innerText = translations.quiz_failure
        .replace(':correct', correctAnswers)
        .replace(':total', totalQuestions);
    document.getElementById("failurePopup").style.display = "flex";
}


                }, 1000);
            }
        }

        startTimer();

        document.querySelectorAll('.option-clickable').forEach(option => {
            option.addEventListener('click', function () {
                clearInterval(countdownTimer);
                const parent = this.closest('.quiz-item');
                const feedback = parent.querySelector('.feedback');
                const selectedValue = this.getAttribute('data-value')?.trim().toLowerCase();
                const correctValue = this.getAttribute('data-correct')?.trim().toLowerCase();

                if (selectedValue === correctValue) {
                    feedback.innerHTML = `<span class="text-success">${translations.correct}</span> 🌟`;
                    document.getElementById("correctSound").play();
                    correctAnswers++;

                    const imageElement = this.querySelector('img');
                    const textElement = this.querySelector('.option-text');
                    document.getElementById("popupImage").src = imageElement.src;
                    document.getElementById("popupText").innerText = textElement.innerText;


                    document.getElementById("successPopup").style.display = 'flex';

                    setTimeout(() => {
                        document.getElementById("successPopup").style.display = 'none';
                        showNextQuestion();
                    }, 3000);

                } else {
                    feedback.innerHTML = `<span class="text-danger">${translations.wrong}</span> 😞`;
                    document.getElementById("wrongSound").play();
                    wrongAnswers++;

                    setTimeout(() => {
                        showNextQuestion();
                    }, 3000);
                }
            });
        });
    });
</script> --}}



{{-- <script>
    const translations = {
        correct: @json(\App\Helpers\TranslationHelper::translate('Correct answer!')),
        wrong: @json(\App\Helpers\TranslationHelper::translate('Wrong answer!'))
    };

    document.addEventListener("DOMContentLoaded", function () {
        let quizItems = document.querySelectorAll('.quiz-item');
        let currentIndex = 0;
        const totalQuestions = quizItems.length;
        let correctAnswers = 0;
        let wrongAnswers = 0;
        const questionImage = document.getElementById('question-img');
        const timerElement = document.getElementById('timer');
        const timerBar = document.getElementById('timer-bar');
        let countdownTimer;

        function startTimer() {
            let timeLeft = 15;
            let progressWidth = 100;

            function updateTimer() {
                timerElement.textContent = `${timeLeft}s`;
                progressWidth = (timeLeft / 15) * 100;
                timerBar.style.width = `${progressWidth}%`;

                if (timeLeft <= 0) {
                    clearInterval(countdownTimer);
                    document.getElementById("wrongSound").play();
                    wrongAnswers++;
                    triggerImageShake();

                    setTimeout(() => {
                        showNextQuestion();
                    }, 1000);
                }

                timeLeft--;
            }

            updateTimer();
            countdownTimer = setInterval(updateTimer, 1000);
        }

        function triggerImageShake() {
            questionImage.classList.add('shake');
            setTimeout(() => {
                questionImage.classList.remove('shake');
            }, 1000);
        }

     function showNextQuestion() {
    clearInterval(countdownTimer);

    if (currentIndex < quizItems.length - 1) {
        $(quizItems[currentIndex]).fadeOut(500, function () {
            currentIndex++;
            $(quizItems[currentIndex]).fadeIn(500);
            startTimer();
        });
    } else {
        setTimeout(() => {
            const passingScore = Math.ceil(totalQuestions / 2);

            if (correctAnswers >= passingScore) {
                document.getElementById("finalText").innerText =
                    `🎉 انتهيت من المسابقة!\nأجبت بشكل صحيح على ${correctAnswers} من ${totalQuestions} سؤال 🎊`;
                document.getElementById("finalPopup").style.display = "flex";
                document.getElementById("fireworksSound").play();
            } else {
                document.getElementById("popupText").innerText =
                    `❌ انتهيت من المسابقة!\nأجبت ${correctAnswers} من ${totalQuestions} سؤال 😞`;
                document.getElementById("failurePopup").style.display = "flex";
            }
        }, 1000);
    }
}


        startTimer();

        document.querySelectorAll('.option-clickable').forEach(option => {
            option.addEventListener('click', function () {
                clearInterval(countdownTimer);
                const parent = this.closest('.quiz-item');
                const feedback = parent.querySelector('.feedback');
                const selectedValue = this.getAttribute('data-value')?.trim().toLowerCase();
                const correctValue = this.getAttribute('data-correct')?.trim().toLowerCase();

                if (selectedValue === correctValue) {
                    feedback.innerHTML = `<span class="text-success">${translations.correct}</span> 🌟`;
                    document.getElementById("correctSound").play();
                    correctAnswers++;

                    const imageElement = this.querySelector('img');
                    const textElement = this.querySelector('.option-text');
                    document.getElementById("popupImage").src = imageElement.src; // Show the correct option's image
                    document.getElementById("popupText").innerText = textElement.innerText;
                    document.getElementById("successPopup").style.display = 'flex';

                    setTimeout(() => {
                        document.getElementById("successPopup").style.display = 'none';
                        showNextQuestion();
                    }, 3000);

                } else {
                    feedback.innerHTML = `<span class="text-danger">${translations.wrong}</span> 😞`;
                    document.getElementById("wrongSound").play();
                    wrongAnswers++;
                    setTimeout(() => {
                        showNextQuestion();
                    }, 3000);
                }
            });
        });
    });
</script> --}}

{{-- <script>
    const translations = {
        correct: @json(\App\Helpers\TranslationHelper::translate('Correct answer!')),
        wrong: @json(\App\Helpers\TranslationHelper::translate('Wrong answer!'))
    };

    document.addEventListener("DOMContentLoaded", function () {
        let quizItems = document.querySelectorAll('.quiz-item');
        let currentIndex = 0;
        const totalQuestions = quizItems.length;
        let correctAnswers = 0;
        let wrongAnswers = 0;
        const questionImage = document.getElementById('question-img');
        const timerElement = document.getElementById('timer');
        const timerBar = document.getElementById('timer-bar');
        let countdownTimer;

        function startTimer() {
            let timeLeft = 15;
            let progressWidth = 100;

            function updateTimer() {
                timerElement.textContent = `${timeLeft}s`;
                progressWidth = (timeLeft / 15) * 100;
                timerBar.style.width = `${progressWidth}%`;

                if (timeLeft <= 0) {
                    clearInterval(countdownTimer);
                    document.getElementById("wrongSound").play();
                    wrongAnswers++;
                    triggerImageShake();

                    setTimeout(() => {
                        showNextQuestion();
                    }, 1000);
                }

                timeLeft--;
            }

            updateTimer();
            countdownTimer = setInterval(updateTimer, 1000);
        }

        function triggerImageShake() {
            questionImage.classList.add('shake');
            setTimeout(() => {
                questionImage.classList.remove('shake');
            }, 1000);
        }

        function showNextQuestion() {
            clearInterval(countdownTimer);

            if (currentIndex < quizItems.length - 1) {
                $(quizItems[currentIndex]).fadeOut(500, function () {
                    currentIndex++;
                    $(quizItems[currentIndex]).fadeIn(500);
                    startTimer();
                });
            } else {
                setTimeout(() => {
                    if (correctAnswers < 5) {
                        document.getElementById("finalText").innerText =
                            `❌ انتهيت من المسابقة!\nأجبت بشكل خاطئ على أكثر من مره أسئلة 😞`;
                        document.getElementById("failurePopup").style.display = "flex";
                    } else {
                        document.getElementById("finalText").innerText =
                            `🎉 انتهيت من المسابقة!\nأجبت بشكل صحيح على ${correctAnswers} من ${totalQuestions} سؤال 🎊`;
                        document.getElementById("finalPopup").style.display = "flex";
                        document.getElementById("fireworksSound").play();
                    }
                }, 1000);
            }
        }

        startTimer();

        document.querySelectorAll('.option-clickable').forEach(option => {
            option.addEventListener('click', function () {
                clearInterval(countdownTimer);
                const parent = this.closest('.quiz-item');
                const feedback = parent.querySelector('.feedback');
                const selectedValue = this.getAttribute('data-value')?.trim().toLowerCase();
                const correctValue = this.getAttribute('data-correct')?.trim().toLowerCase();

                if (selectedValue === correctValue) {
                    feedback.innerHTML = `<span class="text-success">${translations.correct}</span> 🌟`;
                    document.getElementById("correctSound").play();
                    correctAnswers++;

                    const imageElement = this.querySelector('img');
                    const textElement = this.querySelector('.option-text');
                    document.getElementById("popupImage").src = imageElement.src; // Show the correct option's image
                    document.getElementById("popupText").innerText = textElement.innerText;
                    document.getElementById("successPopup").style.display = 'flex';

                    setTimeout(() => {
                        document.getElementById("successPopup").style.display = 'none';
                        showNextQuestion();
                    }, 3000);

                } else {
                    feedback.innerHTML = `<span class="text-danger">${translations.wrong}</span> 😞`;
                    document.getElementById("wrongSound").play();
                    wrongAnswers++;
                    setTimeout(() => {
                        showNextQuestion();
                    }, 3000);
                }
            });
        });
    });
</script> --}}
@endpush

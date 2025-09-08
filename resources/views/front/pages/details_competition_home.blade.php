@extends('front.layouts.app')

@section('content')
<main>
    <section class="jop-main">
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

            <div class="col-md-8" style="padding: 10px; margin-left: 2px; background:#F7F0E9;">
                <div class="workshop-details card-2 text-center">
                    <div class="titel-main-workshop">
                        <h2 class="fw-bold">{{ $details_competition->name }}</h2>
                        <p class="description">{!! $details_competition->description !!}</p>
                        <div class="main-btn-start">
                            <a href="{{ route('details-competition', ['id' => $details_competition->id]) }}">
                                start
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</main>

<audio id="correctSound" src="{{ asset('sounds/correct.mp3') }}"></audio>
<audio id="wrongSound" src="{{ asset('sounds/wrong.mp3') }}"></audio>

@endsection

@push('js')
<script>
    const translations = {
        correct: @json(\App\Helpers\TranslationHelper::translate('Correct answer!')),
        wrong: @json(\App\Helpers\TranslationHelper::translate('Wrong answer!'))
    };

    function launchConfetti() {
        const confettiCanvas = document.createElement("canvas");
        confettiCanvas.width = window.innerWidth;
        confettiCanvas.height = window.innerHeight;
        confettiCanvas.style.position = "fixed";
        confettiCanvas.style.top = "0";
        confettiCanvas.style.left = "0";
        confettiCanvas.style.pointerEvents = "none";
        document.body.appendChild(confettiCanvas);

        const ctx = confettiCanvas.getContext("2d");
        const confettiParticles = [];
        const confettiCount = 600;
        const gravity = 0.2;
        const duration = 20000;

        function createConfetti() {
            for (let i = 0; i < confettiCount; i++) {
                confettiParticles.push({
                    x: Math.random() * window.innerWidth,
                    y: Math.random() * -50,
                    size: Math.random() * 10 + 5,
                    speedY: Math.random() * 4 + 1,
                    speedX: (Math.random() - 0.5) * 4,
                    rotation: Math.random() * 360,
                    rotationSpeed: (Math.random() - 0.5) * 5,
                    color: `hsl(${Math.random() * 360}, 100%, 50%)`,
                    opacity: 1
                });
            }
        }

        function animateConfetti() {
            ctx.clearRect(0, 0, confettiCanvas.width, confettiCanvas.height);

            confettiParticles.forEach((p, index) => {
                p.y += p.speedY;
                p.x += p.speedX;
                p.rotation += p.rotationSpeed;
                p.speedY += gravity;

                ctx.save();
                ctx.translate(p.x, p.y);
                ctx.rotate(p.rotation * Math.PI / 180);
                ctx.fillStyle = p.color;
                ctx.globalAlpha = p.opacity;
                ctx.fillRect(-p.size / 2, -p.size / 2, p.size, p.size);
                ctx.restore();

                if (p.y > window.innerHeight) p.opacity -= 0.02;
            });

            if (confettiParticles.some(p => p.opacity > 0)) {
                requestAnimationFrame(animateConfetti);
            } else {
                document.body.removeChild(confettiCanvas);
            }
        }

        createConfetti();
        animateConfetti();

        setTimeout(() => {
            confettiParticles.forEach(p => p.opacity -= 0.02);
        }, duration);
    }

    document.addEventListener("DOMContentLoaded", function () {
        let quizItems = document.querySelectorAll('.quiz-item');
        let currentIndex = 0;

        function showNextQuestion() {
            if (currentIndex < quizItems.length - 1) {
                $(quizItems[currentIndex]).fadeOut(500, function () {
                    currentIndex++;
                    $(quizItems[currentIndex]).fadeIn(500);
                });
            } else {
                setTimeout(() => {
                    alert("🎉 انتهيت من المسابقة! أحسنت 🎊");
                }, 500);
            }
        }

        document.querySelectorAll('.option-clickable').forEach(option => {
            option.addEventListener('click', function () {
                const parent = this.closest('.quiz-item');
                const feedback = parent.querySelector('.feedback');
                const selectedValue = this.getAttribute('data-value')?.trim();
                const correctValue = this.getAttribute('data-correct')?.trim();

                if (selectedValue === correctValue) {
                    feedback.innerHTML = `<span class="text-success">${translations.correct}</span> 🌟`;
                    document.getElementById("correctSound").play();
                    launchConfetti();
                } else {
                    feedback.innerHTML = `<span class="text-danger">${translations.wrong}</span> 😞`;
                    document.getElementById("wrongSound").play();
                }

                setTimeout(() => {
                    showNextQuestion();
                }, 3000);
            });
        });
    });
</script>
@endpush

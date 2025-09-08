@extends('front.layouts.app')
@section('content')
    <main>
        <section class="jop-main">
            <div class="row">

                <section class="jop-main">
                    <div class="row">
                        <div class="col-md-4 jop">
                            <div class="oresh">
                                <br>
                            </div>
                            <button onclick="window.location.href='{{ route('Workshops') }}'"
                                class="position-absolute top-0 end-0 m-2 border-0 bg-transparent btn-cols"
                                style="z-index: 9999999999999;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </section>

                <div class="col-md-8" style="padding: 10px; margin-left: 2px;">


                    {{--

                    <div class="workshop-details card p-4 shadow-sm text-center">
                        <div class="text-center mb-3">
                            <img src="{{ $details_workshops->getFirstMediaUrl('workshops_image') }}"
                                class="img-fluid rounded-circle shadow"
                                style="width: 150px; height: 150px; object-fit: cover;"
                                alt="{{ $details_workshops->name }}">
                        </div>
                        <h2 style="color: rgba(var(--bs-success-rgb), var(--bs-text-opacity)) !important;"
                            class="fw-bold text-primary">{{ $details_workshops->name }}</h2>
                        <p class="description"> {!! $details_workshops->description !!}</p>
                    </div> --}}

                    <div class="workshop-detailss card p-4 shadow-sm text-center">
                        <div class="text-center mb-3">
                            <img src="{{ $details_workshops->getFirstMediaUrl('workshops_image') }}"
                                class="img-fluid rounded-circle shadow"
                                style="width: 150px; height: 150px; object-fit: cover;"
                                alt="{{ $details_workshops->name }}">
                        </div>
                        <h2 style="color: rgba(var(--bs-success-rgb), var(--bs-text-opacity)) !important;"
                            class="fw-bold text-primary">{{ $details_workshops->name }}</h2>
                        <p class="description"> {!! $details_workshops->description !!}</p>
                    </div>

                    @if ($details_workshops->getFirstMediaUrl('pdf'))
                        <div id="pdf-container" data-pdf-url="{{ $details_workshops->getFirstMediaUrl('pdf') }}"
                            class="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                            <div class="container py-4">
                                <div class="card shadow p-4 mb-4">
                                    <div
                                        class="row align-items-center main-row {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : '' }}">

                                        {{-- <div class="col-lg-6 d-flex align-items-center gap-3">
                        <button id="print-pdf" class="btn btn-secondary">
                            {{ app()->getLocale() == 'ar' ? 'طباعة' : 'Print' }}
                        </button>
                        <button id="download-pdf" class="btn btn-success">
                            {{ app()->getLocale() == 'ar' ? 'تحميل' : 'Download' }}
                        </button>
                    </div> --}}


                                        <div class="col-lg-6 text-end">
                                            <div class="controls d-flex align-items-center justify-content-end gap-2">
                                                <button id="prev-page" class="btn btn-warning">
                                                    {{ app()->getLocale() == 'ar' ? 'السابق' : 'Previous' }}
                                                </button>
                                                <select class="form-select w-auto" id="page-select"></select>
                                                <button id="next-page" class="btn btn-primary">
                                                    {{ app()->getLocale() == 'ar' ? 'التالي' : 'Next' }}
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div id="loading-overlay">
                                    <div class="spinner-border text-primary" role="status"></div>
                                </div>

                                <div id="flipbook" class="flipbook shadow rounded-3 overflow-hidden"></div>
                            </div>
                        </div>
                    @endif



















                    <div class="registration-form card p-4 mt-4 shadow-sm">
                        <h3 class="text-center mb-3 text-success">📌
                            {{ \App\Helpers\TranslationHelper::translate('Register for the workshop now!') }}</h3>

                        @if (session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('workshops.register', $details_workshops->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="workshops_id" value="{{ $details_workshops->id }}">

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">👤
                                    {{ \App\Helpers\TranslationHelper::translate('Full Name') }}</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label fw-bold">📞
                                    {{ \App\Helpers\TranslationHelper::translate('Phone Number') }}</label>
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">📧
                                    {{ \App\Helpers\TranslationHelper::translate('Email Address') }}</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="age" class="form-label fw-bold">🎂
                                    {{ \App\Helpers\TranslationHelper::translate('Age') }}</label>
                                <input type="number" name="age" class="form-control @error('age') is-invalid @enderror"
                                    value="{{ old('age') }}">
                                @error('age')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success w-100">✅
                                {{ \App\Helpers\TranslationHelper::translate('Register Now') }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection


@push('js')
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@3.4.120/build/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @if ($details_workshops->getFirstMediaUrl('pdf'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const pdfUrl = document.getElementById("pdf-container").getAttribute("data-pdf-url") + '?v=' +
                new Date().getTime();
                const isRTL = document.getElementById("pdf-container").classList.contains("rtl");

                const pdfjsLib = window['pdfjs-dist/build/pdf'];
                pdfjsLib.GlobalWorkerOptions.workerSrc =
                    'https://cdn.jsdelivr.net/npm/pdfjs-dist@3.4.120/build/pdf.worker.min.js';

                const pageFlip = new St.PageFlip(document.getElementById("flipbook"), {
                    width: 500,
                    height: 700,
                    size: "stretch",
                    minWidth: 315,
                    maxWidth: 1000,
                    minHeight: 420,
                    maxHeight: 1350,
                    drawShadow: true,
                    flippingTime: 800,
                    useMouseEvents: true,
                    autoSize: true,
                    maxShadowOpacity: 0.5,
                    showCover: false,
                    mobileScrollSupport: true,
                    direction: isRTL ? 'rtl' : 'ltr'
                });

                pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
                    const loadPage = pageNum => {
                        return pdf.getPage(pageNum).then(page => {
                            const viewport = page.getViewport({
                                scale: 2
                            });
                            const canvas = document.createElement("canvas");
                            canvas.width = viewport.width;
                            canvas.height = viewport.height;
                            const context = canvas.getContext("2d");

                            return page.render({
                                    canvasContext: context,
                                    viewport: viewport
                                }).promise
                                .then(() => canvas.toDataURL());
                        });
                    };

                    const promises = [];
                    for (let i = 1; i <= pdf.numPages; i++) {
                        promises.push(loadPage(i));
                    }

                    Promise.all(promises).then(imageUrls => {
                        if (isRTL) imageUrls.reverse();

                        pageFlip.loadFromImages(imageUrls);
                        if (isRTL) pageFlip.flip(imageUrls.length - 1);

                        document.getElementById('loading-overlay').style.display = 'none';

                        const select = document.getElementById("page-select");
                        const totalPages = imageUrls.length;
                        for (let i = 0; i < totalPages; i += 2) {
                            const option = document.createElement("option");
                            const startPage = i + 1;
                            const endPage = Math.min(i + 2, totalPages);
                            option.value = i;
                            option.text = `صفحات ${startPage}-${endPage}`;
                            select.appendChild(option);
                        }

                        document.getElementById("next-page").addEventListener("click", () => pageFlip
                            .flipNext());
                        document.getElementById("prev-page").addEventListener("click", () => pageFlip
                            .flipPrev());

                        select.addEventListener("change", function() {
                            pageFlip.flip(parseInt(this.value));
                        });

                        pageFlip.on("flip", (e) => {
                            const pageIndex = pageFlip.getCurrentPageIndex();
                            const currentPair = Math.floor(pageIndex / 2);
                            select.selectedIndex = currentPair;
                        });
                    });
                });

                document.getElementById("print-pdf")?.addEventListener("click", function() {
                    const win = window.open(pdfUrl, '_blank');
                    win.print();
                });

                document.getElementById("download-pdf")?.addEventListener("click", function() {
                    const link = document.createElement("a");
                    link.href = pdfUrl;
                    link.download = "Workshop_File.pdf";
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                });
            });
        </script>
    @endif
@endpush

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['url']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['url']); ?>
<?php foreach (array_filter((['url']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($url): ?>
    <div id="pdf-container" data-pdf-url="<?php echo e($url); ?>"
        class="<?php echo e(app()->getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>">
        <div class="container py-4">
            <div id="loading-overlay">
                <div class="spinner-border text-primary" role="status"></div>
            </div>
            <div id="flipbook" class="flipbook shadow rounded-3 overflow-hidden"></div>
        </div>
    </div>
<?php endif; ?>


<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@3.4.120/build/pdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                if (isRTL) {
                    imageUrls.reverse();
                }

                pageFlip.loadFromImages(imageUrls);

                if (isRTL) {
                    pageFlip.flip(imageUrls.length - 1);
                }

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
            link.download = "file:///C:/Users/Code/Downloads/pdf-test.pdf";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    });
</script>
<?php /**PATH C:\laragon\www\sameh-elearning\resources\views/components/pdf-viewer.blade.php ENDPATH**/ ?>
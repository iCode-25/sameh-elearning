@extends('front.layouts.app')
@section('content')
    <!-- TITLE BANNER START -->
    <section class="title-banner pb-80">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <div class="title-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="title-content">
                                    <h1 class="dark-gray fw-700">{{ \App\Helpers\TranslationHelper::translate('Blogs') }}
                                    </h1>
                                </div>
                                <div class="img-block">
                                    <img src="{{ asset('front/assets/media/user/star.png') }}" alt="star">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-sm-block d-none">
                                <div class="title-image">
                                    <img src="{{ setting('image_banner_page_blog_web', 'en') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TITLE BANNER END -->

    {{-- @include('front.components.blogs', ['blogs' => $blogs]) --}}

    <div id="blog-data">
        @include('front.pages.blogs_data')
    </div>

    <div class="ajax-load text-center" style="display:none">
        <p class="sec-text">جاري تحميل المزيد...</p>
    </div>
@endsection

@push('js')
    <script>
        let page = 1;
        let loading = false;
        let hasMore = true;

        async function loadBlogs() {
            if (loading || !hasMore) return;
            loading = true;
            document.querySelector('.ajax-load').style.display = 'block';

            try {
                const res = await fetch(`{{ route('site.blogs') }}?page=${page + 1}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                const data = await res.text();

                if (data.trim().length > 0) {
                    document.querySelector('#blog-data').insertAdjacentHTML('beforeend', data);
                    page++;
                } else {
                    hasMore = false;
                }
            } catch (err) {
                console.error('Error fetching blogs:', err);
            }

            document.querySelector('.ajax-load').style.display = 'none';
            loading = false;
        }

        // عند التمرير لآخر الصفحة
        window.addEventListener('scroll', () => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
                loadBlogs();
            }
        });
    </script>
@endpush

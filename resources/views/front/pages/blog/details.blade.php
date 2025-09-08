@extends('front.layouts.app')



@section('title', $blog->meta_title ?? $blog->title)


{{-- @section('meta')
    <meta name="title" content="{{ $blog->meta_title ?? $blog->title }}">
    <meta name="description" content="{{ $blog->meta_description ?? 'Default description' }}">
    <meta property="og:title" content="{{ $blog->meta_title ?? $blog->title }}">
    <meta property="og:description" content="{{ $blog->description ?? 'Default description' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
@endsection  --}}
@section('meta')
    @if(isset($blog->meta_title))
        <meta name="title" content="{{ $blog->meta_title }}">
    @else
        <meta name="title" content="">
    @endif

    @if(isset($blog->meta_description))
        <meta name="description" content="{{ $blog->meta_description }}">
    @else
        <meta name="description" content="">
    @endif

    @if(isset($blog->meta_title))
        <meta property="og:title" content="{{ $blog->meta_title }}">
    @else
        <meta property="og:title" content="">
    @endif

    @if(isset($blog->description))
        <meta property="og:description" content="{{ $blog->description }}">
    @else
        <meta property="og:description" content="">
    @endif

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
@endsection



@section('content')
    <!-- blog-details area start  -->
    <div class="postbox-area pt-120 pb-120">
        <div class="container">
            <div class="row">

                <div style="padding: 20px 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); background-color: #fff; margin-bottom: 40px;"
                class="col-xl-8 col-lg-8">
                <div class="postbox-details-wrapper">
                    @if(isset($blog))
                    <div class="postbox-thumb-box">
                        <!-- الصورة الرئيسية للمقال -->
                        <div class="postbox-main-thumb mb-35">
                            <img src="{{ $blog->getFirstMediaUrl('blogs_image') }}" alt="{{ $blog->name }}"
                                style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;" />
                        </div>

                        <!-- محتوى المقال -->
                        <div style="direction: rtl" class="postbox-content-box">
                            <div class="postbox-meta mb-20" style="font-size: 14px; color: #666;">
                                <span><i class="fa-regular fa-folder-open"></i> {{ $blog->categories->name ?? 'عام' }}</span>
                            </div>

                            <h4 class="postbox-title mb-25" style="font-size: 24px; color: #333;">
                                <a href="{{ route('article', ['slug' => $blog->slug]) }}" style="text-decoration: none; color: #333;">
                                    {{ $blog->name }}
                                </a>
                            </h4>

                            <p style="color: #555; line-height: 1.6;">
                                {!! ($blog->description) !!}
                            </p>
                        </div>

                        <!-- صور إضافية إن وجدت -->
                        @if($blog->additional_images)
                        <div class="row mb-40 mt-30">
                            @foreach($blog->additional_images as $image)
                            <div class="col-sm-6 mb-20">
                                <div class="postbox-details-thumb">
                                    <img src="{{ $image->getUrl() }}" alt="Additional Image"
                                        style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;" />
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <!-- عرض الوسوم إن وجدت -->
                        @if(isset($blog->tags) && $blog->tags->count() > 0)
                        <div class="postbox-tag-box mb-45 mt-20">
                            <div class="postbox-tag d-flex align-items-center">
                                <h3 class="postbox-tag-title" style="margin-right: 10px;">Tags:</h3>
                                <div class="postbox-tag-content tagcloud">
                                    @foreach($blog->tags as $tag)
                                    <a href="{{ route('tag.index', $tag['slug']) }}" class="mr-10 mb-10"
                                        style="display: inline-block; background-color: #f0f0f0; color: #333; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                        {{ $tag['name'] }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- مشاركة على وسائل التواصل الاجتماعي -->
                        <div class="postbox-share d-flex align-items-center justify-content-end mt-20">
                            <h3 class="postbox-tag-title" style="margin-right: 10px;">Share:</h3>
                            <div class="postbox-share-content" style="display: flex; gap: 15px;">
                                <a class="linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('article', ['slug' => $blog->slug])) }}" target="_blank" style="color: #0077b5;">
                                    <i class="fa-brands fa-linkedin" style="font-size: 20px;"></i>
                                </a>
                                <a class="pinterest" href="https://pinterest.com/pin/create/button/?url={{ urlencode(route('article', ['slug' => $blog->slug])) }}" target="_blank" style="color: #bd081c;">
                                    <i class="fa-brands fa-pinterest" style="font-size: 20px;"></i>
                                </a>
                                <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('article', ['slug' => $blog->slug])) }}" target="_blank" style="color: #1877f2;">
                                    <i class="fa-brands fa-facebook" style="font-size: 20px;"></i>
                                </a>
                                <a class="twitter" href="https://twitter.com/intent/tweet?url={{ urlencode(route('article', ['slug' => $blog->slug])) }}&text={{ $blog->name }}" target="_blank" style="color: #1da1f2;">
                                    <i class="fa-brands fa-twitter" style="font-size: 20px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    <p>{{ \App\Helpers\TranslationHelper::translate('No articles for this category.') }}</p>
                    @endif
                </div>
            </div>


                <div class="col-xl-4 col-lg-4 order-lg-0 order-md-1">
                    <div class="sidebar-right">

                        {{-- <div class="sidebar-widget mb-45">
                            <h4 class="sidebar-widget-title mb-35">{{ setting('Search_Here_title', app()->getLocale()) }}</h4>
                            <form action="{{ route('searchCategory') }}" method="GET">
    <div class="sidebar-search-box p-relative">
        <div class="sidebar-search-input">
            <input type="text" placeholder="Search here" name="search" required />
        </div>
        <div class="sidebar-search-button">
            <button type="submit">
                <i class="fa-sharp fa-light fa-magnifying-glass"></i>
            </button>
        </div>
    </div>
</form>
                        </div> --}}

                        <div class="sidebar-widget mb-45">
                            <h4 class="sidebar-widget-title mb-40">{{ setting('Category_title', app()->getLocale()) }}</h4>
                            <div class="sidebar-widget-list">
                                @foreach ($categories as $category)
                                    <a href="{{ route('blogsCategory', $category->slug) }}">
                                        <i class="fa-regular fa-arrow-right-long"></i>{{ $category->name }}</a>
                                @endforeach
                                {{-- <a class="active" href="{{ route('site.blog-details', $blog->id) }}"
                                  ><i class="fa-regular fa-arrow-right-long"></i>Flight
                                  booking</a
                                >
                                <a href="{{ route('site.blog-details', $blog->id) }}"
                                  ><i class="fa-regular fa-arrow-right-long"></i>Tour
                                  guides</a
                                >
                                <a href="{{ route('site.blog-details', $blog->id) }}"
                                  ><i class="fa-regular fa-arrow-right-long"></i>Cleaner</a
                                >
                                <a href="{{ route('site.blog-details', $blog->id) }}"
                                  ><i class="fa-regular fa-arrow-right-long"></i>Cruise
                                  booking</a
                                >
                                <a href="{{ route('site.blog-details', $blog->id) }}"
                                  ><i class="fa-regular fa-arrow-right-long"></i>Destination
                                  wedding</a
                                > --}}

                            </div>
                        </div>


                        <div class="sidebar-widgemd mb-45">
                            <h4 class="sidebar-widget-title mb-40">{{ setting('Recent_blog_title', app()->getLocale()) }}
                            </h4>
                            <div class="sidebar-widget-content">
                                <div class="sidebar-widget-post">


                                    @foreach ($blogs as $blog)
                                        <div style="background-color: #fff; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1); padding: 10px; border-radius:12px; gap: 20px "
                                            class="rc-post mb-15 d-flex align-items-center">
                                            <div class="rc-post-thumb mr-20">
                                                <a href="{{ route('article', ['slug' => $blog->slug]) }}">
                                                    <img src="{{ $blog->getFirstMediaUrl('blogs_image', 'blog-details') }}"
                                                        alt="{{ $blog->name }}"
                                                        style="width: 80px; height: 80px; object-fit: cover;" />
                                                </a>
                                            </div>
                                            <div class="rc-post-content">
                                                <div class="rc-meta d-flex mb-10">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                    <span>{{ $blog->created_at->format('d-m-Y') }}</span>
                                                </div>
                                                <h3 class="rc-post-title">
                                                    <a href="{{ route('article', $blog->slug) }}">{{ $blog->name }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        {{-- <div class="sidebar-widget">
                          <div class="sideba-widge-title-box">
                            <h3 class="sidebar-widget-title sm-border mb-35">
                              {{ setting('Popular_Tag_title', app()->getLocale()) }}
                            </h3>
                          </div>
                          <div class="sidebar-widget-content">
                            <div class="tagcloud">
                              <a href="#">Flight booking</a>
                              <a href="#">Global</a>
                              <a href="#">Nexus</a>
                              <a href="#">Freight</a>
                              <a href="#">Opti Ware</a>
                              <a href="#">Elite Trans</a>
                              <a href="#">Precision</a>
                            </div>
                          </div>
                        </div>
                         --}}


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-details area end  -->

    <!-- subdcribe-area-start -->
    <div class="tr-subscribe-area z-index-2">
        <div class="container">
            <div class="tr-subscribe-bg p-relative fix">
                <div class="tr-subscribe-img d-none d-lg-block">

                    <img src="{{ setting('Subscribe_image', 'en') }}" alt="" />
                </div>
                <div class="tr-subscribe-circle d-none d-lg-block">
                    <span></span>
                </div>
                <div class="row">
                    <div class="offset-xl-5 offset-lg-5 col-xl-7 col-lg-7">
                        <div class="tr-subscribe-tittle-box mb-35">
                            <h3 class="tr-section-title mb-20 text-white">
                                <br />
                                {{ setting('section_five_title_one', app()->getLocale()) }}
                            </h3>
                            <p>
                                {!! setting('section_five_description_one', app()->getLocale()) !!}
                            </p>
                        </div>
                        <div class="tr-subscribe-form">
                            <form action="#">
                                <div class="tr-subscribe-input p-relative">
                                    <input type="text"
                                        placeholder="{{ \App\Helpers\TranslationHelper::translate('Your email...') }}" />
                                    <button class="tr-subscribe-button tr-btn-green light-green" type="submit">
                                        {{ \App\Helpers\TranslationHelper::translate('Subscribe ') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subdcribe-area-end -->
@endsection

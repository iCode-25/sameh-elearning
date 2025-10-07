@extends('front.layouts.app', ['title' => 'blogs'])

@section('content')

 <main>
        <!-- hero section -->
        <section class="hero-section">
            <div class="overlay"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center">
                        <div class="text-hero-7">
                            <h2 data-aos="zoom-in" data-aos-duration="1000">
                                 {{ \App\Helpers\TranslationHelper::translate('Couronne Royale News and video') }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="detels-vido">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">


                    @foreach ($blogs as $blog)
                        <div class="main-detels pt-3">
                            <div class="img-detels-main">
                                <img src="{{ $blog->getFirstMediaUrl('blogs_image') }}" alt="{{ $blog->name }}">
                            </div>
                            <div class="text-detels">
                                <h4 class="postbox-title">
                                    {{ $blog->name }}
                                 </h4>
                                <p>
                                  {!! $blog->description !!}
                                </p>
                            </div>
                        </div>
                         @endforeach




                    </div>
                    <div class="col-md-3" style="width: 30%;">

                         <div class="sidebar-widget mb-45">
                            <h4 class="sidebar-widget-title mb-40">{{ \App\Helpers\TranslationHelper::translate('Couronne Royale News and video') }}</h4>
                            <div class="sidebar-widget-list">
                                <a href="{{route('regular-card')}}">
                                    <div class="icon-wsem">
                                        <i class="fa fa-arrow-right-long wsem"></i>
                                    </div>
                                {{ \App\Helpers\TranslationHelper::translate('Regular User Cards') }}
                                </a>
                                <a href="{{route('royal-card')}}">
                                    <div class="icon-wsem">
                                        <i class="fa fa-arrow-right-long wsem"></i>
                                    </div>
                                      {{ \App\Helpers\TranslationHelper::translate('Royal Cards') }}
                                </a>
                                <a href="{{route('imperial-card')}}">
                                    <div class="icon-wsem">
                                        <i class="fa fa-arrow-right-long wsem"></i>
                                    </div>
                                      {{ \App\Helpers\TranslationHelper::translate('Imperial Cards') }}
                                </a>
                            </div>
                        </div>

                        {{-- <div class="sidebar-widget mb-45">
                            <h4 class="sidebar-widget-title mb-40">أقسام العملات الرقمية</h4>
                            <div class="sidebar-widget-list">
                                @foreach ($categories as $category)
                                <a href="#">
                                    <div class="icon-wsem">
                                        <i class="fa fa-arrow-right-long wsem"></i>
                                    </div>
                                   {{ $category->category_card }}
                                </a>
                                @endforeach
                            </div>
                        </div> --}}

                         {{-- categories --}}
                                    {{-- @foreach ($categories as $category)
                                    <a
                                        href="{{ route('blogsCategory', ['slug' => $category->slug, 'locale' => app()->getLocale()]) }}"><i
                                            class="fa-regular fa-arrow-right-long"></i>{{ $category->name }}</a>
                                @endforeach --}}

                        <div class="sidebar-widgemd mb-45">
                            <h4 class="sidebar-widget-title mb-40">{{ \App\Helpers\TranslationHelper::translate('Latest Videos on Cryptocurrencies') }}</h4>
                            <div class="sidebar-widget-content">
                                <div class="sidebar-widget-post">

                                    @foreach ($news as $new)
                                    <div style="background-color: #a42249; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1); padding: 10px; border-radius:12px; gap: 20px" class="rc-post mb-15 d-flex align-items-center">
                                        {{-- <div class="rc-post-thumb mr-20">
                                            <a href="#">
                                                <img src="./assets/images/king.jpg" alt="" style="width: 80px; height: 80px; object-fit: cover;">
                                            </a>
                                        </div> --}}
                                         <video width="80%" height="150" controls>
            <source src="{{ $new->getFirstMediaUrl('newsimage_newsnews_video') }}" type="video/mp4">
        </video>
                                        <div class="rc-post-content">
                                            {{-- <div class="rc-meta d-flex mb-10">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <span>{{ $new->created_at->format('Y-m-d') }}</span>
                                            </div> --}}
                                            <h3 class="rc-post-title">
                                                <a href="{{route('news-video')}}">{{ \App\Helpers\TranslationHelper::translate('Watch More Videos->') }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                      @endforeach



                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>



    {{--


    <div class="postbox-area pt-120 pb-120">
        <div class="container">
            <div class="row">


                <div style=" padding: 20px 40px; border-radius: 12px;" class="col-xl-8 col-lg-8 mb-40">
                    <div class="postbox-details-wrapper">
                        @foreach ($blogs as $blog)
                            <div class="blog-card" style="background-color: #f9f9f9; padding: 20px; border-radius: 12px; margin-bottom: 40px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);">
                                <div class="postbox-thumb-box mb-30">
                                    <div class="postbox-main-thumb mb-20">
                                        <img src="{{ $blog->getFirstMediaUrl('blogs_image') }}" alt="{{ $blog->name }}" style="width: 100%; height: 400px; object-fit: cover;" />
                                    </div>
                                    <div style="direction: rtl" class="postbox-content-box">
                                        <div class="postbox-meta mb-20">
                                            <span><i class="fa-regular fa-folder-open"></i> {{ $blog->categories->name ?? '' }}</span>
                                        </div>
                                        <h4 class="postbox-title">
                                            <a href="{{ route('article', ['slug' => $blog->slug]) }}">{{ $blog->name }}</a>
                                        </h4>
                                        <p class="mt-15 mb-30">
                                            {!! Illuminate\Support\Str::limit(strip_tags($blog->description), 200) !!}
                                        </p>
                                        <a class="tr-btn" href="{{ route('article', ['slug' => $blog->slug]) }}">
                                            {{ \App\Helpers\TranslationHelper::translate('View More') }}
                                            <i class="fa-sharp fa-regular fa-arrow-right-long arrow-en"></i>
                                            <i class="fa-sharp fa-regular fa-arrow-left-long arrow-ar"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>



                <div class="col-xl-4 col-lg-4 order-lg-0 order-md-1">
                    <div class="sidebar-right">

                        <div class="sidebar-widget mb-45">
                            <h4 class="sidebar-widget-title mb-35">{{ setting('Search_Here_title', app()->getLocale()) }}
                            </h4>
                            <form action="{{ route('searchCategory') }}" method="GET">
                                <div class="sidebar-search-box p-relative">
                                    <div class="sidebar-search-input">
                                        <input type="text"
                                            placeholder="{{ \App\Helpers\TranslationHelper::translate('Search here') }}"
                                            name="search" required />
                                    </div>
                                    <div class="sidebar-search-button">
                                        <button type="submit">
                                            <i class="fa-sharp fa-light fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="sidebar-widget mb-45">
                            <h4 class="sidebar-widget-title mb-40">{{ setting('Category_title', app()->getLocale()) }}</h4>
                            <div class="sidebar-widget-list">
                                @foreach ($categories as $category)
                                    <a
                                        href="{{ route('blogsCategory', ['slug' => $category->slug, 'locale' => app()->getLocale()]) }}"><i
                                            class="fa-regular fa-arrow-right-long"></i>{{ $category->name }}</a>
                                @endforeach
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
                                                    <img src="{{ $blog->getFirstMediaUrl('blogs_image') }}"
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
                                                    <a
                                                        href="{{ route('article', ['slug' => $blog->slug]) }}">{{ $blog->name }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div> --}}



@endsection

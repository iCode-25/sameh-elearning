@extends('front.layouts.app')

@section('content')

    <!-- breadcurmb-area-start -->
    {{-- <div
        class="tr-breadcurmb-area tr-breadcurmb-bg"
        style="background-image: url({{ asset(setting('image_panarea_tow',app()->getLocale())) }}); background-size: cover; background-position: center; height: 240px;"
    >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="tr-breadcurmb-content text-center z-index-3">
                        <div class="tr-breadcurmb-title-box">
                            <h3 class="tr-breadcurmb-title">Blogs > Category</h3>
                            <div class="spacer-30"></div>
                        </div>
                        <div class="tr-breadcurmb-list-wrap">
                            <div class="tr-breadcurmb-list">
                                <span><a href="{{route('site.home')}}">Home</a></span>
                                <span class="dvdr"
                                ><i class="fa-regular fa-angle-right"></i
                                    ></span>
                                <i>Blogs</i>

                                <span class="dvdr"
                                ><i class="fa-regular fa-angle-right"></i
                                    ></span>
                                <i>{{optional($category)->name}}</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     --}}
    <!-- breadcurmb-area-end -->

    <!-- blog-details area start  -->
    <div class="postbox-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div style=" padding: 10px 40px; border-radius: 12px; gap: 20px;" class="col-xl-8 col-lg-8 mb-40">
                    <div class="postbox-details-wrapper">

                        @if($category->blogs->isNotEmpty())
                            @foreach($category->blogs as $blog)
                                <!-- اضافة div جديدة لتفصل كل card -->
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
                                                {!! Illuminate\Support\Str::limit(strip_tags($blog->description), 400) !!}
                                            </p>
                                            <a class="tr-btn" href="{{ route('article', ['slug' => $blog->slug]) }}">
                                                {{ \App\Helpers\TranslationHelper::translate('View More') }}
                                                <i class="fa-sharp fa-regular fa-arrow-right-long"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>{{ \App\Helpers\TranslationHelper::translate('No articles for this category.') }}</p>
                        @endif

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
                                    <a href="{{ route('blogsCategory', ['slug' => $category->slug]) }}"><i
                                            class="fa-regular fa-arrow-right-long"></i>{{ optional($category)->name }}</a>
                                @endforeach
                            </div>
                        </div>

                        {{-- @foreach ($blogs as $blog)
                             <div class="rc-post mb-15 d-flex align-items-center">
                               <div class="rc-post-thumb mr-20">
                                 <a href="{{route('article',['slug'=>$blog->slug])}}">
                                   <img src="{{$blog->getFirstMediaUrl('blogs_image')}}" alt="{{$blog->name}}" style="width: 80px; height: 80px; object-fit: cover;" />
                                 </a>
                               </div>
                               <div
                                class="rc-post-content">
                                 <div class="rc-meta d-flex mb-10">
                                   <i class="fa-solid fa-calendar-days"></i>
                                   <span>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</span>
                                 </div>
                                 <h3 class="rc-post-title">
                                   <a href="{{ route('site.blog-details', $blog->id) }}"
                                     >{{ $blog->name }}</a
                                   >
                                 </h3>
                               </div>
                             </div>
                             @endforeach --}}

                        {{-- <div class="sidebar-widget mb-45">
                          <h4 class="sidebar-widget-title mb-40">Recent post:</h4>
                          <div class="sidebar-widget-content">
                            <div class="sidebar-widget-post">

                              <div class="rc-post mb-15 d-flex align-items-center">
                                <div class="rc-post-thumb mr-20">
                                  <a href="{{ route('site.blog-details', $blog->id) }}">
                                    <img src="assets/img/rc-1.jpg" alt="" />
                                  </a>
                                </div>
                                <div class="rc-post-content">
                                  <div class="rc-meta d-flex mb-10">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>06-02-2023</span>
                                  </div>
                                  <h3 class="rc-post-title">
                                    <a href="{{ route('site.blog-details', $blog->id) }}"
                                      >Journey to your heart's content Where travel</a
                                    >
                                  </h3>
                                </div>
                              </div> --}}

                        {{-- <div class="rc-post mb-15 d-flex align-items-center">
                          <div class="rc-post-thumb mr-20">
                            <a href="{{ route('site.blog-details', $blog->id) }}">
                              <img src="assets/img/rc-2.jpg" alt="" />
                            </a>
                          </div>
                          <div class="rc-post-content">
                            <div class="rc-meta d-flex mb-10">
                              <i class="fa-solid fa-calendar-days"></i>
                              <span>06-02-2023</span>
                            </div>
                            <h3 class="rc-post-title">
                              <a href="{{ route('site.blog-details', $blog->id) }}"
                                >Explore the world like never before travel</a
                              >
                            </h3>
                          </div>
                        </div>
                        <div class="rc-post d-flex align-items-center">
                          <div class="rc-post-thumb mr-20">
                            <a href="{{ route('site.blog-details', $blog->id) }}">
                              <img src="assets/img/rc-3.jpg" alt="" />
                            </a>
                          </div>
                          <div class="rc-post-content">
                            <div class="rc-meta d-flex mb-10">
                              <i class="fa-solid fa-calendar-days"></i>
                              <span>06-02-2023</span>
                            </div>
                            <h3 class="rc-post-title">
                              <a href="{{ route('site.blog-details', $blog->id) }}"
                                >Journey to your heart's content Where travel</a
                              >
                            </h3>
                          </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{--
                            <div class="sidebar-widget">
                              <div class="sideba-widge-title-box">
                                <h3 class="sidebar-widget-title sm-border mb-35">
                                  Popular Tag
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
                            </div> --}}

        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="it-pagination mt-10">
                <nav>
                    <ul>
                        <li>
                            <a href="blog-sidebar.html">1</a>
                        </li>
                        <li>
                            <a href="blog-sidebar.html">2</a>
                        </li>
                        <li>
                            <a href="blog-sidebar.html">3</a>
                        </li>
                        <li>
                            <a class="color" href="blog-sidebar.html">
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
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
                                {{ setting('section_five_title_one', app()->getLocale()) }} <br />

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

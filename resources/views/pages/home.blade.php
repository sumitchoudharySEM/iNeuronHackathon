{{-- <?php $title = 'Genesis Blogs | Homepage'; ?> --}}

@extends('layouts.app')

@section('content')
    <!-- header starts -->
    <header>
        <div class="absolute-content">
            <h1>Our Blogroom</h1>
            <form action="{{ route('search') }}">
                <div class="search-form-wrapper">
                    <div class="search-icon">
                        <img src="{{ 'public/images/new_img/header-images/Search-06.png' }}" alt="" />
                    </div>
                    <input name="q" type="search" placeholder="Search" aria-label="Search" />
                    <div class="search-btn-wrapper">
                        <button type="submit" class="search-btn">Serch</button>
                    </div>
                </div>
            </form>
            <div class="categories-list">
                <div class="category">
                    <button class="btn-category">Adult</button>
                </div>
                <div class="category">
                    <button class="btn-category">Men</button>
                </div>
                <div class="category">
                    <button class="btn-category">Entropenour</button>
                </div>
                <div class="category">
                    <button class="btn-category">women</button>
                </div>
            </div>
        </div>
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img src="{{ asset('public/img/bg/post-bg7.jpg') }}" alt="" class="card-img" />
                            </div>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img src="{{ asset('public/img/bg/post-bg5.jpg') }}" alt="" class="card-img" />
                            </div>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="header-card-image">
                                <img src="{{ asset('public/img/bg/post-bg6.jpg') }}" alt=""
                                    class="header-card-img" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-white-line">
            <img src="{{ 'public/images/new_img/header-images/bottom_white.png' }}" alt="" />
        </div>
        <div class="bottom-header-cardes">
            <div class="header-cardes-left">
                <a href=""> <img src="{{ asset('public/images/new_img/profile2.jpg') }}" alt=""></a>
            </div>
            <div class="header-cardes-right">
                <h2>Lorem ipsum dolor sit amet consectetur.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor maxime vero rerum ratione voluptates
                    minima sit fuga sunt, animi vitae dolores neque quidem similique? Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Autem voluptas voluptatum molestiae distinctio, voluptate ab.</p>
                <div class="view-seo">
                    <img src="{{ asset('public/images/new_img/logo/') }}" alt="">
                    <p>8888</p>
                    <img src="{{ asset('public/images/new_img/profile2.jpg') }}" alt="">
                    <p>8888</p>
                </div>
                <p class="read-more-main">
                    <a href="">Read More</a>
                </p>
            </div>
        </div>
    </header>

    <!-- header ends -->
    {{-- bloges listing starts heair --}}
    <div class="display-cards">
        @foreach ($blogs as $blog)
            <div class="blog-card ">
                <div class="meta">
                    <a href="{{ route('blog', ['slug' => $blog->slug]) }}">
                        <div class="photo" style="background-image: url('{{ $blog->image }}')">
                        </div>
                    </a>

                    <ul class="details">
                        <li class="author"><a href="#">{{ $blog->user->name }}</a></li>
                        <li class="date">{{ $blog->created_at->diffForHumans() }}</li>
                        <li class="tags">
                            <ul>

                                @php
                                    $tagArr = explode(',', $blog->tags);
                                @endphp
                                {{-- {{$tagArr =explode(',',json_encode($blog['tags']))}} --}}
                                @foreach ($tagArr as $tag)
                                    <li><a href="{{ url('/') }}">{{ $tag }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="description">
                    <a href="{{ route('blog', ['slug' => $blog->slug]) }}">
                        <h2>{{ $blog->title }}</h2>
                    </a>
                    <p>{!! str_replace('&nbsp;', ' ', substr(strip_tags($blog->content), 0, 260)) !!}...</p>
                    <p class="no-of-vews">
                        <img src="" alt="">
                        {{ viewcount($blog->id) }}
                    </p>
                    <p class="no-of-likes">
                        <img src="" alt="">
                    </p>
                    <p class="read-more">
                        <a href="{{ route('blog', ['slug' => $blog->slug]) }}">Read More</a>
                    </p>
                </div>
            </div>
        @endforeach

    </div>

    {{-- bloges listing end heair --}}
@endsection

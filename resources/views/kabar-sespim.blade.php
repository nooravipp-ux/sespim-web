@extends('layouts.app')
@section('title', 'SESPIM - KABAR SESPIM')
@section('meta-description', 'Berisi tentang informasi mengenai kegiatan SESPIM LEMDIKLATA POLRI')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>{{$category->name}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-150 mb-150">
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 mt-5">
                <div class="single-latest-news" style="height: 100%;">
                    <a href="{{route('front.post.detail', ['id' => $post->id, 'slug' => $post->slug])}}">
                        <div class="latest-news-bg news-bg-1">
                            <img src="{{asset('assets/img/post-images/'.$post->image_banner)}}" alt="banner-image" height="100%" width="100%"/>
                        </div>
                    </a>
                    <div class="news-text-box">
                        <h3><a href="{{route('front.post.detail', ['id' => $post->id, 'slug' => $post->slug])}}">{{$post->title}}</a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i>{{$post->created_by}}</span>
                            <span class="date"><i class="fas fa-calendar"></i>{{date("d M Y", strtotime($post->created_at))}}</span>
                        </p>
                        <p class="excerpt">{{$post->summary}}</p>
                        <a href="{{route('front.post.detail', ['id' => $post->id, 'slug' => $post->slug])}}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end latest news -->
@endsection
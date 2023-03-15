@extends('layouts.app')
@section('title', 'SESPIM - KABAR SESPIM')
@section('meta-description', $post->title)
@section('content')
<!-- single article section -->
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-article-section">
                    <div class="single-article-text">
                        <h1>{{$post->title}}</h1>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i>{{$post->created_by}}</span>
                            <span class="date"><i class="fas fa-calendar"></i> {{date("d M Y", strtotime($post->created_at))}}</span>
                        </p>
                        <div class="single-artcile-bg">
                            <img src="{{asset('assets/img/post-images/'.$post->image_banner)}}" alt="banner-image" height="100%" width="100%"/>
                        </div>
                        {!!$post->content, ENT_QUOTES!!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-section">
                    <div class="recent-posts">
                        <h4>Recent Posts</h4>
                        <ul>
                            @foreach($latestPost as $lp)
                            <li><a href="{{route('front.post.detail', ['id' => $lp->id, 'slug' => $lp->slug])}}">{{$lp->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tag-section">
                        <h4>Tags</h4>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="{{route('front.kabar-sespim', ['id' => $category->id])}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single article section -->
@endsection
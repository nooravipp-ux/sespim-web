@extends('layouts.app')
@section('title', 'SESPIM - PERPUSTAKAAN')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>PERPUSTAKAAN</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-100 mb-150">
    <div class="container">
        <div class="row">
            @foreach($books as $post)
            <div class="col-lg-3 col-md-3 col-sm-3" style="border-radius: 4%">
                <div class="single-latest-news" style="height: 100%;">
                    <div class="latest-news-">
                        <img src="{{asset('assets/img/image-cover/'.$post->image_cover)}}" alt="banner-image" width="100%" height="100%">
                    </div>
                    <div class="news-text-box">
                        <p class="excerpt">{{$post->title}}</p>
                        <a href="{{asset('assets/file/'.$post->file)}}" target="_blank" class="read-more-btn">Baca Selengkapnya <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end latest news -->
@endsection
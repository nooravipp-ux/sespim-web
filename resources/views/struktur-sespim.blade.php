@extends('layouts.app')
@section('title', 'SESPIM - STRUKTUR ORGANISASI SESPIM')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg" style="background-image: url('{{asset('assets/img/image-banner/'. $content->image_banner)}}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Struktur SESPIM</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single article section -->
<div class="mt-80 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="single-article-section">
                    <div class="single-article-text">
                        {!!$content->content, ENT_QUOTES!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single article section -->
@endsection
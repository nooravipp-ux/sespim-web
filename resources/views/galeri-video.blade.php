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
                    <h1>Galery</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-80 mb-150">
    <div class="container">
        <div class="row">
        @foreach($medias as $m)
            <div class="col-lg-4">
                <video width="100%" height="240" controls>
                    <source src="{{asset('assets/media/vid/'.$m->file)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end latest news -->
@endsection
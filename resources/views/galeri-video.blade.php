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
            @if($m->media_type == 2)
            <div class="col-lg-4">
                <video width="100%" height="240" controls>
                    <source src="{{asset('assets/media/vid/'.$m->file)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            @else
            <div class="col-lg-4">
                <iframe width="100%" height="240" src="{{$m->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            @endif
            @endforeach
        </div>
        <div class="row justify-content-center mt-5">
            {{ $medias->links() }}
        </div>
    </div>
</div>
<!-- end latest news -->
@endsection
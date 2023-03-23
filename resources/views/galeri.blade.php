@extends('layouts.app')
@section('title', 'SESPIM - GALERI')
@section('css')
@endsection
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>GALERI</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single article section -->
<div class="mt-70 mb-150">
    <div class="container">
        <section class="gallery">
            <div class="row">
                @foreach($medias as $m)
                <div class="col-md-4 mt-4" style="height: 100%;">
                    <img style="border-radius: 7px;" src="{{asset('assets/media/img/'.$m->file)}}" width="100%" height="270">
                </div>
                @endforeach

            </div>
            <div class="row justify-content-center mt-5">
                {{ $medias->links() }}
            </div>
        </section>
    </div>
</div>
<!-- end single article section -->
@endsection

@section('script')

@endsection
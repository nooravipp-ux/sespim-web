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
        </section>
    </div>
</div>
<!-- end single article section -->
@endsection

@section('script')
<script>
    let items = document.querySelectorAll(".item"),
        viewer = document.querySelector(".viewer img");
    document.querySelector(".viewer .close").onclick = () => {
        document.querySelector("body").classList.toggle("overlayed");
    };
    items.forEach((item) => {
        item.onclick = () => {
            let content = item.querySelector(".img img");
            viewer.setAttribute("src", content.getAttribute("src"));
            document.querySelector(".viewer .alt").innerHTML = item.querySelector(
                ".title"
            ).innerHTML;
            document.querySelector("body").classList.toggle("overlayed");
        };
    });

    ["load", "scroll"].forEach((eventName) => {
        window.addEventListener(eventName, (event) => {
            document.querySelectorAll(".fluid-container").forEach((item) => {
                if (isScrolledIntoView(item)) {
                    item.classList.add("inScreen");
                } else {
                    item.classList.remove("inScreen");
                }
            });
        });
    });

    function isScrolledIntoView(el) {
        let rect = el.getBoundingClientRect();
        let elemTop = rect.top;
        let elemBottom = rect.bottom;
        let isVisible = elemTop >= -300 && elemBottom <= screen.height + 300;
        return isVisible;
    }
</script>
@endsection
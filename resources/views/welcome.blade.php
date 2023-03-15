@extends('layouts.app')
@section('title', 'Website Resmi SESPIM LEMDIKLAT POLRI')
@section('content')
<!-- home page slider -->
<div class="homepage-slider">
	@foreach($newestPost as $nw)
	<div class="single-homepage-slider homepage-bg-1" style="background-image: url('{{asset('assets/img/post-images/'. $nw->image_banner)}}');background-size: 1200px 600px;background-repeat: no-repeat;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">{{date("d M Y", strtotime($nw->created_at))}} WIB</p>
							<h2>{{$nw->title}}</h2>
							<a href="{{route('front.post.detail', ['id' => $nw->id, 'slug' => $nw->slug])}}" class="boxed-btn">Baca Selengkapnya</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
<!-- end home page slider -->
<div class="abt-section mb-100 mt-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Keutamaan</span> SESPIM</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="abt-bg">
					<img src="{{asset('assets/img/text.jpeg')}}" />
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end advertisement section -->

@if($beranda != null && $beranda->publish == 1)
<div class="abt-section mb-100 mt-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">{{$beranda->title}}</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				@if($beranda->media_type == 1)
				<img src="{{asset('assets/media/img/'.$beranda->file)}}" widt="100%"/>
				@elseif($beranda->media_type == 2)
				<video width="100%" height="500" controls>
                    <source src="{{asset('assets/media/vid/'.$beranda->file)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
				@else
				<iframe width="100%" height="500" src="{{$beranda->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				@endif
			</div>
		</div>
	</div>
</div>
@endif

<!-- latest news -->
<div class="latest-news pt-80 pb-150">
	<div class="container">

		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Kabar</span> SESPIM</h3>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach($posts as $post)
			<div class="col-lg-4 col-md-6 mt-5">
				<div class="single-latest-news" style="height: 100%;">
					<a href="{{route('front.post.detail', ['id' => $post->id, 'slug' => $post->slug])}}">
						<div class="latest-news-bg news-bg-1">
							<img src="{{asset('assets/img/post-images/'.$post->image_banner)}}" alt="banner-image" height="100%" width="100%" />
						</div>
					</a>
					<div class="news-text-box">
						<h3><a href="{{route('front.post.detail', ['id' => $post->id, 'slug' => $post->slug])}}">{{$post->title}}</a></h3>
						<p class="blog-meta">
							<span class="author"><i class="fas fa-user"></i>{{$post->created_by}}</span>
							<span class="date"><i class="fas fa-calendar"></i>{{date("d M Y", strtotime($post->created_at))}}</span>
						</p>
						<a href="{{route('front.post.detail', ['id' => $post->id, 'slug' => $post->slug])}}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- end latest news -->

<div class="latest-news pt-30 pb-150">
	<div class="container">

		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Lokasi</span> SESPIM</h3>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="embed-responsive embed-responsive-21by9">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.582752932186!2d107.63433891537444!3d-6.820493268611009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e0e90e0be2ff%3A0x9fc6dba17772ec79!2sSespim%20Polri!5e0!3m2!1sen!2sid!4v1678152323920!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
			</div>
		</div>
	</div>
</div>
<!-- end latest news -->
@endsection
@extends('layouts.base')

@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url({{ asset('vendor/startbootstrap-clean-blog/img/home-bg.jpg') }})">
    <div class="overlay"></div>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
            <h1>Ideaware Blog</h1>
            <span class="subheading">A Laravel 6 Blog</span>
        </div>
        </div>
    </div>
    </div>
</header>
    <!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($posts as $post)
            <div class="post-preview">
            <a href="{{ route('post', $post->slug) }}">
                <h2 class="post-title">{{ $post->name }}</h2>
                <h3 class="post-subtitle">{{ $post->excerpt }}</h3>
            </a>
            <p class="post-meta">Posted by {{ $post->user->name }}
                on {{ date('d-m-Y', strtotime($post->created_at)) }}</p>
            </div>
            <hr>
            @endforeach
            <div class="justify-content-center">
                {{ $posts->render() }}  
            </div>                          
        </div>
    </div>
</div>
@endsection
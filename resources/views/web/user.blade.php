@extends('layouts.baseUser')

@section('content')

<header
  class="masthead"
  style="background-image:
    url({{ asset('vendor/startbootstrap-clean-blog/img/user-bg.jpg') }})"
>
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="user-heading">
          <img src="{{ asset('vendor/startbootstrap-clean-blog/img/user-pic.png') }}"
            alt="Profile Picture" width="110" height="110">
          <h1>{{ $user->name }}</h1>
          <h2 class="subheading">This is me!</h2>
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
      <div class="col-lg-4 col-md-6 mx-auto">
        <h3 class="twitter">Latest Tweets <i class="fab fa-twitter"></i></h3>
        <hr>
        @foreach ($tweets as $tweet)
        <a href="{{ 'https://twitter.com/'.$tweet->screen_name.'/status/'.$tweet->id_str }}" target='_blank'>
          <blockquote class="{{ $tweet->class }}" id="{{ $tweet->id_str }}">
            <img 
              src="{{ $tweet->profile_image_url }}"
              class="image-circle" width="36" height="36"
              alt="Profile Picture"
            />
            <p lang="en" dir="ltr">{{ $tweet->text }}</p>            
            <span>&mdash; {{ $tweet->name }} ({{ '@'.$tweet->screen_name }}) {{ date('d-m-Y', strtotime($tweet->created_at)) }}</span>
            @if ($user->authUser)
            <button
              type="button" class="btn btn-outline-dark btn-sm" data-id_str="{{ $tweet->id_str }}"
              data-user="{{ $user->id }}" data-hidden="{{ $tweet->hidden }}">
              @if ($tweet->hidden === 1)
              SHOW
              @else
              HIDE
              @endif
            </button>
            @endif
          </blockquote>
        </a>
        @endforeach

        {{-- <script async src="https://platform.twitter.com/widgets.js" charset="utf-8" /> --}}
      </div>
  </div>
</div>
@endsection
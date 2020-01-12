@extends('layouts.base')

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
        @foreach ($tweets as $tweet)
        <blockquote
          class="twitter-tweet"
          data-conversation="none" data-cards="hidden"
          data-lang="en">
          <p lang="en" dir="ltr">{{ $tweet->text }}</p>
          &mdash; {{ $tweet->user->name }} ({{ '@'.$tweet->user->screen_name }})
          <a href="{{'https://twitter.com/'.$tweet->user->screen_name.'/status/'.$tweet->id_str}}">
            {{ date('d-m-Y', strtotime($tweet->created_at)) }}</a>
        </blockquote>

        {{-- <blockquote class="twitter-tweet">
          <img 
            src="{{ $tweet->user->profile_image_url }}"
            class="image-circle" width="50" height="50"
            alt="Profile Picture"
          >
            <p lang="en" dir="ltr">{{ $tweet->text }}
              </p>&mdash; {{ $tweet->user->name }} ({{ '@'.$tweet->user->screen_name }})
            <span>{{ date('d-m-Y', strtotime($tweet->created_at)) }}</span>
        </blockquote> --}}
        @endforeach
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8">
        </script>
      </div>
  </div>
</div>
@endsection
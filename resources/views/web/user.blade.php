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
        <blockquote class="twitter-tweet" data-theme="dark">
          <p lang="en" dir="ltr">
          🚨 Vapor: we have launched support for pointing multiple domains at a single project!
          <a href="https://t.co/sPF0ahrEvt">https://t.co/sPF0ahrEvt</a>
          </p>&mdash; Laravel (@laravelphp)
          <a href="https://twitter.com/laravelphp/status/1215652030255190016?ref_src=twsrc%5Etfw">January 10, 2020</a>
        </blockquote>

        <blockquote class="twitter-tweet" data-theme="dark">
          <p lang="en" dir="ltr">
          🚨 Vapor: we have launched support for pointing multiple domains at a single project!
          <a href="https://t.co/sPF0ahrEvt">https://t.co/sPF0ahrEvt</a>
          </p>&mdash; Laravel (@laravelphp)
          <a href="https://twitter.com/laravelphp/status/1215652030255190016?ref_src=twsrc%5Etfw">January 10, 2020</a>
        </blockquote>
        
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8">
        </script>
      </div>
  </div>
</div>
@endsection
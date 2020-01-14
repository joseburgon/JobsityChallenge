@extends('layouts.base')

@section('content')
    
  <!-- Page Header -->
  @if ($post->file)    
  <header class="masthead" style="background-image: url({{ $post->file }})">
  @else
  <header class="masthead" style="background-image: url({{ asset('vendor/startbootstrap-clean-blog/img/home-bg.jpg') }})">
  @endif
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{ $post->name }}</h1>
            <h2 class="subheading">{{ $post->excerpt }}</h2>
            <span class="meta">
              <a href="{{ route('user', $post->user_id) }}">
                {{ $post->user->name }}
              </a>
              on {{ date('d-m-Y', strtotime($post->created_at)) }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
                {!! $post->body !!}
                <p><strong>Category: </strong><a href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a></p>
                <p><strong>Tags: </strong>
                    @foreach ($post->tags as $tag)
                    <a href="{{ route('tag', $tag->slug) }}">{{ $tag->name }} </a>
                    @endforeach 
                </p>
        </div>
      </div>
    </div>
  </article>


{{-- <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>{{ $post->name }}</h1>                    
                <div class="row" style="margin-top: 4em; margin-bottom: 4em;">
                    <div class="col">
                        <div class="text-left">
                            <h5>Categoría: <a href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a></h5>
                        </div>
                        @if ($post->file)
                        <img src="{{ $post->file }}" class="img-fluid" alt="">
                        @endif
                        <br><br>
                        {{ $post->excerpt }}
                        <hr>
                        {!! $post->body !!}
                        <hr>
                        Etiquetas:
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('tag', $tag->slug) }}">
                            {{ $tag->name }}
                        </a>                                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
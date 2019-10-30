@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-header">
                <h3>Post</h3>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $post->name }}</p>
                <p><strong>Slug:</strong> {{ $post->slug }}</p>
                <p><strong>Content:</strong> {!! $post->body !!}</p>
            </div>
        </div>
    </div>
</div>
    
@endsection
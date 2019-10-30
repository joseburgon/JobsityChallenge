@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-header">
                <h3>Tag</h3>
            </div>
            <div class="card-body">
                <p><strong>Name</strong> {{ $tag->name }}</p>
                <p><strong>Slug</strong> {{ $tag->slug }}</p>
            </div>
        </div>
    </div>
</div>
    
@endsection
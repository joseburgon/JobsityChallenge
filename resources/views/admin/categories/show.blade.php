@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-header">
                <h3>Category</h3>
            </div>
            <div class="card-body">
                <p><strong>Name</strong> {{ $category->name }}</p>
                <p><strong>Slug</strong> {{ $category->slug }}</p>
                <p><strong>Contenido</strong> {{ $category->body }}</p>
            </div>
        </div>
    </div>
</div>
    
@endsection
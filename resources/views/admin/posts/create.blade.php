@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-header">
                <h3>Create Post</h3>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
                        
                    @include('admin.posts.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    
@endsection
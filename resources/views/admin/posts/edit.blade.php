@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-header">
                <h3>Edit Post</h3>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['posts.update', $post->id],
                'method' => 'PUT', 'files' => true]) !!}
                        
                    @include('admin.posts.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-header">
                <h3>Edit Tag</h3>
            </div>
            <div class="card-body">
                {!! Form::model($tag, ['route' => ['tags.update', $tag->id],
                'method' => 'PUT']) !!}
                        
                    @include('admin.tags.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    
@endsection
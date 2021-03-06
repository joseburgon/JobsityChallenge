@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-header">
                <h3>Edit Category</h3>
            </div>
            <div class="card-body">
                {!! Form::model($category, ['route' => ['categories.update', $category->id],
                'method' => 'PUT']) !!}
                        
                    @include('admin.categories.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    
@endsection
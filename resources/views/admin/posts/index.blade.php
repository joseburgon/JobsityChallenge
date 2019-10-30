@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-header">
                <h3>My Posts List
                <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-right">Create</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10px">ID</th>
                            <th>Name</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">Show</a>
                                </td>
                                <td width="10px">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->render() }}
            </div>
        </div>
    </div>
</div>
    
@endsection
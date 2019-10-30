@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-header">
                <h3>Categories List
                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary float-right">Create</a>
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
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info">Show</a>
                                </td>
                                <td width="10px">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->render() }}
            </div>
        </div>
    </div>
</div>
    
@endsection
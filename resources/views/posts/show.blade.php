@extends('layouts.app')

@section('content')

    <h3> {{$post->title}}</h3>
    <div> 
        {{$post->body}}
    </div>
    <hr>
    <small> Written on {{$post->created_at}} </small>
    <div>
    <a class="btn btn-default btn-sm" href="/posts"> Go Back </a>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm">Edit Post</a>

    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}

        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}

    {!! Form::close() !!}
        

    </div>


@endsection
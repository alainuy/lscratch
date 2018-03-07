@extends ('layouts.app')

    @section ('content')

    

        <h3>Edit Post</h3>

        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Enter Title'])}}
            </div>

            <div class="form-group">
                {{ Form::label('body', 'Body') }}
                {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Enter Message Body'])}}
            </div>

            {{--  for the PUT Request for posts.update  --}}
            {{ Form::hidden('_method','PUT') }}

            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

        
        {!! Form::close() !!}


    @endsection
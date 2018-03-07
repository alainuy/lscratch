@extends('layouts.app')


{{--  using DIV CLASS=well  --}}
@section('content')

{{--  USING TABLE DAMN!!!!!!!!!!  --}}
<h2>Displaying Posts using table</h2>
<table class="table table-condensed">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">User</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">created</th>
            <th scope="col">updated</th>

        </tr>
        </thead>
{{--  LOOP ALL DATA TO A HTML TABLE  --}}
<tbody>     
        @if ( count($posts) > 0 )   

            @foreach ($posts as $post)

                <tr>
                {{--  <th scope="row">{{ $post->id }}</th>  --}}
                <td>{{ $post->id }}</td>
                <td> {{ $post->user->name }} </td>
                <td> <a href="/posts/{{$post->id}}"> {{ $post->title }} </a></td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td> <a href="/posts/{{$post->id}}/edit" class='btn btn-success btn-sm'>Edit</a> </td>
                {{--  <td> <a href="">Delete</a> </td>  --}}
                <td>

                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}

                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                
                    {!! Form::close() !!}
                

                </td>
                </tr>

            @endforeach
            
        @else
        <p> No posts found </p>
        @endif

</tbody>
</table>

{{--  Bring Pagination based on number of required in paginate controller  --}}
   {{$posts->links()}} 

<hr>
   <h3>Displaying Posts using DIV well class</h3>

   @if ( count($posts) > 0 )
           
           @foreach ($posts as $post)

           <div class="well well-sm">
                  <h4> <a href="/posts/{{$post->id}}"> {{ $post->title }} </a></h4> 
                  <small>written on {{ $post->created_at }} by {{ $post->user->name }}</small>
           </div>
           
           @endforeach

           {{$posts->links()}}  

   @else

   <p>No posts found</p>
           
   @endif

@endsection



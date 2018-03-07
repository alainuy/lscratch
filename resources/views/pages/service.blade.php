@extends('layouts.app')

@section('content')

<h1>{{$title}}</h1>

@if(count($services) > 0)

    <ul class="list-group">
        @foreach($services as $service)

           <h4> 
               <li class="list-group-item"> {{$service}} </li> 
           </h4>
        @endforeach
    </ul>

@endif

<button class='btn btn-success'>service button</button>


@endsection
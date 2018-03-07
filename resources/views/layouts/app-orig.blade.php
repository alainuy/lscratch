<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name', 'LSAPP')}}</title>
    </head>

    @include('include.navbar')


<body>



        <div class='container'>
            
            {{--  this is to include any error from validation or session errors  --}}
            @include('include.messages') 

            {{--  display the main content of the page --}}
            @yield('content')
        </div>

</body>


</html>
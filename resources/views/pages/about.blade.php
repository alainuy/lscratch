
@extends('layouts.app')

<style type="text/css">
        #realClock {
                width: 900px;
                margin: 150px;
                text-align: center;
                font-size: 150px;
        }
</style>

@section('content')

        <h1>{{$title}}</h1>

<div id="realClock"></div>

<script type="text/javascript">

        setInterval(displayClock, 1000);

        function displayClock() {
                var time = new Date();
                var hrs = time.getHours();
                var min = time.getMinutes();
                var sec = time.getSeconds();
                var en = 'AM';

                if (hrs > 12) {
                   en = 'PM';
                }

                if (hrs > 12) {
                        hrs = hrs - 12;
                }

                if (hrs == 0) {
                        hrs = 12;
                }

                document.getElementById('realClock').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;


        }

</script>
            
@endsection
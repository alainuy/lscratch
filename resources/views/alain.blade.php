@extends ('layouts.app')
<style type="text/css">
    #realClock {
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            width: 900px;
            margin: auto;
            text-align: center;
            font-size: 150px;
    }
</style>

@section('content')



<div class='container' id="realClock"></div>


<script type="text/javascript">

        setInterval(displayClock, 1000);

        function displayClock() {
                var time = new Date();
                var year = time.getFullYear();
                var month = time.getMonth();
                var day = time.getDay();
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

                if (min < 10){
                    min = '0' + min;
                }

                if (sec < 10){
                    sec = '0' + sec;
                }

                document.getElementById('realClock').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en ;

                setTimeout(displayClock, 1000);

        }

        displayClock();

</script>


        <div class="container-fluid">
            <div class="text-center aspect-ratio" id="container" ng-controller="HeadCtrl">

                <div style="width:350px;margin:0 auto;">

                    <ds-widget-clock theme="theme" show-digital="digital" show-analog  digital-format="'hh:mm:ss a EEEE'"></ds-widget-clock>
<br>
                      <div class="form-group">
                        <label for="employeeID">Employee ID:</label>
                        <input type="text" class="form-control input-lg" id="employeeID" placeholder="Ex: 8100">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your employee ID with anyone else.</small>
                      </div>
                </div>
                    <div>
                        <a class='btn btn-primary btn-lg'>Time IN</a> <a class='btn btn-danger btn-lg'>Time OUT</a>
                    </div>
            </div>
        </div>
@endsection


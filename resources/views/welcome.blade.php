<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Leave Request</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">

    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 300;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .full{
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>


</head>
<body>

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Dashboard</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <!-- <a href="{{ url('/register') }}">Register</a> -->
                @endif
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Going somewhere?<br> File your vacation leave.
            </div>

            <div class="links">
                <a href="#leave"><h3>Pick a date</h3></a>
            </div>
        </div>

    </div>

    <div class="flex-center position-ref full">
        <div style="text-align:center;">
            <h1 id="leave" style="text-align:center;">Select your desired dates</h1>
            <!-- Form to pick a date for vacation leave -->
            <form method="POST" action=''>
                <div class="col-md-4 col-md-offset-4">
                    <div class="form-group">  
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                            <input class="form-control" id="date" name="date"placeholder="MM/DD/YYY" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            var date_input=$('input[name="date"]');
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent(): "body";
            var options={
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true
            };
            date_input.datepicker(options);
        });
    </script>

</body>
</html>

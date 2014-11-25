<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hut 6 - Bingo - Last events</title>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


{{ HTML::style('css/demo.css'); }}


</head>
<body>

<div class="row">

    <div class="col-md-12 main-container" style="padding-top:50px;">
        <div class="col-md-offset-1 col-md-11">
            <h1 class="header">Last {{ count($last_events) }} events</h1>

            <ul class="last-events">
                @foreach ($last_events as $event)
                <li>
                    <span style="font-weight: bold">{{ $event->created_at->diffForHumans() }}</span>
                    <span style="display: block">{{ $event->combined }}</span>
                    <span style="display: block">{{ $event->sorted }}</span>
                    <hr />
                </li>
                @endforeach
            </ul>

        </div>
    </div>

</div>



</body>
</html>
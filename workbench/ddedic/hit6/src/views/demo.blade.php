<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Demo</title>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>



{{ HTML::script('js/demo.js'); }}

{{ HTML::style('css/demo.css'); }}


<script type="text/javascript">

    var EVENT_NUMBERS = '{{ $balls  }}';

</script>


</head>
<body>

<div class="row">

    <div class="col-md-12 main-container" style="padding-top:50px;">
        <div class="col-md-5">

            <div class="huge-num-container">
                <h1 id="current-number">:)</h1>
            </div>

        </div>

        <div class="col-md-7">

            <div class="drawn-numbers">

                <ul class="drawn-list">

                 </ul>

            </div>

        </div>
    </div>

</div>



</body>
</html>
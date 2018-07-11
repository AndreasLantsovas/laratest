
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>404 Not Found Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    .error-template {padding: 150px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
    </style>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
       </script>
</head>
<body>
	<div class="container">
    <div class="row">
    <div class="error-template">
	    <h1>Oops!</h1>
	    <h2>404 Not Found</h2>
	    <div class="error-details">
		Sorry, an error has occured, Requested page not found!<br>
		<!--?php echo CHtml::encode($message); ?-->
	    </div>
	    <div class="error-actions">
		<a href="{{URL::action('EventController@index')}}" class="btn btn-primary">
		    <i class="icon-home icon-white"></i> Take Me Home </a>

	    </div>
	</div>
    </div>
</div>
	<script type="text/javascript">
	
	</script>


</body></html>

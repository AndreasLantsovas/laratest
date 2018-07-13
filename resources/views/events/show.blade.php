@extends('layouts.layout')



@section('jumbotron')
<div class="jumbotron">
    <div class="container">
        <h1>

           @if (! empty($country)) 
                {{$country->name}}
              @else
		        <h2 class="blog-post-title">{{$event->name}}</h2>
		        	
		        <h6>{{$event->country->name}} | {{ date ('j F',  strtotime($event->start_date)) }} - {{ date ('j F',  strtotime($event->end_date)) }}</h6>
            @endif



        </h1>
    </div>
</div>
@endsection








@section('content')

<div class="row mt-4">
	<!-- <div class="col-md-12">
		<div class="blog-post">


	        <h2 class="blog-post-title">{{$event->name}}</h2>
	        	
	        <h6>{{$event->country->name}} | {{ date ('j F',  strtotime($event->start_date)) }} - {{ date ('j F',  strtotime($event->end_date)) }}</h6>
	        <hr>
		</div>
	</div> -->


	<div class="col-md-9">

		@foreach ($links as $link)

			@if ($link->description == 'video')
		        	<div class="embed-responsive embed-responsive-16by9">
		  				<iframe class="embed-responsive-item" src="{{$link->link}}" allowfullscreen></iframe>
					</div>                
				@else
			                                  
			@endif
					
		@endforeach



		<p class='mt-3'>{{$event->details}}</p>

	</div>



	<div class="col-md-3">
		<div class="card">
		  <div class="card-header">
		    Links
		  </div>
		  <div class="card-body">
		   





@foreach ($links as $link)

			  	<dl class="dl-horizontal">
			  

 

			  		<dd><a href="{{$link->link}}" target="_blank">{{$link->description}}</a></dd>
			  	</dl>



@endforeach





		  </div>
</div>
	</div>
</div>

   


@endsection


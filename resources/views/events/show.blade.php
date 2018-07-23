@extends('layouts.layout')

@section('pageTitle')
	{{$event->name}}
@endsection

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



	@foreach ($links as $link)

		@if ($link->description == 'video')
	        	<div class="embed-responsive embed-responsive-16by9">
	  				<iframe class="embed-responsive-item" src="{{$link->link}}" allowfullscreen></iframe>
				</div>                
			@else
		                                  
		@endif
				
	@endforeach
	


	<div class="row"> 

		<div class="col-md-4 mt-4">
		
			@foreach ($links as $link)
			<ul>
				<li>
					<a href="{{$link->link}}" target="_blank">{{$link->description}}</a>
				</li>
			</ul>
			@endforeach

		</div>

		<div class="col-md-8">
			<p class='mt-3'>{{$event->details}}</p>

		</div>

	</div> 






<div style="width:100%; height: 350px;">

	@if (empty($map)) 
	        none
	    @else
			{!! $map !!}     
	@endif
    
</div>


<div class="row">
	<div class="col" style="height: 350px;">
		Price section
	</div>
</div>


@endsection


@section('sidebar')
	<div class="card card-body bg-light">
     sidebar
	</div>
@endsection







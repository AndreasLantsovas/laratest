@extends('layouts.admin')

@section('content')


<div class="container">
	<div class="row mt-3">
		<div class="col-md-12">
			<h1 class="blog-post-title">{{$event->name}}</h1>
			<p>{{$event->country->name}} | {{ date ('j F',  strtotime($event->start_date)) }} - {{ date ('j F',  strtotime($event->end_date)) }} </p>
		    <hr>
		</div>
	</div>

	<div class="row mt-1">
		<div class="col-md-8">
			<div class="blog-post">
		        <p>{{$event->details}}</p>
			</div>

		@foreach ($links as $link)

			@if ($link->description == 'video')
		        	<div class="embed-responsive embed-responsive-16by9">
		  				<iframe class="embed-responsive-item" src="{{$link->link}}" allowfullscreen></iframe>
					</div>                
				@else
			                                  
			@endif
					
		@endforeach
		</div>

		<div class="col-md-4">
			<div class="card">
			  
			  <div class="card-header">
			    More info
			  </div>

			  <div class="card-body">
			  	<dl class="dl-horizontal">
			  		<dt>Start at:</dt>
			  		<dd>{{$event->start_date}}</dd>
			  	</dl>

			  	<dl class="dl-horizontal">
			  		<dt>Uri:</dt>
			  		<dd>event/{{$event->alias}}</dd>

			  	<dl class="dl-horizontal">
			  		<dt>Country:</dt>
			  		<dd>{{$event->country->name}}</dd>
			  	</dl>
			  	<hr>
			       
			    <a href="{{URL::action('AdminController@edit', $event->id)}}" class="btn btn-success btn-sm">Edit</a>
			    <a href="{{URL::action('AdminController@destroy', $event->id)}}" class="btn btn-danger btn-sm">Delete</a>
			  </div>

			</div>
			
			<div class="card mt-4">
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
				<a href="{{URL::action('AdminController@test', $event->id)}}" class="btn btn-primary btn-sm">Add link</a>

			</div>


@section ('links')
				<div class="card mt-4">
				<div class="card-header">
					Add link
				</div>
				<div class="card-body">
					<form action="" class="form-inline">
						<div class="input-group mb-2 mr-sm-2 ">
						<input type="text" class="form-control" placeholder="Url"> 
					</div>
						 <button type="submit" class="btn btn-primary mb-2">Submit</button>
					</form>
				</div>
			</div>

@endsection















</div>   


@endsection


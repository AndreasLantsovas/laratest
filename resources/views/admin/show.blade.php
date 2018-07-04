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
		<div class="col-md-9 ">
			<div class="blog-post">
		        <p>{{$event->details}}</p>
			</div>
		</div>

		<div class="col-md-3">
			<div class="card">
			  
			  <div class="card-header">
			    More info
			  </div>

			  <div class="card-body">
			  	<dl class="dl-horizontal">
			  		<dt>Create at:</dt>
			  		<dd>{{$event->start_date}}</dd>
			  	</dl>

			  	<dl class="dl-horizontal">
			  		<dt>Uri:</dt>
			  		<dd>{{$event->alias}}</dd>

			  	<dl class="dl-horizontal">
			  		<dt>Country:</dt>
			  		<dd>{{$event->country->name}}</dd>
			  	</dl>


			  	</dl>
				<hr>


       
			    <a href="{{URL::action('AdminController@edit', $event->id)}}" class="btn btn-success btn-sm">Edit</a>
			    <a href="{{URL::action('AdminController@destroy', $event->id)}}" class="btn btn-danger btn-sm">Delete</a>
			  </div>

			</div>
		</div>
	</div>
</div>   


@endsection


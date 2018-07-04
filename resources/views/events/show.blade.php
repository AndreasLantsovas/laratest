@extends('layouts.layout')

@section('content')

<div class="row">
	<div class="col-md-8">
		<div class="blog-post">
	        <h2 class="blog-post-title">{{$event->name}}</h2>
	        	
	        <h6>{{$event->country->name}} | {{ date ('j F',  strtotime($event->start_date)) }} - {{ date ('j F',  strtotime($event->end_date)) }}
	        <hr>
			<p>{{$event->details}}</p>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
		  <div class="card-header">
		    More info
		  </div>
		  <div class="card-body">
		    <h5 class="card-title">Special title treatment</h5>
		    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		    <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
		  </div>
</div>
	</div>
</div>

   


@endsection


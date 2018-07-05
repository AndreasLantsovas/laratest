@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row mt-3">
        <div class="col-md-9">
            <form method="post" action="{{ route('update') }}">

 
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="{{$events->id}}">
                </div>

                <div class="form-group">
                    <label for="validationCustom05">Event name</label>
                        <input type="text" name="name" class="form-control"  rows="1" value="{{$events->name}}">
                </div>
 
            




                <div class="form-group">
                    <label for="validationCustom06">Start at</label>
                        <input type="text" name="start_date" class="form-control" rows="1" value="{{$events->start_date}}">
                </div>

               <div class="form-group">
                    <label >End at</label>
                    <input type="text" name="end_date" class="form-control" rows="1" value="{{$events->end_date}}">
                </div>

                <div class="form-group">
				    <label>Country</label>
				    <select class="form-control" name="country_id">


					@if (!$events->country_id)
					    <option  selected>Select country</option>
					@else

					<option value="{{$events->country->id }}" selected>{{$events->country->name}}</option>



					@endif


    
				    @foreach ($countries as $country)
				      <option value="{{$country->id }}">{{$country->name}}</option>
				    @endforeach
    			
    				</select>
 				</div>






                <div class="form-group">
                    <label >Details</label>
                    <textarea name="details" class="form-control" rows="6" >{{$events->details}}</textarea>
                </div>


                <div class="form-check">

				@if (!$events->id)

				@else

				                   @if ($events->published === 0)
				                      <input type="checkbox" class="form-check-input"  name="published" value="0" >
				                   @else
				                      <input type="checkbox" class="form-check-input"  name="published" value="1" checked>
				                   @endif

				                   <label class="form-check-label">Publish</label>

				@endif


    	    	</div>


	
				<div class="col-md-6 mt-3">
              		<button type="submit" class="btn btn-primary">Save</button>
				</div>




            </form>

        </div>   


		

		<div class="col-md-3">
			<div class="card">
			  
			  <div class="card-header">
			    More info
			  </div>

			  <div class="card-body">
			  	<dl class="dl-horizontal">
			  		<dt>Start at:</dt>
			  		<dd>{{$events->start_date}}</dd>
			  	</dl>

			  	<dl class="dl-horizontal">
			  		<dt>Uri:</dt>
			  		<dd>{{$events->alias}}</dd>

			  	<dl class="dl-horizontal">
			  		<dt>Country:</dt>
			  		<dd>{{$events->country->name}}</dd>
			  	</dl>


			  	</dl>
				<hr>


       
			    <a href="{{URL::action('AdminController@edit', $events->id)}}" class="btn btn-success btn-sm">Edit</a>
			    <a href="{{URL::action('AdminController@destroy', $events->id)}}" class="btn btn-danger btn-sm">Delete</a>
			  </div>

			</div>
		</div>
	


    </div>
</div>

@endsection
 
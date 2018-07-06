@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">

          
          <form method="post" action="{{ route('create') }}">
            <div class="row"> 
                <div class="col">
                  <h3>Add new</h3>
                      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                      <div class="form-group">
                              <input type="hidden" name="id" class="form-control" value="{{$events->id}}">
                      </div>

                      <div class="form-group">
                          <label>Event name</label>
                          <input type="text" name="name" class="form-control"  rows="1" value="{{$events->name}}">
                      </div>
                </div>
            </div>

			<div class="row">
				<div class="col">
					<label for="">Start at</label>
			        <input type="text" name="start_date" class="form-control" rows="1">	
				</div>

				<div class="col">
          <label for="validationCustom06">End at</label>
          <input type="text" name="start_date" class="form-control" rows="1">
			  </div>			
			






<div class="col">

  <div class="form-group">
    <label>Country</label>
    <select class="form-control" name="country_id">




    
    @foreach ($countries as $country)
      <option value="{{$country->id }}">{{$country->name}}</option>
    @endforeach
    


    </select>

    </div> </div>  
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


              <button type="submit" class="btn btn-primary">Save</button>
        </div>       
    </div>
</div>

@endsection
 
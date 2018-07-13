@extends('layouts.admin')

@section('stylesheets')
  <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
@endsection



@section('content')
<div class="container">
  



@if ($errors->any())
<div class="row">
  <div class="col-md-12 mt-4">
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        
    </div>
  </div>
</div>
@endif



  
    <div class="row">
        <div class="col-md-12 mt-4">

          
          <form data-parsley-validate method="post" action="{{ route('create') }}">
            <div class="row"> 
                <div class="col">
                  <h3>Add new</h3>
                      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                      <div class="form-group">
                              <input type="hidden" name="id" class="form-control" value="{{$events->id}}">
                      </div>

                      <div class="form-group">
                          <label>Event name</label>
                          <input required type="text" name="name" class="form-control"  rows="1" value="{{Request::old('name')}}">
                      </div>
                </div>
            </div>

			<div class="row">
				<div class="col">
					<label>Start at</label>
			        <input required pattern="\d{1,2}/\d{1,2}/\d{4}" type="text" name="start_date" class="form-control" rows="1" placeholder="MM/DD/YYYY" value="{{Request::old('start_date')}}">	
				</div>

				<div class="col">
          <label >End at</label>
          <input required pattern="\d{1,2}/\d{1,2}/\d{4}" type="text" name="end_date" class="form-control" rows="1" placeholder="MM/DD/YYYY">
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
                    <textarea required name="details" class="form-control" rows="6" >{{Request::old('details')}}</textarea>
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




@section('scripts')
  <script src="{{ asset('js/parsley.min.js') }}"></script>
@endsection















 
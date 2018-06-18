@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{ route('store') }}">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Event name</label>
                    <textarea name="name" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                  </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Start at</label>
                    <textarea name="start_date" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Details</label>
                    <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                </div>


              <button type="submit" class="btn btn-primary">Save</button>
            </form>

            </div>       
    </div>
</div>

@endsection
 
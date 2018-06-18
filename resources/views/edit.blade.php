@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{ route('store') }}">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Event name</label>
                    <textarea name="name" class="form-control"  rows="1" value="{{$events->id}}"></textarea>
                  </div>

<!--                 <div class="form-group">
                    <label for="exampleFormControlTextarea1">Start at</label>
                    <textarea name="start_date" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                </div> -->







<!-- 
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
                </div> -->




                <div class="form-group">
                    <label for="validationCustom05">Id</label>
                        <input type="text" class="form-control" placeholder="Zip" value="{{$events->id}}">
                </div>

                <div class="form-group">
                    <label for="validationCustom05">Event name</label>
                        <input type="text" class="form-control" placeholder="Zip" rows="1" value="{{$events->name}}">
                </div>

                <div class="form-group">
                    <label for="validationCustom05">Start at</label>
                        <input type="text" class="form-control" placeholder="Zip" rows="1" value="{{$events->start_date}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Details</label>
                    <textarea name="details" class="form-control" rows="4" >{{$events->details}}</textarea>
                </div>




              <button type="submit" class="btn btn-primary">Save</button>
            </form>

            </div>       
    </div>
</div>

@endsection
 
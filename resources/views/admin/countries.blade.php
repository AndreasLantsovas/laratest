@extends('layouts.admin')




@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8 mt-4">
            <table class="table table-hover ">
                <thead>
                    <tr>

                      <th scope="col">Id</th>

                      <th scope="col">Country</th>
                      <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $countrie)
                    <tr>
                            <th scope="row">{{$countrie->id}}</th>

                             

                            <td><a href="{{route('country', $countrie->name)}}" >{{$countrie->name}}</a>

                            </td>

          <td>{{count($countrie->events)}}</td>
                              
                            <td>
                                <a href="" class="btn btn-outline-danger btn-sm">Delete</a>
                            </td> 
                                       
 

                                        
                    </tr>         
                    @endforeach 
                </tbody>
            </table>
        </div>

    <div class="col-md-4  mt-4">
        <form class="form-inline ">

          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Add new count</label>
            <input type="text" class="form-control" placeholder="Add new country">
          </div>
          <button type="submit" class="btn btn-primary mb-2">Create</button>
        </form>

<!-- @include("errors.list") -->



  



    </div>



</div>    


@endsection


 
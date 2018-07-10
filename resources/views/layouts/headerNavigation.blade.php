 <header>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">	
 	<div class="container">
		<div class="row">
			<div class="col">		 
				<a class="navbar-brand" href="http://localhost:8888/laratest/public/">
				<img src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
					Home
				</a>

	<a href="">Submit Festival</a>
			</div>




	<div class="dropdown">
	    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Countries
	    </button>
	    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


	@if (! empty($menuCountries)) 
	      @foreach ($menuCountries as $country)
	        <a class="dropdown-item" href="{{URL::action('EventController@CountryEvents', $country)}}">{{$country}}</a>
	      @endforeach
	 @else
		{{'No data'}}
	@endif

	    </div>
	  </div>
	</div> 


<div class="col-md-1">
	

		<a  href={{URL::action('AdminController@index')}} class="btn btn-info">Admin</a>
  </div> 
	</div>
    <!-- Navbar content -->
  </nav>
</header>

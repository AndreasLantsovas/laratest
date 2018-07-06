 <header>
 	<nav class="navbar navbar-dark bg-dark">	

		<div class="container">
			<div class="row">
				
			 	<nav class="navbar navbar-expand-lg navbar-right">
			 		
						<ul class="navbar-nav  ">
				        	<li class="nav-item {{Request::path() == 'admin' ? 'active' : ''}}">
				          		<a class="nav-link " href="{{URL::action('AdminController@index')}}">Home </a>
				        	</li>
					        <li class="nav-item {{Request::path() == 'admin/countries' ? 'active' : ''}}">
					          	<a class="nav-link " href="{{URL::action('AdminController@countries')}}">Countries</a>
					        </li>
				      	</ul>


				</nav>	
			</div>
		</div>
	</nav>	
</header>

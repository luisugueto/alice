@if(Session::has('message-error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<ul>
			{{ Session::get('message-error') }}
		</ul>
	</div>
@endif

@if(Session::has('message'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<ul>
			{{Session::get('message')}}
		</ul>
	</div>
@endif

@if(Session::has('message-welcome'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Bienvenido</h4>
		Usted ha iniciado sesión con éxito.</div>
@endif
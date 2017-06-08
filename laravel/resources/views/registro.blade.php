@extends('layouts.login')


@section('content')

<div class="container login-registro">
	<div class="row">
		<div class="col m6 s12 offset-m3">
		    <div class="card-panel teal lighten-2"><h1>Registrate</h1></div>
			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">Nombre</i>
					<input id="nombre" type="text" class="validate">
					<label for="nombre">Nombre</label>
				</div>
				<div class="input-field col s12">
					<i class="material-icons prefix">email</i>
					<input id="email" type="email" class="validate">
					<label for="email">Correo electronico</label>
				</div>
				<div class="input-field col s12">
					<i class="material-icons prefix">lock_outline</i>
					<input id="password" type="password" class="validate">
					<label for="password">Contrasena</label>
				</div>
			</div>
			<div class="row">
				<button id="btn-registrar" class="btn waves-effect waves-light col s4 l4 offset-s7 offset-l7" type="submit" name="action" >Registrar
					<i class="material-icons right">send</i>
  				</button>
			</div>
			<div class="row">
				<div id="msj-registro"></div>
			</div>
		</div>
	</div>
</div>



@stop
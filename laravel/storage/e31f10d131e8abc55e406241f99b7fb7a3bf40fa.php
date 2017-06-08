<?php $__env->startSection('content'); ?>


<div class="container login-registro">
	<div class="row">
		<div class="col m6 s12 offset-m3">
			<div class="card-panel teal lighten-2">
				<h1>Iniciar sesión</h1>
			</div>
			<form action="http://localhost:8080/anuncioslocal2/laravel/public/login" method="post">
				<div class="row">

					<?php echo csrf_field(); ?>

					<div class="input-field col s12">
						<i class="material-icons prefix">email</i>
						<input id="email" type="email" class="validate" name="email">
						<label for="email">Correo electronico</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">lock_outline</i>
						<input id="password" type="password" class="validate" name="password">
						<label for="password">Contrasena</label>
					</div>
				</div>
				<div class="row">
					<input class="btn waves-effect waves-light col s5 l3 offset-s7 offset-l9" type="submit" name="action" value="Ingresar"></input>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<center>
			<br>
			<p>¿No tienes cuenta</p>
			<a href="registro">Registrar</a>
		</center>
	</div>
</div>


<?php if(session('status')): ?>
<script type="text/javascript">alert("<?php echo e(session('status')); ?>")</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
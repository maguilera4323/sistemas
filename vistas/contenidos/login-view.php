<?php
	//verifica si hay sesiones iniciadas
	if (session_status() !== PHP_SESSION_ACTIVE) {
	 	session_start();
	}

	//verifica si la variable del contador está creada
	if (!isset($_SESSION['contador_intentos'])){
		$_SESSION['contador_intentos'] = 1;
	}

	//llamado al controlador de login
	require_once 'controladores/loginControlador.php';
	$usuario = new loginUsuarios(); //se crea nueva instancia de usuario

	//valdacion para ver si se recibieron datos de ingreso
	if (isset($_POST['acceder'])) {
		$datos = array(
			'usuario'=> $_POST['usuario'],
			'password'=> $_POST['clave'],
			'contador'=> $_POST['contador']
		);
		$respuesta = $usuario->accesoSistema($datos); //se envian los datos a la funcion accesoUsuario de Logincontrolador
}
?>

<section class="ftco-section">
		<div class="container login-container">
		<form action="" method="POST" id="formlg">
			<div class="row justify-content-center">
				<div class="col-md-5 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center"></div>
				  <?php
				 if(isset($_SESSION['respuesta'])){
					switch($_SESSION['respuesta']){
						case 'Contraseña incorrecta':
							echo '<div div class="alert alert-danger text-center" role="alert">Usuario y/o contraseña inválidos</div>';
							$_SESSION['contador_intentos']+=0.5;
						break;
						case 'Usuario inactivo':
							echo '<div class="alert alert-warning text-center">El usuario está inactivo. Comuniquese con el 
							administrador del sistema</div>';
						break;
						case 'Usuario bloqueado':
							echo '<div class="alert alert-dark text-center">El usuario está bloqueado. Comuniquese con el 
							administrador del sistema</div>';
							$_SESSION['contador_intentos']=1;
						break;
						case 'Datos incorrectos':
							echo '<div class="alert alert-danger text-center">Usuario y/o contraseña inválidos</div>';
							$_SESSION['contador_intentos']=1;
						break; 
					 }
				 }
			 ?>
			 <br>
		      	<h3 class="text-center mb-2">Bienvenido</h3>
		      	<p class="text-center">Ingrese sus datos de acceso</p>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="usuario" id="usuario" style="text-transform: uppercase" placeholder="Usuario" 
						required pattern="[A-Za-zñÑ!#$%&/=?¡*.-_@\~^]+" title="Ingrese solo letras y números sin espacios" />
		      		</div>
                    <br>
	            <div class="form-group">
	              <input type="password" class="form-control clave" name="clave" id="clave" minlength="5" maxlength="20" placeholder="Contraseña"
				   required pattern="[A-ZÁÉÍÓÚÜÑa-zñáéíóúüñ0-9!#$%&/=?¡*.-_@\~^]+" title="Ingrese su contraseña sin espacios"/>
				   <input type="hidden" class="form-control" name="contador" id="contador" value=<?php echo ($_SESSION["contador_intentos"]) ?> >
				</div>
	            <div class="form-group d-md-flex">
						<div class="w-100 text-md-right" id=opcion_rec>
							<a href="<?php echo SERVERURL?>rec-contrasena/">¿Olvidó su contraseña?</a>
						</div>
	            </div>
                <br>
	            <div class="form-group">
	            	<button type="submit" name="acceder" class="btn form-control btn-primary rounded submit px-3"
					data-bs-toggle="modal" data-bs-target="#exampleModal">Iniciar Sesión</button>
	            </div>
				</div>
			</div>
		 </form>
		</div>
	</section>
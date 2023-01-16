<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/DatosTablas/obtenerDatosPerfil.php"); 
?>

<h3 style="padding:3rem;"><i class="fas fa-user-edit"></i> &nbsp; PERFIL </h3>

<img src="<?php echo $_SESSION['foto_login']; ?>" width="150" height="150" alt="" alt="">
<br>
<h5>Datos del usuario</h5>

<?php
    //variables para generar la url completa del sitio y obtener el id del registro
      $host= $_SERVER["HTTP_HOST"];
      $url= $_SERVER["REQUEST_URI"];
      $url_completa="http://" . $host . $url; 
      //variable que contiene el id de la compra a editar
      $id = explode('/',$url_completa)[5];
        
        //se hace una instancia a la clase
        $datos=new obtenerDatosPerfil();
        $resultado=$datos->datosPerfil($id);
        foreach ($resultado as $fila){
    ?>

    <div class="form-group perfil">
		<label class="perfil">Usuario</label>
		<input type="text" class="form-group" name="parametro_nuevo" id="input perfil" maxlength="27" 
        style="text-transform:uppercase;" value="<?php echo $fila['usuario'] ?>" readonly>
	  </div>
    <br>
    <div class="form-group perfil">
      <label class="perfil">Nombre</label>
      <input type="text" class="form-group" name="parametro_nuevo" id="input perfil" maxlength="27" 
          style="text-transform:uppercase;" value="<?php echo $fila['nombre_usuario'] ?>" readonly>
	</div>
  <br>
    <div class="form-group perfil">
      <label class="perfil">Estado</label>
      <input type="text" class="" name="parametro_nuevo" id="input perfil" maxlength="27" 
        value="<?php echo $fila['estado_usuario'] ?>" readonly>
	</div>
  <br>
    <div class="form-group perfil">
      <label class="perfil">Rol</label>
      <input type="text" class="" name="parametro_nuevo" id="input perfil" maxlength="27" 
      value="<?php echo $fila['rol'] ?>" readonly>
    </div>
  <br>
    <div class="form-group perfil">
      <label class="perfil">Correo electrónico</label>
      <input type="text" class="" name="parametro_nuevo" id="input perfil" maxlength="27" 
        value="<?php echo $fila['correo_electronico'] ?>" readonly>
    </div>
    <?php
            }
    ?>
    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $id;?>">Editar</button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar Información de Usuario</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body" id="modal-actualizar">
                                <form action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                                      <div class="row">
                                            <div class="col-10 col-md-6">
                                                <div class="form-group">
                                                    <label class="label-actualizar">Usuario</label>
                                                    <input type="text" class="form-control" name="usuario_perfil_act" id="nom_usuario" 
                                                    style="text-transform:uppercase;" value="<?php echo $fila['usuario']?>" required="" >
                                                </div>
                                            </div>
                                            <div class="col-10 col-md-6">
                                                <div class="form-group">
                                                    <label class="label-actualizar">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre_usuario_act" id="nombre_usuario" 
                                                    style="text-transform:uppercase;" value="<?php echo $fila['nombre_usuario']?>" required="" >
                                                </div>
                                            </div>

                                          
                                    </div>
                                    
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Correo</label>
                                        <input type="email" class="form-control" name="correo_electronico_act" id="correo_electronico" value="<?php echo $fila['correo_electronico']?>"required="">
                                    </div>
                                    <br>
                                    <div class="form-group contrasena">
                                        <label class="label-actualizar">Contraseña</label>
                                        <div class="input-group mb-3">
                                          <input type="password" class="form-control" name="contrasena_act" id="contrasena" pattern="[a-zA-Z0-9!#%&/()=?¡*+_$@.-]{5,100}" maxlength="10" required="" >
                                          <span onclick="mosContrasena()" class="input-group-text"><i class="fas fa-eye-slash icon-clave" style="color:black;"></i></span>
                                      </div>
                                    </div>  
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Fotografía</label>
                                        <input type="file" class="form-control" name="imagen_act" id="imagen" maxlength="256" placeholder="Imagen">
                                        <img src="<?php echo $_SESSION['foto_login']; ?>" width="100" height="100" alt="">
                                    </div>
                                    <br>
                                    <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                    <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="usuario_id">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                        </div>

   
<br>
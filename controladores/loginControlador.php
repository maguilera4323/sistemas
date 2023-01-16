<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
   session_start();
}
require_once ("./modelos/loginModelo.php");

class loginUsuarios extends Usuario{

    public function accesoSistema($datos){
        $usuario=$datos['usuario'];
        $contrasena=$datos['password'];
        $array=array();

        //se obtiene el hash de la contraseña para validar el inicio de sesion
		$recuperarHash=new Usuario();
		$hash_BD = $recuperarHash->obtenerContrasenaHash($usuario);
			foreach($hash_BD as $fila){
				$hash=$fila['contrasena'];
			}

      if (password_verify($contrasena, $hash)){
			$verificarDatos = new Usuario(); //se crea una instancia en el archivo modelo de Login
			$respuesta = $verificarDatos->accesoUsuario($usuario, $hash); //datos recibidos del archivo modelo de Login
			foreach ($respuesta as $fila) {
				$array['id'] = $fila['id_usuario'];
				$array['nombre'] = $fila['nombre_usuario'];
				$array['usuario'] = $fila['usuario'];
				$array['estado'] = $fila['estado_usuario'];
				$array['rol'] = $fila['rol'];
				$array['id_rol'] = $fila['id_rol'];
            $array['foto_usuario'] = $fila['foto_usuario'];
         }

            if(isset($array['nombre'])){
                  switch ($array['estado']){
                     case 'Activo':
                        // session_start();
                        //datos que se envian para uso del sistema
                        $_SESSION['id_login']=$array['id'];
                        $_SESSION['usuario_login']=$array['usuario'];
                        $_SESSION['nombre_usuario']=($array['nombre']);
                        $_SESSION['estado']=$array['estado'];
                        $_SESSION['rol']=$array['rol'];
                        $_SESSION['id_rol']=$array['id_rol'];
                        $_SESSION['token_login']=md5(uniqid(mt_rand(),true));
                        $_SESSION['foto_login']=$array['foto_usuario'];
                        /* $datos_bitacora = [
                           "id_objeto" => 1,
                           "fecha" => date('Y-m-d H:i:s'),
                           "id_usuario" => $fila['id_usuario'],
                           "accion" => "Inicio de sesion",
                           "descripcion" => "El usuario ".$_SESSION['usuario_login']." entró al sistema"
                        ];
                        Bitacora::guardar_bitacora($datos_bitacora); */
                        return header("Location:".SERVERURL."home/");
                        break;
                        case 'Inactivo':
                           $_SESSION['respuesta'] = 'Usuario inactivo';
                           return header("Location:".SERVERURL."login/");
                        break;
                        case 'Bloqueado':
                           $_SESSION['respuesta'] = 'Usuario bloqueado';
                           return header("Location:".SERVERURL."login/");
                        break; 
                     die();
                  }
               }
                
             }else{
                 //en caso de que el hash no concuerde con el de la contraseña ingresada
               //o el usuario sea incorrecto
               $ingresos_erroneos=$datos['contador'];

               //se llama a la funcion para obtener el limite de intentos de login
               $parametroIntentosValidos=new Usuario();
               $valorParametro=$parametroIntentosValidos->intentosValidos();
                  foreach ($valorParametro as $fila) {
                     $array_param['valor'] = $fila['valor'];
                  }

               //validacion para revisar si el usuario ingresado existe en el sistema
               $verificarDatos = new Usuario();
               $query=$verificarDatos->verificarEstado($usuario);
                  foreach ($query as $fila) { 
                     $array['usuario'] = $fila['usuario'];
                     $array['estado'] = $fila['estado_usuario'];
                  }
                  
                  //Switch que valida si el usuario encontrado está activo
                  //si está inactivo, está bloqueado o es un usuario nuevo no se sigue la verificación para bloquearlo
                  if (isset($array['usuario'])>0){
                        switch ($array['estado']){
                           case 'Bloqueado':
                              $_SESSION['respuesta'] = 'Usuario bloqueado';
                              return header("Location:".SERVERURL."login/");
                           break;
                           case 'Inactivo':
                              $_SESSION['respuesta'] = 'Usuario inactivo';
                              return header("Location:".SERVERURL."login/");
                           break;
                           case 'Activo':
                              //si el usuario es ADMIN no se puede bloquear bajo ninguna circunstancia
                              if(($array['usuario']=='ADMINIS')){
                                 $_SESSION['respuesta'] = 'Datos incorrectos';
                                 return header("Location:".SERVERURL."login/");
                                 die();

                              //se usa el valor de ingresos erroneos recibido del contador
                              //y el valor del parametro ADMIN_INTENTOS_INVALIDOS
                               }else if(($ingresos_erroneos>($array_param['valor']))){
                                 $respuesta = $verificarDatos->bloquearUsuario($usuario);
                                 $_SESSION['respuesta'] = 'Usuario bloqueado';
                                 return header("Location:".SERVERURL."login/");
                              //si los intentos erroneos aun no superan el valor del parametro */
                              }else{
                                 $_SESSION['respuesta'] = 'Contraseña incorrecta';
                                 return header("Location:".SERVERURL."login/");
                              break;
                              }
                           }  
                     }else{
                        //si no existe el usuario y la contraseña en la base de datos
                        $_SESSION['respuesta'] = 'Datos incorrectos';
                        return header("Location:".SERVERURL."login/");
                        }
                        die();
               }

    }

    //funcion encargada de redirigir al login siempre que se detecte que no hay una sesion activa 
    public function forzarCierreSesionControlador(){
         session_unset();
         session_destroy();
         if(headers_sent()){
            return "<script> window.location.href='".SERVERURL."login/'; </script>";
         }else{
            return header("Location:".SERVERURL."login/");
         }
   }
}
<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<h3 style="padding:3rem;"><i class="fas fa-wrench"></i> &nbsp; CONFIGURACION </h3>
<div class="config-container">
    <div class="row row-cols-3 row-cols-md-2 g-5 text-center">
      <div class="col">
      <a href="<?php echo SERVERURL?>usuarios/">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center"><i class="fas fa-users-cog" style=""></i></h5>
            <p class="card-text text-center">Usuarios</p>
          </div>
        </div>
    </a>
      </div>
      <div class="col">
      <a href="<?php echo SERVERURL?>parametros/">
        <div class="card">
          <div class="card-body">
          <h5 class="card-title text-center"><i class="fas fa-list-alt"></i></h5>
            <p class="card-text text-center">Parámetros</p>
          </div>
        </div>
        </a>
      </div>
      <div class="col">
      <a href="<?php echo SERVERURL?>roles/">
        <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center"><i class="fas fa-wrench"></i></h5>
            <p class="card-text text-center">Roles</p>
          </div>
        </div>
        </a>
      </div>
      <div class="col text-center">
        <div class="card ">
        <div class="card-body">
          <h5 class="card-title text-center"><i class="fas fa-wrench" style="font-size:30px;"></i></h5>
            <p class="card-text text-center" style="font-size:30px;">Roles</p>
          </div>
        </div>
      </div>
    </div>
  </div>
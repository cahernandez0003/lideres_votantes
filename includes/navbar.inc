<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="height: 43px; font-size: 14px; background: #C10000;">
  <a class="navbar-brand" style="font-size: 14px;  letter-spacing: 0.25em; word-spacing: 0.25em;" href="../index.php"><img src="../public/imgs/bandera.png" style="width: 40px; height: 40px;"><strong>Control Campaña</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../"><strong> Inicio <span class="sr-only">(current)</span></strong></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="../<?php echo $_SESSION['ufoto']; ?>" class="border rounded-circle" style="height: 35px; width: 30px; font-size: 14px;"><strong>&nbsp;&nbsp;<?php echo $_SESSION['unombres']; ?></strong>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #DF040B;font-size: 12px; width: auto; margin-left: -50px;">
          <?php if ($_SESSION['urol'] == 'Lider'): ?>
            <a class="dropdown-item" href="<?php echo $url_site.'votantes/' ?>"> <i class="fas fa-address-book"></i> <b>&nbsp;&nbsp;Módulo Votantes</b> </a>
            <a class="dropdown-item" href="<?php echo $url_site.'lideres/' ?>"> <i class="fas fa-id-card"></i> <b>&nbsp;&nbsp;Mis Datos</b> </a>
            <a class="dropdown-item" href="<?php echo $url_site.'actividades/' ?>"> <i class="fas fa-id-card"></i> <b>&nbsp;&nbsp;Mis Actividades</b> </a>
          <?php endif ?>
          <?php if ($_SESSION['urol'] == 'Admin'): ?>
            <a class="dropdown-item" href="<?php echo $url_site."usuarios/"; ?>"> <i class="fa fa-users"></i> <b>&nbsp;&nbsp;Usuarios</b> </a>
            <a class="dropdown-item" href="<?php echo $url_site."votantes/"; ?>"> <i class="fa fa-book"></i> <b>&nbsp;&nbsp;Electores</b>  </a>
            <a class="dropdown-item" href="<?php echo $url_site."lideres/"; ?>"> <i class="fa fa-clipboard"></i> <b>&nbsp;&nbsp;Mis datos</b>  </a>
            <a class="dropdown-item" href="<?php echo $url_site."lideres/"; ?>"> <i class="fa fa-clipboard"></i> <b>&nbsp;&nbsp;Comunicaciones</b>  </a>
          <?php endif ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo $url_site."pages/close.php"; ?>"> <i class="fa fa-power-off"></i> <b>&nbsp;&nbsp;Cerrar Sesión</b> </a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<h2 class="text-center" style="color: #CC0000; margin-top:-10px;"> 
	<i class="fa fa-list-alt"></i>
	Sistema de vinculación Potencial Electoral 
</h2>
<hr>
<div style="position: absolute; left: -35%; top: 50%; background-color: white;"><img src="public/imgs/bandera.png" style="width: 235px; height: 235px;"></div>
<div id="parrafo" class="text-center">
<p class="text-justify col-12" style="font-size: 15px; font-size: 16px !important;">Eres uno de nuestros líderes políticos y es tu primera vez en nuestro sistema? No te preocupes, sólo sigue los siguientes pasos:</p>
<ul class="text-justify col-12" style="font-size: 15px;">
	<li >Ingresa al módulo de registro dando un click en el botón Registrarse.</li>
	<li >Diligencia los campos exigidos para el registro de información.</li>
	<li>
		Una vez que el administrador valide que se trate de uno de los testigos de la lista, debes revisar tu estado actual para verificar que te encuentres activo.</li> 
	<li>
		Cuando el sistema te permita el ingreso estarás activo y listo para registrar a tus votantes.
	</li>
</ul>
</div>
<div class="container">	
<div class="row flex-row">
	<div class="col-md-6 offset-3 flex-row" id="login" style="margin-top: -55px;">
		<h4 class="text-center" style="font-size: 18px; color: #CC0000;"> <i class="fa fa-user"></i> Ingreso de Usuarios </h4>
		<form action="" method="post" style="margin-bottom: -30px">
			<div class="form-group">
				<input type="text" class="form-control" name="email" placeholder="email Electrónico" style="letter-spacing: 0.2em;">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="pass" placeholder="Contraseña" style="letter-spacing: 0.2em;">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-outline-success btn-block"> <i class="fa fa-sign-in-alt"></i> Ingresar </button>
				</style>
			</div>
		</form>
		<br>
		<div>
			<a class="btn btn-outline-dark btn-block" href="pages/register.php"><i class="fa fa-edit"></i>Registrarse</a>
		</div>
		<?php 
			if ($_POST) {
				$email = $_POST['email'];
				$pass  = md5($_POST['pass']);
				if(login($con, $email, $pass)) {
					if($_SESSION['uestado'] == 'Inactivo'){
						echo "<script> alert('Aún estas inactivo') </script>";
					}
					else{
						if($_SESSION['urol'] == 'Lider') {
						echo "<script> window.location.replace('pages/lider.php'); </script>";
						} else if($_SESSION['urol'] == 'Admin') {
						echo "<script> window.location.replace('pages/administrator.php'); </script>";
						}
					}
				} else {
					$_SESSION['type']    = 'danger';
					$_SESSION['message'] = 'Los datos del Usuario son Incorrectos!';
				}
			}
		?>
	</div>
</div>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="position: absolute; right: -35%; top: 50%; background-color: white; width: 250px; height: 250px;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="width: 240px; height: 240px;" src="public/imgs/mario.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img style="width: 240px; height: 240px;" src="public/imgs/joseluis.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img style="width: 240px; height: 240px;" src="public/imgs/camilo-gaviria (1).jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img style="width: 240px; height: 240px;" src="public/imgs/JORGE-HERNÁN-MESA-BOTERO.png" alt="Fourth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
</div>
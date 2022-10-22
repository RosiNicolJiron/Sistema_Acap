<?php
session_start();
if(isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../vista/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<script type="text/javascript" src="../js/usuario.js?rev=<?php echo time();?>"></script>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="../Login/logo.css">
	<script src="https://kit.fontawesome.com/4634888c33.js" crossorigin="anonymous"></script>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				    <img src="../Login/imagenes/logo.png" width="70%" class="logo">
					<BR></BR>
					<span class="login100-form-title p-b-49">
						INICIAR SESI&Oacute;N SISTEMA ACAP
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="username" placeholder="Ingrese el usuario" id="txt_usu" autocomplete="new-password">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Contrase&ntilde;a</span>
						<span>
						<i onclick="mostrarContrasena()" class="fa-solid fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" placeholder="Ingrese la contrase&ntilde;a" id="txt_con">
						
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#" onclick="AbrirModalRestablecer()">
							Olvidaste la contrase&ntilde;a?
						</a>
					</div>
					
					<div class="">
						<div class="">
							<div class=""></div>
							<button class="btn btn-primary" onclick="VerificarUsuario()">
								ENTRAR
							</button>
							
							<a href="../Login/index.php">REGRESAR</a>
						</div>
					</div><br>

					
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	<div class="modal fade" id="modal_restablecer_contra" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            
            <h4 class="modal-title"><b>RECUPERAR CONTRASENA</b></h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for=""><b>INGRESE CORREO</b></label>
                    <input type="text" class="form-control" id="txt_email" placeholder="Ingrese Correo"><br>
                </div>
                

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Restablecer_Contra()">ENVIAR</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
            </div>
        </div>
        </div>
    </div>

<!--===============================================================================================-->
	<script src="vendor/sweetalert2/sweetalert2.js"></script>
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="../js/usuario.js"></script>

</body>
<script>
	
	
txt_usu.focus();
</script>
</html>


<script>
	function mostrarContrasena(){
    var tipo = document.getElementById("txt_con");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}

function Ir(){
   window.location.href = "login.php";
}
</script>
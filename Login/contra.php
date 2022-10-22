
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
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54"">
				    <img src="../Login/imagenes/logo.png" width="70%" class="logo">
					<BR></BR>
					<span class="login100-form-title p-b-49">
						RESTABLECER CONTRASEÑA SISTEMA ACAP
					</span>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">CONTRASEÑA</span>
						
						<input class="input100" type="password" name="pass" placeholder="contrase&ntilde;a" id="con1" autocomplete="">
						
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">REPETIR CONTRASEÑA</span>
						
						<input class="input100" type="password" name="pass2" placeholder="repetir la contrase&ntilde;a" id="con2" autocomplete="">
						
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "">
						<span class="label-input100">INGRESE SU CORREO</span>
						<input class="input100" type="text" name="username" placeholder="Ingrese correo" id="email" autocomplete="">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

                    <button class="btn btn-primary" onclick="Cambiar()">RESTABLECER</button>
					<button class="btn btn-primary" onclick="Ir()">IR AL LOGIN</button>
					
					
					
					
				

					
			</div>
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
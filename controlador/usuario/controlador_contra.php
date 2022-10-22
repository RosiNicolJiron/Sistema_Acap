<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    
    $contra = password_hash($_POST['contrasena'],PASSWORD_DEFAULT,['cost'=>10]);
    
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->Auto_Contra($email,$contra);
    echo $consulta;

?>
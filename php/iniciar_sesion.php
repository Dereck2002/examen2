<?php
//TODO: almacenando datos
	/*== Almacenando datos ==*/
    $usuarios=limpiar_cadena($_POST['login_usuarios']);
    $clave=limpiar_cadena($_POST['login_clave']);


    /*== Verificando campos obligatorios ==*/
    if($usuarios=="" || $clave==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

$check_user=conexion();
$check_cliente=conexion();
$check_user=$check_user->query("SELECT * FROM usuarios WHERE username='$usuarios'");

if($check_user->rowCount()==1){

    $check_user=$check_user->fetch();

    if($check_user['username']==$usuarios && $check_user['contrasenia']==$clave ){

        $_SESSION['id']=$check_user['id_usuario'];
        $_SESSION['cliente']=$check_user['id_cliente'];
        $cliente=$_SESSION['cliente'];
        $_SESSION['usuario']=$check_user['username'];
        $_SESSION['tipo']=$check_user['tipo'];

        $check_cliente=$check_cliente->query("SELECT * FROM clientes WHERE id_cliente='$cliente'");

        if($check_cliente->rowCount()==1){
            $check_cliente=$check_cliente->fetch();
            $_SESSION['nombres']=$check_cliente['nombre'];

        }

        if(headers_sent()){
            echo "<script> window.location.href='index.php?vista=home'; </script>";
        }else{
            header("Location: index.php?vista=home");
        }
        

    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Usuario o clave incorrectos
            </div>
        ';
    }
}else{
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            Usuario o clave incorrectos
        </div>
    ';
}
$check_user=null; 
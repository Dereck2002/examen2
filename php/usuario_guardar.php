<?php
require_once "main.php";

//TODO: almacenando datos
$cliente_id = limpiar_cadena($_POST['usuario_id']);
$username= limpiar_cadena($_POST['usuarios_username']);
$contrasenia = limpiar_cadena($_POST['usuarios_clave']);
$tipo= limpiar_cadena($_POST['usuarios_tipo']);


//TODO: verificar campos obligatorios
if (
  $cliente_id == "" || $username== "" ||  $contrasenia == "" ||  $tipo== "") {
    echo '
    <div class="notification is-danger is-light">
             <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
    </div>';
    exit();
}


$check_cedula = conexion();
$check_cedula = $check_cedula->query("SELECT id_cliente FROM usuarios WHERE id_cliente='$cliente_id'");
if ($check_cedula->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La cedula ingresada ya se encuentra registrada, por favor digite otra
            </div>
        ';
    exit();
}
$check_cedula = null;

$check_username = conexion();
$check_username = $check_username->query("SELECT username FROM usuarios WHERE username='$username'");
if ($check_username->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El username ingresado ya se encuentra registrado, por favor digite otro
            </div>
        ';
    exit();
}
$check_username = null;

//TODO:guardar datos en la bdd
$guardar_usuario = conexion();
$guardar_usuario = $guardar_usuario->prepare("INSERT INTO `usuarios`( `id_cliente`, `username`, `contrasenia`, `tipo`) 
VALUES (:id_cliente, :username, :contrasenia, :tipo)");

$marcadores = [
  ":id_cliente" => $cliente_id,
  ":username" => $username,
  ":contrasenia" => $contrasenia,
  ":tipo" => $tipo,
 
];
$guardar_usuario->execute($marcadores);

if ($guardar_usuario->rowCount() == 1) {
    echo '
    <article class="message is-success">
  <div class="message-header">
    <p>Cliente registrado</p>
    <button class="delete" aria-label="delete"></button>
  </div>
  <div class="message-body">
  El Usuario ha sido registrado con exito
  </div>
</article>
        ';
} else {
    echo '
    <article class="message is-danger">
    <div class="message-header">
      <p>ERROR</p>
      <button class="delete" aria-label="delete"></button>
    </div>
    <div class="message-body">
      Error al guardar el usuario, intente nuevamente
    </div>
  </article>
        ';
}
$guardar_usuario=null;
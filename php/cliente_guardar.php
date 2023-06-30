<?php
require_once "main.php";

//TODO: almacenando datos
$cliente_id = limpiar_cadena($_POST['usuario_id']);
$nombre = limpiar_cadena($_POST['id_cliente']);



//TODO: verificar campos obligatorios
if (
  $cliente_id == "" || $nombre== "" ) {
    echo '
    <div class="notification is-danger is-light">
             <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
    </div>';
    exit();
}


$check_cliente_id = conexion();
$check_cliente_id = $check_cliente_id->query("SELECT id_cliente FROM clientes WHERE id_cliente='$cliente_id'");
if ($check_cliente_id->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La cedula ingresada ya se encuentra registrada, por favor digite otra
            </div>
        ';
    exit();
}
$check_cliente_id = null;

$check_nombre= conexion();
$check_nombre = $check_nombre->query("SELECT nombre FROM clientes WHERE nombre='$nombre'");
if ($check_nombre->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El username ingresado ya se encuentra registrado, por favor digite otro
            </div>
        ';
    exit();
}
$check_nombre = null;

//TODO:guardar datos en la bdd
$guardar_usuario = conexion();
$guardar_usuario = $guardar_usuario->prepare("INSERT INTO `clientes`( `id_cliente`, `nombre`) 
VALUES (:nombre)");

$marcadores = [
  ":nombre" => $nombre,

 
];
$guardar_clientes->execute($marcadores);

if ($guardar_clientes->rowCount() == 1) {
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
$guardar_clientes=null;
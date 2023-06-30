<?php
require_once "main.php";

//TODO: almacenando datos
$nombre = limpiar_cadena($_POST['nombre_producto']);


//TODO: verificar campos obligatorios
if (
  $nombre == "") {
    echo '
    <div class="notification is-danger is-light">
             <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
    </div>';
    exit();
}


$check_ingredientes = conexion();
$check_ingredientes = $check_ingredientes->query("SELECT nombre FROM inventarios WHERE nombre='$nombre'");
if ($check_ingredientes->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                los ingredientes ya se encuentran registrados, por favor digite otro
            </div>
        ';
    exit();
}
$check_producto = null;


//TODO:guardar datos en la bdd
$guardar_usuario = conexion();
$guardar_usuario = $guardar_usuario->prepare("INSERT INTO `ingredientes`(`nombre`) 
VALUES (:nombre)");

$marcadores = [
  ":nombre" => $nombre,
 
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
  El ingrediente ha sido registrado con exito
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
      Error al guardar el ingrediente, intente nuevamente
    </div>
  </article>
        ';
}
$guardar_usuario=null;

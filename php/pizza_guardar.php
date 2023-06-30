<?php
require_once "main.php";

//TODO: almacenando datos

$nombre_pizza= limpiar_cadena($_POST['nombre']);



//TODO: verificar campos obligatorios
if (
  $nombre_pizza == "") {
    echo '
    <div class="notification is-danger is-light">
             <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
    </div>';
    exit();
}


$check_cedula = conexion();
$check_cedula = $check_cedula->query("SELECT id_pizza FROM pizzas WHERE id_pizza='$nombre_pizza'");
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
$check_username = $check_username->query("SELECT id_pizza FROM pizzas WHERE id_pizza='$nombre_pizza'");
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
$guardar_usuario = $guardar_usuario->prepare("INSERT INTO `pizzas`( `id_pizza`, `nombre`) 
VALUES (:nombre)");

$marcadores = [

  ":nombre" => $nombre_pizza,
 
];
$guardar_usuario->execute($marcadores);

if ($guardar_usuario->rowCount() == 1) {
    echo '
    <article class="message is-success">
  <div class="message-header">
    <p>Pizzas registrado</p>
    <button class="delete" aria-label="delete"></button>
  </div>
  <div class="message-body">
  La pizza ha sido registrado con exito
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
      Error al guardar la Pizza, intente nuevamente
    </div>
  </article>
        ';
}
$guardar_usuario=null;
<?php
require_once "main.php";

//TODO: almacenando datos
$nombre = limpiar_cadena($_POST['nombre']);

//TODO: verificar campos obligatorios
if (
  $nombre == ""
) {
  echo '
    <div class="notification is-danger is-light">
             <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
    </div>';
  exit();
}


$check_nombre = conexion();
$check_nombre = $check_nombre->query("SELECT nombre FROM pizzas WHERE nombre='$nombre'");
if ($check_nombre->rowCount() > 0) {
  echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La placa ingresada ya se encuentra registrada, por favor digite otra
            </div>
        ';
  exit();
}
$check_placa = null;

//TODO:guardar datos en la bdd
$guardar_pizzas = conexion();
$guardar_pizzas = $guardar_pizzas->prepare("INSERT INTO `pizzas`( `nombre`) 
VALUES (:nombre)");

$marcadores = [
  ":nombre" => $nombre,


];
$guardar_pizzas->execute($marcadores);

if ($guardar_pizzas->rowCount() == 1) {
  echo '
    <article class="message is-success">
  <div class="message-header">
    <p>pizzas registrado</p>
    <button class="delete" aria-label="delete"></button>
  </div>
  <div class="message-body">
  El cliente ha sido registrado con exito
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
$guardar_pizzas = null;

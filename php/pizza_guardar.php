<?php
require_once "main.php";

//TODO: almacenando datos
$pizza_id = limpiar_cadena($_POST['pizaa_id']);

$nombre_cli = limpiar_cadena($_POST['nombre_cli']);


//TODO: verificar campos obligatorios
if (
  $pizaa_id == "" || $nombre_cli == ""
) {
    echo '
    <div class="notification is-danger is-light">
             <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
    </div>';
    exit();
}


$check_pizza = conexion();
$check_pizza = $check_pizza->query("SELECT nombre FROM pizzas WHERE nombre='$pizza_cli'");
if ($check_pizza->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La pizza ingresada ya se encuentra registrada, por favor digite otra
            </div>
        ';
    exit();
}
$check_placa = null;

//TODO:guardar datos en la bdd
$guardar_autos = conexion();
$guardar_autos = $guardar_autos->prepare("INSERT INTO `pizzas`(`id_pizza`, `nombre`) 
VALUES (:pizza,:nombre)");

$marcadores = [
  ":pizza" => $pizza,
  ":nombre" => $nombre,

];
$guardar_pizzas->execute($marcadores);

if ($guardar_pizzas->rowCount() == 1) {
    echo '
    <article class="message is-success">
  <div class="message-header">
    <p>Cliente registrado</p>
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
$guardar_pizzas=null;

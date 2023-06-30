<?php
require_once "main.php";

//TODO: almacenando datos
$nombre = limpiar_cadena($_POST['nombre_ingrediente']);
$pizza_id= limpiar_cadena($_POST['pizza_id']);



//TODO: verificar campos obligatorios
if (
  $nombre == "" || $pizza_id== "" ) {
    echo '
    <div class="notification is-danger is-light">
             <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
    </div>';
    exit();
}


$check_id = conexion();
$check_id = $check_id->query("SELECT nombre FROM ingredientes WHERE nombre='$nombre'");
if ($check_id->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La pizza ingresada ya se encuentra registrada, por favor digite otra
            </div>
        ';
    exit();
}
$check_id = null;

$check_pizza = conexion();
$check_pizza = $check_pizza->query("SELECT id_pizza FROM ingredientes WHERE id_pizza='$pizza_id'");
if ($check_pizza->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El nombre ingresado ya se encuentra registrado, por favor digite otro
            </div>
        ';
    exit();
}
$check_pizza = null;

//TODO:guardar datos en la bdd
$guardar_ingreiente= conexion();
$guardar_ingreiente = $guardar_ingreiente->prepare("INSERT INTO `ingredientes`( `id_ingredientes`, `nombre`, `id_pizza`) 
VALUES (:nombre, :id_pizza)");

$marcadores = [
  ":nombre" => $nombre,
  ":id_pizza" => $pizza_id,

 
];
$guardar_ingreiente->execute($marcadores);

if ($guardar_ingreiente->rowCount() == 1) {
    echo '
    <article class="message is-success">
  <div class="message-header">
    <p>Ingredientes registrado</p>
    <button class="delete" aria-label="delete"></button>
  </div>
  <div class="message-body">
  El Ingrediente ha sido registrado con exito
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
      Error al guardar el Ingrediente, intente nuevamente
    </div>
  </article>
        ';
}
$guardar_ingreiente=null;
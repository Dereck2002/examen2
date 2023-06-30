<?php
require_once "main.php";
$fecha_pedido = limpiar_cadena($_POST['fecha_pedido']);

//TODO: verificar campos obligatorios
if (
    $fecha_pedido == ""  
) {
    echo '
    <div class="notification is-danger is-light">
             <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
    </div>';
    exit();
}

//TODO:guardar datos en la bdd
$guardar_servicio= conexion();
$guardar_servicio= $guardar_servicio->prepare("INSERT INTO `pedidos`(`id_pedido`, `id_pizza`, `id_cliente` `fecha_pedido`) 
VALUES (:fecha_pedido)");

$marcadores = [
    ":fecha_pedido" => $nombre_servicio,


];
$guardar_servicio->execute($marcadores);

if ($guardar_servicio->rowCount() == 1) {
    echo '
    <article class="message is-success">
  <div class="message-header">
    <p>Cliente registrado</p>
    <button class="delete" aria-label="delete"></button>
  </div>
  <div class="message-body">
  El servicio ha sido registrado con exito
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
      Error al guardar el servicio, intente nuevamente
    </div>
  </article>
        ';
}
$guardar_servicio=null;


<?php
require_once "main.php";
$id_pizza = limpiar_cadena($_POST['usuario_id']);
$id_cliente= limpiar_cadena($_POST['cliente_id']);
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
$guardar_pedidos= conexion();
$guardar_pedidos= $guardar_pedidos->prepare("INSERT INTO `pedidos`( `id_pizza`, `id_cliente` `fecha_pedido`) 
VALUES (:id_pizza, id_cliente; :fecha_pedido )");

$marcadores = [
  ":id_pizza" => $id_pizza,
  ":id_cliente" => $id_cliente,
  ":fecha_pedido" => $fecha_pedido,


];


if ($guardar_pedidos->rowCount() == 1) {
    echo '
    <article class="message is-success">
  <div class="message-header">
    <p>Cliente registrado</p>
    <button class="delete" aria-label="delete"></button>
  </div>
  <div class="message-body">
  El pedidoha sido registrado con exito
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
      Error al guardar el pedido, intente nuevamente
    </div>
  </article>
        ';
}
$guardar_servicio=null;


<?php
require_once "main.php";

//TODO: almacenando datos
$idcliente = limpiar_cadena($_POST['id_cliente']);

$nombre_cli = limpiar_cadena($_POST['cliente_nombre']);


//TODO: verificar campos obligatorios
if (
    $idcliente == "" || $nombre_cli == "" 
) {
    echo '
    <div class="notification is-danger is-light">
             <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
    </div>';
    exit();
}

if ($nombre_cli != "") {
    if (filter_var($nombre_cli, FILTER_VALIDATE_EMAIL)) {
        $check_nombre = conexion();
        $check_nombre = $check_nombre->query("SELECT email FROM clientes WHERE email='$nombre_cli'");
        if ($check_nombre->rowCount() > 0) {
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    El correo electrónico ingresado ya se encuentra registrado, por favor elija otro
                </div>
            ';
            exit();
        }
        $check_nombre = null;
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Ha ingresado un correo electrónico no valido
            </div>
        ';
        exit();
    }
}

$check_clientes = conexion();
$check_clientes = $check_cliente->query("SELECT id_cliente FROM clientes WHERE id_cliente='$idcliente'");
if ($check_clientes->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El cliente ingresada ya se encuentra registrada, por favor digite otra
            </div>
        ';
    exit();
}
$check_clientes = null;

//TODO:guardar datos en la bdd
$guardar_clientes = conexion();
$guardar_clientes = $guardar_clientes->prepare("INSERT INTO `clientes`(`id_cliente`, `nombre`) 
VALUES (:id_cliente,:nombre)");

$marcadores = [
    ":cliente" => $cliente_cli,
    ":nombre" => $nombre_cli,
   
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
$guardar_clientes=null;

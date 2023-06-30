<div class="container is-fluid mb-6">
    <h1 class="title">PIZZA</h1>
    <h2 class="subtitle">Lista de pizza</h2>
</div>

<div class="container pb-6 pt-6">

    <?php
    require_once "./php/main.php";
    if(!isset($_GET['page'])){
        $pagina=1;

    }else{
        $pagina=(int) $_GET['page'];
        if($pagina<=1){
            $pagina=1;
        }

    }
    $pagina=limpiar_cadena($pagina);
    $url="index.php?vista=pizza_list&page=";
    $registros=15;
    $busqueda="";
   



    //TODO: conexion al archivo pizza php
    require_once "./php/pizza_lista.php";
    ?>

</div>
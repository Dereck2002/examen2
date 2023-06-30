
<div class="container is-fluid mb-6">
    <h1 class="title">Servicios</h1>
    <h2 class="subtitle">Nuevo Servicio</h2>
</div>
<div class="container pb-6 pt-6">

    <div class="form-rest mb-6 mt-6"></div>

    <form action="./php/servicio_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">

    <div class="columns" style="width: 51%" >
        <div class="column" >
                <div class="control">
                    <label>Fecha Pedido</label>
                    <input class="input" type="date" name="nombre_servicio" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{0,100}"  maxlength="100" required>
                </div>
            </div>
            
            

        </div>

       
        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>
    </form>
</div>


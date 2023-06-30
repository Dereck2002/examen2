<div class="container is-fluid mb-6">
    <h1 class="title">Vehiculos</h1>
    <h2 class="subtitle">Nuevo Vehiculo</h2>
</div>
<div class="container pb-6 pt-6">

    <div class="form-rest mb-6 mt-6"></div>

    <form action="./php/vehiculos_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">

        <div class="columns" style="width: 51%">
        <div class="column">
                <div class="control">
                    <label>ID_pizza</label>
                    <input class="input" type="text" name="id_pizza" pattern="[0-9]+" minlength="1" maxlength="10" required>
                </div>
            </div>

            
        </div>
        
        <div class="columns">
        <div class="column">
                <div class="control">
                    <label>Nombre</label>
                    <input class="input" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\- ]{7,8}" maxlength="8" required>
                </div>
            </div>
            
        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>
    </form>
</div>
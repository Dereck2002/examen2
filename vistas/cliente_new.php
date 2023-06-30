
<div class="container is-fluid mb-6">
    <h1 class="title">Clientes</h1>
    <h2 class="subtitle">Nuevo cliente</h2>
</div>
<div class="container pb-6 pt-6">

    <div class="form-rest mb-6 mt-6"></div>

    <form action="./php/cliente_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">
        <div class="columns" style="width: 51%">
        <div class="column">
                <div class="control">
                    <label>ID</label>
                    <input class="input" type="text" name="cliente_cedula" pattern="[0-9]+" minlength="1" maxlength="10" required>
                </div>
            </div>

            
        </div>
        <div class="columns">
        <div class="column">
                <div class="control">
                    <label>Nombres</label>
                    <input class="input" type="text" name="cliente_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}"  maxlength="40" required>
                </div>
            </div>
            <div class="column">
           

        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>
    </form>
</div>


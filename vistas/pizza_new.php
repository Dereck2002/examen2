<div class="container is-fluid mb-6">
    <h1 class="title">Pizza</h1>
    <h2 class="subtitle">Nueva pizza</h2>
</div>
<div class="container pb-6 pt-6">

    <div class="form-rest mb-6 mt-6"></div>

    <form action="./php/pizza_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">

        
        <div class="columns">
        <div class="column">
                <div class="control">
                    <label>Nombre</label>
                    <input class="input" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\- ]{1,8}" maxlength="8" required>
                </div>
            </div>
            
        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>
    </form>
</div>
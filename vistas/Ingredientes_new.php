<div class="container is-fluid mb-6">
	<h1 class="title">Ingredientes</h1>
	<h2 class="subtitle">Nuevo ingrediente</h2>
</div>
<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/ingredientes_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
        <div class="column">
                <div class="control">
                    <label>ID Pizza</label>
                    <input class="input" type="text" name="pizza_id" pattern="[A-Za-z0-9]+{1,100}" maxlength="100" required>
                </div>
            </div>
			<div class="column">
		    	<div class="control">
					<label>Nombre</label>
                    <input class="input" type="text" name="nombre_ingrediente" pattern="[A-Za-z0-9]+{3,100}" maxlength="100" required>
				</div>
		  	</div>
		</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>
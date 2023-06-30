<div class="container is-fluid mb-6">
	<h1 class="title">Usuarios</h1>
	<h2 class="subtitle">Nuevo usuario</h2>
</div>
<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/pedidos_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>ID del pizza</label>
                    <input class="input" type="int" name="usuario_id" pattern="[0-9]+" minlength="1" maxlength="11" required>
				</div>
		  	</div> 
		  	<div class="column">
		    	<div class="control">
					<label>ID del cliente</label>
                    <input class="input" type="int" name="cliente_id" pattern="[A-Za-z0-9]+{1,100}" maxlength="11" required>
				</div>
		  	</div>
		</div>
		
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>fecha del pedido</label>
				  	<input class="input" type="date" name="fecha_pedido" pattern="[a-zA-Z0-9$@.-]{3,150}" maxlength="150" required >
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>
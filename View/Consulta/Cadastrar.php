<br><div class="container">
	<div class="row">
		<div class="col-md-3">&nbsp;</div>
		<div class="col-md-6 center"><h1><b>Nova Consulta</b></h1></div>
		<div class="col-md-3">&nbsp;</div>
	</div><hr>

	<form method="POST" action="index.php?route=insertConsulta">	
		<input type="hidden" name="id">
		<div class="row">
			<div class="col-md-3">
				<label>Temperatura</label>
				<input type="number" name="temperatura_entrada" id="temperatura_entrada" class="form-control" required>
			</div>

			<div class="col-md-3">
				<label>Tipo</label>
				<select name="tipo_entrada" id="tipo_entrada" class="form-control" required>
					<option value="">Selecione</option>
					<option value="C">Celsius</option>
					<option value="F">Fahrenheit</option>
				</select>
			</div>			
		</div><br>

		<div class="row">
			<div class="col-md-3">
				<label>Resposta</label>
				<input type="text" name="temperatura_resposta" id="temperatura_resposta" class="form-control" required readonly>
			</div>
		</div><br>	

		<div class="row">
			<div class="col-md-2">
				<button class="btn btn-success form-control"><b><i class="glyphicon glyphicon-plus"></i>Cadastrar</b></button>
			</div>&nbsp;

			<div class="col-md-2">
				<a class="btn btn-danger form-control" href="index.php?route=listConsultas"><b><i class="glyphicon glyphicon-remove"></i>&nbsp;Cancelar</b></a>
			</div>&nbsp;			
		</div>
	</form>
</div>
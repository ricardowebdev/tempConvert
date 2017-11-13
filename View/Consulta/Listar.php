	<br><div class="container-fluid">
		<div class="row">
			<div class="col-md-3">&nbsp;</div>
			<div class="col-md-6 center"><h1><b>Consultas</b></h1></div>
			<div class="col-md-3">&nbsp;</div>
		</div><br>

		<div class="row">
			<div class="col-md-2">
				<a href="index.php?route=newConsulta" class="btn btn-primary">
					<b><i class="glyphicon glyphicon-plus"></i>&nbsp;Adicionar</b>
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12" style="padding: 25px;">
				<table class="table table-striped" id="table">
				    <thead>
				        <tr>
				            <th>#</th>
				            <th>Temperatura Entrada</th>
				            <th>Temperatura Resposta</th>
				            <th>Data da consulta</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php foreach ($dados as $consulta) : ?>
				    		<tr>	
					        	<th scope="row"><?= $consulta->getId(); ?></th>		         
					            <td>
					            	<?= $consulta->getTempEntrada()."º".$consulta->getTipoEntrada() ?>
					            </td>
					            <td>
					            	<?= $consulta->getTempResposta(); ?>º <?= $consulta->getTipoEntrada() == "C" ? "F" : "C" ?>
					            </td>
					            <td>
					            	<?= $consulta->getDataHora(); ?>
					            </td>
					        </tr>
					    <?php endforeach ?>    
	  			    </tbody>
				</table>				
			</div>			
		</div>
	</div>
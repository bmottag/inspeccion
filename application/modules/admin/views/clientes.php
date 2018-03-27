<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Listado de Clientes 
						<small>
							<a href="<?php echo base_url("admin/add_cliente"); ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar </a>
						</small>
					</h2> 
					
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

					</ul>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<div class="table-responsive">
						<table class="table table-striped jambo_table bulk_action">
							<thead>
								<tr class="headings">
								<th class="column-title">Nombre </th>
								<th class="column-title">Correo</th>
								<th class="column-title">No. Celular</th>
								<th class="column-title">Editar</th>
								</tr>
							</thead>

							<tbody>
					
					
		<?php 
			foreach ($info as $data):
				echo "<tr>";
				echo "<td>" . $data['first_name'] . " " . $data['last_name'] . "</td>";
				echo "<td>" . $data['email'] . "</td>";
				echo "<td>" . $data['movil'] . "</td>";
				echo "<td class='text-center'>";
				echo "<a href='" . base_url("admin/add_cliente/" . $data['id_user']) . "' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Editar </a>";
				echo "</td>";
				echo "</tr>";
			endforeach 
		?>
					


							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
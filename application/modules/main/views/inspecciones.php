<script type="text/javascript" src="<?php echo base_url("assets/js/validate/main/inspeccion.js"); ?>"></script>

<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Listado de inventarios	</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				
					<div class="alert alert-warning alert-dismissible fade in" role="alert">
						<strong>Info:</strong> Listado de inventarios - Check In - Check Out, organizadas del más reciente al más antiguo.
					</div>
					

						<table class="table table-striped projects">
							<thead>
								<tr>
									<th style="width: 1%">#</th>
									<th style="width: 15%">Fecha</th>
									<th style="width: 10%">Tipo inspección</th>
									<th style="width: 20%">Inspector</th>
									<th style="width: 20%">Cliente</th>
									<th>Observaciones</th>
								</tr>
							</thead>
							<tbody>
		<?php 
			if($information){
				foreach ($information as $data):
					echo "<tr>";
					echo "<td>" . $data['id_inspeccion'] . "</td>";
					echo "<td>" . $data['date_inspeccion'] . "</td>";
					echo "<td class='text-center'>";
						switch ($data['tipo_inspeccion']) {
							case 1:
								echo "<a href='" . base_url("main/checkin/" . $data['fk_id_user_cliente'] . "/". $data['id_inspeccion']) . "' class='btn btn-info btn-xs'><i class='fa fa-arrow-right'></i> Check In </a>";
									break;
							case 2:
								echo "<a href='" . base_url("main/checkout/" . $data['fk_id_user_cliente'] . "/". $data['id_inspeccion']) . "' class='btn btn-danger btn-xs'><i class='fa fa-arrow-left'></i> Check Out </a>";					
								break;
						}
					echo "</td>";
					echo "<td>" . $data['inspector'] . "</td>";
					echo "<td>" . $data['cliente'] . "</td>";
					echo "<td>" . $data['observaciones'] . "</td>";
					echo "</tr>";
				endforeach;
			}
		?>
								
							</tbody>
						</table>
						

				</div>
			</div>
		</div>
	</div>
</div>
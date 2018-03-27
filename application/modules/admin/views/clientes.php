<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Listado de Clientes</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

						<li><a class="close-link"><i class="fa fa-close"></i></a>
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
								</th>
								<th class="bulk-actions" colspan="7">
								  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
								</th>
								</tr>
							</thead>

							<tbody>
					
					
		<?php 
			foreach ($info as $data):
				echo "<tr>";
				echo "<td>" . $data['first_name'] . " " . $data['last_name'] . "</td>";
				echo "<td>" . $data['email'] . "</td>";
				echo "<td>" . $data['movil'] . "</td>";
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
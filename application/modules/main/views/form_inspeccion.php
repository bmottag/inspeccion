<script type="text/javascript" src="<?php echo base_url("assets/js/validate/main/inspeccion.js"); ?>"></script>

<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Adicionar / Editar Inspección</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				
<?php
$retornoExito = $this->session->flashdata('retornoExito');
if ($retornoExito) {
    ?>
	<div class="alert alert-success alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		<strong>Ok!</strong> <?php echo $retornoExito ?>	
	</div>
    <?php
}

$retornoError = $this->session->flashdata('retornoError');
if ($retornoError) {
    ?>
	<div class="alert alert-danger alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		<strong>Error!</strong> <?php echo $retornoError ?>
	</div>	
    <?php
}
?> 

					<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
					
						<h4><?php echo $userInfo?$userInfo[0]["first_name"] . " " . $userInfo[0]["last_name"]:""; ?></h4>

						<ul class="list-unstyled user_data">
							<li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $userInfo?$userInfo[0]["movil"]:""; ?>
							</li>

							<li>
								<i class="fa fa-briefcase user-profile-icon"></i> <?php echo $userInfo?$userInfo[0]["email"]:""; ?>
							</li>
						</ul>
					 </div>

					<div class="col-md-9 col-sm-9 col-xs-12">

					<form id="form" data-parsley-validate class="form-horizontal form-label-left">
						<input type="hidden" id="hddIdUserCliente" name="hddIdUserCliente" value="<?php echo $userInfo?$userInfo[0]["id_user"]:""; ?>"/>
						<input type="hidden" id="hddIdInspeccion" name="hddIdInspeccion" value="<?php echo $information?$information[0]["id_inspeccion"]:""; ?>"/>
					
						<table class="table table-striped projects">
							<thead>
								<tr>
									<th style="width: 20%">Item</th>
									<th style="width: 30%">Descripción</th>
									<th>Cantidad</th>
									<th>Ok / Falta</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Nevecon</td>
									<td>LG  Escarcha 646 L Inox</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="nevecon" id="nevecon1" value=1 <?php if($information && $information[0]["nevecon"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="nevecon" id="nevecon2" value=2 <?php if($information && $information[0]["nevecon"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Televisor </td>
									<td>Tv Samsung Led Curvo De 55 Pulgadas Uhd 4k Smart tv</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="televisor" id="televisor1" value=1 <?php if($information && $information[0]["televisor"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="televisor" id="televisor2" value=2 <?php if($information && $information[0]["televisor"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Lavadora</td>
									<td>Lavadora Haceb Sec 16 Kg 33 Libras</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="lavadora" id="lavadora1" value=1 <?php if($information && $information[0]["lavadora"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="lavadora" id="lavadora2" value=2 <?php if($information && $information[0]["lavadora"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Mueble</td>
									<td>Mesa televisor color cenisa </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="mueble" id="mueble1" value=1 <?php if($information && $information[0]["mueble"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="mueble" id="mueble2" value=2 <?php if($information && $information[0]["mueble"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Sofa</td>
									<td>Sofa en L con 6 almohadas de espaldar</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="sofa" id="sofa1" value=1 <?php if($information && $information[0]["sofa"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="sofa" id="sofa2" value=2 <?php if($information && $information[0]["sofa"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Almohadas</td>
									<td>Almohadas negras de acompañamiento (Sofa en L)</td>
									<td>3</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="almohadas_sofa" id="almohadas_sofa1" value=1 <?php if($information && $information[0]["almohadas_sofa"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="almohadas_sofa" id="almohadas_sofa2" value=2 <?php if($information && $information[0]["almohadas_sofa"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Licuadora</td>
									<td>Black and decker</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="licuadora" id="licuadora1" value=1 <?php if($information && $information[0]["licuadora"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="licuadora" id="licuadora2" value=2 <?php if($information && $information[0]["licuadora"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Sandwichera</td>
									<td>Recco blanca </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="sandwichera" id="sandwichera1" value=1 <?php if($information && $information[0]["sandwichera"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="sandwichera" id="sandwichera2" value=2 <?php if($information && $information[0]["sandwichera"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Vajilla </td>
									<td>Set de 12 puestos blanca</td>
									<td>60</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="vajilla" id="vajilla1" value=1 <?php if($information && $information[0]["vajilla"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="vajilla" id="vajilla2" value=2 <?php if($information && $information[0]["vajilla"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Vasos</td>
									<td>En cristal para jugo</td>
									<td>16</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="vasos" id="vasos1" value=1 <?php if($information && $information[0]["vasos"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="vasos" id="vasos2" value=2 <?php if($information && $information[0]["vasos"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Copas de vino </td>
									<td>5  redondas y 5 de champaña</td>
									<td>10</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="copas" id="copas1" value=1 <?php if($information && $information[0]["copas"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="copas" id="copas2" value=2 <?php if($information && $information[0]["copas"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Control Remoto</td>
									<td>Rojo Claro Deco</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="control_rojo" id="control_rojo1" value=1 <?php if($information && $information[0]["control_rojo"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="control_rojo" id="control_rojo2" value=2 <?php if($information && $information[0]["control_rojo"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Control Remoto</td>
									<td>Samsung negro en perfecto estado (Tv) </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="control_samsung" id="control_samsung1" value=1 <?php if($information && $information[0]["control_samsung"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="control_samsung" id="control_samsung2" value=2 <?php if($information && $information[0]["control_samsung"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Control Remoto</td>
									<td>Westinghouse blanco en perfecto estado (Fans)</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="control_westinghouse" id="control_westinghouse1" value=1 <?php if($information && $information[0]["control_westinghouse"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="control_westinghouse" id="control_westinghouse2" value=2 <?php if($information && $information[0]["control_westinghouse"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Control Remoto</td>
									<td>Samsung blanco en perfecto estado (A/C)</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="control_blanco" id="control_blanco1" value=1 <?php if($information && $information[0]["control_blanco"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="control_blanco" id="control_blanco2" value=2 <?php if($information && $information[0]["control_blanco"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Decodificadores</td>
									<td>Claro, negros en perfecto estado</td>
									<td>2</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="decodificadores" id="decodificadores1" value=1 <?php if($information && $information[0]["decodificadores"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="decodificadores" id="decodificadores2" value=2 <?php if($information && $information[0]["decodificadores"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Internet </td>
									<td>Multiconector </td>
									<td></td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="internet" id="internet1" value=1 <?php if($information && $information[0]["internet"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="internet" id="internet2" value=2 <?php if($information && $information[0]["internet"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Ozom </td>
									<td>Router</td>
									<td></td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="router" id="router1" value=1 <?php if($information && $information[0]["router"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="router" id="router2" value=2 <?php if($information && $information[0]["router"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Ozom</td>
									<td>Sensor de apertura</td>
									<td></td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="sensor" id="sensor1" value=1 <?php if($information && $information[0]["sensor"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="sensor" id="sensor2" value=2 <?php if($information && $information[0]["sensor"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Ozom </td>
									<td>Camara Interior</td>
									<td></td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="camara" id="camara1" value=1 <?php if($information && $information[0]["camara"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="camara" id="camara2" value=2 <?php if($information && $information[0]["camara"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Ozom</td>
									<td>Sirena</td>
									<td></td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="sirena" id="sirena1" value=1 <?php if($information && $information[0]["sirena"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="sirena" id="sirena2" value=2 <?php if($information && $information[0]["sirena"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Set de ollas</td>
									<td>Remy-oliver set de 5 hollas con 5 tapas </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="ollas" id="ollas1" value=1 <?php if($information && $information[0]["ollas"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="ollas" id="ollas2" value=2 <?php if($information && $information[0]["ollas"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Chocolatera</td>
									<td>2 litros</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="chocolatera" id="chocolatera1" value=1 <?php if($information && $information[0]["chocolatera"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="chocolatera" id="chocolatera2" value=2 <?php if($information && $information[0]["chocolatera"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Set </td>
									<td>Hoja Bedul </td>
									<td>2</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="hoja_bedul" id="hoja_bedul1" value=1 <?php if($information && $information[0]["hoja_bedul"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="hoja_bedul" id="hoja_bedul2" value=2 <?php if($information && $information[0]["hoja_bedul"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Bandeja</td>
									<td>Trebol  </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="bandeja" id="bandeja1" value=1 <?php if($information && $information[0]["bandeja"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="bandeja" id="bandeja2" value=2 <?php if($information && $information[0]["bandeja"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Colador</td>
									<td>11 pulgadas con mango de madera  </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="colador" id="colador1" value=1 <?php if($information && $information[0]["colador"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="colador" id="colador2" value=2 <?php if($information && $information[0]["colador"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Rayador </td>
									<td>Metalico con protectores morados</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="rayador" id="rayador1" value=1 <?php if($information && $information[0]["rayador"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="rayador" id="rayador2" value=2 <?php if($information && $information[0]["rayador"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Guante</td>
									<td>Para manipular ollas calientes (Blanco)</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="guante" id="guante1" value=1 <?php if($information && $information[0]["guante"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="guante" id="guante2" value=2 <?php if($information && $information[0]["guante"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Limpiones </td>
									<td>Limpiones (Blanco)</td>
									<td>2</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="limpiones" id="limpiones1" value=1 <?php if($information && $information[0]["limpiones"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="limpiones" id="limpiones2" value=2 <?php if($information && $information[0]["limpiones"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Cucharones</td>
									<td>Metalicos con mango negro</td>
									<td>3</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="cucharones" id="cucharones1" value=1 <?php if($information && $information[0]["cucharones"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="cucharones" id="cucharones2" value=2 <?php if($information && $information[0]["cucharones"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Cucharones</td>
									<td>Madera </td>
									<td>2</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="cucharones2" id="cucharones21" value=1 <?php if($information && $information[0]["cucharones2"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="cucharones2" id="cucharones22" value=2 <?php if($information && $information[0]["cucharones2"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Descorchador</td>
									<td>Metalico</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="descorchador" id="descorchador1" value=1 <?php if($information && $information[0]["descorchador"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="descorchador" id="descorchador2" value=2 <?php if($information && $information[0]["descorchador"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Cuchillos</td>
									<td>Tipo cheff </td>
									<td>2</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="cuchillos" id="cuchillos1" value=1 <?php if($information && $information[0]["cuchillos"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="cuchillos" id="cuchillos2" value=2 <?php if($information && $information[0]["cuchillos"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Kit plasticos</td>
									<td>Set de contenedores plasticos</td>
									<td>12</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="contenedores" id="contenedores1" value=1 <?php if($information && $information[0]["contenedores"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="contenedores" id="contenedores2" value=2 <?php if($information && $information[0]["contenedores"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Micro-ondas</td>
									<td>whirpool  </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="microondas" id="microondas1" value=1 <?php if($information && $information[0]["microondas"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="microondas" id="microondas2" value=2 <?php if($information && $information[0]["microondas"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Arreglo florar </td>
									<td>80 cm vidrio, Con ponpom neranja </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="arreglo" id="arreglo1" value=1 <?php if($information && $information[0]["arreglo"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="arreglo" id="arreglo2" value=2 <?php if($information && $information[0]["arreglo"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Papeleras</td>
									<td>4.5 litros viniplar round step</td>
									<td>4</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="papelera" id="papelera1" value=1 <?php if($information && $information[0]["papelera"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="papelera" id="papelera2" value=2 <?php if($information && $information[0]["papelera"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Toalla  </td>
									<td>De salida color gris 40 x 52 cm</td>
									<td>3</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="toalla" id="toalla1" value=1 <?php if($information && $information[0]["toalla"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="toalla" id="toalla2" value=2 <?php if($information && $information[0]["toalla"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Toalla</td>
									<td>De manos HC Rino color blanco con franjas grises 50 x 68 cm</td>
									<td>4</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="toalla_mano" id="toalla_mano1" value=1 <?php if($information && $information[0]["toalla_mano"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="toalla_mano" id="toalla_mano2" value=2 <?php if($information && $information[0]["toalla_mano"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Toalla </td>
									<td>Cannon 70 x 152 cm color blanco</td>
									<td>4</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="toalla_grande" id="toalla_grande1" value=1 <?php if($information && $information[0]["toalla_grande"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="toalla_grande" id="toalla_grande2" value=2 <?php if($information && $information[0]["toalla_grande"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Dispensador</td>
									<td>Jabon Finlandek Acero inoxidable/acrilico </td>
									<td>4</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="dispensador" id="dispensador1" value=1 <?php if($information && $information[0]["dispensador"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="dispensador" id="dispensador2" value=2 <?php if($information && $information[0]["dispensador"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Adornos </td>
									<td>Flor artificial tamaño mini</td>
									<td>4</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="adornos" id="adornos1" value=1 <?php if($information && $information[0]["adornos"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="adornos" id="adornos2" value=2 <?php if($information && $information[0]["adornos"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Nidos</td>
									<td>Single </td>
									<td>2</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="nodos_single" id="nodos_single1" value=1 <?php if($information && $information[0]["nodos_single"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="nodos_single" id="nodos_single2" value=2 <?php if($information && $information[0]["nodos_single"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Cama </td>
									<td>Twin</td>
									<td>2</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="cama_twin" id="cama_twin1" value=1 <?php if($information && $information[0]["cama_twin"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="cama_twin" id="cama_twin2" value=2 <?php if($information && $information[0]["cama_twin"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Cama</td>
									<td>Queen </td>
									<td>2</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="cama_queen" id="cama_queen1" value=1 <?php if($information && $information[0]["cama_queen"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="cama_queen" id="cama_queen2" value=2 <?php if($information && $information[0]["cama_queen"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Cama </td>
									<td>King</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="cama_king" id="cama_king1" value=1 <?php if($information && $information[0]["cama_king"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="cama_king" id="cama_king2" value=2 <?php if($information && $information[0]["cama_king"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Nidos</td>
									<td>Queen</td>
									<td>2</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="nidos_queen" id="nidos_queen1" value=1 <?php if($information && $information[0]["nidos_queen"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="nidos_queen" id="nidos_queen2" value=2 <?php if($information && $information[0]["nidos_queen"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Almohadas</td>
									<td>Casa Bonita 45 x 65 cm </td>
									<td>10</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="almohadas_camas" id="almohadas_camas1" value=1 <?php if($information && $information[0]["almohadas_camas"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="almohadas_camas" id="almohadas_camas2" value=2 <?php if($information && $information[0]["almohadas_camas"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Sabanas</td>
									<td>Juego de Sabana, sobresabana y covertor almohada completos</td>
									<td>9</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="sabanas" id="sabanas1" value=1 <?php if($information && $information[0]["sabanas"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="sabanas" id="sabanas2" value=2 <?php if($information && $information[0]["sabanas"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Sala exterior</td>
									<td>Set HC Garden cafe con 3 sillas con 4 espaldares y 4 cojines </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="sala" id="sala1" value=1 <?php if($information && $information[0]["sala"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="sala" id="sala2" value=2 <?php if($information && $information[0]["sala"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Mesa</td>
									<td>Una mesa de centro con vidrio templado </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="mesa_centro" id="mesa_centro1" value=1 <?php if($information && $information[0]["mesa_centro"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="mesa_centro" id="mesa_centro2" value=2 <?php if($information && $information[0]["mesa_centro"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Balde</td>
									<td>Suministrador de agua/jabon limpia pisos </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="balde" id="balde1" value=1 <?php if($information && $information[0]["balde"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="balde" id="balde2" value=2 <?php if($information && $information[0]["balde"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Escoba </td>
									<td>En madera </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="escoba" id="escoba1" value=1 <?php if($information && $information[0]["escoba"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="escoba" id="escoba2" value=2 <?php if($information && $information[0]["escoba"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Recojedor </td>
									<td>Amarillo en plastico </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="recojedor" id="recojedor1" value=1 <?php if($information && $information[0]["recojedor"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="recojedor" id="recojedor2" value=2 <?php if($information && $information[0]["recojedor"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Trapero</td>
									<td>En madera </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="trapero" id="trapero1" value=1 <?php if($information && $information[0]["trapero"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="trapero" id="trapero2" value=2 <?php if($information && $information[0]["trapero"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Sombrilla</td>
									<td>Base unicamente</td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="sombrilla" id="sombrilla1" value=1 <?php if($information && $information[0]["sombrilla"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="sombrilla" id="sombrilla2" value=2 <?php if($information && $information[0]["sombrilla"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Tapete </td>
									<td>Entrada principal color negro (Welcome) </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="tapete" id="tapete1" value=1 <?php if($information && $information[0]["tapete"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="tapete" id="tapete2" value=2 <?php if($information && $information[0]["tapete"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Extintor</td>
									<td>Amarillo Clase ABC </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="extintor" id="extintor1" value=1 <?php if($information && $information[0]["extintor"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="extintor" id="extintor2" value=2 <?php if($information && $information[0]["extintor"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Botiquin</td>
									<td>Vital + botiquines Siden </td>
									<td>1</td>
									<td class="project_progress">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="botiquin" id="botiquin1" value=1 <?php if($information && $information[0]["botiquin"] == 1) { echo "checked"; }  ?>>Ok
											</label>
											<label class="radio-inline">
												<input type="radio" name="botiquin" id="botiquin2" value=2 <?php if($information && $information[0]["botiquin"] == 2) { echo "checked"; }  ?>>Falta
											</label>						
										</div>
									</td>
								</tr>
								
							</tbody>
						</table>
						

						<div class="form-group">
							<label for="observaciones" class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="observaciones" name="observaciones" placeholder="Observaciones"  class="form-control" rows="3"><?php echo $information?$information[0]["observaciones"]:""; ?></textarea>
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<div class="row" align="center">
									<div style="width:50%;" align="center">
										<button type="button" id="btnSubmit" name="btnSubmit" class='btn btn-success'>
												Guardar <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
										</button>								
									</div>
								</div>
							</div>
						</div>
												
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								
								<div id="div_load" style="display:none">		
									<div class="progress progress-striped active">
										<div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
											<span class="sr-only">45% completado</span>
										</div>
									</div>
								</div>
								<div id="div_error" style="display:none">			
									<div class="alert alert-danger"><span class="glyphicon glyphicon-remove" id="span_msj"> &nbsp;</span></div>
								</div>	
								
							</div>
						</div>

					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
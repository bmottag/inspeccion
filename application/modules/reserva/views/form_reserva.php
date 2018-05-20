<script type="text/javascript" src="<?php echo base_url("assets/js/validate/reserva/reserva.js"); ?>"></script>

<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><i class='fa fa-hand-o-up'></i> RESERVAR</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				
					<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
					
						<h4><?php echo $userInfo?$userInfo[0]["first_name"] . " " . $userInfo[0]["last_name"]:""; ?></h4>

						<ul class="list-unstyled user_data">
							<li><i class="fa fa-phone user-profile-icon"></i> <?php echo $userInfo?$userInfo[0]["movil"]:""; ?>
							</li>

							<li>
								<i class="fa fa-envelope user-profile-icon"></i> <?php echo $userInfo?$userInfo[0]["email"]:""; ?>
							</li>
				
					 </div>
				
					<div class="col-md-9 col-sm-9 col-xs-12">
					
						<div class="alert alert-success alert-dismissible fade in" role="alert">
							<strong>Info:</strong> 
							<ul>
								<li>Ingresar los datos del formulario para la nueva reserva. </li>
							</ul>
						</div>
				
<!-- FORMULARIO -->
					<form id="form" data-parsley-validate class="form-horizontal form-label-left">
						<input type="hidden" id="hddIdUserCliente" name="hddIdUserCliente" value="<?php echo $userInfo?$userInfo[0]["id_user"]:""; ?>"/>
						<input type="hidden" id="hddIdReserva" name="hddIdReserva" value="<?php echo $information?$information[0]["id_reserva"]:""; ?>" >
						
						<div class="ln_solid"></div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_huespedes">Número huéspedes <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="numero_huespedes" id="numero_huespedes" class="form-control" required>
									<option value='' >Select...</option>
									<?php for ($i = 1; $i <= 15; $i++) { ?>
										<option value='<?php echo $i; ?>' <?php if ($information && $i == $information[0]["numero_huespedes"]) { echo 'selected="selected"'; } ?> ><?php echo $i; ?></option>
									<?php } ?>									
								</select>
							</div>
						</div>


<script type="text/javascript">
	$(function(){	
		$('#start_date').daterangepicker({
			locale: {
				format: 'YYYY-MM-DD'
			},
			minDate: moment(),
			singleDatePicker: true,
			singleClasses: "picker_1"
		}, function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
		});
	})
</script>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Fecha checkin <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
				
<fieldset>
	<div class="control-group">
		<div class="controls">
			<div class="col-md-11 xdisplay_inputx form-group has-feedback">
				<input type="text" class="form-control has-feedback-left" id="start_date" name="start_date" aria-describedby="inputSuccess2Status">
				<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
				<span id="inputSuccess2Status" class="sr-only">(success)</span>
			</div>
		</div>
	</div>
</fieldset>	
							
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hora_inicio">Hora checkin <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="hora_inicio" id="hora_inicio" class="form-control" >
									<option value=''>Select...</option>
									<?php for ($i = 0; $i < count($horas); $i++) { ?>
										<option value="<?php echo $horas[$i]["id_hora"]; ?>" 
										<?php 
										if ($information && $horas[$i]["id_hora"] == $information[0]["fk_id_hora_checkin"]) 
										{ 
											echo 'selected="selected"'; 
										}  
										?> ><?php echo $horas[$i]["hora"]; ?>
										</option>	
									<?php } ?>
								</select>
							</div>
						</div>
			
<script type="text/javascript">
	$(function(){	
		$('#finish_date').daterangepicker({
			locale: {
				format: 'YYYY-MM-DD'
			},
			minDate: moment(),
			singleDatePicker: true,
			singleClasses: "picker_1"
		}, function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
		});
	})
</script>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="finish_date">Fecha checkout <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">				
<fieldset>
	<div class="control-group">
		<div class="controls">
			<div class="col-md-11 xdisplay_inputx form-group has-feedback">
				<input type="text" class="form-control has-feedback-left" id="finish_date" name="finish_date" aria-describedby="inputSuccess2Status">
				<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
				<span id="inputSuccess2Status" class="sr-only">(success)</span>
			</div>
		</div>
	</div>
</fieldset>	
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hora_final">Hora checkout <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="hora_final" id="hora_final" class="form-control" >
									<option value=''>Select...</option>
									<?php for ($i = 0; $i < count($horas); $i++) { ?>
										<option value="<?php echo $horas[$i]["id_hora"]; ?>" 
										<?php 
										if ($information && $horas[$i]["id_hora"] == $information[0]["fk_id_hora_checkout"]) 
										{ 
											echo 'selected="selected"'; 
										}
										?> ><?php echo $horas[$i]["hora"]; ?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>						

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
							<div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-1">
								
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
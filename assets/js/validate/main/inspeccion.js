$( document ).ready( function () {
			
	$( "#form" ).validate( {
		rules: {
			nevecon:					{ required: true },
			televisor:					{ required: true },
			lavadora:					{ required: true },
			mueble:						{ required: true },
			sofa:						{ required: true },
			almohadas_sofa:				{ required: true },
			licuadora:					{ required: true },
			sandwichera:				{ required: true },
			vajilla:					{ required: true },
			vasos:						{ required: true },
			copas:						{ required: true },
			control_rojo:				{ required: true },
			control_samsung:			{ required: true },
			control_westinghouse:		{ required: true },
			control_blanco:				{ required: true },
			decodificadores:			{ required: true },
			internet:					{ required: true },
			router:						{ required: true },
			sensor:						{ required: true },
			camara:						{ required: true },
			sirena:						{ required: true },
			ollas:						{ required: true },
			chocolatera:				{ required: true },
			hoja_bedul:					{ required: true },
			bandeja:					{ required: true },
			colador:					{ required: true },
			rayador:					{ required: true },
			guante:						{ required: true },
			limpiones:					{ required: true },
			cucharones:					{ required: true },
			cucharones2:				{ required: true },
			descorchador:				{ required: true },
			cuchillos:					{ required: true },
			contenedores:				{ required: true },
			microondas:					{ required: true },
			arreglo:					{ required: true },
			papelera:					{ required: true },
			toalla:						{ required: true },
			toalla_mano:				{ required: true },
			toalla_grande:				{ required: true },
			dispensador:				{ required: true },
			adornos:					{ required: true },
			nodos_single:				{ required: true },
			cama_twin:					{ required: true },
			cama_queen:					{ required: true },
			cama_king:					{ required: true },
			nidos_queen:				{ required: true },
			almohadas_camas:			{ required: true },
			sabanas:					{ required: true },
			sala:						{ required: true },
			mesa_centro:				{ required: true },
			balde:						{ required: true },
			escoba:						{ required: true },
			recojedor:					{ required: true },
			trapero:					{ required: true },
			sombrilla:					{ required: true },
			tapete:						{ required: true },
			extintor:					{ required: true },
			botiquin:					{ required: true }
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );
			error.insertAfter( element );

		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-3" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-3" ).addClass( "has-success" ).removeClass( "has-error" );
		},
		submitHandler: function (form) {
			return true;
		}
	});
			
	$("#btnSubmit").click(function(){		
	
		if ($("#form").valid() == true){
		
				//Activa icono guardando
				$('#btnSubmit').attr('disabled','-1');
				$("#div_guardado").css("display", "none");
				$("#div_error").css("display", "none");
				$("#div_msj").css("display", "none");
				$("#div_cargando").css("display", "inline");

			
				$.ajax({
					type: "POST",	
					url: base_url + "more/save_inspeccion",	
					data: $("#form").serialize(),
					dataType: "json",
					contentType: "application/x-www-form-urlencoded;charset=UTF-8",
					cache: false,
					
					success: function(data){
                                            
						if( data.result == "error" )
						{
							//alert(data.mensaje);
							$("#div_cargando").css("display", "none");
							$('#btnSubmit').removeAttr('disabled');							
							
							$("#span_msj").html(data.mensaje);
							$("#div_msj").css("display", "inline");
							return false;
						
						} 

						
										
						if( data.result )//true
						{	                                                        
							$("#div_cargando").css("display", "none");
							$("#div_guardado").css("display", "inline");
							$('#btnSubmit').removeAttr('disabled');

							var url = base_url + "more/add_environmental/" + data.idRecord + "/" + data.idEnvironmental;
							$(location).attr("href", url);
						}
						else
						{
							alert('Error. Reload the web page.');
							$("#div_cargando").css("display", "none");
							$("#div_error").css("display", "inline");
							$('#btnSubmit').removeAttr('disabled');
						}	
					},
					error: function(result) {
						alert('Error. Reload the web page.');
						$("#div_cargando").css("display", "none");
						$("#div_error").css("display", "inline");
						$('#btnSubmit').removeAttr('disabled');
					}
					
		
				});	
		
		}else{
			alert("There are missing fields.");
		}
	});
	

});
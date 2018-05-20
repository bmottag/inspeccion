<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
		$this->load->model("reserva_model");
    }
	
	public function calendario()
	{
		$this->load->model("general_model");
		$arrParam = array();
		$data['information'] = $this->general_model->get_reservas($arrParam);//info reservas
		
		$data["view"] = 'calendario';
		$this->load->view("layout", $data);
	}
	
	public function calendarioWeb()
	{
		$this->load->model("general_model");
		$arrParam = array();
		$data['information'] = $this->general_model->get_reservas($arrParam);//info reservas
		
		$this->load->view("calendario_web", $data);
	}
	
	/**
	 * Listado de reservas para un cliente
     * @since 19/5/2018
     * @author BMOTTAG
	 */
	public function index($idCliente, $idReserva = 'x')
	{			
		$this->load->model("general_model");
		$data['information'] = FALSE;
		
		$arrParam = array("idUser" => $idCliente);
		$data['userInfo'] = $this->general_model->get_user_list($arrParam);//info cliente
		
		$arrParam = array("idCliente" => $idCliente);
		
		//si envio el id, entonces busco la informacion 
		if ($idReserva != 'x') {
			$arrParam = array("idReserva" => $idReserva);
		}
		$data['information'] = $this->general_model->get_reservas($arrParam);//info reservas

		$data["view"] = 'reservas_cliente';
		$this->load->view("layout", $data);
	}

	/**
	* Muestra form para seleccionar fecha
	* @since 30/3/2018
	* @author BMOTTAG
	*/	
	public function form_reserva($idCliente, $idReserva = 'x')
	{						
		$this->load->model("general_model");
		$data['information'] = FALSE;
		
		$arrParam = array("idUser" => $idCliente);
		$data['userInfo'] = $this->general_model->get_user_list($arrParam);//info cliente
					
		$arrParamFiltro = array(
			"idHoraInicio" => 17, //8 am
			"idHoraFinal" => 46 // 10 pm
		);
		$data['horas'] = $this->general_model->get_horas($arrParamFiltro);//LISTA DE HORAS
		
		//si envio el id, entonces busco la informacion 
		if ($idReserva != 'x') {
			$arrParam = array("idReserva" => $idReserva);
		}
		$data['information'] = $this->general_model->get_reservas($arrParam);//info reservas
					
		$data['view'] = 'form_reserva';
		
		$this->load->view("layout",$data);
	}
	
	/**
	 * Save reserva
     * @since 20/5/2018
	 */
	public function save_reserva()
	{			
		header('Content-Type: application/json');
		$data = array();
		
		$data["idUser"] = $this->input->post('hddIdUserCliente');

		if ($idReserva = $this->reserva_model->saveReserva()) 
		{
			$data["result"] = true;
			$data["mensaje"] = "Se guardó la información con éxito.";
			$data["idReserva"] = $idReserva;
			$this->session->set_flashdata('retornoExito', 'Se guardó la información con éxito!!');
		} else {
			$data["result"] = "error";
			$data["mensaje"] = "Error!!! Ask for help.";
			$data["idReserva"] = "";
			$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Ask for help');
		}
		
		echo json_encode($data);
    }
	
	/**
	 * Listado de solicitudes para un usuario
     * @since 1/4/2018
     * @author BMOTTAG
	 */
	public function solicitudes_usuario($idUser, $idSolicitud = 'x')
	{			
		$this->load->model("general_model");
		$data['information'] = FALSE;
		
		$arrParam = array("idUser" => $idUser);
		$data['userInfo'] = $this->general_model->get_user_list($arrParam);//info cliente
		
		$arrParam = array("idUser" => $idUser);
		$data['information'] = $this->general_model->get_solicitudes($arrParam);//info solicitudes
		
		//si envio el id, entonces busco la informacion 
		if ($idSolicitud != 'x') {
			$arrParam = array("idSolicitud" => $idSolicitud);
			$data['information'] = $this->general_model->get_solicitudes($arrParam);//info inspecciones
		}

		$data["view"] = 'solicitudes_usuario';
		$this->load->view("layout", $data);
	}
	
	/**
	 * Eliminar reserva
     * @since 16/4/2018
	 */
	public function eliminar_reserva()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$data["idRecord"] = $this->session->userdata("id");
			$idSolicitud = $this->input->post('identificador');
			
			$this->load->model("general_model");

			$arrParam = array(
				"table" => "solicitud",
				"primaryKey" => "id_solicitud",
				"id" => $idSolicitud
			);
			
			if ($this->general_model->deleteRecord($arrParam)) {
				$data["result"] = true;
				$this->session->set_flashdata('retornoExito', 'Se eliminó el registro.');
			} else {
				$data["result"] = "error";
				$data["mensaje"] = "Error!!! Contactarse con el Administrador.";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el Administrador.');
			}				

			echo json_encode($data);
    }
	
	/**
	 * Lista de pruebas pr examen
     * @since 16/4/2018
	 */
    public function pruebaList()
	{
			header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos

			$arrParam['codigoExamen'] = $this->input->post('identificador');
			$this->load->model("general_model");
			$lista = $this->general_model->get_pruebas_by($arrParam);
		
			echo "<option value=''>Select...</option>";
			if ($lista) {
				foreach ($lista as $fila) {
					echo "<option value='" . $fila["idPrueba"] . "' >" . $fila["prueba"] . "</option>";
				}
			}
    }
	
	/**
	 * Form to update
     * @since 22/4/2018
     * @author BMOTTAG
	 */
	public function update_solicitud($idSolicitud = 'x')
	{			
			$this->load->model("general_model");
			
			//busco informacion de la solicitud
			$arrParam = array("idSolicitud" => $idSolicitud);
			$data['information'] = $this->general_model->get_solicitudes($arrParam);
			
			$data['fecha_apartada'] = $data['information'][0]["fecha_apartado"];
			
			$rol = $this->session->userdata("rol");//consulto rol para mostrar la lista de tipificacion
					
			$data['dataMensajeAlerta'] = FALSE;
			if($rol == 3){
				$usuario = "GESTOR";
				
				//revisar para rol GESTOR si es sabado o domingo la fecha de reserva	
				// si es domingo $dia tendra 0, si es sabado dia es 6			
				$dia=date("w", strtotime($data['fecha_apartada']));
				if($dia == 0 || $dia == 6){
					$data['dataMensajeAlerta'] = "Usted no tiene permisos para realizar reservas para los fines de semana.";
				}			
				
			}else{
				$usuario = "ADMON";
			}
			
			$arrParam = array("usuario" => $usuario);
			$data['tipificacion'] = $this->general_model->get_tipificacion($arrParam);
			
			//verifico el rol del usuario si es GESTOR solo se muestran las horas permitidas que estan configuradas
			//en la tabla de param_generales (hora inicio y hora fin)
			$arrParamFiltro = array();
			
			//BUSCO HORA INICIO Y HORA FINAL PARA USUARIO GESTOR y numero maximo de computadores
			$arrParamGeneral = array(
				"table" => "param_generales",
				"order" => "id_generales",
				"id" => "x"
			);
			$data['filtro'] = $this->general_model->get_basic_search($arrParamGeneral);
			
			if($rol == 3){
							
				$arrParamFiltro = array(
					"idHoraInicio" => $data['filtro'][0]['valor'],
					"idHoraFinal" => $data['filtro'][1]['valor']
				);
			}
			$data['horas'] = $this->general_model->get_horas($arrParamFiltro);//LISTA DE HORAS
			
			$data['examenes'] = $this->general_model->get_examenes();//listado de examenes
			
			//filtro de solicitudes por fecha
			$arrParam = array("fecha" => $data['fecha_apartada']);
			$data['solicitudes'] = $this->general_model->get_solicitudes($arrParam);//listado de solicitudes filtrado por fecha

			$data["view"] = 'form_solicitud';
			$this->load->view("layout", $data);
	}
	
	
	
}
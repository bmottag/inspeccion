<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
        $this->load->model("main_model");
		$this->load->helper('form');
    }

	/**
	 * Listado de inspecciones
     * @since 28/3/2018
     * @author BMOTTAG
	 */
	public function index()
	{			
		$this->load->model("general_model");
		$data['information'] = FALSE;
		
		$arrParam = array();
		$data['information'] = $this->main_model->get_inspecciones($arrParam);//info inspecciones

		$data["view"] = 'inspecciones';
		$this->load->view("layout", $data);
	}
	
	/**
	 * Listado de inspecciones para un cliente
     * @since 28/3/2018
     * @author BMOTTAG
	 */
	public function inspeccion_cliente($idCliente, $idInspeccion = 'x')
	{			
		$this->load->model("general_model");
		$data['information'] = FALSE;
		
		$arrParam = array("idUser" => $idCliente);
		$data['userInfo'] = $this->general_model->get_user_list($arrParam);//info cliente
		
		$arrParam = array(
						"idCliente" => $idCliente,
						"tipoInspeccion" => 1
					);
		$data['information'] = $this->main_model->get_inspecciones($arrParam);//info inspecciones
		
		//si envio el id, entonces busco la informacion 
		if ($idInspeccion != 'x') {
			$arrParam = array("idInspeccion" => $idInspeccion);
			$data['information'] = $this->main_model->get_inspecciones($arrParam);//info inspecciones
		}

		$data["view"] = 'inspecciones_cliente';
		$this->load->view("layout", $data);
	}
	
	/**
	 * Form inspeccion - checkin
     * @since 27/3/2018
     * @author BMOTTAG
	 */
	public function checkin($idCliente, $idInspeccion = 'x')
	{			
		$this->load->model("general_model");
		$data['information'] = FALSE;
		
		$arrParam = array("idUser" => $idCliente);
		$data['userInfo'] = $this->general_model->get_user_list($arrParam);//info cliente

		//si envio el id, entonces busco la informacion 
		if ($idInspeccion != 'x') {
			$arrParam = array("idInspeccion" => $idInspeccion);
			$data['information'] = $this->main_model->get_inspecciones($arrParam);//info inspecciones
		}

		$data["view"] = 'form_checkin';
		$this->load->view("layout", $data);
	}
	
	/**
	 * Save inspeccion
     * @since 27/3/2018
     * @author BMOTTAG
	 */
	public function save_inspeccion()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$data["idRecord"] = $this->input->post('hddIdUserCliente');

			if ($idInspeccion = $this->main_model->saveInspeccion()) 
			{
				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$data["idInspeccion"] = $idInspeccion;
				$this->session->set_flashdata('retornoExito', 'Se guardó la información con éxito!!');
			} else {
				$data["result"] = "error";
				$data["mensaje"] = "Error!!! Ask for help.";
				$data["idInspeccion"] = "";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Ask for help');
			}
			
			echo json_encode($data);
    }
	
	/**
	 * Form inspeccion - checkout
     * @since 28/3/2018
     * @author BMOTTAG
	 */
	public function checkout($idCliente, $idInspeccion = 'x')
	{			
		$this->load->model("general_model");
		
		$data['llaveForanea'] = $idInspeccion;
		
		$arrParam = array("idUser" => $idCliente);
		$data['userInfo'] = $this->general_model->get_user_list($arrParam);//info cliente

		$arrParam = array("fkIdInspeccion" => $idInspeccion);//se busca por checkout
		$data['information'] = $this->main_model->get_inspecciones($arrParam);//info inspecciones

		$data['bandera'] = FALSE;
		//si no hay informacion entonces consultamos la informacion del checkout
		if(!$data['information']){
			$arrParam = array("idInspeccion" => $idInspeccion);
			$data['information'] = $this->main_model->get_inspecciones($arrParam);//info inspecciones
			$data['bandera'] = TRUE;
		}

		$data["view"] = 'form_checkout';
		$this->load->view("layout", $data);
	}
	



	
}
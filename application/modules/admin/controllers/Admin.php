<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
        $this->load->model("admin_model");
		$this->load->helper('form');
    }
	
	/**
	 * cliente List
     * @since 22/3/2018
     * @author BMOTTAG
	 */
	public function cliente()
	{
		$this->load->model("general_model");
		$arrParam = array();
		$data['info'] = $this->general_model->get_user_list($arrParam);
		
		$data["view"] = 'clientes';
		$this->load->view("layout", $data);
	}
	
	/**
	 * Form cliente
     * @since 26/3/2018
     * @author BMOTTAG
	 */
	public function add_cliente($idCliente = 'x')
	{			
		$this->load->model("general_model");
		$data['information'] = FALSE;

		//si envio el id, entonces busco la informacion 
		if ($idCliente != 'x') {
			$arrParam = array("idUser" => $idCliente);
			$data['information'] = $this->general_model->get_user_list($arrParam);//info cliente
		}

		$data["view"] = 'form_cliente';
		$this->load->view("layout", $data);
	}
	
	/**
	 * Guardar cliente
     * @since 27/3/2018
	 */
	public function save_cliente()
	{			
			header('Content-Type: application/json');
			
			$idUser = $this->input->post('hddId');
			$log_user = $this->input->post('usuario');

			$msj = "Se adicionó el Cliente con éxito.";
			if ($idUser != '') {
				$msj = "Se guardó el Cliente con éxito.";
			}	
			
			
			$result_user = false;

			//verificar si ya existe el usuario
			$arrParam = array(
				"idUser" => $idUser,
				"column" => "log_user",
				"value" => $log_user
			);
			$result_user = $this->admin_model->verifyUser($arrParam);

//echo $this->db->last_query(); exit;
			
			if ($result_user) {
				$data["result"] = "error";
				if($result_user){
					$data["mensaje"] = " Error. El nombre de usuario ya existe.";
					$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> El nombre de usuario ya existe.');
				}
			} else {
			
				if ($idUser = $this->admin_model->saveCliente()) {
					$data["result"] = true;
					$data["idRecord"] = $idUser;
					$this->session->set_flashdata('retornoExito', $msj);
				} else {
					$data["result"] = "error";
					$data["idRecord"] = '';
					$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el Administrador.');
				}
			
			}

			echo json_encode($data);
    }


	
}
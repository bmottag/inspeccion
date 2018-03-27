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
		$data["idCliente"] = $idCliente;

		//si envio el id, entonces busco la informacion 
		if ($idCliente != 'x') {
			$arrParam = array("idCliente" => $idCliente);
			$data['information'] = $this->general_model->get_user_list($arrParam);//info cliente
		}

		$data["view"] = 'form_cliente';
		$this->load->view("layout", $data);
	}


	
}
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
     * Cargo modal - formulario Employee
     * @since 15/12/2016
     */
    public function cargarModalEmployee() 
	{
			header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos
			
			$data['information'] = FALSE;
			$data["idEmployee"] = $this->input->post("idEmployee");	
			
			if ($data["idEmployee"] != 'x') {
				$this->load->model("general_model");
				$arrParam = array(
					"table" => "user",
					"order" => "id_user",
					"column" => "id_user",
					"id" => $data["idEmployee"]
				);
				$data['information'] = $this->general_model->get_basic_search($arrParam);
			}
			
			$this->load->view("employee_modal", $data);
    }
	
	/**
	 * Update Employee
     * @since 15/12/2016
     * @author BMOTTAG
	 */
	public function save_employee()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$idUser = $this->input->post('hddId');

			$msj = "You have add a new Employee!!";
			if ($idUser != '') {
				$msj = "You have update an Employee!!";
			}			

			$log_user = $this->input->post('user');
			$social_insurance = $this->input->post('insuranceNumber');
			
			$result_user = false;
			$result_insurance = false;
			if ($idUser == '') {
				//Verify if the user already exist by the user name
				$arrParam = array(
					"column" => "log_user",
					"value" => $log_user
				);
				$result_user = $this->admin_model->verifyUser($arrParam);
				//Verify if the user already exist by the social insurance number
				$arrParam = array(
					"column" => "social_insurance",
					"value" => $social_insurance
				);
				$result_insurance = $this->admin_model->verifyUser($arrParam);
			}

			if ($result_user || $result_insurance) {
				$data["result"] = "error";
				if($result_user){
					$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> The user already exist by the user name.');
				}
				if($result_insurance){
					$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> The user already exist by the social insurance number.');
				}
				if($result_user && $result_insurance){
					$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> The user already exist by the user name and the social insurance number.');
				}
			} else {
					if ($this->admin_model->saveEmployee()) {
						$data["result"] = true;					
						$this->session->set_flashdata('retornoExito', $msj);
					} else {
						$data["result"] = "error";					
						$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Ask for help');
					}
			}

			echo json_encode($data);
    }
	


	
}
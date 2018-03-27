<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Admin_model extends CI_Model {

	    
		/**
		 * Verify if the user already exist by the social insurance number
		 * @author BMOTTAG
		 * @since  27/3/2018
		 */
		public function verifyUser($arrData) 
		{
				if (array_key_exists("idUser", $arrData)) {
					$this->db->where('id_user !=', $arrData["idUser"]);
				}			

				$this->db->where($arrData["column"], $arrData["value"]);
				$query = $this->db->get("user");

				if ($query->num_rows() >= 1) {
					return true;
				} else{ return false; }
		}
		
		/**
		 * Add/Edit CLIENTE
		 * @since 27/3/2018
		 */
		public function saveCliente() 
		{
				$idUser = $this->input->post('hddId');
				$email = $this->input->post('email');
				
				$data = array(
					'first_name' => $this->input->post('nombres'),
					'last_name' => $this->input->post('apellidos'),
					'log_user' => $this->input->post('usuario'),
					'email' => $this->input->post('email'),
					'movil' => $this->input->post('celular'),
				);	

				//revisar si es para adicionar o editar
				if ($idUser == '') {
					$data['fk_id_rol'] = 4;//cliente
					$data['birthdate'] = date("Y-m-d");
					$data['state'] = 1;
					$data['password'] = 'e10adc3949ba59abbe56e057f20f883e';//123456
					$data['address'] = '';
					$query = $this->db->insert('user', $data);
					$idUser = $this->db->insert_id();
				} else {
					$this->db->where('id_user', $idUser);
					$query = $this->db->update('user', $data);
				}
				if ($query) {
					return $idUser;
				} else {
					return false;
				}
		}
		
		
		
		
		
	    
	}
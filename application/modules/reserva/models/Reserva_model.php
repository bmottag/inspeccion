<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Reserva_model extends CI_Model {

		/**
		 * Get reservas list
		 * @since 19/5/2018
		 */
		public function get_reservas($arrData) 
		{		
				$this->db->select("R.*, CONCAT(U.first_name, ' ', U.last_name) cliente, CONCAT(W.first_name, ' ', W.last_name) inspector, I.hora hora_inicial, I.formato_24 hora_inicial_24, F.hora hora_final, F.formato_24 hora_final_24");
				$this->db->join('user U', 'U.id_user = R.fk_id_user_cliente', 'INNER');
				$this->db->join('user W', 'W.id_user = R.fk_id_user_inspector', 'INNER');
				$this->db->join('param_horas I', 'I.id_hora = R.fk_id_hora_checkin', 'INNER');
				$this->db->join('param_horas F', 'F.id_hora = R.fk_id_hora_checkout', 'INNER');
				
				if (array_key_exists("idReserva", $arrData)) {
					$this->db->where('R.id_reserva', $arrData["idReserva"]);
				}
				
				if (array_key_exists("idCliente", $arrData)) {
					$this->db->where('R.fk_id_user_cliente', $arrData["idCliente"]);
				}
				
				$this->db->order_by('R.id_reserva', 'desc');
				$query = $this->db->get('reserva R');

				if ($query->num_rows() > 0) {
					return $query->result_array();
				} else {
					return false;
				}
		}		
		
		/**
		 * Add/Edit Reserva
		 * @since 20/5/2018
		 */
		public function saveReserva() 
		{
			$idReserva = $this->input->post('hddIdReserva');
		
			$data = array(
				'date_checkin' => $this->input->post('start_date'),
				'date_checkout' => $this->input->post('finish_date'),
				'fk_id_hora_checkin' => $this->input->post('hora_inicio'),
				'fk_id_hora_checkout' => $this->input->post('hora_final'),
				'numero_huespedes' => $this->input->post('numero_huespedes'),
				'observaciones' => $this->input->post('observaciones')
			);
			
			//revisar si es para adicionar o editar
			if ($idReserva == '') {
				$data['fk_id_user_cliente'] = $this->input->post('hddIdUserCliente');
				$data['fk_id_user_inspector'] = $this->session->userdata("id");
				$data['date_reserva'] = date("Y-m-d G:i:s");			

				$query = $this->db->insert('reserva', $data);	
				$idReserva = $this->db->insert_id();				
			} else {				
				$this->db->where('id_reserva', $idReserva);
				$query = $this->db->update('reserva', $data);
			}
			
			if ($query) {
				return $idReserva;
			} else {
				return false;
			}
		}
				
	    
	}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Reserva_model extends CI_Model {
		
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
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
		 * Add/Edit Solicitud
		 * @since 1/4/2018
		 */
		public function saveSolicitud() 
		{
			$idUser = $this->session->userdata("id");
			$idSolicitud = $this->input->post('hddIdInspeccion');
		
			$data = array(
				'fecha_apartado' => $this->input->post('hddFecha'),
				'numero_computadores' => $this->input->post('numero_computadores'),
				'fk_id_hora_inicial' => $this->input->post('hora_inicio'),
				'fk_id_hora_final' => $this->input->post('hora_final'),
				'numero_items' => $this->input->post('numero_items'),
				'fk_codigo_examen' => $this->input->post('prueba'),
				'fk_id_prueba' => $this->input->post('grupo_items'),
				'cual_prueba' => $this->input->post('cual_prueba'),
				'cual' => $this->input->post('cual'),
				'fk_id_tipificacion' => $this->input->post('tipificacion'),
				'estado_solicitud' => 1
			);
			
			//revisar si es para adicionar o editar
			if ($idSolicitud == '') {
				$data['fk_id_user'] = $idUser;
				$data['fecha_solicitud'] = date("Y-m-d G:i:s");			

				$query = $this->db->insert('solicitud', $data);	
				$idSolicitud = $this->db->insert_id();				
			} else {				
				$this->db->where('id_solicitud', $idSolicitud);
				$query = $this->db->update('solicitud', $data);
			}
			
			if ($query) {
				return $idSolicitud;
			} else {
				return false;
			}
		}
				
	    
	}
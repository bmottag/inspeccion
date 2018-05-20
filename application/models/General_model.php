<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para consultas generales a una tabla
 */
class General_model extends CI_Model {

		/**
		 * Consulta BASICA A UNA TABLA
		 * @param $TABLA: nombre de la tabla
		 * @param $ORDEN: orden por el que se quiere organizar los datos
		 * @param $COLUMNA: nombre de la columna en la tabla para realizar un filtro (NO ES OBLIGATORIO)
		 * @param $VALOR: valor de la columna para realizar un filtro (NO ES OBLIGATORIO)
		 * @since 8/11/2016
		 */
		public function get_basic_search($arrData) {
			if ($arrData["id"] != 'x')
				$this->db->where($arrData["column"], $arrData["id"]);
			$this->db->order_by($arrData["order"], "ASC");
			$query = $this->db->get($arrData["table"]);

			if ($query->num_rows() >= 1) {
				return $query->result_array();
			} else
				return false;
		}
		
		/**
		 * Update field in a table
		 * @since 25/5/2017
		 */
		public function updateRecord($arrDatos) {
				$data = array(
					$arrDatos ["column"] => $arrDatos ["value"]
				);
				$this->db->where($arrDatos ["primaryKey"], $arrDatos ["id"]);
				$query = $this->db->update($arrDatos ["table"], $data);
				if ($query) {
					return true;
				} else {
					return false;
				}
		}
		
		/**
		 * Delete Record
		 * @since 25/5/2017
		 */
		public function deleteRecord($arrDatos) 
		{
				$query = $this->db->delete($arrDatos ["table"], array($arrDatos ["primaryKey"] => $arrDatos ["id"]));
				if ($query) {
					return true;
				} else {
					return false;
				}
		}
		
		/**
		 * Active User list
		 * @since 25/3/2018
		 */
		public function get_user_list($arrData) 
		{
			if (array_key_exists("idUser", $arrData)) {
				$this->db->where('U.id_user', $arrData["idUser"]);
			}
			if (array_key_exists("idRol", $arrData)) {
				$this->db->where('U.fk_id_rol', $arrData["idRol"]);
			}
			if (array_key_exists("state", $arrData)) {
				$this->db->where('U.state', $arrData["state"]);
			}
			$this->db->join('param_rol R', 'R.id_rol = U.fk_id_rol', 'INNER');
			$this->db->order_by("U.first_name, U.last_name", "ASC");
			$query = $this->db->get("user U");

			if ($query->num_rows() >= 1) {
				return $query->result_array();
			} else
				return false;
		}
		
		/**
		 * Lista de horas
		 * si es un usuario gestor se filtra por las horas configuradas en la tabla param generales
		 * @since 22/4/2018
		 * @review 23/4/2018
		 */
		public function get_horas($arrData) 
		{
			if (array_key_exists("idHoraInicio", $arrData)) {
				$this->db->where('id_hora >=', $arrData["idHoraInicio"]);
			}
			if (array_key_exists("idHoraFinal", $arrData)) {
				$this->db->where('id_hora <=', $arrData["idHoraFinal"]);
			}
			$this->db->order_by("id_hora", "ASC");
			$query = $this->db->get("param_horas");

			if ($query->num_rows() >= 1) {
				return $query->result_array();
			} else
				return false;
		}
		
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

	
		

}
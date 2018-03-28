<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Main_model extends CI_Model {


		/**
		 * Get inspecciones list
		 * @since 27/3/2018
		 */
		public function get_inspecciones($arrData) 
		{		
				$this->db->select("I.*, CONCAT(U.first_name, ' ', U.last_name) cliente, CONCAT(W.first_name, ' ', W.last_name) inspector");
				$this->db->join('user U', 'U.id_user = I.fk_id_user_cliente', 'INNER');
				$this->db->join('user W', 'W.id_user = I.fk_id_user_inspector', 'INNER');
				
				if (array_key_exists("idInspeccion", $arrData)) {
					$this->db->where('I.id_inspeccion', $arrData["idInspeccion"]);
				}
				
				if (array_key_exists("fkIdInspeccion", $arrData)) {
					$this->db->where('I.fk_id_inspeccion', $arrData["fkIdInspeccion"]);
				}
				
				if (array_key_exists("tipoInspeccion", $arrData)) {
					$this->db->where('I.tipo_inspeccion', $arrData["tipoInspeccion"]);
				}
				
				if (array_key_exists("idCliente", $arrData)) {
					$this->db->where('I.fk_id_user_cliente', $arrData["idCliente"]);
				}
				
				$this->db->order_by('I.id_inspeccion', 'desc');
				$query = $this->db->get('inspeccion I');

				if ($query->num_rows() > 0) {
					return $query->result_array();
				} else {
					return false;
				}
		}
		
		/**
		 * Add/Edit Inspeccion
		 * @since 27/3/2018
		 */
		public function saveInspeccion() 
		{
			$idUserInspector = $this->session->userdata("id");
			$idInseccion = $this->input->post('hddIdInspeccion');
		
			$data = array(
				'fk_id_user_cliente' => $this->input->post('hddIdUserCliente'),
				'tipo_inspeccion' => $this->input->post('hddTipoInspeccion'),
				'fk_id_inspeccion' => $this->input->post('hddFKIdInspeccion'),
				'nevecon' => $this->input->post('nevecon'),
				'televisor' => $this->input->post('televisor'),
				'lavadora' => $this->input->post('lavadora'),
				'mueble' => $this->input->post('mueble'),
				'sofa' => $this->input->post('sofa'),
				'almohadas_sofa' => $this->input->post('almohadas_sofa'),
				'licuadora' => $this->input->post('licuadora'),
				'sandwichera' => $this->input->post('sandwichera'),
				'vajilla' => $this->input->post('vajilla'),
				'vasos' => $this->input->post('vasos'),
				'copas' => $this->input->post('copas'),
				'control_rojo' => $this->input->post('control_rojo'),
				'control_samsung' => $this->input->post('control_samsung'),
				'control_westinghouse' => $this->input->post('control_westinghouse'),
				'control_blanco' => $this->input->post('control_blanco'),
				'decodificadores' => $this->input->post('decodificadores'),
				'internet' => $this->input->post('internet'),
				'router' => $this->input->post('router'),
				'sensor' => $this->input->post('sensor'),
				'camara' => $this->input->post('camara'),
				'sirena' => $this->input->post('sirena'),
				'ollas' => $this->input->post('ollas'),
				'chocolatera' => $this->input->post('chocolatera'),
				'hoja_bedul' => $this->input->post('hoja_bedul'),
				'bandeja' => $this->input->post('bandeja'),
				'colador' => $this->input->post('colador'),
				'rayador' => $this->input->post('rayador'),
				'guante' => $this->input->post('guante'),
				'limpiones' => $this->input->post('limpiones'),
				'cucharones' => $this->input->post('cucharones'),
				'cucharones2' => $this->input->post('cucharones2'),
				'descorchador' => $this->input->post('descorchador'),
				'cuchillos' => $this->input->post('cuchillos'),
				'contenedores' => $this->input->post('contenedores'),
				'microondas' => $this->input->post('microondas'),
				'arreglo' => $this->input->post('arreglo'),
				'papelera' => $this->input->post('papelera'),
				'toalla' => $this->input->post('toalla'),
				'toalla_mano' => $this->input->post('toalla_mano'),
				'toalla_grande' => $this->input->post('toalla_grande'),
				'dispensador' => $this->input->post('dispensador'),
				'adornos' => $this->input->post('adornos'),
				'nodos_single' => $this->input->post('nodos_single'),
				'cama_twin' => $this->input->post('cama_twin'),
				'cama_queen' => $this->input->post('cama_queen'),
				'cama_king' => $this->input->post('cama_king'),
				'nidos_queen' => $this->input->post('nidos_queen'),
				'almohadas_camas' => $this->input->post('almohadas_camas'),
				'sabanas' => $this->input->post('sabanas'),
				'sala' => $this->input->post('sala'),
				'mesa_centro' => $this->input->post('mesa_centro'),
				'balde' => $this->input->post('balde'),
				'escoba' => $this->input->post('escoba'),
				'recojedor' => $this->input->post('recojedor'),
				'trapero' => $this->input->post('trapero'),
				'sombrilla' => $this->input->post('sombrilla'),
				'tapete' => $this->input->post('tapete'),
				'extintor' => $this->input->post('extintor'),
				'botiquin' => $this->input->post('botiquin'),
				'observaciones' => $this->input->post('observaciones')
			);
			
			//revisar si es para adicionar o editar
			if ($idInseccion == '') {
				$data['fk_id_user_inspector'] = $idUserInspector;
				$data['date_inspeccion'] = date("Y-m-d G:i:s");			

				$query = $this->db->insert('inspeccion', $data);	
				$idInseccion = $this->db->insert_id();				
			} else {				
				$this->db->where('id_inspeccion', $idInseccion);
				$query = $this->db->update('inspeccion', $data);
			}
			
			if ($query) {
				return $idInseccion;
			} else {
				return false;
			}
		}
		
		
		
		
		
	    
	}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients_Model extends CI_Model{
	protected $table;
	protected $id;

	function __construct(){
		parent::__construct();

		$this->table = 'clients';
		$this->id = 'id';
	}

	function get_client($id){
		return $this->db->get_where(
			$this->table,
			array(
				'id' => $id
			)
		)->row();
	}

	function get_client_name($id){
		$this->db->select('name');
		return $this->db->get_where(
			$this->table,
			array(
				'id' => $id
			)
		)->row();
	}

	function insert_campaign($name){
		$data = array(
			'name' => $name,
			'observations' => null,
			'create_id' => 1,
			'create_date' => date('Y-m-d H:i:s',now()),
			'update_id' => 1,
			'update_date' => date('Y-m-d H:i:s',now())
		);

		return $this->db->insert($this->table, $data);
	}

	function update_campaign($data){
		$this->db->where('id', $data['id']);
		return $this->db->update($this->table, $data);
	}

}
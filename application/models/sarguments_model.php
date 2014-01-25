<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SArguments_Model extends CI_Model{
	protected $table;
	protected $id;

	function __construct(){
		parent::__construct();

		$this->table = 'search_arguments';
		$this->id = 'id';
	}

	function get_sarguments(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	function get_sargument($id){
		return $this->db->get_where(
			$this->table,
			array(
				'id' => $id
			)
		)->row();
	}

	function get_sarguments_web($id_web){
		$this->db->select('id, argument, position');
		$this->db->from('search_arguments');
		$this->db->where('id_web', $id_web);
		$query = $this->db->get();
		return $query->result(); 
	}

	function insert_sargument($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	function update_sargument($data){
		$this->db->where('id', $data['id']);
		return $this->db->update($this->table, $data);
	}

	function delete_sargument($id){
		return $this->db->delete($this->table, array( 'id' => $id));
	}

}
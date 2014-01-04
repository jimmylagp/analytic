<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webs_Model extends CI_Model{
	protected $table;
	protected $id;

	function __construct(){
		parent::__construct();

		$this->table = 'websites';
		$this->id = 'id';
	}

	function get_web($id){
		return $this->db->get_where(
			$this->table,
			array(
				'id' => $id
			)
		)->row();
	}

	function get_web_url($id){
		$this->db->select('address');
		return $this->db->get_where(
			$this->table,
			array(
				'id' => $id
			)
		)->row();
	}

	function insert_web($url){
		$data = array(
			'address' => $url,
			'observations' => null,
			'create_id' => 1,
			'create_date' => date('Y-m-d H:i:s',now()),
			'update_id' => 1,
			'update_date' => date('Y-m-d H:i:s',now())
		);
		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}

	function update_web($data){
		$this->db->where('id', $data['id']);
		return $this->db->update($this->table, $data);
	}

}
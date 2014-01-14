<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Traffic_Model extends CI_Model{
	protected $table;
	protected $id;

	function __construct(){
		parent::__construct();

		$this->table = 'traffic';
		$this->id = 'id';
	}

	function get_traffic_id($id){
		return $this->db->get_where(
			$this->table,
			array(
				'id' => $id
			)
		)->row();
	}

	function get_traffics($id_website){
		return $this->db->get_where(
			$this->table,
			array(
				'id_website' => $id_website
			)
		)->result();
	}

	function get_traffic_date($date){
		return $this->db->get_where(
			$this->table,
			array(
				'date' => $date
			)
		)->row();
	}

	function get_traffic_hour($hour){
		return $this->db->get_where(
			$this->table,
			array(
				'hour' => $hour
			)
		)->row();
	}

	function insert_traffic($data){
		return $this->db->insert($this->table, $data);
	}

	function update_traffic($data){
		$this->db->where('id', $data['id']);
		return $this->db->update($this->table, $data);
	}

}
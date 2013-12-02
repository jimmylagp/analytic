<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model{
	protected $table;
	protected $id;

	function __construct(){
		parent::__construct();

		$this->load->helper('date');

		$this->table = 'users';
		$this->id = 'id';
	}

	function get_profile_user($email){
		return $this->db->get_where(
			$this->table,
			array(
				'email' => $email
			)
		)->row();
	}

	function validate_user($email='', $password=''){
		return $this->db->get_where(
			$this->table,
			array(
				'email' => $email,
				'password' => md5($password)
			)
		)->row();
	}

	function user_exist($email){
		return $this->db->get_where(
			$this->table,
			array(
				'email' => $email
			)
		)->row();
	}

	function insert_user($email, $password ){
		$data = array(
			'email' => $email,
			'password' => md5($password),
			'create_id' => 1,
			'create_date' => date('Y-m-d H:i:s',now()),
			'update_id' => 1,
			'update_date' => date('Y-m-d H:i:s',now())
		);

		return $this->db->insert($this->table, $data);
	}

	function update_user($data){
		$this->db->where('email', $data['email']);
		return $this->db->update($this->table, $data);
	}
}
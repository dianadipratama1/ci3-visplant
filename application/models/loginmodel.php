<?php
 /**
  * 
  */
 class loginmodel extends CI_model{

 	function __construct(){
 		parent::__construct();
		$this->load->database();
 	}

 	function validate($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$result = $this->db->get('user');
		// $a = $this->db->last_query($result);

		// var_dump($result);
		 // print_r($a);
		 // exit();
		return $result;
	}
}
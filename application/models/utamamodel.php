<?php
 /**
  * 
  */
 class utamamodel extends CI_model{

 	function __construct(){
 		parent::__construct();
		$this->load->database();
 	}

 	function totalso(){
 		return $this->db->get('opj')->num_rows();
 	}

 	function totalpo(){
 		return $this->db->get('no_po')->num_rows();
 	}

 	function totalsopir(){
 		return $this->db->get('sopir')->num_rows();
 	}

 	function totaltm(){
 		return $this->db->get('tm')->num_rows();
 	}

 	function totalsp2(){
 		return $this->db->get('fopj')->num_rows();
 	}

 	function totaljobmix(){
 		return $this->db->get('jobmix')->num_rows();
 	}

 	
}
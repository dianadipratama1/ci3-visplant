<?php
 /**
  * 
  */
 class setkobarmodel extends CI_model{

 	function __construct(){
 		parent::__construct();
		$this->load->database();
 	}

	public function filter($search, $limit, $start, $order_field, $order_ascdesc){
		$this->db->like('kobar', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('nabar', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('idkobarplant', $search);
	    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
	    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
	    return $this->db->get('kobarplant')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	}

  	public function count_filter($search){
	    $this->db->like('kobar', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('nabar', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('idkobarplant', $search);
	    return $this->db->get('kobarplant')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
	}

	public function count_all(){
    	return $this->db->count_all('kobarplant'); 
    	// Untuk menghitung semua data siswa
  	}

  	function updatedata($idkobarplant,$nabar,$kobar,$sts){
		$query="UPDATE `kobarplant` SET `nabar`='$nabar',`kobar`='$kobar',`sts`='$sts' WHERE `idkobarplant`='$idkobarplant'";
		// print_r($query);
		// exit();
		$this->db->query($query);
	}
}
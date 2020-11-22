<?php
 /**
  * 
  */
 class jobmixmodel extends CI_model{

 	function __construct(){
 		parent::__construct();
		$this->load->database();
 	}

	public function filter($search, $limit, $start, $order_field, $order_ascdesc){
		$this->db->like('KD_BRG', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('Keterangan', $search); // Untuk menambahkan query where OR LIKE
	    // $this->db->or_like('idkobarplant', $search);
	    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
	    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
	    return $this->db->get('jobmix')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	}

  	public function count_filter($search){
	    $this->db->like('KD_BRG', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('Keterangan', $search); // Untuk menambahkan query where OR LIKE
	    // $this->db->or_like('idkobarplant', $search);
	    return $this->db->get('jobmix')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
	}

	public function count_all(){
    	return $this->db->count_all('jobmix'); 
    	// Untuk menghitung semua data siswa
  	}

  	function saverecords($no,$kdbrg,$ket,$semen,$semen2,$flyash,$pasir,$pasirb,$air,$bp1020,$bp2030,$bp510,$add1,$add2,$add3,$add4,$add5,$add6){
		$query= "INSERT INTO `jobmix`(`No`,`KD_BRG`,`Keterangan`,`AIR`,`SEMEN`,`SEMEN2`,`FLYASH`,`PASIR`,`PASIRB`,`BP1020`,`BP2030`,`BP510`,`ADD1`,`ADD2`,`ADD3`,`ADD4`,`ADD5`,`ADD6`) VALUES ('$no','$kdbrg','$ket','$air','$semen','$semen2','$flyash','$pasir','$pasirb','$bp1020','$bp2030','$bp510','$add1','$add2','$add3','$add4','$add5','$add6')";
		$this->db->query($query);
	}

  	function updatedata($idjbmx,$no,$kd_brg,$keterangan,$semen,$semen2,$flyash,$pasir,$pasirb,$air,$bp1020,$bp2030,$bp510,$add1,$add2,$add3,$add4,$add5,$add6){
		$query="UPDATE `jobmix` SET `No`='$no',`KD_BRG`='$kd_brg',`Keterangan`='$keterangan',`SEMEN`='$semen',`SEMEN2`='$semen2',`FLYASH`='$flyash',`PASIR`='$pasir',`PASIRB`='$pasirb',`AIR`='$air',`BP1020`='$bp1020',`BP2030`='$bp2030',`BP510`='$bp510',`ADD1`='$add1',`ADD2`='$add2',`ADD3`='$add3',`ADD4`='$add4',`ADD5`='$add5',`ADD6`='$add6' WHERE `IDjbmx`='$idjbmx'";
		// print_r($query);
		// exit();
		$this->db->query($query);
	}

	function deleterecords($IDjbmx){
		$query="DELETE FROM jobmix WHERE IDjbmx=$IDjbmx";
		$this->db->query($query);
	}
}
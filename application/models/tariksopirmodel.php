<?php
class tariksopirmodel extends CI_Model{
	function __construct(){
		$this->load->database(); 		
	}

	function carisopir($kodepgw){
		$db = $this->load->database('default',true);  
		$so="https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataDriver&EMP_ID=".$kodepgw;						
		$arrContextOptions=array(
									"ssl"=>array(
													"verify_peer"=>false,
													"verify_peer_name"=>false,
		       									),
			     				);  
		$result = file_get_contents($so, false, stream_context_create($arrContextOptions));
		$data = json_decode($result,true);
						
		return $data;
	}

	function carikode($kodepgw){
 		$sopir="https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataDriver&EMP_ID=".$kodepgw;						
		$arrContextOptions=array(
									"ssl"=>array(
													"verify_peer"=>false,
													"verify_peer_name"=>false,
		       									),
			     				);  
		$result = file_get_contents($sopir, false, stream_context_create($arrContextOptions));
		if (substr($result,2,10) == 'datadriver') {
	        if (substr($result,17,6)=='EMP_ID'){
	        	$kd='0';
	        }else{
	        	$kd='4';
	        }
	    }else{
	    	if (substr($result,14,16)=='[]'){
	    		$kd='1';
	    	}else{
	    		if ($result==""){
	    			$kd='2';
	    		}else{
	    			$kd='3';
	    		}
	    	}
	    }

	    if($kd=='0') {
	    	$asli='0';
	    }else{
	    	$asli=$kd.$result;
	    }
	    return $asli;
		// substr($result,0,1);
		// print_r($result);
		// exit();
 	}

 	public function filter($search, $limit, $start, $order_field, $order_ascdesc){
		$this->db->like('nopeg', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('kd_sopir', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('nm_sopir', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('IDspr', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
	    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
	    return $this->db->get('sopir')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	}

  	public function count_filter($search){
	    $this->db->like('nopeg', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('kd_sopir', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('nm_sopir', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('IDspr', $search); // Untuk menambahkan query where OR LIKE
	    return $this->db->get('sopir')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
	}

	public function count_all(){
    	return $this->db->count_all('sopir'); 
    	// Untuk menghitung semua data siswa
  	}

	function deleterecords($IDspr){
		$query="DELETE FROM sopir WHERE IDspr=$IDspr";
		$this->db->query($query);
	}

	function simpansopir($kodepgw,$noindex){
 		$db = $this->load->database('default',true);
		$datasopir= $this->model->carisopir($kodepgw,$noindex);

		$datasopir = $datasopir['datadriver'];
		$data = array(	
							'nopeg'		=> $datasopir[$noindex]['EMP_ID'],
							'nm_sopir'	=> $datasopir[$noindex]['Driver_Name'],
							'kd_sopir'	=> '',
							'alamat'	=> '',
							'kota'		=> '',
					);
		$this->db->from('sopir');
		$this->db->where('nopeg',$kodepgw);
		$query	= $this->db->get();
		$cekdata= $query->result();
		if (count($cekdata)>0) {
			$oke = 1;
			return $oke;
		}else{
			$this->db->insert('sopir',$data);
			$oke = 2;
			return $oke;
			// print_r($data);
			// exit();
		}	
 	}

 	function updatedata($idsopir,$nopeg,$kd_sopir,$nm_sopir,$alamat,$kota){
		$query="UPDATE `sopir` SET 	`nopeg`='$nopeg',`kd_sopir`='$kd_sopir',`nm_sopir`='$nm_sopir',`alamat`='$alamat',`kota`='$kota' WHERE `idsopir`='$idsopir'";
		// print_r($query);
		// exit();
		$this->db->query($query);
	}
}	
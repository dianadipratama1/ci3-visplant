<?php
 /**
  * 
  */
 class tarikpomodeladmin extends CI_model{

 	function __construct(){
 		parent::__construct();
		$this->load->database();
 	}

 	function caripo($kodepo){
 		$db = $this->load->database('default',true);  
		$po="https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataJT&PO_Number=".$kodepo;						
		$arrContextOptions=array(
									"ssl"=>array(
													"verify_peer"=>false,
													"verify_peer_name"=>false,
		       									),
		     				);  
		$result = file_get_contents($po, false, stream_context_create($arrContextOptions));
		$data = json_decode($result,true);
						
		return $data;
 	}

 	function carikode($kodepo){
 		$po="https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataJT&PO_Number=".$kodepo;						
		$arrContextOptions=array(
									"ssl"=>array(
													"verify_peer"=>false,
													"verify_peer_name"=>false,
		       									),
			     				);  
		$result = file_get_contents($po, false, stream_context_create($arrContextOptions));
		if (substr($result,2,6) == 'datajt') {
	        if (substr($result,13,9)=='PO_Number'){
	        	$kd='0';
	        }else{
	        	$kd='4';
	        }
	    }else{
	    	if (substr($result,10,12)=='[]'){
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

 	function simpanpo($kodepo,$noindex){
 		$db = $this->load->database('default',true);
		$datapo= $this->model->caripo($kodepo,$noindex);

		$datapo = $datapo['datajt'];
		$data = array(	
							'nomorpo'	=> $datapo[$noindex]['PO_Number'],
							'jum_real'	=> $datapo[$noindex]['Remaining_Qty'],
							'kopel'		=> $datapo[$noindex]['Vend_Code'],
							'tanggal'	=> $datapo[$noindex]['PO_Date'],
							'nomorpolm'	=> $datapo[$noindex]['Old_Number'],
							'namapel'	=> $datapo[$noindex]['Vend_Name'],
							'harsat'	=> $datapo[$noindex]['Unit_Price'],
							'kobar'		=> $datapo[$noindex]['Item_Code'],
							'nabar'		=> $datapo[$noindex]['Item_Name'],
							'jumlah'	=> $datapo[$noindex]['PO_Qty'],
							'ind_kopel'	=> $datapo[$noindex]['Vend_ID'],
							'alamat'	=> '-',
							'kota'		=> '-',
							'kode_dept'	=> 0,
							'departemen'=> '-',
							'noindex'	=> 0,
							'duedays'	=> 0,
							'jasa'		=> 'F',
							'binausaha'	=> '-',
							'gudang'	=> '-',
							'unit'		=> '-',
							'pajak'		=> '-',
							'kirim'		=> 0,
							'sts'		=> 0,
					);
		$this->db->from('no_po');
		$this->db->where('nomorpo',$kodepo);
		$query	= $this->db->get();
		$cekdata= $query->result();
		if (count($cekdata)>0) {
			$oke = 1;
			return $oke;
		}else{
			$this->db->insert('no_po',$data);
			$oke = 2;
			return $oke;
			// print_r($data);
			// exit();
		}	
 	}

 	function display_records(){
 		$this->db->order_by('IDno_po','DESC');
 		$query=$this->db->get('no_po');
		// print_r($query);
		// exit();
		return $query->result();
	}

	function deleterecords($IDno_po){
		$query="DELETE FROM no_po WHERE IDno_po=$IDno_po";
		// print_r($query);
		// exit();
		$this->db->query($query);
	}

	function nopolist(){
		$this->db->order_by('IDno_po','DESC');
		$hasil=$this->db->get('no_po');
       	return $hasil->result();
	}

	public function filter($search, $limit, $start, $order_field, $order_ascdesc){
		$this->db->like('nomorpo', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('nomorpolm', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('namapel', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('nabar', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
	    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
	    return $this->db->get('no_po')->result_array(); // Eksekusi query sql sesuai kondisi diatas
	}

  	public function count_filter($search){
	    $this->db->like('nomorpo', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('namapel', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('nomorpolm', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('nabar', $search); // Untuk menambahkan query where OR LIKE
	    return $this->db->get('no_po')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
	}

	public function count_all(){
    	return $this->db->count_all('no_po'); 
    	// Untuk menghitung semua data siswa
  	}

	function updatedata($nomorpo,$jum_real,$kopel,$tanggal,$nomorpolm,$namapel,$harsat,$kobar,$nabar,$jumlah,$ind_kopel){//$IDno_po){
		$query="UPDATE `no_po` SET 	`nomorpo`='$nomorpo',`jum_real`='$jum_real',`kopel`='$kopel',`tanggal`='$tanggal',`nomorpolm`='$nomorpolm',`namapel`='$namapel',`harsat`='$harsat',`kobar`='$kobar',`nabar`='$nabar',`jumlah`='$jumlah',`ind_kopel`='$ind_kopel' WHERE `nomorpo`='$nomorpo'";
		// print_r($query);
		// exit();
		$this->db->query($query);
	}
}
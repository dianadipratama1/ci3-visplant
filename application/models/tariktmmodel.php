<?php
	class tariktmmodel extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function caritm($kodetm){
			$db = $this->load->database('default',true);  
		    $tm="https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataVehicle&TM_Number=".$kodetm;						
			$arrContextOptions=array(
										"ssl"=>array(
														"verify_peer"=>false,
														"verify_peer_name"=>false,
		          									),
			     				);  
			$result = file_get_contents($tm, false, stream_context_create($arrContextOptions));
			$data = json_decode($result,true);
						
			return $data;
		}

		function carikode($kodetm){
			$tm="https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataVehicle&TM_Number=".$kodetm;						
			$arrContextOptions=array(
										"ssl"=>array(
														"verify_peer"=>false,
														"verify_peer_name"=>false,
		          									),
			     				);  
			$result = file_get_contents($tm, false, stream_context_create($arrContextOptions));
			// print_r(substr($result,18,9));
			// exit();

			if (substr($result,2,11) == 'datavehicle') {
				if (substr($result,18,9)=='Serial_No') {
					$kd='0';
				}else{
					$kd='4';
				}
			}else{
			 	if (substr($result,15,16)=='[]') {
					$kd='1';
				}else{
					if ($result=="") {
						$kd='2';
					}else{
						$kd='3';
					}
				}
			}

			if ($kd=='0'){
				$asli='0';
			}else{
				$asli=$kd.$result;
			}
			return $asli;
		}

		function simpantm($kodetm,$noindex){
	 		$db = $this->load->database('default',true);
			$datatm= $this->model->caritm($kodetm,$noindex);

			$datatm = $datatm['datavehicle'];
			$data = array(	
								//'nomorpo'	=>	$datapo[$noindex]['PO_Number'],
								'tm'		=>	$datatm[$noindex]['TM_Number'],
								'kdaset'	=>	$datatm[$noindex]['Asset_Code'],
								'nopol'		=>	$datatm[$noindex]['No_Polisi'],
								'noindex'	=>	0,
								'berat'		=>	0,
						);
			$this->db->from('tm');
			$this->db->where('tm',$kodetm);
			$query	= $this->db->get();
			$cekdata= $query->result();
			if (count($cekdata)>0) {
				$oke = 1;
				return $oke;
			}else{

				if ($datatm[$noindex]['TM_Number']===""){
					$oke = 2;
					return $oke;
				}else{
					if ($datatm[$noindex]['Asset_Code']===""){
						$oke = 3;
						return $oke;
					}else{
						if ($datatm[$noindex]['No_Polisi']===""){
							$oke = 4;
							return $oke;
						}else{
							$this->db->insert('tm',$data);
							$oke = 5;
							return $oke;
						}
					}
				}
				// print_r($data);
				// exit();
			}	
	 	}

	 	function cariaset($kodeaset){
			$db = $this->load->database('default',true);  
		    $aset="https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataVehicle&Asset_Code=".$kodeaset;						
			$arrContextOptions=array(
										"ssl"=>array(
														"verify_peer"=>false,
														"verify_peer_name"=>false,
		          									),
			     				);  
			$result = file_get_contents($aset, false, stream_context_create($arrContextOptions));
			$data = json_decode($result,true);
						
			return $data;
		}

		function carikodeaset($kodeaset){
			$aset="https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataVehicle&Asset_Code=".$kodeaset;						
			$arrContextOptions=array(
										"ssl"=>array(
														"verify_peer"=>false,
														"verify_peer_name"=>false,
		          									),
			     				);  
			$result = file_get_contents($aset, false, stream_context_create($arrContextOptions));
			// print_r($result);
			// exit();

			if (substr($result,2,11) == 'datavehicle') {
				if (substr($result,18,9)=='Serial_No') {
					$kd='0';
				}else{
					$kd='4';
				}
			}else{
			 	if (substr($result,15,16)=='[]') {
					$kd='1';
				}else{
					if ($result=="") {
						$kd='2';
					}else{
						$kd='3';
					}
				}
			}

			if ($kd=='0'){
				$asli='0';
			}else{
				$asli=$kd.$result;
			}
			return $asli;
		}

		function simpanaset($kodeaset,$noindex){
	 		$db = $this->load->database('default',true);
			$dataaset= $this->model->cariaset($kodeaset,$noindex);

			$dataaset = $dataaset['datavehicle'];
			$data = array(	
								//'nomorpo'	=>	$datapo[$noindex]['PO_Number'],
								'tm'		=>	$dataaset[$noindex]['TM_Number'],
								'kdaset'	=>	$dataaset[$noindex]['Asset_Code'],
								'nopol'		=>	$dataaset[$noindex]['No_Polisi'],
								'noindex'	=>	0,
								'berat'		=>	0,
						);
			$this->db->from('tm');
			$this->db->where('kdaset',$kodeaset);
			$query	= $this->db->get();
			// print_r($query);
			// exit();
			$cekdata= $query->result();
			if (count($cekdata)>0) {
				$oke = 1;
				return $oke;
			}else{
				if ($dataaset[$noindex]['TM_Number']===""){
					$oke = 2;
					return $oke;
				}else{
					if ($dataaset[$noindex]['Asset_Code']===""){
						$oke = 3;
						return $oke;
					}else{
						if ($dataaset[$noindex]['No_Polisi']===""){
							$oke = 4;
							return $oke;
						}else{
							$this->db->insert('tm',$data);
							$oke = 5;
							return $oke;
						}
					}
				}
				// print_r($data);
				// exit();
			}	
	 	}

		public function filter($search, $limit, $start, $order_field, $order_ascdesc){
			$this->db->like('kdaset', $search); // Untuk menambahkan query where LIKE
		    $this->db->or_like('tm', $search); // Untuk menambahkan query where OR LIKE
		    $this->db->or_like('nopol', $search); // Untuk menambahkan query where OR LIKE
		    $this->db->or_like('IDtm', $search); // Untuk menambahkan query where OR LIKE
		    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
		    return $this->db->get('tm')->result_array(); // Eksekusi query sql sesuai kondisi diatas
		}

	  	public function count_filter($search){
		    $this->db->like('kdaset', $search); // Untuk menambahkan query where LIKE
		    $this->db->or_like('tm', $search); // Untuk menambahkan query where OR LIKE
		    $this->db->or_like('nopol', $search); // Untuk menambahkan query where OR LIKE
		    $this->db->or_like('IDtm', $search); // Untuk menambahkan query where OR LIKE
		    return $this->db->get('tm')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
		}

		public function count_all(){
	    	return $this->db->count_all('tm'); 
	    	// Untuk menghitung semua data siswa
	  	}

		function deleterecords($IDtm){
			$query="DELETE FROM tm WHERE IDtm=$IDtm";
			$this->db->query($query);
		}
 	}	
<?php
	class tariksomodel extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function cariso($kodeso){
			$db = $this->load->database('default',true);  
		    $so="https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataBSP&SO_Number=".$kodeso;						
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

		function carikode($kodeso){
			$so="https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataBSP&SO_Number=".$kodeso;						
			$arrContextOptions=array(
										"ssl"=>array(
														"verify_peer"=>false,
														"verify_peer_name"=>false,
		          									),
			     				);  
			$result = file_get_contents($so, false, stream_context_create($arrContextOptions));

			if (substr($result,2,7) == 'databsp') {
				if (substr($result,14,9)=='Estimated') {
					$kd='0';
				}else{
					$kd='4';
				}
			}else{
			 	if (substr($result, 2,5)=='Block') {
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


		function kodeplant($kodeso){
		 	$db = $this->load->database('default',true);

		 	$query = $this->db->query("SELECT * FROM plant");
		 	foreach ($query->result() as $row) {
		 		$kdplant = $row->bisnis;
		 	}
				// print_r($kdplant);
				// exit();
				return $kdplant;
		}

		function simpanso($kodeso,$noindex){
			$db = $this->load->database('default',true);
			$dataso= $this->model->cariso($kodeso,$noindex);

			$dataso = $dataso['databsp'];
			$data = array(	
							'tglbatas'	=> $dataso[$noindex]['Estimated_TimeDelivery'],
							'nomorjo'	=> $dataso[$noindex]['JO_Number'],
							'nomorso'	=> $dataso[$noindex]['SO_Number'],
							'lokasi'	=> $dataso[$noindex]['Project_Location'],
							'nomorsolm'	=> $dataso[$noindex]['Old_Number'],
							'harsat'	=> $dataso[$noindex]['Unit_Price'],
							'kobar'		=> $dataso[$noindex]['Item_Code'],
							'alamat'	=> $dataso[$noindex]['Cust_Address'],
							'nmproyek'	=> $dataso[$noindex]['Project_Name'],
							'nabar'		=> $dataso[$noindex]['Item_Name'],
							'jmlso'		=> $dataso[$noindex]['Item_Qty_JO'],
							'tglso'		=> $dataso[$noindex]['Estimated_TimeProduction'],
							'kopel'		=> $dataso[$noindex]['Cust_Code'],
							'jmlsoasl'	=> $dataso[$noindex]['Item_Qty_SO'],
							'napel'		=> $dataso[$noindex]['Cust_Name'],
							'kota'		=> '-',
							'sts'		=> 0,
						 );	

			$this->db->from('opj');
			$this->db->where('nomorso',$kodeso);
			$this->db->where('nomorjo',$dataso[$noindex]['JO_Number']);
			$this->db->where('kobar',$dataso[$noindex]['Item_Code']);
			$query	= $this->db->get();
			$cekdata= $query->result();
			if (count($cekdata)>0) {
				$this->db->where('nomorso',$kodeso);
				$this->db->where('nomorjo',$dataso[$noindex]['JO_Number']);
				$this->db->where('kobar',$dataso[$noindex]['Item_Code']);
				$dataupdate = array(
							  			'jmlso'	=>$dataso[$noindex]['Item_Qty_JO'],
							  			'jmlsoasl'=>$dataso[$noindex]['Item_Qty_SO'] 
									);
				// $this->db->update('opj',['jmlso'=>$dataso[$noindex]['Item_Qty_JO'],'jmlsoasl'=>$dataso[$noindex]['Item_Qty_SO']]);
				$this->db->update('opj',$dataupdate);
				$oke = 1;
				return $oke;
			}else{
				$this->db->insert('opj',$data);
				$oke = 2;
				return $oke;
				// print_r($data);
				// exit();
			}
		}

		public function filter($search, $limit, $start, $order_field, $order_ascdesc){
			$this->db->like('nomorso', $search); // Untuk menambahkan query where LIKE
		    $this->db->or_like('nomorjo', $search); // Untuk menambahkan query where OR LIKE
		    $this->db->or_like('tglso', $search); // Untuk menambahkan query where OR LIKE
		    $this->db->or_like('IDopj', $search); // Untuk menambahkan query where OR LIKE
		    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
		    return $this->db->get('opj')->result_array(); // Eksekusi query sql sesuai kondisi diatas
		}

	  	public function count_filter($search){
		    $this->db->like('nomorso', $search); // Untuk menambahkan query where LIKE
		    $this->db->or_like('nomorjo', $search); // Untuk menambahkan query where OR LIKE
		    $this->db->or_like('tglso', $search); // Untuk menambahkan query where OR LIKE
		    $this->db->or_like('IDopj', $search); // Untuk menambahkan query where OR LIKE
		    return $this->db->get('opj')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
		}

		public function count_all(){
	    	return $this->db->count_all('opj'); 
	    	// Untuk menghitung semua data siswa
	  	}

		function deleterecords($IDopj){
			$query="DELETE FROM opj WHERE IDopj=$IDopj";
			$this->db->query($query);
		}
 	}	
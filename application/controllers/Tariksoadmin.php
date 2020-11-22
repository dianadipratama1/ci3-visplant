<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tariksoadmin extends CI_Controller {

	// var $API = "";

	function __construct(){
		  parent::__construct();
	    $this->load->model('tariksomodel','model');
      $this->load->library('Ajax_pagination');
      $this->perPage=3;
	}

	function index(){   
    	$this->xajax->register(XAJAX_FUNCTION, array('cariso',&$this,'cariso'));
      $this->xajax->register(XAJAX_FUNCTION, array('simpanso',&$this,'simpanso'));        
      // $this->xajax->register(XAJAX_FUNCTION, array('deleterecords',&$this,'deleterecords'));        
      $this->xajax->processRequest();
      // $config['target']      = '#soList';
      // $config['base_url']    = base_url().'Tarikso/ajaxPaginationData';
      // $config['total_rows']  = $totalRec;
      // $config['per_page']    = $this->perPage;
      // $this->ajax_pagination->initialize($config);
        
      //get the posts data
      // $data['opj'] = $this->post->getRows(array('limit'=>$this->perPage));
        
    	$data['xajax_js'] = $this->xajax->getJavascript();
    	// $data['so']	=	$this->model->cariso()->result();
    	$this->load->view('tarikso\tariksoviewadmin',$data);   
	}


	function cariso($kodeso){ 
      $objResponse= new xajaxResponse();
  		$html = '';
  		$style = "odd";

  		$data1= $this->model->cariso($kodeso);
      $kd= $this->model->carikode($kodeso);
      $kodeplant= $this->model->kodeplant($kodeso);
      // // $data2=$data1['databsp'];
      $no=1;
      $pch = substr($kd,0,1);
      if ($pch=='2'){
        $kd='DATA KOSONG';
      }

      if ($pch=='0') {
        $j=0;
        for ($i=0; $i<count($data1['databsp']); $i++){
          $tt=substr($data1['databsp'][$i]['JO_Number'], 0,6);
          
          if ($tt==$kodeplant){
            $j++;
            $html = $html."<tr>
                            <td>".$no++."</td>                  
                            <td>".$data1['databsp'][$i]['Estimated_TimeDelivery']."</td>
                            <td>".$data1['databsp'][$i]['JO_Number']."</td>
                            <td>".$data1['databsp'][$i]['SO_Number']."</td>
                            <td>".$data1['databsp'][$i]['Project_Location']."</td>
                            <td>".$data1['databsp'][$i]['Old_Number']."</td>
                            <td>".$data1['databsp'][$i]['Unit_Price']."</td>
                            <td>".$data1['databsp'][$i]['Item_Code']."</td>
                            <td>".$data1['databsp'][$i]['Project_Name']."</td>
                            <td>".$data1['databsp'][$i]['Item_Name']."</td>
                            <td>".$data1['databsp'][$i]['Item_Qty_JO']."</td>
                            <td>".$data1['databsp'][$i]['Estimated_TimeProduction']."</td>
                            <td>".$data1['databsp'][$i]['Cust_Code']."</td>
                            <td>".$data1['databsp'][$i]['Item_Qty_SO']."</td>
                            <td>".$data1['databsp'][$i]['Cust_Name']."</td>
                            <td>
                              <a class='btn btn-primary btn-sm' onclick=simpanso('".$kodeso."','".$i."') id='btnsimpan1'>Simpan</a>
                            </td>
                         </tr>";
                         // <a class='btn btn-primary btn-sm simpanso' id='btnsimpan".$i."'>Simpan</a>
                         // <a class='btn btn-primary btn-sm' onclick=simpanso('".$kodeso."','".$i."') id='btnsimpan1'>Simpan</a>
                         // print_r($html);
                         // exit();
          }          
        }

        if ($j==0) {
        $html = "<tr>
                    <td colspan='16' bgcolor='red' align='center' fontcolor='white'><h3>Tidak Ada JO atas Plant ini!!</h3></td>
                  </tr>";
        }
      }else{
        $html = "<tr>
                    <td colspan='16' bgcolor='yellow' align='center'><h3>".$kd."</h3></td>
                  </tr>";
                  // <td colspan='16' bgcolor='yellow' align='center'><h3>".substr($kd,13,38)."</h3></td>
                         // print_r($html);
                         // exit();
    }
      $objResponse->Assign("realisasi2","innerHTML", $html);
  	  return $objResponse;
	}

  function simpanso($kodeso,$noindex){
    $objResponse = new xajaxResponse();
    $data = $this->model->simpanso($kodeso,$noindex);
    // print_r($data);
    // exit();
    if($data==2){
      $objResponse->script("alert('Data Masih Kosong Dan Berhasil Disimpan')");
    }else{   
      $objResponse->script("alert('Data Sudah Ada Dan Berhasil Di Update Jumlah Data SO Asli Dan Jumlah Data SO')");    
    }
    $html = '';
    $data1 = $this->model->display_records();
    $i=1; 
    foreach ($data1 as $row){
      $html= $html."<tr>
                <td>".$i."</td>
                <td>".$row->tglbatas."</td>
                <td>".$row->nomorjo."</td>
                <td>".$row->nomorso."</td>
                <td>".$row->lokasi."</td>
                <td>".$row->nomorsolm."</td>
                <td>".$row->harsat."</td>
                <td>".$row->kobar."</td>
                <td>".$row->nmproyek."</td>
                <td>".$row->nabar."</td>
                <td>".$row->jmlso."</td>
                <td>".$row->tglso."</td>
                <td>".$row->kopel."</td>
                <td>".$row->jmlsoasl."</td>
                <td>".$row->napel."</td>
                <td><button type='button' class='btn btn-danger btn-sm delete' data-IDopj='".$row->IDopj."'>Hapus</button></td>
               </tr>";
          $i++;
      }
    $objResponse->Assign("realisasi2","innerHTML", '');
    $objResponse->Assign("showdatanoso","innerHTML", $html);
    // $objResponse->script("$('#realisasi2'");
    return $objResponse;
  }

  // function viewajax(){
  //   $data = $this->model->display_records();
  //   $i=1; 
  //   foreach ($data as $row) {
  //     echo "<tr>";
  //         echo "<td>".$i."</td>";
  //         echo "<td>".$row->tglbatas."</td>";
  //         echo "<td>".$row->nomorjo."</td>";
  //         echo "<td>".$row->nomorso."</td>";
  //         echo "<td>".$row->lokasi."</td>";
  //         echo "<td>".$row->nomorsolm."</td>";
  //         echo "<td>".$row->harsat."</td>";
  //         echo "<td>".$row->kobar."</td>";
  //         echo "<td>".$row->nmproyek."</td>";
  //         echo "<td>".$row->nabar."</td>";
  //         echo "<td>".$row->jmlso."</td>";
  //         echo "<td>".$row->tglso."</td>";
  //         echo "<td>".$row->kopel."</td>";
  //         echo "<td>".$row->jmlsoasl."</td>";
  //         echo "<td>".$row->napel."</td>";
  //         echo "<td><button type='button' class='btn btn-danger btn-sm delete' data-IDopj='".$row->IDopj."'>Hapus</button></td>";
  //         echo "</tr>";
  //         $i++;
  //   }
  // }

  function nosodata(){
    $data = $this->model->nosolist();
    echo json_encode($data);
  }

  function deleterecords(){
    if ($this->input->post('type')==2) {
      $IDopj = $this->input->post('IDopj');
      $this->model->deleterecords($IDopj);
      echo json_encode(array('statusCode'=>200));
    }
  }
}

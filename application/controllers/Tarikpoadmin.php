<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarikpoadmin extends CI_controller{
	
	function __construct(){
		parent::__construct();
	   $this->load->model('tarikpomodeladmin','model');
	}

	function index(){
    $this->xajax->register(XAJAX_FUNCTION, array('caripo',&$this,'caripo'));
    $this->xajax->register(XAJAX_FUNCTION, array('simpanpo',&$this,'simpanpo'));
		$this->xajax->processRequest();
    $data['xajax_js']   = $this->xajax->getJavascript();   
		$this->load->view('tarikpo/tarikpoviewadmin',$data);
	}

	function caripo($kodepo){
		$objResponse  = new xajaxResponse();
  	$html         = '';
  	$style        = "odd";
  	$data1        = $this->model->caripo($kodepo);
    $kd           = $this->model->carikode($kodepo);

  	$no  =1;
    $pch = substr($kd,0,1);
      
    if ($pch=='2') {
      $kd='DATA KOSONG';
    }

    if ($pch=='0') {
      for ($i=0; $i<count($data1['datajt']); $i++) { 
        $html = $html."<tr>
                          <td>".$no++."</td>                  
                          <td>".$data1['datajt'][$i]['PO_Number']."</td>
                          <td>".$data1['datajt'][$i]['Remaining_Qty']."</td>
                          <td>".$data1['datajt'][$i]['Vend_ID']."</td>
                          <td>".$data1['datajt'][$i]['PO_Date']."</td>
                          <td>".$data1['datajt'][$i]['Old_Number']."</td>
                          <td>".$data1['datajt'][$i]['Vend_Name']."</td>
                          <td>".$data1['datajt'][$i]['Unit_Price']."</td>
                          <td>".$data1['datajt'][$i]['Item_Code']."</td>
                          <td>".$data1['datajt'][$i]['Item_Name']."</td>
                          <td>".$data1['datajt'][$i]['PO_Qty']."</td>
                          <td>".$data1['datajt'][$i]['Vend_Code']."</td>
                          <td><a class='btn btn-primary btn-sm' onclick=simpanpo('".$kodepo."','".$i."')>Simpan</a></td>
                       </tr>";
      }
    }else{
      $html = "<tr>
                  <td colspan='16' bgcolor='yellow' align='center'><h3>".$kd."</h3></td>
               </tr>";
    }
  		
    $objResponse->Assign("realisasipo","innerHTML", $html);
  	return $objResponse;	
	}

  function simpanpo($kodepo,$noindex){
    $objResponse = new xajaxResponse();
    $data = $this->model->simpanpo($kodepo,$noindex);
    if($data==2){
      $objResponse->script("alert('Data PO ".$kodepo." Berhasil Disimpan')");
    }else{   
      $objResponse->script("alert('Data PO ".$kodepo." Sudah Ada')");    
    }

    $objResponse->Assign("realisasipo","innerHTML", '');
    return $objResponse;
  }

  public function view(){
    $search       = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    $limit        = $_POST['length']; // Ambil data limit per page
    $start        = $_POST['start']; // Ambil data start
    $order_index  = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
    $order_field  = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
    $order_ascdesc= $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
    $sql_total    = $this->model->count_all(); // Panggil fungsi count_all pada Model
    $sql_data     = $this->model->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter padaModel
    $sql_filter   = $this->model->count_filter($search); // Panggil fungsi count_filter pada Model
    $callback     = array(
                            'draw'=>$_POST['draw'], // Ini dari datatablenya
                            'recordsTotal'=>$sql_total,
                            'recordsFiltered'=>$sql_filter,
                            'data'=>$sql_data
                    );
    header('Content-Type: application/json');
    echo json_encode($callback); // Convert array $callback ke json
  }

  function deleterecords(){
    if ($this->input->post('type')==2) {
      $IDno_po = $this->input->post('IDno_po');
      $this->model->deleterecords($IDno_po);
      echo json_encode(array('statusCode'=>200));
    }
  }

  function updaterecords(){
    if($this->input->post('type')==3){
      // $IDno_po=$this->input->post('IDno_po');
      $nomorpo=$this->input->post('nomorpo');
      $jum_real=$this->input->post('jum_real');
      $kopel=$this->input->post('kopel');
      $tanggal=$this->input->post('tanggal');
      $nomorpolm=$this->input->post('nomorpolm');
      $namapel=$this->input->post('namapel');
      $harsat=$this->input->post('harsat');
      $nabar=$this->input->post('nabar');
      $kobar=$this->input->post('kobar');
      $jumlah=$this->input->post('jumlah');
      $ind_kopel=$this->input->post('ind_kopel');
      // $this->model->updatedata($nomorpo,$jum_real,$kopel,$tanggal,$nomorpolm,$namapel,$harsat,$kobar,$nabar,$jumlah,$ind_kopel,$IDno_po);
      $this->model->updatedata($nomorpo,$jum_real,$kopel,$tanggal,$nomorpolm,$namapel,$harsat,$kobar,$nabar,$jumlah,$ind_kopel);
      echo json_encode(array("statusCode"=>200));
    } 
  }
}
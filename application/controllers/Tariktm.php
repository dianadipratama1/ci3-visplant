<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tariktm extends CI_Controller {

	function __construct(){
		parent::__construct();
	  $this->load->model('tariktmmodel','model');
	}

	function index(){   
    $this->xajax->register(XAJAX_FUNCTION, array('caritm',&$this,'caritm'));
    $this->xajax->register(XAJAX_FUNCTION, array('cariaset',&$this,'cariaset'));
    $this->xajax->register(XAJAX_FUNCTION, array('simpantm',&$this,'simpantm'));
    $this->xajax->register(XAJAX_FUNCTION, array('simpanaset',&$this,'simpanaset'));               
    $this->xajax->processRequest();        
    $data['xajax_js'] = $this->xajax->getJavascript();
    $this->load->view('tariktm\tariktmview',$data);   
	}

  function cariaset($kodeaset){ 
    $objResponse  = new xajaxResponse();
    $html         = '';
    $style        = "odd";
    $data1        = $this->model->cariaset($kodeaset);
    $kd           = $this->model->carikodeaset($kodeaset);

    $no  =1;
    $pch = substr($kd,0,1);
      
    if ($pch=='2') {
      $kd='DATA KOSONG';
    }

    if ($pch=='0') {
      for ($i=0; $i<count($data1['datavehicle']); $i++) { 
         $html = $html."<tr>
                          <td><font color='#808080'>".$no++."</font></td>                  
                          <td><font color='#808080'>".$data1['datavehicle'][$i]['Serial_No']."</font></td>
                          <td><font color='#808080'>".$data1['datavehicle'][$i]['TM_Number']."</font></td>
                          <td><font color='#808080'>".$data1['datavehicle'][$i]['Asset_Desc']."</font></td>
                          <td><font color='#808080'>".$data1['datavehicle'][$i]['No_Polisi']."</font></td>
                          <td><font color='#808080'>".$data1['datavehicle'][$i]['Asset_Code']."</font></td>
                          <td><a class='btn btn-primary btn-sm' onclick=simpanaset('".$kodeaset."','".$i."')>Simpan</a></td>
                       </tr>";
      }
    }else{
      $html = "<tr>
                  <td colspan='16' bgcolor='yellow' align='center'><h3 color='#808080'>".$kd."</h3></td>
               </tr>";
    }
      
    $objResponse->Assign("realaset","innerHTML", $html);
    return $objResponse;  
  }

	function caritm($kodetm){ 
    $objResponse  = new xajaxResponse();
    $html         = '';
    $style        = "odd";
    $data1        = $this->model->caritm($kodetm);
    $kd           = $this->model->carikode($kodetm);
    // print_r($kd);
    // exit();

    $no  =1;
    $pch = substr($kd,0,1);
      
    if ($pch=='2') {
      $kd='DATA KOSONG';
    }

    if ($pch=='0') {
      for ($i=0; $i<count($data1['datavehicle']); $i++) { 
         $html = $html."<tr>
                          <td><font color='#808080'>".$no++."</font></td>                  
                          <td><font color='#808080'>".$data1['datavehicle'][$i]['Serial_No']."</font></td>
                          <td><font color='#808080'>".$data1['datavehicle'][$i]['TM_Number']."</font></td>
                          <td><font color='#808080'>".$data1['datavehicle'][$i]['Asset_Desc']."</font></td>
                          <td><font color='#808080'>".$data1['datavehicle'][$i]['No_Polisi']."</font></td>
                          <td><font color='#808080'>".$data1['datavehicle'][$i]['Asset_Code']."</font></td>
                          <td><a class='btn btn-primary btn-sm' onclick=simpantm('".$kodetm."','".$i."')>Simpan</a></td>
                       </tr>";
      }
    }else{
      $html = "<tr>
                  <td colspan='16' bgcolor='yellow' align='center'><h3>".$kd."</h3></td>
               </tr>";
    }
      
    $objResponse->Assign("realisasitm","innerHTML", $html);
    return $objResponse;  
	}

  function simpantm($kodetm,$noindex){
    $objResponse = new xajaxResponse();
    $data = $this->model->simpantm($kodetm,$noindex);
    if($data==5){
      $objResponse->script("alert('Data Masih Kosong Dan Berhasil Disimpan')");
    }else{
      if ($data==4) {
        $objResponse->script("alert('Data No_Polisi Belum Lengkap ! Silahkan Hub Bag Aset')");   
      }else{
        if ($data==3) {
          $objResponse->script("alert('Data Asset_Code Belum Lengkap ! Silahkan Hub Bag Aset')"); 
        }else{
          if ($data==2) {
            $objResponse->script("alert('Data TM_Number Belum Lengkap ! Silahkan Hub Bag Aset')"); 
          }else{
            $objResponse->script("alert('Data TM / Aset TM Sudah Ada')");
          }
        }
      }    
    }
    $objResponse->Assign("realisasitm","innerHTML", '');
    return $objResponse;
  }

   function simpanaset($kodeaset,$noindex){
    $objResponse = new xajaxResponse();
    $data = $this->model->simpanaset($kodeaset,$noindex);
    // print_r($data);
    // exit();
    if($data==5){
      $objResponse->script("alert('Data Masih Kosong Dan Berhasil Disimpan')");
    }else{
      if ($data==4) {
        $objResponse->script("alert('Data No_Polisi Belum Lengkap ! Silahkan Hub Bag Aset')");   
      }else{
        if ($data==3) {
          $objResponse->script("alert('Data Asset_Code Belum Lengkap ! Silahkan Hub Bag Aset')"); 
        }else{
          if ($data==2) {
            $objResponse->script("alert('Data TM_Number Belum Lengkap ! Silahkan Hub Bag Aset')"); 
          }else{
            if ($data==1) {
              $objResponse->script("alert('Data TM / Aset TM Sudah Ada')");
            }
          }
        }
      }    
    }
    $objResponse->Assign("realaset","innerHTML", '');
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
      $IDtm = $this->input->post('IDtm');
      $this->model->deleterecords($IDtm);
      echo json_encode(array('statusCode'=>200));
    }
  }
}

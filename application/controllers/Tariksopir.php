<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Tariksopir extends CI_controller
{
	function __construct(){
    parent::__construct();
     $this->load->model('tariksopirmodel','model');
  }

  function index(){
    $this->xajax->register(XAJAX_FUNCTION, array('carisopir',&$this,'carisopir'));
    $this->xajax->register(XAJAX_FUNCTION, array('simpansopir',&$this,'simpansopir'));
    $this->xajax->processRequest();
    $data['xajax_js']   = $this->xajax->getJavascript();   
    $this->load->view('tariksopir/tariksopirview',$data);
  }

  function carisopir($kodepgw){
    $objResponse  = new xajaxResponse();
    $html         = '';
    $style        = "odd";
    $data1        = $this->model->carisopir($kodepgw);
    $kd           = $this->model->carikode($kodepgw);

    $no  =1;
    $pch = substr($kd,0,1);
      
    if ($pch=='2') {
      $kd='DATA KOSONG';
    }

    if ($pch=='0') {
      for ($i=0; $i<count($data1['datadriver']); $i++) { 
        $html = $html."<tr>
                          <td>".$no++."</td>                  
                          <td>".$data1['datadriver'][$i]['EMP_ID']."</td>
                          <td>".$data1['datadriver'][$i]['Driver_Name']."</td>
                          <td><a class='btn btn-primary btn-sm' onclick=simpansopir('".$kodepgw."','".$i."')>Simpan</a></td>
                       </tr>";
      }
    }else{
      $html = "<tr>
                  <td colspan='16' bgcolor='yellow' align='center'><h3>".$kd."</h3></td>
               </tr>";
    }
      
    $objResponse->Assign("realisasisopir","innerHTML", $html);
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
    if ($this->input->post('type')==2){
      $IDspr = $this->input->post('IDspr');
      $this->model->deleterecords($IDspr);
      echo json_encode(array('statusCode'=>200));
    }
  }

  function simpansopir($kodepgw,$noindex){
    $objResponse = new xajaxResponse();
    $data = $this->model->simpansopir($kodepgw,$noindex);
    if($data==2){
      $objResponse->script("alert('Data PO ".$kodepgw." Berhasil Disimpan')");
    }else{   
      $objResponse->script("alert('Data PO ".$kodepgw." Sudah Ada')");    
    }

    $objResponse->Assign("realisasisopir","innerHTML", '');
    return $objResponse;
  }

  function updaterecords(){
    if($this->input->post('type')==3){
      $idsopir    = $this->input->post('idsopir');
      $nopeg    = $this->input->post('nopeg');
      $kd_sopir = $this->input->post('kd_sopir');
      $nm_sopir = $this->input->post('nm_sopir');
      $alamat   = $this->input->post('alamat');
      $kota     = $this->input->post('kota');
      $this->model->updatedata($nopeg,$kd_sopir,$nm_sopir,$alamat,$kota);
      echo json_encode(array("statusCode"=>200));
    } 
  }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarikso extends CI_Controller {

	function __construct(){
		parent::__construct();
	  $this->load->model('tariksomodel','model');
	}

	function index(){   
    $this->xajax->register(XAJAX_FUNCTION, array('cariso',&$this,'cariso'));
    $this->xajax->register(XAJAX_FUNCTION, array('simpanso',&$this,'simpanso'));               
    $this->xajax->processRequest();        
    $data['xajax_js'] = $this->xajax->getJavascript();
    $this->load->view('tarikso\tariksoview',$data);   
	}


	function cariso($kodeso){ 
    $objResponse  = new xajaxResponse();
  	$html         = '';
  	$style        = "odd";

  	$data1        = $this->model->cariso($kodeso);
    $kd           = $this->model->carikode($kodeso);
    $kodeplant    = $this->model->kodeplant($kodeso);
     
    $no   = 1;
    $pch  = substr($kd,0,1);
    // print_r($pch);
    // exit();
    if($pch=='2'){
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
    if($data==2){
      $objResponse->script("alert('Data Masih Kosong Dan Berhasil Disimpan')");
    }else{   
      $objResponse->script("alert('Data Sudah Ada Dan Berhasil Di Update Jumlah Data SO Asli Dan Jumlah Data SO')");    
    }
    $objResponse->Assign("realisasi2","innerHTML", '');
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
      $IDopj = $this->input->post('IDopj');
      $this->model->deleterecords($IDopj);
      echo json_encode(array('statusCode'=>200));
    }
  }
}

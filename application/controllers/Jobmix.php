
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobmix extends CI_Controller {

	function __construct(){
		parent::__construct();
	  $this->load->model('jobmixmodel','model');
	}

	function index(){                 
    $this->xajax->processRequest();        
    $data['xajax_js'] = $this->xajax->getJavascript();
    $this->load->view('jobmix\jobmixview',$data);   
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

  function savedata(){
    if($this->input->post('type')==1){
      // $No_simpan          = $this->input->post('No_simpan');     
      // $KD_BRG_simpan      = $this->input->post('KD_BRG_simpan');
      // $Keterangan_simpan  = $this->input->post('Keterangan_simpan');
      // $SEMEN_simpan       = $this->input->post('SEMEN_simpan');
      // $SEMEN2_simpan      = $this->input->post('SEMEN2_simpan');
      // $FLYASH_simpan      = $this->input->post('FLYASH_simpan');
      // $PASIR_simpan       = $this->input->post('PASIRB_simpan');
      // $PASIRB_simpan      = $this->input->post('PASIRB_simpan');
      // $AIR_simpan         = $this->input->post('AIR_simpan');
      // $BP1020_simpan      = $this->input->post('BP1020_simpan');
      // $BP2030_simpan      = $this->input->post('BP2030_simpan');
      // $BP510_simpan       = $this->input->post('BP510_simpan');
      // $ADD1_simpan        = $this->input->post('ADD1_simpan');
      // $ADD2_simpan        = $this->input->post('ADD2_simpan');
      // $ADD3_simpan        = $this->input->post('ADD3_simpan');
      // $ADD4_simpan        = $this->input->post('ADD4_simpan');
      // $ADD5_simpan        = $this->input->post('ADD5_simpan');
      // $ADD6_simpan        = $this->input->post('ADD6_simpan');
      $no     = $this->input->post('No_simpan');     
      $kdbrg  = $this->input->post('KD_BRG_simpan');
      $ket    = $this->input->post('Keterangan_simpan');
      $semen  = $this->input->post('SEMEN_simpan');
      $semen2 = $this->input->post('SEMEN2_simpan');
      $flyash = $this->input->post('FLYASH_simpan');
      $pasir  = $this->input->post('PASIRB_simpan');
      $pasirb = $this->input->post('PASIRB_simpan');
      $air    = $this->input->post('AIR_simpan');
      $bp1020 = $this->input->post('BP1020_simpan');
      $bp2030 = $this->input->post('BP2030_simpan');
      $bp510  = $this->input->post('BP510_simpan');
      $add1   = $this->input->post('ADD1_simpan');
      $add2   = $this->input->post('ADD2_simpan');
      $add3   = $this->input->post('ADD3_simpan');
      $add4   = $this->input->post('ADD4_simpan');
      $add5   = $this->input->post('ADD5_simpan');
      $add6   = $this->input->post('ADD6_simpan');
      // $this->model->saverecords($No_simpan,$KD_BRG_simpan,$Keterangan_simpan,$SEMEN_simpan,$SEMEN2_simpan,$FLYASH_simpan,$PASIR_simpan,$PASIRB_simpan,$AIR_simpan,$BP1020_simpan,$BP2030_simpan,$BP510_simpan,$ADD1_simpan,$ADD2_simpan,$ADD3_simpan,$ADD4_simpan,$ADD5_simpan,$ADD6_simpan);
      $this->model->saverecords($no,$kdbrg,$ket,$semen,$semen2,$flyash,$pasir,$pasirb,$air,$bp1020,$bp2030,$bp510,$add1,$add2,$add3,$add4,$add5,$add6);
      echo json_encode(array(
        "statusCode"=>200
      ));
    } 
  }

  function updaterecords(){
    // print_r($this->input->post());
    // exit();
    if($this->input->post('type')==3){
      $idjbmx      = $this->input->post('idjbmx'); 
      $no          = $this->input->post('no');     
      $kd_brg      = $this->input->post('kd_brg');
      $keterangan  = $this->input->post('keterangan');
      $semen       = $this->input->post('semen');
      $semen2      = $this->input->post('semen2');
      $flyash      = $this->input->post('flyash');
      $pasir       = $this->input->post('pasir');
      $pasirb      = $this->input->post('pasir');
      $air         = $this->input->post('air');
      $bp1020      = $this->input->post('bp1020');
      $bp2030      = $this->input->post('bp2030');
      $bp510       = $this->input->post('bp510');
      $add1        = $this->input->post('add1');
      $add2        = $this->input->post('add2');
      $add3        = $this->input->post('add3');
      $add4        = $this->input->post('add4');
      $add5        = $this->input->post('add5');
      $add6        = $this->input->post('add6');
      // print_r($add5);
      // exit();
      $this->model->updatedata($idjbmx,$no,$kd_brg,$keterangan,$semen,$semen2,$flyash,$pasir,$pasirb,$air,$bp1020,$bp2030,$bp510,$add1,$add2,$add3,$add4,$add5,$add6);
      // print_r($a);
      // exit();
      echo json_encode(array("statusCode"=>200));
    } 
  }

  function deleterecords(){
    if ($this->input->post('type')==2) {
      $IDjbmx = $this->input->post('IDjbmx');
      $this->model->deleterecords($IDjbmx);
      echo json_encode(array('statusCode'=>200));
    }
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setkobar extends CI_Controller {

	function __construct(){
		parent::__construct();
	  $this->load->model('setkobarmodel','model');
	}

	function index(){                 
    $this->xajax->processRequest();        
    $data['xajax_js'] = $this->xajax->getJavascript();
    $this->load->view('setkobar\setkobarview',$data);   
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

  function updaterecords(){
    if($this->input->post('type')==3){
      // $IDno_po=$this->input->post('IDno_po');
      $idkobarplant=$this->input->post('idkobarplant');
      $nabar=$this->input->post('nabar');
      $kobar=$this->input->post('kobar');
      $sts=$this->input->post('sts');
      // $this->model->updatedata($nomorpo,$jum_real,$kopel,$tanggal,$nomorpolm,$namapel,$harsat,$kobar,$nabar,$jumlah,$ind_kopel,$IDno_po);
      $this->model->updatedata($idkobarplant,$nabar,$kobar,$sts);
      echo json_encode(array("statusCode"=>200));
    } 
  }
}

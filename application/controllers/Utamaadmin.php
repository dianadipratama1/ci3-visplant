<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utamaadmin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('utamamodel','model');
	}

	public function index(){
		$data['xajax_js']	= $this->xajax->getJavascript();
		$data['totalso']	= $this->model->totalso();
		$data['totalpo']	= $this->model->totalpo();
		$data['totalsopir'] = $this->model->totalsopir();
		$data['totaltm']	= $this->model->totaltm();
		$data['totalsp2']	= $this->model->totalsp2();
		$data['totaljobmix']= $this->model->totaljobmix();
		$this->load->view('Utama/Utamaviewadmin',$data);
	}
}

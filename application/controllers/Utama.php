<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
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
		if ($this->session->userdata('level')==='1'){
			$this->load->view('Utama/Utamaview',$data);
		}else{
			echo "Access Denied";
		}
	}

	function staff(){
		$data['xajax_js']	= $this->xajax->getJavascript();
		$data['totalso']	= $this->model->totalso();
		$data['totalpo']	= $this->model->totalpo();
		$data['totalsopir'] = $this->model->totalsopir();
		$data['totaltm']	= $this->model->totaltm();
		$data['totalsp2']	= $this->model->totalsp2();
		$data['totaljobmix']= $this->model->totaljobmix();
		if ($this->session->userdata('level')==='2'){
			$this->load->view('Utama/Utamaview',$data);
		}else{
			echo "Access Denied";
		}
	}

	function author(){
		$data['xajax_js']	= $this->xajax->getJavascript();
		$data['totalso']	= $this->model->totalso();
		$data['totalpo']	= $this->model->totalpo();
		$data['totalsopir'] = $this->model->totalsopir();
		$data['totaltm']	= $this->model->totaltm();
		$data['totalsp2']	= $this->model->totalsp2();
		$data['totaljobmix']= $this->model->totaljobmix();
		if ($this->session->userdata('level')==='3'){
			$this->load->view('Utama/Utamaview',$data);
		}else{
			echo "Access Denied";
		}
	}

}

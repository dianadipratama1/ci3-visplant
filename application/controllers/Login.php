<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('loginmodel','model');
    }

    function index(){
        $this->load->view('login/loginview');
    }

    function auth(){
        $username = $this->input->post('username',TRUE);
        // $password = md5($this->input->post('password',TRUE));
        $password = $this->input->post('password',TRUE);
        $validate = $this->model->validate($username,$password);
        // print_r($validate);
        // exit();
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $nama  = $data['nama'];
            $level = $data['level'];
            $sesdata = array(
                'nama'      => $nama,
                'username'  => $username,
                'level'     => $level,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if($level === '1'){
                redirect('Utama');

            // access login for staff
            }elseif($level === '2'){
                redirect('Utama/staff');

            // access login for author
            }else{
                redirect('Utama/author');
            }
        }else{
            echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            redirect('Login');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}
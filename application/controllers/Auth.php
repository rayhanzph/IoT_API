<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }
  public function index()
  {
    $data['title'] = 'Login Page';

    $this->form_validation->set_rules('email','Email','required|trim|valid_email');
    $this->form_validation->set_rules('password','Password','required|trim');
    if($this->form_validation->run() == false){
      $this->load->view('templates/sb_header',$data);
      $this->load->view('auth/login');
      $this->load->view('templates/sb_footer');
    }else{
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user',['email' => $email])->row_array();

    if($user){
      if(password_verify($password,$user['password'])){
        $data = [
          'email' => $user['email'],
          'control' => $user['control'],
          'role' => $user['role']
        ];
        $this->session->set_userdata($data);
        if($user['role'] == 1){
          redirect('Admin');
        }else{
          redirect('User');
        }
      }else{
        $this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Password salah!</div>');
        redirect('Auth');
      }
    }else{
      $this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Password salah!</div>');
      redirect('Auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role');
    $this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Anda telah keluar!</div>');
    redirect('Auth');
  }
  // public function register()
  // {
  //   $data = [
  //     'nama' => '',
  //     'email' => 'Rayhan@gmail.com',
  //     'password' => password_hash('rayhan',PASSWORD_DEFAULT),
  //     'lokasi' => 'SMK NEGERI 1 PURWOKERTO',
  //     'control' => 'lampu',
  //     'role' => 1,
  //     'date_created' => time()
  //   ];
  //
  //   $this->db->insert('user',$data);
  //   $this->session->set_flashdata('alert','berhasil');
  //   redirect('Auth');
  // }
}

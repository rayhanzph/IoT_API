<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect('Auth');
    }
  }
  public function index()
  {
    $data['title'] = 'Suhu';
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get_where('menu',['id' => '3'])->result_array();
    $this->load->view('templates/dash_header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('user/index',$data);
    $this->load->view('templates/dash_footer',$data);

  }
    public function suhu()
  {
    $data['title'] = 'Suhu';
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get_where('menu',['id' => '3'])->result_array();
    $this->load->view('templates/dash_header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('user/index',$data);
    $this->load->view('templates/dash_footer',$data);

  }
}

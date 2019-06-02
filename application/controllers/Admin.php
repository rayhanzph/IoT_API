<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get_where('menu',['role' => $this->session->userdata('role')])->result_array();
    $this->load->view('templates/dash_header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/index');
    $this->load->view('templates/dash_footer');
  }
  public function lampu()
  {
    $data['title'] = 'Lampu';
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get_where('menu',['role' => $this->session->userdata('role')])->result_array();
    $this->load->view('templates/dash_header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/lampu');
    $this->load->view('templates/dash_footer');
  }

  public function suhu()
  {
    $data['title'] = 'Suhu';
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get_where('menu',['role' => $this->session->userdata('role')])->result_array();
    $this->load->view('templates/dash_header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/suhu');
    $this->load->view('templates/dash_footer');
  }
}

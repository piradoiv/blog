<?php

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['yield'] = $this->load->view('login');
    $this->load->view('template', $data);
  }

  public function submit()
  {
    $email    = $this->input->post('email');
    $password = $this->input->post('password');
    $this->vault->login($email, $password, true);

    redirect(base_url());
  }
}


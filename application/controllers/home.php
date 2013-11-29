<?php

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = array();

    if ($this->vault->isLogged()) {
      $data['user'] = $this->vault->user;
    }

    $data['yield'] = $this->load->view('home', $data, true);
    $this->load->view('template', $data);
  }
}


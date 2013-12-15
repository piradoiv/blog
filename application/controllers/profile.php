<?php

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index($username = null)
  {
    $user = new User;
    $user->where('username', $username)->get();

    $data = array(
      'user' => $user
    );

    $data['yield'] = $this->load->view('profile', $data, true);
    $this->load->view('template', $data);
  }
}


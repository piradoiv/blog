<?php

class Settings extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->vault->watchdog(true);
  }

  public function index()
  {
    $data = array(
      'user' => $this->vault->user
    );
    $data['yield'] = $this->load->view('settings/index', $data, true);
    $this->load->view('template', $data);
  }

  public function update()
  {
    $user = $this->vault->user;
    $user->name    = $this->input->post('name', true);
    $user->surname = $this->input->post('surname', true);
    $user->bio     = $this->input->post('bio', true);
    $user->save();

    redirect('settings');
  }
}


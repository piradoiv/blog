<?php

class Users extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->vault->permission('users');
  }

  public function index()
  {
    $users = new User;
    $data = array(
      'usersCount'  => $users->where('status', 'Active')->count(),
      'inviteCount' => $users->where('status', 'Invited')->count()
    );
    $data['yield'] = $this->load->view('users/index', $data, true);
    $this->load->view('template', $data);
  }

  public function invite()
  {
    $data = array();
    $data['yield'] = $this->load->view('users/invite', $data, true);
    $this->load->view('template', $data);
  }

  public function send_invitation()
  {
    $user = new User;
    $user->email  = $this->input->post('email', true);
    $user->status = 'Invited';
    $user->save();

    redirect('users');
  }
}


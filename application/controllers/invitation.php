<?php

class Invitation extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function claim($token = null)
  {
    if (!$token) {
      show_404();
    }

    $data = array(
      'token' => $token
    );
    $data['yield'] = $this->load->view('invitation/claim', $data, true);
    $this->load->view('template', $data);
  }

  public function register()
  {
    $token    = $this->input->post('token', true);
    $email    = $this->input->post('email', true);
    $password = $this->input->post('password', true);

    $user = new User;
    $user->where('token', $token)
      ->where('email', $email)
      ->get();

    if (!$user->result_count()) {
      show_error('Invalid token :-/');
    }

    $user->salt     = do_hash(rand(0,999999999));
    $user->password = do_hash($user->salt.$password);
    $user->token    = null;
    $user->status   = 'Active';
    $user->save();

    redirect('login');
  }
}


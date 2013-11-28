<?php

class Install extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // Don't allow to use this controller
    // if there are already users on
    // the database.
    $users = new $this->user;
    if ($users->count() > 0) {
      show_404();
    }
  }

  public function index()
  {
    $data['pageTitle'] = 'Install';
    $data['email']     = $this->session->userdata('install_email');
    $data['yield']     = $this->load->view('install/index', $data);
    $this->load->view('template', $data);
  }

  public function submit()
  {
    $email    = trim($this->input->post('email'));
    $password = $this->input->post('password');

    if (empty($email) || empty($password)) {
      $this->_error();
    }

    $user     = new $this->user;
    $salt     = do_hash(rand(0,999999999));

    $user->email    = $email;
    $user->salt     = $salt;
    $user->password = do_hash($salt.$password);

    $this->session->set_flashdata('flashMessage', 'Installation complete');
    $result = $user->save();
    if (!$result) {
      $this->_error();
    }

    redirect(base_url());
  }

  function _error()
  {
    $this->session->set_userdata('install_email', $this->input->post('email'));
    redirect('install');
  }
}


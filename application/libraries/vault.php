<?php

class Vault
{
  private $_ci    = null;
  private $logged = null;
  private $user   = null;

  public function __construct()
  {
    $this->watchdog(false);
  }

  public function watchdog($redirect = false)
  {
    if ($this->logged === null) {
      $_ci      = $this->ci();
      $user     = new $_ci->user;
      $email    = $this->ci()->session->userdata('email');
      $password = $this->ci()->session->userdata('password');

      $response = $user->checkLogin($email, $password);

      if (!$response) {
        $this->logged = false;
        $this->user   = null;
      } else {
        $this->logged = true;
        $this->user   = $response;
      }
    }

    if ($redirect && !$this->logged) {
      redirect('login');
    }

    return $this->logged;
  }

  public function login($email = null, $password = null, $redirect = false)
  {
    $this->session->set_userdata('email', $email);
    $this->session->set_userdata('password', $password);
    $this->watchdog($redirect);
  }

  private function ci()
  {
    if (!$this->_ci) {
      $this->_ci = &get_instance();
    }

    return $this->_ci;
  }
}


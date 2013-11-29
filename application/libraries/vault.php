<?php

class Vault
{
  private $logged = null;
  private $user   = null;
  private $_ci    = null;

  public function __construct()
  {
    $this->_ci = &get_instance();
    $this->_ci->output->enable_profiler(true);
    $this->watchdog(false);
  }

  public function watchdog($redirect = false)
  {
    if ($this->logged === null) {
      $user     = new User;
      $email    = $this->_ci->session->userdata('email');
      $password = $this->_ci->session->userdata('password');

      $response = $user->checkLogin($email, $password);

      if (!$response) {
        $this->logged = false;
        $this->user   = null;
        $this->_ci->session->unset_userdata('password');
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

  public function isLogged()
  {
    return $this->watchdog(false);
  }

  public function login($email = null, $password = null, $redirect = false)
  {
    $this->_ci = &get_instance();
    $this->_ci->session->set_userdata('email', $email);
    $this->_ci->session->set_userdata('password', $password);
    $this->watchdog($redirect);
  }
}


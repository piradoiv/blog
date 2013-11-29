<?php

class Vault
{
  private $logged = null;
  private $user   = null;

  public function __construct()
  {
    $this->watchdog(false);
    $_ci = &get_instance();
    $_ci->output->enable_profiler(true);
  }

  public function watchdog($redirect = false)
  {
    if ($this->logged === null) {
      $_ci      = &get_instance();
      $user     = new User;
      $email    = $_ci->session->userdata('email');
      $password = $_ci->session->userdata('password');

      $response = $user->checkLogin($email, $password);

      if (!$response) {
        $this->logged = false;
        $this->user   = null;
        $_ci->session->unset_userdata('password');
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
    $_ci = &get_instance();
    $_ci->session->set_userdata('email', $email);
    $_ci->session->set_userdata('password', $password);
    $this->watchdog($redirect);
  }
}


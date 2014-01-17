<?php

class Vault
{
  private $logged = null;
  public  $user   = null;
  private $_ci    = null;

  public function __construct()
  {
    $this->_ci = &get_instance();
    $this->watchdog(false);
  }

  public function watchdog($redirect = false, $forceCheck = false)
  {
    if ($this->logged === null || $forceCheck) {
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
    $this->watchdog($redirect, true);
  }

  public function permission($permission = null, $stop = true)
  {
    if (!in_array($permission, $this->getPermissions())) {
      if ($stop) {
        $this->accessDenied();
      }
      return false;
    }

    return true;
  }

  public function getPermissions()
  {
    if (!isset($this->permissions)) {
      $this->permissions = array();
      $permissions = $this->user->permission->get();
      $groups      = $this->user->group->get();

      foreach ($permissions as $current) {
        array_push($this->permissions, $current->name);
      }

      foreach ($groups as $current) {
        $currentPermissions = $current->permission->get();
        foreach ($currentPermissions as $permission) {
          array_push($this->permissions, $permission->name);
        }
      }

      $this->permissions = array_unique($this->permissions);
    }

    return $this->permissions;
  }

  public function accessDenied()
  {
    $data['yield'] = $this->_ci->load->view('access_denied', null, true);
    $this->_ci->load->view('template', $data);
    $this->_ci->output->_display();
    exit();
  }
}


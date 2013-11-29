<?php

class User extends Datamapper
{
  public $validation = array(
    'email' => array(
      'field' => 'email',
      'label' => 'Email',
      'rules' => array('required', 'valid_email')
    ),
    'password' => array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => array('required')
    )
  );

  public function __construct($id = null)
  {
    parent::__construct($id);
  }

  function checkLogin($email = null, $password = null)
  {
    if (!$email || !$password) {
      return false;
    }

    $user = $this->where('email', $email)
      ->limit(1)
      ->get();

    if (!$user->result_count()) {
      return false;
    }

    $generatedPassword = do_hash($this->salt.$password);
    if ($generatedPassword != $this->password) {
      return false;
    }

    return $this;
  }
}


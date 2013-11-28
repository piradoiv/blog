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
}


<?php

class Subscription extends Datamapper
{
  public $validation = array(
    'email' => array(
      'label' => 'Email',
      'rules' => array('required', 'unique', 'valid_email')
    )
  );

  public function __construct($id = null)
  {
    parent::__construct($id);
  }
}


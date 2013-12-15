<?php

class Subscription extends Datamapper
{
  public $validation = array(
    'email' => array(
      'label' => 'Email',
      'rules' => 'required'
    )
  );

  public function __construct($id = null)
  {
    parent::__construct($id);
  }
}


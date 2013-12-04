<?php

class Tag extends Datamapper
{
  public $has_many = array('article');

  public $validation = array(
    'name' => array(
      'label' => 'Name',
      'rules' => array('required')
    )
  );

  public function __construct($id = null)
  {
    parent::__construct($id);
  }
}


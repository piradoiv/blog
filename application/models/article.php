<?php

class Article extends Datamapper
{
  public $has_one = array('user');

  public function __construct($id = null)
  {
    parent::__construct($id);
  }
}


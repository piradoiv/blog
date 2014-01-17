<?php
class Group extends Datamapper
{
  public $has_many = array('permission', 'user');
}


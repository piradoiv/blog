<?php
class Permission extends Datamapper
{
  public $has_many = array('group', 'user');
}


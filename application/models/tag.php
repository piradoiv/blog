<?php

class Tag extends Datamapper
{
  public $has_many = array('article');

  public $validation = array(
    'name' => array(
      'label' => 'Name',
      'rules' => array('required', 'trim', 'unique')
    ),
    'friendly_name' => array(
      'label' => 'Friendly Name',
      'rules' => array('trim', 'unique')
    )
  );

  public function __construct($id = null)
  {
    parent::__construct($id);
  }

  function friendlyName()
  {
    $result = $this->name;
    $result = mb_strtolower($result, 'utf-8');
    $result = str_replace(' ', '-', $result);

    return $result;
  }

  function cleanOrphans()
  {
    $orphans = new Tag;
    $orphans->include_related_count('article')
      ->having('article_count', 0)
      ->get();

    $orphans->delete_all();
  }
}


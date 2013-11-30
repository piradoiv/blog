<?php

class Article extends Datamapper
{
  public $has_one = array('user');

  public $validation = array(
    'title' => array(
      'label' => 'Title',
      'rules' => array('required')
    ),
    'slug' => array(
      'label' => 'Slug',
      'rules' => array('required')
    )
  );

  public function __construct($id = null)
  {
    parent::__construct($id);
  }

  function permalink($page = null)
  {
    return site_url("{$this->slug}-{$this->id}/{$page}");
  }

  function render()
  {
    return $this->contents;
  }
}


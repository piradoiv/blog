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

  private $render = null;

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
    if (!$this->render) {
      $markdown = $this->contents;
      $markdown = str_replace('###',   '#####', $markdown);
      $markdown = str_replace('##',    '####', $markdown);
      $markdown = str_replace('#',     '###', $markdown);

      $this->render = \Michelf\Markdown::defaultTransform($markdown);
    }

    return $this->render;
  }
}


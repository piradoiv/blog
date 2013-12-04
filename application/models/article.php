<?php

class Article extends Datamapper
{
  public $has_one  = array('user');
  public $has_many = array('tag');

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

  function explodeTags($string = null)
  {
    $tags = explode(',', $string);
    $oldTags = $this->tag->get();
    $this->delete($oldTags->all);
    $oldTags->cleanOrphans();

    foreach ($tags as $current) {
      $current = trim($current);
      $tag = new Tag;
      $tag->where('name', $current)->get();
      if (!$tag->result_count()) {
        $tag->name          = $current;
        $tag->friendly_name = $tag->friendlyName();
        $tag->save();
      }

      $this->save($tag);
    }
  }

  function implodeTags()
  {
    $this->tag->get();
    $tags = array();

    foreach ($this->tag as $current) {
      array_push($tags, $current->name);
    }

    $result = implode(', ', $tags);

    return $result;
  }
}


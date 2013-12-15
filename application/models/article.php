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

  public function __construct($id = null)
  {
    parent::__construct($id);
  }

  function permalink($page = null)
  {
    return site_url("{$this->slug}-{$this->id}/{$page}");
  }

  function render($store = false, $force = false)
  {
    if (!$this->render || $force) {
      $markdown = $this->contents;

      $html = \Michelf\Markdown::defaultTransform($markdown);
      $html = str_replace('&amp;lt;', '&#60;', $html);
      $html = str_replace('&amp;gt;', '&#62;', $html);
      $html = str_replace('<pre><code>', '<textarea class="codemirror">', $html);
      $html = str_replace('</code></pre>', '</textarea>', $html);

      // Permalinks
      $html = preg_replace('/{{permalink-(.*)}}/', '/permalink-$1', $html);

      $this->render = $html;

      if ($store) {
        $this->save();
      }
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


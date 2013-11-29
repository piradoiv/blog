<?php

class Posts extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->vault->watchdog(true);
  }

  public function edit($id = null)
  {
    $post = new Article($id);
    if ($id && !$post->exists()) {
      show_404();
    }

    $data['post']  = $post;
    $data['yield'] = $this->load->view('posts/edit', $data, true);
    $this->load->view('template', $data);
  }

  public function create()
  {
    $this->edit();
  }

  public function update($id = null)
  {
    $post = new Article($id);
    if ($id && !$post->exists()) {
      show_404();
    }

    $post->title     = $this->input->post('title', true);
    $post->subtitle  = $this->input->post('subtitle', true);
    $post->slug      = $this->input->post('slug', true);
    $post->contents  = $this->input->post('contents', true);
    $post->published = $this->input->post('published', true);

    if (!$post->user_id) {
      $post->save($this->vault->user);
    } else {
      $post->save();
    }

    redirect("posts/edit/{$post->id}");
  }
}


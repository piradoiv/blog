<?php

class Posts extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->vault->isLogged()) {
      if ($this->uri->segment(2) || current_url() == site_url('posts')) {
        show_404();
      }
    }
  }

  public function index()
  {
    $posts = new Article;
    $posts->get();

    $data['posts'] = $posts;
    $data['yield'] = $this->load->view('posts/index', $data, true);
    $this->load->view('template', $data);
  }

  public function show($id = null)
  {
    $post = new Article($id);
    if (!$post->exists()) {
      show_404();
    }

    if (!$this->vault->isLogged() && $post->published != 'yes') {
      show_404();
    }

    if (current_url() != $post->permalink()) {
      redirect($post->permalink());
    }

    $data['pageTitle'] = $post->title;
    $data['post']      = $post;
    $data['yield']     = $this->load->view('posts/show', $data, true);
    $this->load->view('template', $data);
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

    if ($post->published == 'yes' && !$post->published_at) {
      $post->published_at = date('Y-m-d H:i:s');
      $post->save();
    }

    redirect($post->permalink('edit'));
  }
}


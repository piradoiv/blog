<?php

class Posts extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $posts = new Article;
    $posts->order_by('published_at', 'desc')
      ->order_by('id', 'desc')
      ->where('published', 'yes')
      ->get();

    $data['posts'] = $posts;
    $data['yield'] = $this->load->view('posts/index', $data, true);
    $this->load->view('template', $data);
  }

  public function drafts()
  {
    if (!$this->vault->isLogged()) {
      show_404();
    }

    $posts = new Article;
    $posts->order_by('id', 'desc')
      ->where('published', 'no')
      ->where_related_user($this->vault->user)
      ->get();

    $data['posts'] = $posts;
    $data['yield'] = $this->load->view('posts/index', $data, true);
    $this->load->view('template', $data);
  }

  public function show($id = null)
  {
    $post   = new Article($id);
    $author = $post->user->get();
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
    $data['author']    = $author;
    $data['yield']     = $this->load->view('posts/render', $data, true);
    $data['yield']     = $this->load->view('posts/show', $data, true);
    $this->load->view('template', $data);
  }

  public function edit($id = null)
  {
    if (!$this->vault->isLogged()) {
      show_404();
    }

    $post = new Article($id);
    if ($id && !$post->exists()) {
      show_404();
    }

    if ($id && $this->vault->user->id != $post->user_id) {
      show_404();
    }

    $data['post']  = $post;
    $data['yield'] = $this->load->view('posts/edit', $data, true);
    $this->load->view('template', $data);
  }

  public function create()
  {
    if (!$this->vault->isLogged()) {
      show_404();
    }

    $this->edit();
  }

  public function update($id = null)
  {
    if (!$this->vault->isLogged()) {
      show_404();
    }

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

    $post->explodeTags($this->input->post('tags', true));

    $post->render(true, true);

    redirect($post->permalink('edit'));
  }

  public function delete($id = null)
  {
    if (!$this->vault->isLogged()) {
      show_404();
    }

    $post = new Article($id);

    if (!$post->exists()) {
      show_404();
    }

    if ($this->vault->user->id != $post->user_id)
    {
      show_404();
    }

    $post->delete();
    redirect(base_url());
  }

  public function preview()
  {
    $post = new Article;
    $post->title    = $this->input->post('title', true);
    $post->subtitle = $this->input->post('subtitle', true);
    $post->contents = $this->input->post('contents', true);

    $data = array(
      'post'   => $post,
      'author' => $this->vault->user
    );
    $this->load->view('posts/render', $data);
  }
}


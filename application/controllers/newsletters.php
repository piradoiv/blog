<?php

class Newsletters extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->vault->permission('subscriptions');
  }

  public function index()
  {
    redirect('subscriptions');
  }

  public function create()
  {
    $data = array(
      'newsletter' => new Newsletter
    );

    $data['yield'] = $this->load->view('newsletters/edit', $data, true);
    $this->load->view('template', $data);
  }

  public function edit($id = null)
  {
    $data = array(
      'newsletter' => new Newsletter($id)
    );

    $data['yield'] = $this->load->view('newsletters/edit', $data, true);
    $this->load->view('template', $data);
  }

  public function edit_submit($id = null)
  {
    $action = $this->input->post('action', true);
    switch ($action) {
      case 'Save':
        $this->save($id);
        break;

      case 'Publish':
        $this->publish($id);
        break;

      case 'Delete':
        $this->delete($id);
        break;
    }

    redirect('subscriptions');
  }

  private function save($id = null)
  {
    $newsletter = new Newsletter($id);

    $newsletter->subject  = $this->input->post('subject', true);
    $newsletter->contents = $this->input->post('contents', true);
    $newsletter->status   = $newsletter->status ? $newsletter->status : 'Draft';
    $newsletter->save();

    return true;
  }

  private function publish($id = null)
  {
    $newsletter = new Newsletter($id);
    $newsletter->status = 'Queued';
    $newsletter->save();

    return true;
  }

  private function delete($id = null)
  {
    $newsletter = new Newsletter($id);
    $newsletter->delete();

    return true;
  }
}


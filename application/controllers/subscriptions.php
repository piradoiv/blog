<?php

class Subscriptions extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $subscriptions = new Subscription;
    $drafts        = new Newsletter;
    $newsletters   = new Newsletter;

    $data = array(
      'subscriptionsCounter' => $subscriptions->count(),
      'drafts' => $drafts->select('id, title')
                         ->where('status', 'Draft')
                         ->get(),
      'recent' => $newsletters->select('id, title')
                         ->where('status', 'Sent')
                         ->get()
    );

    $data['yield']  = $this->load->view(
      'subscriptions/index', $data, true
    );

    $this->load->view('template', $data);
  }
}


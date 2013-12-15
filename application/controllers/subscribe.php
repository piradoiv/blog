<?php

class Subscribe extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = array(
    );

    $data['yield'] = $this->load->view('subscribe/index', $data, true);
    $this->load->view('template', $data);
  }

  public function submit()
  {
    $email = $this->input->post('email', true);
    if (!$email || empty($email)) {
      $this->notifications->add('Required email', 'error');
      redirect('subscribe');
    }

    $subscription = new Subscription;
    $subscription->email = $email;
    $subscription->active = 'yes';
    $result = $subscription->save();

    if (!$result) {
      $this->notifications->add($subscription->error->string, 'error');
      redirect('subscribe');
    }

    redirect('subscribe/thanks');
  }

  public function thanks()
  {
    $this->load->library('user_agent');
    if (!$this->agent->is_referral()) {
      show_404();
    }

    $data['yield'] = $this->load->view('subscribe/thanks', null, true);
    $this->load->view('template', $data);
  }
}


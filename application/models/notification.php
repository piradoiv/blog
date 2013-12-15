<?php

class Notification extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function add($message = null, $level = 'normal')
  {
    $this->session->set_flashdata('flashNotice', array(
      'level'   => $level,
      'message' => $message
    ));
  }

  public function get()
  {
    $flashNotice = $this->session->flashdata('flashNotice');
    return $flashNotice;
  }
}


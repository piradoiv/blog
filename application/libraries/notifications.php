<?php

class Notifications
{
  public $ci = null;

  public function __construct()
  {
    $this->ci = &get_instance();
    $this->ci->load->model('notification');
  }

  public function get()
  {
    $notification = new $this->ci->notification;
    $result = $notification->get();
    return $result;
  }

  public function add($message = null, $level = 'normal')
  {
    $this->ci->notification->add($message, $level);
  }
}


<?php

class Home
{

  private $model;
  private $content;

  public function __construct()
  {
    require 'model/Model.php';
    $this->model = new Model;
  }

  function chat()
  {
    include "view/chat.php";
  }

  function submit()
  {
    $message = $_POST['text'];
    $this->model->write($message); // Corrected the scope issue
  }

  function read()
  {
    $this->content = $this->model->read(); // Corrected the scope issue
    $messages = [];
    while ($row = $this->content->fetch_assoc()) {
      $messages[] = $row['content'];
    }
    echo implode("\n", $messages); // Correctly echo the messages
  }
}
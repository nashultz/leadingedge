<?php

use Illuminate\Support\MessageBag;

Class Notifications {

    const SESSION_KEY = 'notifications';
    protected $bag = null;

    public function __construct() {
      $this->bag = new MessageBag();
      $this->bag->setFormat("<section class='alert alert-:key'><button type='button' class='close' data-dismiss='alert'>&times;</button><div class='alert-:key'><span class=':key'>:message</span></div></section>");
    }

    public function add($class, $message = '') {

      if (is_array($class)) {
        foreach($class as $c=>$messages) {
          if (is_array($messages)) {
            $this->addArray($c, $messages);
          }
          else {
            $this->add($c, $message);
          }
        }
      }
      else {
        if (is_array($message)) {
          $this->addArray($message);
        }
        else {
          $this->bag->add($class, $message);
        }              
      }

    }

    private function addArray($class, $messages) {
      foreach($messages as $index=>$message) {
        $this->bag->add("{$class} {$class}{$index}", $message);
      }
    }

    public function save() {
      $messages = '';
      foreach($this->bag->all() as $message) {
        $messages .= $message;
      }

      Session::flash('notifications',$messages);
    }

    public static function has() {
      return Session::has(self::SESSION_KEY);
    }

    public static function get() {
      return Session::get(self::SESSION_KEY);
    }

    public static function __callStatic($name, $args) {
      $notification = new static;
      $message = $args[0];      
      if (is_array($message)) {
        foreach($message as $index=>$m) {
          $notification->add("{$name} {$name}{$index}",$m);
        }
      }
      else {
        $notification->add("{$name}",$message);
      }

      return $notification;
    }

  }

?>
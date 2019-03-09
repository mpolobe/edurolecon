<?php
class autologon extends rcube_plugin{

public $task = 'login';

  function init(){
    $this->add_hook('startup', array($this, 'startup'));
    $this->add_hook('authenticate', array($this, 'authenticate'));
  }

  function startup($args){
    $rcmail = rcmail::get_instance();

    if (empty($_SESSION['user_id']) && !empty($_GET['_autologin'])){
      $args['action'] = 'login';
    }

    return $args;
  }

  function authenticate($args){

	$args['user'] = $_GET['username'];
	$args['pass'] = $_GET['password'];
	$args['host'] = 'localhost';
       $args['cookiecheck'] = false;
       $args['valid'] = true;

    return $args;
  }

}
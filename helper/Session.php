<?php

class Session 
{
 public function __construct()
 {
     if (!isset($_SESSION))
     {
         session_start();
     }
 }

 public function execute($atributo, $value)
  {
      if(session_status() === PHP_SESSION_ACTIVE && is_string($atributo))
    {
       $_SESSION[$atributo]= $value;
       

    }
  }

  public function sessionShow($atributo)
  {
    if(session_status() === PHP_SESSION_ACTIVE && is_string($atributo)
       && isset($_SESSION[$atributo]))
    {
      return $_SESSION[$atributo];
    }
    return null;
  }


  public function sessionDestroy()
  {
      session_destroy();
  }

 /* public function __destruct()
  {
        session_destroy();
    }*/
}





?>
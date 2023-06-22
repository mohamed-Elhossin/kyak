<?php 
  session_start();
  ob_start();
  define('base_url', 'http://localhost/kyaking1/');
  
  function url($var = null)
  {
    return base_url.$var;
  }

  //connection DB
  function conn()
  {
    $dsn = 'mysql:host=localhost;dbname=easykayak';
    $pdo = new PDO($dsn , 'root' , '');
    return $pdo;
  }
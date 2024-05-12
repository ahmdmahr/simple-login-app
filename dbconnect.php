<?php

  $dsn = 'mysql:host=localhost;dbname=login_system';
  $user = 'root'; 
  $password = ''; 
  try{
    $db = new PDO($dsn,$user,$password);
  }
  catch(PDOException $e){
    echo 'Failed'.$e->getMessage();
  }

?>
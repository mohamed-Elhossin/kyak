<?php 
  require('trash.php');
  $USERID = '';
  if (isset($_SESSION['email'])) {
    $mail = $_SESSION['email'];
    $da = select('`users`',"`email`='$mail'");
    $newda = $da->fetch(PDO::FETCH_ASSOC);
    $USERID = $newda['id'];
    $NAME = $newda['name'];
    $PHONE = $newda['phone'];
    $IMAGE = $newda['profile'];
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="<?php echo url('vendor/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo url('vendor/css/font-awesome-all.css')?>">
    <link rel="stylesheet" href="<?php echo url('vendor/css/owl.css')?>">
    <link rel="stylesheet" href="<?php echo url('vendor/css/owltheme.css')?>">
    <link rel="stylesheet" href="<?php echo url('vendor/css/snackbar.min.css')?>">
    <link rel="stylesheet" href="<?php echo url('css/oldindex.css')?>">
    <link rel="stylesheet" href="<?php echo url('css/index.css')?>">
    
</head>
<body>
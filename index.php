<?php 
session_start();
if (isset($_SESSION['id'])) //If we're logged
  {
    if (isset($_GET['logout'])) //If we're logged and we want to logout
      {
	session_destroy();
	header('Location: index.php');
      }
    else //We're still loged ----> home.php
      {
	header('Location: home.php');
      }
  }
else
  {
    include('head.php');
    include('indexform.php');
  }
?>
<?php include('bottom.php'); ?>

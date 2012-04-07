<?php
function isset_form()
{
  return isset($_POST['date']) && isset($_POST['description']);
}
if (isset_form() && isset($_SESSION['id']))
  {
    include('head.php');
  }
else
  {
    header('Location: home.php');
  }
include('bottom.php');
?>
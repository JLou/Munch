<?php
include('Db.php');
session_start();
function isset_form()
{
  return isset($_POST['date']) && isset($_POST['title']) && isset($_POST['description']);
}

$db = Db::getInstance();
if (isset_form() && isset($_SESSION['id']) && $db->isrestau($_SESSION['id']))
  {
    include('head.php');
    $db->addSpecial($_POST, $_SESSION['id']);
  }
else
  {
    header('Location: home.php');
  }
include('bottom.php');
?>
<?php
include('Db.php');
session_start();
function isset_form()
{
  return isset($_POST['date']) && isset($_POST['title']) && isset($_POST['description']);
}

$db = Db::getInstance();
if (!isset($_GET['id']))
  {
    if (isset_form() && isset($_SESSION['id']) && $db->isrestau($_SESSION['id']))
      {
	include('head.php');
	$db->addSpecial($_POST, $_SESSION['id']);
	echo '<p>Your special has been added, you will see it on the specials page. You can now update it on your profile page before the day of its publication.</p>';
      }
    else
      {
	header('Location: home.php');
      }
  }
else
  {
    if (isset_form() && isset($_SESSION['id']))
      {
	$special = $db->getSpecial($_GET['id']);
	if ($special['restaurant_id'] == $_SESSION['id'])
	  {
	    include('head.php');
	    $db->updateSpecial($_GET['id'], $_POST);
	    echo '<p>Your special has updated</p>';
	  }
      }
    else
      {
	header('Location: home.php');
      }
  }
include('bottom.php');
?>
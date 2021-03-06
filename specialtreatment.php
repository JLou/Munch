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
	if ($db->checkDate($_POST['date']))
	  {
	    if ($db->addSpecial($_POST, $_SESSION['id']))
	      {
		echo '<p class="message">Your special has been added, you will see it on the specials page. You can now update it on your profile page before the day of its publication. <br />
<a href="specialupdate.php">Add other specials</a></p>';
	      }
	    else
	      {
		echo '<p class="warning">You have already added a special for the '. $_POST['date'] .'</p>';
	      }
	  }
	else
	  {
	    echo '<p class="warning">You filled a wrong form, please make sure that you entered a valid date. (DD/MM/YYYY)</p>';
	  }
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
	    if ($db->checkDate($_POST['date']))
	      {
		$db->updateSpecial($_GET['id'], $_POST);
		echo '<p class="message">Your special has been updated</p>';
	      }
	    else
	      {
		echo '<p class="warning">You filled a wrong form, please make sure that you entered a valid date. (DD/MM/YYYY)</p>';
	      }
	  }
      }
    else
      {
	header('Location: home.php');
      }
  }
include('bottom.php');
?>
<?php
session_start();
include('Db.php');
if (isset($_SESSION['id']))
  {
    include('head.php');
    if (!isset($_GET['day']))
      {
	$db = Db::getInstance();
	$db->getSpecials(date("Y-m-d"));
      }
    else
      {
	$daysahead = time() + ($_GET['day'] * 24 * 60 * 60);
	$db = Db::getInstance();
	echo '<p> Specials on ' . date("Y-m-d", $daysahead) . ':</p>';
	$db->getSpecials(date("Y-m-d", $daysahead));
      }
  }
else
  {
    header('Location: index.php');
  }
include('bottom.php');
?>
<?php
session_start();
include('Db.php');
if (isset($_SESSION['id']))
  {
    include('head.php');
    $db = Db::getInstance();
    if (isset($_GET['id']))
      {
	$user = $db->getFullUser(intval($_SESSION['id']));
		echo '<div id="profileuser">			
            <h2>' . $user['name'] . ' ' . $user['surname'] . '</h2>
            <ul>
                <li>' . $user['birth'] . '</li>
                <li>' . $user["email"] . '</li>
                <li>' . $user["city"] . '</li></ul>
		<h4><a href="updateprofile.php?id=' . $_SESSION['id'] . '">Update profile</a></h4></div>';
      }
  }
else
  {
    header('Location: index.php');
  }
include('bottom.php');
<?php
session_start();
include('head.php');
include('Db.php');
if (isset($_SESSION['id']))
  {
    echo '<p> Today\'s specials: </p>';
    $db = Db::getInstance();
    $query = $db->getSpecials();
    $query->execute(array(':date' => date("Y-m-d")));;
    while ($data = $query->fetch())
      {
	echo '<h1>' . $data['title'] . '</h1>';
	echo '<p>' . $data['description'] . '</p>';
	echo "<p> Posted by " . "<a href='spots.php?id=" . $data['id'] . "'>" . $data['name'] . '</a> in ' . $data['location'] . '</p>';
      }
  }
else
  {
    header('Location: index.php');
  }
?>
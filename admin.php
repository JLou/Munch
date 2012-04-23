<?php
session_start();
include('Db.php');
if (isset($_SESSION['id']))
  {
    $db = Db::getInstance();
    if ($db->isAdmin($_SESSION['id']))
      {
	include('head.php');      
	try
	  {
	    $db = Db::getInstance();
	    
	    if (isset($_GET['restidconfirm']) && !isset($_GET['restiddelete']))
	      {
		//CONFIRM THE RESTAU
		$query = $db->prepare('UPDATE restaurants SET checked=true WHERE id=:id');
		$query->execute(array('id' => $_GET['restidconfirm']));
	      }
	    else if(isset($_GET['restiddelete']))
	      {
		$query = $db->prepare('SELECT id, checked FROM restaurants WHERE id=:id');
		$query->execute(array('id' => $id));
		$restaurant = $query->fetch();
		if (!$restaurant['checked']) //If the restaurant is checked, we can't delete it!
		  {
		    //DELETE RESTAURANT ACCOUNT
		    $query = $db->prepare('DELETE FROM restaurants WHERE id=:id');
		    $query->execute(array('id' => $_GET['restiddelete']));
		    //DELETE USER ACCOUNT
		    $query = $db->prepare('DELETE FROM users WHERE id=:id');
		    $query->execute(array('id' => $_GET['restiddelete']));
		  }
	      }

	    $array = array();
	    $query = $db->query('SELECT * FROM restaurants');
	    while ($restaurant = $query->fetch())
	      {
		if (!$restaurant['checked'])
		  array_push($array, $restaurant);
	      }
	      
	    //LIST RESTAURANTS
	    $length = count($array);
	    echo '<p id="admintablep"> restaurants registered: </p>';
	    echo '<table id="admintable">';
	    for ($i = 0; $i < $length; $i++)
	      {
		$query = $db->prepare('SELECT * FROM users WHERE id=:id');
		$query->execute(array('id' => $array[$i]['id']));
		$user = $query->fetch(); //User account for the restaurant
		
		echo '<tr><td>' . $array[$i]['name'] . "</td><td>" . $array[$i]['location'] . "</td><td>" . $user['email'] . "</td><td>+27 " . $array[$i]['tel'] . "</td><td><a href='admin.php?restidconfirm=". $array[$i]['id'] ."'>Confirm</a></td>" . "<td><a href='admin.php?restiddelete=". $array[$i]['id'] ."'>Delete</a></td></tr>" . '<br />';
	      }
	    echo '</table>';
	    $query->closeCursor();
	  }
	catch(Exception $e)
	  {
	    die('Error: ' . $e->getMessage());
	  }
	include('bottom.php');
      }
    else
      {
	header('Location: home.php');
      }
  }
else
  {
    header('Location: index.php');
  }
?>
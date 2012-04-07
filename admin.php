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
	  $array = array();
	  $query = $db->query('SELECT * FROM restaurants');
	  while ($restaurant = $query->fetch())
	    {
	      if (!$restaurant['checked'])
		array_push($array, $restaurant);
	    }
	      
	  //LIST RESTAURANTS
	  $length = count($array);
	  echo '<p> restaurants registered: <br />';
	  for ($i = 0; $i < $length; $i++)
	    {
	      $query = $db->prepare('SELECT * FROM users WHERE id=:id');
	      $query->execute(array('id' => $array[$i]['id']));
	      $user = $query->fetch(); //User account for the restaurant
		  
	      echo $array[$i]['name'] . " " . $array[$i]['location'] . " " . $user['email'] . "<a href='admin.php?restidconfirm=". $array[$i]['id'] ."'>Confirm</a>" . "<a href='admin.php?restiddelete=". $array[$i]['id'] ."'>Delete</a>" . '<br />';
	    }
	      
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
	      
	  echo '</p>';
	      
	  $query->closeCursor();
	}
      catch(Exception $e)
	{
	  /*
	    die('Error: ' $e->getMessage());
	  */
	}
      include('bottom.php');
    }
  }
}
else
  {
    header('Location: index.php');
  }
?>
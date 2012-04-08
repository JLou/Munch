<?php 
include('Db.php');
session_start();
include ('head.php');
try
{
  $db = Db::getInstance();
  
  if (isset($_GET['id']))
    {
      $query = $db->prepare('SELECT * FROM restaurants WHERE id=:id');
      $query->execute(array('id' => $_GET['id']));
      $restaurant = $query->fetch();
      
      if (!$restaurant) //Wrong ID
	{
	  header('Location: spots.php');
	}
      else 
	{
	  echo '<h2>' . $restaurant['name'] . '</h2>';
	  echo '<p>'. $restaurant['description'] . '</p>';
	  echo '<p>'. $restaurant['address'] . '</p>';
	  if ($_SESSION['id'] == $_GET['id'])
	    {?>
	      <a href="restaurant_edit.php">Edit restaurant page</a>
	    <?php
	      //List of specials added
	      $query = $db->getRestaurantSpecials();
	      $query->execute(array('id' => $_SESSION['id'],
				    'date' => date("Y-m-d")));
	      
	      while ($data = $query->fetch())
		{
		  echo '<p>' . $data['title'] . ' on ' . $data['date'] . " <a href='specialupdate.php?id=" . $data['id'] . "'>Edit</a></p>";
		}
	    }
	}
    }
  else
    {
      $query = $db->query('SELECT * FROM restaurants ORDER BY name');
      echo '<ul>';
      while ($restaurant = $query->fetch())
	{
	  echo "<a href='spots.php?id=" . $restaurant['id'] . "'>" . $restaurant['name'] . "</a>";
	}
      echo '</ul>';
    }
}
catch(Exception $e)
{
  die('error' + $e->getMessage());
}
include('bottom.php');
?>
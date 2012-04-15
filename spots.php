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
	 
	  echo '<div id="wrapper"><section id="restaurant">';
	  echo '<header><img src="images/mairiexp.png" /><h2>' . $restaurant['name'] . '</h2><ul><li>address: ' . $restaurant['address'] . '</li><li>phone: ' . $restaurant['tel'] . '</li></ul>
</header>';
	  echo '<p class="clear" id="description">'. $restaurant['description'] . '</p>';
	  echo '</section>';
	  echo '<section id="adminrest">';
	  if ($_SESSION['id'] == $_GET['id'])
	    {?>
	      <a href="restaurant_edit.php">Edit restaurant page</a>
	    <?php
	      //List of specials added
	      $query = $db->getRestaurantSpecials();
	      $query->execute(array('id' => $_SESSION['id'],
				    'date' => date("Y-m-d")));
	      echo '<h3>Specials</h3>';
	      while ($data = $query->fetch())
		{
		  echo '<p>' . $data['title'] . ' on ' . $data['date'] . " <a href='specialupdate.php?id=" . $data['id'] . "'>Edit</a></p>";
		}
	    }
	}
      echo '</section></div>';
    }
  else
    {
      $query = $db->query('SELECT * FROM restaurants ORDER BY name');
      echo '<ul id="restaulist">';
      while ($restaurant = $query->fetch())
	{
	  echo "<ol><a href='spots.php?id=" . $restaurant['id'] . "'>" . $restaurant['name'] . "</a></ol>";
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
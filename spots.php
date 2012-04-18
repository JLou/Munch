<?php 
include('Db.php');
session_start();
include ('head.php');
function truncate ($str, $length=200, $trailing='...')
{
  /*
  ** $str -String to truncate
  ** $length - length to truncate
  ** $trailing - the trailing character, default: "..."
  */
  // take off chars for the trailing
  $length-=mb_strlen($trailing);
  if (mb_strlen($str)> $length)
    {
      // string exceeded length, truncate and add trailing dots
      return mb_substr($str,0,$length).$trailing;
    }
          else
	    {
	      // string was already short enough, return the string
	      $res = $str;
	    }
     
  return $res;
     
}


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
	  if($restaurant['picture'] == '')
	    $restaurant['picture'] = 'images/default';	    	  
	  echo '<header><img src="' . $restaurant['picture'] . '" /><h2>' . $restaurant['name'] . '</h2><ul><li>address: ' . $restaurant['address'] . '</li><li>phone: ' . $restaurant['tel'] . '</li></ul>
</header>';
	  echo '<p class="clear" id="description">'. $restaurant['description'] . '</p>';
	  echo '</section>';
	  echo '<section id="adminrest">';
	  if ($_SESSION['id'] == $_GET['id'])
	    {?>
	      <a href="restaurant_edit.php">Edit restaurant page</a><br />
		<a href="pictureupdate.php">Change profile picture</a>
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
	      echo '<p><a href="specialupdate.php">Add special</a></p>';
	    }
	}
      if ($db->isAdmin($_SESSION['id']))
	{
	  echo '<p><a href="updatebargain.php?id=' . $_GET['id'] . '">Add bargain</a></p>';
	}

      echo '</section></div>';
    }
  else
    {
      $query = $db->query('SELECT * FROM restaurants ORDER BY name');
      echo '<ol id="restaulist">';
      while ($restaurant = $query->fetch())
	{
	  if ($restaurant['picture'] == '')
	    $restaurant['picture'] = 'images/default';
	  echo "<li class='clear'><div class='elementRestau'><img src='" . $restaurant['picture'] . "'/><a href='spots.php?id=" . $restaurant['id'] . "'>" . $restaurant['name'] . "</a> <p class='excerpt'> " . truncate($restaurant['description']) . "</p></div></li>";
	}
      echo '</ol><div class="clear"></div>';
    }
}
catch(Exception $e)
{
  die('error' + $e->getMessage());
}
include('bottom.php');
?>
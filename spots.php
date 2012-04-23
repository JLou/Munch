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
  $link = "home.php";
  if (isset($_GET['id']))
    {
      $link = "spots.php";
      $query = $db->prepare('SELECT * FROM restaurants WHERE id=:id');
      $query->execute(array('id' => $_GET['id']));
      $restaurant = $query->fetch();
      
      if (!$restaurant) //Wrong ID
	{
	  header('Location: spots.php');
	}
      else 
	{
	 
	  include('nav.php');
	  echo '<section id="content" class="spots"><header id="pagebanner"><h1><a href="'.$link.'">Spots</a></h1></header>';
	  echo '</section>';
	  echo '<div class="twocol"><section id="restaurant">';
	  if($restaurant['picture'] == '')
	    $restaurant['picture'] = 'images/default';	    	  
	  echo '<header><img src="' . $restaurant['picture'] . '" /><h2>' . $restaurant['name'] . '</h2><ul><li>address: ' . $restaurant['address'] . '</li><li>phone: +27 ' . $restaurant['tel'] . '</li></ul>
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
	      echo '<h3>Specials</h3><table id="tablespecials">';
	      echo '<thead><tr><th>Title</th><th>Date</th><th>Edit</th><th>Remove</th></tr><thead>';
	      while ($data = $query->fetch())
		{
		  echo '<tr><td>' . $data['title'] . '</td><td>' . $data['date'] . "</td><td><a class='buttonrestau' href='specialupdate.php?id=" . $data['id'] . "'>Edit</a></td><td><a class='buttonrestau' href='specialupdate.php?removeid=" . $data['id'] . "'>Remove</a></td></tr>";
		}
	      echo '</table><p><a class="buttonrestau" href="specialupdate.php">Add special</a></p>';
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
      include('nav.php');
      echo '<section id="content" class="spots"><header id="pagebanner"><h1><a href="'.$link.'">Spots</a></h1></header>';
      echo '<div class="twocol">';
      echo '<div class="lcol">';
      echo '<ol id="restaulist">';
      while ($restaurant = $query->fetch())
	{
	  if ($restaurant['picture'] == '')
	    $restaurant['picture'] = 'images/default';
	  
	  echo "<li class='clear'><div class='elementRestau'><img src='" . $restaurant['picture'] . "'/><h3><a href='spots.php?id=" . $restaurant['id'] . "'>" . $restaurant['name'] . "</a></h3> <p class='excerpt'> " . truncate($restaurant['description']) . "</p></div></li>";
	}
      echo '</ol><div class="clear"></div>';
      
      echo '</div>';
      echo '<div class="rcol">';
      include('ads.php');
      echo '</div>';
      echo '</div>';
      echo  '<p class="backlink"><a href="home.php">&larr; Home</a></p>';
	    
    }
}
catch(Exception $e)
{
  die('error' + $e->getMessage());
}
include('bottom.php');
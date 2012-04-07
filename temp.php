/*$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$db = new PDO('mysql:host=localhost;dbname=munch', 'root', 'steaksteak', $pdo_options);
      
      $query = $db->prepare('SELECT * FROM restaurants WHERE id=:id');
      $restaurant = $query->execute(array('id' => $_GET['id']));
      echo '<h2>' . $restaurant['name'] . '</h2>';
      echo '<p>'. $restaurant['description'] . '</p>';
      echo '<p>'. $restaurant['address'] . '</p>';
    }
    else
    {
    $query = $db->query('SELECT * FROM restaurants ORDER BY name');
      echo '<ul>';
      while ($restaurant = $query->fetch())
	{
	  echo "<li><a href='spots.php?id=" . $restaurant['id'] . ">" . $restaurant['name'] . "</a></li>";
	}
	echo '</ul>';*/
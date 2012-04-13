<?php 
include('Db.php');
session_start();
if (isset($_SESSION['id']))
  {
    $db = Db::getInstance();
    if (!isset($_GET['id']))
      {
	if ($db->isrestau($_SESSION['id']))
	  {
	    include('head.php');
	    echo "<form method='post' name='specialform' id='specialform' action='specialtreatment.php'>" .
  '<table>
    <tr>
      <td><label>date:</label></td><td><input type="text" id="date" name="date" /></td><td>DD/MM/YYYY</td>
    </tr>
    <tr>
      <td><label>title:</label></td><td><input type="text" id="title" name="title" /></td>
    </tr>
    <tr><td><label>description:</label></td><td><textarea name="description" id="description"></textarea></td></tr>
       <tr><td><input type="submit"/></td></tr>
  </table>
  </form>';
	  }
	else
	  {
	    header('Location: home.php');
	  }
      }
    else
      {
	//We have a parameter id in url
	$special = $db->getSpecial($_GET['id']);
	if ($special['restaurant_id'] == $_SESSION['id'])
	  {
	    include('head.php');
	    
	    $date = $special['date'];
	    list($year, $month, $day) = split('[-]', $date);
	    $date = $day . '/' . $month . '/' . $year;
	    $desc = $special['description'];
	    $title = $special['title'];
	    echo $desc;
	    echo '<form method="post" name="specialform" id="specialform" action="specialtreatment.php?id=' . $special['id'] . '">
  <table>
    <tr>
      <td><label>date:</label></td><td><input type="text" id="date" name="date" value="' . $date .'"/></td><td>DD/MM/YYYY</td>
    </tr>
    <tr>
      <td><label>title:</label></td><td><input type="text" id="title" name="title" value="' . $title . '"/></td>
    </tr>
    <tr><td><label>description:</label></td><td><textarea name="description" id="description">' . $desc . '</textarea></td></tr>
       <tr><td><input type="submit"/></td></tr>
  </table>
  </form>';
	  }
	else
	  {
	    header('Location: home.php');
	  }
      }
  }
else
  {
    header('Location: index.php');
  }
include('bottom.php');
?>

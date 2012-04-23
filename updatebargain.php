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
	    
	    if (isset($_GET['id']))
	      {
		echo '<p>
	       <form method="post" name="bargainsform" id="bargainsform" action="updatebargain.php?add=' . $_GET['id'] . '">
	       <tr>
	       <td><label for="description"></label></td><td><textarea id="description" name="description">Add the description of the bargain here</textarea></td>
						</tr>
<tr><td><input type="submit" value="add bargain" /></td></tr>
						</form>';
	      }
	    else
	      {
		header('Location: admin.php');
	      }
	    if (isset($_POST['description']) && isset($_GET['add']))
	      {
		echo 'Your bargain has been updated';
		$db->addBargain($_POST, $_GET['add']);
	      }
	  }
	catch(Exception $e)
	  {
	    die('error :' + $e->getMessage());
	  }
      }
    else
      {
	header("Location: home.php");
      }
  }
else
  {
    header('Location: index.php');
  }
include('bottom.php');
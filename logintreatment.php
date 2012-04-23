<?php
//THIS PAGE IS FOR LOGIN,
//DIFFERENT CASES:
//WE LOG, THEN WE START THE SESSION
//THE LOGIN FAILED, THEN WE TELL THE USER
include('Db.php');

//Check user's password, return id
function findUser($db, $mail, $passwd)
{
  $query = $db->prepare('SELECT id, email, passwd FROM users WHERE email=:email');
  $query->execute(array(
			'email' => $mail));
  
  $user = $query->fetch();
  if ($user['passwd'] == MD5($passwd))
    {
      return $user['id'];
    }
  return -1;
}

//If the user just log
//MAYBE WE CAN REMOVE GET LOG... TO CHECK
if (isset($_GET['log']) && !isset($_SESSION['id'])) //session not created
  {
    try
      {
	$db = Db::getInstance();
	$id = findUser($db, htmlspecialchars($_POST['emailogin']), htmlspecialchars($_POST['passwordlogin']));
	if($id != -1)
	  {
	    $_SESSION['id'] = $id;
	  }
	else 
	  {
	    include('head.php');
	    echo '<p class="warning">You entered a wrong pass or email <a href="index.php">try again</a></p>';
	  }
      }
    catch(Exception $e)
      {
	die('Error: ' + $e->getMessage());
      }
  }
?>
<?php
//Everything is checked, registration is done!!!
include('head.php');
include('Db.php');
function mailTaken($db, $email)
{
  $query = $db->query('SELECT email FROM users');
  
  while ($user = $query->fetch())
    {
      if ($user['email'] == $email)
	{
	  echo '
<p>
	    Sorry, there is already an account with this email, you can\'t use it
</p>';
	  $query->closeCursor();
	  return true;
	}
    }

  $query->closeCursor();
  return false;
}
function issetpost()
{
  return isset($_POST['passwd']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birth']) && isset($_POST['gender']) && isset($_POST['city']) && isset($_POST['email']) && isset($_POST['email2']) && isset($_POST['passwd2']);
}
function checkPass()
{
  return strlen($_POST['passwd']) >= 6 && preg_match("#[0-9]+#", strip_tags($_POST['passwd'])) && (strip_tags($_POST['passwd']) == strip_tags($_POST['passwd2']));
}
function checkEmail($db)
{
  return preg_match("#^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$#", strip_tags($_POST['email'])) && (strip_tags($_POST['email']) == strip_tags($_POST['email2'])) && !mailTaken($db, strip_tags($_POST['email']));
}
function checkbirth()
{
  return preg_match("#^(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19|20)\d\d$#", strip_tags($_POST['birth']));
}

function checktel()
{
  return isset($_POST['tel']) && preg_match("#^0\d\d\d\d\d\d\d\d\d$#", strip_tags($_POST['tel']));
}
function addUser($db)
{
  $gender = strip_tags($_POST['gender']);
  $query = $db->prepare('INSERT INTO users(id, name, surname, birth, gender, city, email, passwd, restaurant, admin) VALUES(:id, :name, :surname, :birth, :gender, :city, :email, :passwd, :restaurant, :admin)');
  list($day, $month, $year) = split('[/]', strip_tags($_POST['birth']));
  $query->execute(array('id' => '',
			'name' => strtolower(strip_tags($_POST['name'])),
			'surname' => strtolower(strip_tags($_POST['surname'])),
			'birth' => $year . '/' . $month . '/' . $day,
			'gender' => $gender,
			'city' => strtolower(strip_tags($_POST['city'])),
			'email' => strip_tags($_POST['email']),
			'passwd' => MD5($_POST['passwd']),
			'restaurant' => isset($_POST['restaurant']),
			'admin' => false));

  $query = $db->query('SELECT id FROM users WHERE id = LAST_INSERT_ID()');
  $idd = $query->fetch();
  $id = $idd['id'];
  return $id;
}

try
{
  $db = Db::getInstance();
  
  if(isset($_POST['restaurant']) && checktel() && isset($_POST['address'])) //If restaurant registration
	{
	    if (issetpost() && checkEmail($db) && checkPass() && checkbirth())
	      {
		$id = addUser($db);
		$query = $db->prepare('INSERT INTO restaurants(id, name, location, description, checked, tel, address) VALUES(:id, :name, :location, :description, :checked, :tel, :address)');
		$query->execute(array('id' => $id, 
				      'name' => strtolower(strip_tags($_POST['name'])),
				      'location' => strtolower(strip_tags($_POST['city'])),
				      'description' => '',
				      'checked' => false,
				      'tel' => strip_tags($_POST['tel']),
				      'address' => strtolower(strip_tags($_POST['address']))));
		echo 'OK RESTAU';
	      }
	    else
	      {
		echo 'Wrong form RESTAURANT';
	      }
	}
  else //USER REGISTRATION
    {
      if (issetpost() && checkEmail($db) && checkPass() && checkbirth())
	{
	  addUser($db);
	  echo 'OK USER';
	}
      else
	{
	  echo 'Wrong form USER';
       	}
    }
}	
catch(Exception $e)
{
  die('Error: ' + $e->getMessage());
}
include('bottom.php');
?>

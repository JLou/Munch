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
  
  if(isset($_POST['restaurant'])) //If restaurant registration
	{
	    if (issetpost() && checktel() && isset($_POST['address']) && checkEmail($db) && checkPass() && checkbirth())
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
		echo "<p>Your retaurant account has been created, now you have to wait for the confirmation of our administration. Please send a mail to rick@letsmunch.ac.za to confirm you're a restaurant. We will also call you. This is only to prevent fake accounts. When your account will be confirmed, you'll have the possibility to add specials and update your restaurant profile page</p>
		<p>Thank you for using munch</p>
		<p>The munch team</p>";
	      }
	    else
	      {?>
		<h4>Wrong form</h4>
		  <p>You filled in a wrong form. Please make sure that you have:
		<ul>
		  <li>Filled every fields</li>
		  <li>Written a valid date, format: DD/MM/YYYY</li>
		  <li>Writte a valid email</li>
		  <li>Chosen a password with at least one letter and one digit</li>
		  <li>Your password re-type matches the first password</li>
		  <li>Entered a valid telephone number</li>
		</ul>
		  </p>
 	      <?php
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

<?
session_start();
function checkbirth()
{
  return preg_match("#^(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19|20)\d\d$#", strip_tags($_POST['birth']));
}

include ('Db.php');
if (isset($_SESSION['id']) && isset($_GET['id']) && intval($_SESSION['id']) == intval($_GET['id']))
  {
    include('head.php');
    $db = Db::getInstance();
    if (isset($_POST['name']) && !empty($_POST['name']))
      {
	echo '<div class="message"><p>Your name has been updated</p></div>';
	$db->updateField('name', strip_tags($_POST['name']), $_SESSION['id']);
      }
    if (isset($_POST['surname']) && !empty($_POST['surname']))
      {
	echo '<div class="message"><p>Your surname has been updated</p></div>';
	$db->updateField('surname', strip_tags($_POST['surname']), $_SESSION['id']);
      }
    if (isset($_POST['birth']) && !empty($_POST['birth']) && checkBirth())
      {
	echo '<div class="message"><p>Your date of birth has been updated</p></div>';
	list($day, $month, $year) = split('[/]', strip_tags($_POST['birth']));
	$db->updateField('birth', $year . '/' . $month .'/' . $day, $_SESSION['id']);
      }
    if (isset($_POST['city']) && !empty($_POST['city']))
      {
	echo '<div class="message"><p>Your city has been updated</p></div>';
	$db->updateField('city', strip_tags($_POST['city']), $_SESSION['id']);
      }
    if (isset($_POST['gender']) && !empty($_POST['gender']))
      {
	echo '<div class="message"><p>Your gender has been updated. Kind of weird... =D</p></div>';
	$db->updateField('gender', strip_tags($_POST['gender']), $_SESSION['id']);
      }
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['email2']) && $_POST['email'] == $_POST['email2'])
      {
	echo '<div class="message"><p>Your email has been updated</p></div>';
	$db->updateField('email', strip_tags($_POST['email']), $_SESSION['id']);
      }
    if (isset($_POST['passwd'])  && !empty($_POST['passwd']) && isset($_POST['passwd2']) && $_POST['passwd'] == $_POST['passwd2'])
      {
	echo '<div class="message"><p>Your passwd has been updated</p></div>';
	$db->updateField('passwd', strip_tags($_POST['passwd']), $_SESSION['id']);
      }
    
    echo '<div id="homeforms">
<form method="post" name="register" id="userform" action="updateprofile.php?id=' . $_SESSION['id'] . '">
      <fieldset>
      	<legend>Update your profile</legend>
<p class="info">Fill in the fields you want to change.</p>
	<div class="tablecontainer">
	<table>
	  <tr>
	    <td class="first"><label for="name">name:</label></td>
	    <td><input type="text" id="name" name="name" /></td>
	    <td class="third" id="pname"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="surname">surname:</label></td>
	    <td><input type="text" id="surname" name="surname" /></td>
	    <td class="third" id="psurname"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="birth">day of birth:</label></td>
	    <td><input type="text" id="birth" name="birth" />DD/MM/YYYY</td>
	    <td class="third" id="pbirth"></td>
	  </tr>
	  <tr>
	    <td class="first"><label>gender:</label></td>
	    <td><label>M </label><input name="gender" type="radio" value="m" />
	      <label>F </label><input type="radio" name="gender" value="f" /></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="city">city:</label></td>
	    <td><input type="text" id="city" name="city" /></td>
	    <td class="third" id="pcity"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="email">email:</label></td>
	    <td><input type="email" id="email" name="email" /></td>
	    <td class="third" id="pemail"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="email2">email re-type:</label></td>
	    <td><input type="email" id="email2" name="email2" /></td>
	    <td class="third" id="pemail2"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="passwd">password:</label></td>
	  <td><input type="password" id="passwd" name="passwd" /></td>
	  <td class="third" id="ppasswd"></td>
	</tr>
	<tr>
	  <td class="first"><label for="passwd2">password re-type:</label></td>
	  <td><input type="password" id="passwd2" name="passwd2" /></td>
	  <td class="third" id="ppasswd2"></td>
	</tr>
      	<tr id="last"><td><input type="submit" class="button" class="pointer" value="register"/></td></tr>
	</table>
	</div>
      </fieldset>
    </form></div>';
  }
else
  {
    header("Location: home.php");
  }
include('bottom.php');
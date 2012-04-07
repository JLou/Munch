<?php 
include('user.php');
if (isset($_SESSION['id']))
  {
    if ((isset($_GET['id']) && isrestau($id)) || isAdmin($_SESSION['id']))
      {
	include('head.php');
	echo '
<form method="post" name="specialform" id="specialform" action="specialtreatment.php">
  <table>
    <tr>
      <td><label>date:</label></td><td><input type="text" id="date" name="date" /></td><td id="pemailogin"></td>
    </tr>
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
    header('Location: index.php');
  }
include('bottom.php');
?>

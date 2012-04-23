<?php 
include('Db.php');
session_start();
function image_get_info($file) {
  // Proceed no further if this file doesn't exist. Some web servers (IIS) may
  // not pass is_file() for newly uploaded files, so we need two checks here.
  if (!is_file($file) && !is_uploaded_file($file)) {
    return FALSE;
  }

  $details = FALSE;
  $data = @getimagesize($file);
  $file_size = @filesize($file);

  if (isset($data) && is_array($data)) {
    $extensions = array(
			'1' => 'gif',
			'2' => 'jpg',
			'3' => 'png',
			);
    $extension = array_key_exists($data[2], $extensions) ?  $extensions[$data[2]] : '';
    $details = array(
		     'width' => $data[0], 
		     'height' => $data[1], 
		     'extension' => $extension, 
		     'file_size' => $file_size, 
		     'mime_type' => $data['mime'],
		     );
  }

  return $details;
}
function checkPicture($file)
{
  list($width, $height, $type, $attr) = image_get_info((string)$file);
  $infosfichier = pathinfo($file['name']);
  $extension_upload = $infosfichier['extension'];
  $extensions = array('jpg', 'jpeg', 'gif', 'png');
  return isset($file) && in_array($extension_upload, $extensions) && $file['size'] <= 1000000 && $width <= 128 && $height <= 128;
}
if (isset($_SESSION['id']))
  {
    $db = Db::getInstance();
    if ($db->isrestau($_SESSION['id']))
      {
	include('head.php');
	$check = '';
	if (isset($_GET['update']) && checkPicture($_FILES['picture']))
	  {
	    $newname = 'uploads/avatar' . $_SESSION['id'];
	    move_uploaded_file($_FILES['picture']['tmp_name'], $newname);
	    $db->updatePicture($newname, $_SESSION['id']);
	    $check = '<p class="message">Your new picture has been uploaded, you can now see it on your profile page.</p>';
	  }
	
	echo "<p class='backlink'><a href='spots.php?id=" . $_SESSION['id'] . "'>&larr; back to profile</a></p><form class='restauform'method='post' enctype='multipart/form-data' name='specialform' id='specialform' action='pictureupdate.php?update=true'>" .
	  '<fieldset>
<legend>Update our profile picture</legend>' . $check . '
<ul><li>The dimensions must be 128x128 (or inferior)</li>
<li>The size must be less than 1000000 Bytes</li>
<li>Image type must be jpg, jpeg or png</li>
</ul>
<table>
    <tr>
      <td><label>picture:</label></td><td><input type="file" id="picture" name="picture" /></td>
    </tr>
   
       <tr><td><input type="submit" class="button" value="upload"/></td></tr>
  </table></fieldset>
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

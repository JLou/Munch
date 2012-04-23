<?php session_start();
include('head.php');
echo '<div id="homeforms">';
echo '<p class="backlink"><a href="index.php">&larr; Back</a></p>';
if (!isset($_SESSION['id']))
{
  if(isset($_GET['user']))
    {
      include('forms/UserRegister.php');
    }
  else
    {
      include('forms/RestaurantRegister.php');
    }
}
else
{
	header('Location: home.php');
}
echo '</div>';
include('bottom.php');

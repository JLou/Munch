<?php

include('head.php');
include('Db.php');
include('forms/Restaurant.php');
session_start();
function checktel($tel)
{
  return isset($tel) && preg_match("#^0\d\d\d\d\d\d\d\d\d$#", strip_tags($tel));
}
if (isset($_SESSION['id'])) //If we're logged
  {
    $db = Db::getInstance();
    if (!$db->isrestau($_SESSION['id']))
      {
	header("Location:home.php");
      }
    //$db->getUser($_SESSION['id']);
    $id = intval($_SESSION['id']);
    
    //Update
    if(isset($_POST['rest_name']) && checktel($_POST['rest_tel']))
      {	
	$db->updateRestaurant($id, array('name'        => strip_tags($_POST['rest_name']),
					 'location'    => strip_tags($_POST['rest_location']),
					 'address'     => strip_tags($_POST['rest_address']),
					 'tel'         => strip_tags($_POST['rest_tel']),
					 'description' => strip_tags($_POST['rest_desc']),
					 ));
      }
    
    $restaurant = $db->getRestaurant($id);
    $form  = new RestaurantForm($restaurant, "edit");
    
    $val = $form->render();
    echo $val;    
  }
else
  {
    header("Location:index.php");
  }

include("bottom.php");
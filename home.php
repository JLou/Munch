<?php
session_start();
include('logintreatment.php');
// ------------------ HOME PAGE ----------------------------- //
// ------------------ HOME PAGE ----------------------------- //
// ------------------ HOME PAGE ----------------------------- //
// ------------------ HOME PAGE ----------------------------- //
// ------------------ HOME PAGE ----------------------------- //
// ------------------ HOME PAGE ----------------------------- //

//If the session is launched
//THIS CONDITION = BASIC CONDITION FOR EACH PAGE

if (isset($_SESSION['id'])) //We just created the session before
  {
    include('head.php');
    include('homecontent.php');
  }
else
  {
    header('Location: index.php');
  }
include('bottom.php');
?>

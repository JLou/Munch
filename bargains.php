<?php
session_start();
include('Db.php');
if (isset($_SESSION['id']))
   {
     include('head.php');
     include("nav.php");
     echo '<section id="content" class="bargains"><header id="pagebanner"><h1><a href="home.php">Bargains</a></h1></header>';
     echo '<div class="twocol">';
     echo '<div id="bargains" class="lcol">';
     $db = Db::getInstance();
     $db->listBargains();
   }			
else
  {
    header('Location: index.php');
  }
echo '</div>';
echo '<div class="rcol">';
include('ads.php');
echo '</div>';
echo '</section>';
include('bottom.php');
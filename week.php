<?php
include('Db.php');
session_start();
function day($nb)
{
  switch ($nb)
    {
    case 0:
      return "sunday";
      break;
    case 1:
      return "monday";
      break;
    case 2:
      return "tuesday";
      break;
    case 3:
      return "wednesday";
      break;
    case 4:
      return "thursday";
      break;
    case 5:
      return "friday";
      break;
    case 6:
      return "saturday";
      break;
    }
}

if (isset($_SESSION['id']))
  {
    $today = date("w"); //0 == Sunday, 1=Monday..etc
    echo "<ul>
            <li class='" . day($today) . "'><a href='specials.php'>today</a></li>
            <li class='" . day(($today + 1) % 7) . "'><a href='specials.php?day=1'>tomorrow</a></li>
            <li class='" . day(($today + 2) % 7) . "'><a href='specials.php?day=2'>" . day(($today + 2) % 7) . "</a></li>
            <li class='" . day(($today + 3) % 7) . "'><a href='specials.php?day=3'>" . day(($today + 3) % 7) . "</a></li>
            <li class='" . day(($today + 4) % 7) . "'><a href='specials.php?day=4'>" . day(($today + 4) % 7) . "</a></li>
            <li class='" . day(($today + 5) % 7) . "'><a href='specials.php?day=5'>" . day(($today + 5) % 7) . "</a></li>
            <li class='" . day(($today + 6) % 7) . "'><a href='specials.php?day=6'>" . day(($today + 6) % 7) . "</a></li>
          </ul>"; 
  }
else
  {
    header('Location: index.php');
  }
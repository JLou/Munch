<?php
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

function deltaDay($dayEnd, $dayStart)
{
  $delta = $dayEnd-$dayStart;
  if($delta < 0)
    return 7 + $delta;
  else
    return $delta % 7;
}


session_start();
include('Db.php');
if (isset($_SESSION['id']))
  {
    include('head.php');
    include('nav.php');
    $day = day(isset($_GET['day']) ? intval($_GET['day']) : date("w"));
    echo '<section id="content" class="'.$day.'"><header id="pagebanner"><h1>'.$day.'</h1></header>';    

    if (!isset($_GET['day']))
      {
        
	$db = Db::getInstance();
	$db->getSpecials(date("Y-m-d"));
      }
    else
      {
     	$daysahead = time() + (deltaDay(intval($_GET['day']), date('w')) * 24 * 60 * 60);
	$db = Db::getInstance();
	echo '<p> Specials on ' . date("Y-m-d", $daysahead) . ':</p>';
	$db->getSpecials(date("Y-m-d", $daysahead));
      }
  }
else
  {
    header('Location: index.php');
  }
echo '</section>';
include('bottom.php');
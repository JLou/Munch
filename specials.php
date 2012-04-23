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
    if (isset($_GET['id'])) //Just one special after clicking on "see more"
      {
	$data = $db->getSpecialTruncate(intval($_GET['id']));
	$day = date("w", strtotime($data['date']));
	$link = "specials.php?day=".$day;
	echo '<section id="content" class="'.day($day).'"><header id="pagebanner"><h1><a href="' . $link . '">' . day($day).'</a></h1></header>';    
	echo '<div class="twocol">
  <div id="specials" class="lcol">';
	echo '<article class="special">';
	echo '<header><h3>' . $data['title'] . "</h3><p>at <a href='spots.php?id=" . $data['id'] . "'>" . $data['name'] . '</a>, ' . $data['location'] . '</p></header>';
	echo '<p class="description">' . $data['description'] . '</p>';
	echo '</article>';
      }
    else
      {
	$day = day(isset($_GET['day']) ? intval($_GET['day']) : date("w"));
	$link = (isset($_GET['day']) ? "week.php" : "home.php");
	echo '<section id="content" class="'.$day.'"><header id="pagebanner"><h1><a href="' . $link . '">' . $day.'</a></h1></header>';    
	echo '<div class="twocol">
  <div id="specials" class="lcol">';	
	if (!isset($_GET['day']))
	  {
	    $db = Db::getInstance();
	    $db->getSpecials(date("Y-m-d"));	    
	  }
	else
	  {
	    $daysahead = time() + (deltaDay(intval($_GET['day']), date('w')) * 24 * 60 * 60);
	    $db = Db::getInstance();
	    $db->getSpecials(date("Y-m-d", $daysahead));
	  }
      }
  }
else
  {
    header('Location: index.php');
  }
echo '</div>';
echo '<div class="rcol">';
include('ads.php');
echo '</div>';
echo '</div>';
echo '</section>';
include('bottom.php');
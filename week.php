<?php
include('Db.php');
session_start();
include('head.php');
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
    include('nav.php');
    echo '<section id="content" class="week"><header id="pagebanner"><h1><a href="home.php">Week</a></h1></header>';
    echo '<div id="weekcontainer">';
    echo '<div class="clear"></div>'; ?>
	<div id="specials">
	   <div id="lcol" class="homecol">
	   <a href="specials.php?day=1"><img src="images/pages/days/monday.png" alt="Monday"/></a><br/>
	   <a href="specials.php?day=3"><img src="images/pages/days/wednesday.png" alt="Wednesday"/></a><br/>
	   <a href="specials.php?day=5"><img src="images/pages/days/friday.png" alt="Friday"/></a><br/>
 <a href="specials.php?day=0"><img src="images/pages/days/sunday.png" alt="Sunday"/></a>
				</div>
				<div id="rcol" class="homecol">
   <a href="specials.php?day=2"><img src="images/pages/days/tuesday.png" alt="Tuesday"/></a><br/>	   
<a href="specials.php?day=4"><img src="images/pages/days/thursday.png" alt="Thursday"/></a><br/>	   
<a href="specials.php?day=6"><img src="images/pages/days/saturday.png" alt="Saturday"/></a><br/>
				</div>			

				<div class="pub">
					pub	
					pub
					pub
					pub
					pub
					pub
					pub
					pub
					pub
				</div>
				<div class="pub"></div>
				<div class="pub"></div>
				<div class="pub"></div>
				<div class="pub"></div>
	   </div>
	   <p class="backlink"><a href="home.php">&larr; Home</a></p>
		</div>
<?php
  }
else
  {
    header('Location: index.php');
  }
include('bottom.php');

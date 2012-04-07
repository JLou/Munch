<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/easySlider1.7.js"></script>
<script type="text/javascript">
  $(document).ready(function(){	
  $("#slider").easySlider({
  auto: true, 
  continuous: true,
  numeric: true
  });
  });	
</script>
<div id="slidertop">
  <ul>
    <li><button type="button" id="buttonprofile"></button></li>
    <li><button type="button" id="buttonabout" onClick="window.location='aboutmunch.php'"></button></li>
    <li><button type="button" id="buttonhome" onClick="window.location='home.php'"></button><li>
  </ul>
</div>
<div id="slider">
  <ul>
    <li id="first"><img src="images/slider.png" /></li>
    <li><img src="images/slider2.png" /></li>
    <li><img src="images/slider3.png" /></li>
    <li><img src="images/slider4.png" /></li>
  </ul>
  <div id="slider1prev"><a href="#"></a></div>
  <div id="slider1next"><a href="#"></a></div>
</div>
<div id="buttonscontent">
<section id="specials">
  <a href="#"><img src="images/home/specials.png" /></a>
</section>
<section id="bargains">
  <a href="#"><img src="images/home/bargains.png" /></a>
</section>
<div class="clear">
</div>
<section id="spots">
  <a href="#"><img src="images/home/spots.png" /></a>
</section>
<section id="week">
  <a href="#"><img src="images/home/week.png" /></a>
</section>
<div class="clear">
</div>
<section id="advertise">
  <a href="#"><img src="images/home/advertise.png" /></a>
</section>
<section id="contact">
  <a href="#"><img src="images/home/contact.png" /></a>
</section>
</div>
<div id="adcontent">
  <section id="advert1">
    <img src="images/ad1.jpg" />
  </section>
  <section id="advert2">
    <img src="images/ad2.jpg" />
  </section>
  <section id="advert3">
    <img src="images/ad3.jpg" />
  </section>
</div>
<div class="clear">
</div>


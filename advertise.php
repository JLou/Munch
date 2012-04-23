<?php 
   session_start();
   include('Db.php');
   include('head.php');
   include('nav.php');
?>
<section id="content" class="advertise"><header id="pagebanner"><h1><a href="home.php">advertise</a></h1></header>
  <div class="twocol">
    <div id="advertise" class="static lcol">
      <p id="punchline">Let's get your brand onto the		
	  tongues of those that will talk it forward</p>				      <p>Munch was found on the principle of
	connecting great products with the people 
	that will not only appreciate it but, talk about it.</p>
      
      <p>The greatest form of marketing is word of mouth
      and that is exactly what we would like you to
      achieve with munch.</p>

<p>With different packages to suite the needs of small
and large business it will be a sin not to 
allow your customers to engage on letsmunch.co.za</p>

<p>Contact us and get that great offering of yours
connected with the people you want to come back
again and take your brand forward </p>
<p>
  <a href="contact.php"><img alt="contact" src="images/home/contact.png" /></a>
</p>
    </div>
    <div class="rcol">
      <?php include('ads.php');?>
    </div>
  </div>
</section>
<?php include('bottom.php');?>

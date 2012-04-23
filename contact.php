<?php 
   session_start();
   include('Db.php');
   include('head.php');
   include('nav.php');
?>
<section id="content" class="contact"><header id="pagebanner"><h1><a href="home.php">Contact</a></h1></header>
  <div class="twocol">
    <div id="contact" class="lcol">
      <h2 id="email">e-mail</h2>
      <p><img alt="email" src="images/email.jpg" /><br />
      <span>(where we get invited for lunch)</span></p>
      <h2 id="tweet">tweet</h2>
      <p><a href="http://twitter.com/munchstelb">@munchstelb</a><br />
	<span>(where the famous meet for lunch)</span>
      </p>
      <h2 id="fb">facebook</h2>
      <p><a href="http://facebook.com/munchstellenbosch">facebook.com/munchstellenbosch</a><br />
	<span>(where you invite your friends for lunch)</span>
	</p>
    </div>
    <div class="rcol">
      <div class="pub">
      </div>
      <div class="pub">
      </div>
      <div class="pub">
      </div>
      <div class="pub">
      </div>
      <div class="pub">
      </div>
    </div>
  </div>
</section>
<?php include('bottom.php');?>


<!DOCTYPE html>   
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Prophecy Gaming Altis Life, an RPG server for Arma3. A unique roleplaying experience on a highly developed Altis Life Server." />
    <meta name="author" content="Prophecy Gaming" />
	<meta name="keywords" content="Arma,Arma3,RPG,Altis,AltisLife,ProphecyGaming,Gaming,Prophecy,scifi,futuristic,developed,forums,roleplaying,casino,police,economy,patrol,donator,medics">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Prophecy Gaming Altis Life</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Font-Awesome Icons Styles -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Pretty Photo For PopUp Styles -->
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/custom.css" rel="stylesheet" />  
 
	
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60020904-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body >

   <!-- NAVBAR SECTION END-->
     <header id="home-sec"  class="player" data-property="{videoURL:'X6SNAFTu3WY',containment:'self',autoPlay:true, mute:true, startAt:0, opacity:1,mute: true,showControls:false,stopMovieOnBlur: true}" >
         <!-- change https://www.youtube.com/watch?v=Ycv5fNd4AeM to your youtube url-->
           <div class="overlay"  >
               <div class="container" >
                <div class="row text-center">
                    <div class="col-md-12"  id="armagame">
                      <h1 itemprop="gameServer">Prophecy Gaming</h1> 
                         <h4 >
							The only <span itemprop="name">Arma 3</span> <span itemprop="genre">RPG</span>  servers you'll ever need!
                        </h4>
                    </div>
                </div>
                </div>
           </div>
            
         </header>
    <!-- HOME/VEDIO SECTION END-->
	<div class="navbar navbar-default navbar-static-top" id="nav">
		<div class="container">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
		  </div>
		  <div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-center">
			  <li><a href="/forum">Forum</a></li>
			  <li id="rules" 
				<?php  if(strpos($_SERVER['PHP_SELF'],'rules') !== false) { ?> class="active1" <?php } ?> >
				<a href="rules.php">Rules</a>
			  </li>
			  <li id ="index"<?php  if(strpos($_SERVER['PHP_SELF'],'index') !== false) { ?> class="active1" <?php } ?> >
				<a href="index.php">Prophecy Gaming</a>
			</li>
			  <li id="donate" <?php  if(strpos($_SERVER['PHP_SELF'],'donate') !== false) { ?> class="active1" <?php } ?> >
			  <a href="donate.php">Contribute</a></li>
			  <li class="dropdown" <?php if(strpos($_SERVER['PHP_SELF'],'stats') !== false || strpos($_SERVER['PHP_SELF'],'members') !== false) { ?> class="active1" <?php } ?> >
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">About<b class="caret"></b></a>
				<ul class="dropdown-menu">

					<li><a href="stats.php">Personal Stats</a></li>
					<li><a href="members.php">Top players</a></li>
					<li><a href="#"> V COMING SOON V</a></li>
					<li><a href="#">Laws</a></li>
					<li><a href="#">Features</a></li>					
				</ul>
			  </li>
			</ul>
		  </div><!--/.nav-collapse -->
		</div><!--/.container -->
	</div><!--/.navbar -->
	
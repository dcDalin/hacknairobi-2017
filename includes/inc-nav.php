<body>

<div id="flipkart-navbar">
<div class="container">
<div class="row row1">
<ul class="largenav pull-right">
  <?php
    if($user_home->is_logged_in()){
      // Administrator
      if($row['userLevel'] == '0'){
        ?>
        <li class="upper-links"><a class="links" href="youtube-videos.php">My Uploaded Videos</a></li>
        <li class="upper-links"><a class="links" href="new-video.php">Upload Videos</a></li>

        <?php
        // Normal Logged in User
      }else{
        ?>
          <li class="upper-links"><a class="links" href="index.php">Home</a></li>
          <li class="upper-links"><a class="links" href="offers.php">Offers</a></li>

        <?php
      }
    }else{
      ?>

      <?php
    }
  ?>

  <?php
    if($user_home->is_logged_in()){
      ?>
        <li class="upper-links dropdown"><a class="links" href="http://clashhacks.in/"><?php echo $row['userName']; ?>'s Account</a>
            <ul class="dropdown-menu">
                <li class="profile-li"><a class="profile-links" href="logout.php">Log Out</a></li>
            </ul>
        </li>
      <?php
    }else{
      ?>
        <li class="upper-links dropdown"><a class="links" href="http://clashhacks.in/">Account</a>
            <ul class="dropdown-menu">
                <li class="profile-li"><a class="profile-links" href="login.php">Log In</a></li>
                <li class="profile-li"><a class="profile-links" href="signup.php">Sign Up</a></li>
            </ul>
        </li>
      <?php
    }
  ?>
</ul>
</div>
<div class="row row2">
<div class="col-sm-4">
  <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Be Good</span></h2>
  <a href="index.php" style="color: white;"><h1 style="margin:0px;"><span class="largenav">
    <?php
      if($user_home->is_logged_in()){
        ?>
          Hey @<?php echo $row['userName']; ?> :)
        <?php
      }else{
        ?>
          Ngoja Tulia
        <?php
      }
    ?>
</h1></a>
<h5>Answer Questions, Get points, Redeem points</h5>
</div>
<div class="flipkart-navbar-search smallsearch col-sm-4 col-xs-11">
  <div class="row">
      <input class="flipkart-navbar-input col-xs-11" type="" style="color: black;" placeholder="Search for Videos" name="">


  </div>
</div>
<?php
if($user_home->is_logged_in()){
  ?>
  <div class="flipkart-navbar-search smallsearch col-sm-4 col-xs-11">
    <div class="row">
      <h2>Total Points: <?php echo $row['total_points']; ?></h2>
      <h5>20 points = 1 shilling</h5>

    </div>
  </div>
  <?php
}
?>


</div>
</div>
</div>
<div id="mySidenav" class="sidenav">
<div class="container" style="background-color: #2874f0; padding-top: 10px;">
<span class="sidenav-heading">Home</span>
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
</div>
<a href="http://clashhacks.in/">Link</a>
<a href="http://clashhacks.in/">Link</a>
<a href="http://clashhacks.in/">Link</a>
<a href="http://clashhacks.in/">Link</a>
</div>

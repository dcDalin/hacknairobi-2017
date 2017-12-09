<?php

	session_start();

	require_once 'database/class.user.php';

	$user_home = new USER();

	if($user_home->is_logged_in())
	{
    $stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userId=:uid");
    $stmt->execute(array(":uid"=>$_SESSION['userSession']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	}

  if($row['userLevel'] == '0'){
    //Redirect to Admin Default Page
    header( "Location: youtube-videos.php" );
  }else{
    //Redirect to User Page
    header( "Location: index.php" );
  }
?>

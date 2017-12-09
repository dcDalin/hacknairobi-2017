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
?>
<?php
  include 'includes/inc-header.php';
  include 'includes/inc-nav.php';
?>
        <div class="container">
            <div class="row mar-top-30">
                <div class="main-box col-sm-4">
                    <div class="box text-center">
                        <h5>Hot Dog and Fries</h5>
                        <div class="youtube-box text-center">
                          <img height="300" width="350" src="assets/img/2.jpg" alt="">
                        </div>
                        <div class="incon-box">
                              <h4>
                                6,000 pts
                              </h4><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include 'includes/inc-footer.php'; ?>

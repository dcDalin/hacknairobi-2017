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
      <div class="main-box col-md-6 col-md-offset-3">
        <div class="login-box">

          <div class="">
            <h4>Log in to your Account</h4>
            <!-- form start -->

                <form class="form-signin" method="post" id="login-form">
            <div class="col-md-12">
                  <div class="row">
                    <div id="error">
              <!-- error will be shown here ! -->
              </div>

                  <div class="form-group col-md-12">
                    <label for="usr">Email Address:</label><br>
                    <input name="email" id="email" type="text" class="input-fields" placeholder="Email Address" maxlength="50">
                    <span class="help-block" id="check-e"></span>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="usr">Password:</label><br>
                    <input name="password" id="password" type="password" class="input-fields" placeholder="Password">
                    <span class="help-block" id="check-e"></span>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn-login" name="btn-login" id="btn-login">
                          Log In
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <h6><a href="#">Forgot your password?</a></h6>
        </div>
      </div>
    </div>
</div>
<?php
  include 'includes/inc-footer.php';
?>

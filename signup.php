<?php

	session_start();

	require_once 'database/class.user.php';

	$user_home = new USER();

	if($user_home->is_logged_in())
	{
    $stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
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
            <h4>Create Account</h4>
            <!-- form start -->

                <form class="form-signin" method="post" id="register-form">
                <div class="col-md-12">
                      <div class="row">
                        <!-- json response will be here -->
          		              	<div id="errorDiv"></div>
          		           <!-- json response will be here -->

                      <div class="form-group col-md-12">
                        <label for="usr">Username:</label><br>
                        <input name="userName" id="username" type="text" class="input-fields" placeholder="What's that name you love?" maxlength="50">
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group col-md-12">
                        <label for="usr">Email Address:</label><br>
                        <input name="userEmail" id="userEmail" type="email" class="input-fields" placeholder="What about your email?" maxlength="50">
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group col-md-12">
                        <label for="usr">Password:</label><br>
                        <input name="password" id="password" type="password" class="input-fields" placeholder="Password">
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group col-md-12">
                        <label for="usr">Confirm Password:</label><br>
                        <input name="cpassword" id="cpassword" type="password" class="input-fields" placeholder="Password">
                        <span class="help-block" id="error"></span>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <button type="submit" class="btn-login" name="btn-signup" id="btn-signup">
                              Sign In
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

          <h6><a href="login.php">Already have an account?</a></h6>
        </div>
      </div>
    </div>
</div>
<?php
  include 'includes/inc-footer.php';
?>

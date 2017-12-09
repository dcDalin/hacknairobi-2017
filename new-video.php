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
            <h4>Add New YouTube Video</h4>
            <!-- form start -->

                <form class="form-signin" method="post" id="new-video-form">
                <div class="col-md-12">
                      <div class="row">
                        <!-- json response will be here -->
          		              	<div id="errorDiv"></div>
          		           <!-- json response will be here -->


											<div class="form-group col-md-12">
                        <label for="usr">User ID:</label><br>
                        <input name="userId" id="userId" value="<?php echo $_SESSION['userSession']; ?>" type="text" class="input-fields" placeholder="" maxlength="50" readonly="readonly">
                        <span class="help-block" id="error"></span>
                      </div>

											<div class="form-group col-md-12">
                        <label for="usr">Video Title:</label><br>
                        <input name="videoTitle" id="videoTitle" type="text" class="input-fields" placeholder="" maxlength="50">
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group col-md-12">
                        <label for="usr">Video URL:</label><br>
                        <input name="videoURL" id="videoURL" type="text" class="input-fields" placeholder="" maxlength="50">
                        <span class="help-block" id="error"></span>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <button type="submit" class="btn-login" name="btn-new-video" id="btn-new-video">
                              Next
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

          <h6><a href="login.php">.</a></h6>
        </div>
      </div>
    </div>
</div>
<?php
  include 'includes/inc-footer.php';
?>

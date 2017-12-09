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

  if(isset($_GET['question_id']) && !empty($_GET['question_id']))
	{

		$videoID = $_GET['question_id'];

		$stmt_buy = $user_home->runQuery('SELECT * FROM tbl_videos WHERE id =:id');
		$stmt_buy->execute(array(':id'=>$videoID));
		$edit_row = $stmt_buy->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);

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
                        <h5><?php echo $edit_row['videoTitle']; ?></h5>
                        <div class="youtube-box text-center">
                            <iframe src="<?php echo $edit_row['videoURL']; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="incon-box">
                        </div>
                    </div>
                </div>


                <div class="main-box col-md-8 col-md-offset-0">
                  <div class="login-box">

                    <div class="">
                      <h4>Add a Question to this Video - <?php echo $edit_row['videoTitle']; ?></h4><br>
                      <!-- form start -->

                          <form class="form-signin" method="post" id="add-question-form">
                          <div class="col-md-12">
                                <div class="row">
                                  <!-- json response will be here -->
                    		              	<div id="errorDiv"></div>
                    		           <!-- json response will be here -->


          											<div class="form-group col-md-6">
                                  <label for="usr">Video ID:</label><br>
                                  <input name="videoId" id="videoId" value="<?php echo $videoID; ?>" type="text" class="input-fields" placeholder="" maxlength="50" readonly="readonly">
                                  <span class="help-block" id="error"></span>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="usr">User ID:</label><br>
                                  <input name="userId" id="userId" value="<?php echo $_SESSION['userSession']; ?>" type="text" class="input-fields" placeholder="" maxlength="50" readonly="readonly">
                                  <span class="help-block" id="error"></span>
                                </div>

          											<div class="form-group col-md-12">
                                  <label for="usr">Question:</label><br>
                                  <input name="question" id="question" type="text" class="input-fields" placeholder="" maxlength="50">
                                  <span class="help-block" id="error"></span>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="usr">Choice A:</label><br>
                                  <input name="optA" id="optA" type="text" class="input-fields" placeholder="" maxlength="50">
                                  <span class="help-block" id="error"></span>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="usr">Choice B:</label><br>
                                  <input name="optB" id="optB" type="text" class="input-fields" placeholder="" maxlength="50">
                                  <span class="help-block" id="error"></span>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="usr">Choice C:</label><br>
                                  <input name="optC" id="optC" type="text" class="input-fields" placeholder="" maxlength="50">
                                  <span class="help-block" id="error"></span>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="usr">Choice D:</label><br>
                                  <input name="optD" id="optD" type="text" class="input-fields" placeholder="" maxlength="50">
                                  <span class="help-block" id="error"></span>
                                </div>

                                <div class="form-group col-md-12">
                                  <div class="main-box col-md-8 col-md-offset-2">
                                  <label for="usr">Correct Choice:</label><br>
                                    <select class="input-fields" name="answer" id="answer">
                                      <option value="A">A</option>
                                      <option value="B">B</option>
                                      <option value="C">C</option>
                                      <option value="D">D</option>
                                    </select>
                                    <span class="help-block" id="error"></span>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group">
                                    <button type="submit" class="btn-login" name="btn-add-question" id="btn-add-question">
                                        Add Question
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
    <?php include 'includes/inc-footer.php'; ?>

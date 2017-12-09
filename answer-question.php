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

		$stmt_vid = $user_home->runQuery('SELECT * FROM tbl_quiz WHERE videoId =:id');
		$stmt_vid->execute(array(':id'=>$videoID));
		$vid_row = $stmt_vid->fetch(PDO::FETCH_ASSOC);


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
										  <h4>Answer a Question relating to this Video - <?php echo $edit_row['videoTitle']; ?></h4><br>
											<div id="sum_box" class="row mbl">
													<div class="col-sm-6">
                                <div class="panel income db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class=" fa fa-money"></i>
                                        </p>
                                        <h4 class="value">
                                            <span>20</span><span></span></h4>
                                        <p class="description">
                                            Points</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel profit db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class=" fa fa-money"></i>
                                        </p>
																				<h4 class="value">
                                            <span>5</span><span></span></h4>
                                        <p class="description">
                                            Points</p>

                                    </div>
                                </div>
                            </div>


                        </div>
                </div>


                <div class="main-box col-md-8 col-md-offset-0">
                  <div class="login-box">

                    <div class="">

                      <!-- form start -->

                          <form class="form-signin" method="post" id="answer-question-form">
                          <div class="col-md-12">
                                <div class="row">
                                  <!-- json response will be here -->
                    		              	<div id="errorDiv"></div>
                    		           <!-- json response will be here -->

																	 <div class="form-group col-md-2">

	 					                        <input name="userId" id="userId" type="hidden" class="input-fields" value="<?php echo $_SESSION['userSession'];?>">
	 					                        <span class="help-block" id="error"></span>
	 					                      </div>
	 																<div class="form-group col-md-3">

	 					                        <input name="questionId" id="questionId" type="hidden" class="input-fields" value="<?php echo $videoID; ?>">
	 					                        <span class="help-block" id="error"></span>
	 					                      </div>
																	<div class="form-group col-md-3">

	 					                        <input name="answer" id="answer" type="hidden" class="input-fields" value="<?php echo $vid_row['answer']; ?>">
	 					                        <span class="help-block" id="error"></span>
	 					                      </div>
																	<div class="form-group col-md-3">

	 					                        <input name="total_points" id="total_points" type="hidden" class="input-fields" value="<?php echo $row['total_points']; ?>">
	 					                        <span class="help-block" id="error"></span>
	 					                      </div>

          											<div class="form-group col-md-12">
																	<h4>Attempts Left 2</h4>
                                  <label for="usr"><h3>Question:</h3> <p>- <?php echo $vid_row['question']; ?></p></label>

                                </div>


																<div class="form-group col-md-8 col-md-offset-1">
																	<div class="radio">
																	 <label><input type="radio" value="A" name="choice">A - <?php echo $vid_row['optA']; ?></label>
																	</div>
																	<div class="radio">
																	 <label><input type="radio" value="B" name="choice">B - <?php echo $vid_row['optB']; ?></label>
								 									</div>
																	<div class="radio">
																	 <label><input type="radio" value="C" name="choice">C - <?php echo $vid_row['optC']; ?></label>
																	</div>
																	<div class="radio">
																	 <label><input type="radio" value="D" name="choice">D - <?php echo $vid_row['optD']; ?></label>
																	</div>
                                  <span class="help-block" id="error"></span>
                                </div>


                                <div class="col-md-12">
                                  <div class="form-group">
                                    <button type="submit" class="btn-login" name="btn-answer-question" id="btn-answer-question">
                                        Submit Answer
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>

                    <h6><a href="#">.</a></h6>
                  </div>
                </div>
            </div>
        </div>
    <?php include 'includes/inc-footer.php'; ?>

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
              <?php
                $status = '0';
                $stmt = $user_home->runQuery('SELECT * FROM tbl_videos WHERE status = :status');
                $stmt->bindParam(':status', $status);
                $stmt->execute();

                if($stmt->rowCount() > 0)
                {
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                  {
                    extract($row);
              ?>
                <div class="main-box col-sm-4">
                    <div class="box text-center">
                        <h5><?php echo $row['videoTitle']; ?></h5>
                        <div class="youtube-box text-center">
                            <iframe src="<?php echo $row['videoURL'];?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="incon-box">
                          <?php
                            if($row['videoStatus'] == '0'){
                              ?>
                              <h4>
                                <a
                                  href="add-question.php?question_id=<?php echo $row['id']; ?>"
                                  title="Add Question"
                                  onclick="
                                    return confirm('Add Question to Video?')" >
                                  Add Question
                                </a>
                              </h4><br>
                              <?php
                            }else{
                              ?>
                              <h4>
                                <a
                                  href="#"
                                  title="Add Question"
                                  onclick="
                                    return confirm('Are you sure you want to edit the question?')" >
                                  Edit Question
                                </a>
                              </h4><br>
                              <?php
                            }
                          ?>
                        </div>
                    </div>
                </div>
                <?php
                  }
                }
                else
                {
                  ?>
                      <div class="col-xs-12">
                        <div class="alert alert-warning">
                            No YouTube Videos Uploaded...
                          </div>
                      </div>
                      <?php
                }

              ?>
            </div>
        </div>
    <?php include 'includes/inc-footer.php'; ?>

<?php

	header('Content-type: application/json');

	require_once 'database/class.user.php';

	$user_home = new USER();

	$response = array();

	if ($_POST) {

		$videoId = trim($_POST['videoId']);
		$userId = trim($_POST['userId']);
		$question = trim($_POST['question']);
		$answer = trim($_POST['answer']);
		$optA = trim($_POST['optA']);
		$optB = trim($_POST['optB']);
		$optC = trim($_POST['optC']);
		$optD = trim($_POST['optD']);

    $query = "
      INSERT INTO `tbl_quiz` (`videoId`, `userId`, `question`, `answer`, `optA`, `optB`, `optC`, `optD`)
			VALUES (:videoId, :userId, :question, :answer, :optA, :optB, :optC, :optD);

			UPDATE tbl_videos SET videoStatus = '1' WHERE id = :videoId
    ";
		$stmt = $user_home->runQuery( $query );

		$stmt->bindParam(':videoId', $videoId);
		$stmt->bindParam(':userId', $userId);
		$stmt->bindParam(':question', $question);
		$stmt->bindParam(':answer', $answer);
		$stmt->bindParam(':optA', $optA);
		$stmt->bindParam(':optB', $optB);
		$stmt->bindParam(':optC', $optC);
		$stmt->bindParam(':optD', $optD);


		// check for successfull registration
    if ( $stmt->execute() ) {
			$response['status'] = 'success';
			$response['message'] = 'Account created successfully';
    } else {
      $response['status'] = 'error'; // could not register
			$response['message'] = 'Error creating account, try again later';
    }
	}

	echo json_encode($response);

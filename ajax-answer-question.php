<?php

	header('Content-type: application/json');

	require_once 'database/class.user.php';

	$user_home = new USER();

	$response = array();

	if ($_POST) {

		$userId = trim($_POST['userId']);
		$questionId = trim($_POST['questionId']);
		$choice = trim($_POST['choice']);
		$answer = trim($_POST['answer']);
		$total_points = trim($_POST['total_points']);

		if($choice == $answer){
			// correct answer
			$plus_points = "20";

			$new_total_points = $total_points + $plus_points;

	    $query = "
	      INSERT INTO `tbl_points` (`userId`, `questionId`, `choice`, `points`)
				VALUES (:userId, :questionId, :choice,  :points);

				UPDATE tbl_users SET total_points = :new_total_points WHERE userId = :userId;
	    ";
			$stmt = $user_home->runQuery( $query );

			$stmt->bindParam(':userId', $userId);
			$stmt->bindParam(':questionId', $questionId);
			$stmt->bindParam(':choice', $choice);
			$stmt->bindParam(':points', $plus_points);
			$stmt->bindParam(':new_total_points', $new_total_points);



			// check for successfull registration
	    if ( $stmt->execute() ) {
				$response['status'] = 'success';
				$response['message'] = 'Account created successfully';
	    } else {
	      $response['status'] = 'error'; // could not register
				$response['message'] = 'Error creating account, try again later';
	    }
		}else{
			// Wrong answer
			$plus_points = "10";

			$new_total_points = $total_points - $plus_points;

	    $query = "
	      INSERT INTO `tbl_points` (`userId`, `questionId`, `choice`, `points`)
				VALUES (:userId, :questionId, :choice,  :points);

				UPDATE tbl_users SET total_points = :new_total_points WHERE userId = :userId;
	    ";
			$stmt = $user_home->runQuery( $query );

			$stmt->bindParam(':userId', $userId);
			$stmt->bindParam(':questionId', $questionId);
			$stmt->bindParam(':choice', $choice);
			$stmt->bindParam(':points', $plus_points);
			$stmt->bindParam(':new_total_points', $new_total_points);



			// check for successfull registration
	    if ( $stmt->execute() ) {
				$response['status'] = 'wrong';
				$response['message'] = 'Sorry, wrong answer... Try again';
	    } else {
	      $response['status'] = 'error'; // could not register
				$response['message'] = 'Error creating account, try again later';
	    }
		}

	}

	echo json_encode($response);

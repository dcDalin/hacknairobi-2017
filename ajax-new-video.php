<?php

	header('Content-type: application/json');

	require_once 'database/class.user.php';

	$user_home = new USER();

	$response = array();

	if ($_POST) {
		$userId = trim($_POST['userId']);
		$videoTitle = trim($_POST['videoTitle']);
		$videoURL = trim($_POST['videoURL']);


    $query = "
      INSERT INTO `tbl_videos` (`userId`, `videoTitle`, `videoURL`)
			VALUES (:userId, :videoTitle, :videoURL);
    ";
		$stmt = $user_home->runQuery( $query );

		$stmt->bindParam(':userId', $userId);
		$stmt->bindParam(':videoTitle', $videoTitle);
		$stmt->bindParam(':videoURL', $videoURL);


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

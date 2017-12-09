<?php

	header('Content-type: application/json');

	require_once 'database/class.user.php';

	$user_home = new USER();

	$response = array();

	if ($_POST) {

		$userName = trim(strtolower((($_POST['userName']))));
		$userEmail = trim($_POST['userEmail']);
		$password = trim($_POST['password']);

		// sha256 password hashing
		$hashed_password = hash('sha256', $password);

    $query = "
      INSERT INTO `tbl_users` (`userName`, `userEmail`, `userPassword`)
			VALUES (:userName, :userEmail, :userPassword);
    ";
		$stmt = $user_home->runQuery( $query );

		$stmt->bindParam(':userName', $userName);
		$stmt->bindParam(':userEmail', $userEmail);
		$stmt->bindParam(':userPassword', $hashed_password);


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

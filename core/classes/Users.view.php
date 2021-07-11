<?php

	include_once 'Users.model.php';

	class UsersView extends UsersModel {

	// LOGIN VIEW 

		public function userloginview($username, $password) {
			$loginverify = $this->userloginmodel($username, $password);

			if (!$loginverify) {
				echo 'User doesnt exist';
			} else {
				$_SESSION['id'] = $loginverify[0];
				$_SESSION['username'] = $loginverify[1];
				$_SESSION['password'] = $loginverify[2];
				$_SESSION['firstname'] = $loginverify[3];
				$_SESSION['lastname'] = $loginverify[4];
				$_SESSION['coins'] = $loginverify[5];
				header('location: home.php');
			}
		}

		// SIGNUP VIEW

		public function usersignupview($firstname, $lastname, $username, $password) {
			$signupverify = $this->usersignupmodel($firstname, $lastname, $username, $password);

			if (!$signupverify) {
				echo 'Username is already taken';
			} else {
				echo 'signup successfully';
			}
			
		}

	}
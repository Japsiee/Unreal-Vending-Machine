<?php

	include_once 'Users.model.php';

	class UsersView extends UsersModel {

	// LOGIN VIEW 

		public function userloginview($username, $password) {
			$loginverify = $this->userloginmodel($username, $password);

			if (!$loginverify) {
				echo "<h2 style='text-align:center; margin-top: 40px;'>User doesnt exist</h2>";
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
				echo "<h2 style='text-align:center; margin-top: 40px;'>Username already is taken</h2>";
			} else {
				echo "<h2 style='text-align:center; margin-top: 40px;'>Signup Successfully</h2>";
			}
			
		}

		// OWNER VIEW

		public function ownerloginview($username, $password) {
			$ownerverify = $this->ownerloginmodel($username, $password);

			if (!$ownerverify) {
				echo "<h2 style='text-align:center; margin-top: 40px;'>Wrong admin username or password</h2>";
			} else {
				$_SESSION['ownerid'] = $ownerverify[0];
				$_SESSION['ownerusername'] = $ownerverify[1];
				$_SESSION['collectedcoins'] = $ownerverify[2];
				header('location: owner.php');
			}
		}

	}
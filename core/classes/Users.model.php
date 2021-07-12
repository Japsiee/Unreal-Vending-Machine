<?php
	
	require_once '../core/config.php';

	class UsersModel extends Dbh {

		// LOGIN MODEL

		protected function userloginmodel($username, $password) {
			$qry = "SELECT * FROM users";

			$stmt = $this->connect()->query($qry);
			$data = $stmt->fetchAll();

			// Loop in data array & check if username and password are correct

			for ($i = 0; $i < count($data); $i++) {
				if ($data[$i]->username != $username) {
					if ($i === count($data)) {
						if ($data[$i]->username != $username) {
							return false;
						}
					} else {
						continue;
					}
				} else {
					$passwordVerify = password_verify($password, $data[$i]->password);
					if ($passwordVerify != 1) {
						return false;
					} else {
						return [$data[$i]->id, $data[$i]->username, $data[$i]->password, $data[$i]->firstname, $data[$i]->lastname, $data[$i]->coins];
					}
				}
			}
		}

		// SIGNUP MODEL

		protected function usersignupmodel($firstname, $lastname, $username, $password) {
			$qry1 = "SELECT * FROM users WHERE username = ?";
			$qry2 = "INSERT INTO users(firstname,lastname,username,password) VALUES(?,?,?,?)";
			$qry3 = "INSERT INTO inventory(id,coke,pepsi,soda) VALUES(?,?,?,?)";

			$passwordHash = password_hash($password, PASSWORD_DEFAULT);

			$stmt = $this->connect()->prepare($qry1);
			$stmt->execute([$username]);

			if ($stmt->rowCount() >= 1) {
				return false;
			} else {
				$stmt = $this->connect()->prepare($qry2);
				$stmt->execute([$firstname, $lastname, $username, $passwordHash]);
				if ($stmt) {
					$stmt = $this->connect()->prepare($qry1);
					$stmt->execute([$username]);
					$row = $stmt->fetchAll();

					for($i = 0; $i < count($row); $i++) {
						$id = $row[$i]->id;
						$stmt = $this->connect()->prepare($qry3);
						$stmt->execute([$id, 0,0,0]);
					}
					return true;
				}
			}
		}

		// OWNER MODEL

		protected function ownerloginmodel($username, $password) {
			$qry = "SELECT * FROM owners";
			$stmt = $this->connect()->query($qry);
			$data = $stmt->fetchAll();
			for ($i = 0; $i < count($data); $i++) {
				if ($data[$i]->username != $username) {
					if ($i === count($data)) {
						if ($data[$i]->username != $username) {
							return false;
						}
					} else {
						continue;
					}
				} else {
					if ($password != $data[$i]->password) {
						return false;
					} else {
						$qry2 = "SELECT collected_coins FROM products";
						$stmt = $this->connect()->query($qry2);
						$get = $stmt->fetch();
						return [$data[$i]->id, $data[$i]->username, $get->collected_coins];
					}
				}
			}
		}
	}
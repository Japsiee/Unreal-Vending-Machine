<?php

	require_once '../core/config.php';

	class DepositModel extends Dbh {
		protected function depositprocess($depositid, float $depositmoney) {
			$qry1 = "SELECT coins FROM users WHERE id = ?";
			$qry2 = "UPDATE users SET coins = ? WHERE id = ?";

			$stmt = $this->connect()->prepare($qry1);
			$stmt->execute([$depositid]);

			$row = $stmt->fetchAll();

			for($i = 0; $i < count($row); $i++) {
				$coins = $row[$i]->coins;
				$updatedCoins = $coins + $depositmoney;

				$stmt = $this->connect()->prepare($qry2);
				$stmt->execute([$updatedCoins, $depositid]);

				if ($stmt) {
					return $updatedCoins;
				} else {
					return false;
				}
			}
		}


	}
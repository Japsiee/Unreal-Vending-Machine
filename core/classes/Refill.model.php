<?php

	require_once '../core/config.php';

	class RefillModel extends Dbh {
		protected function setStocks($cokeqty, $pepsiqty, $sodaqty) {
			$qry1 = "SELECT coke,pepsi,soda FROM products";
			$qry2 = "UPDATE products SET coke = ?, pepsi = ?, soda = ?";

			$stmt = $this->connect()->query($qry1);
			$data = $stmt->fetchAll();
			
			if ($data) {
				$totalQtyCoke = $data[0]->coke + $cokeqty;
				$totalQtyPepsi = $data[0]->pepsi + $pepsiqty;
				$totalQtySoda = $data[0]->soda + $sodaqty;

				$stmt = $this->connect()->prepare($qry2);
				$stmt->execute([$totalQtyCoke, $totalQtyPepsi, $totalQtySoda]);

				if (!$stmt) {
					return false;
				} else {
					return [$totalQtyCoke, $totalQtyPepsi, $totalQtySoda];
				}

			} else {
				return false;
			}
		}
	}
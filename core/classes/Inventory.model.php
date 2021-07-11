<?php

	require_once '../core/config.php';

	class InventoryModel extends Dbh {
		protected function fetchInventory($id) {
			$qry = "SELECT * FROM inventory WHERE id = ?";

			$stmt = $this->connect()->prepare($qry);
			$stmt->execute([$id]);

			$row = $stmt->fetchAll();

			for ($i=0; $i < count($row); $i++) { 
				return [$row[$i]->id, $row[$i]->coke, $row[$i]->pepsi, $row[$i]->soda];
			}
		}

	}
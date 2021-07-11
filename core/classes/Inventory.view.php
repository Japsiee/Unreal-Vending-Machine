<?php

	require_once 'Inventory.model.php';

	class InventoryView extends InventoryModel {

		public function viewInventory($id) {
			$showInventory = $this->fetchInventory($id);

			if (!$showInventory) {
				echo 'Failed to fetch inventory in model class';
			} else {
				$_SESSION['inventoryid'] = $showInventory[0];
				$_SESSION['coke'] = $showInventory[1];
				$_SESSION['pepsi'] = $showInventory[2];
				$_SESSION['soda'] = $showInventory[3];
			}
		}


	}
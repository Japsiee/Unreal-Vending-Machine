<?php 
		
	require_once 'Refill.model.php';

	class RefillController extends RefillModel {
		public function pushStocks(int $cokeqty, int $pepsiqty, int $sodaqty) {
			$stmt = $this->setStocks($cokeqty, $pepsiqty, $sodaqty);
			if (!$stmt) {
				echo 'failed to add stocks';
			} else {
				header('location: owner.php');
			}
		}
	}
<?php 
		
	require_once 'Refill.model.php';

	class RefillController extends RefillModel {
		public function pushStocks(int $cokeqty, int $pepsiqty, int $sodaqty) {
			$stmt = $this->setStocks($cokeqty, $pepsiqty, $sodaqty);
			if (!$stmt) {
				echo 'failed to add stocks';
			} else {
				echo 'coke successfully refilled : ' . $stmt[0] . '<br>';
				echo 'pepsi successfully refilled : ' . $stmt[1] . '<br>';
				echo 'soda successfully refilled : ' . $stmt[2] . '<br>';
			}
		}
	}
<?php

	require_once 'Deposit.model.php';

	class DepositController extends DepositModel {
		public function deposit($depositid, float $depositmoney) {
			$transac = $this->depositprocess($depositid, $depositmoney);

			if (!$transac) {
				echo 'Transferring money error';
			} else {
				$_SESSION['coins'] = $transac;
				header('location: home.php');
			}
		}
	}
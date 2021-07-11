<?php
	
	require_once '../core/config.php';

	class ProductModel extends Dbh {
		protected $qry1 = "SELECT * FROM products";

		protected function fetchProduct() {
			$stmt = $this->connect()->query($this->qry1);
			while ($rows = $stmt->fetch()) {
				return [$rows->coke, $rows->pepsi, $rows->soda];
			}
		}

		protected $cokeprice = 25;
		protected $pepsiprice = 35;
		protected $sodaprice = 45;

		protected $item = ['coke', 'pepsi', 'soda'];

	}
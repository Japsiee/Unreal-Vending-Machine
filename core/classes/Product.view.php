<?php

	require_once 'Product.model.php';

	class ProductView extends ProductModel {

		public function viewProduct() {
			$returnedProduct = $this->fetchProduct();
			if (!$returnedProduct) {
				echo 'database error';
			} else {
				$_SESSION['cokequantity'] = $returnedProduct[0];
				$_SESSION['pepsiquantity'] = $returnedProduct[1];
				$_SESSION['sodaquantity'] = $returnedProduct[2];
			}
		}

	}
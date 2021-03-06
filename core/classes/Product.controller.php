<?php

	require_once 'Product.model.php';

	class ProductController extends ProductModel {

		// - START - function buy item

		public function buyItem($id, $coins, $item) {
			$quantityOfItem = $this->fetchProduct();
			$cokeqty = $quantityOfItem[0];
			$pepsiqty = $quantityOfItem[1];
			$sodaqty = $quantityOfItem[2];

			// - START - switch case for parameter item 

			switch ($item) {
				case 'coke':
						$currentQuantity = $_SESSION['coke'];
						$qty = $cokeqty;
						$price = $this->cokeprice;
						$product = $this->item[0];
					break;

				case 'pepsi':
						$currentQuantity = $_SESSION['pepsi'];
						$qty = $pepsiqty;
						$price = $this->pepsiprice;
						$product = $this->item[1];
					break;

				case 'soda':
						$currentQuantity = $_SESSION['soda'];
						$qty = $sodaqty;
						$price = $this->sodaprice;
						$product = $this->item[2];
					break;
				
				default:
						echo 'theres an error buying the product';
					break;
			}

			// - START - Instruction for inserting and updating database 

			$qry1 = "SELECT collected_coins FROM products";
			$stmt = $this->connect()->query($qry1);
			$vendCoin = $stmt->fetch();

			$qry2 = "UPDATE products SET " . $product . " = ?, collected_coins = ?";
			$qry3 = "UPDATE users SET coins = ? WHERE id = ?";
			$qry4 = "UPDATE inventory SET " . $product . " = ? WHERE id = ?";

			// - START - computation of how much coins would be left after purchasing the item

			$totalCoinsLeft = $coins - $price;
			$totalVendCoin = $vendCoin->collected_coins + $price;

			// - START - variable totalCoinsLeft is the predicted left amount after purchasing the item so if
			// the totalCoinsLeft variable value is negative - means users money is insufficient to afford the item

			if ($totalCoinsLeft < 0) {
				echo 'sorry you dont have enough money to buy an item';
			} else {
				if ($qty <= 0) {
					echo 'sorry the item you request is not yet refilled';
				} else {
					// - START - updates the quantity of specific item in vending machine database after someone purchase 
					$stmt = $this->connect()->prepare($qry2);
					$stmt->execute([$qty - 1, $totalVendCoin]);
					if (!$stmt) {
						echo 'Have an error querying query 2';
					} else {
						$_SESSION['coins'] = $totalCoinsLeft;
						// - START - updates the users coin by the totalleftcoin 
						$stmt = $this->connect()->prepare($qry3);
						$stmt->execute([$totalCoinsLeft, $id]);
						if (!$stmt) {
							echo 'Have an error querying query 3';
						} else {
							// - START - return the item to the users inventory
							$stmt = $this->connect()->prepare($qry4);
							$stmt->execute([$currentQuantity + 1, $id]);
							if (!$stmt) {
								echo 'Have an error querying query 4';
							} else {
								echo "<h2 style='text-align: center; padding: 10px;'>Successfully bought the item</h2>";
							}
						}
					}
				}
			}
		}

		// - END - function buy item

	}
<?php

	class Dbh {
		private $username = 'root';
		private $password = '';
		private $db = 'vend';
		private $host = 'localhost';

		protected function connect() {
			$pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			return $pdo;
		}
	}
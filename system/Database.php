<?php
	class Database {
		private const servername = 'localhost';
		private const username = 'root';
		private const password = '';
		private const dbname = 'anonyms';
		private const port = '3306';

		public static function connect() {
			return new mysqli(
				self::servername,
				self::username, 
				self::password,
				self::dbname,
				self::port
			);
		}
	}

	$db = Database::connect();
?>
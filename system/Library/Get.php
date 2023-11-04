<?php
	class Get {
		public static function get($name = null) {
			return $name ? $_GET[$name] : $_GET;
		}

		public static function has($name) {
			return isset($_GET[$name]);
		}
	}
?>
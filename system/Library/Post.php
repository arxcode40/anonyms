<?php
	class Post {
		public static function get($name = null) {
			return $name ? $_POST[$name] : $_POST;
		}

		public static function has($name) {
			return isset($_POST[$name]);
		}
	}
?>
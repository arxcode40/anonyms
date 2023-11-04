<?php
	class Session {
		public static function del($name) {
			unset($_SESSION[$name]);
		}

		public static function get($name = null) {
			return $name ? $_SESSION[$name] : $_SESSION;
		}

		public static function has($name) {
			return isset($_SESSION[$name]);
		}

		public static function set($name, $value) {
			$_SESSION[$name] = $value;
		}
	}
?>
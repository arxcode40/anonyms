<?php
	class Cookie {
		public static function get($name = null) {
			return $name ? $_COOKIE[$name] : $_COOKIE;
		}

		public static function has($name) {
			return isset($_COOKIE[$name]);
		}

		public static function set($name, $value, $expire = 0, $path = '/') {
			setcookie($name, $value, time() + $expire, $path);
		}
	}
?>
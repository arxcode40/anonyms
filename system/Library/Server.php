<?php
	class Server {
		public static function get($name = null) {
			return $name ? $_SERVER[$name] : $_SERVER;
		}
	}
?>
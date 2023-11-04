<?php
	class Template {
		public static function css($filename) {
			return sprintf('<link href="%s" rel="stylesheet">', $filename);
		}

		public static function js($filename, $type = '') {
			return sprintf('<script src="%s" type="%s"></script>', $filename, $type);
		}

		public static function page($filename, $data = array()) {
			require_once($filename);
		}
	}
?>
<?php
	class Header {
		public static function location($pathname) {
			header(sprintf('Location: %s', $pathname));
		}
	}
?>
<?php
	class Config {
		private const config = array(
			'app_copyright' => 'Copyright &copy; 2023 ArX Code. All Rights Reserved.',
			'app_name' => 'Anonyms',
			'app_version' => 'v1.0.0',
			'count_message' => 5,
			'link_email' => 'mailto:arxcode40@gmail.com',
			'link_facebook' => 'https://www.facebook.com/aryaps.aryaps.378/',
			'link_github' => 'https://github.com/arxcode40/',
			'link_instagram' => 'https://www.instagram.com/arxt2411/',
			'link_messenger' => 'https://www.facebook.com/messages/t/100024197826905/',
			'link_telegram' => 'https://t.me/arxcode40/',
			'link_twitter-x' => 'https://www.twitter.com/arxt2411/',
			'link_whatsapp' => 'https://wa.me/62895339792382/'
		);

		public static function get($name) {
			return self::config[$name];
		}
	}
?>
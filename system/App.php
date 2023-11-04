<?php
	class App {
		public static function base_dir() {
			return vsprintf('%s/anonyms', array(Server::get('DOCUMENT_ROOT')));
		}

		public static function base_url() {
			return vsprintf('%s://%s/%s', array(
				Server::get('REQUEST_SCHEME'),
				Server::get('HTTP_HOST'),
				strtolower(Config::get('app_name'))
			));
		}

		public static function check_password($password) {
			global $db;
			$sql = "SELECT id FROM account WHERE password = '$password' LIMIT 1";
			$result = $db->query($sql);
			return $result->num_rows;
		}

		public static function check_token($token) {
			global $db;
			$sql = "SELECT id FROM account WHERE token = '$token' LIMIT 1";
			$result = $db->query($sql);
			return $result->num_rows;
		}

		public static function check_username($username) {
			global $db;
			$sql = "SELECT id FROM account WHERE username = '$username' LIMIT 1";
			$result = $db->query($sql);
			return $result->num_rows;
		}

		public static function create_account($token, $username, $password, $timestamp) {
			global $db;
			$sql = "INSERT INTO account VALUES('', '$token', '$username', '$password', $timestamp)";
			$db->query($sql);
			return $db->affected_rows;
		}

		public static function create_message($token, $message, $timestamp) {
			global $db;
			$sql = "INSERT INTO message VALUES('', '$token', '$message', $timestamp)";
			$db->query($sql);
			return $db->affected_rows;
		}

		public static function current_dir() {
			return __DIR__;
		}

		public static function current_url() {
			return vsprintf('%s://%s%s', array(
				Server::get('REQUEST_SCHEME'),
				Server::get('HTTP_HOST'),
				Server::get('REQUEST_URI')
			)); 
		}

		public static function delete_message($id) {
			global $db;
			$sql = "DELETE FROM message WHERE id = $id";
			$db->query($sql);
			return $db->affected_rows;
		}

		public static function get_auth($key = null) {
			return $key ? Session::get('auth')[$key] : Session::get('auth');
		}

		public static function get_chance() {
			return intval(Cookie::get('chance'));
		}

		public static function get_flash_message($key = null) {
			return $key ? Session::get('flash_message')[$key] : Session::get('flash_message');
		}

		public static function get_messages($token, $keyword = '', $begin = null, $count = null) {
			global $db;
			$limit = (is_null($begin) && is_null($count)) ? '' : "LIMIT $begin, $count";
			$sql = "SELECT * FROM message WHERE token = '$token' AND message LIKE '%$keyword%' ORDER BY timestamp DESC $limit";
			$result = $db->query($sql);
			return $result;
		}

		public static function get_total_message($token, $keyword = '') {
			global $db;
			$sql = "SELECT id FROM message WHERE token = '$token' AND message LIKE '%$keyword%'";
			$result = $db->query($sql);
			return $result->num_rows;
		}

		public static function get_username_from_token($token) {
			global $db;
			$sql = "SELECT username FROM account WHERE token = '$token' LIMIT 1";
			$result = $db->query($sql);
			$result = $result->fetch_assoc();
			return $result['username'];
		}

		public static function query_auth($username, $password) {
			global $db;
			$sql = "SELECT token FROM account WHERE username = '$username' AND password = '$password' LIMIT 1";
			$result = $db->query($sql);
			$result = $result->fetch_assoc();
			return $result['token'];
		}

		public static function set_auth($token, $username, $password) {
			Session::set('auth', array(
				'token' => $token,
				'username' => $username,
				'password' => $password
			));
		}

		public static function set_chance() {
			$cookie_name = 'chance';
			$cookie_value = 1;
			$cookie_expire = 60;
			if(Cookie::has('chance')) $cookie_value = self::get_chance() + 1;
			Cookie::set($cookie_name, $cookie_value, $cookie_expire);
		}

		public static function set_flash_message($icon, $status, $text) {
			Session::set('flash_message', array(
				'icon' => $icon,
				'status' => $status,
				'text' => $text,
			));
		}

		public static function update_account($token, $username, $password) {
			global $db;
			$sql = "UPDATE account SET username = '$username', password = '$password' WHERE token = '$token'";
			$db->query($sql);
			return $db->affected_rows;
		}
	}
?>
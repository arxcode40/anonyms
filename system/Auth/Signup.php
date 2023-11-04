<?php
	require_once('../Index.php');
	require_once('../vendor/autoload.php');

	use Hidehalo\Nanoid\Client;
	use Hidehalo\Nanoid\GeneratorInterface;

	if(Post::has('signup')):
		$token = '';
		$username = filter_var(Post::get('username'), FILTER_SANITIZE_STRING);
		$password = filter_var(Post::get('password'), FILTER_SANITIZE_STRING);
		$timestamp = time();

		if(App::check_username($username)):
			App::set_flash_message(
				'bi-x-circle-fill',
				'danger',
				'Nama Pengguna Telah Digunakan'
			);
			Header::location(sprintf('%s/auth/?a=signup', App::base_url()));
			exit();
		endif;

		$client = new Client();
		while(true):
			$token = $client->generateId($size = 16, $mode = Client::MODE_DYNAMIC);
			if(!App::check_token($token)) break;
		endwhile;

		if(App::create_account($token, $username, $password, $timestamp)):
			App::set_flash_message(
				'bi-check-circle-fill',
				'success',
				'Akun Kamu Berhasil Didaftarkan'
			);
			Header::location(sprintf('%s/auth/?a=signin', App::base_url()));
			exit();
		endif;
	endif;
?>
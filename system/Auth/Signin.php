<?php
	require_once('../Index.php');

	if(Post::has('signin')):
		$username = filter_var(Post::get('username'), FILTER_SANITIZE_STRING);
		$password = filter_var(Post::get('password'), FILTER_SANITIZE_STRING);

		if(Cookie::has('chance')):
			if(App::get_chance() >= 2):
				App::set_flash_message(
					'bi-x-circle-fill',
					'danger',
					'Kamu Terlalu Banyak Mencoba Masuk'
				);
				Header::location(sprintf('%s/auth/?a=signin', App::base_url()));
				exit();
			endif;
		endif;

		if(!App::check_username($username)):
			App::set_chance();
			App::set_flash_message(
				'bi-x-circle-fill',
				'danger',
				'Nama Pengguna Kamu Salah'
			);
			Header::location(sprintf('%s/auth/?a=signin', App::base_url()));
			exit();
		endif;

		if(!App::check_password($password)):
			App::set_chance();
			App::set_flash_message(
				'bi-x-circle-fill',
				'danger',
				'Kata Sandi Kamu Salah'
			);
			Header::location(sprintf('%s/auth/?a=signin', App::base_url()));
			exit();
		endif;

		App::set_auth(
			App::query_auth($username, $password),
			$username,
			$password
		);
		App::set_flash_message(
			'bi-check-circle-fill',
			'success',
			'Kamu Berhasil Masuk'
		);
		Header::location(App::base_url());
		exit();
	endif;
?>
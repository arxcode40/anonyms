<?php
	require_once('../Index.php');

	if(Post::has('update')):
		$token = App::get_auth('token');
		$username = filter_var(Post::get('username'), FILTER_SANITIZE_STRING);
		$password = filter_var(Post::get('password'), FILTER_SANITIZE_STRING);

		if(App::update_account($token, $username, $password)):
			App::set_auth($token, $username, $password);
			App::set_flash_message(
				'bi-check-circle-fill',
				'success',
				'Berhasil Memperbarui Akun'
			);
			Header::location(App::base_url());
			exit();
		endif;
	endif;
?>
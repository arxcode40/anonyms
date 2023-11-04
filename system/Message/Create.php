<?php
	require_once('../Index.php');

	if(Post::has('send')):
		$token = filter_var(Post::get('token'), FILTER_SANITIZE_STRING);
		$message = filter_var(Post::get('message'), FILTER_SANITIZE_STRING);
		$timestamp = time();

		if(App::create_message($token, $message, $timestamp)):
			App::set_flash_message(
				'bi-check-circle-fill',
				'success',
				'Pesan Berhasil Dikirim'
			);
			Header::location(sprintf('%s/?u=%s', App::base_url(), $token));
			exit();
		endif;
	endif;
?>
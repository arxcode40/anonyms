<?php
	session_unset();

	if(!Session::has('auth')):
		App::set_flash_message(
			'bi-check-circle-fill',
			'success',
			'Kamu Berhasil Keluar'
		);
		Header::location(sprintf('%s/auth/?a=signin', App::base_url()));
		exit();
	endif;
?>
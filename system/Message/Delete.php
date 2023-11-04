<?php
	require_once('../Index.php');

	if(Get::get('id')):
		$id = Get::get('id');

		if(App::delete_message($id)):
			App::set_flash_message(
				'bi-check-circle-fill',
				'success',
				'Pesan Berhasil Dihapus'
			);
			Header::location(App::base_url());
			exit();
		endif;
	endif;
?>
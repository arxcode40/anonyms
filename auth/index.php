<?php
	require_once('../system/Index.php');

	if(Get::has('a')):
		switch(Get::get('a')):
			case 'signin':
				require_once('signin.php');
				break;
			case 'signout':
				require_once('signout.php');
				break;
			case 'signup':
				require_once('signup.php');
				break;
			default:
				Header::location(App::base_url());
				break;
		endswitch;
	else:
		Header::location(App::base_url());
		exit();
	endif;
?>
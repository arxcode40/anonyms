<?php
	require_once('system/Index.php');
	
	if(Get::has('u')):
		if(!App::check_token(Get::get('u'))):
			Header::location(App::base_url());
			exit();
		else:
			if(Session::has('auth')):
				if(Get::get('u') === App::get_auth('token')):
					Header::location(App::base_url());
					exit();
				endif;
			else:
				require_once('link.php');
			endif;
		endif;
	else:
	  require_once('home.php');
	endif;
?>
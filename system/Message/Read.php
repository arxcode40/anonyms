<?php
	$keyword = Get::has('s') ? Get::get('s') : '';
	$count_message = Config::get('count_message');
	$total_messages = App::get_total_message(App::get_auth('token'), $keyword);
	$total_page = ceil($total_messages / $count_message);
	$active_page = Get::has('p') ? intval(Get::get('p')) : 1;
	$begin_message = $count_message * $active_page - $count_message;

	$get_messages = App::get_messages(App::get_auth('token'), $keyword, $begin_message, $count_message);
?>
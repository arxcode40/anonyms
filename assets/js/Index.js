import config from './Config.js'
import app from './App.js'

'use strict'

if($('#copyLink').length) {	
	$('#copyLink').on('click', function() {
		app.copyLink($(this))
	})
}

if($('.message').length) {
	$('.message').on('click', function() {
		$('#modal .modal-body').text($(this).prev().text())
		$('#modal .modal-footer #btnDelete').prop('href', `${config.get('base_url')}/system/Message/Delete.php?id=${$(this).prop('id')}`)
	})
}

if($('#profileForm').length) {
	let username = $('#username').val()
	let password = $('#password').val()

	$('#profileForm').on('reset', function() {
		app.defaultProfile(username, password)
	})
}

if($('#shareLink').length) {
	$('#shareLink').on('click', function() {
		app.shareLink()
	})
}

if($('#showPassword').length) {
	$('#showPassword').on('click', function() {
		app.showPassword($(this))
	})	
}

if($('#username').length) {
	$('#username').on('input', function() {
		app.filterUsername($(this), config.get('username_pattern'))
	})
}
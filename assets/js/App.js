'use strict'

class App {
	copyLink(toggler) {
		navigator.clipboard
		.writeText($('#link').val())
		.then(function() {
			$(toggler).children().removeClass('bi-copy').addClass('bi-check-lg')
			setTimeout(function() {
				$(toggler).children().removeClass('bi-check-lg').addClass('bi-copy')
			}, 1500)
		})
	}

	defaultProfile(username, password) {
		$('#username').val(username)
		$('#password').val(password)
	}

	filterUsername(item, pattern) {
		$(item).val(function(i, v) {
			return v.toLowerCase().replace(pattern, '')
		})
	}

	shareLink() {
		navigator.share({
			text: 'Kirimi Aku Pesan Anonim\n',
			title: 'Bagikan Tautanmu',
			url: $('#link').val()
		})
	}

	showPassword(toggler) {
		if($(toggler).prev().prop('type') === 'text') {
			$(toggler).prev().prop('type', 'password')
			$(toggler).children().removeClass('bi-eye').addClass('bi-eye-slash')
		} else {
			$(toggler).prev().prop('type', 'text')
			$(toggler).children().removeClass('bi-eye-slash').addClass('bi-eye')
		}
	}
}

const app = new App()
export default app
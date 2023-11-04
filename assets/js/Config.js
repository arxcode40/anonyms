'use strict'

class Config {
	constructor() {
		this.config = {
			'base_url': `${location.origin}/anonyms`,
			'host_url': `${location.host}/anonyms`,
			'username_pattern': /[^A-Za-z0-9]+/g
		}
	}
	
	get(name) {
		return this.config[name]
	}
}

const config = new Config()
export default config
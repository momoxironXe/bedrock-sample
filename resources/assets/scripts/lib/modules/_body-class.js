
(function(factory) {
	'use strict';
	factory(window.Clique);
})(function(_c) {
	'use strict';

	// private functions
	function makeSlug(string) {
		string = string ||  window.location.href;

		var a = document.createElement('a');
		a.href = string;

		var path = a.pathname;

		// remove leading slash
		if (path[0] === '/') {
			path = path.substr(1);
		}

		return path.replace(/\/|_/g, '-') // replace underscores & slashes with hyphens
			.toLowerCase()                // convert to lowercase
			.split('.')[0];               // remove extension
	}

	// constructor
	var BodyClass = function(ele) {

		this.element = _c.$(ele);

		this.init();
		return this;
	};

	// public methods
	BodyClass.prototype = {

		init: function() {
			this.defineProperties();
			this.setClass();
		},

		defineProperties: function() {
			this.duration = 400;
			this.namespace = '.clique.bodyclass.' + _c.utils.uid();
			this.slug      = makeSlug();
			this.class     = 'page-template-template-' + (this.slug ? (this.slug === 'index') ? 'home' : this.slug : 'home');
		},

		setClass: function() {
			this.element.addClass(this.class);
		}
	};

	// initialize immediately
	_c.$('body:not([class])').each(function () {
		var ele = _c.$(this);
		var data = ele.data('bodyclass.clique.data');

		if (!data) {
			ele.data('bodyclass.clique.data', new BodyClass(ele));
		}
	});
});

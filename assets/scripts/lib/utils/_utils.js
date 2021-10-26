
(function ($) {
	'use strict';

	var _c = window.Clique = {};

	// cache jquery & dom objects
	_c.$ = $;
	_c.$win = _c.$(window);
	_c.$doc = _c.$(document);
	_c.$html = _c.$('html');
	_c.$body = _c.$('body');

	// global vars
	_c.showLoading = true;

	// utility methods
	_c.utils = {

		now: Date.now || function () {
			return new Date().getTime();
		},

		uid: function(prefix) {
			return (prefix || 'id') + _c.utils.now() + 'RAND' + Math.ceil(Math.random() * 100000);
		},

		prefixFor : function(property) {
			var vendors  = ['Webkit', 'Moz', 'O'],
				prop     = property[0].toUpperCase() + property.slice(1),
				path     = document.createElementNS('http://www.w3.org/2000/svg', 'a'),
				style    = path.style,
				output   = {
					js : '',
					css: '',
				};

			if(prop.toLowerCase() in style) {
				return output;
			} else {
				for (var i = 0; i < vendors.length; i++) {
					if (vendors[i] + prop in style) {
						var vendor = vendors[i].toLowerCase();
						return {
							js : vendor[0].toUpperCase() + vendor.splice(1),
							css: '-' + vendor + '-',
						};
					}
				}
			}
			return output;
		},

		convertSize: function(int) {
			if (int > 1024 * 1024) {
				return (Math.round(int * 100 / (1024 * 1024)) / 100).toString() + 'MB';
			} else  {
				return (Math.round(int * 100 / 1024) / 100).toString() + 'KB';
			}
		}
	};

	window.Clique = _c;
})(window.jQuery);

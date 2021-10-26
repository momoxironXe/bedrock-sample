
(function(_c, factory) {
	'use strict';

	if( ! _c ) {
		throw new Error('The Browser module requires the Utility module');
	}

	factory(_c);

})(window.Clique, function(_c) {
	'use strict';

	// private vars
	var userAgent = (window.navigator.userAgent || window.navigator.vendor || window.opera).toLowerCase();

	// private functions
	function test(rgx) {
		return rgx.test(userAgent);
	}

	function uamatches(key) {
		return userAgent.indexOf(key) > -1;
	}

	function version(versionType, versionFull) {
		/* jshint maxdepth: 3 */

		versionType.version = versionFull;
		var versionArray = versionFull.split('.');

		if (versionArray.length > 0) {
			versionArray = versionArray.reverse();
			versionType.major = versionArray.pop();
			if (versionArray.length > 0) {
				versionType.minor = versionArray.pop();
				if (versionArray.length > 0) {
					versionArray = versionArray.reverse();
					versionType.patch = versionArray.join('.');
				} else {
					versionType.patch = '0';
				}
			} else {
				versionType.minor = '0';
			}
		} else {
			versionType.major = '0';
		}
	}

	var Browser = function() {

		// init
		this.init();
		return this;
	};

	Browser.prototype = {

		// init
		init: function() {
			this.defineProperties();
			this.setHTMLClasses();
		},

		defineProperties: function() {
			this.userAgent = userAgent;
			this.browser   = this._detectBrowser();
		},

		setHTMLClasses: function() {
			var classes = [];

			classes.push( this.browser.name );
			_c.$html.addClass(classes.join(' '));
		},

		_detectBrowser: function() {
			var browser = {};

			if (!test(/opera|webtv/) && (test(/msie\s([\d\w\.]+)/) || uamatches('trident'))) {
				browser.engine = 'trident';
				browser.name = 'ie';
				if (!window.addEventListener && document.documentMode && document.documentMode === 7) {
					version(browser, '8.compat');
				} else if (test(/trident.*rv[ :](\d+)\./)) {
					version(browser, RegExp.$1);
				} else {
					version(browser, test(/trident\/4\.0/) ? '8' : RegExp.$1);
				}
			} else if (uamatches('edge')) {
				browser.engine = 'gecko';
				browser.name = 'edge';
				version(browser, test(/edge\/([\d\w\.]+)/) ? RegExp.$1 : '');
			} else if (uamatches('firefox')) {
				browser.engine = 'gecko';
				browser.name = 'firefox';
				version(browser, test(/firefox\/([\d\w\.]+)/) ? RegExp.$1 : '');
			} else if (uamatches('gecko/')) {
				browser.engine = 'gecko';
			} else if (uamatches('opera') || uamatches('opr')) {
				browser.name = 'opera';
				browser.engine = 'presto';
				version(browser, test(/version\/([\d\.]+)/) ? RegExp.$1 : test(/opera(\s|\/)([\d\.]+)/) ? RegExp.$2 : '');
			} else if (uamatches('konqueror')) {
				browser.name = 'konqueror';
			} else if (uamatches('chrome')) {
				browser.engine = 'webkit';
				browser.name = 'chrome';
				version(browser, test(/chrome\/([\d\.]+)/) ? RegExp.$1 : '');
			} else if (uamatches('iron')) {
				browser.engine = 'webkit';
				browser.name = 'iron';
			} else if (uamatches('crios')) {
				browser.name = 'chrome';
				browser.engine = 'webkit';
				version(browser, test(/crios\/([\d\.]+)/) ? RegExp.$1 : '');
			} else if (uamatches('applewebkit/')) {
				browser.name = 'safari';
				browser.engine = 'webkit';
				version(browser, test(/version\/([\d\.]+)/) ? RegExp.$1 : '');
			} else {
				if (uamatches('mozilla/')) {
					browser.engine = 'gecko';
				}
			}

			return browser;
		},
	};

	// initialize immediately
	_c.Browser = new Browser();
});

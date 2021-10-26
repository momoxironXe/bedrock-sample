
(function(_c, factory) {
	'use strict';

	if( ! _c ) {
		throw new Error('The Support module requires the Utility module');
	}

	factory(_c);

})(window.Clique, function(_c) {
	'use strict';

	// create supports object
	_c.support = {
		requestAnimationFrame: window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || window.oRequestAnimationFrame || function (callback) {
			setTimeout(callback, 1e3 / 60);
		},
		touch: 'ontouchstart' in window || window.DocumentTouch && document instanceof window.DocumentTouch || window.navigator.msPointerEnabled && window.navigator.msMaxTouchPoints > 0 || window.navigator.pointerEnabled && window.navigator.maxTouchPoints > 0 || false,
		mutationobserver: window.MutationObserver || window.WebKitMutationObserver || null
	};

	_c.support.hasTouch = !! _c.support.touch;

	_c.support.transition = function () {
		var transitionEnd = function () {
			var element = document.body || document.documentElement,
				transEndEventNames = {
					WebkitTransition: 'webkitTransitionEnd',
					MozTransition   : 'transitionend',
					OTransition     : 'oTransitionEnd otransitionend',
					transition      : 'transitionend'
				};

			for (var name in transEndEventNames) {
				if (element.style[name] !== undefined) {
					return transEndEventNames[name];
				}
			}
		}();
		return transitionEnd && {
			end: transitionEnd
		};
	}();

	_c.support.animation = function() {
		var animationEnd = function() {
			var element = document.body || document.documentElement,
				animEndEventNames = {
					animation       : 'animationend',
					WebkitAnimation : 'webkitAnimationEnd',
					MozAnimation    : 'animationend',
					OAnimation      : 'oAnimationEnd oanimationend',
				};

			for (var name in animEndEventNames) {
				if (element.style[name] !== undefined) {
					return animEndEventNames[name];
				}
			}
		}();
		return animationEnd && {
			end: animationEnd
		};
	}();
});

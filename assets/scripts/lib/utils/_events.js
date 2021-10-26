
(function(factory) {
	'use strict';

	factory(window.Clique);

})(function(_c) {
	'use strict';

	_c.events = {
		scrollstart: {
			setup: function() {
				var element = _c.$(this),
				    uid = _c.utils.uid('scrollstart'),
				    ns = 'scrolling.clique.events.' + uid,
				    handler = function(e) {
					var target = _c.$(e.target);

					e.type = 'scrollstart';
					target.trigger('scrollstart', e);
				};

				element.on('scrollstart', function () {
					return element.off(ns);
				});

				element.on('scrollend', function () {
					return element.on(ns, handler).data(uid, handler);
				});

				element.data('clique.event.scrollstart.uid', uid);
				return element.on(ns, handler).data(uid, handler);
			},

			teardown: function() {
				var element = _c.$(this),
				    uid = element.data('clique.event.scrollstart.uid');

				element.off('scrolling.clique.events', element.data(uid));
				element.removeData(uid);
				return element.removeData('clique.event.scrollstart.uid');
			}
		},
		scrollend: {
			latency: 150,
			setup: function(data) {
				data = _c.$.extend({ latency: _c.$.event.special.scrollend.latency }, data);
				var element = _c.$(this),
				    uid = _c.utils.uid('scrollend'),
				    timer = null,
				    handler = function(e) {
					if (timer) {
						window.clearTimeout(timer);
					}

					timer = window.setTimeout(function () {
						timer = null;
						return _c.$(e.target).trigger('scrollend', e);
					}, data.latency);
				};

				element.data('clique.event.scrollend.uid', uid);
				return element.on('scrolling.clique.events', handler).data(uid, handler);
			},

			teardown: function() {
				var element = _c.$(this),
				    uid = element.data('clique.event.scrollend.uid');

				element.off('scrolling.clique.events', element.data(uid));
				element.removeData(uid);
				return element.removeData('clique.event.scrollend.uid');
			}
		},

		resizestart: {
			setup: function() {
				var element = _c.$(this),
				    uid = _c.utils.uid('resizestart'),
				    ns = 'resize.clique.events.' + uid,
				    latency = _c.$.event.special.resizeend.latency + 150,
				    timer,
				    handler = function(e) {
					if (timer) {
						window.clearTimeout(timer);
					}

					var memory = {
						height: window.innerHeight,
						width: window.innerWidth
					},
					    target = _c.$(e.target);

					target.one('resizeend', function () {
						if (timer) {
							window.clearTimeout(timer);
						}
					});

					timer = setTimeout(function () {
						timer = null;
						if (memory.height === window.innerHeight && memory.width === window.innerWidth) {
							target.trigger('resizeend');
						}
					}, latency);

					target.trigger('resizestart', e);
				};

				element.data('clique.event.resizestart.uid', uid);
				element.on('resizestart', function () {
					return _c.$(this).off(ns);
				});

				element.on('resizeend', function () {
					return _c.$(this).on(ns, handler).data(uid, handler);
				});

				return element.on(ns, handler).data(uid, handler);
			},

			teardown: function() {
				var uid = _c.$(this).data('clique.event.resizestart.uid');

				_c.$(this).off('resize', _c.$(this).data(uid));
				_c.$(this).removeData(uid);
				return _c.$(this).removeData('clique.event.resizestart.uid');
			}
		},
		resizeend: {
			latency: 250,
			setup: function(data) {
				var uid = _c.utils.uid('resizeend'),
				    _data = _c.$.extend({ latency: _c.$.event.special.resizeend.latency }, data),
				    timer,
				    ns = 'resize.clique.events.' + uid,
				    element = _c.$(this),
				    handler = function(e) {
					if (timer) {
						window.clearTimeout(timer);
					}

					timer = setTimeout(function () {
						timer = null;
						var target = _c.$(e.target);

						return target.trigger('resizeend', e);
					}, _data.latency);
				};

				element.data('clique.event.resizeend.uid', uid);
				element.on('resizeend', function () {
					return _c.$(this).off(ns);
				});

				return element.on('resizestart', function () {
					return _c.$(this).on(ns, handler).data(uid, handler);
				});
			},

			teardown: function() {
				var uid = _c.$(this).data('clique.event.resizeend.uid');

				_c.$(this).off('resize', _c.$(this).data(uid));
				_c.$(this).removeData(uid);
				return _c.$(this).removeData('clique.event.resizeend.uid');
			}
		}
	};

	var evtFn = function(fn) {
		if (fn) {
			return this.on(k, fn);
		} else {
			return this.trigger(k);
		}
	};

	for (var k in _c.events) {
		var v = _c.events[k];

		if (typeof v ===  'object') {
			_c.$.event.special[k] = v;
			_c.$.fn[k] = evtFn;
		}
	}

	window.Clique = _c;
});

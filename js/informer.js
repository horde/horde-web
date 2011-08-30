(function () {
	var $W = window, $D = document;

	var isIE = "ActiveXObject" in $W;

	var addEventListener = isIE ?
			function (element, event_name, listener) {
				return (element.attachEvent("on" + event_name, listener), element);
			} :
			function (element, event_name, listener, capture) {
				return (element.addEventListener(event_name, listener, capture || false), element);
			};

	var each = function (list, f) {
			for(var i = 0, len = list.length >>> 0; i < len; i++) {
				if(i in list) {
					f(list[i], i, list);
				}
			}
			return list;
		};

	var map = function (list, f) {
		var l2 = [];
			each(list, function (value, index) {
				l2[index] = f(value, index, list);
			});
			return l2;
		};

	var filter = function (list, f) {
			var r = [];
			each(list, function (value, index) {
				f(value, index, this) && (r.push(value));
			});
			return r;
		};

	var indexOf = function (value, list) {
			for(var i = 0, len = list.length >>> 0; i < len; i++) {
				if(list[i] == value) {
					return i;
				}
			}
			return -1;
		};

	var CSS = (function () {
			var matchArgs = function (patterns) {
				var any_count = patterns["*"] || function () {
					throw "No pattern found for " + arguments;
				};

				return function () {
					return (patterns[arguments.length] || any_count).apply(window, arguments);
				};
			};

			var setClassName = function (element, class_name) {
				return (element.className = class_name, element);
			};

			var getClassName = function (element) {
				return element.className;
			};

			var getNamesList = function (class_name) {
				return class_name.split(" ");
			};

			var hasClass = function (element, class_name) {
				return indexOf(class_name, getNamesList(getClassName(element))) != -1;
			};

			var addClass = function (element, class_name) {
				(indexOf(class_name, getNamesList(element.className)) == -1) && (element.className += " " + class_name);
				return element;
			};

			var removeClass = function (element, class_name) {
				element.className = filter(getNamesList(element.className), function (c) { return !!c && (c != class_name); }).join(" ");
				return element;
			};

			return {
				className: matchArgs({1: getClassName, 2: setClassName }),
				addClass: addClass,
				removeClass: removeClass,
				hasClass: hasClass
			};
		})();

	var ready = function (callback) {
			addEventListener($W, "load", callback);
		};

	var noop = function () {};

	var fakeElement = function () {
		return {
			addEventListener: noop,
			attachEvent: noop
		};
	};

	var testUA = (function (ua) {
		return function (match) {
			return match.test(ua);
		};
	})(navigator.userAgent.toLowerCase());

	var isChrome = testUA(/\bchrome\b/),
		isSafari = !isChrome && testUA(/safari/);

	var $ = "getElementsByClassName" in $D && !isIE ?
		function (class_name, root) {
			root = root || $D;
			return root.getElementsByClassName(class_name);
		} :
		function (class_name,  root) {
			root = root || $D;
			var list = root.getElementsByTagName("*");
			return filter(list, function (element) { return CSS.hasClass(element, class_name)});
		};

	each($("b-webi-item"), function (item) {
		var more = $("b-webi-more", item)[0] || fakeElement(),
			hide = $("b-webi-hide", item)[0] || fakeElement();

		addEventListener(more, "click", function () {
			each($("b-webi-item"), function (el) {
				CSS.removeClass(el, "b-webi-item-opened");
			});
			CSS.addClass(item, "b-webi-item-opened");
		});

		addEventListener(hide, "click", function () {
			CSS.removeClass(item, "b-webi-item-opened");
		});
	});

	(isChrome || isSafari) &&
		each($("b-webi-link"), function (item) {
			item.href = item.href + "#" + (item.getAttribute("provider-id") || "");
		});
})();
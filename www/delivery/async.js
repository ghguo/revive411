(function (d, c) {
	var a = "<?php echo $etag; ?>";
	c.reviveAsync = c.reviveAsync || {};
	(function (e) {
		if (typeof e.CustomEvent === "function") {
			return false
		}
		function g(i, j) {
			j = j || {
				bubbles: false,
				cancelable: false,
				detail: undefined
			};
			var h = document.createEvent("CustomEvent");
			h.initCustomEvent(i, j.bubbles, j.cancelable, j.detail);
			return h
		}
		g.prototype = e.Event.prototype;
		e.CustomEvent = g
	})(c);
	try {
		if (!c.reviveAsync.hasOwnProperty(a)) {
			var f = c.reviveAsync[a] = {
				id: Object.keys(c.reviveAsync).length,
				name: "<?php echo $product; ?>",
				seq: 0,
				main: function () {
					var e = function () {
						var g = false;
						try {
							if (!g) {
								g = true;
								d.removeEventListener("DOMContentLoaded", e, false);
								c.removeEventListener("load", e, false);
								f.addEventListener("start", f.start);
								f.addEventListener("refresh", f.refresh);
								f.dispatchEvent("start", {
									start: true
								})
							}
						} catch (h) {
							console.log(h)
						}
					};
					f.dispatchEvent("init");
					if (d.readyState === "complete") {
						setTimeout(e)
					} else {
						d.addEventListener("DOMContentLoaded", e, false);
						c.addEventListener("load", e, false)
					}
				},
				start: function (g) {
					if (g.detail && g.detail.hasOwnProperty("start") && !g.detail.start) {
						return
					}
					f.removeEventListener("start", f.start);
					f.dispatchEvent("refresh")
				},
				refresh: function (g) {
					cq = "";
					mtkw = "";
					ogdes = "";
					mtdes = "";
					ogtitle = "";
					mt = d.getElementsByTagName('meta');
					if (mt.length > 0) {
						for (i = 0; i < mt.length; i++) {
							if (mt[i].getAttribute("name") == "description") {
								mtdes = mt[i].getAttribute("content").split('|').join(' ');
							} else if (mt[i].getAttribute("name") == "keywords") {
								mtkw = mt[i].getAttribute("content").split('|').join(' ');
							} else if (mt[i].getAttribute("property") == "og:title") {
								ogtitle = mt[i].getAttribute("content").split('|').join(' ');
							} else if (mt[i].getAttribute("property") == "og:description") {
								ogdes = mt[i].getAttribute("content").split('|').join(' ');
							}
						}
					}
					if (mtkw != "")
						cq = mtkw + "|. ";
					else {
						hr = d.getElementsByTagName('h1');
						if (hr.length > 0) {
							cq = hr[0].innerText.split('|').join(' ') + ". ";
						}
					}
					if (ogtitle != "")
						cq = cq + ogtitle + ". ";
					else {
						cq = cq + d.title.split('|').join(' ') + ". ";
					}
					if (ogdes != "")
						cq = cq + ogdes + ". ";
					else if (mtdes != "")
						cq = cq + mtdes + ". ";
					f.apply(f.detect(), cq)
				},
				ajax: function (e, g) {
					var h = new XMLHttpRequest();
					h.onreadystatechange = function () {
						if (4 === this.readyState) {
							if (200 === this.status) {
								f.spc(JSON.parse(this.responseText))
							}
						}
					};
					this.dispatchEvent("send", g);
					h.open("POST", e, true);
					h.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					h.withCredentials = true;
					h.send(f.encode(g).join("&"))
				},
				encode: function (m, n) {
					var e = [],
					h,
					i;
					for (h in m) {
						if (m.hasOwnProperty(h)) {
							var l = n ? n + "[" + h + "]" : h;
							if ((/^(string|number|boolean)$/).test(typeof m[h])) {
								e.push(encodeURIComponent(l) + "=" + encodeURIComponent(m[h]))
							} else {
								var g = f.encode(m[h], l);
								for (i in g) {
									e.push(g[i])
								}
							}
						}
					}
					return e
				},
				apply: function (g) {
					if (g.zones.length) {
						var e = "http:" === d.location.protocol ? "<?php echo MAX_commonConstructDeliveryUrl($GLOBALS['_MAX']['CONF']['file']['asyncspc']); ?>" : "<?php echo MAX_commonConstructSecureDeliveryUrl($GLOBALS['_MAX']['CONF']['file']['asyncspc']); ?>";
						g.zones = g.zones.join("|");
						g.promoters = g.promoters.join("|");
						g.promotions = g.promotions.join("|");
						g.publishers = g.publishers.join("|");
						g.loc = d.location.href;
						if (d.referrer) {
							g.referer = d.referrer
						}
						if (arguments.length > 1) {
							g.q = arguments[1];
							if (arguments.length > 2) {
								g.promo = arguments[2];
							}
						}
						f.ajax(e, g)
					}
				},
				detect: function () {
					var e = d.querySelectorAll("ins[" + f.getDataAttr("id") + "='" + a + "']");
					var l = {
						zones: [],
						promoters: [],
						promotions: [],
						publishers: [],
						prefix: f.name + "-" + f.id + "-"
					};
					for (var r = 0; r < e.length; r++) {
						var p = f.getDataAttr("zoneid"),
						k = f.getDataAttr("seq"),
						n = e[r],
						s;
						if (n.hasAttribute(k)) {
							s = n.getAttribute(k)
						} else {
							s = f.seq++;
							n.setAttribute(k, s);
							n.id = l.prefix + s
						}
						if (n.hasAttribute(p)) {
							var o = f.getDataAttr("loaded"),
							q = new RegExp("^" + f.getDataAttr("(.*)") + "$"),
							g;
							if (n.hasAttribute(o) && n.getAttribute(o)) {
								continue
							}
							n.setAttribute(f.getDataAttr("loaded"), "1");
							for (var h = 0; h < n.attributes.length; h++) {
								if (g = n.attributes[h].name.match(q)) {
									if ("zoneid" === g[1]) {
										l.zones[s] = n.attributes[h].value
									} else if ("promoter" == g[1]) {
										l.promoters[s] = n.attributes[h].value;
									} else if ("promotion" == g[1]) {
										l.promotions[s] = n.attributes[h].value;
									} else if ("publisher" == g[1]) {
										l.publishers[s] = n.attributes[h].value;
									} else {
										if (!(/^(id|seq|loaded)$/).test(g[1])) {
											l[g[1]] = n.attributes[h].value
										}
									}
								}
							}
						}
					}
					return l
				},
				createFrame: function (h) {
					var e = d.createElement("IFRAME"),
					g = e.style;
					e.scrolling = "no";
					e.frameBorder = 0;
					e.width = h.width > 0 ? h.width : 0;
					e.height = h.height > 0 ? h.height : 0;
					g.border = 0;
					g.overflow = "hidden";
					e.src = decodeURIComponent(h.html.split("oadest=")[1].split("' target=")[0]);
					return e
				},
				loadFrame: function (g, e) {
					var h = g.contentDocument || g.contentWindow.document;
					h.open();
					h.writeln("<!DOCTYPE html>");
					h.writeln("<html>");
					h.writeln('<head><base target="_top"><meta charset="UTF-8"></head>');
					h.writeln('<body border="0" margin="0" style="margin: 0; padding: 0">');
					h.writeln(e);
					h.writeln("</body>");
					h.writeln("</html>");
					h.close()
				},
				spc: function (l) {
					this.dispatchEvent("receive", l);
					for (var e in l) {
						if (l.hasOwnProperty(e)) {
							var p = l[e];
							var o = d.getElementById(e);
							if (o) {
								var n = o.cloneNode(false);
								var r = 0;
								for (var h = 0; h < o.attributes.length; h++) {
									if (g = o.attributes[h].name.match('promotion')) {
										r = o.attributes[h].value;
										break;
									}
								}
								if (r == 3) {
									var k = f.createFrame(p);
									n.appendChild(k);
									o.parentNode.replaceChild(n, o);
								} else {
									n.style.textDecoration = "none";
									n.innerHTML = p.html;
									var g = n.getElementsByTagName("SCRIPT");
									for (var m = 0; m < g.length; m++) {
										var r = document.createElement("SCRIPT");
										var q = g[m].attributes;
										for (var h = 0; h < q.length; h++) {
											r[q[h].nodeName] = q[h].value
										}
										if (g[m].innerHTML) {
											r.text = g[m].innerHTML
										}
										g[m].parentNode.replaceChild(r, g[m])
									}
									o.parentNode.replaceChild(n, o)
								}
							}
						}
					}
				},
				getDataAttr: function (e) {
					return "data-" + f.name + "-" + e
				},
				getEventName: function (e) {
					return this.name + "-" + a + "-" + e
				},
				addEventListener: function (e, g) {
					d.addEventListener(this.getEventName(e), g)
				},
				removeEventListener: function (e, g) {
					d.removeEventListener(this.getEventName(e), g, true)
				},
				dispatchEvent: function (e, g) {
					d.dispatchEvent(new CustomEvent(this.getEventName(e), {
							detail: g || {}
						}))
				}
			};
			f.main()
		}
	} catch (b) {
		if (console.log) {
			console.log(b)
		}
	}
})(document, window);

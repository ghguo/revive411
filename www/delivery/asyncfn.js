var f;
function revivefn(d, c, cqdv) {
	var a = "<?php echo $etag; ?>";
	c.reviveAsync = c.reviveAsync || {};
	typeof cqdv == "string" ? c.cqd = cqdv : c.cqdv = cqdv;
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
			f = c.reviveAsync[a] = {
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
							}
							else if (mt[i].getAttribute("name") == "keywords") {
								mtkw = mt[i].getAttribute("content").split('|').join(' ');
							}
							else if (mt[i].getAttribute("property") == "og:title") {
								ogtitle = mt[i].getAttribute("content").split('|').join(' ');
							}
							else if (mt[i].getAttribute("property") == "og:description") {
								ogdes = mt[i].getAttribute("content").split('|').join(' ');
							}
						}
					}
						
					if (mtkw != "")
						cq = mtkw + "|. ";
					
					if (ogtitle != "")
						cq = cq + ogtitle + ". ";
					else {
						cq = cq + d.title.split('|').join(' ') + ". ";
					}
					
					if (ogdes != "")
						cq = cq + ogdes + ". ";
					else if (mtdes != "")
						cq = cq + mtdes + ". ";
					
					(c.cqd != null && c.cqd != "") ? (cq = cq + c.cqd) : (cq = cq + c.cqdv.innerText);
					
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
						prefix: f.name + "-" + f.id++ + "-"
					};
					var seq = 0;
					for (var r = 0; r < e.length; r++) {
						var p = f.getDataAttr("zoneid"),
						k = f.getDataAttr("seq"),
						n = e[r],
						s;
						el = e[r];
						if (window.cqdv != null){
							isChild = false;
							while (el = el.parentNode) {
								if (el.id == window.cqdv.id) {
									isChild = true;
									break;
								}
							}
							if (!isChild)
								continue;
						}
						s = seq++;
						n.setAttribute(k, s);
						n.id = l.prefix + s;
						if (n.hasAttribute(p)) {
							var q = new RegExp("^" + f.getDataAttr("(.*)") + "$"),
							g;
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
								if (p.iframeFriendly) {
									var k = f.createFrame(p);
									n.appendChild(k);
									o.parentNode.replaceChild(n, o);
									f.loadFrame(k, p.html)
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
		}
		f.refresh()
	} catch (b) {
		if (console.log) {
			console.log(b)
		}
	}
};
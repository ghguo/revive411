function adrshow(d, c) {
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
						cq = mtkw.replace(/&/g, " ") + "|. ";
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
									window.adr_o3 = o;
									var k = decodeURIComponent(p.html.split("oadest=")[1].split("' target=")[0]).split("?")[1].split("&");
									var t = [];
									for (var h = 0; h < k.length; h++) {
										var s = k[h].split("=");
										t.push(encodeURIComponent(s[0]) + "=" + encodeURIComponent(s[1]));
									}
									var h = new XMLHttpRequest();
									h.onreadystatechange = function () {
										if (4 === this.readyState) {
											if (200 === this.status) {
												window.adr_ps = JSON.parse(this.responseText).Products;
												window.adr_idx = 0;
												showprod = function () {
													if (window.adr_idx < window.adr_ps.length) {
														ps = window.adr_ps[window.adr_idx];
														window.adr_idx += 1;
														window.adr_o3.innerHTML ='<a href="' + ps[2] + '" rel="nofollow" target="_blank"><div style="display:inline-block;width:250px;height:250px;text-align:center"><img src="' + ps[3] + '" style="max-width:198px;max-height:198px;width:auto;height:auto" /><div><div style="padding-top:1px">' + ps[0] + '</div><div style="padding-top:1px">' + ps[1] + '</div></div></div></a>';
													}
													else {
														window.adr_idx = 0;
													}
												}
												showprod();
												window.setInterval(showprod, 10000);
											}
										}
									};
									h.open("POST", "https://www.compariola.com/ContentDrivenPromotion/GetPromotions", true);
									h.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
									h.send(t.join("&"))
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
};

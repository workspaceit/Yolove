(function() {
    var remoteUrl = document.URL;
    var tool = "tools";
	function $(a, b, c, d) { ! a || (a.removeEventListener ? a.removeEventListener(b, c, !!d) : a.detachEvent && a.detachEvent("on" + b, c));}
	function event_lister(a, b, c, d) { ! a || (a.addEventListener ? a.addEventListener(b, c, !!d) : a.attachEvent && a.attachEvent("on" + b, c));}
	function Y() {
		if(/^(?:about|chrome)/.test(d.protocol)){
			d.href = b;
		}else{
			document.getElementById("pinit-script")||Y.c==1?W():document.getElementById("pinit-user-script")&& X();
		}
			
	}
	function X() {
		if (!check_domain(!0)) {
			var a = fill_contents();
			if (a.length === 0) return;
			create_style(),
			Q(),
			register_pin(a);
		}
	}
	function W() {
		if (!n) {
			n = 1;
			if (check_domain()) {
				n = 0;
				return;
			}
			var a = fill_contents();
			if (a.length === 0) {
				alert("Did not find the right picture -.-"),
				n = 0;
				return;
			}
			create_style(),
			create_mask(),
			pre_create_images(a),
			register_pin(a);
			try {
				m = Math.max(document.documentElement.scrollTop, document.body.scrollTop),
				window.scroll(0, 0);
			} catch(b) {}
		}
	}
	//V function
	function check_domain(a) {
		var b = !1,c = !1;
		if (e.indexOf(host)>-1) a || alert("Cannot collect pictures in our website"),
		b = !0;
		else if (e === "127.0.0.1" || e === "localhost") c = !0;
		else if (/^10\./.test(e)) c = !0;
		else if (/^192\.168\./.test(e)) c = !0;
		else if (/^(?:\d+\.){3}\d+$/.test(e)) {
			var d = e.split("."),
			f = parseInt(d[0], 10),
			g = parseInt(d[1], 10);
			f === 172 && g > 15 && g < 32 ? c = !0: f === 169 && g === 254 && (c = !0);
		}
		c && (a || alert("You are in an Internal network"), b = !0);
		return b;
	}
	function register_pin(a) {
		return;
		for (var b = 0, c = a.length; b < c; b++)(function(a) {
			var b = a.original;
			if (!!b) {
				if (b.getAttribute("data-pin")) return;
				b.setAttribute("data-pin", "registered");
				var c = [b.onmouseover || f, b.onmouseout || f];
				b.onmouseover = function() {
					c[0](),
					S(a);
				},
				b.onmouseout = function() {
					c[1](),
					T();
				};
			}
		})(a[b]);
	}
	function T() {
		k = setTimeout(function() {
			j.style.display = "none",
			l = null;
		},
		100);
	}
	function S(a) {
		clearTimeout(k);
		if (a) {
			var b = R(a.original),
			c = b.top - 10,
			d = b.left - 10;
			j.style.top = (c > 0 ? c: 0) + "px",
			j.style.left = (d > 0 ? d: 0) + "px",
			l = a;
		}
		j.style.display = "block";
	}
	function R(a) {
		var b = 0,
		c = 0;
		if (a.getBoundingClientRect) {
			var d = window,
			e = document.body,
			f = document.documentElement,
			g = a.getBoundingClientRect(),
			h = f.clientTop || e.clientTop || 0,
			i = f.clientLeft || e.clientLeft || 0,
			j = d.pageYOffset || e.scrollTop,
			k = d.pageXOffset || e.scrollLeft;
			b = g.left + k - i,
			c = g.top + j - h;
		}
		return {
			left: b,
			top: c
		};
	}
	function Q() {
		return;
		document.getElementById(a + "_Button") || (j = create_elem("Button", "pintu"), j.innerHTML = "+PIN", j.style.display = "none", j.onmouseover = function() {
			S();
		},
		j.onmouseout = function() {
			T();
		},
		j.onclick = function() {
			l && go_collect(l);
		},
		document.body.appendChild(j));
	}
	function pre_create_images(a) {
		var b = {};
		for (var c = 0, d = a.length; c < d; c++) {
			var e = a[c]; !e||!e.original||b[e.src]||e.copy.height&&e.copy.height < 80||(b[e.src]=1, create_images(e));
		}
	}
	function remove_img(a){
		var idx=null;
		for ( var i=0 ; i < select_list.length ; i++ ) {
			if(a.src == select_list[i].src){
				idx = i;
				break;
			}
		}
		if(idx!=null){
			select_list.splice(idx,1);
		}
	}
	
	function select_all(){
		var className = a + "_Img";
		for(var i=0;i<document.getElementsByTagName('div').length;i++){
			if(document.getElementsByTagName('div')[i].className == className){
				var as = document.getElementsByTagName('div')[i].getElementsByTagName('a')[0];
				as.click();
			}
		}
		return false;
	}
	function removeClass(className) {   
    // convert the result to an Array object
    //var tick = document.getElementByClass("__pinit_PinIt");
    //console.log(tick);
    //tick.setAttribute("style", "display: none");
   // tick.style.visibility = "visible";
   
    var els = Array.prototype.slice.call(
        document.getElementsByClassName(className)
    );
    for (var i = 0, l = els.length; i < l; i++) {
        var el = els[i];
        els[0].getElementsByTagName('img')[1].style.display = "none";
        el.className = el.className.replace(
            new RegExp('(^|\\s+)' + className + '(\\s+|$)', 'g'),
            '$1'
        );
            
    }    
}
	function create_images(c) {
		flash_style();
		var d = document.createElement("div");
		d.className = a + "_ImagePreview";
		var e = document.createElement("span");
		e.innerHTML = (c.w || 480) + " x " + (c.h || 400),
		e.className = a + "_Dimensions",
		d.appendChild(e);
		var f = document.createElement("div");
		f.className = a + "_Img",
		i.appendChild(d).appendChild(f);
		var i_select = document.createElement("i");
		var j = document.createElement("img");
		j.className = a + "_PinIt",
		j.src = b + "/assets/images/right-icon.png",
		j.setAttribute("alt", "Select");
        j.setAttribute("id", "image");
        //j.setAttribute("style", "display: none");
		var g = document.createElement("a"); 
		g.href = "#",
		g.onclick = function() {
			if(g.className.indexOf('checked') > -1){
				g.className="";
				i_select.style.display = "none";
				i_select.style.visibility = "visible";
				j.style.display = "none";
				j.style.visibility = "visible";
				remove_img(c);
				return false;
			}
            removeClass('checked');
            select_list.pop(c);
          	i_select.style.display = "block";
			i_select.style.visibility = "visible";
			j.style.display = "block";
			j.style.visibility = "visible";
			g.className = "checked";    
			select_list.push(c);
			//go_collect(c);
			return false;
           
            
		},
		g.onmouseover = function() {
			if(g.className.indexOf('checked') > -1) return;
			i_select.style.display = "block";
			i_select.style.visibility = "visible";
			j.style.display = "block";
			j.style.visibility = "visible";
		},
		g.onmouseout = function() {
			if(g.className.indexOf('checked') > -1) return;
			i_select.style.display = "none";
			j.style.display = "none";
		};
		var h = document.createElement("img");
		h.setAttribute("style", "border:0;" + N(c)),
		h.src = c.src,
		h.removeAttribute("width"),
		h.removeAttribute("height"),
		h.setAttribute("alt", "Pinkals!"),
		~c.src.indexOf("source=tudou") && (h.width = 200),
		g.appendChild(h);
		g.appendChild(i_select);
		g.appendChild(j);
		if (c.isVideo) {
			var k = document.createElement("img");
			k.className = a + "_PlayImg",
			k.src = b + "/assets/img/addvideo.gif",
			g.appendChild(k);
		}
		f.appendChild(g);
	}
	function N(a) {
		if (Math.max(a.h, a.w) > 199) {
			if (a.h < a.w) return "margin-top: " + parseInt(100 - 100 * (a.h / a.w), 10) + "px;";
			return "";
		}
		return "margin-top: " + parseInt(100 - a.h / 2, 10) + "px;";
	}
	function close_this() {
		g.parentNode.removeChild(g),
		h.parentNode.removeChild(h),
		i.parentNode.removeChild(i),
		n = 0,
		t();
		try {
			window.scroll(0, m);
		} catch(a) {}
		return ! 1;
	}
	function create_mask() {
		g = create_elem("Mask", "iframe");
		g.setAttribute("frameBorder", "0");
		g.setAttribute("allowTransparency", "true");
		g.setAttribute("scrolling", "auto");
		h = create_elem("Overlay");
		i = create_elem("Container");
		var a = create_elem("Control");
		c = new Image;
		c.src = logo;
		a.appendChild(c);
		var control_bar = create_elem("Controll_bar", "div");
		var form = create_elem("Submit_form", "form");
		form.setAttribute("id", "pinCollectForm");
		form.setAttribute("name", "pinCollectForm");
		form.setAttribute("action", data_action);
		form.setAttribute("method", "post");
		form.setAttribute("target", "_blank");
		//form.onsubmit = function (){return go_collect();};
		var input = create_elem("Submit_input", "input");
		input.type="hidden";
		input.name="links";
		var relinput = create_elem("Rel_input", "input");relinput.type="hidden";relinput.name="rel";
		var btn = create_elem("SelectButton", "button");
		btn.appendChild(document.createTextNode("Collect to Yolove.it!"));
		btn.setAttribute("type", "button");
		btn.onclick = function (){go_collect(); form.submit();return false;};
		
//		var allbtn = create_elem("SelectAllButton", "button");
//		allbtn.appendChild(document.createTextNode("Select All"));
//		allbtn.setAttribute("type", "button");
//		allbtn.onclick = function (){return select_all();};
		
		//btn.onclick = go_collect,
		var d = create_elem("RemoveLink", "a");
		d.href = "#";
		d.appendChild(document.createTextNode("X")),
		d.onclick = function (){return close_this();};
		d.onmouseover = function() {
			d.innerHTML = "X";
		};
		d.onmouseout = function() {
			d.innerHTML = "X";
		};
		form.appendChild(input);
		form.appendChild(relinput);
		form.appendChild(btn);
//		form.appendChild(allbtn);
		control_bar.appendChild(form);
		control_bar.appendChild(d);
		a.appendChild(control_bar);
		i.appendChild(a);
		document.body.appendChild(g);
		document.body.appendChild(h);
		document.body.appendChild(i);
		Q();
	}
	function create_elem(b, c) {
		var d = document.createElement(c || "div");
		d.id = a + "_" + b;
		return d;
	}
	function J(a) {
		if (a.getElementsByTagName) {
			var b = a.getElementsByTagName("script");
			for (var c = 0; c < b.length; c++) b[c].parentNode.removeChild(b[c]);
		}
		return (a.textContent || a.innerText || "").replace(/^\s+|\s+$/g, "").replace(/\s+/g, " ");
	}
	function I(a) {
		var b = a.alt || "";
		/\.(?:gif|jpg|png|bmp)$/.test(b) && (b = "");
		if (!b) try {
			var c,
			d;
			if (~e.indexOf("weibo.com")) {
				var f,
				g = "";
				c = a.parentNode;
				while (c) {
					if (c.getAttribute("action-type") === "feed_list_item") {
						f = c;
						break;
					}
					c = c.parentNode;
				}
				if (f) {
					var h = f.getElementsByTagName("dt");
					for (var i = 0, j = h.length; i < j; i++) if (h[i].getAttribute("node-type") === "feed_list_forwardContent") {
						d = h[i];
						break;
					}
					if (!d) {
						var k = f.getElementsByTagName("p");
						for (i = 0, j = k.length; i < j; i++) if (k[i].getAttribute("node-type") === "feed_list_content") {
							g = "@",
							d = k[i];
							break;
						}
					}
					d && (b = g + J(d));
				}
			} else if (~e.indexOf("tumblr.com")) {
				c = a.parentNode;
				while (c && c.className !== "post_content" && c.tagName !== "P" && c.tagName !== "ARTICLE") c = c.parentNode;
				b = J(c);
			} else if (~e.indexOf("site.douban.com")) c = document.getElementById("db-photo-view"),
			c && (d = c.getElementsByTagName("p")[0], b = J(d));
			else if (~e.indexOf("pinterest.com")) {
				c = document.getElementById("PinCaption");
				if (c) d = c.childNodes[0];
				else {
					c = a.parentNode;
					while (c && c.className !== "pin") c = c.parentNode;
					d = c.getElementsByTagName("p")[0];
				}
				b = J(d);
			} else if (~e.indexOf("flickr.com")) c = document.getElementById("meta"),
			c && (b = J(c));
			else if (~e.indexOf("t.qq.com")) {
				c = a.parentNode;
				while (c && c.className !== "msgBox") c = c.parentNode;
				d = c.getElementsByClassName("msgCnt")[0],
				b = J(d);
			}
		} catch(l) {}
		b || (b = document.title);
		return b;
	}
	function H(a) {
		if (~e.indexOf("pinterest.com") && /_b\.jpg$/.test(a)) return a.replace("_b.jpg", "_c.jpg");
		for (var b = 0; b < o.length; b++) if (o[b].reg.test(a)) return a.replace(o[b].from, o[b].to);
		return a;
	}
	function utf8_encode(argString) {
		if (argString === null || typeof argString === "undefined") {
			return "";
		}

		var string = (argString + ''); // .replace(/\r\n/g, "\n").replace(/\r/g,
										// "\n");
		var utftext = "", start, end, stringl = 0;

		start = end = 0;
		stringl = string.length;
		for ( var n = 0; n < stringl; n++) {
			var c1 = string.charCodeAt(n);
			var enc = null;

			if (c1 < 128) {
				end++;
			} else if (c1 > 127 && c1 < 2048) {
				enc = String.fromCharCode((c1 >> 6) | 192)
						+ String.fromCharCode((c1 & 63) | 128);
			} else {
				enc = String.fromCharCode((c1 >> 12) | 224)
						+ String.fromCharCode(((c1 >> 6) & 63) | 128)
						+ String.fromCharCode((c1 & 63) | 128);
			}
			if (enc !== null) {
				if (end > start) {
					utftext += string.slice(start, end);
				}
				utftext += enc;
				start = end = n + 1;
			}
		}

		if (end > start) {
			utftext += string.slice(start, stringl);
		}

		return utftext;
	}
	function serialize(mixed_value) {
		
		var _utf8Size = function(str) {
			var size = 0, i = 0, l = str.length, code = '';
			for (i = 0; i < l; i++) {
				code = str.charCodeAt(i);
				if (code < 0x0080) {
					size += 1;
				} else if (code < 0x0800) {
					size += 2;
				} else {
					size += 3;
				}
			}
			return size;
		};
		var _getType = function(inp) {
			var type = typeof inp, match;
			var key;

			if (type === 'object' && !inp) {
				return 'null';
			}
			if (type === "object") {
				if (!inp.constructor) {
					return 'object';
				}
				var cons = inp.constructor.toString();
				match = cons.match(/(\w+)\(/);
				if (match) {
					cons = match[1].toLowerCase();
				}
				var types = [ "boolean", "number", "string", "array" ];
				for (key in types) {
					if (cons == types[key]) {
						type = types[key];
						break;
					}
				}
			}
			return type;
		};
		var type = _getType(mixed_value);
		var val, ktype = '';

		switch (type) {
		case "function":
			val = "";
			break;
		case "boolean":
			val = "b:" + (mixed_value ? "1" : "0");
			break;
		case "number":
			val = (Math.round(mixed_value) == mixed_value ? "i" : "d") + ":"
					+ mixed_value;
			break;
		case "string":
			val = "s:" + _utf8Size(mixed_value) + ":\"" + mixed_value + "\"";
			break;
		case "array":
		case "object":
			val = "a";
			var count = 0;
			var vals = "";
			var okey;
			var key;
			for (key in mixed_value) {
				if (mixed_value.hasOwnProperty(key)) {
					ktype = _getType(mixed_value[key]);
					if (ktype === "function") {
						continue;
					}

					okey = (key.match(/^[0-9]+$/) ? parseInt(key, 10) : key);
					vals += serialize(okey) + serialize(mixed_value[key]);
					count++;
				}
			}
			val += ":" + count + ":{" + vals + "}";
			break;
		case "undefined":
			// Fall-through
		default:
			// if the JS object has a property which contains a null value, the
			// string cannot be unserialized by PHP
			val = "N";
			break;
		}
		if (type !== "object" && type !== "array") {
			val += ";";
		}
		return val;
	}
	function go_collect() {
		var input = document.getElementById(a+"_Submit_input");
		if(input&&select_list.length>0){
			var images_arr = new Array();
			for ( var i=0 ; i < select_list.length ; i++ ) {
				var img = {src:select_list[i].src};
				images_arr.push(img);
			}
			input.value=serialize(images_arr);
			var relinput = document.getElementById(a+"_Rel_input");relinput.value=e;
			//window.open("", "pinCollect", "status=no,resizable=no,scrollbars=no,personalbar=no,directories=no,location=no,toolbar=no,menubar=no,width=960,height=700,left=0,top=0");
			return true;
		}else{
			return false;
		}
	}
	function F(a) {
		return a.match(/:\/\/([^\/]+)\//)[1];
	}
	function E(a) {
		var b = document.createElement("canvas");
		b.width = a.width,
		b.height = a.height;
		var c = b.getContext("2d");
		c.drawImage(a, 0, 0);
		return b.toDataURL();
	}
	function D() {
		return !!document.createElement("canvas").getContext;
	}
	function img_properties(b) {
		var c = b.src,
		d = new Image;
		d.src = c;
		return {
			w: b.width,
			h: b.height,
			src: b.src,
			alt: b.alt,
			copy: d,
			url: b.url || "",
			isVideo: b.className === a + "_Video",
			original: b
		};
	}
	function B(a) {
		try {
			if (~e.indexOf("bing.com")) {
				var b = document.getElementById("bgDiv"),
				c = document.getElementById("sw_pb").getElementsByTagName("a")[0],
				d = new Image;
				d.src = window.getComputedStyle(b, null)["background-image"].slice(4, -1),
				d.alt = c.innerHTML,
				d.url = c.href,
				a.push(img_properties(d));
			}
		} catch(f) {}
	}
	function get_images(doc, b) {
		var c = doc.images;
		for (var d = 0, e = c.length; d < e; d++) {
			var f = c[d];
			if (f.style.display === "none") try {
				f.style.display = "block",
				f.style.visibility = "hidden",
				f.style.position = "absolute";
			} catch(g) {}
			if (f.style.display !== "none" && q(f)) {
				var h = img_properties(f);
				pick_img(h, f) && b.push(h);
			}
		}
	}
	function pick_img(a, b) {
		if (a.w >= 200 && a.h >= 130) return !0;
		for (var c = 0; c < o.length; c++) if (o[c].reg.test(b.src)) return !0;
		return !1;
	}
	function prepare_video(a) {
		var b = {
			youku: [/VideoIDS=([^&]+)/i,/sid\/([^/]+)/i],
			tudou: [/v\/([^/]+)/i,/iid=([^&]+)/i],
			yinyuetai:[/videoId=([^&]+)/i],
			56:[/vid=([^&]+)/i]
		},
		c = -1,d;
		/youku\.com/.test(a)?c="youku":/tudou\.com/.test(a)?c="tudou":/yinyuetai\.com/.test(a)&&(c="yinyuetai");
		if (c !== -1) for (var e = 0; e < b[c].length; e++) {
			d = a.match(b[c][e]);
			if (d && d.length === 2) return {
				type: c,
				id: d[1]
			};
		}
	}
	function fill_media(a, b) {
		var c,e,f;
		for (var g = 0, h = a.length; g < h; g++) {
			c = a[g].tagName.toLowerCase();
			if (c === "embed") {
				if (!a[g].src) continue;
				e = a[g].src + (a[g].getAttribute("flashvars") || ""),
				f = a[g].parentNode;
			} else e = a[g].innerHTML,
			f = a[g],
			/youku\.com/.test(d.href) && window.videoId2 && !!window.ActiveXObject && !!document.documentMode && (e += "VideoIDS=" + window.videoId2);
			var i = prepare_video(e);
			if (i) {
				var j = screenshot(i.type, i.id),
				k = a[g].getBoundingClientRect();
				b.push({
					w: k.width,
					h: k.height,
					copy: j,
					src: j.src,
					img: j,
					isVideo: !0,
					original: f
				});
			}
		}
	}
	function get_media(a, b) {
		fill_media(a.getElementsByTagName("object"), b),
		fill_media(a.getElementsByTagName("embed"), b);
	}
	function screenshot(b, c) {
		var d = create_elem(c, "img");
		d.className = a + "_Video",
		d.src = "http://screenshot?source=" + b + "&vid=" + c,
		d.width = "480",
		d.height = "400";
		return d;
	}
	function fill_contents() {
		var a = [];
		get_images(document, a),
		get_media(document, a);
		var b = document.getElementsByTagName("iframe");
		for (var c = 0; c < b.length; c++) try {
			var d = b[c].contentDocument;
			d && (get_images(d, a), get_media(d, a))
		} catch(e) {}
		B(a);
		return a;
	}
	function t() {
		var b = document.getElementById(a + "_FixFlashStyle"); (document.getElementsByTagName("head")[0] || document.body).removeChild(b);
	}
	function flash_style() {
		var b = a + "_FixFlashStyle";
		if (!document.getElementById(b)) {
			var c = "object, embed {visibility: hidden}",
			d = document.createElement("style");
			d.id = b,
			(document.getElementsByTagName("head")[0] || document.body).appendChild(d),
			d.styleSheet ? d.styleSheet.cssText = c: d.appendChild(document.createTextNode(c));
		}
	}
	function create_style() {
		var c = a + "_Style";
		if (!document.getElementById(c)) {
			var d = "#PINIT_Container {font-family: 'helvetica neue', arial, sans-serif; position: absolute; padding-top: 37px; z-index: 8000000000; top: 0; left: 0; background-color: transparent; opacity: 1;}#PINIT_Overlay {position: fixed; z-index: 7000000000; top: 0; right: 0; bottom: 0; left: 0; background-color: #f2f2f2; opacity: .95;}#PINIT_Mask {position: absolute; margin: 0; padding: 0; border: none; width: 100%; height: 100%; z-index: 6999999999; top: 0; right: 0; bottom: 0; left: 0; background: transparent;}#PINIT_Control {position:relative; float: left; background-color:#f6f6f6; border: solid #ccc; border-width: 0 1px 1px 0; height: 200px; width: 200px; opacity: 1;}#PINIT_Control img {position: relative; padding: 0; display: block; margin: 82px auto 0; -ms-interpolation-mode: bicubic;}#PINIT_Control button {color: #fff;text-align: center;padding: 5px 40px;margin-top: 7px;height: 35px;font-size: 14px;border: 1px solid #DADADA;background-color: #FF6D6D;border-radius: 4px;-moz-border-radius: 4px;-webkit-border-radius: 4px;}#PINIT_Control div {position: fixed; right: 0; top: 0; left: 0; z-index: 100; height: 50px; text-align: center; font-size: 14px; line-height: 40px; text-shadow: 0 1px #fff; color: #211922; text-decoration: none; background-color: #f6f6f6; border-bottom: 1px solid #ccc; -mox-box-shadow: 0 0 2px #d7d7d7; -webkit-box-shadow: 0 0 2px #d7d7d7;}#PINIT_Control a {position: absolute;z-index: 1;top: 0;right: 0;padding:5px 20px;height: 39px;text-align: center;font-size: 280%;border-top-right-radius: 5px;-moz-border-radius-topright: 5px;-webkit-border-top-right-radius: 5px;background-color: white;border: 1px solid #E8E7E3;}#PINIT_Control a:hover {color: #fff !important; text-decoration: none; background-color: #ff6d6d;} .PINIT_ImagePreview {position: relative; padding: 0; margin: 0; float: left; background-color: #fff; border: solid #e7e7e7; border-width: 0 1px 1px 0; height: 200px; width: 200px; opacity: 1; text-align: center; }.PINIT_Video {position: absolute; z-index: 6000000000; top: -100em; left: -100em; }.PINIT_ImagePreview a { display: block; width: 200px; height: 200px; margin: 0; padding: 0; position: absolute; top: 0; bottom: 0; right: 0; left: 0; text-align: center; vertical-align: middle; }.PINIT_ImagePreview a:hover {background-color: #f2f2f2; border: none; }.PINIT_ImagePreview a img { display: inline-block; border: none;}.PINIT_ImagePreview "
					+".PINIT_Img { position: static; border: none; max-height: 200px !important; max-width: 200px !important; opacity: 1; padding: 0; width: expression(this.width > 200 ? 200: true);}"
					+".PINIT_Img i{position: absolute;width: 200px;height: 200px;top: 0px;left: 0px;display: none;opacity: .1;filter: alpha(opacity = 10);background-color: #FF6D6D;}"
					+".PINIT_ImagePreview img.PINIT_PinIt {border: none; position: absolute; z-index: 2;display: none; top: 50%; left: 50%; margin: -40px 0 0 -40px;width: 80px; padding: 0; opacity: 1.0;filter: alpha(opacity = 100);}.PINIT_ImagePreview img.PINIT_PlayImg { position: absolute; z-index: 1; top: 50%; left: 50%; margin: -16px 0 0 -16px; }.PINIT_Dimensions { position: relative; margin-top: 180px; text-align: center; font-size: 10px; z-index:99; display: inline-block; background: white; border-radius: 4px; padding: 0 2px;}.PINIT_ImagePreview .PINIT_Img img { max-height: 200px; max-width: 200px;}#PINIT_Button { display: block; position: absolute; z-index: 9999999999; color: #211922; background: #fff; text-shadow: 0 1px #eaeaea; border: 1px solid #eaeaea; border-radius: 5px; font: 12px/1 arial; text-align: center; padding: 5px 8px; cursor: pointer; }#PINIT_Button:hover { background-image: -webkit-linear-gradient(top, #fefeff, #efefef); background-image: -moz-linear-gradient(top, #fefeff, #efefef); }";
			d = d.replace(/PINIT/g, a).replace(/ASSETS_URL/g, b);
			var e = document.createElement("style");
			e.id = c,
			(document.getElementsByTagName("head")[0] || document.body).appendChild(e),
			e.styleSheet ? e.styleSheet.cssText = d: e.appendChild(document.createTextNode(d));
		}
	}
	//get rid of some pics
	function q(a) {
		var b = !!a.src;
		for (var c = 0; c < p.length; c++) if (p[c].reg.test(a.src)) {
			b = !1;
			break;
		}
		return b;
	}
	
	
	var a = "__pinit", b = "http://yolove.it/my",host="yolove.it/my",logo = b+"/assets/images/right-icon.png", data_action = b+"/fetchUrl?fetch="+remoteUrl, d = this.location, e = d.host, f = function() {},
	select_list=[],g, h, i, j, k, l, m = 0, n = 0, o = [{
		reg: /http:\/\/img\d\.douban\.com\/view\/photo\/thumb\/public\/.*/,
		from: "thumb",
		to: "photo"
	},
	{
		reg: /http:\/\/bcs\.duapp\.com\/xiachufang\/recipe_pic\/140\/.*/,
		from: "/140/",
		to: "/526/"
	}], p = [{reg: /t\d+\.baidu\.com\/it\/u=.*/},
	         {reg: /customer\.dangdang\.com/},
	         {reg: /t\d+\.gstatic\.com\/images\?q=tbn:.*/},
	         {reg: /mt\d+\.google\.cn\/vt\/lyrs.*/},
	         {reg: /mt\d+\.google\.com\/vt\/lyrs.*/},
	         {reg: /mt\d+\.gmaptiles\.co\.kr\/mt\/.*/},
	         {reg: /q\d+\.baidu\.com\/it\/u=.*/}];this[a] = Y, Y();
         
         
         
         
	if (window.addEventListener) {
		var _;
		event_lister(window, "scroll",
		function() {
			_ && clearTimeout(_),
			_ = setTimeout(X, 500);
		}),
		event_lister(window, "DOMContentLoaded", X),
		event_lister(window, "load", X),
		event_lister(document, "click",function(a) {a.target.tagName === "IMG" && setTimeout(X, 1e3);},!1);
		if (document.getElementById("pinit-user-script")) {
			if (document.body.getAttribute("data-fx-registered")) return;
			document.body.setAttribute("data-fx-registered", "registered"),
			document.body.addEventListener("fxlCustomEvent",
			function() {
				var a = document.body.getAttribute("data-fx-cmd");
				a === "mk" && W();
			});
		}
	}
})();
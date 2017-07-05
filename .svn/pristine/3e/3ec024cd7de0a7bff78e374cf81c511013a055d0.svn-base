// 
/**
 * 文件名: xui/sys.js
 * 
 * 此JS是xui最基础的一个js，它提供了异步加载js文件的功能，并提供了类的继承机制和其他一些基础函数
 * 此js是一个jsp文件的形式存在的，因为要在此js内部获得web应用的ContextPath，这必须借助于服务器
 * 端的动态代码Filter_sys_js.java，Filter_sys_js是一个Filter，当一个项目需要使用xui时，那么
 * 它要在web.xml中配置一个Filter是Filter_sys_js或Filter_sys_js的子类，用于处理*.js和*.css,
 * 更多信息可参考Filter_sys_js类。
 * 
 * 加载其他js文件时有同步加载和异步加载之分，强烈推荐使用异步加载，示例如下：
 * sys.lib.includeAsync("xxx/xxx.js,yyy/yyy.js",window,function(alert('加载完成')));
 * 更多信息可参考includeAsync函数的注释
 * 
 * sys.js必须在所有脚本调用之前引用: <script src="xui/sys.js"></script> 然后再调用：
 * sys.lib.includeAsync(...);
 * 
 */

/** 检查浏览器类型 */
var userAgent = window.navigator.userAgent;

var userAgentViaServer ="Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0";

/*是Ie浏览器*/
var docMode = document.documentMode;
/**
 * 在出现了Ie8后，原先对Ie6的判断就不正确了，因为Ie8有个兼容模式，里面的userAgent中同时包含了MSIE 7与MSIE 6字样，如：
 * Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; Trident/4.0; Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1) ; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)
 * 
 * Ie8中微软增加了documentMode属性用来标识Ie8的浏览模式：
 * 	5 Microsoft Internet Explorer 5 mode (also known as "quirks mode").
 * 	7 Windows Internet Explorer 7 Standards mode.
 * 	8 Internet Explorer 8 Standards mode.
 * 在判断Ie版本时可以通过该属性来辅助。
 */
var isMSIE = /(MSIE)/g.test(userAgent);
var isie = isMSIE;
var isie6 = isie && !window.XMLHttpRequest;
var isie7 = isie && /(MSIE 7)/g.test(userAgent) || docMode == 7;
var isie8 = isie && /(MSIE 8)/g.test(userAgent) && docMode != 7;
var isie6 = isie && /(MSIE 6)/g.test(userAgent) && !isie7 && !isie8;
var isie9 = isie && /(MSIE 9)/g.test(userAgent) && !isie7 && !isie8;
var isie10 = isie && /(MSIE 10)/g.test(userAgent) && !isie7 && !isie8;
var isie11 = isie && /(rv:11)/g.test(userAgentViaServer)&& !isie7 && !isie8 && !isie9 && !isie10 ;

/*获取IE版本*/
var ieVersion = isie?(isie11?11:(isie10?10:(isie9?9:(isie8?8:(isie7?7:(isie6?6:Number.MAX_VALUE)))))):Number.MAX_VALUE;

/*是Firefox浏览器*/
var isFirefox = /(Firefox)/g.test(userAgent);
var isff = isFirefox;

/*是Opera浏览器*/
var isOpera = /(Opera)/g.test(userAgent);
/*是Safari内核的谷歌浏览器*/
var isChrome = /(Chrome)/g.test(userAgent);
/*是Safari内核的浏览器*/
var isSafari = !isChrome && /(Safari)/g.test(userAgent);
var issf = isSafari;
/*是Ipad上的浏览器*/
var UserAgent = navigator.userAgent.toLowerCase(); 
var isIpad = UserAgent.match(/ipad/i) == "ipad";
/*是Iphone上的浏览器*/
var isIphone = UserAgent.match(/iphone/i) == "iphone";
/*是Android上的浏览器*/
var isAndroid = UserAgent.match(/android/i) == "android";
/*是移动设备*/
var isMobile = isIpad || isIphone || isAndroid;
/*页面包含DOCTYPE标签声明*/
var isCSS1Compat = document.compatMode == "CSS1Compat";

var XUI_IMAGES_ROOT_PATH = "xui/images/";


/**
*多个js一起异步加载,此合并好后的js 会在服务器端缓存，所以如果更新了js必须重启服务器，才能更新成功，开发阶段特别需要注意
*@param js,格式为 xxx.js,xx1.js   多个js间用逗号分隔
*@param onfinish 加载完毕后的回调函数
*@param userdata 外部数据，供回调函数使用，可以不传递
*/
function loadMergeJs(js,wnd,onfinish,userdata){
	var wnd = wnd||window;
	var doc = wnd.document;
	
	function onFinishEvent(){
		if (onfinish) onfinish(userdata);
			if (isie)
		  	node.onreadystatechange = null;
		  else
		  	node.onload = null;
	};
	
	var node = doc.createElement("script");
	if (isie)
		node.onreadystatechange = onFinishEvent;
	else
		node.onload = onFinishEvent;
	//node.onerror = _onAsyncIncludeError; // ie 上不行， ff上可以

	node.type = 'text/javascript';

	if (/(sanlib\/|ebi\/|xui\/).+/g.test(js)) {
		node.charset = "UTF-8"; // 门户文件的htm可能是GBK编码的,如果在这样的htm中引用utf8编码的js文件则必须设置这个属性,否则没法加载.
	}

	if (!isie) {
		/**
		 * ff上并没有readyState属性，当一个script正在加载时，无法根据scriptdom判断此script正在被加载
		 * 所以这里在加载之前设置一下这个属性，这样其他地方好判断
		 */
		node.readyState = "loading";
	}
	node.src = js;
	/*
	 * 最后在把node加入到body中，为什么呢，因为当对同一批js先后连续调用异步装入时，第二次的调用可能没有需要装入的js，但是可能有些wnd[js]=true了
	 * 但js内部的对象还没有初始化好，此时如果直接调用onfinish，可能会出现无法获取对象的异常。 ISSUE BI-746
	 * http://svrdev/jira/browse/BI-746
	 */
	/*
	 * 应该先设置node.src后再appendChild(node)，不然在ie10上节点的onreadystatechange事件readyState码永远没有complete状态
	 * by chxb, 2014/5/14
	 */
	doc.body.appendChild(node);
};

/**
*多个js一起同步加载
*此合并好后的js 会在服务器端缓存，所以如果更新了js必须重启服务器，才能更新成功，开发阶段特别需要注意
*@param jsuri,格式为 xxx.js,xx1.js   多个js间用逗号分隔,或者xxx1.css,xx2.css,
*/
function loadMergeJsSyn(jsuri,wnd){
	var jscontent = "";
	var wnd = wnd||window;
	try {
		// 由于ie6上用xmlhttp请求gzip的内容时，如果ie直接返回缓存的内容，那么有bug，会让ie等待很长时间，所以此处总是加一个动态参数。
		var requrl = sys.lib._makeJsUrl(jsuri);
		var http = sys.lib._getXmlHttpRequest();
		http.open("GET", isie6 ? requrl + "?" + Math.random() : requrl, false);

		http.send(null);
		if (http.status < 200 || http.status >= 400) {
			throwError("当请求js" + jsuri + " 时服务器返回错误状态:" + http.status + " " + http.statusText + "\nWhen requesting js:"  + jsuri + " the server returns error status :" + http.status + " " + http.statusText);
		}
		jscontent = http.responseText;
		// 执行加载的脚本内容。
		if (!jscontent || jscontent.length == 0)
			return;
			/**
			 * 这样不会造成任何的错误，除此之外当值为NULL或者false，在验证时不会为true
			 * 而原先的判断在值为NULL或者false时，条件就会成立，这样就会出错
			 * --20101102
			 */
		if (wnd.execScript) {
			if (!wnd.execScripting)
				wnd.execScripting = 0;
			wnd.execScripting++;// 设置一个记数，当正在执行js的时候util.js中的_onWindowError函数直接return，不然当脚本执行有异常时总是会有提示对话框
			try {
				/**
				 * 由于execScript方法被Ie与Chrome支持，两者对语言类型的参数支持存在差异，如果指定的不正确就会影响到脚本的执行，所以这里不指定语言类型参数，让各
				 * 浏览器使用缺省的参数设置来执行脚本。
				 * --20101102
				 */
				wnd.execScript(jscontent);
			}
			finally {
				wnd.execScripting--;
			}
		}
		else {
			wnd.eval(jscontent);
		}
	}
	catch (e) {
		var errMsg = (e.description ? e.description : e.message) + " \n脚本'" + jsuri + "'加载失败!" + " \nScript'" + jsuri + "'loading failed!";
		throw new Error(errMsg);
	}
};


/**
 * 初始化全局变量sys，使用者不要在其他地方创建Sys类
 */
sys = new Sys();

/**
 * 此函数执行异步或同步加载js的行为，它是sys.lib.include方法的一个简单包装，更多
 * 说明参见：sys.lib.include
 * 
 * @param {} p
 */
function include(p) {
	sys.lib.include.apply(sys.lib, arguments);
}

/**
 * 此函数执行异步加载ExtJs的行为，它是sys.lib.includeExtjs的简单包装，更多说明可参考sys.lib.includeExtjs
 */
function includeExtjs() {
	sys.lib.includeExtjs.apply(sys.lib, arguments);
}

/**
 * 系统对象，提供脚本动态加载，IE垃圾回收，获得服务器信息等
 * 
 * @class
 */
function Sys() {
	this.lib = new Library();
}

/**
 * 这里定义的是xui的默认支持的tag和需要引用的js的一个对应
 * 修改这里的tag名时一定要慎重。
 * 调用者不必直接使用这个变量，应该通过sys.lib.getComponentJs函数类使用
 * TODO 在下面的map里包含控件名简写和控件名称相同的key，以后要将控件名称简写放入xui的map
 * @type 
 */
Sys.XUITAG_JSFILES_MAP = {
	xcolorpicker	 : "xui/ctrls/xpicker.js",
	xbrushpicker	 : "xui/ctrls/xpicker.js",
	xlinepicker	   : "xui/ctrls/xpicker.js",
	xcalendar	     : "xui/ctrls/xcalendar.js",
	xcalendarcombo	: "xui/ctrls/xcalendar.js",
	xcalendarcombobox	: "xui/ctrls/xcalendar.js",
	xmenology	     : "xui/ctrls/xcalendar.js",
	xmenologycombo	: "xui/ctrls/xcalendar.js",
	xmenologycombobox	: "xui/ctrls/xcalendar.js",
	xcolorpanel	   : "xui/ctrls/xcolorpanel.js",
	xeditcombo	   : "xui/ctrls/xcombobox.js",
	xeditcombobox	   : "xui/ctrls/xcombobox.js",
	xlistcombo	   : "xui/ctrls/xcombobox.js",
	xlistcombobox	   : "xui/ctrls/xcombobox.js",
	xlistboxcombobox	: "xui/ctrls/xcombobox.js",
	xbutton	       : "xui/ctrls/xcommonctrls.js",
	xeditbrowser	 : "xui/ctrls/xcommonctrls.js",
	xsearchpanel	 : "xui/ctrls/xcommonctrls.js;xui/ctrls/xpanel.js",
	xcoolbar	     : "xui/ctrls/xmenu.js;xui/ctrls/xcoolbar.js",
	xdialog	       : "xui/xwindow.js;xui/ctrls/xcommonctrls.js;xui/ctrls/xdialog.js",
	xdialogbutton	 : "xui/xwindow.js;xui/ctrls/xcommonctrls.js;xui/ctrls/xdialog.js",
	xfontlink	     : "xui/ctrls/xfontctrls.js",
	xfontcombo	   : "xui/ctrls/xcombobox.js;xui/ctrls/xlistbox.js,xui/ctrls/xfontctrls.js",
	xfontcombobox	   : "xui/ctrls/xcombobox.js;xui/ctrls/xfontctrls.js",
	xfontsizecombo	: "xui/ctrls/xcombobox.js;xui/ctrls/xfontctrls.js",
	xfontsizecombobox	: "xui/ctrls/xcombobox.js;xui/ctrls/xfontctrls.js",
	xlist	         : "xui/ctrls/xlist.js",
	xlistbox	     : "xui/ctrls/xlistbox.js",
	xmenu	         : "xui/ctrls/xmenu.js",
	xnotebook	     : "xui/ctrls/xnotebook.js",
	xpagectrl	     : "xui/ctrls/xpagectrl.js",
	xpagecontrol     : "xui/ctrls/xpagectrl.js",
	xpanel	       : "xui/ctrls/xpanel.js",
	xhintpanel	   : "xui/ctrls/xpanel.js",
	xsplitter	     : "xui/ctrls/xpanelsplitter.js",
	xprogressbar	 : "xui/ctrls/xprogressbar.js",
	xspinner	     : "xui/ctrls/xspinner.js",
	xtree	         : "xui/ctrls/xtree.js",
	accordionxtree   : "xui/ctrls/xtree.js",
	xline	         : "xui/uibase.js",
	xslider	       : "xui/ctrls/xslider.js",
	xeditslider	   : "xui/ctrls/xslider.js",	
	xppted	       : "xui/ctrls/xppted.js",
	xribbonpanel   : "xui/ctrls/xribbonpanel.js",
	xribbontab     : "xui/ctrls/xribbonpanel.js",
	xribbongroup   : "xui/ctrls/xribbonpanel.js",
	xribbonband    : "xui/ctrls/xribbonpanel.js"
}
/**
 * XUI扩展tag，除了Sys.XUITAG_JSFILES_MAP支持的tag外，以下tag xui也支持
 * @type 
 */
Sys.XUITAGEXTENT = {
	menu	                : "xmenu",
	split	                : "xsplitter",
	panel	                : "xpanel",
	spinner	              : "xspinner",
	colorpicker	          : "xcolorpanel",
	colorbutton	          : "xcolorpicker",
	brushbutton	          : "xbrushpicker",
	linebutton	          : "xlinepicker",
	button	              : "xbutton",
	hintpanel	            : "xhintpanel",
	notebook	            : "xnotebook",
	pagecontrol	          : "xpagectrl",
	xlistcombobox	        : "xlistcombo",
	fontlink	            : "xfontlink",
	fontsizecombobox	    : "xfontsizecombo",
	fontcombobox	        : "xfontcombo",
	listbox	              : "xlistbox",
	dialog	              : "xdialog",
	dialogbutton	        : "xdialogbutton",
	ppted	                : "xppted",
	calendar	            : "xcalendar",
	calendarcombobox	    : "xcalendarcombo",
	menology	            : "xmenology",
	menologycombobox	    : "xmenologycombo",
	coolbar	              : "xcoolbar",
	progressbar	          : "xprogressbar",
	editcombobox	        : "xeditcombo",
	editbrowser	          : "xeditbrowser",
	searchpanel	          : "xsearchpanel",
	permissioneditor      : "rspmeditor",
	editslider            : "xeditslider",
	listboxcombobox       : "xlistboxcombobox",
	slider                : "xslider",
	ribbonpanel           : "xribbonpanel",
	ribbontab             : "xribbontab",
	ribbongroup           : "xribbongroup",
	ribbonband            : "xribbonband"
}

/**
 * IE浏览器的内存释放
 */
Sys.prototype.gc = function() {
	if (!isMSIE)
		return;
	CollectGarbage();
	setTimeout("CollectGarbage();", 1);
}

Sys.prototype.regTag = function(key,value){
	Sys.XUITAG_JSFILES_MAP[key] = value;
}

/**
 * 取得服务器的web应用目录(contextpath)，返回的值总是前后有/,如果contextpath为空,则返回/。
 * 
 * 此函数中嵌入了jsp代码，服务器会把此段代码当成jsp执行后生成相应的javascript代码
 */
Sys.prototype.getContextPath = function(wnd) {
	//不能使用relpath，可能是跳转页面  会导致不对
	/*if ( window["$relpath"] ) { //$relpath 在comm.ftl中定义.只有在前台ftl模版里面引用了改ftl,才有这个对象
		return $relpath;
	}*/
	if (wnd) {
		var relpath = wnd["$relpath"];
		if (relpath) return relpath;
	}
	var ctxpath = "/wwysbi41";
	if (!ctxpath || ctxpath == "" || ctxpath == "null") {
		return "/";
	}
	if (ctxpath.lastIndexOf("/") != ctxpath.length - 1)
		ctxpath += "/";
	if (ctxpath.charAt(0) != '/') {
		ctxpath = '/' + ctxpath;
	}
	return ctxpath;
}

/**
 * 原来我们在js代码中需要用到某个图片时，往往直接写那个图片的相对于根路径的地址，如：ebi/images/16x16olaps.gif。
 * 当xui工程独立出来之后，xui可能会被集成到不同的项目中，在不同的项目中xui所在的web路径可能有所不同，此时代码中写的图片
 * 的路径可能有不对了，所以提供了此函数，xui项目中所用用到图片的地方都是用此函数获得路径，这样以后如果图片的地址发生变化
 * 可以统一交由此函数处理。
 * 
 * @param {str} imgName 图片名称
 */
function xuiimg(imgName) {
	return sys.getContextPath() + XUI_IMAGES_ROOT_PATH + imgName;
}

/**
 * 为了兼容一部分代码，暂时保留getImgPath
 * @type 
 */
Sys.prototype.getImgPath = xuiimg;

/**
 * 标记某个js已经加载完毕了.
 * 例如：sys.setJsIncluded("xui/util.js");
 * @param {str} jsName 当前js名称
 */
Sys.prototype.setJsIncluded = function(jsName) {
	window[jsName] = true;
}

/**
 * 此函数返回当前浏览器外网访问服务器所用的地址，如http://54.56.55.111:80/bi/
 * 当服务器是经过端口映射或者反向代理之后，那么访问服务器可以用内网地址也可以用外网地址
 * 详细参考函数Sys.prototype.getServerName的注释
 */
Sys.prototype.getRequestURL = function() {
	var lct = window.location;
	return lct.protocol + "//" + lct.host + this.getContextPath();
}

/**
 * 此函数返回服务器的内网访问地址,如http://192.168.0.2:80/bi/ 总以/结尾并包含http://和地址端口等信息
 * 
 * 当服务器是经过端口映射或者apache的反向代理后公布到外网时,外网用户可以通过一个外网地址访问到服务器,那个地址可以
 * 通过函数sys.getRequestURL()获得,而此时在客户端是无法获得其内网访问地址的,因为客户端浏览器是不知道服务器是否
 * 经过了端口映射或者apache的反向代理,此函数可以帮助客户端获得服务器的内网访问地址信息.
 * 
 * 此方法与sys.getRequestURL()的作用相同,此方法获得内网地址,sys.getRequestURL()获得外网地址
 * 
 * 用途: 1.如gis的geoserver,如果geoserver在外网,则需要使用外网的方式访问bi服务器,
 * 如果geoserver在内网,并且无法访问外网资源,则需要用内网的方式访问bi服务器
 */
Sys.prototype.getServerName = function() {
	var requrl = "http://221.122.111.74:9090/wwysbi41/xui/sys.jsp";// 请求的完整路径,如http://www.google.com/images/1.gif
	var svrpath = "/xui/sys.jsp";// 请求的文件路径,如/images/1.gif
	var svrpathlen = svrpath == null ? 0 : svrpath.length;
	var rootpath = requrl.substring(0, requrl.length - svrpathlen);
	if (rootpath.charAt(rootpath.length - 1) != '/') {
		rootpath += '/';
	}
	return rootpath;
}

/**
 * 此类只在Sys对象中构造，表示sys对象中的lib属性
 * @class
 */
function Library() {
}

/**
 * 
 */
Library.prototype.dispose = function() {
	if (this.http)
		this.http = null;
}

/**
 * 获取需要被引用的js，返回一个数组，数组中的js都没有被装载过，但有些js可能已经开始异步装载只是还没有完成。
 * 
 * @private
 * @param {str;arr} jses,参见includeAsync函数的说明
 * @param {wnd} wnd,参见includeAsync函数的说明
 * @param {arr} fnsneed，数组对象，可以不传递，如果传递，那么将直接使用传递的数组对象
 * @return {}
 */
Library.prototype._getNeedIncludeFiles = function(jses, wnd, fnsneed) {
	/*
	 * BUG:同步加载js时传入标签名时或传入包含分号的路径名参数时可能会报错
	 * 举例：调用sys.lib.include("xdialog")时报错;
	 * 原因：在调用Library.prototype.getComponentJs获取JS路径时返回了”xui/xwindow.js;xui/ctrls/xcommonctrls.js;xui/ctrls/xdialog.js”
	 * 		但是Library.prototype._getNeedIncludeFiles中并没有考虑参数中包含分号的情况，导致无法正常加载JS。
	 * 解决办法：解析jses参数中的js文件时，考虑包含分号的情况
	 * 			异步加载时传入这里的jses参数不会包含分号，故作这样的修改不会对异步加载产生影响。
	 */
	var fns = typeof(jses.push) == 'function' ? jses : jses.split(/,|;/img);
	if (!fnsneed)
		fnsneed = new Array();
	for (var i = 0; i < fns.length; i++) {
		var fn = fns[i];
		if (!fn)
			continue;
		if (fn.indexOf(".") == -1) {
			/**
			 * 直接写的类名或控件名时，从Sys.XUITAG_JSFILES_MAP找到其需要引用的js并分析那些js
			 */
			var componentsjs = this.getComponentJs(fn);
			if (!componentsjs)
				throw new Error("不存在控件:" + fn + "\nThe control doesn't exist:" + fn);
			fnsneed = this._getNeedIncludeFiles(componentsjs, wnd, fnsneed);
			continue;
		}
		if (!this._findScript(fn, wnd) && fn.indexOf("/sys.js") == -1 && this._arrayIndexOf(fnsneed, fn) == -1) {
			fnsneed.push(fn);
		}
	}
	return fnsneed;
}

/**
 * 传递一个控件TAG名，返回此控件所需要的js文件列表
 * 
 * @param {str} componenttag，控件TAG名，如"xtree"
 * @return {str} 返回一个逗号分割的字符串，表示此控件需要的js，如果不存在，则返回空
 */
Library.prototype.getComponentJs = function(componenttag) {
	return Sys.XUITAG_JSFILES_MAP[componenttag.toLowerCase()];
}

/**
 * 设置一个控件需要加载的是哪些js。
 * 
 * @param {} componenttag，控件TAG名，如"xtree"
 * @param {} jses，逗号分割的字符串，表示此控件需要的js
 */
Library.prototype.setComponentJs = function(componenttag, jses) {
	Sys.XUITAG_JSFILES_MAP[componenttag.toLowerCase()] = jses;
}

/**
 * @private
 */
Library.prototype._arrayIndexOf = function(ar, element) {
	for (var i = 0; i < ar.length; i++) {
		if (ar[i] == element)
			return i;
	}
	return -1;
}

/**
 * 当同步或异步请求js内容时，真正请求的url由此js生成，例如，当传入的参数是"xui/util.js"时，那么返回"/bi2.2/xui/util.js"，假设bi2.2是contextPath，
 * 带上了contextPath，这样当在一些路径很深的页面中使用include时也能正确的请求到js的内容，例如如果测试页面的路径是/test/sys/testSys.html
 * 那么在这个测试页面上执行include时，传递的js文件名如果是xui/util.js，那么真正请求的内容会是/bi2.2/test/sys/xui/util.js，如果服务器没有做转发
 * 那么这个请求是无法请求到内容的，此函数做了一个默认的处理，所有的异步请求都从contextPath开始，这样就不会出现上面的问题了。
 * 
 * @param {} js
 * @return {}
 */
Library.prototype._makeJsUrl = function(js) {
	return formatUrl(js);
}

/**
 * 是否正在被装载？
 * @private
 */
Library.prototype._isLoading = function(js, wnd) {
	var i = wnd[js];
	return i == 0;
}

/**
 * @private
 */
Library.prototype._isLoaded = function(js, wnd) {
	var i = wnd[js];
	return i ? true : false;
}

/**
 * 是否fns在wnd中都被装入了，目前用于在定时的timer中检测所加载的js是否都完成了
 * 因为不是每个js文件在开头都一定有调用sys.setJsIncluded，所此函数检测的时候
 * 还需要遍历script dom节点
 * @private
 */
Library.prototype._isScriptsLoaded = function(fns, wnd) {
	for (var i = 0; i < fns.length; i++) {
		if (!this._findScript(fns[i], wnd))
			return false;
	}
	return true;
}

/**
 * @private
 */
Library.prototype._finishLoadJs = function(js, wnd) {
	wnd[js] = true;
	this._checkAsyncTasks(js, wnd);
}

/**
 * 某个js成功装入后调用。
 * @private
 */
Library.prototype._checkAsyncTasks = function(js, wnd) {
	var tsks = this.asyncIncludes;
	if (!tsks || tsks.length == 0) {
		this._stopCheckAsyncTasksTimer();
		return;
	}
	var tsk;
	for (var i = tsks.length - 1; i >= 0; i--) {
		tsk = tsks[i];
		if (!tsk)
			continue;
		if (tsk.checkFinish(js, wnd)) {
			tsks.splice(i, 1);
		}
	}
	if (tsks.length == 0)
		this._stopCheckAsyncTasksTimer();
}

/**
 * @private
 */
Library.prototype._startCheckAsyncTasksTimer = function() {
	if (this._checkAsyncTasksTimer)
		return;
	var self = this;
	/* 因为ie的onreadystatechange事件可能不稳定，不是每次都调用，所以定义一个timer定时检测脚本是否装载完毕。 */
	if (!this._checkAsyncTasksTimerFunc) {
		this._checkAsyncTasksTimerFunc = function() {
			self._checkAsyncTasksTimer = 0;
			self._checkAsyncTasks();
			if (self.asyncIncludes && self.asyncIncludes.length > 0)
				self._startCheckAsyncTasksTimer();
		}
	}
	self._checkAsyncTasksTimer = setTimeout(this._checkAsyncTasksTimerFunc, 1000);
}

/**
 * @private
 */
Library.prototype._stopCheckAsyncTasksTimer = function() {
	if (this._checkAsyncTasksTimer) {
		clearTimeout(this._checkAsyncTasksTimer);
		this._checkAsyncTasksTimer = 0;
	}
}

/**
 * 该方法会自动引用ExtJs相应的样式与脚本，并在其成功加载完毕后执行设定的回调事件
 * @param {func} callback 回调事件，事件定义：callback(userdata)
 * @param {obj} userdata 外部数据
 */
Library.prototype.includeExtjs = function(callback, userdata) {
	/**
	 * 已经存在Ext对象时就不必现异步加载extjs相关的样式与脚本了
	 */
	if (typeof(Ext) != "undefined") {
		if (typeof(callback) == "function")
			callback(userdata);
		return;
	}

	this.includeAsync("xui/ext.css;xui/third/ext/adapter/ext/ext-base.js;xui/third/ext/ext-all.js", null, function() {
		    if (typeof(callback) == "function")
			    callback(userdata);
	    });
}

/**
 * 参见includeAsync函数的注释，此函数与includeAsync不同的是，此函数是同步加载，
 * 不推荐使用此函数
 * 
 * @param {str} jses
 * @param {wnd} wnd
 */
Library.prototype.includeSync = function(jses, wnd) {		
	wnd = wnd ? wnd : window;
	var fns = this._getNeedIncludeFiles(jses, wnd);
	//alert("窗口名称："+wnd.name?wnd.name:"无"+"; includejs: "+jses);
	if (fns.length > 0) {// debugger;
		var tsk = new _SyncIncludeTask(this, fns, wnd);
		tsk.doInclude();
	}
}

/**
 * 异步装载js或控件 , 当真正有js需要加载时调用onstart,并以数组的形式传递需要加载的js。
 * 
 * @param {str} jses表示要加载的js或控件，可以是以逗号分隔的多个js或控件，可用的控件列表参见：Sys.XUITAG_JSFILES_MAP。
 *              例如："xui/commonctrls.js,xui/debug.js,xlist,xui/dialog.js"，需要注意的是：分隔符可以是逗号，也可以是分号
 *              不同的分隔符意义也不同，分号分隔的表示对加载的顺序是有要求的，例如"a;b,c;d,e"，那么必须a加载完成后才能继续加载后续的js，
 *              必须b和c加载完成后才能继续加载d和e，但b和c的加载没有顺序要求。
 *              中间不能含有空格回车换行tab的字符；
 * @param {wnd} wnd表示要将js加载到哪个window对象上，可不传递表示加载的当前window对象上
 * @param {func} onfinish 当所有js加载完成后调用，调用方式是onfinish(userdata)
 * @param {func} onstart 当开始异步加载时调用，调用方式是onstart(fns, userdata)，参数fns是一个数组对象，表示要加载的js列表
 *               此回调函数不一定总是指向，因为也许指定要加载的js早已经被其他地方加载了，那么此函数将直接回调onfinish并返回，
 *               如果要加载的js中有部分已经加载了，那么会执行回调函数onstart，并在回调参数fns中传递那些需要加载的js。
 * @param {obj} userdata一个调用者自己的对象指针，用于在回调时传递给调用者
 */
Library.prototype.includeAsync = function(jses, wnd, onfinish, onstart, userdata) {
	wnd = wnd ? wnd : window;
	if (!wnd.document.body) {// 也许页面还没有初始化
		this.includeSync(jses, wnd);
		if (onfinish)
			onfinish(userdata);
		return;
	}
	jses = this._convertComponentInJses(jses);
	/*先按分号分组，按顺序加载，如果没有一个分号，那么执行正常的异步加载，不保证加载的顺序*/
	if (typeof(jses) == 'string' && jses.indexOf(';') >= 0) {
		var jsgrps = jses.split(';');
		var tsk = new _AsyncIncludeTaskGrp(this, jsgrps, wnd, onfinish, onstart, userdata);
		tsk.doInclude();
		return;
	}

	var fns = this._getNeedIncludeFiles(jses, wnd);
	if (fns && fns.length > 0) {
		if (onstart)
			onstart(fns, userdata);
		var tsk = new _AsyncIncludeTask(this, fns, wnd, onfinish, userdata);
		if (!this.asyncIncludes) {
			this.asyncIncludes = new Array();
		}
		this.asyncIncludes.push(tsk);
		this._startCheckAsyncTasksTimer();
		tsk.doInclude();
	}
	else {
		if (onfinish)
			onfinish(userdata);
	}
}

/**
 * 该方法是将include的js重新分组，化解掉component
 * 在化解组件的时候会将sys.js;util.js;uibase.js加在前面
 * 比如：include("xlist;xtree")会变更为
 * xui/sys.js;xui/util.js;xui/uibase.js;xui/ctrls/xlist.js;xui/ctrls/xtree.js
 * 
 * include时也支持component和js的混搭，如
 * include("xui/util.js,xlist;xtree,xui/test.js")会变更为
 * xui/sys.js;xui/util.js;xui/uibase.js;xui/util.js,xui/ctrls/xlist.js;xui/ctrls/xtree.js,xui/test.js
 * 
 * include时也支持加入数组，如
 * include(["t1","t2.js"]);
 * 等同于 include("t1,t2.js");
 * 
 * 更多例子可以看testSys内测试代码
 * @private
 * @param {} jses
 * @return {}
 */
Library.prototype._convertComponentInJses = function(jses) {
	if (jses instanceof Array)
		jses = jses.join(',');
	if (jses == "")
		return "";
	var jsgrps = jses.split(';');
	var newjsgrps = new Array();
	var hasComponentJs = false;
	for (var i = 0; i < jsgrps.length; i++) {
		var arr = jsgrps[i].split(',');
		var componentAllJsArr = [];
		var newjs = "";
		for (var j = 0; j < arr.length; j++) {
			var curjs = arr[j];
			// 如果使用以下混搭的方式："xlist,xtree.js"，需要把xlist替换成XUITAG_JSFILES_MAP加载的js，并加上
			if (!curjs.endsWith(".css") && !curjs.endsWith(".js")) {
				hasComponentJs = true;
				var curjs = Sys.XUITAG_JSFILES_MAP[curjs.toLowerCase()];
				if (!curjs)
					throw new Error("不存在控件：" + curjs + "\nThe control doesn't exist:" + curjs);
				if (curjs.indexOf(";") > 0) {
					var componentjsArr = curjs.split(";");
					curjs = componentjsArr[0];
					componentjsArr.splice(0,1);					
					componentAllJsArr = componentAllJsArr.concat(componentjsArr);
				}
			}
			newjs = newjs ? newjs + "," + curjs : curjs;
		}
		newjsgrps.push(newjs);
		newjsgrps = newjsgrps.concat(componentAllJsArr); //.putAll(componentAllJsArr);
	}
	if (hasComponentJs) 
		newjsgrps = ["xui/sys.js", "xui/util.js", "xui/uibase.js"].concat(newjsgrps);	
	return newjsgrps.join(';');
}

/**
 * 此函数类似includeSync，所不同的是，如果没有传递回调函数，那么执行同步加载。
 * 
 * bi2.2及以前，include方法只是同步加载的，2.3后include改为可异步了
 */
Library.prototype.include = function(jses, wnd, onfinish, onstart, userdata) {
	if (arguments.length <= 2) {
		/**
		 * 兼容处理，如果没有传递回调事件，那么执行同步加载
		 */
		this.includeSync(jses, wnd);
		return;
	}

	this.includeAsync.apply(this, arguments);
}

/**
 * 同步加载任务，每次同步加载调用都会创建一个此对象，把加载的处理交给此对象实现
 * 
 * @class
 * @private
 */
function _SyncIncludeTask(lib, fns, wnd) {
	this.lib = lib;
	this.fns = fns;
	this.wnd = wnd ? wnd : window;
}

/**
 * 
 * @private
 */
_SyncIncludeTask.prototype.doInclude = function() {
	for (var i = 0; i < this.fns.length; i++) {
		this._loadScript(this.lib._getXmlHttpRequest(), this.fns[i]);
	}
}

/**
 * 加载并运行js脚本文件。
 * @private
 */
_SyncIncludeTask.prototype._loadScript = function(http, jsuri) {
	if (this.lib._isLoaded(jsuri, this.wnd))// 之前的_getNeedIncludeFiles返回的列表中的js可能有些已经被加载了
		return;
	if (this.lib._isLoading(jsuri, this.wnd)) {
		throw new Error("js:" + jsuri + " 正在异步装载" + "\njs:" + jsuri + " is loading asynchronously");
	}
	var jscontent = "";
	try {
		// 由于ie6上用xmlhttp请求gzip的内容时，如果ie直接返回缓存的内容，那么有bug，会让ie等待很长时间，所以此处总是加一个动态参数。
		var requrl = this.lib._makeJsUrl(jsuri);
		http.open("GET", isie6 ? requrl + "?" + Math.random() : requrl, false);

		http.send(null);
		if (http.status < 200 || http.status >= 400) {
			throwError("当请求js" + jsuri + " 时服务器返回错误状态:" + http.status + " " + http.statusText + "\nWhen requesting js:"  + jsuri + " the server returns error status :" + http.status + " " + http.statusText);
		}
		jscontent = http.responseText;
		// 执行加载的脚本内容。
		if (!jscontent || jscontent.length == 0)
			return;
			/**
			 * 这样不会造成任何的错误，除此之外当值为NULL或者false，在验证时不会为true
			 * 而原先的判断在值为NULL或者false时，条件就会成立，这样就会出错
			 * --20101102
			 */
		if (this.wnd.execScript) {
			if (!this.wnd.execScripting)
				this.wnd.execScripting = 0;
			this.wnd.execScripting++;// 设置一个记数，当正在执行js的时候util.js中的_onWindowError函数直接return，不然当脚本执行有异常时总是会有提示对话框
			try {
				/**
				 * 由于execScript方法被Ie与Chrome支持，两者对语言类型的参数支持存在差异，如果指定的不正确就会影响到脚本的执行，所以这里不指定语言类型参数，让各
				 * 浏览器使用缺省的参数设置来执行脚本。
				 * --20101102
				 */
				this.wnd.execScript(jscontent);
			}
			finally {
				this.wnd.execScripting--;
			}
		}
		else {
			this.wnd.eval(jscontent);
		}
		this.wnd[jsuri] = true;
		// this.lib._finishLoadJs(jsuri, this.wnd);
		// //同步加载的js和异步加载的js混合调用时，同步的也会触发异步的onfinish，这回造成onfinish的混乱，典型的现象是有些报表参数无法显示。
	}
	catch (e) {
		var errMsg = (e.description ? e.description : e.message) + " \n脚本'" + jsuri + "'加载失败!" + " \nScript'" + jsuri + "'loading failed!";
		throw new Error(errMsg);
	}
}

/**
 * 执行一组js的异步加载，例如如果要加载js:"xui/util.js;xui/uibase.js;xlist"，那么其实分了3组，前面的加载完毕后后面的才能开始加载
 * 
 * @class
 * @private
 * @param {} lib
 * @param {} fns
 * @param {} wnd
 * @param {} onfinish
 * @param {} onstart
 * @param {} userdata
 */
function _AsyncIncludeTaskGrp(lib, fns, wnd, onfinish, onstart, userdata) {
	this.lib = lib;
	this.fns = fns;
	this.wnd = wnd ? wnd : window;
	this.onfinish = onfinish;
	this.onstart = onstart;
	this.__userdata = userdata;
	this.currentIndex = 0;
}

/**
 * @private
 */
_AsyncIncludeTaskGrp.prototype.doInclude = function() {
	this.lib.includeAsync(this.fns[this.currentIndex], this.wnd, this.myonfinish, this.myonstart, this);
}

_AsyncIncludeTaskGrp.prototype.myonfinish = function(self) {
	self.currentIndex++;
	if (self.currentIndex >= self.fns.length) {
		var onfinish = self.onfinish;
		var userdata = self.__userdata;
		self.onfinish = null;
		self.__userdata = null;
		self.wnd = null;
		if (onfinish)
			onfinish(userdata);
	}
	else {
		self.doInclude();
	}
}

_AsyncIncludeTaskGrp.prototype.myonstart = function(fns, self) {
	var onstart = self.onstart;
	if (onstart) {
		self.onstart = null;
		onstart(fns, self.__userdata);
	}
}

/**
 * 异步加载任务，私用，一次异步加载调用就会产生一个新的此对象，把加载的处理交给此对象实现。
 * 
 * @class
 * @private
 */
function _AsyncIncludeTask(lib, fns, wnd, onfinish, userdata) {
	this.lib = lib;
	this.fns = fns;
	this.wnd = wnd ? wnd : window;
	this.onfinish = onfinish;
	this.__userdata = userdata;
}

/**
 * @private
 */
function _onAsyncIncludeError() {
	throw new Error("include js failed :" + this.src);
}

/**
 * @private
 */
_AsyncIncludeTask.prototype.doInclude = function() {
	var self = this;
	var onload = function() {
		// 参考：http://msdn.microsoft.com/en-us/library/ms534359%28VS.85%29.aspx
		// uninitialized Object is not initialized with data.
		// loading Object is loading its data.
		// loaded Object has finished loading its data.
		// interactive User can interact with the object even though it is not fully loaded.
		// complete Object is completely initialized.
		if (isie && this.readyState != "loaded" && this.readyState != "complete" )
			return;
		if (isie) {
			this.onreadystatechange = null;
		}
		else {
			this.onload = null;
			this.readyState = "loaded";
		}
		this.onerror = null;
		self.lib._finishLoadJs(this.xuisrc, self.wnd);
	}
	/**
	* BUG:在插件显示报表时异步加载的脚本会出现个别脚本没有加载的情况
	* 原因：可能是由于在显示插件时出现了阻塞现象，使得要加载的脚本没有被正常加载而直接执行了回调事件
	* 需要注意的是，该问题在某些性能好的机器上可能并不会出现
	* --20101122
	*/
	setTimeout(function() {
	for (var i = 0; i < self.fns.length; i++) {
		self._loadScriptAsync(self.fns[i], onload);
	}}, 0);
}

/**
 * @private
 */
_AsyncIncludeTask.prototype._loadScriptAsync = function(js, onload) {
	if (this.lib._isLoading(js, this.wnd)) {
		return;
	}
	
	if (js.endsWith(".css")) {
		/**
		 * 如果是样式文件时，仅加载它就行了，不用作事件的监听，因为link元素在非Ie的浏览器上不支持onload事件
		 */
		this._loadStyle(js);
		return;
	}
	
	var doc = this.wnd.document;
	var node = doc.createElement("script");
	if (isie)
		node.onreadystatechange = onload;
	else
		node.onload = onload;
	node.onerror = _onAsyncIncludeError; // ie 上不行， ff上可以

	node.type = 'text/javascript';

	if (/(sanlib\/|ebi\/|xui\/).+/g.test(js)) {
		node.charset = "UTF-8"; // 门户文件的htm可能是GBK编码的,如果在这样的htm中引用utf8编码的js文件则必须设置这个属性,否则没法加载.
	}

	node.xuisrc = js;
	if (!isie) {
		/**
		 * ff上并没有readyState属性，当一个script正在加载时，无法根据scriptdom判断此script正在被加载
		 * 所以这里在加载之前设置一下这个属性，这样其他地方好判断
		 */
		node.readyState = "loading";
	}
	node.src = this.lib._makeJsUrl(js);
	/*
	 * 最后在把node加入到body中，为什么呢，因为当对同一批js先后连续调用异步装入时，第二次的调用可能没有需要装入的js，但是可能有些wnd[js]=true了
	 * 但js内部的对象还没有初始化好，此时如果直接调用onfinish，可能会出现无法获取对象的异常。 ISSUE BI-746
	 * http://svrdev/jira/browse/BI-746
	 */
	/*
	 * 应该先设置node.src后再appendChild(node)，不然在ie10上节点的onreadystatechange事件readyState码永远没有complete状态
	 * by chxb, 2014/5/14
	 */
	doc.body.appendChild(node);

}

/**
 * 加载指定的外部样式
 * @private
 * @param {str} css
 */
_AsyncIncludeTask.prototype._loadStyle = function(css) {
	var doc = this.wnd.document;
	var node = doc.getElementsByTagName("head")[0].appendChild(doc.createElement("link"));
	node.rel = "stylesheet";
	node.type = "text/css";
	node.href = this.lib._makeJsUrl(css);
	node.xuisrc = css;
	
	/**
	 * 执行一下加载完样式后的回调，因为link元素在非Ie的浏览器上不支持onload事件，所以就无法知道样式是否已经完成加载，
	 * 这里用setTimeout是为了却保加载样式后能够正常的执行完成后的回调而模拟的一个运行过程，需要注意的是这里的回调不会
	 * 因为样式没有成功加载而不执行，该回调始终会执行。 
	 */
	var slf = this;
	this.wnd.setTimeout(function() {
		slf.lib._finishLoadJs(css, slf.wnd);
	}, 0);
}

/**
 * 判断是否需要调用finish事件，如果需要则调用且返回true
 */
_AsyncIncludeTask.prototype.checkFinish = function(js, wnd) {
	if (wnd && this.wnd != wnd)
		return;
	if (this.lib._isScriptsLoaded(this.fns, this.wnd)) {
		this.doFinish();
		return true;
	}
}

/**
 * @private
 */
_AsyncIncludeTask.prototype.doFinish = function() {
	if (this._hasDoFinish)
		return;
	this._hasDoFinish = true;
	if (this.onfinish) {
		this.onfinish(this.__userdata);
		this.__userdata = null;
		this.onfinish = null;
	}
}

/**
 * @private
 */
Library.prototype._getXmlHttpRequest = function() {
	var r = this.http;
	if (!r) {
		r = xmlhttp();
		this.http = r;
	}
	return r;
}

/**
 * 查找js是否已加载
 * @private
 */
Library.prototype._findScript = function(fn, wnd) {
	if (wnd[fn])
		return true;
	// 如果找不到，再到dom里面去找<script>节点引用。
	var domnd = this._findScriptInDom(fn, wnd.document);
	if (domnd) {
		if (this._isScriptDomReady(domnd)) {
			wnd[fn] = true;
			return true;
		}
		else {
			/**
			 * 设置为0表示loading，这样可以避免在一个js未加载完毕时，又有其他地方要加载此js，导致重复加载 
			 * 
			 * fixme 有可能 domnd并没有onreadystatechange事件。
			 */
			wnd[fn] = 0;
			return false;
		}
	}
	return false;
}

/**
 * 判断scriptdom节点是否加载完毕
 * @param {dom} domnd 
 */
Library.prototype._isScriptDomReady = function(domnd) {
	if (isie) {
		/**
		 * IE8和IE6上，不知为何动态异步加载的scriptdom节点的readyState最终的值就是loaded,而静态写在html中的script的 readyState最终的值就是complete
		 * 但是动态加载的在readyState是complete那一刻时脚本并不是完全加载完毕的，必须要等到loaded
		 */
		return (domnd.xuisrc && domnd.readyState == "loaded") || (!domnd.xuisrc && domnd.readyState == "complete")
	}
	else {
		/**
		 * 通过异步include进来的js都会有readyState属性为loading或loaded，静态的写入到html中的script节点没有此属性
		 * 所以我们认为readyState != "loading"的都是加载完毕的
		 */
		return domnd.readyState != "loading";
	}
}

/**
 * 查找js是否已存在,如果存在返回对应的dom节点。
 * @private
 */
Library.prototype._findScriptInDom = function(fn, doc) {
	if (isie) {
		for (var i = 0; i < doc.scripts.length; i++) {
			var nd = doc.scripts[i];
			if (nd.src.indexOf(fn) != -1)
				return nd;
		}
	}

	try {
		var nds = doc.getElementsByTagName("script");
		if (!nds)
			return;
		var count = nds.length;
		for (var i = 0; i < count; i++) {
			nd = nds[i];
			if (nd.src.indexOf(fn) != -1)
				return nd;// IE8和ff中的nd.src是含有contentpath的
		}
	}
	catch (e) {
		// FIXME: 在IE执行execScript过程中再执行此函数有可能会出现80020101错误。所以将此代码try...catch.
	}
}

/**
 * @private
 * 此变量表示某对象的构造函数是否是在被继承调用，而不是真正的构造此对象，假设对象A，如果B继承自A，那么在调用
 * 继承函数_extendClass时，会执行B.prototype = new A，其实就执行了A，但此时并不是真正的构造A，而是一个
 * 原型复制的操作，A的构造函数应该判断这种情况，并主动退出。
 */
var _biInPrototype = false;

/**
 * 设置子类fConstr从父类fSuperConstr继承，sname是子类的名字，可以不传递。
 * 例如如果B需要从A继承，那么需要执行:extendClass(B,A,"B");
 * 
 * 此函数往往是在js的初始化时执行的，所以：
 * 需要注意的是当执行此函数时，B和A这2个对象必须已经初始化，即A所在的js必须已经被装载或A与B在一个js中。
 * 
 * @param {func} fConstr，子类构造函数
 * @param {func} fSuperConstr，父类构造函数
 * @param {str} sName，子类名
 */
function extendClass(fConstr, fSuperConstr, sName) {
	if (typeof(fSuperConstr) == "string") {
		var ooo = window[fSuperConstr];
		if (!ooo) {// 父类可能还没有初始化，此时需要设置延迟继承。
			return;// 延迟继承有子类在自己的构造方法中写入_extendClass_runtime来实现
		}
		fSuperConstr = ooo;
	}
	if (fConstr._superClass == fSuperConstr)
		return;
	var f = function(){};
	f.prototype = fSuperConstr.prototype;
	fConstr._superClass = fSuperConstr;
	var p = fConstr.prototype = new f();
	if (sName) {
		p._className = sName;
	}
	p.constructor = fConstr;
	return p;
}

/**
 * 兼容处理，因为很多地方用的是_extendClass。
 */
_extendClass = extendClass;

/**
 * 与extendClass类似，此函数也是实现类的继承，所不同的是此函数是“运行时”继承，即只是当第一次构造子类的时候才执行继承操作
 * 这样做的好处时当加载子类所在的js时不必一定先要加载父类所在的js，只要在构造子类时所有需要的js都加载完毕即可。
 * 
 * 此函数往往在子类的构造函数中调用
 * 
 * @param {func} fConstr，子类构造函数
 * @param {str;func} fSuperConstr，父类构造函数的函数或函数名字符串
 * @param {str} sName，子类的类名
 * @param {str} jses，如果fSuperConstr传递的为字符串，那么表示当构造子类时父类还不一定被初始化了，那么可以传递jses参数
 *							表示要先同步加载哪些js，不建议使用此参数
 */
function extendClass_runtime(fConstr, fSuperConstr, sName, jses) {
	if (fConstr._superClass == fSuperConstr)
		return;
	if (typeof(fSuperConstr) == "string") {
		var ooo = window[fSuperConstr];
		if (!ooo && jses) {// 父类可能还没有初始化，此时需要设置延迟继承。
			sys.lib.includeSync(jses);
			ooo = window[fSuperConstr];
		}
		if (!ooo)
			throw new Error("父类不存在：" + fSuperConstr + "\nSuperclass does not exist:" + fSuperConstr);
		fSuperConstr = ooo;
	}
	if (fConstr._superClass == fSuperConstr)
		return;
	fConstr._superClass = fSuperConstr;
	var dp = fConstr.prototype;
	var sp = fSuperConstr.prototype;
	for (var i in sp) {
		if (!dp[i])
			dp[i] = sp[i];
	}

	if (sName) {
		dp._className = sName;
	}
	dp.constructor = fConstr;
	return dp;
}

/**
 * 兼容处理，因为很多地方用的是_extendClass_runtime。
 */
_extendClass_runtime = extendClass_runtime;

/**
 * 此函数不得不放在sys.js中，因为，创建activex的代码必须被<script src=xxxxx></script>引用才能使创建的activex控件
 * 没有一个ie的罩子，
 * 
 * 创建一个activex控件如果指定了codebase则在本次session中第一次创建这种插件时会检测插件的版本并试图升级他
 * 参数parentdom必须时一个dom对象。onfinish是是回调函数回调方式是onfinish(plugin)回调时可能创建插件失败或者成功
 * 如果此函数直接创建了插件那么此函数将直接返回plugin
 * @param {dom} parentDom
 * @param {str} width
 * @param {str} height
 * @param {str} clsid
 * @param {str} codebase
 * @param {func} onfinish
 * @return {}
 */
function _createActiveX(parentDom, width, height, clsid, codebase, onfinish) {
	if (clsid.indexOf('CLSID:') == -1) {
		clsid = 'CLSID:' + clsid;
	}
	// top页面如果是frameset框架构成的,将不能够在此页面append任何DOM元素
	var root = getRootWindow();
	if (!root.activexupdatelog)
		root.activexupdatelog = {};
	if (root.activexupdatelog[clsid] || !codebase) {
		var plugin = _createActiveXWithClsid(parentDom, width, height, clsid);
		if(plugin != null) {
			alert("插件（" + clsid + "）已经存在，不需要安装！" + "\npluginmgr（" + clsid + "）already exists, no installation！");
		}
		if (onfinish) {
			onfinish(plugin);
		}
		return plugin;
	}

	var doc = document;
	var wnd = window;
	var ifrm = doc.createElement("iframe");
	ifrm.style.display = "none";
	doc.body.appendChild(ifrm);
	ifrm.onreadystatechange = function() {
		if (ifrm.readyState == "complete") {
			var plugin = _createActiveXWithClsid(parentDom, width, height, clsid);
			if (onfinish) {
				wnd.__createActiveX_onfinish = onfinish;
				wnd.__createActiveX_onfinish_plugin = plugin;
				wnd.eval("__createActiveX_onfinish(__createActiveX_onfinish_plugin)");
				wnd.__createActiveX_onfinish = null;
				wnd.__createActiveX_onfinish_plugin = null;
			}
			root.activexupdatelog[clsid] = true;
			ifrm.onreadystatechange = null;
			ifrm.src = "about:blank";
			ifrm.style.display = "none";
			doc.body.removeChild(ifrm);
		}
	}
	var idoc = ifrm.contentWindow.document;
	idoc.open();
	idoc.writeln('<html><body><object id="plugin" codebase="' + codebase + '" classid="' + clsid + '"></object></body></html>');
	idoc.close();
	return null;
}

/**
 * 
 * @param {dom} parentDom
 * @param {str} w
 * @param {str} h
 * @param {str} clsid
 * @return {}
 * @private
 */
function _createActiveXWithClsid(parentDom, w, h, clsid) {
	var doc = parentDom.ownerDocument;
	var plugin = parentDom.appendChild(doc.createElement("object"));
	try {
		with (plugin) {
			width = w;
			height = h;
			classid = clsid;
		}
		if (plugin.readyState == 4) {
			return plugin;
		}
		else {
			parentDom.removeChild(plugin);
		}
	}
	catch (e) {

	}
	return null;
}

/**
 * @private
 */
function _isXUIWindow(w) {// 是xui所在的项目的页面
	var pathname;
	try {
		if (w['_is_not_xui_window_'])// 第三方厂商在嵌入我们的页面的时候可以指定他们页面的这个属性
			return false;
		if (w['xui/sys.js']) {// 有这个js的页面肯定是bi页面
			/* 有这个js的页面肯定是bi页面没错，但可能是是另一个bi实例的，如两个bi部署在一个ip上，在一个bi的门户中引入另一个bi的报表，此时计算被引入的报表会出错 */
			return w.sys.getContextPath() == sys.getContextPath() && w.location.port == window.location.port;
		}
		/**
		 * pathname是location对象中的一个属性，原先的写错了会出现异常
		 */
		pathname = w.location.pathname;// 可能出现没有权限的异常
	}
	catch (e) {
		return false;
	}
	var cp = sys.getContextPath();
	var f = cp != "/" && pathname.indexOf(cp) == 0;
	// 此时要根据正则表达式判断，*.sa, /xui/* , /ebi/*, /vfs/* 是BI的。
	/**
	 * 这里判断需要严格一些，因为原先这里的判断没有与contextpath一起作比较，而使得在i@Report中集成时返回true，这样造成了获取的bi根对象出错，
	 * 使得返回的对象为i的，因为在2.2中，i在部署时多半是以irpt为contextpath的，这样就使得pathname.indexOf("/irpt/")的条件满足。
	 * 2.3中由于目录结构有所变化，不会出现与irpt这样的情况。
	 * --20100826
	 */
	if (f || (f && (pathname.indexOf("/xui/") == 0 || pathname.indexOf("/ebi/") == 0 || pathname.indexOf("/vfs/") == 0 || /\w+\.do$/ig.test(pathname))))
		return true;
		
	return false;
}

/**
 * 获得根窗体的window对象，此函数非常重要。
 * 
 * 场景描述：
 * 一个项目的客户端页面可能是有很多层次的，例如浏览器直接打开的页面中嵌入了iframe，而iframe中又嵌入了iframe等等
 * 如果在内层的iframe中需要调用一个dialog对象，那么需要将dialog对象创建在上层的根页面上才行，否则dialog只能局限
 * 于内层的iframe内部，而且也无法实现多个iframe共享一个对话框实例
 * 而此函数就是在任意内层的iframe内部都可以返回正确的根页面窗体对象的，当我们的项目的根页面又嵌入到第三方的页面中了，
 * 那么情况又变的复杂了一些，此函数都能正确处理这种情况
 */
function getRootWindow() {		
	try {
		/**
		 * 根页面中如果是用frameset框架设计的，则由于页面元素的特殊性而使得无法在根页面中创建任何的元素
		 * 原先这里在处理该问题时是直接返回了触发该方法的所在window对象，而该window对象可能并不是一个XUI的根对象，
		 * 现在这里通过将其设置为空的，使其能够跳转到后面的向上查找方法中去处理
		 */
		var w = top.document.getElementsByTagName("frameset").length > 0 ? null : top;
		if (_isXUIWindow(w)) {
			return w;
		}
		throw new Error('impossible');
	}
	catch (e) { // 如果是跨域访问，那么就出现异常，通过location判断是否跨域host,pathname=/bi/xxx/xxx.do
		// 通过是否能对window对象寄存对象判断是否跨域
		var i = 0;
		var obj = window;
		var pobj;
		while (i < 10) {
			pobj = obj.parent;
			try {
				/**
				 * 当pobj是_isXUIWindow时，pobj也有可能是一个frameset页面，此时不必继续向上判断了，可直接返回
				 * frameset子页面中的window对象
				 * 
				 * 示例：
				 * testrunner.do?test=xui-test/frameset/frameset.html
				 */
				if (!_isXUIWindow(pobj) || pobj.document.getElementsByTagName("frameset").length > 0)
					return obj;
			}
			catch (e) {
				return obj;
			}
			obj = pobj;
			i++;
		}
		return obj;
	}
}

/**
 * 以wnd的javascript上下文空间创建一个类对象，此函数是同步的，不推荐使用，请使用getObjectFromWindowAsync
 * 
 * @deprecated
 * @param {wnd} wnd window对象，本页面的window或其他页面的
 * @param {str} cls 表示要创建的类的类名
 * @param {str} saveid 如果传递saveid则表示将创建的对象寄存到wnd上，下次不再创建而直接获取
 * @param {boolean} disposeit 如果saveid且disposeit则此函数在创建对象时为对象添加dispose的事件。
 * @param {str} jssrc 在创建对象之前，先确保wnd引用了jssrc指定的js，在处理jssrc引用的时候是同步的引用方式
 * @return {obj}
 * @ftype util.root
 */
function getObjectFromWindow(wnd, cls, saveid, disposeit, jssrc) {
	var obj = null;
	if (saveid) {
		obj = wnd[saveid];
		if (obj) {
			return obj;
		}
		else {
			if (jssrc)
				sys.lib.include(jssrc, wnd);// 就算wnd中已经有cls的定义，但是可能new
			// cls时还需要其它的类，所以总是要include一下js
			obj = wnd.eval("window." + saveid + "= new " + cls + "()");
			if (disposeit) {
				wnd.eval("addDispose('window." + saveid + ".dispose();window." + saveid + "=null')");
			}
		}
	}
	else {
		if (jssrc)
			sys.lib.include(jssrc, wnd);
		obj = wnd.eval("new " + cls + "()");
	}
	return obj;
}

/**
 * 以wnd的javascript上下文空间创建一个类对象，相对于getObjectFromRoot来说是异步的引用需要的js，其他功能和其类似，
 * 
 * @param {wnd} wnd window对象，本页面的window或其他页面的
 * @param {str} cls 表示要创建的类的类名
 * @param {str} saveid 如果传递saveid则表示将创建的对象寄存到wnd上，下次不再创建而直接获取
 * @param {boolean} disposeit 如果saveid且disposeit则此函数在创建对象时为对象添加dispose的事件。
 * @param {str} jssrc 在创建对象之前，先确保wnd引用了jssrc指定的js，在处理jssrc引用的时候是异步的引用方式
 * @param {func} onfinish 当需要应用的jssrc都装入完毕后创建对象并触发回调事件onfinish，如果onfinish为null那么此函数和getObjectFromRoot函数功能一致
 * @param {boolean} dontshowWaitDialog 参数dontshowWaitDialog表示是否不显示等待对话框
 * @param {obj} userdata
 * @return {obj}
 */
function getObjectFromWindowAsync(wnd, cls, saveid, disposeit, jssrc, onfinish, dontshowWaitDialog, userdata) {
	if (saveid) {
		var dlg = wnd[saveid];
		if (dlg) {
			if (onfinish) {
				onfinish(dlg);
			}
			return dlg;
		}
	}

	if (onfinish) {
		/**
		 * ISSUE:WTAP-713 报表导出对话框，当点击保存到我的收藏时，提示“SaveAsDlg”未定义的异常。
		 * 该问题是由于脚本：ebi/js/rootjs/lessdlgatroot.js，在网络环境不好的时候会存在没有完全加载完内容的情况（只加载了一半的内容），
		 * 虽然是没有完全加载完，但异步加载时的状态却是loaded，这使得在回调中去创建对象时出现了上述的异常。
		 * 现在这里通过timeout 0的方式来避免该类问题，在网速慢的情况下，可以明显的在HttpWatch中看到脚本被完全正确的加载。
		 * --20100906 cjb
		 */
		setTimeout(function() {
		sys.lib.includeAsync(jssrc, wnd, function() {
			    if (!dontshowWaitDialog)
				    hideWaitDialog();
			    onfinish(getObjectFromWindow(wnd, cls, saveid, disposeit));
		    }, dontshowWaitDialog ? null : _showWaitDialog_whileLoadingjs, userdata);
		}, 0);
	}
	else {
		return getObjectFromWindow(wnd,cls, saveid, disposeit, jssrc);
	}
}

/**
 * 以getRootWindow函数返回的window对象空间创建一个类对象，参考getObjectFromWindow。
 * @param {str} cls
 * @param {str} saveid
 * @param {boolean} disposeit
 * @param {str} jssrc
 * @return {obj}
 * @ftype util.root
 */
function getObjectFromRoot(cls, saveid, disposeit, jssrc) {
	var root = getRootWindow();
	return getObjectFromWindow(root, cls, saveid, disposeit, jssrc);
}

/**
 * 以getRootWindow函数返回的window对象空间创建一个类对象，参考getObjectFromWindowAsync。
 * @ftype util.root
 */
function getObjectFromRootAsync(cls, saveid, disposeit, jssrc, onfinish, dontshowWaitDialog, userdata) {
	var root = getRootWindow();
	/*
	 * editBy:liusw
	 * 此处当onfinish不存在的时候需同步返回,否则外部无法接到在getObjectFromWindowAsync中生成的对象
	 */
	return getObjectFromWindowAsync(root, cls, saveid, disposeit, jssrc, onfinish, dontshowWaitDialog, userdata);
}

/**@private*/
function _showWaitDialog_whileLoadingjs() {
	if (typeof(showWaitDialog) == "function")
		showWaitDialog();
}

/**
 * 将obj的dispose和wnd对象的onunload事件绑定在一起，当wnd的onunload时调用obj指定的dispose方法。
 * 
 * 此方法已在ie6.0和ff1.5上测试通过，测试页面test/sys/test_dispose.html
 * 
 * @param {str;obj;func} obj 可以是一个对象的实例，但对象必须有dispose方法或invoke方法；也可以是一个函数；也可以是一个字符串
 * @param {wnd} wnd wnd缺省为当前页面的window对象
 * @ftype util.dispose
 */
function addDispose(obj, wnd) {
	if (!wnd) {
		wnd = window;
	}
	// alert('add dispose:'+wnd.location.href);
	var disposeList = wnd.__disposeObjList;
	if (!disposeList) {
		disposeList = new Array();
		wnd.__disposeObjList = disposeList;
		if (wnd.addEventListener) {
			wnd.addEventListener("unload", _onWindowUnLoad, false);
		}
		else {
			wnd.attachEvent("onunload", _onWindowUnLoad);
		}
	}
	disposeList.push(obj);
}

/**
 * @private
 */
function _onWindowUnLoad() {
	disposeObjectInWnd(this);
	if (this.removeEventListener)
		this.removeEventListener("unload", _onWindowUnLoad, false);
	else if (this.detachEvent)
		this.detachEvent("onunload", _onWindowUnLoad);
}

/**
 * dispose所有通过函数addDispose注册到wnd对象。
 * 
 * @ftype util.dispose
 * @param {} wnd
 */
function disposeObjectInWnd(wnd) {
	// alert('start dispose:'+wnd.location.href);
	var disposeList = wnd.__disposeObjList;
	wnd.__disposeObjList = null;
	if (!disposeList) {
		return;
	}
	var obj = null;
	while (disposeList.length > 0) {
		obj = disposeList.pop();
		if (!obj)
			continue;
		try {
			if (typeof(obj.dispose) == "function") {
				obj.dispose();
			}
			else if (typeof(obj.invoke) == "function") {
				obj.invoke();
			}
			else if (typeof(obj) == "function") {
				obj();
			}
			else {
				wnd.eval(obj);
			}
		}
		catch (ex) {
			sys.gc();
			// 出现异常会导致无法继续执行
		}
	}
	// alert('end dispose:'+wnd.location.href);
	sys.gc();
}

/**
 * dispose wnd中所有的iframe上注册的需要释放的对象。
 *  
 * @ftype util.dispose
 */
function disposeIframes(wnd) {
	if (!wnd) {
		wnd = window;
	}
	var wdfrms = wnd.document.frames;
	if (wdfrms && wdfrms.length > 0) {// Firefox中可能会不存在
		var frm;
		for (var i = 0; i < wdfrms.length; i++) {
			try {
				frm = wdfrms[i];
				disposeObjectInWnd(frm.contentWindow ? frm.contentWindow : frm);
				frm = null;
			}
			catch (e) {
				sys.gc();
				// 出现异常会导致无法继续执行
			}
		}
	}
}

var MouseWheelEvent = isFirefox ? {
	eventType: 'DOMMouseScroll',
	getWheelDetal: function(evt){ return evt.detail / 3; }
} : {
	eventType: 'mousewheel',
	getWheelDetal: function(evt){ return -(evt.wheelDelta / 120); }
}

/**
 * 给作用对象添加一个事件，obj是作用对象，eventType为事件类型，
 * fp为调用的函数，cap为firefox特有的，表示是否捕获，可以不传
 * @ftype util.event
 */
function addEvent(obj, eventType, fp, cap) {
	if (eventType == "contextmenu" && !isMSIE) {
		/**
		 * BUG:非Ie浏览器在右键标签页时没有显示标签页上的右键菜单
		 * BUG:非Ie浏览器在右键导航树中的结点时没有显示相应的右键菜单
		 * 
		 * 现象：
		 * 	非Ie浏览器（Firefox、Sarari、Chrome、Opera）中右键时，自定义的行为会被原有行为覆盖
		 * 
		 * 原因：
		 * 	设置oncontextmenu事件的方式不正确，参考系统管理页中的各显示区块，只有欢迎页中的右键菜单显示行为是正确的，而其它区块中的右键行为就不正确了，
		 * 	综合各区块中对右键的处理，发现通过addEventListener设置的右键无法停止原有的右键行为（停止原有事件中的行为是通过return false来完成的），而
		 * 	直接对事件进行赋值的就是正确的，如：xx.oncontextmenu = function(e){return false};
		 * 
		 * 解决方法：
		 * 	将右键事件的处理全部更改为直接赋值的方式，这样就能够保证所有的浏览器都能够正确处理自定义的右键行为。
		 * 
		 * --20101025 cjb
		 */
		obj.oncontextmenu = fp;
		return;
	}
	if(eventType === 'mousewheel') eventType = MouseWheelEvent["eventType"];
	
	if (typeof(cap) != "boolean")
		cap = false;
	if (obj.attachEvent)
		obj.attachEvent("on" + eventType, fp);
	else if (obj.addEventListener)
		obj.addEventListener(eventType, fp, cap);
}

/**
 * 删除指定作用对象的事件，obj是作用对象，eventType为事件类型，
 * fp为调用的函数，cap为firefox特有的，表示是否捕获，可以不传
 * @ftype util.event
 */
function removeEvent(obj, eventType, fp, cap) {
	if (eventType == "contextmenu" && !isMSIE) {
		obj.oncontextmenu = null;
		return;
	}
	if(eventType === 'mousewheel') eventType = MouseWheelEvent["eventType"];
	
	if (typeof(cap) != "boolean")
		cap = false;
	if (obj && obj.detachEvent)
		obj.detachEvent("on" + eventType, fp);
	else if (obj && obj.removeEventListener)
		obj.removeEventListener(eventType, fp, cap);
}

/**
 * 设置指定元素的事件，该事件不是事件监听器而是直接对元素的事件进行赋盖，如需要释放指定事件的资源则可以将参数callback传空值
 * 例如：setEvent(link, "load", function(p, u){...}, data);
 * @param {DOM} obj
 * @param {str} eventType
 * @param {func} callback 事件定义：callback(obj, userdata)
 * @param {obj} userdata
 * @param {boolean} ignore 为true时表示忽略缺省的状态检查，该参数仅针对onload事件，缺省为false
 */
function setEvent(obj, eventType, callback, userdata, ignore) {
	/**
	 * 没有传递回调时将释放资源
	 */
	if (!callback) {
		/**
		 * 因为统一了load事件的处理过程，使其忽略了浏览器之间的差异，因为Ie是通过监控onreadystatechange来完成的，其它浏览器是通过onload。
		 * 所以这里在释放资源时，必须针对Ie进行一下特殊的处理
		 */
		if (eventType == "load" && isMSIE && typeof(obj.onreadystatechange) != "undefined") {
			eventType = "readystatechange";
		}
		obj["on" + eventType] = null;
		return;
	}

	var _doit = function() {
		if (typeof(callback) == "function")
			callback(obj, userdata);
	};

	/**
	 * 用link引入的外部样式除了Ie支持onreadystatechage外，其它的浏览器并不支持，同时也不支持onload的事件，
	 * 所以这里忽略这样的事件设置
	 */
	if (obj.nodeName && obj.nodeName.toLowerCase() == "link" && eventType == "load") {
		setTimeout(_doit, 0);
		return;
	}

	var _doReadyStateChange;
	if (eventType == "load") {
		if (isSafari || isOpera) {
			/**
			 * BUG:Safari与Opera浏览器登录系统后无法显示管理页
			 * 
			 * 现象：
			 * 	Safari：
			 * 		document.readyState始终是loading，document.body.innerHTML所显示的内容不是管理页的完整内容
			 * 
			 * 	Opera：
			 *	 Uncaught exception: Error: Undefined variable: _extendClass 
			 *	 脚本'ebi/user/main/objsatroot.js'加载失败!
			 *	 
			 *	 Error thrown at line 627, column 2 in <anonymous function: _SyncIncludeTask.prototype._loadScript>(http, jsuri) in http://chen:8088/bi2.3/xui/sys.js:
			 *	     throw new Error(errMsg);
			 *	 called from line 578, column 2 in <anonymous function: _SyncIncludeTask.prototype.doInclude>() in http://chen:8088/bi2.3/xui/sys.js:
			 *	     this._loadScript(this.lib._getXmlHttpRequest(), this.fns[i]);
			 *	 called from line 432, column 2 in <anonymous function: Library.prototype.includeSync>(jses, wnd) in http://chen:8088/bi2.3/xui/sys.js:
			 *	     tsk.doInclude();
			 *	 called from line 553, column 2 in <anonymous function: Library.prototype.include>(jses, wnd, onfinish, onstart, userdata) in http://chen:8088/bi2.3/xui/sys.js:
			 *	     this.includeSync(jses, wnd);
			 *	 called from line 1179, column 4 in getObjectFromWindow(wnd, cls, saveid, disposeit, jssrc) in http://chen:8088/bi2.3/xui/sys.js:
			 *	     sys.lib.include(jssrc, wnd);
			 *	 called from line 1251, column 1 in getObjectFromRoot(cls, saveid, disposeit, jssrc) in http://chen:8088/bi2.3/xui/sys.js:
			 *	     return getObjectFromWindow(root, cls, saveid, disposeit, jssrc);
			 *	 called from line 40, column 1 in getServer() in http://chen:8088/bi2.3/ebi/js/funcsindex.js:
			 *	     return getObjectFromRoot("Server","_sanlinkServer",true,"xui/third/json2.js,ebi/user/main/objsatroot.js");
			 *	 called from line 19, column 1 in <anonymous function: EBIIndexFrame.prototype.build>() in http://chen:8088/bi2.3/ebi/user/main/index.js:
			 *	     getServer().initServerObj(function() {
			 *	 called from line 433, column 1 in <anonymous function: IndexFrame.prototype.start>() in http://chen:8088/bi2.3/xui/pages/index/index.js:
			 *	     this.build();
			 *	 called from line 61, column 1 in start() in http://chen:8088/bi2.3/ebi/user/main/index.js:
			 *	     idxfae.start();
			 * 
			 * 原因：
			 * 	有可能是对onload事件的解释不同造成的该问题吧，具体的原因暂时不明
			 * 
			 * 解决方法：
			 * 	通过new方式来指定onload事件可以解决，但需要注意的是，IE与Firefox不支持该方式，如果不加以区分则会出现类似Opera中的脚本异常。
			 * 
			 * --20101025 cjb 
			 */

			obj["on" + eventType] = new _doit;
			return;
		}

		/**
		 * 是Ie浏览器时，就检测一下对象是否支持onreadystatechage，只要支持就将load事件改为readystatechange，
		 * 因为一般来说，在Ie下监控是否准备好都是通过该事件的，而其它浏览器由于不支持该事件而只支持load
		 */
		if (isMSIE && obj.onreadystatechange) {
			_doReadyStateChange = function() {
				if (/*参数ignore为true时表示不作缺省的状态判断，而由用户自己通过回调事件来决定*/ignore ||
				    /**
				* 可能是XMLHttpRequest对象，readyState返回的是数值
				*/
				    (!isNaN(this.readyState) && this.readyState == 4) ||
				    /**
				     * 可能是script、img、iframe元素
				     */
				    this.readyState == "complete" ||
				    /**
				     * 可能是window对象，可以通过document.readyState来判断当前页面的状态
				     */
				    (this.navigator && this.document && this.document.readyState == "complete") ||
				    /**
				     * 可能是iframe元素
				     */
				    (this.contentWindow && this.contentWindow.document.readyState == "complete")) {
					_doit();
				}
			};
			
			eventType = "readystatechange";
		}
	}

	obj["on" + eventType] = _doReadyStateChange ? _doReadyStateChange : _doit;
}

/**
 * 此函数返回AJAX异步请求对象XMLHttpRequest，XMLHttpRequest对象的方法说明如下：
 * 
 * open(bstrMethod, bstrUrl, varAsync, bstrUser, bstrPassword);//创建一个新的http请求，并指定此请求的方法、URL以及验证信息
 * 	bstrMethod
 * 		http方法，例如：POST、GET、PUT及PROPFIND。大小写不敏感。
 * 	bstrUrl
 * 		请求的URL地址，可以为绝对地址也可以为相对地址。
 * 	varAsync[可选]
 * 		布尔型，指定此请求是否为异步方式，默认为true。如果为真，当状态改变时会调用onreadystatechange属性指定的回调函数。
 * 	bstrUser[可选]
 * 		如果服务器需要验证，此处指定用户名，如果未指定，当服务器需要验证时，会弹出验证窗口。
 * 	bstrPassword[可选]
 * 		验证信息中的密码部分，如果用户名为空，则此值将被忽略。 
 * 		
 * send(varBody)//发送请求到http服务器并接收回应
 * 	varBody
 * 		欲通过此请求发送的数据。
 * 	此方法的同步或异步方式取决于open方法中的bAsync参数，如果bAsync == False，此方法将会等待请求完成或者超时时才会返回，如果bAsync == True，此方法将立即返回。
 * 	如果发送的数据为BSTR，则回应被编码为utf-8, 必须在适当位置设置一个包含charset的文档类型头。
 * 	如果发送的数据为XML DOM object，则回应将被编码为在xml文档中声明的编码，如果在xml文档中没有声明编码，则使用默认的UTF-8。
 * 	如果send的参数不为空，且open是的方法是POST
 *   setRequestHeader("CONTENT-TYPE","application/x-www-form-urlencoded;charset=utf-8");
 * 	
 * 
 * setRequestHeader(bstrHeader, bstrValue)
 * 	单独指定请求的某个http头,如果已经存在已此名称命名的http头，则覆盖之。此方法必须在open方法后调用。
 * 
 * abort();//取消当前请求
 *   调用此方法后，当前请求返回UNINITIALIZED 状态。
 *   
 * getResponseHeader(bstrHeader)
 * 	从响应信息中获取指定的http头
 * 	当send方法成功后才可调用该方法。如果服务器返回的文档类型为"text/xml", 则这句话xmlhttp.getResponseHeader("Content-Type");
 * 	将返回字符串"text/xml"。可以使用 getAllResponseHeaders方法获取完整的http头信息。
 * 	
 * getAllResponseHeaders()
 * 	获取响应的所有http头,每个http头名称和值用冒号分割，并以\r\n结束。当send方法完成后才可调用该方法。
 * 		
 * readyState;//返回XMLHTTP请求的当前状态
 * 	变量，此属性只读，状态用长度为4的整型表示.定义如下：
 * 	0 (未初始化)	对象已建立，但是尚未初始化（尚未调用open方法）
 * 	1 (初始化)	对象已建立，尚未调用send方法
 * 	2 (发送数据)	send方法已调用，但是当前的状态及http头未知
 * 	3 (数据传送中)	已接收部分数据，因为响应及http头不全，这时通过responseBody和responseText获取部分数据会出现错误，
 * 	4 (完成)	数据接收完毕,此时可以通过通过responseBody和responseText获取完整的回应数据
 * 	
 * status//返回当前请求的http状态码
 * 	长整形，此属性只读，返回当前请求的http状态码,此属性仅当数据发送并接收完毕后才可获取。长整形标准http状态码，定义如下：
 * 	Number 	Description										100 Continue
 * 	101 Switching protocols								200 OK
 * 	201 Created														202 Accepted
 * 	203 Non-Authoritative Information			204 No Content
 * 	205 Reset Content											206 Partial Content
 * 	300 Multiple Choices									301 Moved Permanently
 * 	302 Found															303 See Other
 * 	304 Not Modified											305 Use Proxy
 * 	307 Temporary Redirect								400 Bad Request
 * 	401 Unauthorized											402 Payment Required
 * 	403 Forbidden													404 Not Found
 * 	405 Method Not Allowed								406 Not Acceptable
 * 	407 Proxy Authentication Required			408 Request Timeout
 * 	409 Conflict													410 Gone
 * 	411 Length Required										412 Precondition Failed
 * 	413 Request Entity Too Large					414 Request-URI Too Long
 * 	415 Unsupported Media Type						416 Requested Range Not Suitable
 * 	417 Expectation Failed								500 Internal Server Error
 * 	501 Not Implemented										502 Bad Gateway
 * 	503 Service Unavailable								504 Gateway Timeout
 * 	505 HTTP Version Not Supported
 * 	
 * statusText//返回当前请求的响应行状态	
 * 	字符串，此属性只读，以BSTR返回当前请求的响应行状态,此属性仅当数据发送并接收完毕后才可获取。
 * 	
 * onreadystatechange
 * 	指定当readyState属性改变时的事件处理句柄.此属性只写，为W3C文档对象模型的扩展.
 * 	
 * responseBody
 * 	返回某一格式的服务器响应数据
 * 	变量，此属性只读，以unsigned array格式表示直接从服务器返回的未经解码的二进制数据。
 * 	
 * responseStream
 * 	以Ado Stream对象的形式返回响应信息
 * 	变量，此属性只读，以Ado Stream对象的形式返回响应信息。
 * 	
 * responseText
 * 	将响应信息作为字符串返回
 * 	变量，此属性只读，将响应信息作为字符串返回。
 * 	XMLHTTP尝试将响应信息解码为Unicode字符串，XMLHTTP默认将响应数据的编码定为UTF-8，
 * 	如果服务器返回的数据带BOM(byte -order mark)，XMLHTTP可以解码任何UCS-2 (big or little endian)
 * 	或者UCS-4 数据。注意，如果服务器返回的是xml文档，此属性并不处理xml文档中的编码声明。
 * 	你需要使用responseXML来处理。
 * 	
 * responseXML
 * 	将响应信息格式化为Xml Document对象并返回
 * 	变量，此属性只读，将响应信息格式化为Xml Document对象并返回。如果响应数据不是有效的XML文档，
 * 	此属性本身不返回XMLDOMParseError，可以通过处理过的DOMDocument对象获取错误信息。
 * 
 */
function xmlhttp() {
	if (typeof(XMLHttpRequest) != "undefined")
		return new XMLHttpRequest();

	var axO = ["Msxml3.XMLHTTP", "Msxml2.XMLHTTP", "Msxml.XMLHTTP", "Microsoft.XMLHTTP"];
	for (var i = 0; i < axO.length; i++) {
		try {
			return new ActiveXObject(axO[i]);
		}
		catch (e) {
		}
	}
	throwError("创建 XMLHttpRequest 失败！\n\n·如果您使用的是IE浏览器，请检查IE安全选项里是否禁用了插件。\n·如果您使用的是其它浏览器（如Mozilla、Firefox），请确定该\n　浏览器是否支持XMLHttpRequest功能。" + "\nCreating XMLHttpRequest failed!\n\nIf you are using IE, please check whether the control has been forbidden in security of IE.\n If you are using non-IE(e.g. Malliza or FireFox), please confirm that the explorer supports function of XMLHttpRequest.");
	return false;
}

/**
 * 抛出一个异常，msg指定异常的简短信息，detailmsg指定异常的详细信息，detailmsg可以不传递,
 * 如果不是ie浏览器，则用escape编码所有信息，因为其他浏览器的onerror事件接收到的中文信息是乱码
 * @ftype util.root
 */
function throwError(msg, detailmsg, option, httpstatus) {
	var s = msg + (detailmsg ? "\r\n--detailmessage--\r\n" + detailmsg : "");
	// 为了兼容,isMesasge为true表明抛出的不是异常，而是message
	if (option)
		s += "\r\n--messageInfo--\r\n" + option;
	if ( !isie && !isCSS1Compat) {
		s = escape(s);
	}
	var error = new Error(s);
	if( !!httpstatus ){
		error.httpstatus = httpstatus;
	}
	throw error;
}

/**
 * 执行一段脚本代码字符串，该脚本的执行方式由于在各浏览器间并不相同，所以这里通过该方法来封装一下方便以后使用
 * 
 * IE与Chrome支持execScript方法，其他浏览器仅支持eval，Ie与Chrome对execScript方法的语言类型参数的支持存在差异，参考如下：
 * 脚本语言			IE Chrome
 * JavaScript		√	√
 * JavaScript1.1	√	√
 * JavaScript1.2	√	√
 * JavaScript1.3	√	√
 * JavaScript1.4	×	√
 * JScript			√	×
 * VBS				√	×
 * VBScript			√	×
 * abcJavaScriptdef	×	√
 * Java-Script		×	×
 * 
 * Ie中如果不指定语言类型参数时，则缺省为JScript，参考：http://msdn.microsoft.com/en-us/library/ms536420(VS.85).aspx
 * 
 * @param {str} js 要执行的是脚本代码字符串
 * @param {window} wnd 执行脚本的作用域，缺省为window 
 * @ftype util.notype
 * */
function execJavaScript(js, wnd) {
	if (!wnd) wnd = window;
	return wnd.execScript ? wnd.execScript(js) : wnd.eval(js);
}

/**
 * 添加sys.js扩展函数，可以通过Filter_XUI.setExtendSysJs添加扩展函数
 * request.getAttribute("sysjs")的输出可能有多行，所以不能使用将request输出的内容放到js变量里，只能用out.println
 */
//
sys.regTag("resourcextree","ebi/js/funcsindex.js,ebi/js/biresource.js,xui/ctrls/xtree.js");sys.regTag("resourcetreecombobox","ebi/js/funcsindex.js,ebi/js/biresource.js,xui/ctrls/xtree.js");sys.regTag("permissioneditor","ebi/sysmgr/userorgs/rspm/rspmeditor.js");
;


/**
 * 以下包含了json2中的代码，因为系统中会大量用到JSON数据，所以这里缺省将json2包含进来
 */
/*
    http://www.JSON.org/json2.js
    2009-09-29

    Public Domain.

    NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.

    See http://www.JSON.org/js.html

    This file creates a global JSON object containing two methods: stringify
    and parse.

        JSON.stringify(value, replacer, space)
            value       any JavaScript value, usually an object or array.

            replacer    an optional parameter that determines how object
                        values are stringified for objects. It can be a
                        function or an array of strings.

            space       an optional parameter that specifies the indentation
                        of nested structures. If it is omitted, the text will
                        be packed without extra whitespace. If it is a number,
                        it will specify the number of spaces to indent at each
                        level. If it is a string (such as '\t' or '&nbsp;'),
                        it contains the characters used to indent at each level.

            This method produces a JSON text from a JavaScript value.

            When an object value is found, if the object contains a toJSON
            method, its toJSON method will be called and the result will be
            stringified. A toJSON method does not serialize: it returns the
            value represented by the name/value pair that should be serialized,
            or undefined if nothing should be serialized. The toJSON method
            will be passed the key associated with the value, and this will be
            bound to the value

            For example, this would serialize Dates as ISO strings.

                Date.prototype.toJSON = function (key) {
                    function f(n) {
                        // Format integers to have at least two digits.
                        return n < 10 ? '0' + n : n;
                    }

                    return this.getUTCFullYear()   + '-' +
                         f(this.getUTCMonth() + 1) + '-' +
                         f(this.getUTCDate())      + 'T' +
                         f(this.getUTCHours())     + ':' +
                         f(this.getUTCMinutes())   + ':' +
                         f(this.getUTCSeconds())   + 'Z';
                };

            You can provide an optional replacer method. It will be passed the
            key and value of each member, with this bound to the containing
            object. The value that is returned from your method will be
            serialized. If your method returns undefined, then the member will
            be excluded from the serialization.

            If the replacer parameter is an array of strings, then it will be
            used to select the members to be serialized. It filters the results
            such that only members with keys listed in the replacer array are
            stringified.

            Values that do not have JSON representations, such as undefined or
            functions, will not be serialized. Such values in objects will be
            dropped; in arrays they will be replaced with null. You can use
            a replacer function to replace those with JSON values.
            JSON.stringify(undefined) returns undefined.

            The optional space parameter produces a stringification of the
            value that is filled with line breaks and indentation to make it
            easier to read.

            If the space parameter is a non-empty string, then that string will
            be used for indentation. If the space parameter is a number, then
            the indentation will be that many spaces.

            Example:

            text = JSON.stringify(['e', {pluribus: 'unum'}]);
            // text is '["e",{"pluribus":"unum"}]'


            text = JSON.stringify(['e', {pluribus: 'unum'}], null, '\t');
            // text is '[\n\t"e",\n\t{\n\t\t"pluribus": "unum"\n\t}\n]'

            text = JSON.stringify([new Date()], function (key, value) {
                return this[key] instanceof Date ?
                    'Date(' + this[key] + ')' : value;
            });
            // text is '["Date(---current time---)"]'


        JSON.parse(text, reviver)
            This method parses a JSON text to produce an object or array.
            It can throw a SyntaxError exception.

            The optional reviver parameter is a function that can filter and
            transform the results. It receives each of the keys and values,
            and its return value is used instead of the original value.
            If it returns what it received, then the structure is not modified.
            If it returns undefined then the member is deleted.

            Example:

            // Parse the text. Values that look like ISO date strings will
            // be converted to Date objects.

            myData = JSON.parse(text, function (key, value) {
                var a;
                if (typeof value === 'string') {
                    a =
/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2}(?:\.\d*)?)Z$/.exec(value);
                    if (a) {
                        return new Date(Date.UTC(+a[1], +a[2] - 1, +a[3], +a[4],
                            +a[5], +a[6]));
                    }
                }
                return value;
            });

            myData = JSON.parse('["Date(09/09/2001)"]', function (key, value) {
                var d;
                if (typeof value === 'string' &&
                        value.slice(0, 5) === 'Date(' &&
                        value.slice(-1) === ')') {
                    d = new Date(value.slice(5, -1));
                    if (d) {
                        return d;
                    }
                }
                return value;
            });


    This is a reference implementation. You are free to copy, modify, or
    redistribute.

    This code should be minified before deployment.
    See http://javascript.crockford.com/jsmin.html

    USE YOUR OWN COPY. IT IS EXTREMELY UNWISE TO LOAD CODE FROM SERVERS YOU DO
    NOT CONTROL.
*/

/*jslint evil: true, strict: false */

/*members "", "\b", "\t", "\n", "\f", "\r", "\"", JSON, "\\", apply,
    call, charCodeAt, getUTCDate, getUTCFullYear, getUTCHours,
    getUTCMinutes, getUTCMonth, getUTCSeconds, hasOwnProperty, join,
    lastIndex, length, parse, prototype, push, replace, slice, stringify,
    test, toJSON, toString, valueOf
*/


// Create a JSON object only if one does not already exist. We create the
// methods in a closure to avoid creating global variables.

if (!this.JSON) {
    this.JSON = {};
}

(function () {

    function f(n) {
        // Format integers to have at least two digits.
        return n < 10 ? '0' + n : n;
    }

    if (typeof Date.prototype.toJSON !== 'function') {

        Date.prototype.toJSON = function (key) {

            return isFinite(this.valueOf()) ?
                   this.getUTCFullYear()   + '-' +
                 f(this.getUTCMonth() + 1) + '-' +
                 f(this.getUTCDate())      + 'T' +
                 f(this.getUTCHours())     + ':' +
                 f(this.getUTCMinutes())   + ':' +
                 f(this.getUTCSeconds())   + 'Z' : null;
        };

        String.prototype.toJSON =
        Number.prototype.toJSON =
        Boolean.prototype.toJSON = function (key) {
            return this.valueOf();
        };
    }

    var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
        escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
        gap,
        indent,
        meta = {    // table of character substitutions
            '\b': '\\b',
            '\t': '\\t',
            '\n': '\\n',
            '\f': '\\f',
            '\r': '\\r',
            '"' : '\\"',
            '\\': '\\\\'
        },
        rep;


    function quote(string) {

// If the string contains no control characters, no quote characters, and no
// backslash characters, then we can safely slap some quotes around it.
// Otherwise we must also replace the offending characters with safe escape
// sequences.

        escapable.lastIndex = 0;
        return escapable.test(string) ?
            '"' + string.replace(escapable, function (a) {
                var c = meta[a];
                return typeof c === 'string' ? c :
                    '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
            }) + '"' :
            '"' + string + '"';
    }


    function str(key, holder) {

// Produce a string from holder[key].

        var i,          // The loop counter.
            k,          // The member key.
            v,          // The member value.
            length,
            mind = gap,
            partial,
            value = holder[key];

// If the value has a toJSON method, call it to obtain a replacement value.

        if (value && typeof value === 'object' &&
                typeof value.toJSON === 'function') {
            value = value.toJSON(key);
        }

// If we were called with a replacer function, then call the replacer to
// obtain a replacement value.

        if (typeof rep === 'function') {
            value = rep.call(holder, key, value);
        }

// What happens next depends on the value's type.

        switch (typeof value) {
        case 'string':
            return quote(value);

        case 'number':

// JSON numbers must be finite. Encode non-finite numbers as null.

            return isFinite(value) ? String(value) : 'null';

        case 'boolean':
        case 'null':

// If the value is a boolean or null, convert it to a string. Note:
// typeof null does not produce 'null'. The case is included here in
// the remote chance that this gets fixed someday.

            return String(value);

// If the type is 'object', we might be dealing with an object or an array or
// null.

        case 'object':

// Due to a specification blunder in ECMAScript, typeof null is 'object',
// so watch out for that case.

            if (!value) {
                return 'null';
            }

// Make an array to hold the partial results of stringifying this object value.

            gap += indent;
            partial = [];

// Is the value an array?

            if (Object.prototype.toString.apply(value) === '[object Array]') {

// The value is an array. Stringify every element. Use null as a placeholder
// for non-JSON values.

                length = value.length;
                for (i = 0; i < length; i += 1) {
                    partial[i] = str(i, value) || 'null';
                }

// Join all of the elements together, separated with commas, and wrap them in
// brackets.

                v = partial.length === 0 ? '[]' :
                    gap ? '[\n' + gap +
                            partial.join(',\n' + gap) + '\n' +
                                mind + ']' :
                          '[' + partial.join(',') + ']';
                gap = mind;
                return v;
            }

// If the replacer is an array, use it to select the members to be stringified.

            if (rep && typeof rep === 'object') {
                length = rep.length;
                for (i = 0; i < length; i += 1) {
                    k = rep[i];
                    if (typeof k === 'string') {
                        v = str(k, value);
                        if (v) {
                            partial.push(quote(k) + (gap ? ': ' : ':') + v);
                        }
                    }
                }
            } else {

// Otherwise, iterate through all of the keys in the object.

                for (k in value) {
                    if (Object.hasOwnProperty.call(value, k)) {
                        v = str(k, value);
                        if (v) {
                            partial.push(quote(k) + (gap ? ': ' : ':') + v);
                        }
                    }
                }
            }

// Join all of the member texts together, separated with commas,
// and wrap them in braces.

            v = partial.length === 0 ? '{}' :
                gap ? '{\n' + gap + partial.join(',\n' + gap) + '\n' +
                        mind + '}' : '{' + partial.join(',') + '}';
            gap = mind;
            return v;
        }
    }

// If the JSON object does not yet have a stringify method, give it one.

    if (typeof JSON.stringify !== 'function') {
        JSON.stringify = function (value, replacer, space) {

// The stringify method takes a value and an optional replacer, and an optional
// space parameter, and returns a JSON text. The replacer can be a function
// that can replace values, or an array of strings that will select the keys.
// A default replacer method can be provided. Use of the space parameter can
// produce text that is more easily readable.

            var i;
            gap = '';
            indent = '';

// If the space parameter is a number, make an indent string containing that
// many spaces.

            if (typeof space === 'number') {
                for (i = 0; i < space; i += 1) {
                    indent += ' ';
                }

// If the space parameter is a string, it will be used as the indent string.

            } else if (typeof space === 'string') {
                indent = space;
            }

// If there is a replacer, it must be a function or an array.
// Otherwise, throw an error.

            rep = replacer;
            if (replacer && typeof replacer !== 'function' &&
                    (typeof replacer !== 'object' ||
                     typeof replacer.length !== 'number')) {
                throw new Error('JSON.stringify');
            }

// Make a fake root object containing our value under the key of ''.
// Return the result of stringifying the value.

            return str('', {'': value});
        };
    }


// If the JSON object does not yet have a parse method, give it one.

    if (typeof JSON.parse !== 'function') {
        JSON.parse = function (text, reviver) {

// The parse method takes a text and an optional reviver function, and returns
// a JavaScript value if the text is a valid JSON text.

            var j;

            function walk(holder, key) {

// The walk method is used to recursively walk the resulting structure so
// that modifications can be made.

                var k, v, value = holder[key];
                if (value && typeof value === 'object') {
                    for (k in value) {
                        if (Object.hasOwnProperty.call(value, k)) {
                            v = walk(value, k);
                            if (v !== undefined) {
                                value[k] = v;
                            } else {
                                delete value[k];
                            }
                        }
                    }
                }
                return reviver.call(holder, key, value);
            }


// Parsing happens in four stages. In the first stage, we replace certain
// Unicode characters with escape sequences. JavaScript handles many characters
// incorrectly, either silently deleting them, or treating them as line endings.

            cx.lastIndex = 0;
            if (cx.test(text)) {
                text = text.replace(cx, function (a) {
                    return '\\u' +
                        ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
                });
            }

// In the second stage, we run the text against regular expressions that look
// for non-JSON patterns. We are especially concerned with '()' and 'new'
// because they can cause invocation, and '=' because it can cause mutation.
// But just to be safe, we want to reject all unexpected forms.

// We split the second stage into 4 regexp operations in order to work around
// crippling inefficiencies in IE's and Safari's regexp engines. First we
// replace the JSON backslash pairs with '@' (a non-JSON character). Second, we
// replace all simple value tokens with ']' characters. Third, we delete all
// open brackets that follow a colon or comma or that begin the text. Finally,
// we look to see that the remaining characters are only whitespace or ']' or
// ',' or ':' or '{' or '}'. If that is so, then the text is safe for eval.

            if (/^[\],:{}\s]*$/.
test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@').
replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {

// In the third stage we use the eval function to compile the text into a
// JavaScript structure. The '{' operator is subject to a syntactic ambiguity
// in JavaScript: it can begin a block or an object literal. We wrap the text
// in parens to eliminate the ambiguity.

                j = eval('(' + text + ')');

// In the optional fourth stage, we recursively walk the new structure, passing
// each name/value pair to a reviver function for possible transformation.

                return typeof reviver === 'function' ?
                    walk({'': j}, '') : j;
            }

// If the text is not JSON parseable, then a SyntaxError is thrown.

            throw new SyntaxError('JSON.parse');
        };
    }
}());
/**
 * json2代码结束
 */

/******************************************************************************
 * JSONFn
 * 支持json串中，value为function的JSON解析器。通常情况下不要直接使用。
 * 来源：http://www.eslinstructor.net/jsonfn/
 */
/**
 * JSONfn - javascript plugin to convert javascript object, ( including those with functions ) 
 * to string and vise versa.
 *  
 * Version - 0.3.00.beta 
 * Copyright (c) 2012 Vadim Kiryukhin
 * vkiryukhin @ gmail.com
 * http://www.eslinstructor.net/jsonfn/
 * 
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 *   USAGE:
 * 
 *        JSONfn.stringify(obj);
 *        JSONfn.parse(jsonStr);
 *
 *        @obj     -  javascript object;
 *		 @jsonStr -  String in JSON format; 
 *
 *   Examples:
 *		
 *        var str = JSONfn.stringify(obj);
 *        var obj = JSONfn.parse(str);
 *
 */ 
var JSONfn;
if (!JSONfn) {
    JSONfn = {};
}

(function () {
	
	JSONfn.stringify = function(obj) {
		return JSON.stringify(obj,function(key, value){
				return (typeof value === 'function' ) ? value.toString() : value;
			});
	}

	JSONfn.parse = function(str) {
		return JSON.parse(str,function(key, value){
			if(typeof value != 'string') return value;
			return ( value.substring(0,8) == 'function') ? eval('('+value+')') : value;
		});
	}
}());
/*JSONfn结束*/

/**
 * 此代码放在最后，等sys对象以及初始化后执行，标记sys.js已经加载了
 */
sys.setJsIncluded('xui/sys.js');

webpackJsonp([2],{"+5ln":function(t,e,n){"use strict";function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}n.d(e,"a",function(){return o});var a=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}(),r=function(){function t(){i(this,t),this.config={},this.initialized=!1}return a(t,[{key:"initialize",value:function(){var t=window.document.getElementById("js-config");t&&(this.config=JSON.parse(t.textContent),this.initialized=!0)}},{key:"get",value:function(t,e){return this.initialized||this.initialize(),void 0===this.config[t]||null===this.config[t]?e:this.config[t]}}]),t}(),o=new r},DuR2:function(t,e){var n;n=function(){return this}();try{n=n||Function("return this")()||(0,eval)("this")}catch(t){"object"==typeof window&&(n=window)}t.exports=n},kZgf:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),function(t,e){var i=n("+5ln"),a=t;a.Blog;e(function(){var t={"#vk-comments":!1,"#disqus_thread":!1},n=function(e){if(!t[e]){switch(e){case"#disqus_thread":window.disqus_config=function(){return this.page.url=i.a.get("article_url"),this.page.identifier=i.a.get("page_identifier")},function(){var t=window.document,e=t.createElement("script");e.src="//"+i.a.get("discuss_user_name")+".disqus.com/embed.js",e.setAttribute("data-timestamp",+new Date),(t.head||t.body).appendChild(e)}();break;case"#vk-comments":if("undefined"==typeof VK)return;VK.Widgets.Comments("vk-comments",{limit:5,attach:"*",pageUrl:i.a.get("article_url")},i.a.get("article_original_id"));break;default:return}return t[e]=!0}},a=e('.comments-wrapper a[data-toggle="tab"]');a.on("shown.bs.tab",function(t){return n(e(t.target).attr("href"))}),n(a.closest(".active").find('a[data-toggle="tab"]').attr("href"))})}.call(e,n("DuR2"),n("7t+N"))}},["kZgf"]);
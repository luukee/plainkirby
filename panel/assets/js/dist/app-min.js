var app={setup:function(){NProgress.configure({showSpinner:!1}),app.delay=Delay(),app.content=Content(app),app.content.setup(),app.modal=Modal(app),app.modal.setup(),new Context,new Search,$.ajaxPrefilter(function(t,a,e){if(a.type&&"post"==a.type.toLowerCase()){var o=$("body").attr("data-csrf");"string"==typeof a.data&&""!=a.data?t.data=a.data+"&csrf="+o:t.data=$.param($.extend(a.data,{csrf:o}))}}),$(document).on("click","a",function(t){if(t.which>1||t.metaKey||t.ctrlKey||t.shiftKey||t.altKey)return!0;var a=$(this),e=a.attr("href");return!!e&&(!(!a.is("[data-dropdown]")&&!e.match(/^#/))||(a.is("[data-modal]")?(app.modal.open(a.attr("href")),!1):!!a.is("[target]")||(app.content.open(e),!1)))}),$(document).on("keydown",function(t){switch(t.keyCode){case 83:case 13:return!t.metaKey&&!t.ctrlKey||(app.hasModal()||app.content.form().trigger("submit"),!1);break;case 27:return app.modal.close(),!1;break}}),$(document).dropdown()},hasModal:function(){return $(".modal-content").length>0},load:function(t,a,e){if(app.isLoading(!0),"modal"==a)var o={modal:!0};else var o=!1;$.ajax({url:t,method:"GET",headers:o}).success(function(a,o,r){if(app.isLoading(!1),"object"!==$.type(a)||!a.user||!a.direction)return window.location.href=t;document.title=a.title;var n=$("body");n.hasClass(a.direction)||("ltr"==a.direction?n.removeClass("rtl").addClass("ltr"):n.removeClass("ltr").addClass("rtl"));try{e(a)}catch(a){window.location.href=t}}).error(function(){window.location.href=t})},csrf:function(){return $("body").attr("data-csrf")},isLoading:function(t){t?app.delay.start("loader",function(){NProgress.start()},250):(app.delay.stop("loader"),NProgress.done())}};$(function(){app.setup()});
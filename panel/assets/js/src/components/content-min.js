var Content=function(){var o=$(".main"),n=function(n){return o.find(n)},e=Focus(),t={mainbar:0,sidebar:0,save:function(){t.mainbar=$(".mainbar").scrollTop(),t.sidebar=$(".sidebar").scrollTop()},restore:function(){$(".mainbar")[0]&&($(".mainbar")[0].scrollTop=t.mainbar),$(".sidebar")[0]&&($(".sidebar")[0].scrollTop=t.sidebar)}},r=function(){a(),n(".breadcrumb").breadcrumb(),n(".sidebar").sidebar(),o.shortcuts(),app.delay.start("message",function(){n(".message-is-notice").trigger("click")},3e3),n(".message a, .message").on("click",function(o){return n(".mainbar .field-with-error").removeClass("field-with-error"),n(".message").remove(),app.delay.stop("message"),!1}),Form(".main .form",{submit:function(){t.save()},redirect:function(o){"object"==$.type(o)&&o.url?i(o.url):c(o.content)}}),e.on(".mainbar .form")},a=function(){app.delay.stop(),e.off(),$(document).unbind("keydown.shortcuts"),$(window).off("resize")},i=function(o,n){app.load(o,"content",function(e){e.url?i(e.url,n):c(e.content,o,n)})},c=function(n,a,i){if($(document).trigger("click.contextmenu"),app.modal.close(),o.html(n),a&&window.location.href!=a){e.forget();try{path=a.replace(window.location.origin,""),window.history.pushState({path:path},document.title,path)}catch(o){window.location.href=a}}r(),t.restore(),"function"===$.type(i)&&i()};return{root:o,element:n,on:r,off:a,open:i,replace:c,reload:function(){t.save(),$("body").addClass("loading"),i(document.location,function(){$("body").removeClass("loading")})},shortcuts:function(){o.shortcuts()},form:function(){return $(".main .form")},focus:e,setup:function(){$(window).on("popstate",function(o){i(document.location)}),r()},scroll:t}};
!function($){$.support.uploader=$.support.upload&&$.support.fileReader,$.fn.uploader=function(o){if(!$.support.uploader)return!1;var n=$(this),e=function(e){var i=!1;app.isLoading(!0),$("body").addClass("loading"),$.upload(e,{url:n.attr("action")+"?csrf="+n.find("[name=csrf]").val(),complete:function(){0==i&&(i=!0,app.isLoading(!1),$("body").removeClass("loading"),o())}})};$(document).filedrop("destroy").filedrop({dragenter:function(o){var n=o.originalEvent.dataTransfer;null!=n.types&&(n.types.indexOf?-1!=n.types.indexOf("Files"):n.types.contains("application/x-moz-file"))&&$("body").addClass("over")},drop:function(){$("body").removeClass("over")},dragleave:function(){$("body").removeClass("over")},files:function(o){e(o)}}),$("[data-upload]").on("click",function(){return n.find("input[type=file]").on("change",function(){e(this.files)}).trigger("click"),!1})}}(jQuery);
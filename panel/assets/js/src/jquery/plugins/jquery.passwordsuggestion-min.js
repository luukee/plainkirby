!function($){$.fn.passwordSuggestion=function(){return this.each(function(){var t=$(this),e=t.closest(".field"),n=t.closest(".form"),i=e.find(".pw-suggestion"),o=n.find("[type=password]");e.find(".pw-reload").on("click",function(t){t.preventDefault(),i.text($.token())}).trigger("click"),o.on("blur",function(){o.attr("type","password")}),i.click(function(e){e.preventDefault();var o=i.text();t.attr("type","text").val(o).first().select(),n.find("[name=passwordconfirmation]").attr("type","text").val(o)})})}}(jQuery);
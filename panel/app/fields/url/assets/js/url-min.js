!function($){$.fn.urlfield=function(){return this.each(function(){var i=$(this);if(!i.data("urlfield")){i.data("urlfield",!0);var n=i.next(".field-icon");n.css({cursor:"pointer","pointer-events":"auto"}),n.on("click",function(){var n=$.trim(i.val());""!==n&&i.is(":valid")?window.open(n):i.focus()})}})}}(jQuery);
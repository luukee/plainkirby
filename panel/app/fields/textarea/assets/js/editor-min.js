!function($){$.fn.editor=function(){return this.each(function(){if($(this).data("editor"))return $(this);var t=$(this),e=t.parent().find(".field-buttons");t.autosize(),e.find(".btn").on("click.editorButton",function(e){t.focus();var i=$(this);if(i.data("action"))app.modal.open(i.data("action"),window.location.href);else{var n=t.getSelection(),a=i.data("tpl"),r=i.data("text");n.length>0&&(r=n);var o=a.replace("{text}",r);t.insertAtCursor(o),t.trigger("autosize.resize")}return!1}),e.find("[data-editor-shortcut]").each(function(e,i){var n=$(this).data("editor-shortcut"),a=function(t){return $(i).trigger("click"),!1};t.bind("keydown",n,a),n.match(/meta\+/)&&t.bind("keydown",n.replace("meta+","ctrl+"),a)}),t.data("editor",!0)})}}(jQuery);
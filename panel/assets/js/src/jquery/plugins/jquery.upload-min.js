!function($){var e=new XMLHttpRequest;$.support.xhr2=!!(e&&"upload"in e&&"onprogress"in e.upload),$.support.formData=void 0!==window.FormData,$.support.upload=$.support.xhr2&&$.support.formData,$.upload=function(e,t){if(!$.support.upload)return!1;var o={url:"/",field:"file",formData:!1,method:"POST",accept:"text",xhr:!1,complete:function(){},error:function(){},success:function(){},progress:function(){}},t=$.extend({},o,t),r=function(e,o){var r=new FormData;r.append(t.field,e),t.formData&&t.formData(r,e);var a=new XMLHttpRequest;a.open(t.method||"POST",t.url||"/",!0),a.upload.onprogress=n(e),a.setRequestHeader("Accept",t.accept),a.setRequestHeader("Cache-Control","no-cache"),a.setRequestHeader("X-Requested-With","XMLHttpRequest"),a.setRequestHeader("X-File-Name",encodeURIComponent(e.name)),t.xhr&&t.xhr(a),a.onload=function(){t.success(a,e),t.progress(e,100),o&&t.complete()},a.onerror=function(){t.error(a,e),o&&t.complete()},a.send(r)},n=function(e){return function(o){if(o.lengthComputable&&t.progress){var r=Math.max(0,Math.min(100,o.loaded/o.total*100));t.progress(e,Math.ceil(r))}}};return function(e){for(i=0;i<e.length;i++)r(e[i],i===e.length-1)}(e),!0}}(jQuery);
!function($){$.fn.caret=function(e,t){if(0!=this.length){if("number"==typeof e)return t="number"==typeof t?t:e,this.each(function(){if(this.setSelectionRange)this.setSelectionRange(e,t);else if(this.createTextRange){var n=this.createTextRange();n.collapse(!0),n.moveEnd("character",t),n.moveStart("character",e);try{n.select()}catch(e){}}});try{if(this[0].setSelectionRange)e=this[0].selectionStart,t=this[0].selectionEnd;else if(document.selection&&document.selection.createRange){var n=document.selection.createRange();e=0-n.duplicate().moveStart("character",-1e5),t=e+n.text.length}}catch(n){e=0,t=0}return{begin:e,end:t}}},$.fn.selectRange=function(e,t){return t||(t=e),this.each(function(){if(-1==e&&(e=t=$(this).val().length),this.setSelectionRange)this.focus(),this.setSelectionRange(e,t);else if(this.createTextRange){var n=this.createTextRange();n.collapse(!0),n.moveEnd("character",t),n.moveStart("character",e),n.select()}})},$.fn.getSelection=function(){var e=this[0];if(void 0!=document.selection){e.focus();var t=document.selection.createRange(),n=t.text}else if(void 0!=e.selectionStart)var i=e.selectionStart,s=e.selectionEnd,n=e.value.substring(i,s);return n},$.fn.insertAtCursor=function(e){return this.each(function(){if(document.selection)this.focus(),sel=document.selection.createRange(),sel.text=e,this.focus();else if(this.selectionStart||"0"==this.selectionStart){var t=this.selectionStart,n=this.selectionEnd,i=this.scrollTop;this.value=this.value.substring(0,t)+e+this.value.substring(n,this.value.length),this.focus(),this.selectionStart=t+e.length,this.selectionEnd=t+e.length,this.scrollTop=i}else this.value+=e,this.focus()})}}(jQuery);
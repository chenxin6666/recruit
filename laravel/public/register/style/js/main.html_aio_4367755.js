/*!dep/js-md5/src/md5.js*/
;!function(a){"use strict";var c="undefined"!=typeof module;c&&(a=global,a.JS_MD5_TEST&&(a.navigator={userAgent:"Firefox"}));var h,A=(a.JS_MD5_TEST||!c)&&-1!=navigator.userAgent.indexOf("Firefox"),g=!a.JS_MD5_TEST&&"undefined"!=typeof ArrayBuffer,y="0123456789abcdef".split(""),v=[128,32768,8388608,-2147483648],S=[0,8,16,24],T=[];if(g){var _=new ArrayBuffer(68);h=new Uint8Array(_),T=new Uint32Array(_)}var w=function(a){var c="string"!=typeof a;c&&a.constructor==ArrayBuffer&&(a=new Uint8Array(a));var _,w,B,C,D,E,J,d,M,U,b,i,F=!0,H=!1,O=0,j=0,k=0,z=a.length;T[16]=0;do{if(T[0]=T[16],T[16]=T[1]=T[2]=T[3]=T[4]=T[5]=T[6]=T[7]=T[8]=T[9]=T[10]=T[11]=T[12]=T[13]=T[14]=T[15]=0,c)if(g)for(i=j;z>O&&64>i;++O)h[i++]=a[O];else for(i=j;z>O&&64>i;++O)T[i>>2]|=a[O]<<S[3&i++];else if(g)for(i=j;z>O&&64>i;++O)b=a.charCodeAt(O),128>b?h[i++]=b:2048>b?(h[i++]=192|b>>6,h[i++]=128|63&b):55296>b||b>=57344?(h[i++]=224|b>>12,h[i++]=128|b>>6&63,h[i++]=128|63&b):(b=65536+((1023&b)<<10|1023&a.charCodeAt(++O)),h[i++]=240|b>>18,h[i++]=128|b>>12&63,h[i++]=128|b>>6&63,h[i++]=128|63&b);else for(i=j;z>O&&64>i;++O)b=a.charCodeAt(O),128>b?T[i>>2]|=b<<S[3&i++]:2048>b?(T[i>>2]|=(192|b>>6)<<S[3&i++],T[i>>2]|=(128|63&b)<<S[3&i++]):55296>b||b>=57344?(T[i>>2]|=(224|b>>12)<<S[3&i++],T[i>>2]|=(128|b>>6&63)<<S[3&i++],T[i>>2]|=(128|63&b)<<S[3&i++]):(b=65536+((1023&b)<<10|1023&a.charCodeAt(++O)),T[i>>2]|=(240|b>>18)<<S[3&i++],T[i>>2]|=(128|b>>12&63)<<S[3&i++],T[i>>2]|=(128|b>>6&63)<<S[3&i++],T[i>>2]|=(128|63&b)<<S[3&i++]);k+=i-j,j=i-64,O==z&&(T[i>>2]|=v[3&i],++O),O>z&&56>i&&(T[14]=k<<3,H=!0),F?(D=T[0]-680876937,D=(D<<7|D>>>25)-271733879<<0,d=(-1732584194^2004318071&D)+T[1]-117830708,d=(d<<12|d>>>20)+D<<0,J=(-271733879^d&(-271733879^D))+T[2]-1126478375,J=(J<<17|J>>>15)+d<<0,E=(D^J&(d^D))+T[3]-1316259209,E=(E<<22|E>>>10)+J<<0):(D=_,E=w,J=B,d=C,D+=(d^E&(J^d))+T[0]-680876936,D=(D<<7|D>>>25)+E<<0,d+=(J^D&(E^J))+T[1]-389564586,d=(d<<12|d>>>20)+D<<0,J+=(E^d&(D^E))+T[2]+606105819,J=(J<<17|J>>>15)+d<<0,E+=(D^J&(d^D))+T[3]-1044525330,E=(E<<22|E>>>10)+J<<0),D+=(d^E&(J^d))+T[4]-176418897,D=(D<<7|D>>>25)+E<<0,d+=(J^D&(E^J))+T[5]+1200080426,d=(d<<12|d>>>20)+D<<0,J+=(E^d&(D^E))+T[6]-1473231341,J=(J<<17|J>>>15)+d<<0,E+=(D^J&(d^D))+T[7]-45705983,E=(E<<22|E>>>10)+J<<0,D+=(d^E&(J^d))+T[8]+1770035416,D=(D<<7|D>>>25)+E<<0,d+=(J^D&(E^J))+T[9]-1958414417,d=(d<<12|d>>>20)+D<<0,J+=(E^d&(D^E))+T[10]-42063,J=(J<<17|J>>>15)+d<<0,E+=(D^J&(d^D))+T[11]-1990404162,E=(E<<22|E>>>10)+J<<0,D+=(d^E&(J^d))+T[12]+1804603682,D=(D<<7|D>>>25)+E<<0,d+=(J^D&(E^J))+T[13]-40341101,d=(d<<12|d>>>20)+D<<0,J+=(E^d&(D^E))+T[14]-1502002290,J=(J<<17|J>>>15)+d<<0,E+=(D^J&(d^D))+T[15]+1236535329,E=(E<<22|E>>>10)+J<<0,D+=(J^d&(E^J))+T[1]-165796510,D=(D<<5|D>>>27)+E<<0,d+=(E^J&(D^E))+T[6]-1069501632,d=(d<<9|d>>>23)+D<<0,J+=(D^E&(d^D))+T[11]+643717713,J=(J<<14|J>>>18)+d<<0,E+=(d^D&(J^d))+T[0]-373897302,E=(E<<20|E>>>12)+J<<0,D+=(J^d&(E^J))+T[5]-701558691,D=(D<<5|D>>>27)+E<<0,d+=(E^J&(D^E))+T[10]+38016083,d=(d<<9|d>>>23)+D<<0,J+=(D^E&(d^D))+T[15]-660478335,J=(J<<14|J>>>18)+d<<0,E+=(d^D&(J^d))+T[4]-405537848,E=(E<<20|E>>>12)+J<<0,D+=(J^d&(E^J))+T[9]+568446438,D=(D<<5|D>>>27)+E<<0,d+=(E^J&(D^E))+T[14]-1019803690,d=(d<<9|d>>>23)+D<<0,J+=(D^E&(d^D))+T[3]-187363961,J=(J<<14|J>>>18)+d<<0,E+=(d^D&(J^d))+T[8]+1163531501,E=(E<<20|E>>>12)+J<<0,D+=(J^d&(E^J))+T[13]-1444681467,D=(D<<5|D>>>27)+E<<0,d+=(E^J&(D^E))+T[2]-51403784,d=(d<<9|d>>>23)+D<<0,J+=(D^E&(d^D))+T[7]+1735328473,J=(J<<14|J>>>18)+d<<0,E+=(d^D&(J^d))+T[12]-1926607734,E=(E<<20|E>>>12)+J<<0,M=E^J,D+=(M^d)+T[5]-378558,D=(D<<4|D>>>28)+E<<0,d+=(M^D)+T[8]-2022574463,d=(d<<11|d>>>21)+D<<0,U=d^D,J+=(U^E)+T[11]+1839030562,J=(J<<16|J>>>16)+d<<0,E+=(U^J)+T[14]-35309556,E=(E<<23|E>>>9)+J<<0,M=E^J,D+=(M^d)+T[1]-1530992060,D=(D<<4|D>>>28)+E<<0,d+=(M^D)+T[4]+1272893353,d=(d<<11|d>>>21)+D<<0,U=d^D,J+=(U^E)+T[7]-155497632,J=(J<<16|J>>>16)+d<<0,E+=(U^J)+T[10]-1094730640,E=(E<<23|E>>>9)+J<<0,M=E^J,D+=(M^d)+T[13]+681279174,D=(D<<4|D>>>28)+E<<0,d+=(M^D)+T[0]-358537222,d=(d<<11|d>>>21)+D<<0,U=d^D,J+=(U^E)+T[3]-722521979,J=(J<<16|J>>>16)+d<<0,E+=(U^J)+T[6]+76029189,E=(E<<23|E>>>9)+J<<0,M=E^J,D+=(M^d)+T[9]-640364487,D=(D<<4|D>>>28)+E<<0,d+=(M^D)+T[12]-421815835,d=(d<<11|d>>>21)+D<<0,U=d^D,J+=(U^E)+T[15]+530742520,J=(J<<16|J>>>16)+d<<0,E+=(U^J)+T[2]-995338651,E=(E<<23|E>>>9)+J<<0,D+=(J^(E|~d))+T[0]-198630844,D=(D<<6|D>>>26)+E<<0,d+=(E^(D|~J))+T[7]+1126891415,d=(d<<10|d>>>22)+D<<0,J+=(D^(d|~E))+T[14]-1416354905,J=(J<<15|J>>>17)+d<<0,E+=(d^(J|~D))+T[5]-57434055,E=(E<<21|E>>>11)+J<<0,D+=(J^(E|~d))+T[12]+1700485571,D=(D<<6|D>>>26)+E<<0,d+=(E^(D|~J))+T[3]-1894986606,d=(d<<10|d>>>22)+D<<0,J+=(D^(d|~E))+T[10]-1051523,J=(J<<15|J>>>17)+d<<0,E+=(d^(J|~D))+T[1]-2054922799,E=(E<<21|E>>>11)+J<<0,D+=(J^(E|~d))+T[8]+1873313359,D=(D<<6|D>>>26)+E<<0,d+=(E^(D|~J))+T[15]-30611744,d=(d<<10|d>>>22)+D<<0,J+=(D^(d|~E))+T[6]-1560198380,J=(J<<15|J>>>17)+d<<0,E+=(d^(J|~D))+T[13]+1309151649,E=(E<<21|E>>>11)+J<<0,D+=(J^(E|~d))+T[4]-145523070,D=(D<<6|D>>>26)+E<<0,d+=(E^(D|~J))+T[11]-1120210379,d=(d<<10|d>>>22)+D<<0,J+=(D^(d|~E))+T[2]+718787259,J=(J<<15|J>>>17)+d<<0,E+=(d^(J|~D))+T[9]-343485551,E=(E<<21|E>>>11)+J<<0,F?(_=D+1732584193<<0,w=E-271733879<<0,B=J-1732584194<<0,C=d+271733878<<0,F=!1):(_=_+D<<0,w=w+E<<0,B=B+J<<0,C=C+d<<0)}while(!H);if(A){var G=y[_>>4&15]+y[15&_];return G+=y[_>>12&15]+y[_>>8&15],G+=y[_>>20&15]+y[_>>16&15],G+=y[_>>28&15]+y[_>>24&15],G+=y[w>>4&15]+y[15&w],G+=y[w>>12&15]+y[w>>8&15],G+=y[w>>20&15]+y[w>>16&15],G+=y[w>>28&15]+y[w>>24&15],G+=y[B>>4&15]+y[15&B],G+=y[B>>12&15]+y[B>>8&15],G+=y[B>>20&15]+y[B>>16&15],G+=y[B>>28&15]+y[B>>24&15],G+=y[C>>4&15]+y[15&C],G+=y[C>>12&15]+y[C>>8&15],G+=y[C>>20&15]+y[C>>16&15],G+=y[C>>28&15]+y[C>>24&15]}return y[_>>4&15]+y[15&_]+y[_>>12&15]+y[_>>8&15]+y[_>>20&15]+y[_>>16&15]+y[_>>28&15]+y[_>>24&15]+y[w>>4&15]+y[15&w]+y[w>>12&15]+y[w>>8&15]+y[w>>20&15]+y[w>>16&15]+y[w>>28&15]+y[w>>24&15]+y[B>>4&15]+y[15&B]+y[B>>12&15]+y[B>>8&15]+y[B>>20&15]+y[B>>16&15]+y[B>>28&15]+y[B>>24&15]+y[C>>4&15]+y[15&C]+y[C>>12&15]+y[C>>8&15]+y[C>>20&15]+y[C>>16&15]+y[C>>28&15]+y[C>>24&15]};if(!a.JS_MD5_TEST&&c){var B=require("crypto"),C=require("buffer").Buffer;module.exports=function(a){return"string"==typeof a?a.length<=80?w(a):a.length<=183&&!/[^\x00-\x7F]/.test(a)?w(a):B.createHash("md5").update(a,"utf8").digest("hex"):(a.constructor==ArrayBuffer&&(a=new Uint8Array(a)),a.length<=370?w(a):B.createHash("md5").update(new C(a)).digest("hex"))}}else a&&(a.md5=w)}(this);
/*!common/components/checkbox/jquery.checkbox.js*/
;define("common/components/checkbox/jquery.checkbox",["require","exports","module"],function(){+function(c){"use strict";function a(){c(k).parent().addClass("box_checkbox"),c(k).before("<span></span>");c(k).parent().find("span").addClass("checkbox_icon");c(k).parent().each(function(){var a=c(this).children(":checkbox").attr("data-text");c(this).children(":checkbox").after(a),c(this).children().hasClass("screenbox")?c(this).parent().find("span").css({"background-position":"-27px 0",width:"15px"}):(c(this).parent().find("span").css("background-position","-13px 3px"),c(this).parent().find("input").attr("checked","checked"))})}function h(a){return this.each(function(){var h=c(this),k=h.data("lg.checkbox");k||h.data("lg.checkbox",k=new b(this)),"string"==typeof a&&k[a].call(h)})}var k=".checkbox",b=function(c){c.on("click.lg.checkbox",this.checkbox)};b.prototype.checkbox=function(){var a=c(this);a.is(":checked")?a.hasClass("screenbox")?a.parent().find("span").css({"background-position":"-42px 0",width:"18px"}):a.parent().find("span").css("background-position","-13px 3px"):a.hasClass("screenbox")?a.parent().find("span").css({"background-position":"-27px 0",width:"15px"}):a.parent().find("span").css("background-position","0 3px")};var g=c.fn.checkbox;c.fn.checkbox=h,c.fn.checkbox.Constructor=b,c.fn.checkbox.noConflict=function(){return c.fn.checkbox=g,this},a(),c(document).on("click.lg.click",k,b.prototype.checkbox)}(jQuery)});
/*!dep/jquery-placeholder/jquery.placeholder.js*/
;!function(a){"function"==typeof define&&define.amd?define("dep/jquery-placeholder/jquery.placeholder",["jquery"],a):a("object"==typeof module&&module.exports?require("jquery"):jQuery)}(function(a){function c(c){var h={},v=/^jQuery\d+$/;return a.each(c.attributes,function(i,a){a.specified&&!v.test(a.name)&&(h[a.name]=a.value)}),h}function h(c,h){var v=this,b=a(this);if(v.value===b.attr(w?"placeholder-x":"placeholder")&&b.hasClass(H.customClass))if(v.value="",b.removeClass(H.customClass),b.data("placeholder-password")){if(b=b.hide().nextAll('input[type="password"]:first').show().attr("id",b.removeAttr("id").data("placeholder-id")),c===!0)return b[0].value=h,h;b.focus()}else v==y()&&v.select()}function v(v){var y,b=this,C=a(this),j=b.id;if(!v||"blur"!==v.type||!C.hasClass(H.customClass))if(""===b.value){if("password"===b.type){if(!C.data("placeholder-textinput")){try{y=C.clone().prop({type:"text"})}catch(e){y=a("<input>").attr(a.extend(c(this),{type:"text"}))}y.removeAttr("name").data({"placeholder-enabled":!0,"placeholder-password":C,"placeholder-id":j}).bind("focus.placeholder",h),C.data({"placeholder-textinput":y,"placeholder-id":j}).before(y)}b.value="",C=C.removeAttr("id").hide().prevAll('input[type="text"]:first').attr("id",C.data("placeholder-id")).show()}else{var A=C.data("placeholder-password");A&&(A[0].value="",C.attr("id",C.data("placeholder-id")).show().nextAll('input[type="password"]:last').hide().removeAttr("id"))}C.addClass(H.customClass),C[0].value=C.attr(w?"placeholder-x":"placeholder")}else C.removeClass(H.customClass)}function y(){try{return document.activeElement}catch(a){}}var b,C,w=!1,j="[object OperaMini]"===Object.prototype.toString.call(window.operamini),A="placeholder"in document.createElement("input")&&!j&&!w,g="placeholder"in document.createElement("textarea")&&!j&&!w,E=a.valHooks,k=a.propHooks,H={};A&&g?(C=a.fn.placeholder=function(){return this},C.input=!0,C.textarea=!0):(C=a.fn.placeholder=function(c){var y={customClass:"placeholder"};return H=a.extend({},y,c),this.filter((A?"textarea":":input")+"["+(w?"placeholder-x":"placeholder")+"]").not("."+H.customClass).not(":radio, :checkbox, [type=hidden]").bind({"focus.placeholder":h,"blur.placeholder":v}).data("placeholder-enabled",!0).trigger("blur.placeholder")},C.input=A,C.textarea=g,b={get:function(c){var h=a(c),v=h.data("placeholder-password");return v?v[0].value:h.data("placeholder-enabled")&&h.hasClass(H.customClass)?"":c.value},set:function(c,b){var C,w,j=a(c);return""!==b&&(C=j.data("placeholder-textinput"),w=j.data("placeholder-password"),C?(h.call(C[0],!0,b)||(c.value=b),C[0].value=b):w&&(h.call(c,!0,b)||(w[0].value=b),c.value=b)),j.data("placeholder-enabled")?(""===b?(c.value=b,c!=y()&&v.call(c)):(j.hasClass(H.customClass)&&h.call(c),c.value=b),j):(c.value=b,j)}},A||(E.input=b,k.value=b),g||(E.textarea=b,k.value=b),a(function(){a(document).delegate("form","submit.placeholder",function(){var c=a("."+H.customClass,this).each(function(){h.call(this,!0,"")});setTimeout(function(){c.each(v)},10)})}),a(window).bind("beforeunload.placeholder",function(){var c=!0;try{"javascript:void(0)"===document.activeElement.toString()&&(c=!1)}catch(h){}c&&a("."+H.customClass).each(function(){this.value=""})}))});
/*!pc/page/register/main.js*/
;define("pc/page/register/main",["require","exports","module","common/components/checkbox/jquery.checkbox","dep/jquery-placeholder/jquery.placeholder"],function(require){function a(e){var a=e,F=a.parent.CollectData(),c="veenike";F.isValidate&&(F.password=md5(F.password),F.password=md5(c+F.password+c),$.ajax({url:a.control._option.url,data:F,type:"post",dataType:"json",cache:!1}).done(function(F){var c={1:{message:"鎴愬姛",linkFor:"phoneVerificationCode",level:"info"},220:{message:"璇疯緭鍏ユ湁鏁堢殑閭鍦板潃",linkFor:"email",level:"error"},211:{message:"璇疯緭鍏�6-16浣嶅瘑鐮侊紝瀛楁瘝鍖哄垎澶у皬鍐�",linkFor:"password",level:"error"},222:{message:"璇疯緭鍏�11浣嶅ぇ闄嗗湴鍖烘墜鏈哄彿鐮�",linkFor:"phoneVerificationCode",level:"error"},240:{message:"璇疯緭鍏ュ父鐢ㄩ偖绠卞湴鍧€鎴栬€呮墜鏈哄彿鐮�",linkFor:"phoneVerificationCode",level:"error"},241:{message:"璇疯緭鍏ュ瘑鐮�",linkFor:"password",level:"error"},243:{message:"璇烽€夋嫨浣跨敤鎷夊嬀鐨勭洰鐨�",linkFor:"type",level:"error"},244:{message:"璇疯緭鍏�6浣嶆暟瀛楅獙璇佺爜",linkFor:"phoneVerificationCode",level:"error"},245:{message:"璇疯緭鍏�6浣嶆暟瀛楅獙璇佺爜",linkFor:"phoneVerificationCode",level:"error"},299:{message:"浣犵殑鎿嶄綔澶繃棰戠箒锛岃绋嶅悗鍐嶈瘯",linkFor:"phoneVerificationCode",level:"error"},400:{message:"璇ラ偖绠卞凡琚敞鍐岋紝璇烽噸鏂拌緭鍏ユ垨鐩存帴鐧诲綍",linkFor:"email",level:"error"},401:{message:"楠岃瘉鐮佷笉姝ｇ‘",linkFor:"phoneVerificationCode",level:"error"},402:{message:"楠岃瘉鐮佷笉姝ｇ‘",linkFor:"phoneVerificationCode",level:"error"},403:{message:"绯荤粺閿欒",linkFor:"phoneVerificationCode",level:"error"},405:{message:"璇ユ墜鏈哄凡琚敞鍐岋紝璇烽噸鏂拌緭鍏ユ垨鐩存帴鐧诲綍",linkFor:"phone",level:"error"},498:{message:"绯荤粺閿欒",linkFor:"protocol",level:"error"},499:{message:"绯荤粺閿欒",linkFor:"protocol",level:"error"},501:{message:"绯荤粺閿欒",linkFor:"phoneVerificationCode",level:"error"},502:{message:"绯荤粺閿欒",linkFor:"protocol",level:"error"},10010:{message:"楠岃瘉鐮佷笉姝ｇ‘",linkFor:"request_form_verifyCode",level:"error"},10011:{message:"绯荤粺閿欒",linkFor:"protocol",level:"error"},10012:{message:"绯荤粺閿欒",linkFor:"protocol",level:"error"}};if(c[F.state]&&1!=F.state&&a.parent.field[c[F.state].linkFor].showMessage({message:c[F.state].message}),10010!=F.state||a.parent.field.request_form_verifyCode.getIsVisible()||(a.parent.field.request_form_verifyCode.getVerifyCode(),a.parent.field.request_form_verifyCode.setVisible(!0)),1==F.state){var g="/grantServiceTicket/grant.html";window.location.href=g}else a.parent.field.request_form_verifyCode.getIsVisible()&&a.parent.field.request_form_verifyCode.getVerifyCode()}))}require("common/components/checkbox/jquery.checkbox"),require("dep/jquery-placeholder/jquery.placeholder"),$("input").placeholder();var F=$(".form_head > li"),c=$(".form_body");F.parent().append('<span class="tab_active"></span>'),F.each(function(i){$(this).click(function(){$(this).not(":visible")?($(this).addClass("active").siblings().removeClass("active"),$(this).siblings(".tab_active").stop().animate({left:$(this).offsetParent().context.offsetLeft},400),c.eq(i).show().siblings(".form_body").hide(),g.setClear(),v.setClear()):($(this).addClass("active").siblings().removeClass("active"),c.eq(i).show().siblings(".form_body").hide())})}),$(".input_item > .btn_outline").each(function(){$(this).click(function(){$(this).addClass("btn_active").siblings().removeClass("btn_active")})});var g=new lg.Views.BaseView({name:"phoneRegister",fields:[{name:"phone",validRules:[{mode:"require",data:"",message:"璇疯緭鍏ユ墜鏈哄彿鐮�",trigger:"blur"},{mode:"pattern",isUse:!0,status:!1,data:{phone:/^(0|86|17951)?((13[0-9]|15[012356789]|17[0135678]|18[0-9]|14[57])[0-9]{8})$/},message:"璇疯緭鍏�11浣嶅ぇ闄嗗湴鍖烘墜鏈哄彿鐮�"}],controlType:"Phone"},{name:"phoneVerificationCode",linkFor:"phone",verifyCode:"request_form_verifyCode",totalTips:"璇ユ墜鏈鸿幏鍙栭獙璇佺爜宸茶揪涓婇檺锛岃鏄庡ぉ鍐嶈瘯",validRules:[{mode:"require",data:"",message:"璇疯緭鍏�6浣嶆暟瀛楅獙璇佺爜"},{mode:"pattern",isUse:!0,status:!1,data:"/^[0-9]{6,6}$/",message:"璇疯緭鍏�6浣嶆暟瀛楅獙璇佺爜"}],url:"/register/getPhoneVerificationCode.json",controlType:"PhoneVerificationCode",click:function(e){var a=e;console.log(a.control.totalTimeTemp),(-1==a.control.totalTimeTemp||a.control.totalTimeTemp==a.control.getTopTime())&&$.ajax({url:a.control._option.url,data:{phone:a.linkFor.getValue(),request_form_verifyCode:lg.Cache.Views[a.control._option.parentName].field.request_form_verifyCode.getValue()},dataType:"json",cache:!1}).done(function(F){var c={1:{message:"楠岃瘉鐮佸凡鍙戦€侊紝璇锋煡鏀剁煭淇�",linkFor:"phoneVerificationCode",level:"info"},220:{message:"璇疯緭鍏�11浣嶅ぇ闄嗗湴鍖烘墜鏈哄彿鐮�",linkFor:"phone",level:"error"},221:{message:"绯荤粺閿欒",linkFor:"phoneVerificationCode",level:"error"},222:{message:"璇ユ墜鏈哄凡琚敞鍐岋紝璇烽噸鏂拌緭鍏ユ垨鐩存帴鐧诲綍",linkFor:"phone",level:"error"},310:{message:"璇ユ墜鏈鸿幏鍙栭獙璇佺爜宸茶揪涓婇檺锛岃鏄庡ぉ鍐嶈瘯",linkFor:"phoneVerificationCode",level:"error"},311:{message:"鐢ㄦ埛鑾峰彇楠岃瘉鐮侀鐜囪繃楂橈紝璇风◢鍚庡啀璇�",linkFor:"phoneVerificationCode",level:"error"},240:{message:"璇疯緭鍏ユ墜鏈哄彿鐮�",linkFor:"phone",level:"error"},500:{message:"绯荤粺閿欒",linkFor:"phoneVerificationCode",level:"error"},10010:{message:"楠岃瘉鐮佷笉姝ｇ‘",linkFor:"request_form_verifyCode",level:"error"},10011:{message:"绯荤粺閿欒",linkFor:"phoneVerificationCode",level:"error"},10012:{message:"绯荤粺閿欒",linkFor:"phoneVerificationCode",level:"error"}};c[F.state]&&a.parent.field[c[F.state].linkFor].showMessage({message:c[F.state].message}),10010!=F.state||a.parent.field.request_form_verifyCode.getIsVisible()||(a.parent.field.request_form_verifyCode.getVerifyCode(),a.parent.field.request_form_verifyCode.setVisible(!0)),1==F.state?e.control.starttime(e.control):(e.control.init(),a.parent.field.request_form_verifyCode.getIsVisible()&&a.parent.field.request_form_verifyCode.getVerifyCode()),0==F.state&&a.parent.field.request_form_verifyCode.getIsVisible()&&a.parent.field.request_form_verifyCode.getVerifyCode(),e.control.setDisable(!1)})}},{name:"password",validRules:[{mode:"require",data:"",message:"璇疯緭鍏ュ瘑鐮�"},{mode:"pattern",data:"/^[\\S\\s]{6,16}$/",message:"璇疯緭鍏�6-16浣嶅瘑鐮侊紝瀛楁瘝鍖哄垎澶у皬鍐�"}],controlType:"Password"},{name:"type",validRules:[{mode:"require",data:"",message:"璇烽€夋嫨浣跨敤鎷夊嬀鐨勭洰鐨�"}],controlType:"Switch"},{name:"protocol",validRules:[{mode:"require",data:"",message:"璇锋帴鍙楁媺鍕剧敤鎴峰崗璁�"}],controlType:"CheckBox"},{name:"request_form_verifyCode",isVisible:!1,validRules:[{mode:"require",data:"",message:"璇疯緭鍏ラ獙璇佺爜"},{mode:"pattern",data:"/^[a-zA-Z0-9]{4,4}$/",message:"璇疯緭鍏ユ纭殑楠岃瘉鐮�"}],from:"register",url:"https://passport.lagou.com/vcode/create",controlType:"VerifyCode"},{name:"submit",validRules:[],controlType:"Button",url:"/register/register.json",click:a}]}),v=new lg.Views.BaseView({name:"emailRegister",fields:[{name:"email",validRules:[{mode:"require",data:"",message:"璇疯緭鍏ュ父鐢ㄩ偖绠卞湴鍧€"},{mode:"pattern",isUse:!0,status:!1,data:{email:/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i},message:"璇疯緭鍏ユ湁鏁堢殑閭鍦板潃"}],controlType:"Email"},{name:"password",validRules:[{mode:"require",data:"",message:"璇疯緭鍏ュ瘑鐮�"},{mode:"pattern",data:"/^[\\S\\s]{6,16}$/",message:"璇疯緭鍏�6-16浣嶅瘑鐮侊紝瀛楁瘝鍖哄垎澶у皬鍐�"}],controlType:"Password"},{name:"request_form_verifyCode",isVisible:!1,validRules:[{mode:"require",data:"",message:"璇疯緭鍏ラ獙璇佺爜"},{mode:"pattern",data:"/^[a-zA-Z0-9]{4,4}$/",message:"璇疯緭鍏ユ纭殑楠岃瘉鐮�"}],from:"register",url:"https://passport.lagou.com/vcode/create",controlType:"VerifyCode"},{name:"type",validRules:[{mode:"require",data:"",message:"璇烽€夋嫨浣跨敤鎷夊嬀鐨勭洰鐨�"}],controlType:"Switch"},{name:"protocol",validRules:[{mode:"require",data:"",message:"璇锋帴鍙楁媺鍕剧敤鎴峰崗璁�"}],controlType:"CheckBox"},{name:"submit",validRules:[],controlType:"Button",url:"/register/register.json",click:a}],callback:lg.submit_func}),C=$("#isVisiable_request_form_verifyCode").val(),h=$("#is_must_show_verify_code").val();if("true"==C||"true"==h){g.field.request_form_verifyCode.getVerifyCode(),g.field.request_form_verifyCode.setVisible(!0);{$(".content_box")}$(".content_box").css("height",$("#content_box").css("height")+30)}"true"==C&&v.field.request_form_verifyCode.setVisible(!0)});
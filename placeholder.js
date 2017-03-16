$(function(){
	$.fn.extend({
        placeholder:function(config){
            /**
             * 当没有传任何参数时默认为空对象
             * @type {Object}
             */
            if(!config) config = {};

            /**
             * 字体大小
             * @type {[type]}
             */
            var fontSize = config.fontSize?config.fontSize:16;

            /**
             * line-height 可手动调节
             * @type {[type]}
             */
            var lineHeight = config.lineHeight?config.lineHeight:34;

            /**
             * 右下角文字距左侧的距离
             * @type {[type]}
             */
            var llen = config.llen?config.llen:30;

            /**
             * placeholder文字距离左侧的距离
             * @type {[type]}
             */
            var xlen = config.xlen?config.xlen:13;
            var changeAttr = false;
            var _this = this;
            // ie9存在bug,当内容减少时不会触发
            _this.bind('input propertychange', function(){
                var input = $(this);
                var txt = input.val();
                var num = parseInt(input.attr("data-num"));
                var len = txt.length;
                if(txt == '' || typeof(txt) == undefined){
                    input.attr("clr",0);// 为0时说为空
                    input.prev().show();
                }
                if(len>0 && input.attr("clr") == 0 && changeAttr == true){
                    input.prev().hide();
                    input.attr("clr",1);// 为1时不为空
                }
                if(len>num && input.attr("data-num") != undefined){
                    var newtxt = txt.substr(0, num);
                    input.val(newtxt);
                }
                if(input.attr("data-num") != undefined && num>=len){
                    input.next().html('(剩'+(num-len)+'字)');
                }
            });
            _this.each(function(k,v){
                var vobj = $(v);
                var vtxt = vobj.val();
                var div = document.createElement("div");
                var vw = vobj.width();
                var vh = vobj.outerHeight();
                var tip = vobj.attr("data-tip") == undefined?"(限"+vobj.attr("data-num")+"字)":vobj.attr("data-tip");
                vobj.parent().css({"position":"relative"});
                vobj.css({"position":"relative"});
                var vl = vobj.position().left;
                $(div).css({"position":"absolute","left":(vl+xlen)+"px","top":"0px","width":vw+"px","height":vh+"px","font-size":fontSize+"px","line-height":lineHeight+"px","color":"#999999","pointer-events":"none","z-index":"1"}).html(tip);
                if(vtxt == '' || typeof(vtxt) == undefined){
                    vobj.attr("clr",0);// 为0时为空
                    $(div).css({"display":"block"});
                }else{
                    vobj.attr("clr",1);// 为1时不为空
                    $(div).css({"display":"none"});
                }
                vobj.before(div);
                if(vobj.attr("data-num") != undefined){
                    var cDiv = document.createElement("div");
                    cDiv.className = 'cDiv';
                    $(cDiv).css({"position":"absolute","left":(vl+vw-llen)+"px","top":(vh-16)+"px","width":"auto","height":"auto","color":"#999999","pointer-events":"none","font-size":"12px","z-index":"2"}).html('(剩'+(parseInt(vobj.attr("data-num"))-vtxt.length)+'字)');
                    vobj.after(cDiv);
                }
            });
            _this.focus(function(){
                changeAttr = true;
            });
            _this.resize(function(){
                _this.each(function(k,v){
                    var vobj = $(v);
                    var vl = vobj.position().left;
                    var vw = vobj.width();
                    var vh = vobj.outerHeight();
                    vobj.prev().css({"left":(vl+xlen)+"px"});
                    vobj.next(".cDiv").css({"left":(vl+vw-llen)+"px","top":(vh-16)+"px"});
                });
            });
        }
    });
})
//隐藏底部多余空白
$(function(){
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        WeixinJSBridge.call('hideToolbar');
    });		
})
function htmlEncode(e){
	alert('000');
    return e.replace(/&/g,"&amp;").replace(/ /g,"&nbsp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\n/g,"<br />").replace(/"/g,"&quot;")
}
function htmlDecode(e){
	alert('111');
    return e.replace(/&#39;/g,"'").replace(/<br\s*(\/)?\s*>/g,"\n").replace(/&nbsp;/g," ").replace(/&lt;/g,"<").replace(/&gt;/g,">").replace(/&quot;/g,'"').replace(/&amp;/g,"&")
}
function parseParams(e){
    e==undefined&&(e=window.location.search);
    var t=e.replace(/^\?/,"").split("&"),n=0,r,i={},s,o,u;
    while((r=t[n++])!==undefined)s=r.match(/^([^=&]*)=(.*)$/),s&&(o=decodeURIComponent(s[1]),u=decodeURIComponent(s[2]),i[o]=u);
    return i
}
function parseUrl(e){
    var t=new RegExp("(http[s]{0,1}|ftp)://([a-zA-Z0-9\\.\\-]+\\.[a-zA-Z]{2,4})(:\\d+)?(/[a-zA-Z0-9\\.\\-~!@#$%^&amp;*+:_/<>]*)?([\\?a-zA-Z0-9\\.\\-~!@$%^&amp;*+?:_/<>=]*)?(#\\w+)?"),n=e.match(t);
    return n!=null?{
        protocol:n[1],
        domain:n[2],
        port:n[3],
        path:n[4],
        query_str:n[5],
        sharp:n[6]
    }:null
}
function replaceEmoji(e){
    var t={
        url:"http://res.mail.qq.com/zh_CN/images/mo/DEFAULT2/",
        data:{
            0:"微笑",
            1:"撇嘴",
            2:"色",
            3:"发呆",
            4:"得意",
            5:"流泪",
            6:"害羞",
            7:"闭嘴",
            8:"睡",
            9:"大哭",
            10:"尴尬",
            11:"发怒",
            12:"调皮",
            13:"呲牙",
            14:"惊讶",
            15:"难过",
            16:"酷",
            17:"冷汗",
            18:"抓狂",
            19:"吐",
            20:"偷笑",
            21:"可爱",
            22:"白眼",
            23:"傲慢",
            24:"饥饿",
            25:"困",
            26:"惊恐",
            27:"流汗",
            28:"憨笑",
            29:"大兵",
            30:"奋斗",
            31:"咒骂",
            32:"疑问",
            33:"嘘",
            34:"晕",
            35:"折磨",
            36:"衰",
            37:"骷髅",
            38:"敲打",
            39:"再见",
            40:"擦汗",
            41:"抠鼻",
            42:"鼓掌",
            43:"糗大了",
            44:"坏笑",
            45:"左哼哼",
            46:"右哼哼",
            47:"哈欠",
            48:"鄙视",
            49:"委屈",
            50:"快哭了",
            51:"阴险",
            52:"亲亲",
            53:"吓",
            54:"可怜",
            55:"菜刀",
            56:"西瓜",
            57:"啤酒",
            58:"篮球",
            59:"乒乓",
            60:"咖啡",
            61:"饭",
            62:"猪头",
            63:"玫瑰",
            64:"凋谢",
            65:"示爱",
            66:"爱心",
            67:"心碎",
            68:"蛋糕",
            69:"闪电",
            70:"炸弹",
            71:"刀",
            72:"足球",
            73:"瓢虫",
            74:"便便",
            75:"月亮",
            76:"太阳",
            77:"礼物",
            78:"拥抱",
            79:"强",
            80:"弱",
            81:"握手",
            82:"胜利",
            83:"抱拳",
            84:"勾引",
            85:"拳头",
            86:"差劲",
            87:"爱你",
            88:"NO",
            89:"OK",
            90:"爱情",
            91:"飞吻",
            92:"跳跳",
            93:"发抖",
            94:"怄火",
            95:"转圈",
            96:"磕头",
            97:"回头",
            98:"跳绳",
            99:"挥手",
            100:"激动",
            101:"街舞",
            102:"献吻",
            103:"左太极",
            104:"右太极"
        },
        ext:".gif"
    },n,r,i=t.url,s=t.ext,o=t.data;
    for(n in o)r=new RegExp("/"+o[n],"g"),e=e.replace(r,'<img src="'+i+n+s+'" alt="mo-'+o[n]+'"/>');return e
};


//window.onload=function()
//{
//	alert(document.getElementById['box'].innerHTML);
//	alert(document.getElementsByName('sex')[0].value);
//	alert(document.getElementsByTagName('p'[0].innerHTML));
//
//
//}
//封装
function $(id)
{
	return document.getElementById(id);
}
var Base={
		
		$:function(id)
		{
			return document.getElementById(id);
		},
		$$:function(){
			return document.getElementsByName(name);
		},
		$$$:function()
		{
			return document.getElementsByTagName(tag);
		}
		
			
}
window.onload=function ()
{
	alert(Base.$('box'));
}
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
	<script type = "text/javascript">
	var str = "he1111ll111o1111wwwwww11111";
	
	//｛n，m｝表示前面指定字符出现次数 大于等于n 小于m
	var reg = /1{3,5}/gi;
	var res = str.match(reg); //js使用贪婪匹配模式
	str = "11111a111141444"; 
	//＋的使用 匹配1到多
	var reg2= /1+/gi;
    res = str.match(reg2); //js使用贪婪匹配模式
	//
	str = "1111abbb2223332dwwww22s33r33";
	var reg3= /[a-z]/gi;//返回结果是字符串中所有的字母 并逐个作为对象返回结果集
	    reg3= /[a-z]{3}/gi;//从左往右看 匹配3个连续的字符
	    reg3= /[a-zA-Z0-9]/gi;
	    reg3= /[A-Z]/g;//尾部加i的表示查找时是否区分大小写
	res = str.match(reg3);
	
	//
	var reg4=/[^a-z]/gi;//表示匹配任意一个不在a-z范围的字符
	res = str.match(reg4);
	
	var reg5=/[abcd]/gi;
	res = str.match(reg5);
	
	//\d匹配0-9的任意一个字符相当于［0-9］
	
	//\D匹配不在0-9的任意一个字符 [^0-9]
	str = "2346a4bbbb5y3456nygu";
	var reg6=/[(\D){4}]/gi;
	res = str.match(reg6);
	
	//查找空行^$以什么都没有开始，以什么都没有结尾 这就是空行
	
	//.的用法表示\n匹配不到 ，其它都不匹配 那我要匹配.本身怎么办 那需要用转义符
	str = "wdrrw234...wwss526s    ss111";
	var reg7 =/(.)/gi;
	res = str.match(reg7);
	//那我要匹配.本身怎么办 那需要用转义符
	var reg8=/(\.)/gi;
	res = str.match(reg8);
	//\w
	//\W
	//\S匹配任何非空白字符
	var reg9=/([\d\D])\1{2}/gi ;//表示匹配任意三个连续相同的字符
	res = str.match(reg9);
	/* window.alert(res); *///alert出来的是正则出来的字符串数组
	/* \xn x表示16进制 \x21表示查找字符 asc码为16的1次方*2+16的0次方*1=33的字符; */

	//js语言自身带的对象 字符串对象 数组对象 日期对象 js自身的 原型的对象（内部类）
	//js自身的内部类有哪些 
	//array类 string类 Boolen类 正则表达式类 Number类 date类 Math
	//js为了方便开发者 事先提供了一些内部类 内部类分为两类 动态类 和 静态类
	//（Number却有动态类和静态类都有的特点）
	//需要区别的是DOM对象 window 窗口 document 文档
	//动态类使用方法  先创建一个对象实例 然后使用其属性和方法 Array String
	var array = new Array(); //var ar=[1,123,22];
	
	//Object类是javascript类的基类 因此所有的js对象都有object的属性和方法
	//调用方法是
	//静态类使用方法 通过类名直接使用其属性和方法 Match.random();
	
	//两种调用方式都有 Number类
	var num = new Number("12.2333");
	num.toFixed(2);//四舍五入
	
	var obj = new Object();
	for  (var key in obj)
		{
		
		
		};
	function Person()
	{
		this.name="abc";
		this.age=34;
		
	};
	var p1 = new Person();
	var value;
	for(var key in p1)
		{
		value=key;
	};

	//math 的ceil 向上取整；floor 向下取整；
	//random 获取随机数（返回0-1之间的随机数）(包括0不包括1)
	
	var date= new Date();
	var str= date.toLocaleString();
	console.log(str);
 	document.write(str);
	
 	var hour = date.getHours();
	var month = date.getMonth()+1;
	var str1 ="<p>"+hour.toString()+"</p>"+"<p>"+month.toString()+"</p>";
	document.write(str1);
	document.write(str1);  
	
	</script>
	<p>
	正则表达式
	元字符 限定符 用于指定前面的字符和组合后面连续出现多少次
	/a{3}a出现3次  (\d){2}任意数字出现2次
	</p>
</body>
</html>
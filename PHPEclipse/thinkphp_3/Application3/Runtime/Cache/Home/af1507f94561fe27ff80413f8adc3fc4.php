<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
	<script type="text/javascript">
	
	var str="stejd1234kjabcs2589kjdkjiejkabckf5678hkd";
	
	var newStr = str.replace("abc","北京");
	//这样只能把abc子串转成北京
	var regx = /abc/gi;
	//这样把字符串中所有的abc子串转成北京
	newStr = str.replace(regx,"北京");
	
	var reg = /(\d){4}/gi;
	
	newStr = str.split(reg);
	 
	document.write(newStr);
	
	</script>
</body>
</html>
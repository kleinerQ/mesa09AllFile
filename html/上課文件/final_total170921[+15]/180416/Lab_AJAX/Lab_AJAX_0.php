<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="jquery.min.js"></script>
<title>Insert title here</title>
</head>
<body>

<!--
 
畫面左右各有一個下拉式選單，
左邊的下拉式選單若選擇  A 這項時，右邉的下拉式選單要改成 A01, A02, A03, A04, A05;
左邊的下拉式選單若改選  B 這項時，右邉的下拉式選單要改成 B01, B02, B03, B04, B05;
左邊的下拉式選單若改選  C 這項時，右邉的下拉式選單要改成 C01, C02, C03, C04, C05

-->

	<form method="post" action="http://exec.hostzi.com/echo.php">
		<select name="letter" id="letter">
			<option value="0">A</option>
			<option value="1">B</option>
			<option value="2">C</option>
		</select>&nbsp;|&nbsp; 
		<select name="letterNumber" id="letterNumber">
			<option value="0">A01</option>
			<option value="1">B02</option>
			<option value="2">C03</option>
		</select> 
		<input type="submit" value="OK" /> 
		<div id="debug"></div>
	</form>
	
	<script >
		$("#letter").change(function(){
			
			var s= $("#letter option:selected").prop("text");  // var s= $("#letter option:selected").text(); 
			//https://lab-chih-yen.c9users.io/180416/Lab_AJAX/getLetterNumber.php?letter=A
			var data= $.get("https://lab-chih-yen.c9users.io/180416/Lab_AJAX/getLetterNumber.php?letter=" + s ,function(){
				
				$("#letterNumber").append(data);		
				
			});
			
			// var $.get("https://lab-chih-yen.c9users.io/180416/Lab_AJAX/getLetterNumber.php?letter=A",function(data,df){
			 	
				
				
			// });
			
			
			
		});
		
		
	</script>
</body>
</html>
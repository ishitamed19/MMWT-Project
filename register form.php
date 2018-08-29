<html>
<head><style> .x{background-color:black;color:white}</style></head>
<body background="paisley.png">
<center>
<a href="website/home_page.html">
<img src="logo copy.jpg" width="1270" height="150">
</a>
<br>
<h1 class="x"> REGISTER </h1>
<font size=10 face=arial>
<form name="register" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table>
<tr>
	
	<td> First Name: 
	<td><input type=text name="f"></tr>
	<tr>
	<td>Last Name: 
	<td><input type=text name="l"></tr>
	<tr>
	<td>Age: 
	<td><input type=text name="age"></tr>
	<tr>
	<td>Mobile number: 
	<td><input type=text name="mob"></tr>
	<tr>
	<td>Address: 
	<td><textarea name="addr"> </textarea></tr>
	<tr>
	<td>Username:
<td><input type=text name="username"></tr>
<tr>
	<td>Password: 
	<td><input type=text name="pass"></tr>
	<tr><td><input type=submit value="Submit" name="btn1" id="btn1"></tr>
	<tr><td>
<input type=button value="Login" onClick="loginPage()"></tr>
</table>
</form>
</font>
</center>
<script type="text/javascript">
function loginPage(){
	location.href="login.php"

}
 

</script>
<?php

	function updateTable(){
		$f=$_POST['f'];
		$l=$_POST['l'];
		$age=$_POST['age'];
		$mob=$_POST['mob'];
		$add=$_POST['addr'];
		$user=$_POST['username'];
		$pass=$_POST['pass'];
		$s1 = "localhost";
		$u1 = "root";
		$p1 = "root";
		$db = "projectID";
		$uid=uniqid();
		$c = new mysqli($s1,$u1,$p1,$db);
		if($c->connect_error)
		{die("connection failed: ".$c->connect_error);
		}
		$s = "insert into frontform(firstname,lastname, age, number, username, password, uid, adress)
				values ('$f','$l','$age','$mob','$user','$pass','$uid','$add');
				";
		if($c->query($s)===TRUE){
			echo "Registeration successful!"."<br>";
			$s = "select * from frontform;";
			$r = $c->query($s);
	}
	else{
	echo "Error Creating Table: ".$c->error;
	}
	$c->close();
}
	if(isset($_POST['btn1'])){
		updateTable();
	}
?>
</body>
</html>
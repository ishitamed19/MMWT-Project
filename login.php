<html><head><style> .x{background-color:black;color:white}</style></head>
<body background="paisley.png">
<center>
<a href="website/home_page.html">
<img src="logo copy.jpg" width="1270" height="150">
</a>
<br>
<h1 class="x"> Login to view details! </h1>
<font size=10 face=arial>
	<form name="f2" method="post" action="http://localhost/demo/deeish/userdetails.php">
	<table>
	<tr>
	<td>Username: 
	<td> <input type=text name="t1">
	</tr>
	<tr>
	<td>Password: 
	<td><input type=text name="t2">
	</tr>
	<tr>
	<td><input type=submit value="Submit" name="btn1" id="btn1">
	</tr>
	</table>
</form>
</font>
</center>
<?php
function checkLogin(){
		Global $u, $p;
		$u=$_POST['t1'];
		$p=$_POST['t2'];
		$s1 = "localhost";
		$u1 = "root";
		$p1 = "root";
		$db = "projectID";
		$c = new mysqli($s1,$u1,$p1,$db);
		if($c->connect_error){
			die("connection failed: ".$c->connect_error);
		}
		$s = "select * from frontform;";
			$r = $c->query($s);
			if($r->num_rows > 0)
			{
				while($r1 = $r->fetch_assoc())
				{
					
					$u1 = $r1['username'];
					$p1 = $r1['password'];
					
				}
				if(($u==$u1)&&($p==$p1)){
						echo "Login Successful";
						header("Location: http://localhost/demo/deeish/userdetails.php");
						
					}
					else{ echo "Login Failed";}
				
				
			}
			else{echo " not.............";}
			
		$c->close();
	}
	
	
	

	if(isset($_POST['btn1'])){
		checkLogin();
	}
?>
</body>
</html>
<html>
<head><style> .x{background-color:black;color:white}</style></head>
<body background="paisley.png">
<center>
<a href="website/home_page.html">
<img src="logo copy.jpg" width="1270" height="150">
</a>
<br>
<h1 class="x">User Details</h1>
<form>
<input type=button value="Edit" onClick="editPage()">
<input type=button value="Delete" onClick="deletePage()">
</form>
</center>
<script type="text/javascript">
function editPage(){
	location.href="edit.php"

}
function deletePage(){
	location.href="delete.php"

}
 

</script>
</body>
</html>
<?php
		$u=$_POST['t1'];
		$p=$_POST['t2'];
		$s1 = "localhost";
		$u1 = "root";
		$p1 = "root";
		$db = "projectID";
		$pid="";
		$uid="";
		$c = new mysqli($s1,$u1,$p1,$db);
		if($c->connect_error)
		{die("connection failed: ".$c->connect_error);
		}
		$s = "select * from frontform where username='$u' && password='$p';";
		$r = $c->query($s);
		if($r->num_rows > 0){
				while($r1 = $r->fetch_assoc()){
					$use=$r1['username'];
					$pass=$r1['password'];
					if(($u==$use)&&($p==$pass)){
						echo"<center>";
						echo "<h2>";
						echo "Login Successful!"."Welcome,".$r1['firstname']."!";
						echo "</h2>";
						echo "<table border='1'>
							<tr>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Age</th>
							<th>Mobile</th>
							<th>Adress</th>
							</tr>";
							
				
				echo "<tr>";
				echo "<td>" . $r1['firstname'] . "</td>";
				echo "<td>" . $r1['lastname'] . "</td>";
				echo "<td>" . $r1['age'] . "</td>";
				echo "<td>" . $r1['number'] . "</td>";
				echo "<td>" . $r1['adress']."</td>";
				echo "</tr>";
				echo "</table>";
				$uid=$r1['UID'];
						
					}
					else{ echo "Login Failed";}
					
				}
			}
		else{
			echo "0 Results";
		}
		$s2=$c->query("select pcode from booking where uid='$uid';");
		while($r2 = $s2->fetch_assoc()){
			$pid=$r2['pcode'];
		}
		echo"<br>";
		echo"<br>";
		echo "Your order history is:";
		$s3=$c->query("select country, pcost, days from packageinfo where pcode='$pid';");
		while($r3 = $s3->fetch_assoc()){
					echo "<table border='1'>
							<tr>
							<th>Country</th>
							<th>Cost</th>
							<th>Days</th>
							</tr>";
				
				echo "<tr>";
				echo "<td>" . $r3['country'] . "</td>";
				echo "<td>" . $r3['pcost'] . "</td>";
				echo "<td>" . $r3['days'] . "</td>";
				echo "</tr>";
				echo "</table>";
				echo" </center>";
				
				}

	
	
	$c->close();


?>
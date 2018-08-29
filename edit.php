<html>
<head><style> .x{background-color:black;color:white}</style></head>
<body background="upfeathers.png">
<center>
<a href="website/home_page.html">
<img src="logo copy.jpg" width="1270" height="150">
</a>
<h1 class="x">Edit Details</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table>
<tr>
<td> Enter your username 
<td> <input type=text name="u"> 
</tr>
<tr>
<td> Password 
<td> <input type=text name="p"> 
</tr>
</table>
<h2> Now enter your new details. </h2>
<br>
<table>
<tr>
<td> Age 
<td> <input type=text name="age"> 
</tr>
<tr>
<td> Mobile number 
<td> <input type=text name="num"> 
</tr>
<tr>
<td> Address 
<td> <input type=text name="add"> 
</tr>
</table>
<input type=submit value="Edit" name="edit">
</form>
</center>
<?php

	function editDetails(){
		$u=$_POST['u'];
		$p=$_POST['u'];
		$age=$_POST['age'];
		$mob=$_POST['num'];
		$add=$_POST['add'];
		$s1 = "localhost";
		$u1 = "root";
		$p1 = "root";
		$db = "projectID";
		$c = new mysqli($s1,$u1,$p1,$db);
		if($c->connect_error)
		{die("connection failed: ".$c->connect_error);
		}
		$q="update frontform 
		set age='$age', number='$mob', adress='$add' 
		where username='$u';";
		
		if($c->query($q)===TRUE){
			echo "<h2>"."Details updated successfully!!"."</h2>"."<br>";
		/*$s = "select * from frontform where username='$u';";
		$r = $c->query($s);
		if($r->num_rows > 0){
				while($r1 = $r->fetch_assoc()){
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
				echo "<td>" . $r1['adress'] . "</td>";
				echo "<td>" . $r1['number']."</td>";
				echo "</tr>";
				echo "</table>";
				}
			}
		else{
			echo "0 Results";
		}*/
	}
	else{
	echo "Error Updating Table: ".$c->error;
	}
	
	$c->close();
}
	if(isset($_POST['edit'])){
		editDetails();
	}
?>
</body>
</html>
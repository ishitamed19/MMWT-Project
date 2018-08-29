<html>
<head>
<style>
.x{background-color:black;color:white}
.y{background-color:grey;color:white}
</style>
</head>
<body background="paisley.png">
<center>
<a href="website/home_page.html">
<img src="logo copy.jpg" width="1270" height="150">
</a>
<br>
<h1 class="x">BOOK YOUR HOLIDAY</h1>
<br>
<font size=20 face=arial>
	<form name="register" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<table>
	<tr>
	<td>Username:
    <td><input type=text name="f">
	</tr>
	<tr>
	<td>Password:
	<td><input type=text name="l">
	</tr>
	<tr>
	<td>Select your destination:</td>
	<td><select name="opt">
			<option value="sp001">Spain-Rs.1,10,000-(6/7)</option>
			<option value="db002">Dubai-Rs.44,990-(4/5)</option>
			<option value="ir004">Ireland-Rs.40,512-(4/5)</option>
            <option value="lo005">London-Rs.43,990-(3/4)</option>
			<option value="tu003">Turkey-Rs.83,550-(7/8)</option>
			<option value="pa006">Paris-Rs.69,800-(4/5)</option>
		</select></td>
	</tr>
		</table>
	<br><input type=submit value="Buy" name="btn1" id="btn1">
	<br>
	<hr>

</form>
</font>


<?php

	function updateTable(){
		$f=$_POST['f'];
		$l=$_POST['l'];
		$pid=$_POST['opt'];
		$ui="";
		$pcost="";
		$pcountry="";
		$pdays="";
		$s1 = "localhost";
		$u1 = "root";
		$p1 = "root";
		$db = "projectID";
		$c = new mysqli($s1,$u1,$p1,$db);
		if($c->connect_error)
		{die("connection failed: ".$c->connect_error);
		}
		$q=$c->query("select uid from frontform where username='$f' && password='$l'");
		while($q1 = $q->fetch_assoc()){
			$ui=$q1['uid'];
		}
		$s = "insert into booking(uid,pcode)
				values ('$ui','$pid');
				";
		if($c->query($s)===TRUE){
			echo "<h2 class=y>";
			echo "Buying successful!"."<br>";
			$cost=$c->query("select pcost, country, days from packageinfo where pcode='$pid'");
			while($cost1 = $cost->fetch_assoc()){
			$pcost=$cost1['pcost'];
			$pcountry=$cost1['country'];
			$pdays=$cost1['days'];
		}
			echo "Thank you for booking your next holiday to ".$pcountry." for ".$pdays." days/nights"."<br>"."Your total cost is ".$pcost;
			echo "</h2>";
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
</center>
</body>
</html>
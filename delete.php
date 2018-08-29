<html>
<head><style> .x{background-color:black;color:white}</style> </head>
<body background = "upfeathers.png">
<center>
<a href="website/home_page.html">
<img src="logo copy.jpg" width="1270" height="150">
</a>
<h1 class=x>Delete your account</h1>
<h2> Are you sure you want to delete your account?</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Username: <input type=text name="u">
Password: <input type=text name="p">
<input type=submit value="Delete!" name="delete" id="delete">
</form>
</center>
</form>
</center>
<?php

	function deleteDetails(){
		$u=$_POST['u'];
		$p=$_POST['p'];
		$s1 = "localhost";
		$u1 = "root";
		$p1 = "root";
		$db = "projectID";
		$c = new mysqli($s1,$u1,$p1,$db);
		if($c->connect_error)
		{die("connection failed: ".$c->connect_error);
		}
		$q="delete from frontform where username='$u' && password='$p';";
		
		if($c->query($q)===TRUE){
			echo "Account deleted!"."<br>";
	}
	else{
	echo "Error deleting: ".$c->error;
	}
	$c->close();
}
	if(isset($_POST['delete'])){
		deleteDetails();
	}
?>
</body>
</html>
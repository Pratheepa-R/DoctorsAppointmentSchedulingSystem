<?php
	if(isset($_POST['removeid'])){
        	$sid=$_POST['schid'];
        	$conn = mysqli_connect("localhost","root","","doctor");
		$sql="SELECT * from schedule where scheduleid='".$sid."'";
		$result=$conn->query($sql);
        	if($result->num_rows==0){
			header("location:editidcheck.html");
			exit();
		}
		else{
			$sql="DELETE FROM schedule where scheduleid='".$sid."'";
			$conn->query($sql);
			header("location:confirmremove.html");
			exit();
		}
	}
?>
<?php
    if(isset($_POST['signup'])){
        $id=$_COOKIE['userid'];
        $name=$_POST['nam'];
        $date=$_POST['date'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $phone=$_POST['phone'];
	 $email=$_POST['email'];
	 $password=$_POST['p'];
	 $conn = mysqli_connect("localhost","root","","doctor");
        $sql1 = "INSERT INTO users(id, name, dob, age, gender, mobile, email, password) VALUES ('$id','$name','$date','$age','$gender','$phone','$email','$password')";
        $sql2 = "INSERT INTO login(userid, username, password) VALUES('$id','$name','$password')";
	 if($conn->query($sql1)==true and $conn->query($sql2)==true){
		header("location:userlogin.html");
		exit();
		}
	}
?>
	
	  
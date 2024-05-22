<?php
    session_start();
    $userid=$_SESSION["USERID"];
    $schid=$_COOKIE['scheduleid'];
    $conn = mysqli_connect("localhost","root","","doctor");
	$sql="SELECT * from bookings where scheduleid='".$schid."'";
	$result=$conn->query($sql);
    if($result->num_rows==0){
        $sql="SELECT starttime from schedule where scheduleid='".$schid."'";
        $result=$conn->query($sql);
        while($row=mysqli_fetch_assoc($result)){
            $strtime=$row['starttime'];
        }
        $endtime=strtotime("+10 minutes",strtotime($strtime));
        $endtime=date("H:i:s",$endtime);
        $sql="SELECT * from schedule where scheduleid='".$schid."'";
        $result=$conn->query($sql);
        while($row=mysqli_fetch_assoc($result)){
            $maxtime=$row['endtime'];
        }
        $maxtime=strtotime($maxtime);
        $maxtime=date("H:i:s",$maxtime);
        if($endtime<=$maxtime){
            $bsql="INSERT INTO bookings(userid,scheduleid,endtime) VALUES('$userid','$schid','$endtime')";
            $conn->query($bsql);
            header("location:confirmbooking.php");
        }
        else{
            header("location:notbooked.html");
            exit();
        }
    }
    else{
        $sql="SELECT max(endtime) from bookings where scheduleid='".$schid."'";
        $result=$conn->query($sql);
        while($row=mysqli_fetch_assoc($result)){
            $maxtime=$row['max(endtime)'];
        }
        $endtime=strtotime("+10 minutes",strtotime($maxtime));
        $endtime=date("H:i:s",$endtime);
        $sql="SELECT * from schedule where scheduleid='".$schid."'";
        $result=$conn->query($sql);
        while($row=mysqli_fetch_assoc($result)){
            $maxtime=$row['endtime'];
        }
        $maxtime=strtotime($maxtime);
        $maxtime=date("H:i:s",$maxtime);
        if($endtime<=$maxtime){
            $bsql="INSERT INTO bookings(userid,scheduleid,endtime) VALUES('$userid','$schid','$endtime')";
            $conn->query($bsql);
            header("location:confirmbooking.php");
        }
        else{
            header("location:notbooked.html");
            exit();
        }
    }
?>
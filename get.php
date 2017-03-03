<?php

error_reporting(E_ALL);
//mysqli has oops
$db=new mysqli('localhost','root','','social');
//echo $db->connect_errno;

if($db->connect_errno){
	die('Sorry Error Occured');
}


$token=$_POST['token'];

$responce= array();



if($run=$db->query("SELECT  * FROM `resume` WHERE `token` = '".$token."'")){

	if($run->num_rows>0){

		while($row=$run->fetch_assoc()){
			$responce['id']=$row['id'];
			$responce['fname']=$row['fname'];
			$responce['lname']=$row['lname'];
			$responce['phone']=$row['phone'];
			$responce['address']=$row['address'];
			$responce['gender']=$row['gender'];
			$responce['school']=$row['school'];
			$responce['college']=$row['college'];
			$responce['percent']=$row['percent'];
			$responce['meritone']=$row['meritone'];
			$responce['merittwo']=$row['merittwo'];
		$responce['pic']=$row['pic'];
				
		}

		echo json_encode($responce);
	}else{
		echo '101';
	}

}else{
	echo '-1';
}


?>
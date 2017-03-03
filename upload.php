<?php
error_reporting(E_ALL);
//mysqli has oops
$db=new mysqli('localhost','root','','social');
//echo $db->connect_errno;

if($db->connect_errno){
	die('Sorry Error Occured');
}


$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$school=$_POST['school'];
$percent=$_POST['percent'];
$college=$_POST['college'];
$meritone=$_POST['meritone'];
$merittwo=$_POST['merittwo'];
$pic=$_FILES['pic'];
$dirtarget="storage/";


// $idfile=fopen("newid.txt", 'w+') or die ('ERROR');

// $token=fread($idfile, filesize("newid.txt"));

// $t=$token + 1;

// fwrite($idfile, $t);
// fclose($idfile);


$token=file_get_contents("newid.txt");
$t=$token+1;
file_put_contents("newid.txt", $t);
$dirr=$dirtarget.$token.".jpg";
move_uploaded_file($_FILES['pic']['tmp_name'], $dirr);



if($run1=$db->query( "INSERT INTO `resume` (`id`, `fname`, `lname`, `address`, `phone`, `gender`, `school`, `percent`, `college`, `meritone`, `merittwo`, `pic`, `token`) VALUES ('',  '".$fname."',  '".$lname."',  '".$address."',  '".$phone."',  '".$gender."',  '".$school."',  '".$percent."',  '".$college."', '".$meritone."', '".$merittwo."', '".$dirr."','".$token."' )")){
					
				echo $token;
					
				}else{
					echo 'error in query';
				}



?>
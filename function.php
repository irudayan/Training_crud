<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'student');
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}
//Data Insertion Function
	public function insert($name,$fname,$gender,$dob,$course,$emailid,$contactno,$address)
	{
	 // print_r($course);exit;
	$ret=mysqli_query($this->dbh,"insert into registration(Name,FatherName,Gender,DOB,Course,EmailId,ContactNumber,Address) 
												values('$name','$fname','$gender','$dob','$course','$emailid','$contactno','$address')");
	// print_r($ret);exit;
	return $ret;
	}
//Data read Function
public function fetchdata()
	{
	$result=mysqli_query($this->dbh,"select * from registration");
	return $result;
	}
//Data one record read Function
public function fetchonerecord($userid)
	{
	$oneresult=mysqli_query($this->dbh,"select * from registration where id=$userid");
	return $oneresult;
	}
//Data updation Function
public function update($name,$fname,$gender,$dob,$course,$emailid,$contactno,$address,$userid)
	{
	$updaterecord=mysqli_query($this->dbh,"update  registration set Name='$name',FatherName='$fname',
		Gender='$gender',DOB='$dob',Course='$course',EmailId='$emailid',ContactNumber='$contactno',Address='$address' where id='$userid' ");
	return $updaterecord;
	}
//Data Deletion function Function
public function delete($rid)
	{
	$deleterecord=mysqli_query($this->dbh,"delete from registration where id=$rid");
	return $deleterecord;
	}
}
?>
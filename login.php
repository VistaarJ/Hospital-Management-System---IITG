<?php
session_start();
$uname="root";
$host="localhost";
$pass="8787";
$db="iitghospital";

$conn=mysqli_connect($host,$uname,$pass,$db);

if(!$conn)
{
	echo "Unable to connect to database";
	exit;
}

if(isset($_POST['username'])&&isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$username = mysqli_real_escape_string($conn,$username);
	$password = mysqli_real_escape_string($conn,$password);
	if(!empty($username)&&!empty($password))
	{
		//Check whether the given username and password exist in the directory
		$query = "SELECT * FROM staff WHERE username='$username' AND Password='$password'";
		$query_run=mysqli_query($conn,$query);
		if(!$query_run)
			echo 'The query is invalid!' . ' ' . mysql_error() . ' ' . $query;
		else{

			$row_cnt = mysqli_num_rows($query_run);
		if($row_cnt==0)
			echo 'The username/password combination is invaid!';
		else
		{
			while($row = mysqli_fetch_assoc($query_run))
			{
				$user_id = $row["id"];
			}
			$_SESSION['id']=$user_id;
		echo "It is valid, and the id is " . $user_id	;
		}
	}
	}
	else
		echo 'Please enter both the username and password!';
}

        

?>

</fieldset>
</div>
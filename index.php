<?php

//check cookie for remember me value
if (isset($_COOKIE['username'])) {
	session_start();
	$_SESSION['username']=$_COOKIE['username'];
	header('location:welcome.php');
}



//isset => isset function check for existence of variable inside code
//empty => check for empty value of variable


//check if button is clicked or not
if (isset($_POST['btnLogin'])) {

	//check for uname field and it's blank field
	if (isset($_POST['uname']) && !empty($_POST['uname'])) {
		$username= $_POST['uname'];
		//echo 'Username is: '. $_POST['uname'] . '<br>';
	} else{

		//set error variable to display error below
		$erruname =  "Enter Username";
	}

	//check for password as name upass and it's blank value
	if (isset($_POST['upass']) && !empty($_POST['upass'])) {
		$password= $_POST['upass'];
		//echo "Your Password is:".  $_POST['upass'];
	} else {
		$errupass =  "Enter Password";
	}
	if (isset($username) && isset($password)) {
       
        //database connection
        //$obj=new class();
        $conn=new mysqli('localhost','root','','login');
        //echo "<pre>";
        //print_r($conn);
        //if we have array
        //echo $conn['connect_errno']
        //for object
        //check for database connection error
         require_once("connect.php");
         //generate sql query

         $sql="select *from student where username='$username' and password='$password'";
        // //execute query
         //echo "<pre>";
         $a=$conn->query($sql);
         //print_r($res);
         //check for existance of data with num_rows
         if($a->num_rows==1)
         {
         	session_start();

			//save username to session
			$_SESSION['username'] = $username;

			if (isset($_POST['remember']))
			{
				setcookie('username',$username,time()+(7*24*60*60));
			}

			echo "login Success";
			//redirect to welcomepage
			header('location:welcome.php');
         }
         else{
         	echo "login Failed";
         }


	
		// if ($username == 'ram' && $password == 'ramm') {

		// 	//start session to store username into session

		// 	session_start();

		// 	//save username to session
		// 	$_SESSION['username'] = $username;

		// 	if (isset($_POST['remember']))
		// 	{
		// 		setcookie('username',$username,time()+(7*24*60*60));
		// 	}

		// 	echo "login Success";
		// 	//redirect to welcomepage
		// 	header('location:welcome.php');

		// } else {
		// 	echo "Login Failed";
		// }

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Handling</title>
	<!--

		1) action="" attributes in form => 
		2) method="get/post" attributes in form
		3) inside input tag add name="" attribues
		4) if we are using post as a method $_POST array will active 
			if we are using get as  a method $_GET array will active 
	-->
</head>
<body>
<h1>Login Form</h1>

<?php
if (isset($_GET['msg']) && $_GET['msg'] == 1) {
	echo "You have to login To access welcome Page";
}
?>

<form action="" method="post">
<label>Username</label>
<input type="text" name="uname">

<?php 

if (isset($erruname)) {
	echo $erruname;
}


 ?>

<br>

<label>Password</label>
<input type="password" name="upass">

<?php
if (isset($errupass)) {
	echo $errupass;
	
}

 ?> 

<br>
<br>
<input type="checkbox" name="remember" value="remember">Remember Me
<br>
<input type="submit" name="btnLogin">
</form>

</body>
</html>
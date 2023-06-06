<?php

      include('connection.php');
      if($_SERVER["REQUEST_METHOD"]=="POST"){
          $Username = $_POST['username'];
          $Password = $_POST['password'];

		  $sql = "select * from studentinfo where prn='".$Username."' and pass='".$Password."'";

		  $result = mysqli_query($con,$sql);

		  $row = mysqli_fetch_array($result);
		  if($row){
			  
			  header('location:student.php');
			  
			}

          mysqli_close($con);
      }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body  class="bg-gradient-to-r from-cyan-500 to-fuchsia-500">
<div>
	<div class="body-content my-40">
		<div class="module rounded-2xl">
		
			<form name="fm" name ="myForm" action="#" method="POST">
			<h2 class="text-2xl">VIT ClubConnect</h2>
			<div class="uniid">
			<input class="rounded-lg" type="text" name="username" id ="username" placeholder="Username" value="">
			</div>
			<input class="rounded-lg" type="password" name="password" id="password" placeholder="Password" value="">
			<br><br>


			<input type="checkbox" name="remember"/>&nbsp;<span style='color: #8c8c8c;'>Remember me</span>

      <!-- <form name=f1 method=post action=test5.php> -->
      <!-- <input type=hidden name=login_user value='Sign in'>
      <input type='submit' value='Open default action file test5.php' 
	        onclick="this.form.target='_blank';return true;">
      <input type='submit' value='Open test6.php'
	        onclick="fm.action='student.php';  return true;"> -->


			<input type="submit" style="color:black" name="login_user" value="Sign in" class="btn btn-block btn-primary">
            <div class="join">
				
			<span id="c">or, Create Account</span>
			<a href="student_registration.php">Sign up</a>
			</div>
		
		</form>
		</div>
		
	</div>
</div>

</body>
</html>



<?php
      include('connection.php');
	  if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $prn = $_POST['prn'];
          $phone = $_POST['phone'];
          $pass = $_POST['pass'];
          $email = $_POST['email']; 
          $useravatar = $_POST['useravatar'];
        
          $sql = "insert into studentinfo(stud_name,prn,phone,email,pass,avatar) values('$name','$prn','$phone','$email','$pass','$useravatar')";

		  if(mysqli_query($con,$sql)){
			echo '<div class="alert alert-success fade show" role="alert">
				Your account is created successfully!
				</div>';
		
			echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
			echo "<script>";
			// After 3 seconds, hide the alert by removing the 'show' class
			echo "$(document).ready(function() {";
			echo "  setTimeout(function() {";
			echo "    $('.alert').removeClass('show');";
			echo "  }, 3000);";
			echo "});";
			echo "</script>";
		}
          else{
				echo '<div class="alert alert-danger fade show" role="alert">
				Problem in creating account ! Kindly enter correct information.
				</div>';
		
			echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
			echo "<script>";
			// After 3 seconds, hide the alert by removing the 'show' class
			echo "$(document).ready(function() {";
			echo "  setTimeout(function() {";
			echo "    $('.alert').removeClass('show');";
			echo "  }, 3000);";
			echo "});";
			echo "</script>";
			}
			mysqli_close($con);
      }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<script src="https://cdn.tailwindcss.com"></script>


<script type="text/javascript">
	
	function validate(){
	var flag=true;
	
	//alert(document.fm.fileToUpload.value);
	//alert(document.fm.uName.value);
	a = document.getElementById("name-err");
	b = document.getElementById("username-err");
	c = document.getElementById("dept-err");
	d = document.getElementById("dob-err");
	e = document.getElementById("admissionyear-err");
	f = document.getElementById("phone-err");
	g = document.getElementById("email-err");
	h = document.getElementById("password-err");
	i = document.getElementById("avatar-err");
	j = document.getElementById("clubname-err");

	if(document.fm.clubname.value.length==0){
		document.fm.clubname.style.border="1px solid #ff6666";
		//m.innerHTML="Name field cannot be empty.";
		j.style.color="#ff6666";
		j.innerHTML = "Select a club.";
		flag=false;
	}

	if(document.fm.name.value.length==0){

		a.style.color="#ff6666";
		document.fm.name.style.border="1px solid #ff6666";
		//m.innerHTML="Name field cannot be empty.";
		a.innerHTML = "Name field cannot be empty.";
		flag=false;
	}

	if(document.fm.username.value.length==0){

		//document.fm.username.focus();
		b.style.color="#ff6666";
		document.fm.username.style.border="1px solid #ff6666";
		b.innerHTML = "Username field cannot be empty.";
		flag=false;
	}

	if(document.fm.dept.value.length==0){

			//document.fm.dept.focus();
			c.style.color="#ff6666";
			document.fm.dept.style.border="1px solid #ff6666";
			c.innerHTML = "Select a Department.";
			flag=false;
		}

	if(document.fm.dob_d.value.length==0 || document.fm.dob_m.value.length==0
	|| document.fm.dob_y.value.length==0 ){

			//document.fm.dob.focus();
			//document.fm.dob.style.border="1px solid #ff6666";
			d.style.color="#ff6666";
			d.innerHTML = "DOB field cannot be empty.";
			flag=false;
		}

	if(document.fm.admissionyear.value.length==0){
			
			document.fm.admissionyear.style.border="1px solid #ff6666";
			e.style.color="#ff6666";
			e.innerHTML = "Select admission year.";
			flag=false;
		}
	

	if(document.fm.phone.value.length==0){

		f.style.color="#ff6666";
		document.fm.phone.style.border="1px solid #ff6666";
		f.innerHTML = "Phone number must be entered.";
		flag=false;
	}

	if(document.fm.email.value.length==0){
	
		g.style.color="#ff6666";
		document.fm.email.style.border="1px solid #ff6666";
		g.innerHTML = "Email field cannot be empty.";
		flag=false;
	}

	if(document.fm.password.value.length==0 || document.fm.password2.value.length==0){
		
		h.style.color="#ff6666";
		document.fm.password.style.border="1px solid #ff6666";
		document.fm.password2.style.border="1px solid #ff6666";
		h.innerHTML = "Password fields cannot be empty.";
		flag=false;
	}

	if(document.fm.fileToUpload.value.length==0){

			document.fm.fileToUpload.style.border="1px solid #ff6666";
			i.style.color="#ff6666";
			i.innerHTML = "Avatar is not selected.";
			flag=false;
	}

	return flag;
}
</script>
</head>

<body  style="background: linear-gradient(90deg, #fcff9e 0%, #c67700 100%);" >
	<div class="body-content my-20">
		<div class="module  rounded-2xl my-20 " style="width:35%; height:95% ;">
			<h1 class="text-2xl">Create Student Account</h1>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" position="absolute">
			
				<br>
				<p id="clubname-err"></p>

				 <input type="text" placeholder="Full Name" name="name" id="name"/>
				 <p id="name-err"></p>
				 <br>

				 <input type="text" placeholder="Prn No" id="username" name="prn" value="">
				<p id="username-err"></p>
				<br>	

				<input type="text" placeholder="Phone"  id="phone" name="phone"/>
				<p id="phone-err"></p>
				<br>

				<input type="text" placeholder="Email"  id="email" name="email" value="">
				<p id="email-err"></p>
				<br>

				<input type="password" placeholder="Password"  id="password" name="pass"/>
				<p id="password-err"></p>
				<br>

				<input type="password" placeholder="Confirm Password" name="pass_con" autocomplete="new-password" id="password2"/>
				<br>

				<input type="file" name="useravatar">
				<label class="form-label" for="image">Select your image </label>
				<br>
          
				
				<span id="avatar-err"></span>
				<input type="submit" style="color:black" value="Register" name="submit"
				class="btn btn-block btn-primary text-lg bg-blue-200"/>

				<div class="sign-in">Already have an account? <a href="login.php">Sign in</a></div>
			</form>
		</div>
	</div>

</body>
</html>


<?php
      include('connection.php');
      $mod_club_temp = $_COOKIE['TestCookie'];
      // echo $mod_club_temp;

      
     
      if(isset($_POST['add_event'])){
          $eventName = $_POST['eventName'];
          $eventAvatar = $_FILES['eventAvatar'];
          $filename = uniqid('eventAvatar_').'.jpg';
          move_uploaded_file($eventAvatar['tmp_name'], 'uploads/'.$filename);
          $path = 'uploads/'.$filename;
          
          $eventCapacity = $_POST['eventCapacity'];
          $eventDate = $_POST['eventDate'];
          $eventVenue = $_POST['eventVenue']; 
          $eventTime = $_POST['eventTime'];
          $eventDetails = $_POST['eventDetails'];
       
          $sql = "insert into event_details(Event_name,Event_details,capacity,Venue,Time,Date,Avatar,mod_club) values('$eventName','$eventDetails','$eventCapacity','$eventVenue','$eventTime','$eventDate','$path','$mod_club_temp')";

          if(mysqli_query($con,$sql)){
          //   echo '<div class="alert alert-success fade show" role="alert">
          //   Event posted successfully!
          //   </div>';
        
          // echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
          // echo "<script>";
          // // After 3 seconds, hide the alert by removing the 'show' class
          // echo "$(document).ready(function() {";
          // echo "  setTimeout(function() {";
          // echo "    $('.alert').removeClass('show');";
          // echo "  }, 3000);";
          // echo "});";
          // echo "</script>";
        //   echo '<div id="myModal" class="modal">
        //   <div class="modal-content">
        //     <span class="close">&times;</span>
        //     <p>This is a modal pop-up!</p>
        //   </div>
        // </div>';
          
          }
          else{
      //       echo '<div class="alert alert-danger fade show" role="alert">
			// 	  Oops :( Problem in posting event!
			// 	</div>';
		
			// echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
			// echo "<script>";
			// // After 3 seconds, hide the alert by removing the 'show' class
			// echo "$(document).ready(function() {";
			// echo "  setTimeout(function() {";
			// echo "    $('.alert').removeClass('show');";
			// echo "  }, 3000);";
			// echo "});";
			// echo "</script>";
          }
         
      }


      if(isset($_POST['postnotice'])){
        $sender = $_POST['sender'];
        $notice = $_POST['notice'];
        $club= $_POST['club'];
       
        $sql = "insert into notice(sender,notice,club) values('$sender','$notice','$club')";

        if(mysqli_query($con,$sql)){
          //   echo"<div class='alert alert-success' role='alert'>
          //   Notice Posted Successfully!
          // </div>";
        }
        else{
        //   echo"<div class='alert alert-danger' role='alert'>
        //   Error in posting notice!
        // </div>";
           
        }
    }
    if(isset($_POST['delete_event'])){
      $event_name = $_POST['event_name'];
      $sql = "delete from event_details where Event_name='$event_name'";

      if(mysqli_query($con,$sql)){
      //   echo"<div class='alert alert-success' role='alert'>
      //   Event deleted Successfully!
      // </div>";
    }
    else{
    //   echo"<div class='alert alert-danger' role='alert'>
    //   Error in deleting event!
    // </div>";
    }
    }

    if(isset($_POST['logout'])){
      header("location:login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/5c513108c0.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="notice.css">
  <link rel="stylesheet" href="alert.css">
  <script src="https://cdn.tailwindcss.com"></script>
 

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light h-20">

<!-- logo and logout -->
<div class="ml-20 mt-4 flex justify-content-between"> 
  <a class="navbar-brand " href="#"><img src="images/logo.jpg" height="80px" width="80px" style="margin-top:-30px"></img></a>
  <div class=" inner-div" style="margin-left:900px">
        <form method="POST" action="#">
            <button class="btn btn-lg btn-primary active p-2" style="width:120px" name="logout" type="submit">Logout<i class="fa-solid fa-right-from-bracket ml-3" style="color: #ffffff;"></i></button>
        </form>
    </div>
</div>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a>
    </div>
  </div>
</nav>



<!-- notice -->
<section class="ml-60"> 
  <div class="container mt-1 absolute ml-80">
    <div class="row">
      <div class="col-sm-6">
        <div class="alert fade alert-simple alert-info alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
         
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
          <strong class="font__weight-semibold">Notice from Admin</strong>
                  <?php
                    $query = "select * from notice WHERE sender = 'admin' AND club = '$mod_club_temp'";
                    $result = mysqli_query($con,$query);
                    while($rows=mysqli_fetch_assoc($result))
                    {
                  ?>
                    <tr>
                      <td><?php echo $rows['notice']?></td>
                    </tr>
                  <?php
                  }
                  ?>
        </div>
      </div>
  </div>
</section>

<!-- flex -->
<div class="flex">
<!-- vertical nav -->
<div>
<nav class ="navbar bg-light align-text-top" style="width:350px;height:2800px;margin-top:1px">
  <ul class ="nav navbar-nav text-xl mx-16"  style="margin-top:-2300px">
   <li class ="nav-item">
     <a class ="nav-link" href="#"> 
        <?php 
            $sql = "select * from moderator_info where club='".$mod_club_temp."'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
        ?>
          <div class="flex">
            <a class ="nav-link" href="#"> <img src="images/stud.jpg" height="50px" width="50px"></img> </a>
              <div>
                <strong style="margin-left:30px"><?php echo $row['moderator_name'];?></strong><br>
                <small  style="margin-left:30px">Moderator <?php echo $row['club'];?></small>
              </div>
            </div>
          <hr>                          
      </a>
    </li>
    <br>
    </li class ="nav-item">
     <a class ="nav-link" href="#postnotice_section"><button class="btn btn-warning btn-sm mb-1 active btn-block" style="width:160px" name="">Post Notice for club members</button></a>
     <a class ="nav-link" href="#joinrequests"><button class="btn btn-warning btn-sm mb-1 active btn-block" style="width:160px" name="">Join Requests</button></a>
     <a class ="nav-link" href="#eventlist"><button class="btn btn-warning btn-sm mb-1 active btn-block" style="width:160px" name="">Event List </button></a>
     <a class ="nav-link" href="#membersjoined"><button class="btn btn-warning btn-sm mb-1 active btn-block" style="width:160px" name="">Members Joined</button></a>
    <li>
  </ul>
</nav>
</div>
<!-- vertical nav end -->



<!-- add event -->
<div class="flex-second-section mt-10 ml-20" id="addevent">
<section class="vh-100 position-relative">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-2xl font-bold">Add Event</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="eventName" class="form-control form-control-lg" name="eventName" />
                    <label class="form-label" for="eventname">Event Name</label>
                  </div>
                </div>

                <div class="col-md-6 mb-4">

				      <div class="form-outline">
                    <input type="file" id="image" class="form-control form-control-lg" name="eventAvatar"/>
                    <label class="form-label" for="image">Select event image </label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <input type="text" class="form-control form-control-lg" id="Capacity" name="eventCapacity"/>
                    <label for="cpacity" class="form-label">Capacity</label>
                  </div>

                </div>
                 <div class="col-md-6 mb-4">
			        	<div class="form-outline datepicker w-100">
                    <input type="date" class="form-control form-control-lg" id="Date" name="eventDate"/>
                    <label for="date" class="form-label">Date</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="text" id="venue" class="form-control form-control-lg" name="eventVenue"/>
                    <label class="form-label" for="venue">Venue</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="time" id="time" class="form-control form-control-lg" name="eventTime"/>
                    <label class="form-label" for="time">Time</label>
                  </div>

                </div>
              </div>

              <div class="row">
			            <div class="form-outline">
                    <textarea type="text" rows="2" id="event_details" class="form-control form-control-lg" name="eventDetails"></textarea>
                    <label class="form-label" for="event_details">Event Details</label>
                  </div>
              </div>
              <!-- get moderator club name and store to db -->
   
              <input type="hidden" name="club_name" value="<?php echo isset($rows['mod_club_temp']) ? $rows['mod_club_temp'] : ''; ?>"/>

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" style="color:black" type="submit" value="Post Event" name="add_event"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--notice-->
<section class="vh-50 position-relative" id="postnotice_section">
  <div class="container py-5 h-50">
    <div class="row justify-content-center align-items-center h-50">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-2 p-md-5">
            <h3 class="mb-1 pb-1 pb-md-0 mb-md-5  text-2xl font-bold">Post Notice For Club Members</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
             
            
        
            
             <div class="row">
			           <div class="form-outline" >
				           <label for="notice" class="form-label">Write notice here</label>
                    <textarea type="text" rows="4" id="notice" name="notice" class="form-control form-control-lg"></textarea>
                   </div>
                 </div>
                <input type="hidden" name="sender" value="Moderator"/>
                <?php echo '<input type="hidden" name="club" value="' . $mod_club_temp . '">';?>
                <div class="mt-4 pt-1">
                  <input type="submit" style="color:black" name="postnotice" value="Post" class="btn btn-block btn-primary btn-lg">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--join request-->
<section class="vh-50" id="joinrequests">
  <div class="container py-15 h-50">
    <div class="row justify-content-center align-items-center h-50">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-2 p-md-5">
            <h3 class="mb-1 pb-1 pb-md-0 mb-md-5  text-2xl font-bold">Join Requests</h3>

            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col" id="demo">Sr no</th>
                  <th scope="col">Club name</th>
                  <th scope="col">Student name</th>
                  <th scope="col">Prn no</th>
                  <th scope="col">Request date</th>
                 
                  <th scope="col">Accept/Reject</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $i=1;
                $query = "select * from requests where club_name = '$mod_club_temp'";
                $result = mysqli_query($con,$query);
                while($rows=mysqli_fetch_assoc($result))
                {
                ?>
                  <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $rows['club_name']?></td>
                    <td><?php echo $rows['stud_name']?></td>
                    <td><?php echo $rows['prn']?></td>
                    <td><?php echo $rows['request_date']?></td>
                   
                    <td class="px-4">
                    <div>
                        <form method="POST" action="accept_stud_request.php">
                        <input type="hidden" name="club_name" value="<?php echo isset($rows['club_name']) ? $rows['club_name'] : ''; ?>">
                        <input type="hidden" name="stud_name" value="<?php echo isset($rows['stud_name']) ? $rows['stud_name'] : ''; ?>">
                        <input type="hidden" name="prn" value="<?php echo isset($rows['prn']) ? $rows['prn'] : ''; ?>">
                        <input type="hidden" name="request_date" value="<?php echo isset($rows['request_date']) ? $rows['request_date'] : ''; ?>">
                        <button class="btn btn-sm btn-warning active delete-club my-2" style="width:100px;"   type="submit">Accept
                                  <!-- <i class="fa-sharp fa-solid fa-circle-xmark fa-xl"></i> -->
                        </button>
                        </form>
                      </div>

                      <div>
                        <form method="POST" action="reject_stud_request.php">
                        <input type="hidden" name="mod_club_temp" value="<?php echo isset($rows['club_name']) ? $rows['club_name'] : ''; ?>">
                        <input type="hidden" name="prn" value="<?php echo isset($rows['prn']) ? $rows['prn'] : ''; ?>">
                        <button class="btn btn-sm btn-danger active delete-club" style="width:100px;"   type="submit">Reject
                                  <!-- <i class="fa-sharp fa-solid fa-circle-xmark fa-xl"></i> -->
                        </button>
                        </form>
                      </div>
                    </td>
                       
                  </tr>
                <?php
                }
                ?>
               
               
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--event list-->
<section class="vh-50" id="eventlist">
  <div class="container py-5 h-50">
    <div class="row justify-content-center align-items-center h-50">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-2 p-md-5">
            <h3 class="mb-1 pb-1 pb-md-0 mb-md-5  text-2xl font-bold">Event List</h3>

            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Event image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Details</th>
                  <th scope="col">Venue</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">Capacity</th>
                  <th scope="col">Delete Event</th>
                </tr>
              </thead>
              <tbody>

              <?php
                $query = "select * from event_details where mod_club = '$mod_club_temp'";
                $result = mysqli_query($con,$query);


                while($rows=mysqli_fetch_assoc($result))
                {
                ?>
                
                  <tr>
                    <td><?php echo '<img src="'.$rows['Avatar'].'" alt="My Image">'; ?></td>
                    <td><?php echo $rows['Event_name']?></td>
                    <td><?php echo $rows['Event_details']?></td>
                    <td><?php echo $rows['Venue']?></td>
                    <td><?php echo $rows['Date']?></td>
                    <td><?php echo $rows['Time']?></td>
                    <td><?php echo $rows['Capacity']?></td>
                    <td><div align="right">
                        <form method="POST" action="#">
                        <input type="hidden" name="event_name" value="<?php echo isset($rows['Event_name']) ? $rows['Event_name'] : ''; ?>">
                                 <button class="btn btn-sm btn-danger active delete-club" style="width:100px;" name="delete_event"  type="submit">Delete
                                  <!-- <i class="fa-sharp fa-solid fa-circle-xmark fa-xl"></i> -->
                        </button>
                        </form>
                      </div></td>
                  </tr>
                <?php
                }
                ?>
               
               
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--member list-->

<section class="vh-50 mb-20" id="membersjoined">
  <div class="container py-10 h-50 ">
    <div class="row justify-content-center align-items-center h-50">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-2 p-md-5">
            <h3 class="mb-5 pb-1 pb-md-0 mb-md-5  text-2xl font-bold">Members Joined</h3>

            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Sr no</th>
                  <th scope="col">Club name</th>
                  <th scope="col">Student name</th>
                  <th scope="col">Prn no</th>
                  <th scope="col">Request date</th>
                </tr>
              </thead>
              <tbody>
                
                <?php
                $query = "select * from members where club_name = '$mod_club_temp'";
                $result = mysqli_query($con,$query);
                while($rows=mysqli_fetch_assoc($result))
                {
                ?>
                
                  <tr>
                    <td><?php echo $rows['sr_no']?></td>
                    <td><?php echo $rows['club_name']?></td>
                    <td><?php echo $rows['stud_name']?></td>
                    <td><?php echo $rows['prn']?></td>
                    <td><?php echo $rows['request_date']?></td>
                  </tr>
                <?php
                }
                ?>
                
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<!--end-->
              </div>

</div>
</div>

</body>
</html>
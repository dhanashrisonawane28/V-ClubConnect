<?php
      include('connection.php');
    
      $username_admin = $_COOKIE['TestCookie1'];

      if(isset($_POST['submit'])){
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

          $sql = "insert into event_details(Event_name,Event_details,capacity,Venue,Time,Date,Avatar) values('$eventName','$eventDetails','$eventCapacity','$eventVenue','$eventTime','$eventDate','$path')";

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
          }
          else{
            // echo '<div class="alert alert-danger fade show" role="alert">
            // Oops :( Problem in posting event!
            // </div>';
        
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
        $club = $_POST['club_name'];


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

    if(isset($_POST['club_submit'])){
        $club_id = $_POST['club_id'];
        $club_name = $_POST['club_name'];
       

        $sql = "insert into clubs(club_id,club_name) values('$club_id','$club_name')";

        if(mysqli_query($con,$sql)){
            // echo"club added";
        }
        else{
          // echo"error in adding club";
           
        }
       
    }

    
    if(isset($_POST['assign_moderator'])){
        $moderator_name = $_POST['moderator_name'];
        $moderator_pass = $_POST['moderator_pass'];
        $club = $_POST['club_name'];
        $email = $_POST['email'];
       

        $sql = "insert into moderator_info(moderator_name,moderator_pass,club,email) values('$moderator_name','$moderator_pass','$club','$email')";

        if(mysqli_query($con,$sql)){
            // echo"moderator added";
        }
        else{
          // echo"error in adding moderator";
           
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
	<link rel="stylesheet" href="home.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/5c513108c0.js" crossorigin="anonymous"></script>
</head>
<body style="background-color:rgb(0,14,41)">
<nav class="navbar navbar-expand-lg navbar-light bg-light h-20 ">
<div class="ml-20 mt-4"> 

<div class="d-flex justify-content-between">
    <a class="navbar-brand" href="#">
        <img src="images/logo.jpg" height="80px" width="80px" />
    </a>

    <div class="mt-4 inner-div" style="margin-left:1200px">
        <form method="POST" action="#">
            <button class="btn btn-lg btn-primary active p-2" style="width:120px" name="logout" type="submit">Logout<i class="fa-solid fa-right-from-bracket ml-3" style="color: #ffffff;"></i></button>
        </form>
    </div>
</div>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a>
    </div>
  </div>
</nav>
<!-- flex -->
<div class="flex">


<!-- vertical nav -->
<div>
<nav class ="navbar bg-light align-text-top" style="width:350px;height:4200px;margin-top:1px">
  <ul class ="nav navbar-nav text-xl mx-16"  style="margin-top:-3600px">
   <li class ="nav-item">
     <a class ="nav-link" href="#"> 
        <?php 
            $sql = "select * from admininfo where Username_Admin='".$username_admin."'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
        ?>
          <div class="flex">
            <a class ="nav-link" href="#"> <img src="images/admin.jpg" height="60px" width="60px"></img> </a>
              <div>
                <strong style="margin-left:30px;margin-top:100px"><?php echo $row['Username_Admin'];?></strong>
                
              </div>
            </div>
          <hr>                          
      </a>
    </li>
    <br>
    </li class ="nav-item">
     <a class ="nav-link" href="#postnotice_section"><button class="btn btn-warning btn-sm mb-1 active btn-block" style="width:160px" name="">Post Notice</button></a>
     <a class ="nav-link" href="#existingclubs"><button class="btn btn-warning btn-sm mb-1 active btn-block" style="width:160px" name="">Existing Clubs</button></a>
     <a class ="nav-link" href="#existingmoderators"><button class="btn btn-warning btn-sm mb-1 active btn-block" style="width:160px" name="">Existing Moderators</button></a>
     <a class ="nav-link" href="#Eventlist"><button class="btn btn-warning btn-sm mb-1 active btn-block" style="width:160px" name="">Event List</button></a>
    <li>
  </ul>
</nav>
</div>
<!-- vertical nav end -->

<div>
  <div>
<!--create club-->
<section class="vh-50 position-relative ml-10">
  <div class="container py-5 h-50">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-2 pb-2 pb-md-0 mb-md-5 text-2xl font-bold">Create club</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-outline">
                    <input type="text" id="clubid" class="form-control form-control-lg" name="club_id" />
                    <label class="form-label" for="clubid">Club id</label>
                  </div>
                </div>
             

              <div class="col-md-6 mb-3 ">

                <div class="form-outline datepicker w-100">
                <input type="text" class="form-control form-control-lg" id="clubname" name="club_name"/>
                <label for="clubname" class="form-label">Club name</label>
                </div>
                </div>
              </div>

            
              <div class="mt-2 pt-0">
                <input class="btn btn-primary btn-lg" style="color:black" type="submit" value="Create" name="club_submit"/>
              </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Assign Moderator-->
<section class="vh-50 position-relative ml-10">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-2xl font-bold">Assign Moderator To Club</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

              <div class="row">
                 <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="moderator_name" class="form-control form-control-lg" name="moderator_name" />
                    <label class="form-label" for="moderator_name">Moderator Name</label>
                  </div>
                 </div>

                 <div class="col-md-6 mb-4">
				    <div class="form-outline">
                    <input type="password" id="moderator_pass" class="form-control form-control-lg" name="moderator_pass"/>
                    <label class="form-label" for="moderator_pass">Moderator Password </label>
                     </div>
                 </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-outline datepicker w-100">
                        <label for="club">Select club for moderator</label>

                        <!-- dropdowm -->
                        <select name="club_name" id="club">
                              <?php 
                                  $sql = "select club_name from clubs";
                                  $result = mysqli_query($con,$sql);
                                  while($rows=mysqli_fetch_array($result))
                                  {
                              ?>
                                <option name="club_name" value="<?php echo isset($rows['club_name']) ? $rows['club_name'] : ''; ?>"><?php echo $rows['club_name']?>
                                  </option>
                              <?php
                                  }
                              ?>
                        </select>

                  </div>
                </div>
                 <div class="col-md-6 mb-4">
			        	<div class="form-outline datepicker w-100">
                    <input type="email" class="form-control form-control-lg" id="emai" name="email"/>
                    <label for="email" class="email">Email</label>
                  </div>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" style="color:black" type="submit" value="Assign" name="assign_moderator"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
   




<!--notice-->
<section class="vh-50 position-relative ml-10" id="postnotice_section">
  <div class="container py-5 h-50">
    <div class="row justify-content-center align-items-center h-50">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-2 p-md-5">
            <h3 class="mb-1 pb-1 pb-md-0 mb-md-5  text-2xl font-bold">Post Notice</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              
              
              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-outline datepicker w-100">
                    <label for="club">Send Notice to </label>
                      <!-- dropdown -->
                       <select name="club_name" id="club">
                         <?php 
                            $sql = "select club_name from clubs";
                            $result = mysqli_query($con,$sql);
                            while($rows=mysqli_fetch_array($result))
                            {
                          ?>
                            <option name="club_name" value="<?php echo isset($rows['club_name']) ? $rows['club_name'] : ''; ?>"><?php echo $rows['club_name']?>
                            </option>
                          <?php
                              }
                          ?>
                        </select>
                    </div>
                  </div>
              </div>

              <div class="row">
			           <div class="form-outline" >
				           <label for="notice" class="form-label">Write notice here</label>
                    <textarea type="text" rows="4" id="notice" name="notice" class="form-control form-control-lg"></textarea>
                  </div>
              </div>

              <input type="hidden" name="sender" value="Admin"/>

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

<!--existing clubs -->
<section class="vh-50 ml-10" id="existingclubs">
  <div class="container py-5 h-50">
    <div class="row justify-content-center align-items-center h-50">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px">
          <div class="card-body p-2 p-md-5">
            <h3 class="mb-1 pb-1 pb-md-0 mb-md-5  text-2xl font-bold">Existing clubs</h3>

            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Club id</th>
                  <th scope="col">Club name</th>
                  <th scope="col">Total members</th>
                  <th scope="col">Delete Club</th>
                </tr>
              </thead>
              <tbody>
             
            <?php
                $query = "select * from clubs";
                $result = mysqli_query($con,$query);

                while($rows=mysqli_fetch_assoc($result))
                {
             ?>
            <tr>
                <td><?php echo $rows['club_id']?></td>
                <td><?php echo $rows['club_name']?></td>
                <td><?php echo $rows['club_id']?></td>
                <td>
                    <div align="center">
                        <form method="POST" action="delete_club.php">
                        <input type="hidden" name="club_id" value="<?php echo isset($rows['club_id']) ? $rows['club_id'] : ''; ?>">
                              <button class="btn btn-sm btn-danger active delete-club" style="width:80px;margin-left:-40px;"   type="submit">Remove club
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

<!-- Existing moderators-->
<section class="vh-50 ml-10" id="existingmoderators">
  <div class="container py-5 h-50">
    <div class="row justify-content-center align-items-center h-50">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-2 p-md-5">
            <h3 class="mb-1 pb-1 pb-md-0 mb-md-5  text-2xl font-bold">Existing Moderators</h3>

            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Moderator name</th>
                  <th scope="col">Moderator club</th>
                  <th scope="col">Moderator Email</th>
                  <th scope="col">Remove Moderator</th>
                </tr>
              </thead>
              <tbody>
             
            <?php
                $query = "select * from moderator_info";
                $result = mysqli_query($con,$query);

                while($rows=mysqli_fetch_assoc($result))
                {
             ?>
            <tr>
                <td><?php echo $rows['moderator_name']?></td>
                <td><?php echo $rows['club']?></td>
                <td><?php echo $rows['email']?></td>
                <td>
                    <div align="center">
                        <form method="POST" action="delete_moderator.php">
                        <input type="hidden" name="moderator_name" value="<?php echo isset($rows['moderator_name']) ? $rows['moderator_name'] : ''; ?>">
                              <button class="btn btn-sm btn-danger active delete_moderator" style="width:100px;margin-left:-10px;"   type="submit">Remove moderator
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
<section class="vh-50 ml-10" id="Eventlist">
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
                $query = "select * from event_details";
                $result = mysqli_query($con,$query);

               
                // $row = mysqli_fetch_assoc($result);
                // $imageData = $row['Avatar'];

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
                    <td>
                        <div align="center">
                            <form method="POST" action="delete_event.php">
                            <input type="hidden" name="Event_name" value="<?php echo isset($rows['Event_name']) ? $rows['Event_name'] : ''; ?>">
                                <button class="btn btn-sm btn-danger active delete_moderator" style="width:70px;"   type="submit">Delete
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

              </div>
</div>
</div>
<!-- main flex end -->

</body>
</html>
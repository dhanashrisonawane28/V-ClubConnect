<?php
      include('connection.php');
       
      $username_temp = $_GET['username'];

    
           if(isset($_POST['request_club'])){
                  $sql = "select * from studentinfo where prn='".$username_temp."'";
                  $result = mysqli_query($con,$sql);
                  $row = mysqli_fetch_array($result);

                  $name =  $row['stud_name'];
                  
                  $prn = $username_temp;
                  $date = date("Y/m/d");
                  $club_name = $_POST['club_name'];

                  
                  $sql = "insert into requests(club_name,stud_name,prn,request_date) values('$club_name','$name','$prn','$date')";

                if(mysqli_query($con,$sql)){
                  // echo '<div class="alert alert-success fade show" role="alert">
                  // Club requestes successfully!
                  // </div>';
                }
              }

              if(isset($_POST['select_club'])){
                $club_name1 = $_POST['club_name'];
              }
               
                
              if(isset($_POST['participate'])){
                $event_name = $_POST['event_name'];
                $club_name = $_POST['club_name'];
                $username_temp = $_GET['username'];

                $sql = "INSERT INTO participants VALUES('$club_name','$event_name','$username_temp')";
                if(mysqli_query($con,$sql)){
                  // echo '<div class="alert alert-success fade show" role="alert">
                  // Club requestes successfully!
                  // </div>';
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
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</head>
<body style="background-color:rgb(0,14,41)">
<nav class="navbar navbar-expand-lg navbar-light bg-light h-20 ">

<!-- logo and logout -->
<div class="ml-20 mt-4 flex justify-content-between"> 
  <a class="navbar-brand " href="#"><img src="images/logo.jpg" height="80px" width="80px" style="margin-top:-30px"></img></a>
  <div class=" inner-div" style="margin-left:900px">
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

<div class="d-flex p-2">
<div>
<div>

<div>
    <!-- notice -->
    <section class="ml-4">
      <div class="container mt-1 ml-80 mt-2 absolute ">
        <div class="row">
          <div class="col-sm-12">
            <div class="alert fade alert-simple alert-info alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
             
              <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
              <strong class="font__weight-semibold">Notice from <?php if(isset($_POST['select_club'])){ echo $club_name1;}?> Moderator</strong>
                      <?php
                          if(isset($_POST['select_club'])){
                            $query = "select * from notice WHERE sender = 'moderator' AND club = '$club_name1'";
                            $result = mysqli_query($con,$query);
                            while($rows=mysqli_fetch_assoc($result))
                            {
                      ?>
                        <tr>
                          <td><?php echo $rows['notice']?></td>
                        </tr>
                      <?php
                      }
                    }
                      ?>
            </div>
          </div>
      </div>
    </section>
  </div>

  <!-- vertical nav -->
<nav class ="navbar bg-light align-text-top" style="width:350px;height:1050px;margin:-7px;">
  <ul class ="nav navbar-nav text-xl mx-16"  style="margin-top:-200px">
 

  <li class ="nav-item">
  <a class ="nav-link" href="#"> <?php 
                                     $sql = "select * from studentinfo where prn='".$username_temp."'";
                                     $result = mysqli_query($con,$sql);
                                     $row = mysqli_fetch_array($result);
                                  ?>
                                    <div class="flex">
                                      <a class ="nav-link" href="#"> <img src="images/stud.jpg" height="50px" width="50px"></img> </a>
                                       <div>
                                          <strong style="margin-left:30px"><?php echo $row['stud_name'];?></strong>
                                          <p style="font-size:17px;margin-left:30px">Member <?php if(isset($_POST['select_club'])){echo $club_name1;}?></p>
                                          <!-- <p style="font-size:17px;margin-left:30px"><?php echo $username_temp; ?></p> -->
                                         
                                       </div>
                                     </div>
                                    <hr>
                                     
   </a>
  </li>
  <li class ="nav-item"><br>

  </li>
   <!-- join club -->
   <li class ="nav-item">
  <div >
  <button class="btn btn-primary btn-lg mb-1">Join New Club</button>
  <div>
        <?php 
            $sql = "select club_name from clubs";
            $result = mysqli_query($con,$sql);
            while($rows=mysqli_fetch_array($result))
            {
         ?>

        <form action="#" method="POST">
          <?php 
            $club_name = $rows['club_name'];
            
          ?>
           
        <input type="hidden" name="club_name" value="<?php echo isset($rows['club_name']) ? $rows['club_name'] : ''; ?>">
        
				<button class="btn btn-warning btn-sm mb-1 active btn-block" style="width:160px" type="submit" name="request_club"><option value="club"><?php echo $club_name;?></option></button>
        </form>

        <?php
            }
        ?>
    </div>
    </div>
  </li>
  <!-- join club end -->
  <br><br>

  <li class ="nav-item">
<div>
<button class="btn btn-primary btn-lg mb-1" style="width:160px">Select club</button>
  <div >
				

        <!-- select club -->
        <?php 
            $sql = "select * from members where prn='".$username_temp."'";
            $result = mysqli_query($con,$sql);
           

            while($rows=mysqli_fetch_assoc($result))
            {
        ?>

        <form action="#" method="POST">
        <?php 
            $club_name = $rows['club_name'];
            
        ?>
           
        <input type="hidden" name="club_name" value="<?php echo isset($rows['club_name']) ? $rows['club_name'] : ''; ?>">
				<button class="btn btn-warning btn-sm mb-1 active" style="width:160px" type="submit" name="select_club"><option value="select_club"><?php echo $rows['club_name']?></option></button>
        </form>

        <?php
            }
        ?>
				
			
	</div>
  
  
</div>

  </li>
  

  </ul>
  
</nav>
</div>
</div class="nav-div-complete">
<!--upcoming events-->
<div>
<section class="vh-50 mt-5">
  <div class="container py-5 h-50">
    <div class="row justify-content-center align-items-center h-50">
      <div class="col-12 col-lg-10 col-xl-10 ml-40">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px">
          <div class="card-body p-2 p-md-5">
         
            <h3 class="mb-1 pb-1 pb-md-0 mb-md-5  text-2xl font-bold">Upcoming events <?php 
               if(isset($_POST['select_club']))
              {
                echo "of $club_name1";
              }
              ?>
            </h3>
            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Event image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Details</th>
                  <th scope="col">Venue</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">Participate<br>Not Intrested</th>
                 
                </tr>
              </thead>
              <tbody>
              
              <?php
              if(isset($_POST['select_club']))
              {
                $sql = "SELECT *
                FROM event_details
                WHERE mod_club = '$club_name1'
                AND Event_name NOT IN (
                    SELECT event1
                    FROM participants
                    WHERE stud_prn = '$username_temp' AND club = '$club_name1'
                );
                ";


                // $sql = "SELECT *
                // FROM event_details
                // INNER JOIN participants
                // ON event_details.Event_name = participants.event
                // AND participants.club = '$club_name1'
                // WHERE participants.stud_prn = '$username_temp';";
                
                $result = mysqli_query($con,$sql);

                
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
                    <td class="px-4 space-y-2">
                      <div align="left">
                          <form method="POST" action="#">
                          <input type="hidden" name="club_name" value="<?php echo isset($rows['mod_club']) ? $rows['mod_club'] : ''; ?>">
                          <input type="hidden" name="event_name" value="<?php echo isset($rows['Event_name']) ? $rows['Event_name'] : ''; ?>">
                          <input type="hidden" name="prn" value="<?php echo isset($rows['username_temp']) ? $rows['username_temp'] : ''; ?>">
                              <button class="btn btn-sm btn-warning active" type="submit" name="participate">
                                Participate 
                              <!-- <i class="fa-sharp fa-solid fa-circle-check fa-xl"></i> -->
                              </button>
                          </form>
                        </div>
                        

                        <div align="right">
                          <form method="POST" action="reject_stud_request.php">
                          <input type="hidden" name="mod_club_temp" value="<?php echo isset($rows['club_name']) ? $rows['club_name'] : ''; ?>">
                          <input type="hidden" name="prn" value="<?php echo isset($rows['prn']) ? $rows['prn'] : ''; ?>">
                              <button class="btn btn-sm btn-danger active" style="width:80px"  type="submit">Pass up
                                  <!-- <i class="fa-sharp fa-solid fa-circle-xmark fa-xl"></i> -->
                              </button>
                          </form>
                        </div>
                    </td>
                  </tr>
                <?php
                }
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


<!-- participated events -->

<div>

<section class="vh-50 mt-5" >
  <div class="container py-5 h-50" >
    <div class="row justify-content-center align-items-center h-50">
      <div class="col-12 col-lg-10 col-xl-10 ml-40">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px">
          <div class="card-body p-2 p-md-5">
         
            <h3 class="mb-1 pb-1 pb-md-0 mb-md-5  text-2xl font-bold">Participated events <?php 
               if(isset($_POST['select_club']))
              {
                echo "of $club_name1";
              }
              ?>
            </h3>
            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Event image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Details</th>
                  <th scope="col">Venue</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  
                 
                </tr>
              </thead>
              <tbody>

              <?php
              if(isset($_POST['select_club']))
              {
                $sql = "SELECT *
                FROM event_details
                WHERE (Event_name, mod_club) IN (
                    SELECT event1, club 
                    FROM participants
                    WHERE stud_prn = '$username_temp' AND club = '$club_name1'
                );
                ";

                // $sql = "SELECT *
                // FROM event_details
                // INNER JOIN participants
                // ON event_details.Event_name = participants.event
                // AND participants.club = '$club_name1'
                // WHERE participants.stud_prn = '$username_temp';" ;
                
                $result = mysqli_query($con,$sql);

                
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
                  </tr>
                <?php
                }
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
</body>
</html>
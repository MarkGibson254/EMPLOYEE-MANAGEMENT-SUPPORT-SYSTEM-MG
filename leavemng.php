<?php
require('auth.php');
require_once ('dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$sql = "SELECT * from `employee` WHERE id=$id";
$result = mysqli_query($conn, $sql);
$employee = mysqli_fetch_array($result);
$empName = ($employee['firstName']);
?>

<!DOCTYPE html>
<html lang=eng>
<head>
  <title>Heritage Company - Home</title>
  <link rel = "icon" href ="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvMcNqJlWz-Jw2q7xtoQV8Ju0EjSMTAmcysw&usqp=CAU"type = "image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="leavemng.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!--If there is no user activity for 6 minutes the page is refreshed back to the home page-->
  <meta http-equiv="refresh" content="300;url=logout.php" />

</head>
<body>
<header>
    <div class="navbar">
        <a href="home.php?id=<?php echo $id?>">Home</a>
        <div class="subnav">
          <button class="subnavbtn">Profile <i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <a href="myprofile.php?id=<?php echo $id?>">My Profile</a>
            <a href="profileup.php?id=<?php echo $id?>">Profile update</a>
            <a href="files.php?id=<?php echo $id?>">My Documents</a>
            <a href="passchange.php?id=<?php echo $id?>">Change password</a>
          </div>
        </div> 
        <div class="subnav">
          <button class="subnavbtn">Leave Process <i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <a href="leavemng.php?id=<?php echo $id?>" class="active">Apply Leave</a>
            <a href="leavehst.php?id=<?php echo $id?> " >Leave history</a>
            
          </div>
        </div> 
        <a href="logout.php">Log Out</a>
      </div>
    </header>
  <div class ="Tapper"></div>
  <div class="leave">
      <h2 class="title">Apply For Leave :
        <?php echo $empName ?>
      </h2>
      <form action="elogin/leaveapply.php?id=<?php echo $id?>" method="POST">
      <div class="input-group">
          <div class="leaves"><p>Input The Reason</p>
          <div class="leaves-1">
              <input class="input--style-2" name="reason" required="required" >
          </div>
          </div>
          <div class="divider"></div>
          <div class="input-group-1">
           <div class="leaves"><p>Start Date</p>
           <div class=leaves-1>
                <input class="input--style-1" type="date" name="start" required="required">
                </div>
           </div>
          </div>
          <div class="input-group-1">
           <div class="leaves"><p>End Date</p>
            <div class=leaves-1>
                <input class="input--style-1" type="date" name="end" required="required">
                </div>
           </div>
      </div>
      </div>
      <div class="proceed">
          <button class="btn" type="submit" ><p>SUBMIT</p></button>
      </div>
    </form>  
</body>
</html>
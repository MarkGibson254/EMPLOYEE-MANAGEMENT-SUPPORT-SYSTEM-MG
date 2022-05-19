<?php
  require('auth.php');
  require_once ('dbh.php');
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $sql = "SELECT * from `employee` WHERE id=$id";
  $result = mysqli_query($conn, $sql);

 
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $firstname = $res['firstName'];
  $lastname = $res['lastName'];
  $email = $res['email'];
  $contact = $res['contact'];
  $address = $res['address'];
  $gender = $res['gender'];
  $birthday = $res['birthday'];
  $nid = $res['nid'];
  $dept = $res['dept'];
  $degree = $res['degree'];
  $pic = $res['pic'];
  $maritalstatus= $res['maritalstatus'];
  $country = $res['country'];
 $province = $res['province'];
 $emergencycontact= $res['emergencycontact'];
  
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
<title>MY PROFILE</title>
  <meta charset="utf-8">
  <link rel = "icon" href ="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvMcNqJlWz-Jw2q7xtoQV8Ju0EjSMTAmcysw&usqp=CAU"type = "image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="myprofile.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <a href="profileup.php?id=<?php echo $id?>"class="active">Profile update</a>
            <a href="files.php?id=<?php echo $id?>">My Documents</a>
            <a href="passchange.php?id=<?php echo $id?>">Change password</a>
          </div>
        </div> 
        <div class="subnav">
          <button class="subnavbtn">Leave Process <i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <a href="leavemng.php?id=<?php echo $id?>">Apply Leave</a>
            <a href="leavehst.php?id=<?php echo $id?> " >Leave history</a>
            
          </div>
        </div> 
        <a href="logout.php">Log Out</a>
      </div>
    </header>
    <div class="divider"></div>
    <div class="profile">
        <div class="profile-content">
            <h2 class="profile-title">Update my Profile</h2>
            <div class="input-group">
                <img src="ADMIN/images/<?php echo $pic;?>" height = 150px width = 150px>
            </div>
            <form id = "registration" action="updateprofiledetails.php" method="POST">
            <div class="input-group">
                <p>My EMPLOYEE ID</p>
                <input class="input--style-2" type="hidden" name="id" value="<?php echo $id ;?>" readonly>
            </div>
            <div class="input-group">
                <p>Email</p>
                <input class="input--style-1" type="text" name="email" value="<?php echo $email;?>" >
            </div>
            <div class="input-group">
                <p>Contact</p>
                <input class="input--style-1" type="text" name="contact" value="<?php echo $contact;?>" >
            </div>
            <div class="input-group">
                <p>Emergency Contact</p>
                <input class="input--style-1" type="text" name="emergencycontact" value="<?php echo $emergencycontact;?>" >
            </div>
            <div class="input-group">
                <p>Address</p>
                <input class="input--style-1" type="text" name="address" value="<?php echo $address;?>" >
            </div>
            
            <div class="input-group">
                <p>Province</p>
                <input class="input--style-1" type="text" name="province" value="<?php echo $province;?>" >
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </div>
        </div>
        </form>
    </div>
</html>

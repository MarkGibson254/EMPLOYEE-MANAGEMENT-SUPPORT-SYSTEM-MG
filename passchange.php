<?php
require('auth.php');
require_once ('dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{
// php manipulation of old password to new password
  $id = $_POST['id'];
  $old = $_POST['oldpass'];
  $new = $_POST['confirmpass'];

  $result1 = mysqli_query($conn, "select employee.password from employee WHERE id = $id");
     $employee = mysqli_fetch_assoc($result1);
          if($old == $employee['password'])
          {
            $sql = "UPDATE `employee` SET `password`='$new' WHERE id = $id";
            mysqli_query($conn, $sql);
             echo ("<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Password Updated')
                window.location.href='myprofile.php?id=$id';</SCRIPT>"); 
          
        }

        else{
          echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Update Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
        }
}
?>
<!-- <?php
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $sql = "SELECT * from `employee` WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $old = $res['password'];
  echo "$old";
}
}

?> -->
<!DOCTYPE html>
<html lang="en">
    <head>
<title>Change Password</title>
  <meta charset="utf-8">
  <link rel = "icon" href ="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvMcNqJlWz-Jw2q7xtoQV8Ju0EjSMTAmcysw&usqp=CAU"type = "image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="myprofile.css" rel="stylesheet" media="all">
  <script src="passchange.js"></script>
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
            <a href="profileup.php?id=<?php echo $id?>">Profile update</a>
            <a href="files.php?id=<?php echo $id?>">My Files</a>
            <a href="passchange.php?id=<?php echo $id?>"class="active">Change password</a>
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
          <h1>CHANGE PASSWORD</h1>
          <form action="passchange.php" method="POST">
            <div class="divider"></div>
            
            <div class="row">
                <div class="col-2">
                    <div class="input-group">
                        <p>Old Password</p>
                        <input class="input--style-1" type="password" name="oldpass"  >
                </div>
                </div>
                <div class="col-2">
                    <div class="input-group">
                        <p>New password</p>
                        <input class="input--style-1" type="password" name="newpass" id="password1" >
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group">
                        <p>Confirm password</p>
                        <input class="input--style-1" type="password" name="confirmpass" id="password2" >
                    </div>
                    <h3 id="verifynote" class="warn hidden">Passwords do not match</h3>
                <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" ><br><br>
                <div class="finish">
                    <button class="btn--radius-2 btn--red" type="submit" name="update">Update </button>
                </div>
            </div>
            </div>
          </form>
        </div>
      </div>
      <style>
        .warn{
          color:red;
          border:2px solid red;
          border-radius:5px;
          background-color: #fcc;
        }
        .hidden{
          display:none;
        }

      </style>
      <script>
        $document.ready(function() {
    $(#password2).keyup(function() {
        if( $(this).val() == $(#password1).val() ) {
            $('#verifynote').addclass('hidden');
        }
        else {
            $('#verifynote').removeclass('hidden');
        }
    });
});
      </script>
</body>
</html>

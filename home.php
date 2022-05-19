<?php
require('auth.php');
require_once ('dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);

  
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
    $sql = "SELECT * from `employee` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    
  
    if($result){
    while($res = mysqli_fetch_assoc($result)){
    $firstname = $res['firstName'];
    $lastname = $res['lastName'];
    $pic = $res['pic'];
    }
  }
  ?>
<!DOCTYPE html>
<html lang=eng>
<head>
  <title>EMSS - Home</title>
  <meta charset="utf-8">
  <link rel = "icon" href ="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvMcNqJlWz-Jw2q7xtoQV8Ju0EjSMTAmcysw&usqp=CAU"type = "image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="elogin.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta http-equiv="refresh" content="300;url=logout.php" />
</head>
<body>
<header>
    <div class="navbar">
        <a href="home.php?id=<?php echo $id?>"class="active">Home</a>
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
            <a href="leavemng.php?id=<?php echo $id?>" >Apply Leave</a>
            <a href="leavehst.php?id=<?php echo $id?> " >Leave history</a>
            
          </div>
        </div> 
        <a href="logout.php">Log Out</a>
      </div>
    </header>
  <h3>Employee Management Support System </h3>
  <section class="login">
    <div class="container">
    <img src="ADMIN/images/<?php echo $pic ?>" alt="Avatar" class="avatar">
    <p>WELCOME : <?php echo $firstname ?> <?php echo $lastname ?></p>
    </div>
  </section>
</body>
</html>
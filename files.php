<?php
require ('auth.php');
require_once ('dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$sql = "SELECT * from `employee` WHERE id=$id";
$result = mysqli_query($conn, $sql);
$employee = mysqli_fetch_array($result);
$empName = ($employee['firstName'] . ' ' . $employee['lastName']);
?>

<!DOCTYPE html>
<html lang="en">
    <title>Heritage Company - Home</title>
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="leavehst.css" rel="stylesheet" media="all">
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
            <a href="files.php?id=<?php echo $id?>"class="active">My Documents</a>
            <a href="passchange.php?id=<?php echo $id?>">Change password</a>
          </div>
        </div> 
        <div class="subnav">
          <button class="subnavbtn">Leave Process <i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <a href="leavemng.php?id=<?php echo $id?>">Apply Leave</a>
            <a href="leavehst.php?id=<?php echo $id?>" >Leave history</a>
            
          </div>
        </div> 
        <a href="logout.php">Log Out</a>
      </div>
    </header>
    <div class="divider"></div>
    <div class="control" style="text-align: center;"><p>MY FILES: <?php echo $empName?></p></div>
    <table>
        <tr>
            <th align="center"> File Name</th>
            <th align="center"> File Type</th>
            <th align="center"> Date Uploaded</th>
            <th align="center"> Download</th>
            

        </tr>

        <?php
        $sql = "SELECT * FROM files WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        
        $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
         foreach ($files as $file): ?>
          <tr>
            <td><?php echo $file['file_name']; ?></td>
            <td><?php echo $file['filetype']; ?></td>
            <td><?php echo $file['date_uploaded']; ?></td>
            <td><a href="filing.php?id=<?php echo $file['per_id'] ?>"><p>Download</p></a></td>
          </tr>
        <?php endforeach;?>
        <?php
        if (mysqli_num_rows($result) == 0) {
          echo "<tr><td colspan='10'><center>No Documents uploaded yet</center></td></tr>";
      }
      ?>
    </table>
    <div class="divider"></div>

</body>
</html>
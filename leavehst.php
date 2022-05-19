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
<html lang="en">
    <title>Heritage Company - Home</title>
    <head>
  <meta charset="utf-8">
  <link rel = "icon" href ="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvMcNqJlWz-Jw2q7xtoQV8Ju0EjSMTAmcysw&usqp=CAU"type = "image/x-icon">
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
            <a href="files.php?id=<?php echo $id?>">My Documents</a>
            <a href="passchange.php?id=<?php echo $id?>">Change password</a>
          </div>
        </div> 
        <div class="subnav">
          <button class="subnavbtn">Leave Process <i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <a href="leavemng.php?id=<?php echo $id?>">Apply Leave</a>
            <a href="leavehst.php?id=<?php echo $id?> "class="active" >Leave history</a>
            
          </div>
        </div> 
        <a href="logout.php">Log Out</a>
      </div>
    </header>
    <div class="divider"></div>
    <div class="form">
    <div class="control" style="text-align: center;">
      <?php echo $employee['firstName']." ".$employee['lastName']?>
      </div>
    <table>

        <tr>
            <th align = "center">User ID</th>
            <th align = "center">Start Date</th>
            <th align = "center">End Date</th>
            <th align = "center">Total Days</th>
            <th align = "center">Reason</th>
            <th align = "center">Manager comments </th>
            <th align = "center">Status</th>
        </tr>


        <?php


            $sql = "Select employee.id, employee.firstName, employee.lastName, leave_process.start, leave_process.end, leave_process.reason, leave_process.status,leave_process.Areason From employee, leave_process Where employee.id = $id and leave_process.id = $id order by leave_process.token DESC";
            $result = mysqli_query($conn, $sql);
            
            

            while ($employee = mysqli_fetch_assoc($result)) {
                $date1 = new DateTime($employee['start']);
                $date2 = new DateTime($employee['end']);
                $interval = $date1->diff($date2);
                $interval = $date1->diff($date2);
                

                echo "<tr>";
                echo "<td>".$employee['id']."</td>";
                
                echo "<td>".$employee['start']."</td>";
                echo "<td>".$employee['end']."</td>";
                echo "<td>".$interval->days."</td>";
                echo "<td>".$employee['reason']."</td>";
                echo "<td>".$employee['Areason']."</td>";
                echo "<td>".$employee['status']."</td>";
                echo "</tr>";
                
            }


        ?>
        <?php
        if (mysqli_num_rows($result) == 0) {
          echo "<tr><td colspan='10'><center>No Leave yet requested</center></td></tr>";
      }
      ?>


    </table>
    
    </div>
    <form action="pdf2.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input type="submit" value="My Leave report" class="btn" name="report">
    
    </form>
</body>
</html>
<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
$name="";
$email="";
$mobile="";
$address="";
$query = "select * from users where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($query_run)){
    $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    $address=$row['address'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">\
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style type=text/css>
    #side-bar{
        background-color: whitesmoke;
        padding: 50px;
        width: 400px;
        height: 400px;
    }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="user_dashboard.php">Library Management System (LMS)</a>
            </div>
            <font style="color:white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
            <font style="color:white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_profile.php">View Profile</a>
                        <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                        <a class="dropdown-item" href="change_password.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                
            </ul>
        </div>
     </nav>
     <br>
     <span>
        <marquee>Welcome to Library Management System. The library opens from 8:00 am to 4:00 pm.</marquee>
     </span>
     <br><br>
     <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <form action="update.php" method="post">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" value="<?php echo $name;?>" name="name">
            </div>
            <div class="form-group">
                <label>Email ID:</label>
                <input type="text" class="form-control" value="<?php echo $email;?>" name="email">
            </div>
            <div class="form-group">
                <label>Mobile Number:</label>
                <input type="text" class="form-control" value="<?php echo $mobile;?>" name="mobile">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="text" class="form-control" value="<?php echo $address;?>" name="address">
            </div>
            <div class="py-2">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <div>
        </form>
        </div>
        <div class="col-md-4"></div>


        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
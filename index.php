<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">\
    <title>LMS</title>
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
                <a class="navbar-brand" href="index.php">Library Management System (LMS)</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-link">
                    <a class="nav-link" href="admin/index.php">Admin Login</a>
                </li>
                <li class="nav-link">
                    <a class="nav-link" href="index.php">User Login</a>
                </li>
                <li class="nav-link">
                    <a class="nav-link" href="signup.php">Register</a></i>
                </li>
            </ul>
        </div>
     </nav>
     <br>
     <span>
        <marquee>Welcome to Library Management System. The library opens from 8:00 am to 4:00 pm.</marquee>
     </span>
     <br>
     <br>
     <div class="row">
        <div class="col-md-4" id="side-bar">
            <h5>Library Timing</h5>
            <ul>
                <li>Opening Time: 8:00 AM</li>
                <li>Closing Time: 4:00 PM</li>
                <li>Saturday and Sunday Off</li>
            </ul>
            <h5>Facilities that we provide</h5>
            <ul>
                <li>Comfortable seating arrangement</li>
                <li>Peaceful Environment</li>
                <li>Drinking Water</li>
                <li>Discussion Room</li>
                <li>Free-Wifi</li>
                <li>News Papers</li>
            </ul>
        </div>
        <div class="col-md-8" id="main-section">
            <center><h3>User Login Form</h3></center>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email ID:</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="py-2">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                    <a href="signup.php">Not Registered Yet</a>
                </div>
            </form>

            <?php
                session_start();
                if(isset($_POST['login'])){
                    $connection = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($connection,"lms");
                    $query = "select * from users where email = '$_POST[email]'";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run)){
                        if($row['email'] == $_POST['email']){
                            if($row['password'] == $_POST['password']){
                                $_SESSION['name'] = $row['name'];
                                $_SESSION['email'] = $row['email'];
                                $_SESSION['id'] = $row['id'];

                                header("location:user_dashboard.php");
                            }
                            else{
                                ?>
                                <br><br><center><span>Wrong Password!</span></center>
                                <?php
                            }
                        }
                    }
                }

            ?>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
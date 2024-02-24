<?php
    require('functions.php');
    session_start();
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $book_name="";
    $author_name="";
    $category="";
    $book_no="";
    $book_price="";

    $query = "select books.book_name, books.book_no, books.book_price, authors.author_name from books left join authors on books.author_id = authors.author_id";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">\
    <title>Admin Dashboard</title>
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
                <a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
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
     <nav class="navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
     <div class="container-fluid">
        <ul class="nav navbar-nav navbar-center">
            <li class="nav-item">
                <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Book</a>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">Add New Book</a>
                    <a href="" class="dropdown-item">Manage Books</a>
                </div>
            </li>
            <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">Add New Category</a>
                    <a href="" class="dropdown-item">Manage Categories</a>
                </div>
            </li>
            <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Author</a>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">Add New Author</a>
                    <a href="" class="dropdown-item">Manage Authors</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Issue Books</a>
            </li>
        </ul>
    </nav>
    <br>
     <span>
        <marquee>Welcome to Library Management System. The library opens from 8:00 am to 4:00 pm.</marquee>
     </span>
     <br><br>
     <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form>
                <table class="table-bordered" width="900px" style="text-align:center">
                    <tr>
                        <th>Name:</th>
                        <th>Author:</th>
                        <th>Price:</th>
                        <th>Number:</th>
                    </tr>
                    <?php
                        $query_run = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($query_run)){
                            $book_name=$row['book_name'];
                            $author_name=$row['author_name'];
                            $book_price=$row['book_price'];
                            $book_no=$row['book_no'];
                    ?>
                            <tr>
                                <td><?php echo $book_name;?></td>
                                <td><?php echo $author_name;?></td>
                                <td><?php echo $book_price;?></td>
                                <td><?php echo $book_no;?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </form>
        </div>
        <div class="col-md-2"></div>

     </div>
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
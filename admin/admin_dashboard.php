<?php
    require('functions.php');
    session_start();
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
                    <a href="add_book.php" class="dropdown-item">Add New Book</a>
                    <a href="manage_books.php" class="dropdown-item">Manage Books</a>
                </div>
            </li>
            <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                <div class="dropdown-menu">
                    <a href="add_category.php" class="dropdown-item">Add New Category</a>
                    <a href="manage_categories.php" class="dropdown-item">Manage Categories</a>
                </div>
            </li>
            <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Author</a>
                <div class="dropdown-menu">
                    <a href="add_author.php" class="dropdown-item">Add New Author</a>
                    <a href="manage_authors.php" class="dropdown-item">Manage Authors</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="issue_books.php" class="nav-link">Issue Books</a>
            </li>
        </ul>
    </nav>
    <br>
     <span>
        <marquee>Welcome to Library Management System. The library opens from 8:00 am to 4:00 pm.</marquee>
     </span>
     <br><br>
     <div class="row">
        <div class="col-md-3">
            <div class="card bg-light" style="width:300px">
                <div class="card-header">Registered Users:</div>
                <div class="card-body">
                    <p class="card-text">No. of Total Users: <?php echo get_user_count(); ?></p>
                    <a href="regusers.php" class="btn btn-danger" target="_blank">View Registered Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light" style="width:300px">
                <div class="card-header">Registered Books:</div>
                <div class="card-body">
                    <p class="card-text">No. of Total Books: <?php echo get_book_count(); ?></p>
                    <a href="regbooks.php" class="btn btn-primary" target="_blank">View Registered Books</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light" style="width:300px">
                <div class="card-header">Registered Categories:</div>
                <div class="card-body">
                    <p class="card-text">No. of Total Categories: <?php echo get_category_count(); ?> </p>
                    <a href="regcats.php" class="btn btn-info" target="_blank">View Registered Categories</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light" style="width:300px">
                <div class="card-header">Registered Authors:</div>
                <div class="card-body">
                    <p class="card-text">No. of Total Authors: <?php echo get_author_count(); ?></p>
                    <a href="regauthors.php" class="btn btn-success" target="_blank">View Registered Authors</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light" style="width:300px">
                <div class="card-header">Issued Books:</div>
                <div class="card-body">
                    <p class="card-text">No. of Issued Books: <?php echo get_issued_books_count(); ?></p>
                    <a href="view_issued_books.php" class="btn btn-success" target="_blank">View Issued Books</a>
                </div>
            </div>
        </div>
    </div>
        
  



    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
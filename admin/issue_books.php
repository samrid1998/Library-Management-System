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
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group py-2">
                    <label>Book Name:</label>
                    <input type="text" name="book_name" class="form-control" required="">
                </div>
                <div class="form-group py-2">
                    <label>Book Author:</label>
                    <select class="form-control" name="book_author">
                        <option>--Select author--</option>
                        <?php
                            $connection = mysqli_connect("localhost","root","");
                            $db = mysqli_select_db($connection,"lms");
                            $query = "select author_name from authors";
                            $query_run = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <option> <?php echo $row['author_name']?> </option>
                        <?php
                    }
                ?>
                </select>
                </div>
                <div class="form-group py-2">
                    <label>Book Number:</label>
                    <input type="text" name="book_no" class="form-control" required="">
                </div>
                <div class="form-group py-2">
                    <label>Student ID:</label>
                    <input type="text" name="student_id" class="form-control" required="">
                </div>
                <div class="form-group py-2">
                    <label>Status:</label>
                    <input type="text" name="status" class="form-control" required="">
                </div>
                <div class="form-group py-2">
                    <label>Issue Date:</label>
                    <input type="text" name="issue_date" class="form-control" value="<?php echo date('Y-m-d');?>" required="">
                </div>
                <div class="py-2">
                    <button class="btn btn-primary" name="issue_book">Issue Book</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
     </div>
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
<?php
    if(isset($_POST['issue_book'])){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $query = "insert into issued_books values(null,$_POST[book_no],'$_POST[book_name]','$_POST[book_author]',$_POST[student_id],1,'$_POST[issue_date]')";
        $query_run = mysqli_query($connection,$query);
        
    }
?>
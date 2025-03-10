<?php
	session_start();
	// Function to count books issued by the logged-in user
function get_user_issue_book_count() {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "liberary_management");
    $user_issue_book_count = 0;
    $query = "SELECT COUNT(*) as user_issue_book_count FROM issued_books WHERE student_id = " . $_SESSION['id'];
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $user_issue_book_count = $row['user_issue_book_count'];
    }
    return $user_issue_book_count;
}

// Function to count total books in the library
function get_book_count() {
	$connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "liberary_management");
    $book_count = 0;
    $query = "SELECT COUNT(*) as book_count FROM books";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $book_count = $row['book_count'];
    }
    return $book_count;

	}

	function get_category_count(){
		$connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"liberary_management");
		$cat_count = 0;
		$query = "select count(*) as cat_count from category";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$cat_count = $row['cat_count'];
		}
		return($cat_count);
	}

	function get_author_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"liberary_management");
		$author_count = 0;
		$query = "select count(*) as author_count from authors";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$author_count = $row['author_count'];
		}
		return($author_count);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	 
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="">VITM Library Management System </a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="view_profile.php">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="change_password.php">Change Password</a>
	        	</div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="logout.php">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<span><marquee>This is  VITM library mangement system. Library opens on college days.</marquee></span><br><br>
	<div class="row">
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Book Issued</div>
				<div class="card-body">
					<p class="card-text">No of book issued: <?php echo get_user_issue_book_count();?></p>
					<a class="btn btn-success" href="admin/view_issued_book.php">View Issued Books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Total Book</div>
				<div class="card-body">
					<p class="card-text">No of books available: <?php echo get_book_count();?></p>
					<a class="btn btn-dark" href="admin/Regbooks.php">View All Books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Book Categories</div>
				<div class="card-body">
					<p class="card-text">No of Book's Categories: <?php echo get_category_count();?></p>
					<a class="btn btn-secondary" href="admin/Regcat.php">View Categories</a>
				</div>
			</div>
		</div>
		<div class="col-md-3"style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">No. of Authors</div>
				<div class="card-body">
					<p class="card-text">No of Authors: <?php echo get_author_count();?></p>
					<a class="btn btn-primary" href="admin/Regauthor.php">View Authors</a>
				</div>
			</div>
            </div>
	</div>
		
		    <div class="col-md-3"></div>		    
	        <div class="col-md-3"></div>
</body>
</html>
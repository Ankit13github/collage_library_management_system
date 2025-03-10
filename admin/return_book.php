<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Return Book</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<script type="text/javascript">
  		function alertMsg(){
  			alert(Book return successfully...);
  			window.location.href = "admin_dashboard.php";
  		}
  	</script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="admin_dashboard.php"> VITM Library Management System </a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="#">Edit Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="change_password.php">Change Password</a>
	        	</div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../logout.php">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
		<div class="container-fluid">
			
		    <ul class="nav navbar-nav navbar-center">
		      <li class="nav-item">
		        <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Books </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_book.php">Add New Book</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_book.php">Manage Books</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_cat.php">Add New Category</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_cat.php">Manage Category</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Authors</a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_author.php">Add New Author</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_author.php">Manage Author</a>
	        	</div>
		      </li>
	          <li class="nav-item">
		        <a class="nav-link" href="issue_book.php">Issue Book</a>
		      </li>
              <li class="nav-item">
		        <a class="nav-link" href="return_book.php">Return Book</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<span><marquee> This is VITM library mangement system. Library opens on college days.</marquee></span><br><br>
		<center><h4>Return Book</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="" method="post">
					<div class="form-group">
						<label for="book_name">Book Name:</label>
						<input type="text" name="book_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="book_author">Author ID:</label>
						<select class="form-control" name="book_author">
							<option>-Select author-</option>
							<?php  
                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection,"liberary_management");
								$query = "select author_name from authors";
								$query_run = mysqli_query($connection,$query);
								while($row = mysqli_fetch_assoc($query_run)){
									?>
									<option><?php echo $row['author_name'];?></option>
									<?php
								}
							?>
						</select>
						<!--<input type="text" name="book_author" class="form-control" required> -->
					</div>
					<div class="form-group">
						<label for="book_no">Book Number:</label>
						<input type="text" name="book_no" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="student_id">Student ID:</label>
						<input type="text" name="student_id" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label for="return_date">Return Date:</label>
                        <input type="text" name="return_date" class="form-control" value="<?php echo date("Y-m-d"); ?>" required>
					</div>
					<button type="submit" name="return_book" class="btn btn-primary">Return Book</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>

<?php

if (isset($_POST['return_book'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "liberary_management");

    // Insert return details into return_book table
    $query = "INSERT INTO return_book VALUES ('$_POST[book_no]', '$_POST[book_name]', '$_POST[book_author]', '$_POST[student_id]', '$_POST[return_date]')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        // Delete book from issued_books table
        $delete_query = "DELETE FROM issued_books WHERE book_no = '$_POST[book_no]' AND student_id = '$_POST[student_id]'";
        $delete_query_run = mysqli_query($connection, $delete_query);

        if ($delete_query_run) {
            echo "<script>
                    alert('Book returned successfully.');
                    window.location.href = 'admin_dashboard.php';
                  </script>";
        } else {
            echo "Error in deleting record from issued_books: " . mysqli_error($connection);
        }
    } else {
        echo "Error in inserting record into return_book: " . mysqli_error($connection);
    }
}

?>

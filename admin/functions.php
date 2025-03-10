<?php
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

	function get_user_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"liberary_management");
		$user_count = 0;
		$query = "select count(*) as user_count from users";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$user_count = $row['user_count'];
		}
		return($user_count);
	}

	function get_book_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"liberary_management");
		$book_count = 0;
		$query = "select count(*) as book_count from books";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$book_count = $row['book_count'];
		}
		return($book_count);
	}

	function get_issue_book_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"liberary_management");
		$issue_book_count = 0;
		$query = "select count(*) as issue_book_count from issued_books";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$issue_book_count = $row['issue_book_count'];
		}
		return($issue_book_count);
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
?>
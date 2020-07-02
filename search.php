<?php
    include 'header.php';
?>

<h1>search.php</h1?

<div class="liquor-container">
<?php
    if (isset($_POST['submit-search'])) {
		$search = mysqli_real_escape_string($conn, $POST['search']);
		$sql = "SELECT * FROM liquor WHERE l_title LIKE'%search%' OR l_text LIKE'%search%' OR l_date LIKE'%search%";
		$result = mysqli_query($conn, $sql);
		$queryResult = mysqli_num_rows($result);
		
		echo "There are ".$queryResult."results!";
		
		if ($queryResult >0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<a href='liquor.php?title=".$row['l_title']."&date=".$row['l_date']."'><div class='liquor-box'>
				    <h3>".$row['l_title']."</h3>
					<p>".$row['l_text']."</p>
					<p>".$row['l_date']."</p>
				</div>";
			
		} else {
			echo "There are no results matching your search!";
		}
	}	
}
?>
</div>

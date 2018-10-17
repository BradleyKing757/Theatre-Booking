<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="normal.css">
<link rel="stylesheet" type="text/css" href="mystyles.css">
<link href="https://fonts.googleapis.com/css?family=Lobster|Raleway" rel="stylesheet">
<?php
include('connect.php');
$conn = myconnect();
?>


	<title>Performance Page</title>
</head>

<!--Navigation Bar-->
<nav class="main-nav">
		<ul>
			<li class="seperate"> | </li>
			<li> <a href="index.php">Home</a></li>
			<li class="seperate"> | </li>
			<li><a href="">Venue</a></li>
			<li class="seperate"> | </li>
			<li id="header-1">Theatre UK</li>
			<li class="seperate"> | </li>
			<li><a href="">Contact Us</a></li>
			<li class="seperate"> | </li>
			<li><a href="">FAQ's</a></li>
			<li class="seperate"> | </li>
		</ul>
	</nav>

<body>
<h1 class="headers">Book Seats</h1>

<?php
	$showName =$_GET['Title'];
	$price = $_GET['BasicTicketPrice'];
	$sql = "SELECT * FROM Performance WHERE Performance.Title='$showName'";
	
	$handle = $conn->prepare($sql);
	$handle->execute();
	$conn = null;
	$res = $handle->fetchAll();
	?>
	<table>
		<tr>
			<th>Title</th>
			<th>Date</th>
			<th>Time</th>
		</tr>
		
	<?php 
	foreach($res as $row) {
		
	?>
	<tr>
		<td><?php echo $row['Title']?></td>
		<td><?php echo $row['PerfDate']?></td>
		<td><?php echo $row['PerfTime']?></td>
		<td><form action="seats.php" method="get">
		<?php echo '<input type="submit" name="seatButton" value="Show Availability">'?></td>
		<td><?php echo '<input type="hidden" name="PerfDate" value="' . $row['PerfDate'] . '"/>'?></td>
		<td><?php echo '<input type="hidden" name="PerfTime" value="' . $row['PerfTime'] . '"/>'?></td>
		<td><?php echo '<input type="hidden" name="BasicTicketPrice" value="' . $price . '"/>'?></td>
		</form>
		
	</tr>
				
	<?php
	}

?>
	

	</body>
</html>
<!DOCTYPE HTML>
<html>
<head>
<title>Available Seats</title>
<link rel="stylesheet" type="text/css" href="mystyles.css">
<link href="https://fonts.googleapis.com/css?family=Lobster|Raleway" rel="stylesheet">
<?php
include('connect.php');
$conn = myconnect();

$price = $_GET['BasicTicketPrice'];
$perfDate = $_GET['PerfDate'];
$perfTime = $_GET['PerfTime'];


?>
<script>
function check(){
	var checkBoxes = document.getElementsByName("seatsAvailable");
	var seatNums = [];
	var ticketPrices =[];
	var total =0;
	
	
	for (var i = 0; i < checkBoxes.length; i++) {
		if (checkBoxes[i].type == "checkbox" && checkBoxes[i].checked == true) {
			seatNums.push(" " + document.getElementsByName("seats")[i].innerText);
			ticketPrices.push(" £"+ document.getElementsByName("prices")[i].innerText);
			total = total + Number(document.getElementsByName("prices")[i].innerText);
		}
	}
	alert("Seats chosen: " + seatNums.toString() + "\nSeat Prices: " + ticketPrices.toString() + "\nTotal price: " + "£" + total);
	
	
}
</script>
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
<?php
$sql = "SELECT Seat.RowNumber, Zone.PriceMultiplier
		FROM Seat, Zone 
		WHERE Zone.Name=Seat.Zone 
		AND Seat.RowNumber NOT IN 
		(SELECT Booking.RowNumber FROM Booking 
		WHERE Booking.PerfTime='16:00:00' 
		AND Booking.PerfDate='2015-12-04')";
$handle = $conn->prepare($sql);
	$handle->execute();
	$conn = null;
	$res = $handle->fetchAll();
?>

<h1 class="headers">Available Seats</h1>

	<table id="myTable">
			<tr>
				<th>Seat</th>
				<th>Price</th>
			</tr>
			
		<?php 
		foreach($res as $row) {
			
		?>
		<tr>
			
			<td name="seats"><?php echo $row['RowNumber']?></td>
			<td name="prices"><?php echo $row['PriceMultiplier'] * $price ?></td>
			
			<td>
					<input type="checkbox" name="seatsAvailable"> 
				
			</td>
			
			
		</tr>
		<?php } ?>
	</table>
	
	<div class="inputss">
	<br>
		<button onclick="check();">Check</button><br>

		<form action="book.php" method="get">
			<p>Enter email here:</p><input type="text"> 
			<input type="submit" value="Book">
		</form>
	</div>



						


</body>

</html>
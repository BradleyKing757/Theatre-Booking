<!DOCTYPE HTML>
<html>
<head>
<?php
//connect to DB
include('connect.php');
$conn = myconnect();
?>
<link rel="stylesheet" type="text/css" href="mystyles.css">
<link href="https://fonts.googleapis.com/css?family=Lobster|Raleway" rel="stylesheet">
	<title>Main Page</title>
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
	<h3 class="production-viewings">Production Viewings</h3>
	<?php

	$sql = "SELECT * from Production;";
		$handle = $conn->prepare($sql);
		$handle->execute();
		$conn = null;
		$res = $handle->fetchAll();
		?>
		<table>
			<tr>
				<th>Production Title</th>
				<th>Prices from</th>
			</tr>
			
		<?php 
		foreach($res as $row) {
			
		?>
		<tr>
			
			<td><?php echo $row['Title']?></td>
			<td><?php echo $row['BasicTicketPrice']?></td>
			
			<td><form action="perf.php" method="get">
			<?php echo '<input type="submit" name="button" value="Show Performances">'?></td>
			<td><?php echo '<input type="hidden" name="Title" value="' . $row['Title'] . '"/>'?></td>
			<td><?php echo '<input type="hidden" name="BasicTicketPrice" value="' . $row['BasicTicketPrice'] . '"/>'?></td></form>
		
			
		</tr>
					
		<?php
		}
		?>
		
		</table>
		
	<div id="div-images">
		<img src="images/cats.png" height="200" width="200">
		<img src="images/tosca.jpg" height="200" width="200">
		<img src="images/fame.jpg" height="200" width="200">

	</div>	
	
	<div>
	<h2 id="about-us">About Us:</h2>
	<p>London saw the first Theatre UK cinema open in 1930 and established the brand as not only simply somewhere to watch films, but somewhere to experience them. Iconic art deco architecture and the very latest technology became synonymous with Theatre UK where you didn’t just go to see a film, you went to the cinema. 

	Theatre UK is at the forefront of cinematic experience: both IMAX and ISENSE offer extraordinary cinema viewing and Theatre UK also operates London’s BFI IMAX which is the largest cinema screen in the UK. Theatre UK Leicester Square is another iconic cinema destination, hosting over 700 of Europe’s biggest film premieres since the 1930s.</p>
	</div>
	
</body>
</html>

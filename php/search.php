<!DOCTYPE HTML>
<html>
	<head>
		<title>Team Octocat Storefront Group Project</Title>
		<link rel="stylesheet" href="../css/storefront.css">
		<script language="javascript" src="../js/search.js"></script>
		<script language="javascript" src="../js/cart.js"></script>
		<?php include "../php/theme.php" ?>
	</head>
	<body>
		<?php include "../php/header.php" ?>
		<br>
		<div class="<?php echo ($theme_id); ?>">
			<h1 class="herotx sub1 sub2">Search</h1>
			<form>
				<fieldset>
					<legend>Enter Search Term</legend>
					<label for="search">Search: </label>
					<input type="text" id="myInput" onkeyup="octoSearch()" minlength="1" required placeholder="Search for...?" name="search"/>
				</fieldset>
				<br>
			</form>
			<?php
				$server='localhost';
				$user="brent";
				$password = "Student123!";
				$database = "Octocat";
				$connection = new mysqli($server, $user, $password, $database);
				
				$query = "SELECT * FROM Product p JOIN ProductType pt ON p.PRODUCTTYPE_ID = pt.PRODUCTTYPE_ID WHERE pt.producttype='3D Models';";
				$result = $connection->query($query);
				$count = mysqli_num_rows($result);
				
				echo "<div id=\"wrapper\">3D Models<div id=\"products\"><table id=\"modelTable\" align=\"left\" bgcolor=\"lightblue\"><thead><tr>";
				
				for ($i = 0; $i < $count; $i++)
				{
					echo "<th><span class=\"product\" /></th>";
				}
				echo "</tr></thead><tr>";
				
				while($record = $result->fetch_assoc())
				{
					$id = $record['PRODUCT_ID'];
					$prod = $record['productname'];
					$loc = $record["imagelocation"];
				
					echo "<td id=\"$prod\" style=\"display:none\"><table bgcolor=\"#FFEFD5\"><col width=\"200px\" /><tr>";
					echo "<td align=\"center\" class=\"buttonIn\">";
					echo "<a href=\"./item_form.php?pid=$id\"><img src=\"../$loc\" width=\"200\" height=\"200\"></a><br>";
					echo "<br><b>Product Name:</b> $prod<br><br></td></table></td>";
				}
				
				echo "</tr></table></td></tr></table></div></div><br>";
				
				$query = "SELECT * FROM Product p JOIN ProductType pt ON p.PRODUCTTYPE_ID = pt.PRODUCTTYPE_ID WHERE pt.producttype='Scripts';";
				$result = $connection->query($query);
				$count = mysqli_num_rows($result);
				
				echo "<div id=\"wrapper\">Scripts<div id=\"products\"><table id=\"scriptTable\"  align=\"left\" bgcolor=\"lightblue\"><thead><tr>";
				
				for ($i = 0; $i < $count; $i++)
				{
					echo "<th><span class=\"product\" /></th>";
				}
				echo "</tr></thead><tr>";
				
				while($record = $result->fetch_assoc())
				{
					$id = $record['PRODUCT_ID'];
					$prod = $record['productname'];
					$loc = $record["imagelocation"];
				
					echo "<td id=\"$prod\" style=\"display:none\"><table bgcolor=\"#FFEFD5\"><col width=\"200px\" /><tr>";
					echo "<td align=\"center\" class=\"buttonIn\">";
					echo "<a href=\"./item_form.php?pid=$id\"><img src=\"../$loc\" width=\"200\" height=\"200\"></a><br>";
					echo "<br><b>Product Name:</b> $prod<br><br></td></table></td>";
				}
				
				echo "</tr></table></td></tr></table></div></div><br>";
				
				$query = "SELECT * FROM Product p JOIN ProductType pt ON p.PRODUCTTYPE_ID = pt.PRODUCTTYPE_ID WHERE pt.producttype='Audio';";
				$result = $connection->query($query);
				$count = mysqli_num_rows($result);
				
				echo "<div id=\"wrapper\">Sound FX<div id=\"products\"><table id=\"soundTable\"  align=\"left\" bgcolor=\"lightblue\"><thead><tr>";
				
				while($record = $result->fetch_assoc())
				{
					$id = $record['PRODUCT_ID'];
					$prod = $record['productname'];
					$loc = $record["imagelocation"];
				
					echo "<td id=\"$prod\" style=\"display:none\"><table bgcolor=\"#FFEFD5\"><col width=\"200px\" /><tr>";
					echo "<td align=\"center\" class=\"buttonIn\">";
					echo "<a href=\"./item_form.php?pid=$id\"><img src=\"../$loc\" width=\"200\" height=\"200\"></a><br>";
					echo "<br><b>Product Name:</b> $prod<br><br></td></table></td>";
				}
				
				echo "</tr></table></td></tr></table></div></div><br>";
				
				$connection->close();
			?>
		</div>
		<?php include "../html/footer.html" ?>
	</body>
</html>
